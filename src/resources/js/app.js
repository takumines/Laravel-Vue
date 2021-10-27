require('./bootstrap');

require('alpinejs');

import Vue from 'vue';
import Login from '../Vue/pages/Login.vue';
import Register from "../Vue/pages/Register";

const app = new Vue({
    el: '#app',
    components: {
        Login,
        Register
    }
})