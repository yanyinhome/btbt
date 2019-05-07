<template>
  <div id="pageHead" :class="{'page_head_opacity': opacity}">
    <p class="iconfont icon-return" @click="clickBack"></p>
    <slot></slot>
  </div>
</template>

<script>
export default {
  name: 'pageHead',
  data () {
    return {};
  },
  methods: {
    clickBack () {
      this.$router.go(-1);
    }
  },
  props: [
    'opacity'
  ]
};
</script>

<style lang="scss">
  #pageHead {
    position: fixed;
    top: 0;
    left: 0;
    left: 50%;
    width: 750px;
    margin-left: -375px;
    height: 88px;
    line-height: 88px;
    font-size: 34px;
    text-align: center;
    color: #000000;
    background: #fff;
     font-weight: bold;
    z-index: 1;
    .icon-return {
      position: absolute;
      top: 0;
      left: 0;
      width: 120px;
      font-size: 30px;
     
    }
    &.page_head_opacity {
      background: none;
    }
  }
</style>
