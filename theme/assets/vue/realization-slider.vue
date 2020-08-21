<template>
  <component
    :is="mainTag"
    :class="mainClass"
    v-swiper:realization="sliderOptionsBaner"
  >
    <slot />
  </component>
</template>

<script>
export default {
    name: 'realization-slider',
    props: {
      mainTag: {
        type: String,
        default: "div",
        required: false
      },
      mainClass: {
        type: String,
        default: "swiper-container relative overflow-hidden mx-0",
        required: false
      },
    },
    data() {
      return {
        sliderOptionsBaner: {
          preloadImages: false,
          pagination: {
              el: '[data-realization-pagination]',
              clickable: true,
          },
          navigation: {
            nextEl: '[data-realization-button-next]',
            prevEl: '[data-realization-button-prev]',
          },
          autoplay: 2000,
          slidesPerView: 'auto',
          loopedSlides: 4,
          loop: true
        }
      };
    },
}
</script>

<style>

</style>