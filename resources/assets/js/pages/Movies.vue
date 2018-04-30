<template>
    <main-layout :isLoading="isLoading">
        <v-poster-list :posters="movies"></v-poster-list>
    </main-layout>
</template>

<script>
import MainLayout from '../layouts/Main.vue';
import VPosterList from '../components/VPosterList.vue';

export default {
    props: {
        source: {
            type: String,
            required: false,
            default: '/api'
        }
    },
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
        window.axios.get(this.source).then(response => {
            this.movies = response.data.data;
            this.isLoading = false;
        });
    },
};

</script>
