/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import {store} from "../../store";
import Notifications from 'vue-notification';

require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('cart', require('./components/Cart.vue').default);
Vue.component('search-form', require('./components/SearchForm.vue').default);
Vue.component('product', require('./components/Product.vue').default);
Vue.component('products-list', require('./components/ProductList.vue').default);
Vue.component('categories-list', require('./components/CategoriesList.vue').default);
Vue.component('my-notifications', require('./components/MyNotifications.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.use(Notifications);

Vue.config.errorHandler = function VueErrorHandler(error, vm, info) {
    console.error('call::VueErrorHandler, error.stack:', error.stack)
    console.error('call::VueErrorHandler, vm:', vm)
    console.error('call::VueErrorHandler, info:', info)
};

Vue.prototype.$alertHub = new Vue();

window.$alertHub = Vue.prototype.$alertHub;

const app = new Vue({
    el: '#app',
    store
});
