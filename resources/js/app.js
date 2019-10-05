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
    styles: ["css/app.css", "css/order_system_css/orderStylesheet.css"]
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

Vue.component(
    "search-component",
    require("./supplier/SearchComponent.vue").default
);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: "#app",

    data: {
        supplierCreateForm: {
            name: "",
            email: "",
            contactNumber: "",
            address1: "",
            address2: "",
            city: "",
            postalCode: "",
            selected: []
        }
    },
    methods: {
        print() {
            this.$htmlToPaper("printContainer");
        },

        addSupplierFormCreateData() {
            this.supplierCreateForm.name = "New Supplier Name";
            this.supplierCreateForm.email = "newsupplier@newsupplier.com";
            this.supplierCreateForm.contactNumber = "0112353450";
            this.supplierCreateForm.address1 =
                "St. Michael's Road, Kollupitiya";
            this.supplierCreateForm.address2 = "Colombo 07";
            this.supplierCreateForm.city = "Colombo";
            this.supplierCreateForm.postalCode = "61170";
            // this.supplierCreateForm.selected = [];
        }
    }
});
