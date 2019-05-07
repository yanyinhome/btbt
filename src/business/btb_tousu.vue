<template>
    <div id="btb_tousu">
        <com-head>投诉</com-head>
        <div class="ding"></div>
        <div class="tousu_div1">
            <div class="tousu_div2">
            <p class="tousu_p1">
               <span style="margin-left:15px;"> 订单信息</span>
            </p>
            <div class="tousu_div3">
                <p style="margin-top:15px;">
                  <span style="color:rgba(153, 153, 153, 1);">订单编号：</span>
                  <span>65962359924566</span>
               </p>
               <p style="margin-top:5px;">
                  <span style="color:rgba(153, 153, 153, 1);">匹配时间：</span>
                  <span>2018-09-31 9:45:32</span>
               </p>
               <p style="margin-top:5px;">
                  <span style="color:rgba(153, 153, 153, 1);">挂卖数量：</span>
                  <span>5000.00BTB</span>
               </p>
               <p style="margin-top:5px;">
                  <span style="color:rgba(153, 153, 153, 1);">挂卖单价：</span>
                  <span>￥1.00</span>
               </p>
               <p style="margin-top:5px;">
                  <span style="color:rgba(153, 153, 153, 1);">卖出总价：</span>
                  <span>￥5000.00</span>
               </p>
               <p style="margin-top:5px;">
                  <span style="color:rgba(153, 153, 153, 1);">对方姓名：</span>
                  <span>郭**</span>
               </p>
               <p style="margin-top:5px;">
                  <span style="color:rgba(153, 153, 153, 1);">银行账户：</span>
                  <span>6224 **** **** 023 （中国银行）</span>
               </p>
               <p style="margin-top:5px;">
                  <span style="color:rgba(153, 153, 153, 1);">支付宝号：</span>
                  <span>18037437653</span>
               </p>
            </div>
        </div>
        </div>
        <div class="tousu_div4">
                 <p class="tousu_p1">
                   <span style="margin-left:15px;"> 订单申诉</span>
                </p>
                <p class="tousu_p2">
                    <input type="text" v-model="title" class="tousu_input1" placeholder="请输入标题">
                </p>
                <p class="tousu_p3">
                    <textarea name=""  v-model="content" id="" cols="30" rows="10" placeholder="请输入您投诉的内容"></textarea>
                </p>
                <div class="tousu_div5">
                    <p class="tousu_p4"><img style="width:100%;" src="../assets/image/shensu1.png" alt=""></p>
                    <p class="tousu_p5">上传截图</p>
                </div>
                 <div class="bt2_div4" :class="title!=''&&content!=''?'active':'on'">
                   提交申诉
                </div>
                <div style="width:100%;background:#ffffff;height:80px;">

                </div>
            </div>
    </div>
</template>
<script>
export default {
    data(){
        return{
            title:'',
            content:''
        }
    },
  methods:{
      getOrderDetail(id){
        let token=sessionStorage.getItem('token');
        this.axios.post("index/apibtb/tousu",{order_id:id,token:token,type:2})
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
.active{
    background: #FF8500;
}
.on{
   background: rgba(207, 208, 212, 1);
}
.tousu_p5{
    color:rgba(153, 153, 153, 1);
    font-size:27px;
    text-align: center;
}
.tousu_p4{
    width:40px;
    height:50px;
    margin:0 auto;
    margin-top:30px;
}
.tousu_div5{
    width:150px;
    height: 150px;
    border:1px dashed rgba(153, 153, 153, 1);
    margin-left:30px;
    margin-top:20px;
    border-radius:6px;
}
.tousu_p3{
    width:92%;
    height: 220px;
    margin:0px 4%;
    margin-top:30px;
    border:1px solid rgba(233, 233, 233, 1);
}
textarea{
    margin-left:30px;
    margin-top:30px;
    height: 150px;
}
.tousu_p2{
    width:92%;
    height:100px;
    line-height: 100px;
    margin:0px 4%;
    margin-top:30px;
    border-radius:8px;
    border:1px solid rgba(233, 233, 233, 1);
}
.tousu_input1{
    height: 90px;
    line-height: 50px;
    margin-left:30px;
    margin-top:5px;
}
::-webkit-input-placeholder{
    color:rgba(153, 153, 153, 1);
    font-size:30px;
}
.tousu_div4{
    width:92%;
    margin:0px 4%;
    background: #ffffff;
    padding-bottom: 25px;
    border-radius:8px;
    margin-top:20px;
}
#btb_tousu{
    background:rgba(246, 246, 246, 1);
    padding-bottom:30px;
}
.ding{
    width:100%;
    height:98px;
}
.tousu_div1{
    width:92%;
    margin:0px 4%;
    background: #ffffff;
    padding-bottom: 25px;
    border-radius:8px;
    margin-top:12px;
}
.tousu_p1{
    width: 100%;
    height: 80px;
    line-height: 80px;
    border-bottom:1px solid rgba(221, 221, 221, 1);
}
.tousu_div3{
    width:92%;
    margin:0px 4%;
}
.bt2_div4{
   float:left;
    width:92%;
    margin:0px 4%;
    text-align:center;
    height: 80px;
    line-height: 80px;
    color:#fff;
    border-radius:50px;
    margin-top:55px;
    margin-bottom: 40px;
}
</style>

