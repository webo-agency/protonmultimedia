<template>
  <p class="readmore">
    <template v-slot:excerpt v-show="!toggled" />
    <template v-slot:content v-show="toggled"  />
    <a href="javascript:void(0)" @click="toggle">
        {{ toggled ? lessText : moreText }}
    </a>
  </p>
</template>

<script>
export default {
  name: 'read-more',
  props: {
    text: { type: String, required: true },
    limit: { type: Number, default: 25 },
    moreText: { type: String, default: 'Show more' },
    lessText: { type: String, default: 'Show less' },
  },
  data() {
    return { toggled: false };
  },
  computed: {
    truncatedText() {
      if (this.text.length < this.limit) { return this.text; }
      for (let i = this.limit; i > 0; i--) {
        const currChar = this.text.charAt(i);
        const prevChar = this.text.chartAt(i - 1);
        const prevCharNotPunc = [',', ';', '.'].some(c => c !== prevChar);
        if (currChar === ' ' && prevCharNotPunc) {
          return `${this.text.substring(0, i)}...`;
        }
      }
    }
  },
  methods: {
    toggle() { this.toggled = !this.toggled; },
  },
};
</script>