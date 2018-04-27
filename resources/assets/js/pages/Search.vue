<template>
    <main-layout @search="search"
                 :isLoading="isLoading"
                 :initialSearchQuery="initialSearch"
    >
        <v-poster-list :posters="movies"></v-poster-list>
    </main-layout>
</template>

<script>
import MainLayout from '../layouts/Main.vue';
import VPosterList from '../components/VPosterList.vue';
import _ from 'lodash';

export default {
    components: {
        MainLayout,
        VPosterList
    },
    data() {
        return {
            movies: [],
            searchRequest: null,
            isLoading: false,
            initialSearch: '',
        };
    },
    mounted() {
        console.log('search'); // do not commit
        if ( ! this.$session.get('searchQuery')) {
            this.$root.currentRoute = '/'
            window.history.replaceState(
                null,
                'Home',
                '/'
            )
        }
        this.isLoading = true;
        this.initialSearch = this.$session.get('searchQuery');
    },
    methods: {
        search(searchQuery) {
            if ( ! searchQuery) {
                this.isLoading = false;
                this.movies = [];
                return;
            }
            this.debouncedSearch(searchQuery);
        },
        debouncedSearch: _.debounce(searchQuery => {
            this.isLoading = true;
            if (this.searchRequest) {
                axios.cancel(this.searchRequest);
            }
            this.searchRequest = (new Date).getTime();
            window.axios.get('api/search', {
                params: {q: searchQuery},
                requestId: this.searchRequest
            }).then(response => {
                this.movies = response.data.data;
                this.searchRequest = null;
                this.isLoading = false
            });
        }, 500),
    },
};

</script>
