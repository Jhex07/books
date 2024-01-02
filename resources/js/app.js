/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import { createApp } from 'vue';
import vSelect from 'vue-select';

import TheBookList from './components/Books/TheBookList.vue'

const app = createApp({
    components: {
        TheBookList
    }
});


app.component('v-select', vSelect)
app.mount('#app');
