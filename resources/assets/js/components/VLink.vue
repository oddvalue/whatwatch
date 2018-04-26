<template>
  <a
    v-bind:href="href"
    v-bind:class="{ 'is-active': isActive, 'v-link': true }"
    v-on:click="go"
  >
    <slot></slot>
  </a>
</template>

<script>
  import routes from '../routes';

  export default {
    props: {
      href: {
        type:String,
        required: true
      },
      activeStyle: {
        type: Boolean,
        required: false,
        default: true
      }
    },
    computed: {
      isActive () {
        return this.activeStyle && this.href === this.$root.currentRoute
      }
    },
    methods: {
      go (event) {
        event.preventDefault()
        this.$root.currentRoute = this.href
        window.history.pushState(
          null,
          routes[this.href],
          this.href
        )
      }
    }
  }
</script>

<style lang="scss" scoped>
  .v-link {
    display: inline-block;
  }
  .v-link.is-active {
    border-bottom: .1em solid white;
  }
</style>
