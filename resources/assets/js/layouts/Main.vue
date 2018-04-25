<template>
  <div>
    <header>
      <v-link href="/">WHAT WATCH?</v-link>
      <nav>
        <a href="/">U<small>PCOMING</small></a>
        <a href="/top-rated">T<small>OP</small>R<small>ATED</small></a>
      </nav>
      <form action="/search">
        <input name="q" placeholder="search...">
      </form>
    </header>

    <slot></slot>
  </div>
</template>

<script>
  import VLink from '../components/VLink.vue'
  export default {
    components: {
      VLink
    }
  }
</script>

<style scoped>
</style>
