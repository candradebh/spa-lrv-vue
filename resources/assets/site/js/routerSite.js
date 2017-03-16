import Vue from 'vue'
import VueRouter from 'vue-router'


Vue.use(VueRouter)


const router = new VueRouter({

    routes: [
        {path: '/chatform', component: require('./components/chat/ChatForm.vue') },
        {path: '/chatstart',  component: require('./components/chat/ChatMessage.vue')}
    ]
})

export default router
