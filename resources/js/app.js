/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

 //usar bootstra vue
import Vue from 'vue'
import BootstrapVue from 'bootstrap-vue'

Vue.use(BootstrapVue)

require('./bootstrap');

window.Vue = require('vue');


Vue.component('cards-component', require('./components/cards.vue').default);


const app = new Vue({
    el: '#app',
});
