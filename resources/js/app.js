require('bootstrap');
import Vue from 'vue';



import VueAxios from 'vue-axios'
import axios from 'axios'
Vue.use(VueAxios,axios);




import store from './store'
Vue.use(store);

import App from './layouts/App'
import router from './routes';





const app = new Vue({
    el:'#app',
    router:router,
    store: store,
    render:h => h(App)
})
