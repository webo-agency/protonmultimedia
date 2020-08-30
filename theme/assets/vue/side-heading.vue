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
      title: {
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
      if(this.$attrs['data-title']){
        this.letters = this.$attrs['data-title'].trim().split("");
      }
    },
}
</script>

<style>

</style>