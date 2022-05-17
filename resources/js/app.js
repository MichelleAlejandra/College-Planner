require('./bootstrap');
require('./color');

import { createApp } from "vue";
createApp({})
.component('horario', require('./components/horario.vue').default)
.mount("#app");

/**
import VueSweetalert2 from 'vue-sweetalert2';
window.Vue = require('vue').default;

Vue.use(VueSweetalert2);
Vue.component('eliminar-materia', require('./components/eliminar_materia.vue').default);

const app = new Vue({
    el: '#app',
});
*/
