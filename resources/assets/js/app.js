
require('./bootstrap');

import './plugins/slimscroll.js';
import './plugins/adminLte.js';

import store from './vuex/store.js';
import VueRouter from 'vue-router';
import routes from './routes.js';
import App from './App.vue';
import VueEvents from 'vue-events'
Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue')
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue')
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue')
);
Vue.use(VueEvents)

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    linkActiveClass: 'active',
    routes: routes
});

new Vue(Vue.util.extend({router, store}, App)).$mount('#app');
