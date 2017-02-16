import Vue from 'vue'
import appConfig from './services/appConfig';
import App from './App.vue'
import router from './router'


require('./bootstrap');


Vue.http.options.root = appConfig.api_url;
require('./services/interceptors');

//-----------------------NAVEGACAO
Vue.component('navbar',require('./components/NavBar.vue'));
Vue.component('sidebar',require('./components/SideBar.vue'));


//-----------------------CHAT

const app = new Vue({
    el: '#root',
    components: { App },
    template: '<app></app>',
    router
})

