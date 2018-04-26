<template>
    <main-layout @search="search"
                 :isLoading="isLoading"
    >
        <v-poster-list :posters="movies"
                       v-if="movies.length"
        ></v-poster-list>
        <div class="message" v-else-if=" ! isSearching">Type something to start searching...</div>
        <div class="message" v-else-if="noResults">There weren't any results for your query.</div>
    </main-layout>
</template>

<script>
import MainLayout from '../layouts/Main.vue';
import VPosterList from '../components/VPosterList.vue';

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
            isSearching: false,
            noResults: false,
            timeout: null,
        };
    },
    methods: {
        search(searchQuery) {
            this.noResults = false;

            if ( ! searchQuery) {
                this.isLoading = false;
                this.isSearching = false;
                this.movies = [];
                return;
            }
            
            if (this.timeout) clearInterval(this.timeout);

            this.timeout = setTimeout(() => {
                this.isSearching = true;
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
                    this.isLoading = false;
                    if ( ! this.movies.length) {
                        this.noResults = true;
                    }
                });
            }, 500);
        },
    },
};

</script>

<style lang="scss" scoped>
    .message {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 1.5em;
    }
</style>