<template>
    <div id="demo03">
        <span v-once>这个将不会改变: {{ msg }}</span>
        <div id="div">
            <p v-for="(item,index) in list" :key="index">
             {{item.title}}---{{item.name}}
            </p>
        </div>
    </div>
</template>
<script>
export default {
    data(){
        return{
            msg:'变变变！！！',
            list:[
                {name:'杨泽政',title:'1'},
                {name:'杨站坤',title:'2'},
                {name:'杨文琴',title:'3'},
            ]
        }
    },
   mounted() {
    this.autoSetScale() //进页面先执行一次页面高度和宽度计算然后赋值
    window.addEventListener('resize', () => {
      this.autoSetScale()
    }, false)
  },

  methods: {

    // 自动缩放屏幕比例

    autoSetScale() {

      let zoom = (window.innerHeight / 800).toFixed(3)

      this.transformScale = `scale(${zoom})`

      this.width = `${(window.innerWidth / zoom).toFixed(2)}px`

    }

}

}
</script>
<style scoped>

</style>

