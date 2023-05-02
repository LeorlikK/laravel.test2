import "bootstrap"
// import 'jquery.min.js';
// import 'popper.min.js';
// import 'bootstrap.bundle.min.js';
// import 'jquery-3.0.0.min.js';
// import 'jquery.mCustomScrollbar.concat.min.js';
// import 'custom.js';

// import TestComponent from "./components/TestComponent.vue";
// import TestTwoComponent from "./components/TestTwoComponent.vue";
// import CrudComponent from "./components/crud/CrudComponent.vue";
import Parent from "./components/parent_test/Parent.vue";


// import {createApp } from "vue";
import {createApp } from "vue/dist/vue.esm-bundler";

const app = createApp({
    components: {
        // TestComponent,
        // TestTwoComponent,
        // CrudComponent,
        Parent
    }
});

app.mount('#app')
