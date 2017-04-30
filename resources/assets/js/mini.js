// require('./bootstrap')
const Vue = require('vue')
Vue.component('logo', require('./components/Logo.vue'))
Vue.component('register', require('./components/Register.vue'))
Vue.component('reset', require('./components/Reset.vue'))
const app = new Vue({
    el: '#app'
})
