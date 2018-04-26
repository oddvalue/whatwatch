<template>
    <main-layout @search="search"
                 :isLoading="isLoading"
    >
        <input v-model="searchQuery"
               placeholder="search..."
               class="search"
               @keyup="search"
               ref="search"
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
            searchQuery: '',
            searchRequest: null,
            isLoading: false,
            isSearching: false,
            noResults: false,
            timeout: null,
        };
    },
    mounted () {
        this.$refs.search.focus();
    },
    methods: {
        search() {
            this.noResults = false;

            if ( ! this.searchQuery) {
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
                axios.get('api/search', {
                    params: {q: this.searchQuery},
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
        top: 48%;
        left: 1em;
        font-size: 2em;
        font-weight: bold;
        color: rgba(white, .5);
        text-align: center;
        width: calc(100% - 2em);
        animation: .3s ease-in-out both fade-in;
        animation-delay: .2s;
    }
    .search {
        max-width: 30em;
        width: 100%;
        display: block;
        position: relative;
        z-index: 1;
        border: none;
        box-shadow: inset 2px 2px 2px rgba(black, .5);
        border-radius: 5px;
        padding: .5em .6em;
        margin: 0 auto 1em;
        animation: .3s ease-in-out both fade-in;
        position: relative;

        @media (max-width: 32em) {
            margin: 0 1em 1em;
            width: calc(100% - 2em);
        }
    }

    @keyframes fade-in {
        0% {
            opacity: 0;
            transform: translateY(1em);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

</style>
</style>