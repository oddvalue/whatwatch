<template>
    <main-layout @search="search">
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
            debouncedSearch: _.debounce(searchQuery => {
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
                });
            }, 500),
        };
    },
    mounted() {
        window.axios.get('api').then(response => {
            this.movies = response.data.data;
        });
    },
    methods: {
        getSource() {
            switch (window.location.pathname) {
                case '/':
                    return 'api';

                case '/top-rated':
                    return 'api/top-rated';

                case '/search':
                    return 'api/search';
            }
        },
        search(searchQuery) {
            if ( ! searchQuery || searchQuery.length < 3) {
                this.movies = [];
                return;
            }

            this.debouncedSearch(searchQuery);
        }
    },
};

</script>
