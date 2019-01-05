<template>
    <b-row>
        <b-col cols="8">
            <b-card no-body
                footer-bg-variant="light"
                footer-border-variant="dark"
                title="Conversación activa"
                class="h-100">

                <b-card-body class="card-body-scroll">
                    <message-conversation
                        v-for="message in messages" :key="message.id"
                        :written-by-me="message.written_by_me">
                        {{ message.content }}
                    </message-conversation>
                </b-card-body>

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
            <p>{{ contactName }}</p>
            <hr>
            <b-form-checkbox>
                Desactivar notificaciones
            </b-form-checkbox>
        </b-col>
    </b-row>
</template>

<script>
    export default {
        props: {
            contactId: Number,
            messages: Array,
            contactName: String
        },
        data() {
            return {
                newMessage: ''
            }
        },
        methods: {
            postMessage(){
                const params = {
                    to_id: this.contactId,
                    content: this.newMessage
                }
                axios.post('/api/messages', params).then(res => {
                    // console.log(res.data);
                    if(res.data.success)
                    {
                        this.newMessage = '';
                        const message = res.data.message;
                        message.written_by_me = true;
                        this.$emit('messageCreated', message);
                    }
                });
            },
            scrollToBottom() {
                const el = document.querySelector('.card-body-scroll');
                el.scrollTop = el.scrollHeight;
            }
        },
        updated() {
            this.scrollToBottom();
        }
    }
</script>

<style scoped>
    .card-body-scroll {
        max-height: calc(100vh - 63px);
        overflow-y: auto;
    }
</style>
