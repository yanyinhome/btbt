<template>
    <div id="chong">
        <com-head>充币</com-head>
        <div class="chong_div1"></div>
        <p class="chong_p5">请将 BTB 汇入如下地址：</p>
        <div class="chong_div4">
            <img :src="list.path" class="p5_img1" alt="">
        </div>
        <p class="chong_p6">扫描二维码，获取充币地址</p>
        <div class="chong_div5">
            <div class="chong_div6">
            <p class="p1">   <img class="chong_img1" src="../assets/image/lian.png" alt=""></p>
           <p class="p2">  <span class="chong_p7"> {{list.btbcode}}</span> </p> 
              <p class="p3"> <span class="chong_p8" @click="copy" :data-clipboard-text='list.btbcode'>复制</span></p> 
            </div>
        </div>
        <!--<div class="chong_div2">
            <div class="chong_div3">
              <p class="chong_p1">我的钱包地址</p>
              <p class="chong_p2"></p>
              <p class="chong_p3">123456789qwewrQDFGTYU5246VFH253SE</p>
            </div>
        </div>
          <p class="chong_p4" @click="copy" data-clipboard-text="123456789qwewrQDFGTYU5246VFH253SE">复制钱包地址</p>-->
    </div>
</template>
<script>
import Clipboard from 'clipboard';
     export default{
         data(){
             return{
                 list:[]
             }
         },
         created(){
             this.axios.post('index.php/index/apifinance/cbtb',{
                 token:sessionStorage.getItem('token')
             }).then((res)=>{
                 console.log(res);
                 if(res.data.code==200){
                     this.list=res.data
                 }
             })
         },
         methods:{
             copy(){
                 var clipboard=new Clipboard('.chong_p8');
                 clipboard.on('success',(e)=>{
                     this.$bus.$emit('toast','复制成功')
                     clipboard.destroy();
                 })
             }
         }
    }
</script>
<style scoped>
.p1{
    float: left;
    width:35px;
    margin-right:30px;
    margin-top:20px;
}
.p2{
    float: left;
    width:80%;
}
.p3{
    float: right;
    margin-top:-80px;
}
.chong_img1{
    width:100%;
    vertical-align: middle;
    margin: 0px 15px;
    width:30px;
}
#chong{
    background:#fff;
    position: relative;
}
    .chong_div1{
        position: fixed;
        top:88px;
        width:100%;
        border-bottom:1px solid #dddddd;
    }
.chong_p5{
    margin-top:120px;
    margin-left:30px;
}
.chong_div4{
    width:300px;
    height:300px;
    background:#D8D8D8;
    margin:50px auto;
}
.chong_p6{
    color:#999999;
    font-size:27px;
    text-align:center;
}
.chong_div5{
  width:92%;
  height:100px;
  margin:30px 4%;
  border-top:1px solid #dddddd;
  border-bottom:1px solid #dddddd;
  color:#999999;
  font-size:25px;
}
.chong_div6{
}
.chong_p7{
  word-break:break-all;
  width:300px;
}

.chong_p8{
    width:80px;
    margin-left:25px;
    color:#FF8500;
    font-size:30px;
    text-align:center;
}
.p5_img1{
    width:100%;
    height:100%; 
}





    .chong_div2{
        width:92%;
        margin:0px 4%;
        background:#fff;
        height:270px;
    }
    .chong_div3{
        width:92%;
        margin:0px 4%;
        padding-top:30px;
    }
    .chong_p1{
        font-size:25px;
        text-align:center;
         color:#666666;
    }
    .chong_p2{
        width:100px;
        height:2px;
        margin:20px auto;
        background:#999999;
    }
    .chong_p2{
        font-weight:bold;
    }
    .chong_p4{
        margin:60px 15%;
        width:70%;
        text-align:center;
        height:80px;
        line-height:80px;
        font-size:25px;
        color:#fff;
        border-radius:40px;
        background: linear-gradient(90deg,#FF8500,#FFDFBC);
    }
</style>

