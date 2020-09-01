<template>
  <component
    :is="mainTag"
    class="pm-side-heading"
    :class="mainClass"
    >
    <span class="block" v-for="letter in letters" :key="letter">{{ letter }}</span>
  </component>
</template>

<script>
export default {
    name: 'side-heading',
    props: {
      mainTag: {
        type: String,
        default: "div",
        required: false
      },
      mainClass: {
        type: String,
        default: "",
        required: false
      },
      text: {
        type: String,
        default: "",
        required: false
      },
    },
    data() {
        return {
            letters: [],
        }
    },
    mounted() {
      if(this.$attrs['data-text']){
        this.letters = this.$attrs['data-text'].trim().split("");
      }
    },
}
</script>

<style>

</style>