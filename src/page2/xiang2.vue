<template>
    <div id="xiang">
        <div class="xiang_div1">
            <div class="zichan_div2">
                   <p class="iconfont icon-return" @click="clickBack"></p>
                   <p class="zichan_p3">订单详情</p>
             </div>
             
        <div class="xiang_div2">
            <div class="xiang_div3">
              <p class="xiang_p1">
                 买
              </p>
            </div>
            <p class="xiang_p2">卖出BT数量</p>
            <p class="xiang_p3">50000</p>
            <p class="xiang_p4">
                单价：1.00 CNY &nbsp;&nbsp;&nbsp;
                <span class="xiang_span1"></span>
               &nbsp;&nbsp;&nbsp; 卖出总价：50000.00 CNY 
            </p>
        </div>
        </div>
        <div class="xiang_div4">
            <p class="xiang_p5">交易信息</p>
        </div>
        <div class="xiang_div5">
            <div class="xiang_div6">
                <p class="xiang_p6">收款方</p>
                <p class="xiang_p6">手机号</p>
                <p class="xiang_p6">邮箱地址</p>
                <p class="xiang_p6">交易银行</p>
                <p class="xiang_p6">银行卡账户</p>
                <p class="xiang_p6">支付宝账号</p>
            </div>
             <div class="xiang_div7">
                <p class="xiang_p6">李刚</p>
                <p class="xiang_p6">1313953873</p>
                <p class="xiang_p6">190658@qq.com</p>
                <p class="xiang_p6">中国银行</p>
                <p class="xiang_p6">4414</p>
                <p class="xiang_p6">1351352674</p>
            </div>
        </div>
         <div class="xiang_div4">
            <p class="xiang_p5">订单信息</p>
        </div>
        <div class="xiang_div8">
            <div class="xiang_div6">
                <p class="xiang_p6">订单号</p>
                <p class="xiang_p6">订单状态</p>
                <p class="xiang_p6">交易时间</p>
                <p class="xiang_p6">剩余支付时间</p>
            </div>
             <div class="xiang_div7">
                <p class="xiang_p6">123456789</p>
                <p class="xiang_p7">已匹配</p>
                <p class="xiang_p6">2017-10-01 10：20：09</p>
                 <p class="xiang_p7">5小时48分16秒</p>
            </div>
        </div>
        <div class="xiang_div9">
            <p class="xiang_p8">打款截图</p>
            <div class="xiang_div10">
                <div class="xiang_div11">
                </div> 
             <p class="xiang2_p1">* 如果您在审核打款截图时，发现有虚假打款信息或未收到款项，都可以投诉本订单，我们将竭尽全力帮您解决问题。</p>  
                <div class="xiang2_div1">
                    <p class="xiang2_p2">投诉订单</p>
                    <p class="xiang2_p3">确认收款</p>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
   export default{
        methods:{
            clickBack(){
                this.$router.go(-1);
            }
        },
       
    }
</script>
<style scoped>  
.xiang_div1{
    width:100%;
    height:400px;
    background:#448DFF;
}
.xiang_div3{
    width:60px;
    height:60px;
    border-radius:50%;
}
.xiang_p1{
    width:50px;
    height:50px;
    line-height:50px;
    background:#1B9A31;
    border-radius:50%;
    color:#fff;
    border:5px solid #fff;
    font-size:20px;
     text-align:center;
    margin-left:345px;
}
  .zichan_div2{
        width:100%;
        height:120px;
        line-height:120px;
        color:#fff;
    }
     .zichan_p3{
        display:inline-block;
        text-align:center;
        margin-left:255px;
        font-weight:bold;
        font-size:32px;
    }
    .iconfont{
        float:left;
        margin-left:30px;
    }
    .xiang_div2{
        text-align:center;
    }
    .xiang_p2{
        color:#FFFFFF;
        font-size:26px;
        margin-top:20px;
        
    }
.xiang_p3{
    color:#fff;
    margin-top:-10px;
    font-size:25px;
    font-weight:50px;
}
.xiang_p4{
    color:#fff;
    font-size:22px;
    margin-left:110px;
    margin-top:10px;
}
.xiang_span1{
    display:inline-block;
    width:2px;
    height:20px;
    background:#fff;
    margin-top:10px;
}
.xiang_p5{
    margin-left:30px;
    height:80px;
    line-height:80px;
    font-size:25px;
    font-weight:bold;
}
.xiang_div5{
    width:100%;
    height:420px;
    background:#fff;
}
.xiang_div6{
    float:left;
    margin-left:30px;
    color:#666666;
    font-size:25px;
}
.xiang_div7{
    float:right;
    margin-right:30px;
    text-align:right;
    font-size:25px;
}
.xiang_p6,.xiang_p7{
margin-top:15px; 
}
.xiang_div8{
    width:100%;
    height:290px;
    background:#fff;
    margin-top:20px;
}


.xiang_p6,.xiang_p7{
margin-top:15px; 
}
.xiang_p7{
    color:red;
}
.xiang_p8{
    margin-left:30px;
    height:80px;
    line-height:80px;
    font-size:25px;
    font-weight:bold;
}
.xiang_div10{
    width:100%;
    height:400px;
    background:#fff;
    padding-top:50px;
}
.xiang_p9{
    margin-left:30px;
    line-height:100px;
    color:red;
    font-size:25px;
}
.xiang_div11{
    width:80%;
    height:330px;
    margin:30px 10%;
    margin-top:0;
    border:2px dashed #999999;
    border-radius:12px;
    text-align:center;
}
.xiang_p10{
    margin-top:80px;
}
.xiang_p11{
    color:#999999;
    margin-top:10px;
    font-size:25px;
}
.xiang_p12{
    width:60%;
    height:80px;
    line-height:80px;
    background:#FF8500;
    color:#fff;
    text-align:center;
    margin:60px auto;
    border-radius:40px;
    font-size:25px;
}
.xiang2_p1{
    width:92%;
    margin:0px 4%;
    color:#EC0000;
    font-size:25px;
}
.xiang2_div1{
    margin:30px 50px;
}
.xiang2_p2,.xiang2_p3{
    float:left;
    width:260px;
    height:70px;
    line-height:70px;
    text-align:center;
    color:#666666;
    border:2px solid #666666;
    border-radius:10px;
    margin-left:40px;
    margin-bottom:50px;
    font-size:25px;
}
.xiang2_p3{
    color:#EC0000;
    border:2px solid #EC0000;
}
</style>

