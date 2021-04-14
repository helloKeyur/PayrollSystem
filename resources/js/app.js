require('./bootstrap');

window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const app = new Vue({
    el: '#app'
});

// Set the base URL of the API
ApiService.init(process.env.VUE_APP_ROOT_API)

// If token exists set header
if (TokenService.getToken()) {
  ApiService.setHeader()
}