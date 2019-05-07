<template>
    <div id="ba">
        <div class="ba_div1">
           <p class="ba_p1" @click="dian">立即返回</p>
        </div>
        <div class="scroll-wrapper">
          <iframe src="https://m.8btc.com/" frameborder="0" id="iframe"></iframe>
        </div>
    </div>
</template>
<script>
    export default{
  methods:{
            dian(){
                this.$router.push('/index')
            }
        }
    }
</script>
<style scoped>
#ba{
    overflow-x : hidden; 
    overflow-y : hidden;
}
.scroll-wrapper {
 width:100%;
  /* 提示: 请在此处加上需要设置的大小(dimensions)或位置(positioning)信息! */
}
#ba{
    overflow: hidden; 
}
#ba1{
    width:103%;
    height:100%;
    background:#fff;
}
#iframe{
    margin:0px;
    padding:0px;
   width:100%;
   height:1500px;
}
.ba_div1{
        position: fixed;
        bottom:0px;
        width:100%;
        height:100px;
        background:#fff;
        color:#fff;
        text-align: center;
        padding-top:15px;
        border-top:1px solid #dddddd;
    }
    .ba_p1{
        width:220px;
        height:60px;
        line-height:60px;
        margin:0 auto;
        border-radius:30px;
        color:#fff;
        font-size:20px;
        margin-top:15px;
        background:#FF8500;
    }
</style>
