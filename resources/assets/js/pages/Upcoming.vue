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
import _ from "lodash";

export default {
    components: {
        MainLayout,
        VPosterList
    },
    data() {
        return {
            movies: [],
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
        }
    },
};

</script>
