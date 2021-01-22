<template>
  <div class="readmore mx-auto max-w-900px">
      <div v-show="!toggled">
        <slot name="excerpt"></slot>
      </div>
      <div v-show="toggled">
        <slot name="content"></slot>
      </div>
      <a href="javascript:void(0)" @click="toggle" :class="linkClass">
          {{ toggled ? lessText : moreText }}
      </a>
  </div>
</template>

<script>
export default {
  name: 'read-more',
  props: {
    moreText: { type: String, default: 'Read more' },
    lessText: { type: String, default: 'Read less' },
    linkClass: { type: String },
    bus : { type: Vue }
  },
  data() {
    return { toggled: false };
  },
  methods: {
    created() {
      this.bus.$on('realization-alternative-slider', (e) => {
        this.close();
      })
    },
    beforeEnter: function(el) {
      el.style.height = '0';
    },
    enter: function(el) {
      el.style.height = el.scrollHeight + 'px';
    },
    beforeLeave: function(el) {
      el.style.height = el.scrollHeight + 'px';
    },
    leave: function(el) {
      el.style.height = '0';
    },
    toggle(state) { 
      this.toggled = !this.toggled; 
    },
    close() { 
      this.toggled = false;
    }
  },
};
</script>