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
          allowTouchMove: true,
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
            breakpoints: {
              // when window width is >= 1248
              1248: {
                allowTouchMove: false
              },
            },
          slideNext: function(speed, runCallbacks) {
            debugger;
            if (data[this.swiper.realIndex + 1]) {
              this.swiper.slideNext(500);
            } else {
              runCallbacks(false);
              this.swiper.slideToLoop(0)
            }
          },
          slidePrev: function(speed, runCallbacks) {
            if (data[this.swiper.realIndex - 1]) {
              this.swiper.slidePrev(500)
            } else {
              runCallbacks(false);
              this.swiper.slideToLoop(data.length - 1)
            }
          }
        }
      };
    },
    mounted: function(){

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
      }
    }
}
</script>

<style>

</style>