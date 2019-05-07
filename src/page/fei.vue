<template>
    <div id="fei">
        <div class="fei_div1">
           <p class="fei_p1" @click="dian">立即返回</p>
        </div>
        <div class="scroll-wrapper">
           <iframe  src="https://m.feixiaohao.com/" style="overflow-x:hiden" frameborder="0"   id="iframe"></iframe>
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
.scroll-wrapper {
  -webkit-overflow-scrolling: touch;
  overflow-y: scroll;
  /* 提示: 请在此处加上需要设置的大小(dimensions)或位置(positioning)信息! */
}
#fei{
    overflow-x : hidden; 
    overflow-y : hidden;
}
#iframe{
    width:100%;
    height:1500px;
}
    .fei_div1{
        position: fixed;
        width:100%;
        top:0;
        height:90px;
        background:#fff;
        color:#fff;
        text-align: center;
        padding-top:15px;
        border-top:1px solid #dddddd;
    }
    .fei_p1{
        width:220px;
        height:60px;
        line-height:60px;
        margin:0 auto;
        border-radius:30px;
        font-size:20px;
        background:#FF8500;
        
    }
</style>

