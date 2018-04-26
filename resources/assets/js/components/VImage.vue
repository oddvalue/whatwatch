<template>
    <img :src="src"
         @load="loaded"
         @error="error"
    >
</template>

<script>
    export default {
        props: {
            src: {
                type: String,
                required: true,
            }
        },
        methods: {
            loaded () {
                this.$emit('loaded');
            },
            error () {
                console.log(`Error loading '${this.src}'`);
            }
        }
    }
</script>

<style scoped>
    img {
        max-width: 100%;
    }
</style>