<template>
  <component
    :is="mainTag"
    class="swiper-container relative overflow-hidden mx-0"
    :class="mainClass"
    v-swiper:realization="sliderOptionsBaner"
  >
    <slot />
  </component>
</template>

<script>
export default {
    name: 'realization-alternative-gallery',
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
    },
    data() {
      return {
        sliderOptionsBaner: {
          effect: "fade",
          fadeEffect: { crossFade: true },
          preloadImages: false,
          pagination: false,
          navigation: false,
          autoplay: {
            delay: 1000,
          },
          slidesPerView: 1,
          loop: true
        }
      };
    },
}
</script>

<style>

</style>