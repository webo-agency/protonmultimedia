<template>
  <component
    :is="mainTag"
    class="swiper-container relative overflow-hidden"
    :class="mainClass"
    v-swiper:reviews="sliderOptionsBaner"
  >
    <slot />
  </component>
</template>

<script>
export default {
    name: 'reviews-slider',
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
          preloadImages: false,
          pagination: {
              el: '[data-reviews-pagination]',
              clickable: true,
              bulletClass: 'swiper-pagination-bullet bg-gray-dark',
              bulletActiveClass: 'swiper-pagination-bullet-active bg-primary'
          },
          navigation: {
            nextEl: '[data-reviews-button-next]',
            prevEl: '[data-reviews-button-prev]',
          },
          autoplay: 2000,
          slidesPerView: 1,
        }
      };
    },
}
</script>

<style>

</style>