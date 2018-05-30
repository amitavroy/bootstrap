/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('confirm-delete', require('./components/ConfirmDelete.vue'));

Vue.directive('cdelete', {
  inserted(el, binding) {
    console.log(binding);
    el.addEventListener('click', () => {
      var confirm = window.confirm(binding.value.message);
      if (confirm === true && binding.modifiers.reload === true) {
        window.axios.post(binding.value.link, {data: 1}).then(response => {
          console.log('response', response);
        })
        // location.reload();
      }
    });
  }
});

const app = new Vue({
  el: '#app'
});
