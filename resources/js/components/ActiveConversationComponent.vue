<template>
    <b-row>
        <b-col cols="8">
            <b-card
                footer-bg-variant="light"
                footer-border-variant="dark"
                title="Conversación activa"
                class="h-100">
                <message-conversation
                    v-for="message in messages" :key="message.id"
                    :written-by-me="message.written_by_me">
                    {{ message.content }}
                </message-conversation>

                <div slot="footer">
                    <b-form class="mb-0" @submit.prevent="postMessage" autocomplete="off">
                        <b-input-group>
                            <b-form-input
                                v-model="newMessage"
                                type="text" class="text-center"
                                placeholder="Escribe un mensaje..." require >
                            </b-form-input>

                            <b-input-group-append>
                                <b-button type="submit" variant="primary">Enviar</b-button>
                            </b-input-group-append>
                        </b-input-group>
                    </b-form>
                </div>
            </b-card>
        </b-col>

        <b-col cols="4">
            <b-img rounded="circle" blank width="60" height="60" blank-color="#777" alt="" class="m-1"/>
            <p>Usuario seleccionado</p>
            <hr>
            <b-form-checkbox>
                Desactivar notificaciones
            </b-form-checkbox>
        </b-col>
    </b-row>
</template>

<script>
    export default {
        data() {
            return {
                messages: [],
                newMessage: ''
            }
        },
        methods: {
            getMessages(){
                axios.get('/api/messages').then(res => {
                    this.messages = res.data;
                    console.log(res.data);
                });
            },
            postMessage(){
                const params = {
                    to_id: 2,
                    content: this.newMessage
                }
                axios.post('/api/messages', params).then(res => {
                    // console.log(res.data);
                    if(res.data.success)
                    {
                        this.newMessage = '';
                        this.getMessages();
                    }
                });
            }
        },
        mounted() {
            this.getMessages();
        }
    }
</script>