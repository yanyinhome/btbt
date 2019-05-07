<template>
    <div id="haibao">
        <div class="move" v-if="tan"></div>
         <div class="alert" v-if="tan"> 
             <p class="float"><img src="../assets/image/jian.png" class="alert_img2"  alt=""></p>
              <p class="float">请在浏览器打开</p>
       <img src="../assets/image/aaaa.png" class="alert_img1" alt="">
       <div class="yong_p4">
            <p class="yong_p3">安全 · 稳定 · 可靠</p>
            <p class="yong_p2">全球领先多元化资产服务交易平台</p>
        </div>
        </div>
        <div class="hai_div1" >
           <!--<div class="move" v-if="tan"></div>-->
           <p class="hai_p1"> <img src="../assets/image/login22.png" alt="" class="hai_img1" ></p>
          <p class="hai_p2"><img src="../assets/image/hai1.png" alt="" class="hai_img1" ></p>  
        </div>
        <div class="hai_div2">
            <p class="hai_p3"><img src="../assets/image/hai3.png" class="hai_img2"  alt=""></p>
            <div class="hai_div3" @click="downs()">
                <div class="hai_div4" >
                 <p class="hai_p4"> 免苹果ID下载</p>
                 <p class="hai_p5">IOS</p>
                </div>
                <p class="hai_p6"><img src="../assets/image/hai2.png" class="hai_img3" alt=""></p>
            </div>
            <div class="hai_div5" @click="downs1()">
                <div class="hai_div4" >
                 <p class="hai_p7"> 安卓官方客户端下载</p>
                 <p class="hai_p8">Androld</p>
                </div>
                <p class="hai_p6"><img src="../assets/image/hai4.png" class="hai_img3" alt=""></p>
            </div>
        </div>
        <div class="hai_div6">
            <div class="hai_div7">
                  <p class="hai_p9">市场行情价格，随时随地一手掌握</p>  
                  <p class="hai_p10">·市场价格一目了然</p>
                  <p class="hai_p10">·交易数据实时更新</p>
            </div>
        </div>
         <div class="hai_div6">
            <div class="hai_div8">
                  <p class="hai_p9">多币种资产管理</p>  
                  <p class="hai_p10">·支持多币种，轻松管理数字资产</p>
                  <p class="hai_p10">·安全稳定，存钱更放心</p>
                  <p class="hai_p11"><img src="../assets/image/hai8.png" alt="" class="hai_img4"></p>
            </div>
        </div>
         <div class="hai_div6">
            <div class="hai_div8">
                  <p class="hai_p9">闪电转存</p>  
                  <p class="hai_p10">·充提自由，站内充提数量不限制</p>
                  <p class="hai_p10">·超低手续费闪电转存</p>
                  <p class="hai_p11"><img src="../assets/image/hai7.png" alt="" class="hai_img4"></p>
            </div>
        </div>
         <div class="hai_div6">
            <div class="hai_div8">
                  <p class="hai_p9">账户体系应用，多层加密技术保护</p>  
                  <p class="hai_p10">.多重密码保护，手机信息验证，实名认证</p>
                  <p class="hai_p10">·设置顶级防欺诈系统，严格遵守交易行业规范</p>
                  <p class="hai_p11"><img src="../assets/image/hai10.png" alt="" class="hai_img4"></p>
            </div>
        </div>
        <div class="hai_div99">
            <p class="hai_p99">BTOX LIMETED于2017年在中东国家伊朗注册</p>
            <p class="hai_p99">&copy;2018 BTOX.org</p>
        </div>
    </div>
</template>
<script>
    export default{
        data(){
            return{
                list:[],
                ios_url:'',
                an_url:"",
                tan:false,
                
            }
        },
        methods:{
            down(){
                this.axios.post('index.php/index/apiuser/down',{
                token:sessionStorage.getItem('token')
            }).then((res)=>{
                console.log(res);
                this.list=res.data.data
                this.ios_url=res.data.ios_url
                this.an_url=res.data.an_url
            })
            },
            guan(){
                this.tan=false
            },
            downs(){
              window.location.href=this.ios_url
            },
            downs1(){
              window.location.href=this.an_url
            }
        },
         created(){
             this.down();
                var ua = navigator.userAgent.toLowerCase();
　　            var isWeixin = ua.indexOf('micromessenger') != -1;
　　   if (isWeixin) {
                     this.tan=true 
　　  }else{
   　 　//this.tan=true;     
       return false
　　}
        }
    }
