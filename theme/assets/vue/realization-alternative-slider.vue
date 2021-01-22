<template>
  <component
    :is="mainTag"
    class="swiper-container relative overflow-hidden mx-0"
    :class="mainClass"
    v-swiper:realization="sliderOptionsBaner"
    @slideChange="onSlideChange"
  >
    <slot />
  </component>
</template>

<script>
export default {
    name: 'realization-alternative-slider',
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
          allowTouchMove: false,
          pagination: {
              el: '[data-realization-alternative-pagination]',
              clickable: true,
          },
          navigation: {
            nextEl: '[data-realization-alternative-button-next]',
            prevEl: '[data-realization-alternative-button-prev]',
          },
          autoplay: false,
          slidesPerView: 1,
          loop: true
        }
      };
    },
    methods: {
      onSlideChange:function(){
        this.$root.$emit('realization-alternative-slider', 'change');
      }
    }
}
</script>

<style>

</style>