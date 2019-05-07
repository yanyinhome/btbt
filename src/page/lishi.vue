<template>
    <div  :class="[handClick==true?'lishi':'lishi1']">
        <com-head>历史订单</com-head>
        <div class="lishi_div1" ></div>
        <div class="move" v-if="handClick" @click="dian"></div>
        <div class="lishi_div2">
            <p class="lishi_p1" :class="[hide==true?'active':'']" @click="indexs">我的挂买</p>
            <p class="lishi_p1" :class="[hide1==true?'active':'']" @click="indexs1">我的挂买</p>
        </div>

        <div v-if="hide">
         <div class="jiaoyi_div3" v-for="(item,index) in list1" :key="index">
            <p class="jiaoyi_p3">交易时间：{{item.time}}</p>
            <div class="jiaoyi_div4">
                <p class="jiaoyi_p4">剩余数量：<span class="jiaoyi_span1"> {{item.num}}</span></p>
                <p class="jiaoyi_p5">挂买单价：<span class="jiaoyi_span1">{{item.price}}</span></p>
            </div>
            <div class="jiaoyi_div5">
                <span class='jiaoyi_span2'></span>
                <p class="jiaoyi_p8" @click="str">取消订单</p>
            </div>
         </div>
       </div>

        <div v-if="hide1">
         <div class="jiaoyi_div3" v-for="(item,index) in list1" :key="index">
            <p class="jiaoyi_p3">交易时间：{{item.time}}</p>
            <div class="jiaoyi_div4">
                <p class="jiaoyi_p4">剩余数量：<span class="jiaoyi_span1"> {{item.num}}</span></p>
                <p class="jiaoyi_p5">挂买单价：<span class="jiaoyi_span1">{{item.price}}</span></p>
            </div>
            <div class="jiaoyi_div5">
                <span class='jiaoyi_span2'></span>
                <p class="jiaoyi_p8" @click="str">取消订单</p>
            </div>
         </div>
       </div>
<!--弹框-->
    <div class="button" v-if="handClick">
        <p class="button_p1">确认取消订单？</p>
        <p class="button_p2">取消订单后您的挂单数额将返回到您的账户余额中</p>
       <div class="button_div1">
           <p class="button_p3" @click="dian">取消</p>
           <p class="button_p3" @click="dian1">删除</p>
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
                handClick:false,
            list1:[
                    {
                        time:'2018-09-29 09:30:25',
                        num:50,
                        price:'￥1.0'
                    },
                    {
                        time:'2018-09-29 09:30:25',
                        num:50,
                        price:'￥1.0'
                    }, {
                        time:'2018-09-29 09:30:25',
                        num:50,
                        price:'￥1.0'
                    }
                ]
                }
        },
        methods:{
            indexs(){
                this.hide=true;
                this.hide1=false;
            },
             indexs1(){
                this.hide=false;
                this.hide1=true;
            },
            str(){
                this.handClick=true;
            },
            //取消
            dian(){
                this.handClick=false
            },
            //删除
             dian1(){
                this.handClick=false
            }
        }
    }
</script>
<style scoped>
.lishi{
    position: relative;
    overflow:hidden;
}
.lishi1{
    position: relative;
   
}
.active{
    color:#FF8500;
    border-bottom:2px solid #FF8500;
}
.move{
    position:fixed;
    top:0;
    left:0;
    right:0;
    bottom:0;
    opacity:0.6;
    background:#000;
}
    .lishi_div1{
        width:100%;
        height:100px;
    }
.lishi_div2{
    width:100%;
    height:100px;
    line-height:100px;
    border-bottom:1px solid #E1EDFF;
    padding:0px 150px;
}
.lishi_p1{
    float:left;
    width:150px;
    text-align:center;
    margin-left:80px;
}
 .jiaoyi_div3{
        width:92%;
        margin:30px 4%;
        padding-bottom:25px;
        background:#fff;
    }
    .jiaoyi_p3{
        width:92%;
        margin:30px 4%;
        height:60px;
        line-height:60px;
        color:#666666;
        font-size:28px;
        margin-left:30px;
        border-bottom:1px solid #eee;
    }
    .jiaoyi_div4{
        display:inline-block;
        margin-left:30px;
        color:#999999;
    }
    .jiaoyi_span1{
        color:#000;
    }
    .jiaoyi_p8{ 
        width:160px;
        height:70px;
        line-height:70px;
        text-align:center;
        color:#fff;
        background:#448DFF;
        border-radius:10px;
        margin-right:30px;
        margin-top:20px;
        margin-left:50px;
    }
    .jiaoyi_span2{
        float:left;
        width:1px;
        height:100px;
        background: #dddddd;;
    }
    .jiaoyi_div5{
        float:right;
    }
    .button{
        position:fixed;
        top:600px;
        left:100px;
        width:560px;
        height:300px;
        background:#F8F8F8;
        text-align:center;
        border-radius:22px;
    }
    .button_p1{
        font-size:35px;
        font-weight:bold;
        margin-top:30px;
    }
    .button_p2{
        width:92%;
        margin:0px 4%;
        color:gray;
        font-size:26px;
    }
    .button_p3{
        display:inline-block;
        width:49%;
        height:95px;
        line-height:95px;
        margin-top:2px;
        text-align:center;
        color:#007AFF;
        border-right:1px solid #999999;
    }
  
    .button_div1{
        border-top:1px solid #999999;
        margin-top:10px;
    }
</style>

