

require('./bootstrap');

window.Vue = require('vue');
import BootstrapVue from 'bootstrap-vue';

Vue.use(BootstrapVue);

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);

require("../vue/index");


const app = new Vue({
    el: '#app',
});


require('./scripts/index');