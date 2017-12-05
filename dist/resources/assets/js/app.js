'use strict';

var _vue = require('vue');

var _vue2 = _interopRequireDefault(_vue);

var _elementUi = require('element-ui');

var _elementUi2 = _interopRequireDefault(_elementUi);

require('element-ui/lib/theme-default/index.css');

var _vueRouter = require('vue-router');

var _vueRouter2 = _interopRequireDefault(_vueRouter);

var _vueResource = require('vue-resource');

var _vueResource2 = _interopRequireDefault(_vueResource);

var _vuex = require('vuex');

var _vuex2 = _interopRequireDefault(_vuex);

var _App = require('./App.vue');

var _App2 = _interopRequireDefault(_App);

var _Start = require('./components/Start.vue');

var _Start2 = _interopRequireDefault(_Start);

var _HomePage = require('./components/HomePage.vue');

var _HomePage2 = _interopRequireDefault(_HomePage);

var _SignIn = require('./components/SignIn.vue');

var _SignIn2 = _interopRequireDefault(_SignIn);

var _SignUp = require('./components/SignUp.vue');

var _SignUp2 = _interopRequireDefault(_SignUp);

var _Find = require('./components/Find.vue');

var _Find2 = _interopRequireDefault(_Find);

var _Choice = require('./components/Choice.vue');

var _Choice2 = _interopRequireDefault(_Choice);

var _My = require('./components/My.vue');

var _My2 = _interopRequireDefault(_My);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

_vue2.default.use(_elementUi2.default);

_vue2.default.use(_vueRouter2.default);
_vue2.default.use(_vueResource2.default);
_vue2.default.use(_vuex2.default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


var routes = [{
    path: '/',
    component: _Start2.default
}, {
    path: '/signin',
    component: _SignIn2.default
}, {
    path: '/signup',
    component: _SignUp2.default
}, {
    path: '/homepage',
    component: _HomePage2.default
}, {
    path: '/find',
    component: _Find2.default
}, {
    path: '/choice',
    component: _Choice2.default
}, {
    path: '/my',
    component: _My2.default
}];

var router = new _vueRouter2.default({
    linkActiveClass: 'active',
    routes: routes
});

var store = new _vuex2.default.Store({
    state: {
        server: 'life.petrichor.com/'
    }
});

new _vue2.default({
    router: router,
    store: store,
    components: { App: _App2.default },
    template: '<App/>'
}).$mount('#app');
//# sourceMappingURL=app.js.map