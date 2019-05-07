<template>
    <div id="zhanghu">
        <div class="zhanghu_div1">
            <div class="zhanghu_div3">
                 <p class="zhanghu_p1"><img src="../assets/image/zhanghu1.png" alt=""></p>   
                 <div class="zhanghu_div4">
                     <p class="zhanghu_p2">登录/注册</p>
                 </div>
            </div>
        </div>
        <div class="zhanghu_div2" >
            <div class="zhanghu_div5" v-for="(item,index) in list" :key="index">
                <p class="zhanghu_p4"><img :src="item.img" class="zhanghu_img1"  alt=""></p>
                <p class="zhanghu_p5">{{item.title}}</p>
                <p class="zhanghu_p6"><img :src="item.img1" alt=""></p>
            </div>
        </div>
        <div class="zhanghu_div7"></div>
        <com-foot></com-foot>
    </div>
</template>
<script>
    export default{
        data(){
            return{
               list:[
                   {
                       img:require('../assets/image/zhang1.png'),
                       title:'我的邀请',
                       img1:require('../assets/image/zhang10.png')
                   },{
                       img:require('../assets/image/zhang2.png'),
                       title:'支付信息',
                       img1:require('../assets/image/zhang10.png')
                   },
                   {
                       img:require('../assets/image/zhang3.png'),
                       title:'实名认证',
                       img1:require('../assets/image/zhang10.png')
                   },
                   {
                       img:require('../assets/image/zhang4.png'),
                       title:'安全中心',
                       img1:require('../assets/image/zhang10.png')
                   },
                   {
                       img:require('../assets/image/zhang5.png'),
                       title:'邀请返佣',
                       img1:require('../assets/image/zhang10.png')
                   },
                   {
                       img:require('../assets/image/zhang6.png'),
                       title:'平台公告',
                       img1:require('../assets/image/zhang10.png')
                   },
                   {
                       img:require('../assets/image/zhang7.png'),
                       title:'客服中心',
                       img1:require('../assets/image/zhang10.png')
                   },
                   {
                       img:require('../assets/image/zhang8.png'),
                       title:'当前版本',
                       img1:require('../assets/image/zhang10.png')
                   },
                   {
                       img:require('../assets/image/zhang9.png'),
                       title:'下载APP',
                       img1:require('../assets/image/zhang10.png')
                   },
               ]
            }
        }
    }
</script>
<style scoped>
    .zhanghu_div1{
        width:100%;
        height:400px;
        background:#448DFF;
        border-bottom-left-radius: 90px;
        border-bottom-right-radius: 90px;
    }
    .zhanghu_div2{
        width:92%;
        background:#fff;
        margin:0px 4%;
        margin-top:-100px;
        border-radius:12px;
    }
    .zhanghu_div3{
        width:92%;
        margin:0px 4%;
       padding-top:130px;
    }
    .zhanghu_p1{
        float:left;
        margin-right:30px;
    }
   .zhanghu_p2{
       font-size:35px;
   }
    .zhanghu_div4{
       color:#fff;
       margin-top:10px;
    }
    .zhanghu_p3{
        float:left;
        width:160px;
        height:35px;
        border-radius:8px;
        text-align:center;
        line-height:35px;
        font-size:10px;
        background:#D8D8D8;
    }
    .zhanghu_div5{
        clear: both;
        width:92%;
        height:100px;
        line-height:100px;
        border-top:1px solid #DDDDDD;
        margin:0px 4%;
    }
    .zhanghu_p4{
       float:left;
       margin-top:8px;
       margin-right:30px;
    }
    .zhanghu_p5{
       display:inline-block;
    }
      .zhanghu_p6{
       float:right;
    }
    .zhanghu_img1{
        display:inline-block;
    }
    .zhanghu_div6{
        clear: both;
        width:92%;
         height:80px;
        line-height:80px;
        margin:30px 4%;
        background:#fff;
        text-align:center;
        font-size:25px;
        color:#EC0000;
    }
    .zhanghu_div7{
        width:100%;
        height:150px;
    }
</style>

