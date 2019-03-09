

require('./bootstrap');

window.Vue = require('vue');

import BootstrapVue from 'bootstrap-vue';
import VueRouter from 'vue-router'

Vue.use(VueRouter);

Vue.use(BootstrapVue);

require("../vue/index");

callHttp('/menu',{}).then(data=>{
    console.log(data);
    console.log(data.rutas.routes);
    window.app = new Vue({
        el: '#app',
        router: new VueRouter({
            /*  linkActiveClass: "active",*/
            linkExactActiveClass: "active",
            routes: data.rutas.routes
        }),
        data:{
            menu:data.menu,
            user:data.user
        }
    });
});

require('./scripts/polyfill');
require('./scripts/alerts');
