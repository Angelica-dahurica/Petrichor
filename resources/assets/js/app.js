
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue'
import Element from 'element-ui'
import 'element-ui/lib/theme-default/index.css'
Vue.use(Element);

import VueRouter from 'vue-router'
import VueResource from 'vue-resource'
import Vuex from 'vuex'

Vue.use(VueRouter);
Vue.use(VueResource);
Vue.use(Vuex);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import App from './App.vue'
import start from './components/Start.vue'
import homepage from './components/HomePage.vue'
import signin from './components/SignIn.vue'
import signup from './components/SignUp.vue'
import find from './components/Find.vue'
import choice from './components/Choice.vue'
import my from './components/My.vue'

const routes = [{
    path: '/',
    component: start
},{
    path: '/signin',
    component: signin
}, {
    path: '/signup',
    component: signup
}, {
    path: '/homepage',
    component: homepage
}, {
    path: '/find',
    component: find
}, {
    path: '/choice',
    component: choice
}, {
    path: '/my',
    component: my
}
];

const router = new VueRouter({
    linkActiveClass: 'active',
    routes
});

const store = new Vuex.Store({
    state: {
        server: 'life.petrichor.com/'
    }
});

new Vue({
    router,
    store,
    components: { App },
    template: '<App/>',
}).$mount('#app');