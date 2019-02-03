
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// window.Vue = require('vue');
import BootstrapVue from 'bootstrap-vue'
import Vue from 'vue'
import VueRouter from 'vue-router'

import store from './store'
import MessengerComponent from './components/MessengerComponent.vue'


Vue.use(VueRouter)
Vue.use(BootstrapVue);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

Vue.component('contact', require('./components/ContactComponent.vue'));
Vue.component('contact-list', require('./components/ContactListComponent.vue'));
Vue.component('active-conversation', require('./components/ActiveConversationComponent.vue'));
Vue.component('message-conversation', require('./components/MessageConversationComponent.vue'));
// Vue.component('messenger', require('./components/MessengerComponent.vue'));
Vue.component('status', require('./components/StatusComponent.vue'));
Vue.component('profile', require('./components/ProfileFormComponent.vue'));
Vue.component('contact-form', require('./components/ContactFormComponent.vue'));

const routes = [
    { path: '/chat', component: MessengerComponent },
    { path: '/chat/:conversationId', component: MessengerComponent }
];
  
const router = new VueRouter({
    routes,
    mode: 'history'
});

const app = new Vue({
    el: '#app',
    store,
    router,
    methods: {
    	logout(){
    		document.getElementById('logout-form').submit();
    	}
    }
});
