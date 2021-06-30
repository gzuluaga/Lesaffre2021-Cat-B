require('./bootstrap');

import Vue from 'vue';

import swal from 'sweetalert2';
window.Swal = swal;

import 'fullcalendar/dist/fullcalendar.css';
import FullCalendar from 'vue-full-calendar';
Vue.use(FullCalendar);

Vue.use(require('vue-moment'));

Vue.component('spinner',              			require('./components/Spinner.vue').default);
Vue.component('registro-distribuidores', 		require('./components/registroDistribuidoresComponent.vue').default);
Vue.component('listado-puntuaciones', 			require('./components/listPuntuacionesComponent.vue').default);
Vue.component('calendar-component', 			require('./components/CalendarComponent.vue').default);
Vue.component('excel-component', 				require('./components/ExcelComponent.vue').default);
Vue.component('trivia-component', 				require('./components/TriviaComponent.vue').default);
Vue.component('registro',			 			require('./components/frontend/RegistroComponent.vue').default);




const app = new Vue({
    el: '#app',
});
