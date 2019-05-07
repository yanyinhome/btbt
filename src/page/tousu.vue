<template>
    <div id="tousu">
        <com-head>投诉</com-head>
        <div class="tousu_div1"></div>
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
        <p class="shen_p3"><input type="text" placeholder="请输入标题" class="shen_input1"></p>
        <textarea class="textarea" placeholder="请输入您投诉的内容" name="" id="" cols="30" rows="10"></textarea>
        <div class="shen_div6">
            <p class="shen_p4">+</p>
            <p class="shen_p5">上传截图</p>
        </div>
        <p class="shen_p6">提交投诉</p>
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
        }
    }
</script>
<style scoped>
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
.shen_div3{
        padding-bottom:30px;
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
      .shen_span1{
        display:inline-block;
        color:#000;
    }
    .tousu_div1{
        width:100%;
        height:110px;
    }
    .shen_div5{
        margin-top:20px;
    }
    .shen_p3{
        width:92%;
        margin:0px 4%;
        height:100px;
    }
    .shen_input1{
        width:100%;
        height:100px;
    }
    ::-webkit-input-placeholder{
        padding-left:30px;
        font-size:30px;
    }
    .textarea{
        width:92%;
        margin:0px 4%;
        margin-top:20px;
    }
   .shen_div6{
       width:180px;
       height:180px;
       text-align:center;
       margin-left:30px;
       border:1px dashed #999999;
       color:#999999;
       margin-top:10px;
   }
   .shen_p4{
      margin-top:40px;
   }
    .shen_p5{
      
   }
   .shen_p6{
       width:92%;
       height:80px;
       line-height:80px;
       text-align:center;
        margin-top:60px;
        border-radius:40px;
        background:#CFD0D4;
        color:#ffff;
   }
</style>

