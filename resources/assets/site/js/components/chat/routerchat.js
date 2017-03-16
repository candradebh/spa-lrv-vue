import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter);


const router = new VueRouter({

    routes: [
        {path: '/chatform', component: require('./ChatForm.vue') },
        {path: '/chatstart',  component: require('./ChatMessage.vue')}
    ]
});

export default router
