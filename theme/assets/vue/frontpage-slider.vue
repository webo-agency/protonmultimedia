<template>
  <component
    :is="mainTag"
    :class="mainClass"
    v-swiper:logos="sliderOptions"
  >
    <slot />
  </component>
</template>

<script>
import Vue from "vue";
import VueAwesomeSwiper from "vue-awesome-swiper/dist/ssr";

Vue.use(VueAwesomeSwiper);

export default {
    name: 'frontpage-slider',
    props: {
      mainTag: {
        type: String,
        default: "div",
        required: false
      },
      mainClass: {
        type: String,
        default: "swiper-container relative",
        required: false
      },
    },
    data() {
      return {
        sliderOptions: {
          preloadImages: false,
          pagination: {
              el: '[data-swiper-pagination]',
              clickable: true,
          },
          autoplay: 2000,
          slidesPerView: 1,
          loop: true
        }
      };
    },
}
</script>

<style>

</style>