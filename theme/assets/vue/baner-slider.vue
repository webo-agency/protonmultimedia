<template>
  <component
    id="baner"
    :is="mainTag"
    :class="mainClass"
    v-swiper:baner="sliderOptionsBaner"
  >
    <slot />
  </component>
</template>

<script>
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
        sliderOptionsBaner: {
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