<template>
    <main-layout @search="search"
                 :isLoading="isLoading"
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
            isLoading: false
        };
    },
    mounted() {
        this.isLoading = true;
        window.axios.get(this.getSource()).then(response => {
            this.movies = response.data.data;
            this.isLoading = false;
        });
    },
    methods: {
        getSource() {
            switch (window.location.pathname) {
                case '/':
                    return 'api';

                case '/top-rated':
                    return 'api/top-rated';
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
