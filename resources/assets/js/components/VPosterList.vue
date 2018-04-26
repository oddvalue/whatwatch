<template>
    <div class="poster-list">
        <v-poster v-for="(poster, key) in posters"
                  v-bind:key="key"
                  v-bind:title="poster.title"
                  v-bind:year="poster.year"
                  v-bind:poster="poster.poster"
        ></v-poster>
    </div>
</template>

<script>
import VPoster from '../components/VPoster.vue';

export default {
    components: {
        VPoster
    },
    props: {
        posters: {
            type: Array|Object,
            required: true
        },
    },
};
</script>

<style lang="scss" scoped>
    .poster-list {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(10em, 1fr) );

        @media screen and (min-width: 60em) {
            grid-template-columns: repeat(auto-fill, minmax(15em, 1fr) );
        }
    }
</style>

