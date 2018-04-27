<template>
  <a
    v-bind:href="href"
    v-bind:class="linkClass"
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
      linkClass () {
        const classes = ['v-link'];
        if (this.activeStyle) {
          classes.push('has-active-style');
        }
        if (this.href === this.$root.currentRoute) {
          classes.push('is-active');
        }
        return classes.join(' ');
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
    transition: .3s;
    border-bottom: .05em solid transparent;
  }
  .v-link.has-active-style.is-active {
    border-bottom: .05em solid rgba(white, .25);
  }
  .v-link.has-active-style:hover {
    border-bottom: .05em solid white;
  }
</style>
