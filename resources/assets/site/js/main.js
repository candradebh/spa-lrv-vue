import Vue from 'vue'
import appConfig from './services/appConfig';
import Site from './Site';
import Chat from './components/chat/Chat.vue';
import router from './routerSite';


require('./bootstrap');
Vue.http.options.root = appConfig.site_url;
require('./services/interceptors');

require('materialize-css');

//-----------------------CHAT



new Vue({
  el: '#app',

  components:{
      'app-site' : Site,
      'chat': Chat
  },
  router
})

