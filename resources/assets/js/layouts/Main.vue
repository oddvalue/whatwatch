<template>
    <div :class="{'is-loading': isLoading, body: true}">
        <header>
            <v-link href="/"
                    :activeStyle="false"
            >WHAT WATCH?</v-link>
            <nav>
                <v-link href="/">U<span>PCOMING</span></v-link>
                <v-link href="/top-rated">T<span>OP</span>R<span>ATED</span></v-link>
            </nav>
            <v-search-link href="/search"></v-search-link>
        </header>

        <slot></slot>
    </div>
</template>

<script>
    import VLink from '../components/VLink.vue';
    import VSearchLink from '../components/VSearchLink.vue';
    import _ from "lodash";

    export default {
        props: {
            isLoading: {
                type: Boolean,
                required: false,
                default: false,
            },
            initialSearchQuery: {
                type: String,
                required: false,
                default: ''
            }
        },
        components: {
            VLink,
            VSearchLink,
        },
    }
</script>

<style lang="scss" scoped>
    @keyframes rotate {
        0% {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
        }
        100% {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }

    .body {
        position: relative;

        &.is-loading {
            &:before {
                position: fixed;
                top: 0;
                right: 0;
                bottom: 0;
                left: 0;
                background-color: rgba(black, .5);
                content: '';
            }
            &:after {
                position: fixed;
                display: block;
                top: calc(50% - 2em);
                left: calc(50% - 2em);
                width: 4em;
                height: 4em;
                content: '';
                border-radius: 50%;
                border: 5px solid rgba(white, .2);
                border-left: 5px solid white;
                animation: rotate 1.1s infinite linear;
            }
        }
    }
    header {
        color: white;
        position: fixed;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: center;
        background: rgba(black, .8);
        text-align: right;
        top: 0;
        left: 0;
        right: 0;
        padding: 1em;
        z-index: 1;
    }

    a {
        text-decoration: none;
        color: white;
        text-shadow: 0 0 2px white, 0 0 5px white;
        font-family: 'Unica One', cursive;
        font-size: 2em;
        line-height: 1em;

        &:hover {
            color: white;
            text-shadow: none;
        }

        @media only screen and (max-device-width: 480px) {
            width: 100%;
        }
    }

    nav {
        margin: 0 1em;

        a {
            font-size: 1.5em;
            text-shadow: none;
            padding: 0 .25em;
            margin: 0 .25em;
            width: auto;

            span {
              font-size: .85em;
            }
        }
    }
</style>
