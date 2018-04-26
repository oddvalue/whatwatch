<template>
    <div :class="{poster: true, 'is-loaded': isLoaded}">
        <v-image class="poster__image" 
                 :src="poster"
                 @loaded="loaded"
        ></v-image>
        <div class="poster__details">
            <p>
                <strong>{{title}}</strong>
                <br>
                <small>( {{year}} )</small>
            </p>
        </div>
    </div>
</template>

<script>
    import VImage from './VImage';

    export default {
        components: {
            VImage,
        },
        props: {
            poster: {
                type:String,
                required: true
            },
            title: {
                type:String,
                required: true
            },
            year: {
                type:String,
                required: true
            },
        },
        data () {
            return {
                isLoaded: false,
            }
        },
        methods: {
            loaded () {
                console.log('loaded');
                this.isLoaded = true;
            }
        }
    }
</script>

<style lang="scss" scoped>
    @keyframes fade-in {
      0% {
        opacity: 0;
        transform: scale(0);
      }
      
      100% {
        opacity: 1;
        transform: scale(1);
      }
    }

    .poster {
        position: relative;
        overflow: hidden;
        transform: scale(0);

        &:before {
            content: '';
            display: block;
            padding-bottom: calc(741/500*100%);
        }

        &.is-loaded {
            animation: .3s ease-in-out both fade-in;
        }
    }

    .poster__image {
        width: 100%;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .poster__details {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        padding: .5em;
        background-color: rgba(black, .5);
    }
</style>
