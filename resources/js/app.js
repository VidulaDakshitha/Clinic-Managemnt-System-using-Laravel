/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue");

import VueHtmlToPaper from "vue-html-to-paper";

const options = {
    name: "Supplier Report",
    specs: ["fullscreen=no", "titlebar=yes", "scrollbars=yes"],
    styles: ["css/app.css"]
};

Vue.use(VueHtmlToPaper, options);

// or, using the defaults with no stylesheet

Vue.use(VueHtmlToPaper);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component(
//     "follow-button",
//     require("./components/FollowButton.vue").default
// );

// Vue.component("print-com", require("./components/HomePage.vue").default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: "#app",
    data: {
        isHidden: false
    },
    methods: {
        print() {
            this.$htmlToPaper("printContainer");
        },
        print_row() {
            this.$htmlToPaper("printContainer_row");
        }
    }
});


const app_roe = new Vue({
    el: "#app_row",
    data: {
        isHidden: false
    },
    methods: {
        print_row() {
            this.$htmlToPaper("printContainer_row");
        }
    }
});
