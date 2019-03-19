

require('./bootstrap');

window.Vue = require('vue');

import BootstrapVue from 'bootstrap-vue';
import VueRouter from 'vue-router';
import VueCarousel from '@chenfengyuan/vue-carousel';
import swal from 'sweetalert';


Vue.use(VueRouter);
Vue.component(VueCarousel.name, VueCarousel);

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
            user:data.user,
            rol:data.rol,
            avatar: data.avatar
        }
    });
});

require('./scripts/polyfill');
require('./scripts/alerts');
