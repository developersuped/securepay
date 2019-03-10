window.Vue = require('vue');
Vue.component('productos', require('./productos').default);
Vue.component('adminventas', require('./ventas').default);
Vue.component('usuario', require('./usuarios').default);