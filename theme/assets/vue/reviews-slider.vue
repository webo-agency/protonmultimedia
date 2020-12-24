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
  [data-reviews-pagination] .swiper-pagination-bullet{
    background-color: #d6d6d6;
  }
  [data-reviews-pagination] .swiper-pagination-bullet-active{
    background: #01b9c3;
  }
</style>