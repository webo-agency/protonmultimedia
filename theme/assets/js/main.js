import Vue from 'vue';
import BanerSlider from '../vue/baner-slider.vue';
import RealizationSlider from '../vue/realization-slider.vue';
import VueAwesomeSwiper from "vue-awesome-swiper/dist/ssr";

Vue.use(VueAwesomeSwiper);

Vue.component('baner-slider', BanerSlider);
Vue.component('realization-slider', RealizationSlider);

new Vue({ 
    el: '#baner',
    components: {
        BanerSlider,
    }
});

new Vue({ 
    el: '#realization',
    components: {
        RealizationSlider,
    }
});

const heroswiper = new Swiper('.pm-swiper--hero-swiper__container', {
    // Disable preloading of all images
    preloadImages: false,
    pagination: {
        el: '.pm-swiper--hero-swiper__swiper-pagination',
        clickable: true,
    }
});

const FrameGenerator = {
    sel: {
        frames: '.pm-text-frame',
        frameDrop: 'pm-text-frame__drop',
    },

    addDropToFrame() {
        const textFrames = document.querySelectorAll(FrameGenerator.sel.frames);
        textFrames.forEach(frame => {
            const frameBuilding = document.createElement('span');
            frameBuilding.classList.add(FrameGenerator.sel.frameDrop);
            frame.appendChild(frameBuilding);
        })
    }
}

document.addEventListener('DOMContentLoaded', function() {
    FrameGenerator.addDropToFrame();
})