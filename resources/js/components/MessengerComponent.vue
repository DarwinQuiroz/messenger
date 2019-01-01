<template>
	<b-container fluid style="height: calc(100vh - 104px);">
	    <b-row no-gutters>
	        <b-col cols="4">
	            <contact-list @conversationSelected="changeActiveConversation($event)"></contact-list>
	        </b-col>

	        <b-col cols="8">
	            <active-conversation v-if="selectedConversation" 
	            	:contactId="selectedConversation.contact_id"
	            	:contactName="selectedConversation.contact_name"
	            	:messages="messages">
	            	
	            </active-conversation>
	        </b-col>
	    </b-row>
	</b-container>
</template>

<script>
	export default {
		props: {
			userId: Number
		},
		data() {
			return {
				selectedConversation: null,
				messages: []
			}
		},
		methods: {
			getMessages(){
                axios.get(`/api/messages?contact_id=${this.selectedConversation.contact_id}`)
                .then(res => {
                    this.messages = res.data;
                    // console.log(res.data);
                });
            },
			changeActiveConversation(conversation){
				// console.log('Conversacion seleccionada', conversation);
				this.selectedConversation = conversation;
				this.getMessages();
			}
		},
		mounted() {
			// console.log(Echo)s
			Echo.channel('channel-example-name').listen('MessageSent', (data) => {
				const message = data.message;
				message.written_by_me = (this.userId === message.from_id);
				this.messages.push(message);

			});
		}
	}
</script>