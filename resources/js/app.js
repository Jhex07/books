/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import { createApp } from 'vue';
import vSelect from 'vue-select';

import TheBookList from './components/Books/TheBookList.vue'
import BackendError from './components/Components/BackendError.vue'
import TheCategoryList from './components/Category/TheCategoryList.vue'

const app = createApp({
    components: {
        TheBookList,
        TheCategoryList
    }
});


app.component('v-select', vSelect)
app.component('backend-error', BackendError)
app.mount('#app');
