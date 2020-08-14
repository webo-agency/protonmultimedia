<template>
  <component
    id="baner"
    :is="mainTag"
    :class="mainClass"
    v-swiper:baner="sliderOptions"
  >
    <slot />
  </component>
</template>

<script>
import Vue from "vue";
import VueAwesomeSwiper from "vue-awesome-swiper/dist/ssr";

Vue.use(VueAwesomeSwiper);

export default {
    name: 'baner-slider',
    props: {
      mainTag: {
        type: String,
        default: "div",
        required: false
      },
      mainClass: {
        type: String,
        default: "swiper-container relative overflow-hidden",
        required: false
      },
    },
    data() {
      return {
        sliderOptions: {
          preloadImages: false,
          pagination: {
              el: '#baner [data-swiper-pagination]',
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