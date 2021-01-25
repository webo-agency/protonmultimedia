<template>
  <component
    :is="mainTag"
    class="swiper-container relative overflow-hidden mx-0"
    :class="mainClass"
    v-swiper:realization="sliderOptionsBaner"
    @slidePrevTransitionStart="slidePrevTransitionStart"
    @slideNextTransitionStart="slideNextTransitionStart"
    @slideResetTransitionStart="slideResetTransitionStart"
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
          observer: true,
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
          loop: true,
          loopedSlides: 0
        }
      };
    },
    methods: {
      slidePrevTransitionStart:function(){
        this.$store.commit('slidePrev');
      },
      slideNextTransitionStart:function(){
        this.$store.commit('slideNext');
      },
      slideResetTransitionStart:function(){
        this.$store.commit('slideReset');
      },
    }
}
</script>

<style>

</style>