<template>
    <div id="c2c">
        <com-head>C2C交易</com-head>
        <div class="c2c_div1"></div>
        <div class="c2c_div2">
            <img src="../assets/image/zhishi1.png" class="c2c_img1" alt="">
        </div>
        <div class="c2c_div4">
          <div class="c2c_div3" v-for="(item,index) in list" :key="index" @click="tiao(item.route)">
                 <p><img :src="item.img" alt=""></p>
                 <p class="c2c_p1">{{item.title}}</p>
          </div>
        </div>
        <div class="c2c_div5">
            <div class="c2c_div6">
                <p class="c2c_p2" :class="[hide==true?'active':'']" @click="indexs">挂卖</p>
                <p class="c2c_p3" :class="[hide1==true?'active':'']" @click="indexs1">挂买</p>
            </div>
        </div>
        <div v-if="hide">
         <div class="c2c_div7" v-for="(item,index) in str1" :key="index">
                <p class="c2c_p4"><img :src="item.img" alt="" class="c2c_img2"></p>
                <div class="c2c_div8">
                    <p class="c2c_p5">{{item.title}}</p>
                    <p class="c2c_p6">{{item.content}}</p>
                </div>
                <p class="c2c_p7">{{item.buy}}</p>
            </div>
         </div>

       <div v-if="hide1">
         <div class="c2c_div7" v-for="(item,index) in str1" :key="index">
                <p class="c2c_p4"><img :src="item.img" alt="" class="c2c_img2"></p>
                <div class="c2c_div8">
                    <p class="c2c_p5">{{item.title}}</p>
                    <p class="c2c_p6">{{item.content}}</p>
                </div>
                <p class="c2c_p8">{{item.buy}}</p>
            </div>
         </div>
    </div>
</template>
<script>
    export default{
        data(){
            return{
                 hide:true,
                 hide1:false,
                str1:[
                    {
                        img:require('../assets/image/c2c2.png'),
                        title:'我是挂卖的用户名',
                        content:'挂卖数量：50',
                        buy:"卖入"
                    },
                    {
                        img:require('../assets/image/c2c2.png'),
                        title:'我是挂卖的用户名',
                        content:'挂卖数量：50',
                        buy:"卖入"
                    },
                    {
                        img:require('../assets/image/c2c2.png'),
                        title:'我是挂卖的用户名',
                        content:'挂卖数量：50',
                        buy:"卖入"
                    },
                    
                ],
                  list:[
            {
                img:require('../assets/image/c2c1.png'),
                title:'我要挂买',
                route:'c2c_gua'
            },
            {
                img:require('../assets/image/c2c2.png'),
                title:'我要挂卖',
                route:'c2c_gua1'
            },
            {
                img:require('../assets/image/c2c3.png'),
                title:'交易中订单',
                route:'jiaoyi'
            },
            {
                img:require('../assets/image/c2c4.png'),
                title:'历史订单',
                route:'lishi'
            }
        ]
            }
        },
        methods:{
            indexs(){
                this.hide=true;
                this.hide1=false
            },
            indexs1(){
                this.hide=false;
                this.hide1=true
            },
            tiao(route){
                this.$router.push({path:route})
            }
        }
      
    }
</script>
<style scoped>
.active{
    color:#FF8500;
    border-bottom:1px solid #FF8500;
}
    .c2c_div1{
        width:100%;
        height:90px;
    }
    .c2c_div2{
        width:100%;
        height:500px;
    }
    .c2c_img1{
        width:92%;
        margin:30px 4%; 
    }
    .c2c_div3{
        float:left;
        width:25%;
        
    }
    .c2c_div4{
        width:92%;
        margin:0px 4%;
        margin-top:-50px;
        text-align:center;
    }
    .c2c_p1{
        font-size:24px;
        color:#666666;
    }
    .c2c_div5{
        float:left;
        width:92%;
        background:#fff;
        margin:0px 4%;
        margin-top:30px;
        border-bottom:1px solid #eee;
    }
   .c2c_div6{   
       width:100%;
       height:80px;
       line-height:80px;
       border-radius:10px;
       text-align:center;
    }
    .c2c_div8{
        margin-top:20px;
    }
    .c2c_p2{
      float:left;
      margin-left:220px;
    }
    .c2c_p3{
       float:right;
        margin-right:220px;
    }
    .c2c_div7{
        float:left;
        width:92%;
        height:150px;
        background:#fff;
        margin:0px 4%;
        border-top:1px solid #eee;
    }
    .c2c_img2{
        width:80px;
        height:80px;
        border-radius:50%;
        margin-top:30px;
        margin-left:30px;
    }
    .c2c_p4{
        float:left;
        margin-right:25px;
    }
    .c2c_p5{
        font-size:27px;
    }
    .c2c_p6{
        float:left;  
        color:#999999;
        font-size:25px;
    }
    .c2c_p7,.c2c_p8{
        float:right;
        width:120px;
        height:50px;
        line-height:50px;
        background:#EC0000;
        color:#fff;
        font-size:25px;
        text-align:center;
        border-radius:6px;
        margin-top:-20px;
        margin-right:30px;
    }
    .c2c_p8{
        background:#448DFF;
    }
</style>
