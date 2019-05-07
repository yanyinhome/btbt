<template>
    <div id="btb_maichu">
        <com-head>订单详情</com-head>
        <div class="ding"></div>
        <div class="marchu_div1">
            <p class="marchu_p1">订单信息</p>
            <div class="marchu_div2">
                <p class="marchu_p2">
                    <span class="marchu_span1">订单号5695121548761</span>
                    <span class="marchu_span2">已匹配</span>
                </p>
                <div class="marchu_div3">
                    <div class="marchu_div4">
                        <p style="margin-top:16px;"><span style="color:rgba(153, 153, 153, 1);">挂买数量：</span>5000 BTB</p>
                        <p><span style="color:rgba(153, 153, 153, 1);">挂卖单价：</span>￥1.00</p>
                        <p><span style="color:rgba(153, 153, 153, 1);">卖出总价：</span>￥5000.00</p>
                        <p><span style="color:rgba(153, 153, 153, 1);">挂单时间：</span>2018-09-29 09：30：25</p>
                        <p><span style="color:rgba(153, 153, 153, 1);">剩余时间：</span><span style="color:rgba(236, 0, 0, 1);">29小时59分59秒</span></p>
                    </div>
                    <div class="marchu_div5">
                        <img style="width:100%;" src="../assets/image/mairu1.png" alt="">
                    </div>
                </div>
            </div>
        </div>
         <div class="marchu_div1">
            <p class="marchu_p1">匹配信息</p>
            <div class="marchu_div22">
                <div class="marchu_div3">
                    <div class="marchu_div4">
                        <p style="margin-top:16px;"><span style="color:rgba(153, 153, 153, 1);">匹配时间：</span>2018-09-29 09：30：25</p>
                        <p><span style="color:rgba(153, 153, 153, 1);">对方姓名：</span>郭**</p>
                        <p><span style="color:rgba(153, 153, 153, 1);">银行名称：</span>中国银行</p>
                        <p><span style="color:rgba(153, 153, 153, 1);">银行支行：</span>郑州市北三环中原银行</p>
                        <p><span style="color:rgba(153, 153, 153, 1);">银行卡号：</span>6224 **** **** 023
                        <span class="fu_span1">
                            <img style="width:100%;" src="../assets/image/fufu.png" alt="">
                         </span>
                         <span class="fu_span2">
                             复制
                         </span>
                        </p>
                        <p ><span style="color:rgba(153, 153, 153, 1);">支付宝号：</span>132****5655
                            <span class="fu_span1">
                            <img style="width:100%;" src="../assets/image/fufu.png" alt="">
                         </span>
                         <span class="fu_span2">
                             复制
                         </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="marchu_div6">
            <p class="marchu_p1">转款截图</p>
            <div class="marchu_div7">
                <p class="marchu_p3">* 请上传清晰的转款截图，注意此截图只可上传一次，请确定截图后再上传（只可上传一张）</p>
                <div class="marchu_p4">
                     <p class="tousu_p4"><img style="width:100%;" src="../assets/image/shensu1.png" alt=""></p>
                     <p class="tousu_p5">上传截图</p>
                </div>
                <p class="marchu_p5">确定上传</p>
            </div>
        </div>
        <div style="width:100%;background:transparent;height:15px;">

        </div>
        <div class="marchu_div8">
           <p>
                <span style="margin-left:15px;">该订单存在疑问？联系平台进行</span>
                <span style="color:rgba(32, 101, 231, 1);">订单申诉</span>
            </p>
        </div>
        <div class="marchu_div9">
            <p style="margin-top:10px;">1.为了更好的服务于平台玩家，保障所有玩家的财产安全，平台采用更科学合理的释放机制，为每一位玩家保驾护航。</p>
            <p style="margin-top:3px;">2.所有玩家参与BT挖矿，1%—2%释放，同时均可以提高释放比例，加速释放。</p>
        </div>
        <div style="width:100%;background:transparent;height:15px;">

        </div>
    </div>
</template>
<script>
  export default {
    data(){
      return{
      }
    },
    methods:{
      getOrderDetail(id,order,type){
        let token=sessionStorage.getItem('token');
        this.axios.post("index/apibtb/orderinfo",{order_id:id,token:token,})
          .then(
            res=>{
              console.log(res)
            }
          )
      }
    },
    created () {
      this.getOrderDetail(this.$route.query.id)
    }
  }
</script>
<style scoped>
.tousu_p5{
    color:rgba(153, 153, 153, 1);
    font-size:25px;
    text-align: center;
    margin-top:20px;
}
.tousu_p4{
    width:55px;
    height:50px;
    margin:0 auto;
    margin-top:40px;

}
.fu_span2{
    color:rgba(45, 145, 255, 1);
    font-size:26px;
}
.fu_span1{
    display: inline-block;
    width:25px;
    margin-left:27px;
    vertical-align: middle;
}
.marchu_div9{
    width:92%;
    margin:0px 4%;
    font-size:25px;
    line-height: 40px;
    color:rgba(236, 0, 0, 1);
    margin-bottom:50px;
}
.marchu_div8{
    width:92%;
    height:100px;
    line-height: 100px;
    margin:0px 4%;
    font-size:25px;
    background: #ffffff;
}
.marchu_p5{
    width:260px;
    height: 80px;
    line-height: 80px;
    text-align: center;
    color:#ffffff;
    border: 1px solid rgba(236, 0, 0, 1);
    border-radius:8px;
    color:rgba(236, 0, 0, 1);
    font-size:28px;
    margin:0 auto;
    margin-top:40px;
}
.marchu_p4{
    width:200px;
    height: 190px;
    border:1px dashed rgba(153, 153, 153, 1);
    border-radius:8px;
    margin:0 auto;
    margin-top:32px;
}
.marchu_p3{
    width:92%;
    margin:0px 4%;
    color:rgba(102, 102, 102, 1);
    font-size:27px;
    line-height: 40px;
}
.marchu_div7{
    width:92%;
    margin:0px 4%;
    height: 510px;
    margin-top:15px;
    padding-top:25px;
    border-radius:10px;
    background: #ffffff;
}
.marchu_div5{
    float: right;
    width:100px;
    margin-top:60px;
    margin-right:20px;
}
.marchu_div3{
    width: 92%;
    margin:0px 4%;
}
.marchu_div4{
    float: left;
}
.marchu_div4>p{
    margin-top:12px;
    font-size:29px;
}
.marchu_span1{
    float:left;
    color:rgba(153, 153, 153, 1);
    margin-left:20px;
    font-size:27px;
}
.marchu_span2{
    float:right;
    margin-right:20px;
    color:rgba(201, 51, 0, 1)
}
.marchu_p2{
    width:100%;
    height: 80px;
    line-height: 80px;
    border-bottom: 1px solid rgba(221, 221, 221, 1);
}
#btb_maichu{
    background:rgba(246, 246, 246, 1);
}
.ding{
    width:100%;
    height: 98px;
}
.marchu_p1{
    font-weight: bold;
    margin-left:30px;
    font-size:28px;
    margin-top:15px;
}
.marchu_div1{

}
.marchu_div22{
    width:92%;
    margin:0px 4%;
    height: 380px;
    border-radius:8px;
    margin-top:15px;
    background:#ffffff;
    padding-bottom: 40px;
}
.marchu_div2{
    width:92%;
    margin:0px 4%;
    height: 435px;
    border-radius:8px;
    margin-top:15px;
    background:#ffffff;
}
</style>

