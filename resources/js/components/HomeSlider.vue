<template>
  <carousel v-bind="settings">
    <slide>
      <div class="main-hero">
        <img src="/images/3-1.png" alt="image">
      </div>
    </slide>
    <slide>
      <div class="main-hero">
        <img src="/images/3-2.png" alt="image">
      </div>
    </slide>
  </carousel>
</template>

<script>
import { Carousel, Slide } from "vue-carousel";
export default {
  data() {
    return {
      settings: {
        autoplay: true,
        centerMode: false,
        navigationEnabled: true,
        perPage: 1,
        navigationNextLabel: '<span><img height="24px" width="24px" src="/images/icons/chevron-right.svg" /></span>', 
        navigationPrevLabel: '<span><img height="24px" width="24px" src="/images/icons/chevron-left.svg" /></span>' 
      },
    };
  },
  components: {
    Carousel,
    Slide,
  },
};
</script>

<style>
</style>