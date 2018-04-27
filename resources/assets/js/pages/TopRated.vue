<template>
    <movies source="api/top-rated"></movies>
</template>

<script>
    import Movies from './Movies.vue';

    export default {
        components: {
            Movies,
        },
    }
</script>