</script>
<style scoped>
.alert_img2{
    margin-top:-140px;
}
.float{
    float:right;
    margin-right:20px;
}
.yong_p4{
    margin-top:-160px;
}
.alert_img1{
   transform: scale(0.3);
   margin:0 auto;
}
.move{
  position: fixed;
  top:0;
  left:0;
  bottom:0;
  right:0;
  background: #000;
  opacity:0.8;
  z-index:100;
}
.alert_p1{
  display:inline-block;
  width:50px;
  height:50px;
  line-height:50px;
  text-align: center;
  border-radius:50%;
  background:#FF8500;
  vertical-align: middle;
}
.yong_p2{
    font-size:32px;
}
.yong_p3{
font-size:32px;

}
#haibao{
    position: relative;
}
.alert{
    position: fixed;
    top:150px;
    width:100%;
    height:80px;
    color:#fff;
    line-height:80px;
    text-align:center;
    z-index:500;
}
.hai_div1{
    width:100%;
    height:120px;
    line-height:120px;
    background: #fff;
}
.hai_p1{
   float:left;
    width:40%;
    margin-top:10px;
    margin-left:45px;
}
.hai_p2{
    float:left;
    width:25%;
    margin-left:60px;
    margin-top:-7px;
}
.hai_img1{
    width:100%;
}
.hai_div2{
    width:100%;
    padding-bottom:70px;
    background:linear-gradient(120deg, #7AAEFF, #448DFF);
}
.hai_p3{
    width:92%;
    margin:0px 4%;
}
.hai_img2{
    width:100%;
    margin-top:15px;
}
.hai_div3{
    background:#9ED5FF;
    width:60%;
    margin:0px 20%;
    height:100px;
    margin-top:50px;
    border-radius:12px;
}
.hai_div5{
    width:60%;
    margin:0px 20%;
    height:100px;
    border-radius:12px;
    border:3px solid #fff;
    margin-top:35px;
}
.hai_div4{
    float:left;
}
.hai_p4{
    color:#1057C7;
    font-size:20px;
    margin-left:30px;
    font-weight: bold;
    margin-top:5px;
}
.hai_p7{
    color:#fff;
    font-size:20px;
    margin-left:30px;
    font-weight: bold;
    margin-top:5px;
}
.hai_p5{
color:#1057C7;
margin-left:30px;
font-size:35px;
font-weight: bold;
margin-top:-10px;
}
.hai_p8{
color:#fff;
margin-left:30px;
font-size:35px;
font-weight: bold;
margin-top:-10px;
}
.hai_p6{
    float:right;
    width:30px;
    margin-right:50px;
    margin-top:25px;
}
.hai_img3{
    width:100%;
}
.hai_div7{
    width:100%;
    height:600px;
    background:url('../assets/image/hai5.png') no-repeat;
    background-size:100%;
}
.hai_div8{
    width:100%;
    background-size:100%;
    background: #fff;
}
.hai_p9{
    font-size:40px;
    padding:50px  0px;
    padding-top:60px;
    margin-left:30px;
    font-weight: bold;
}
.hai_p10{
    margin-left:30px;
    color:#666666;
    font-size:27px;
}
.hai_p11{
    width:80%;
    margin:0px 10%;
    margin-top:50px;
}
.hai_img4{
    width:100%;
    height:100%;
}
.hai_div99{
    background:#222222;
    width:100%;
    text-align:center;
    font-size:20px;
    color:#999999;
    margin-top:50px;
    padding:10px 0px;
    padding-top:20px;
}
.hai_p99{
    margin-top:-10px;
}
</style>

