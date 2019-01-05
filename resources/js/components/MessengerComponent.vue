<template>
	<b-container fluid style="height: calc(100vh - 104px);">
	    <b-row no-gutters>
	        <b-col cols="4">
	            <contact-list 
					@conversationSelected="changeActiveConversation($event)"
					:conversations="conversations"></contact-list>
	        </b-col>

	        <b-col cols="8">
	            <active-conversation v-if="selectedConversation" 
	            	:contactId="selectedConversation.contact_id"
	            	:contactName="selectedConversation.contact_name"
	            	:messages="messages"
					@messageCreated="addMessage($event)">
	            	
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
				messages: [],
				conversations: []
			}
		},
		methods: {
			getConversations(){
                axios.get('/api/conversations').then(res => {
                    this.conversations = res.data;
                })
            },
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
			},
			addMessage(message) {
				const conversation = this.conversations.find((conversation) => {
					return conversation.contact_id == message.from_id ||
						conversation.contact_id == message.to_id;
				});
				
				const author = this.userId === message.from_id ? 'Tú' : conversation.contact_name;
				conversation.last_message =  `${author}: ${message.content}`;
				conversation.last_time = message.created_at;

				if(this.selectedConversation.contact_id == message.from_id 
					|| this.selectedConversation.contact_id == message.to_id)
				{
					this.messages.push(message);
				}
			},
			changeStatus(user, status){
				const index = this.conversations.findIndex((conversation) => {
					return conversation.contact_id == user.id;
				});

				if(index >= 0) this.$set(this.conversations[index], 'online', status);
			}
		},
		mounted() {
			this.getConversations();
			
			Echo.private(`users.${this.userId}`).listen('MessageSent', (data) => {
				const message = data.message;
				message.written_by_me = false;
				this.addMessage(message);
			});

			Echo.join('messenger')
			.here((users) => {
				users.forEach(user => this.changeStatus(user, true));
			})
			.joining((user) => this.changeStatus(user, true))
			.leaving((user) => this.changeStatus(user, false));
		}
	}
</script>