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
        initialClass: 'on-scroll ',
        scrollClass: '',
        dynamicClass: ''
      };
    },
    mounted: function() {
      this.scrollClass = this.$attrs['data-scroll-class'].toString();
      this.initialClass += this.$el.classList.toString();
      window.document.onscroll = () => {
          this.scrollPosition = window.scrollY;
      }
    },
    watch: {
        scrollPosition: function(val, oldVal) {
          this.dynamicClass = this.initialClass;

          if(val > 0){
            this.dynamicClass += ' ' + this.scrollClass;
            this.onTop = false;
          } else {
            this.dynamicClass += ' is-top ';
             this.onTop = true;
          }

          if(val < oldVal){
            this.dynamicClass += ' is-show ';
            this.toBottom = true;
          } else {
             this.toBottom = false;
          }
        }
    }
}
</script>
