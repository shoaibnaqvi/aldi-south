import Vue from 'vue/dist/vue';
import MoviesList from './movies-list';

/**
 * load the component for Lieferanten
 * */
Vue.component('movies-list', MoviesList);

const MoviesApp = new Vue({
    el: '#movies-app',
});

export default Movies;
