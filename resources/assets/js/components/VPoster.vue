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
                required: false
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
                this.isLoaded = true;
            }
        }
    }
</script>

<style lang="scss" scoped>
    .poster {
        position: relative;
        overflow: hidden;

        &:before {
            content: '';
            display: block;
            padding-bottom: calc(741/500*100%);
        }

        &:not(.is-loaded) {
            animation: 1s ease 0s pulse infinite;
            @for $i from 1 through 20 {
                &:nth-child(#{$i}) {
                    animation-delay: $i * (1s / 18);
                }
            }
        }

        &.is-loaded {
            .poster__image {
                animation: .3s ease-in-out both grow-in;
            }

            @for $i from 1 through 20 {
                &:nth-child(#{$i}) .poster__image {
                    animation-delay: $i * (.03s);
                }
            }
            &:nth-child(n+20) .poster__image {
                animation-delay: .6s;
            }
        }
    }

    .poster__image {
        width: 100%;
        position: absolute;
        opacity: 0;
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
        animation: .3s ease-in-out both fade-in;

        @for $i from 1 through 20 {
            &:nth-child(#{$i}) {
                animation-delay: $i * (1s / 18);
            }
        }
    }

    @keyframes fade-in {
        0% {
            opacity: 0;
        }

        100% {
            opacity: 1;
        }
    }
    @keyframes grow-in {
        0% {
            opacity: 0;
            width: 0;
        }

        100% {
            opacity: 1;
            width: 100%;
        }
    }
    @keyframes pulse {
        0% {
            background: #262626;
        }

        25% {
            background: lighten(#262626, 10%);
        }

        50% {
            background: #262626;
        }
    }
</style>
