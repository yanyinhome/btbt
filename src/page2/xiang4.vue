<template>
    <div id="xiang">
        <div class="xiang_div1">
            <div class="zichan_div2">
                   <p class="iconfont icon-return" @click="clickBack"></p>
                   <p class="zichan_p3">订单详情</p>
             </div>
        <div class="xiang_div2">
            <div class="xiang_div3">
              <p class="xiang_p1" >
                 {{list.mai}}
              </p>
        </div>
            <p class="xiang_p2">卖出BT数量</p>
            <p class="xiang_p3">{{list.num}}</p>
            <p class="xiang_p4">
                单价：{{list.price}} CNY &nbsp;&nbsp;&nbsp;
                <span class="xiang_span1"></span>
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 卖出总价：{{list.money}} CNY 
            </p>
        </div>
        </div>
        <div class="fixed"></div>
        <div class="xiang_div4">
            <p class="xiang_p5">交易信息</p>
        </div>
        <div class="xiang_div5">
            <div class="xiang_div6">
                <!--<p class="xiang_p6" v-if="list.dakua!=''">打款方</p>
                <p class="xiang_p6" v-if="list.phone!=''">手机号</p>
                <p class="xiang_p6" v-if="list.email!=null">邮箱地址</p>
                <p class="xiang_p6" v-if="list.open_bank!=''">开户行</p>
                <p class="xiang_p6" v-if="list.bank_name!=''">支行名称</p>
                <p class="xiang_p6" v-if="list.bank_num!=''">银行卡账户</p>
                <p class="xiang_p6" v-if="list.alipay_num!=''">支付宝账号</p>-->
                <p class="xiang_p6" v-if="list.phone!=''">姓名</p>
                <p class="xiang_p6" v-if="list.phone!=''">手机号</p>
            </div>
             <div class="xiang_div7">
               <p class="xiang_p6" v-if="list.phone!=''">{{list.dakua}}</p>
                <p class="xiang_p6" v-if="list.phone!=''">{{list.phone}}</p>
                <!--<p class="xiang_p6" v-if="list.dakua!=''">{{list.dakua}}</p>
                <p class="xiang_p6" v-if="list.phone!=''">{{list.phone}}</p>
                <p class="xiang_p6" v-if="list.email!=null">{{list.email}}</p>
                <p class="xiang_p6" v-if="list.open_bank!=''">{{list.open_bank}}</p>
                <p class="xiang_p6" v-if="list.bank_name!=''">{{list.bank_name}}</p>
                <p class="xiang_p6" v-if="list.bank_num!=''">{{list.bank_num}}</p>
                <p class="xiang_p6" v-if="list.alipay_num!=''">{{list.alipay_num}}</p>-->
       
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
            </div>
             <div class="xiang_div7">
                <p class="xiang_p6">{{list.order_number}}</p>
                <p class="xiang_p7">{{list.status}}</p>
                <p class="xiang_p6">{{list.create_time}}</p>
            </div>
        </div>
        <div class="xiang_div9">
            <p class="xiang_p8">打款截图</p>
            <div class="xiang_div10">
                <div class="xiang_div11">
                        <img :src="'http://'+list.img" alt="" class="kuan">
                </div> 
            </div>
        </div>
    </div>
