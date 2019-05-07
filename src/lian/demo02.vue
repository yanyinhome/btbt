<template>
  <div>
    <mt-swipe :auto="2000">
      <mt-swipe-item v-for="item in items" :key="item.id">
        <a :href="item.href">
          <img :src="item.url" class="img"/>
          <span class="desc">{{item.title}}</span>
        </a>
      </mt-swipe-item>
    </mt-swipe>
  </div>
</template>
<script>
  import {Swipe, SwipeItem} from 'mint-ui'
  import 'mint-ui/lib/style.css'

  export default {
    components: {
      'mt-swipe': Swipe,
      'mt-swipe-item': SwipeItem
    },
    data () {
      return {
        items: [{
          title: '你的名字',
          href: 'http://google.com',
        url: "http://qxjr.cadhx.com/uploads/images/20181128/b5eaa7867dce56b26d54335c815e1cb0.jpg"
        }, {
          title: '我的名字',
          href: 'http://baidu.com',
          url: "http://qxjr.cadhx.com/uploads/images/20181128/b5eaa7867dce56b26d54335c815e1cb0.jpg"
        }]
      }
    }
  }
</script>

<style scoped>
  img {
    width: 100%;
  }
  .mint-swipe {
    height: 218px;
  }
  .desc {
    font-weight: 600;
    opacity: .9;
    padding: 5px;
    height: 20px;
    line-height: 20px;
    width: 100%;
    color: #fff;
    background-color: gray;
    position: absolute;
    bottom: 0;
  }
</style>