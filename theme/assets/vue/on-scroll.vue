<template>
  <component
    :is="mainTag"
    :class="dynamicClass"
  >
    <slot />
  </component>
</template>

<script>
export default {
    name: 'on-scroll',
    props: {
      mainTag: {
        type: String,
        default: "div",
        required: false
      }
    },
    data() {
      return {
        onTop: true,
        toTop: false,
        scrollPosition: 0,
        initialClass: ['on-scroll','is-show','is-top'],
        scrollClass: [],
        dynamicClass: []
      };
    },
    mounted: function() {
      this.scrollClass.push(this.$attrs['data-scroll-class'].toString());
      this.initialClass = [...new Set([...Array.from(this.$el.classList), ...this.initialClass])];
      this.dynamicClass = this.initialClass;
      this.scrollPosition = 0;
      window.document.onscroll = () => {
          this.scrollPosition = window.scrollY;
      }
    },
    watch: {
        scrollPosition: function(val, oldVal) {
          this.dynamicClass = this.initialClass;

          if(val > 0){
            this.dynamicClass = [...this.dynamicClass, ...this.scrollClass, 'is-top'];
            this.onTop = false;
          } else {
            this.dynamicClass.push('is-top');
            this.onTop = true;
          }

          if(val < oldVal){
            this.dynamicClass.push('is-show');
            this.toBottom = true;
          } else {
            this.dynamicClass.pop('is-top');
            this.toBottom = false;
          }

          this.dynamicClass = [...new Set([...this.dynamicClass])];
        }
    }
}
</script>