</template>
<script>
export default {
  data() {
    return {
      list: []
    };
  },
  methods: {
    clickBack() {
      this.$router.go(-1);
    }
  },
  created() {
    this.axios
      .post("index.php/index/apifinance/orderinfo", {
        type: this.$route.query.type,
        token: sessionStorage.getItem("token"),
        order_id: this.$route.query.order_id,
        order: 2
      })
      .then(res => {
        console.log(res);
        this.list = res.data.data;
      });
  }
};
</script>
<style scoped>
.on {
  background: red;
}
.active {
  background: #1b9a31;
}
.kuan {
  width: 100%;
  height: 400px;
}
.xiang_div1 {
  position: fixed;
  width: 100%;
  height: 400px;
  background: #448dff;
}
.fixed{
  width:100%;
  height:100px;
}
.xiang_div3 {
  width: 60px;
  height: 60px;
  border-radius: 50%;
}
.xiang_p1 {
  width: 50px;
  height: 50px;
  line-height: 50px;
  background: #1b9a31;
  border-radius: 50%;
  color: #fff;
  border: 5px solid #fff;
  font-size: 20px;
  text-align: center;
  margin-left: 345px;
}
.zichan_div2 {
  width: 100%;
  height: 120px;
  line-height: 120px;
  color: #fff;
}
.zichan_p3 {
  display: inline-block;
  text-align: center;
  margin-left: 255px;
  font-weight: bold;
  font-size: 32px;
}
.iconfont {
  float: left;
  margin-left: 30px;
}
.xiang_div2 {
  text-align: center;
}
.xiang_p2 {
  color: #ffffff;
  font-size: 26px;
  margin-top: 20px;
}
.xiang_p3 {
  color: #fff;
  margin-top: -10px;
  font-size: 25px;
  font-weight: 50px;
}
.xiang_p4 {
  color: #fff;
  font-size: 22px;
  margin-left: 110px;
  margin-top: 10px;
}
.xiang_span1 {
  display: inline-block;
  width: 2px;
  height: 20px;
  background: #fff;
  margin-top: 10px;
}
.xiang_p5 {
  margin-left: 30px;
  height: 80px;
  line-height: 80px;
  font-size: 25px;
  font-weight: bold;
}
.xiang_div5 {
  width: 100%;
  background: #fff;
  overflow: auto;
}
.xiang_div6 {
  display:inline-block;
  margin-left: 30px;
  color: #666666;
  font-size: 25px;
}
.xiang_div7 {
  float: right;
  margin-right: 30px;
  text-align: right;
  font-size: 25px;
}
.xiang_p6,
.xiang_p7 {
  margin-top: 15px;
}
.xiang_div8 {
  width: 100%;
  height: 230px;
  background: #fff;
}

.xiang_p6,
.xiang_p7 {
  margin-top: 15px;
}
.xiang_p7 {
  color: red;
}
.xiang_p8 {
  margin-left: 30px;
  height: 80px;
  line-height: 80px;
  font-size: 25px;
  font-weight: bold;
}
.xiang_div10 {
  width: 100%;
  height: 400px;
  background: #fff;
  padding-top: 50px;
}
.xiang_p9 {
  margin-left: 30px;
  line-height: 100px;
  color: red;
  font-size: 25px;
}
.xiang_div11 {
  width: 80%;
  height: 330px;
  margin: 30px 10%;
  margin-top: 0;
  border: 2px dashed #999999;
  border-radius: 12px;
  text-align: center;
}
.xiang_p10 {
  margin-top: 80px;
}
.xiang_p11 {
  color: #999999;
  margin-top: 10px;
  font-size: 25px;
}
.xiang_p12 {
  width: 60%;
  height: 80px;
  line-height: 80px;
  background: #ff8500;
  color: #fff;
  text-align: center;
  margin: 60px auto;
  border-radius: 40px;
  font-size: 25px;
}
.xiang2_p1 {
  width: 92%;
  margin: 0px 4%;
  color: #ec0000;
  font-size: 25px;
}
.xiang2_div1 {
  margin: 30px 50px;
}
.xiang2_p2,
.xiang2_p3 {
  float: left;
  width: 260px;
  height: 70px;
  line-height: 70px;
  text-align: center;
  color: #666666;
  border: 2px solid #666666;
  border-radius: 10px;
  margin-left: 40px;
  margin-bottom: 50px;
  font-size: 25px;
}
.xiang2_p3 {
  color: #ec0000;
  border: 2px solid #ec0000;
}
</style>

