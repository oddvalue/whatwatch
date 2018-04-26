<template>
  <div :class="{'is-loading': isLoading, body: true}">
    <header>
      <v-link href="/"
              :activeStyle="false"
      >WHAT WATCH?</v-link>
      <nav>
        <v-link href="/">U<small>PCOMING</small></v-link>
        <v-link href="/top-rated">T<small>OP</small>R<small>ATED</small></v-link>
      </nav>
      <input v-model="searchQuery" 
             placeholder="search..." 
             @keyup="search"
      >
    </header>

    <slot></slot>
  </div>
</template>

<script>
  import VLink from '../components/VLink.vue';
  import _ from "lodash";

  export default {
    props: {
        isLoading: {
            type: Boolean,
            required: false,
            default: false,
        }
    },
    data() {
        return {
            searchQuery: ''
        };
    },
    components: {
      VLink
    },
    methods: {
        search(query) {
            // if (this.searchQuery.length) {
            //     this.$root.currentRoute = '/search';
            //     window.history.pushState(
            //       null,
            //       'Search',
            //       '/search'
            //     );
            // }
            this.$emit('search', this.searchQuery);
        }
    }
  }
</script>

<style lang="scss" scoped>
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
                content: 'LOADING...';
            }
        }
    }
    header
    {
        position: fixed;
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: rgba(black, .8);
        text-align: right;
        top: 0;
        left: 0;
        right: 0;
        padding: 1em;
        z-index: 1;

        a
        {
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

            @media only screen and (max-device-width: 480px)
            {
                font-size: 1em;
            }
            @media (max-width: 480px)
            {
                font-size: 1em;
            }
        }

        nav
        {
            margin: 0 1em;

            a
            {
                font-size: 1.5em;
                text-shadow: none;
                padding: 0 .5em;
            }
        }

        input
        {
            width: 15em;
            border: none;
            box-shadow: inset 2px 2px 2px rgba(black, .5);
            border-radius: 5px;
            padding: .5em .6em;
        }
    }
</style>
