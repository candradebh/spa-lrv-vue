import Vue from 'vue'
import VueRouter from 'vue-router'
import Auth from './services/auth'

Vue.use(VueRouter)


const router = new VueRouter({

    routes: [
        {path: '/', component: require('./views/auth/login.vue'), meta:{ auth : false} },
        {path: '/login', name:'auth.login', component: require('./views/auth/login.vue'),meta:{ auth : false} },
        {path: '/logout', name:'auth.logout', component: require('./views/auth/logout.vue'), meta:{auth:false}},

        {path: '/dashboard', name:'dashboard', component: require('./views/Dashboard.vue'), meta:{auth:true}},

        {path: '/customer', component: require('./views/customer/index.vue'), meta:{auth:true}},
        {path: '/customer/create', component: require('./views/customer/form.vue'), meta:{auth:true}},
        {path: '/customer/:id/edit', component: require('./views/customer/form.vue'), meta: {mode: 'edit',auth:true}},
        {path: '/customer/:id', component: require('./views/customer/show.vue'), meta:{auth:true}},

        {path: '/invoice', component: require('./views/invoice/index.vue'), meta:{auth:true}},
        {path: '/invoice/create', component: require('./views/invoice/form.vue'), meta:{auth:true}},
        {path: '/invoice/:id/edit', component: require('./views/invoice/form.vue'), meta: {mode: 'edit', auth:true}},
        {path: '/invoice/:id', component: require('./views/invoice/show.vue'), meta: {mode: 'edit', auth:true}},

        {path: '/products', component: require('./views/product/index.vue'), meta:{auth:true}},
        {path: '/products/create', component: require('./views/product/form.vue'), meta:{auth:true}},
        {path: '/products/:id/edit', component: require('./views/product/form.vue'), meta: {mode: 'edit', auth:true}},
        {path: '/products/:id', component: require('./views/product/show.vue'), meta: {mode: 'edit', auth:true}},

        {path: '/categories', component: require('./views/category/index.vue'), meta:{auth:true}},
        {path: '/categories/create', component: require('./views/category/form.vue'), meta:{auth:true}},
        {path: '/categories/:id/edit', component: require('./views/category/form.vue'), meta: {mode: 'edit', auth:true}},
        {path: '/categories/:id', component: require('./views/category/show.vue'), meta: {mode: 'edit', auth:true}},

    ]
})

router.beforeEach((to, from, next)=>{

    if(to.meta.auth && !Auth.user.check){

        return router.push({path:'/login'});

    }

    next();

});

export default router
