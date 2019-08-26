import Vuex from "vuex";
import Vue from "vue";
import auth from "./modules/auth";
import courses from "./modules/courses";

// Load Vuex
Vue.use(Vuex);

// Create Store

export default new Vuex.Store({
    modules: {
        auth
        /*  courses*/
    }
});
