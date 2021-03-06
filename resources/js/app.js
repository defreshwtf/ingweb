/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
window.moment = require('moment');

import Vuetify from 'vuetify'
// import "vuetify/dist/vuetify.min.css";

Vue.use(Vuetify)
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('home-component', require('./components/home/HomeComponent.vue').default);
Vue.component('home-profesor-component', require('./components/home/HomeProfesorComponent.vue').default);
Vue.component('home-alumno-component', require('./components/home/HomeAlumnoComponent.vue').default);
Vue.component('home-administrador-component', require('./components/home/HomeAdministradorComponent.vue').default);
Vue.component('peticiones-component', require('./components/home/PeticionesComponent.vue').default);
Vue.component('asesorias-component', require('./components/home/AsesoriasComponent.vue').default);

Vue.component('welcome-component', require('./components/WelcomeComponent.vue').default);

Vue.component('login-component', require('./components/auth/LoginComponent.vue').default);
Vue.component('register-component', require('./components/auth/RegisterComponent.vue').default);

Vue.component('navbar-component', require('./components/NavbarComponent.vue').default);
Vue.component('footer-component', require('./components/FooterComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
let bus = new Vue()
export default bus

const app = new Vue({
    el: '#app',
    vuetify: new Vuetify({}),
});
