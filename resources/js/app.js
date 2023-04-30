import './bootstrap';
import VueAxios from 'vue-axios';
import axios from 'axios';
import { createApp } from 'vue';
import App from './App.vue';
import store from './store'
import timeago from 'vue-timeago3'

createApp(App).use(store).use(VueAxios, axios).use(timeago).mount('#app')