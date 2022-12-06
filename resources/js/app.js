import './bootstrap.js';
import '../sass/app.scss'
import Datepicker from 'vue3-datepicker'

import { createApp } from 'vue/dist/vue.esm-bundler.js';
import router from '@/router';




const app = createApp({});
app.component('datepicker', Datepicker)

app.use(router);
app.mount('#app');
