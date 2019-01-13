<template>
    <b-list-group>
        <contact variant="" 
                v-for="conversation in conversations" 
                :key="conversation.id" 
                :conversation='conversation'
                :selected="selectedConversationId === conversation.id"
                @click.native="selectConversation(conversation)">
            
        </contact>            
    </b-list-group>
</template>

<script>
    export default {
        props: {
            conversations: Array
        },
        data() {
            return {
                selectedConversationId: null
            }
        },
        methods: {
            selectConversation(conversation){
                this.selectedConversationId = conversation.id;
                this.$emit('conversationSelected', conversation);
            }
        }
    }
</script>