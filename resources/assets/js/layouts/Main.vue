<template>
    <div :class="{'is-loading': isLoading, body: true}">
        <header>
            <v-link href="/"
                    :activeStyle="false"
                    className="logo"
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
        padding-top: 5em;

        @media (max-width: 480px) {
            padding-top: 7em;
        }

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

    .logo {
        text-shadow: 0 0 2px white, 0 0 5px white;

        &:hover {
            text-shadow: none;
        }

        @media (max-width: 480px) {
            width: 100%;
            text-align: center;
            margin-bottom: .5rem;
        }
    }

    a {
        line-height: 1em;
        color: white;
        font-family: 'Unica One', cursive;
        font-size: 2em;
    }

    nav {
        margin: 0 1em;

        @media (max-width: 480px) {
            margin: 0 1em 0 0;
        }

        a {
            font-size: 1.5em;
            padding: 0 .25em;
            margin: 0 .25em;

            span {
              font-size: .85em;
            }
        }
    }
</style>
