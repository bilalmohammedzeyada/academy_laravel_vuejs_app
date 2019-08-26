/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

import Vue from "vue";

window.Vue = require("vue");

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));
import store from "./store";
import router from "./routes";
/* import AppComponent from "./components/AppComponent.vue";
import NavbarComponent from "./components/NavbarComponent.vue";
import FooterComponent from "./components/FooterComponent.vue";

Vue.component("app", AppComponent);
Vue.component("nav-bar", NavbarComponent);
Vue.component("footer-comp", FooterComponent); */

Vue.component("app", require("./components/AppComponent.vue").default);
Vue.component("nav-bar", require("./components/NavbarComponent.vue").default);
Vue.component("explore", require("./components/ExploreComponent.vue").default);
Vue.component("login", require("./components/LoginComponent.vue").default);
Vue.component(
    "register",
    require("./components/RegisterComponent.vue").default
);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    store: store,
    el: "#app",
    router
});
