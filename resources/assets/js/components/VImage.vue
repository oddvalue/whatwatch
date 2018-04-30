<template>
    <img :src="src"
         :width="width"
         :height="height"
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
            },
            width: {
                type: Number,
                required: false
            },
            height: {
                type: Number,
                required: false
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
