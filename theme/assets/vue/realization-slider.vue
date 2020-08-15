<template>
  <component
    id="realization"
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
        default: "swiper-container relative overflow-hidden",
        required: false
      },
    },
    data() {
      return {
        sliderOptionsBaner: {
          preloadImages: false,
          pagination: {
              el: '#realization [data-swiper-pagination]',
              clickable: true,
          },
          navigation: {
            nextEl: '#realization [data-swiper-button-next]',
            prevEl: '#realization [data-swiper-button-prev]',
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