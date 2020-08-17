<template>
  <component
    :is="mainTag"
    :class="mainClass"
  >
    <slot />
  </component>
</template>

<script>
export default {
    name: 'side-heading',
    props: {
      mainTag: {
        type: String,
        default: "div",
        required: false
      },
      mainClass: {
        type: String,
        default: "pm-side-heading",
        required: false
      },
    },
    data() {
        return {
            heading: '',
            letters: [],
        }
    },
    mounted() {
        this.getArrayFromSlotContent();
        this.renderSingleSlotLetters();
        this.renderVerticalHeading();
    },
    methods: {
        getArrayFromSlotContent() {
            const slotContent = this.$slots.default[0].elm.textContent;
            this.heading = slotContent.split('');
        },
        renderSingleSlotLetters() {
            return this.heading.map(letter => {
                this.letters.push(`<div ${letter === ' ' ? `class="mb-2"` : ''}>${letter}</div>`);
            })
        },
        renderVerticalHeading() {
            this.$slots.default[0].elm.innerHTML = this.letters.join('');
        }
    }
}
</script>

<style>

</style>