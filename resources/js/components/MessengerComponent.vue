<template>
	<b-container fluid style="height: calc(100vh - 104px);">
	    <b-row no-gutters>
	        <b-col cols="4">
	            <contact-list @conversationSelected="changeActiveConversation($event)"></contact-list>
	        </b-col>

	        <b-col cols="8">
	            <active-conversation v-if="selectedConversation" 
	            	:contactId="selectedConversation.contact_id"
	            	:contactName="selectedConversation.contact_name">
	            	
	            </active-conversation>
	        </b-col>
	    </b-row>
	</b-container>
</template>

<script>
	export default {
		data() {
			return {
				selectedConversation: null
			}
		},
		mounted() {

		},
		methods: {
			changeActiveConversation(conversation){
				// console.log('Conversacion seleccionada', conversation);
				this.selectedConversation = conversation;

			}
		}
	}
</script>