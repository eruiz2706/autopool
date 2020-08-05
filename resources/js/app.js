/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');

window.Vue = require('vue');
import VueSweetalert2 from 'vue-sweetalert2';
import Paginate from 'vuejs-paginate'
import VueRouter from 'vue-router';
import Vuex from 'vuex';
import App from './App.vue';
import routes from './routes';


//Vue.component('example-component', require('./components/ExampleComponent.vue').default);
const router  = new VueRouter({
  routes
});

const store = new Vuex.Store({
  state: {
    menu: [],
    menu_top: [],
    user: null,
    autenticado: false,
  },
  mutations: {
    authUser(state, user){
      this.state.autenticado = true;
      this.state.user = user;
    },
    logoutUser(state, user){
      this.state.autenticado = false;
      this.state.user = user;
      this.state.menu = []
      this.state.menu_top = []
    },
    addMenu(state,menu){
      this.state.menu = menu
    },
    addMenuTop(state,menu_top){
      this.state.menu_top = menu_top;
    }
  }
});
  
//Vue.use(Vuex);
Vue.component('paginate', Paginate);
Vue.use(VueSweetalert2);
Vue.use(VueRouter);
//Vue.config.devtools = false
new Vue({
    store,
    router,
    render: h => h(App)
}).$mount('#app');

