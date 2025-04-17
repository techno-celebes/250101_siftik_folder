require('./bootstrap');
import router from './router';

import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

window.Vue = require('vue');

Vue.use(VueSweetalert2);

Vue.prototype.authUser = window.authUser;

Vue.component('main-app-component', require('./components/panel/MainAppComponent.vue').default);
Vue.component('pagination', require('laravel-vue-pagination'));

const app = new Vue({
	router,
    el: '#app',
});
