<template>
    <main-layout>
        <v-poster-list :posters="movies"></v-poster-list>
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
        };
    },
    mounted() {
        window.axios.get('api/search', {params: {q: 'test'}}).then(response => {
            this.movies = response.data.data;
        });
    }
};

</script>