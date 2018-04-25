<template>
  <div class="poster">
    <img class="poster__image" :src="poster">
    <div class="poster__details">
      <p>
        <strong>{{ title }}</strong>
        <br>
        <small>( {{ year }} )</small>
      </p>
    </div>
  </div>
</template>

<script>
  export default {
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
  }
</script>

<style scoped>
</style>