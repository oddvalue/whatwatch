<template>
    <div>
    <main-layout>
        <v-poster v-for:="movies"></v-poster>
    </main-layout>
    </div>
</template>
 
<script>
import MainLayout from '../layouts/Main.vue'
import VPoster from '../components/VPoster.vue'
 
export default {
    components: {
        MainLayout,
        VPoster
    },
    data: {
        movies: [],
    },
    mounted() {
        window.axios.get('api').then(response => {
            this.movies = response.data.data;
        });
    }
}

</script>