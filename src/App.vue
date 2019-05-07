<template>
  <div id="app" ref="app">
    <keep-alive>  
       <router-view v-if="$route.meta.keepAlive" class="children_view"></router-view>
     </keep-alive>
     <router-view  v-if="!$route.meta.keepAlive" class="children_view"></router-view>
    <!-- 彈出信息 -->
    <toast></toast>
    <alert></alert>
  </div>
</template>
<script>
import toast from './components/toast';
import alert from './components/alert';
export default {
  name: 'App',
  data () {
    return {
      // 保存屏幕宽高
      userClient: {
        width: document.children[0].clientWidth,
        height: document.children[0].clientHeight
      }
    }
  },
   computed:{
      direction(){
        const viewDir = this.$store.state.viewDirection
        let tranName = ''

        if (viewDir === 'left') {
          tranName = 'view-out'
        } else if (viewDir === 'right') {
          tranName = 'view-in'
        } else {
          tranName = 'fade'
        }
        return tranName
      }
    },
  mounted () {
    this.init();
    // window.onresize = function () {
    //   document.addEventListener('touchstart', function (event) {
    //     if (event.touches.length > 1) {
    //       event.preventDefault();
    //     }
    //   });
    //   var lastTouchEnd = 0;
    //   document.addEventListener('touchend', function (event) {
    //     var now = (new Date()).getTime();
    //     if (now - lastTouchEnd <= 300) {
    //       event.preventDefault();
    //     }
    //     lastTouchEnd = now;
    //   }, false);
    // };
  },
  methods: {
    init () {
      // 创建根rem
      this.resetRem();
    },
    // 实例化根rem大小
    resetRem () {
      // 如果屏幕高大于屏幕宽
      if (this.userClient.height > this.userClient.width) {
        // 对html进行赋值rem大小
        document.children[0].style.fontSize = this.userClient.width / 750 * 100 + 'px';
        // 将body的宽度设置为auto
        document.body.style.width = 'auto';
      } else { // 如果屏幕高不大于屏幕宽
        // 对可视区域重新定义
        document.body.style.width = this.userClient.height / 1.77 + 'px';
        // 将body设置为居中
        document.body.style.margin = '0 auto';
        // 将body的宽度设置为高度的1.77分之一
        document.children[0].style.fontSize = this.userClient.height / 1.77 / 750 * 100 + 'px';
      }
    }
  },
  components: {
    toast,
    alert
  }
};
</script>

<style lang="scss">
  @import url('//at.alicdn.com/t/font_687521_yp4av2szzmtv5cdi.css');
  @import './assets/scss/reset.scss';
  @import './assets/scss/common_style.scss';
  #app {
    width: 100%;
    min-height: 100vh;
    position: relative;
    background: $bgColor;
    .children_view {
      width: 100%;
      min-height: 100vh;
      box-sizing: border-box;
    }
  }
</style>
