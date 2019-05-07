<template>
    <div id="shen">
        <com-head>审核订单</com-head>
        <div class="shen_div1"></div>
      <div>
        <div class="shen_div2" v-for="(item,index) in list" :key="index">
            <div class="shen_div4"><p class="shen_p1">订单信息</p></div>
            <div class="shen_div3">
                <p class="shen_p2">卖出数量：<span class="shen_span1">{{item.num}}</span></p>
                <p class="shen_p2">卖出单价：<span class="shen_span1">￥{{item.price}}</span></p>
                <p class="shen_p2">卖出总价：<span class="shen_span1">￥{{item.zong}}</span></p>
                <p class="shen_p2">对方账户：<span class="shen_span1">{{item.yu}}</span></p>
                <p class="shen_p2">交易时间：<span class="shen_span1">{{item.time}}</span></p>
            </div>
        </div>
      </div>
            <div class="shen_div5">
               <div class="shen_div4"><p class="shen_p1">打款截图</p></div>
               <div class="shen_div6">

               </div>
            </div>
            <p class="shen_p3">* 如果您在审核打款截图时，发现有虚假打款信息或未收到款项，都可以投诉本订单，我们将竭尽全力帮您解决问题。</p>
        <div class="shen_div7">
            <p class="shen_p5" @click="tiao">投诉订单</p>
            <p class="shen_p4">确认收款</p>
       </div>
    </div>
</template>
<script>
    export default{
        data(){
            return{
                list:[
                    {
                        num:50,
                        price:1.00,
                        zong:50.00,
                        yu:'13325878946',
                        time:'2018-09-29 09:30:25'
                    }

                ]
            }
        },
        methods:{
            tiao(){
                this.$router.push('/tousu')
            }
        }
    }
</script>
<style scoped>
    .shen_div1{
        width:100%;
        height:110px;
    }
    .shen_div2{
        width:92%;
        background:#fff;
        margin:0px 4%;
    }
    .shen_div4{
        width:100%;
        height:80px;
        border-bottom:1px solid #eee;
    }
    .shen_p1{
        width:92%;
        height:80px;
         margin:0px 4%;
        line-height:80px;
    }
    .shen_p2{
        margin-top:25px;
        margin-left:30px;
        color:#999999;
    }
    .shen_div3{
        padding-bottom:30px;
    }
    .shen_span1{
        display:inline-block;
        color:#000;
    }
    .shen_div5{
        width:92%;
        background:#fff;
        margin:30px 4%;
    }
    .shen_div6{
        width:100%;
        height:400px;
        background:#fff;
    }
    .shen_p3{
        width:92%;
        margin:0px 4%;
        color:#EC0000;
    }
    .shen_div7{
       width:100%;
       height:200px;
       margin:70px 60px;
    }
    .shen_p4,.shen_p5{
       float:left;
       width:260px;
       height:80px;
        line-height:80px;
        border-radius:8px;
        border:1px solid #EC0000;
        text-align:center;
        color:#EC0000;
        margin-left:30px;
    }
    .shen_p5{
         color:#666666;
          border:1px solid #666666;
    }
</style>

