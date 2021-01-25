<template>
  <component
    :is="mainTag"
    class="swiper-container relative overflow-hidden mx-0"
    :class="mainClass"
    v-swiper:realization="sliderOptionsBaner"
    :instanceName="slider.realizations.alternative"
    @slideChange="onSlideChange"
  >
    <slot />
  </component>
</template>

<script>
export default {
    name: 'realization-alternative-slider',
    components: {
      'read-more'
    },
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
          loop: false,
          slideNext(swiper) {
            debugger;
            if (data[swiper.realIndex + 1]) {
              swiper.slideNext(500)
            } else {
              swiper.slideToLoop(0)
            }
          },
          slidePrev(swiper) {
            if (data[swiper.realIndex - 1]) {
              swiper.slidePrev(500)
            } else {
              swiper.slideToLoop(data.length - 1)
            }
          }
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