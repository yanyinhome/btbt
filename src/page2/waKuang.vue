<template>
  <div id="app">
    <com-head>智能挖矿</com-head>
    <div class="header"></div>
    <!--定时器-->
    <div class="time" v-if="order.status==200">
      <div>智能挖矿收益时间结束</div>
      <div>
        <div class="timeBox">{{day}}</div>
        <div class="title">天</div>
        <div class="timeBox">{{hour}}</div>
        <div class="title">:</div>
        <div class="timeBox">{{minute}}</div>
        <div class="title">:</div>
        <div class="timeBox">{{second}}</div>
      </div>
    </div>
    <!--第一套板块-->
    <div class="plate">
      <div>
        <div>
          <span class="top">BT交易账户</span>
          <span class="bottom">BT {{user.bt_money}}</span>
        </div>
        <img src="../assets/image/mon.png" alt>
      </div>
      <div>
        <div>
          <span class="top">BT产量账户</span>
          <span class="bottom">BT {{user.btcl_money}}</span>
        </div>
        <img src="../assets/image/mon.png" alt>
      </div>
    </div>
    <!--第二套板块-->
    <div class="plateTwo">
      <div class="TwoTitle">
        智能挖矿账户
        <span @click="type=1" :class="type==1?'spanBg':''">交易账户</span>
        <span @click="type=2" :class="type==2?'spanBg':''">产量账户</span>
      </div>
      <div>{{user.tradbt_money}}</div>
      <div>
        <div @click="changeInto($event)" data-num="1">转入</div>
        <div @click="changeInto($event)" data-num="2">转出</div>
      </div>
    </div>
    <!--边框-->
    <div class="border"></div>
    <!--第三套板块-->
    <div class="plateThree" @click="bann()">
      <div>
        <div class="threeTitle">
          <span>BT智能挖矿</span>
          <span>规则介绍</span>
        </div>
        <div>用户充币转入智能挖矿账户，即可选择工作量即可选择工作量</div>
      </div>
      <img src="../assets/image/plate1.png" alt>
    </div>
    <!--边框-->
    <div class="border"></div>
    <!--第四套板块-->
    <div class="plateFour">
      <div class="fourTitle">欢迎加入BT智能挖矿</div>
      <div class="fourBox">
        <div>
          <span>当前BT挖矿数量</span>
          <span>{{order.money}}</span>
        </div>
        <div>
          <span>BT累计收益数量</span>
          <span>{{order.sy_money}}</span>
        </div>
      </div>
      <div class="fourButton">
        <div :class="order.status==205?'buttonStatus':''" @click="joinWK($event)" data-num="1">加入挖矿</div>
        <div :class="order.status==205?'':'buttonStatus'" @click="outWK()">退出挖矿</div>
      </div>
    </div>
    <!--边框-->
    <div class="border"></div>
    <!--第五套板块：表格展示-->
    <div class="plateFive">
      <div class="FiveHeader" @click="setFiveStatus($event)">
        <div :class="fiveStatus==1?'fiveBorder':''" data-id="1">存取时间</div>
        <div :class="fiveStatus==2?'fiveBorder':''" data-id="2">收益记录</div>
        <div :class="fiveStatus==3?'fiveBorder':''" data-id="3">申请取出记录</div>
      </div>
    </div>
    <table>
      <tr>
        <th>{{fiveStatus==1?'申请':(fiveStatus==2?'收益':'取出')}}时间</th>
        <th>{{fiveStatus==1?'申请':(fiveStatus==2?'收益':'取出')}}数量</th>
        <th>状态</th>
      </tr>
      <tr v-if="order_list=='' || order_list==undefined">
          <td>暂无</td>
          <td>暂无</td>
          <td>暂无</td>
      </tr>
      <tr v-for="(item,index) in order_list" :key="index">
        <td>{{fiveStatus==1?item.create_time:item.end_time}}</td>
        <td>{{fiveStatus==2?item.sy_money:item.money}}</td>
        <td class="tdColor">{{item.flag_type}}</td>
      </tr>
    </table>
    <!--遮罩层-->
    <div :class="['zBox',dialogFormVisible?'over':'']" @touchmove.prevent v-if="dialogFormVisible">
      <div>
        <div class="zTitle">申请智能挖矿工作量证明</div>
        <div class="zTitleTwo">选择工作量证明</div>
        <div class="zRadio" @click="setBg($event)">
          <div v-for="(value,key) in markList" :key="key" :data-num="key">
            <div :data-num="key" :data-id="value.id" :class="radio==key?'radioColor':''"></div>
            <div>
              <span :data-num="key" :data-id="value.id">工作量证明 (H) :</span>
              <span
                :data-num="key"
                :data-id="value.id"
              >周期{{value.day}}天/{{value.lixi}}挖矿，月收益率{{value.alllixi}}</span>
            </div>
          </div>
        </div>
        <div class="formBorder"></div>
        <div slot="footer" class="dialog-footer">
          <el-button @click="joinWK($event)" data-num="2">提交</el-button>
          <el-button type="primary" @click="dialogFormVisible = false">取消</el-button>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import ElementUI from "element-ui";
import { Toast, Indicator, MessageBox } from "mint-ui";
// 定时器
let timer = null;
export default {
  data() {
    return {
      // 产量账户或者交易账户
      type:1,
      status:true,
      // 用户信息
      user: "",
      // 进行中的订单
      order: "",
      // 是否有信息数组
      order_status: 0,
      // 第五板块信息数组
      order_list: "",
      /*遮罩层数据*/
      dialogFormVisible: false,
      formLabelWidth: "90%",
      /*遮罩层用户选项*/
      radio: 0,
      id: "", //用户最终选中的工作量id
      markList: "",
      /*存取时间，收益记录等切换*/
      fiveStatus: 1,
      // 倒计时的终点时间
      countDown: 0,
      day: 0, //倒计时天数
      hour: 0, //倒计时小时
      minute: 0, //倒计时分钟
      second: 0, //倒计时秒数
      bt_about:0
    };
  },
  methods: {
    // 点击加入挖矿弹出遮罩层
    joinWK(e) {
      // 判断用户点击为加入挖矿按钮
      if (e.target.dataset.num == 1) {
        if (this.order.status == 200) {
          this.$bus.$emit('toast',"您有订单正在进行中，不能再次点击加入！");
        } else {
          this.dialogFormVisible = !this.dialogFormVisible;
        }
      } else {
            MessageBox({
          message: "<span style='font-size:16px;'>确定执行提交吗？</span>",
          title:"提示",
          showCancelButton: true
        }).then(action => {
          if (action == "confirm") {
              // console.log(this.id);
            this.axios.post(
              "http://btox.sosocnc.com/index.php/index/apitrad/bt_order",
              {
                token: sessionStorage.getItem("token"),
                type_id: this.id
              }
            )
            .then(res => {
              // console.log(res);
              if(res.data.code==200){
                  this.orderButton = !this.orderButton;
                  this.getDataInfo();
                  this.$bus.$emit('toast',res.data.data);
                  this.dialogFormVisible = !this.dialogFormVisible;
              }else{
                  this.$bus.$emit('toast',res.data.data);
                  this.dialogFormVisible = !this.dialogFormVisible;
              }
            });
          } else {
            // console.log("取消");
          }
        });
      }
    },
    // 点击退出挖矿
    outWK() {
      if (this.order.status == 200) {
        MessageBox({
          message: "<span style='font-size:16px;'>确定退出挖矿吗？</span>",
          showCancelButton: true
        }).then(action => {
          if (action == "confirm") {
            this.axios
              .post(
                "http://btox.sosocnc.com/index.php/index/apitrad/bt_refund",
                {
                  token: sessionStorage.getItem("token")
                }
              )
              .then(res => {
                console.log(res);
                if (res.data.code == 200) {
                  this.getDataInfo();
                  this.$bus.$emit('toast',res.data.data);
                  clearInterval(timer);
                  this.countDown = 0;
                } else {
                  this.$bus.$emit('toast',res.data.data);
                }
              });
          } else {
            // console.log("取消");
          }
        });
      } else {
        this.$bus.$emit('toast',"您当前没有订单进行，无法退出！");
      }
    },
    /*遮罩层设置用户点击时单选高亮,并设置用户最终选中的选项*/
    setBg(e) {
      this.radio = e.target.dataset.num;
      this.id = e.target.dataset.id;
    },
    /*点击使存取时间，收益记录等切换*/
    setFiveStatus(e) {
      this.fiveStatus = e.target.dataset.id;
    },
    // 获取挖矿页面数据信息并加载倒计时
    getDataInfo() {
      Indicator.open("数据加载中");
      this.axios
        .post("http://btox.sosocnc.com/index.php/index/apitrad/btindex", {
          token: sessionStorage.getItem("token")
        })
        .then(res => {
          if (res.data.code == 200) {
            Indicator.close();
            // 转换金额 
            res.data.data.user.bt_money = this.transMoney(res.data.data.user.bt_money);
            res.data.data.user.btcl_money = this.transMoney(res.data.data.user.btcl_money);
            this.user = res.data.data.user;
            this.order = res.data.data.order;
            this.order_status = res.data.data.order_status;
            this.order_list = res.data.data.order_list;
            this.countDown = res.data.data.order.end_time;
            this.bt_about = res.data.data.bt_about
            // 判断是否有订单正在进行，是否显示倒计时，并判断加入和退出按钮
            if(this.order.status==200){
              let that = this;
              this.countDown = this.countDown-1;
              timer = setInterval(function() {
                if (that.countDown >= 0) {
                  that.day = Math.floor(that.countDown / (60 * 60 * 24));
                  that.hour = Math.floor(that.countDown / (60 * 60)) - that.day * 24;
                  that.minute =
                    Math.floor(that.countDown / 60) - that.day * 24 * 60 - that.hour * 60;
                  that.second =
                    Math.floor(that.countDown) -
                    that.day * 24 * 60 * 60 -
                    that.hour * 60 * 60 -
                    that.minute * 60;
                }
                if (that.day <= 9) that.day = "0" + that.day;
                if (that.hour <= 9) that.hour = "0" + that.hour;
                if (that.minute <= 9) that.minute = "0" + that.minute;
                if (that.second <= 9) that.second = "0" + that.second;
                if (that.countDown == 0) {
                  clearInterval(timer);
                }
                that.countDown--;
              },1000)
            }
          } else {
            Indicator.close();
            this.$bus.$emit('toast',res.data.data);
          }
        });
    },
    //转入账户和转出账户
    changeInto(e){
        // 转入账户
        if(e.target.dataset.num==1){
            MessageBox({
                message: "<span style='font-size:16px;'>确定转入账户吗？</span>",
                showCancelButton: true
            }).then(action => {
                if (action == "confirm") {
                    this.axios
                    .post(
                        "http://btox.sosocnc.com/index.php/index/apitrad/bt_recharge",
                        {
                        token: sessionStorage.getItem("token"),
                        type:this.type
                        }
                    )
                    .then(res => {
                      console.log(this.type)
                        // console.log(res);
                        if (res.data.code == 200) {
                          console.log(this.type)
                            // 重新刷新页面数据
                            this.getDataInfo();
                            this.$bus.$emit('toast',res.data.data);
                        }else{
                            this.$bus.$emit('toast',res.data.data); 
                        }
                    });
                } else {
                    // console.log("取消");
                }
            });
        }else{
        // 转出账户
            MessageBox({
                message: "<span style='font-size:16px;'>确定转出账户吗？</span>",
                showCancelButton: true
            }).then(action => {
                if (action == "confirm") {
                    this.axios
                    .post(
                        "http://btox.sosocnc.com/index.php/index/apitrad/bt_out",
                        {
                        token: sessionStorage.getItem("token")
                        }
                    )
                    .then(res => {
                        // console.log(res);
                        if (res.data.code == 200) {
                            // 重新刷新页面数据
                            this.getDataInfo();
                            this.$bus.$emit('toast',res.data.data);
                        }else{
                            if(res.data.code==200){
                                this.$bus.$emit('toast','已成功转出到账户！');
                            }else{
                                this.$bus.$emit('toast',res.data.data);  
                            }
                        }
                    });
                } else {
                    // console.log("取消");
                }
            });
        }
    },
    // 点击跳转到新闻页
    bann(){
      console.log(this.bt_about)
      this.$router.push({path:'insidePage',query:{new_id:this.bt_about}})
    },
    //金额过滤器，如果金额过万就转换   
    transMoney(value){
        if(value != undefined){
          if(value.length>9){
            value = value.replace(/[^0-9]/ig,"");
            value = value.substr(0, value.length - 2);
            if(value.length>5 && value.length<9){
              value = (value/10000).toFixed(2);
              return value+'万'
            }else if(value.length>=9){
              value = (value/100000000).toFixed(2);
                return value+'亿'
            }
            }else{
                return value
            }
        }
      }
  },
  created() {
    // 请求页面数据
    this.getDataInfo();
    // 获取遮罩层数据
      this.axios
        .post("http://btox.sosocnc.com/index.php/index/apitrad/check_type", {
          token: sessionStorage.getItem("token"),
          type: 0
        })
        .then(res => {
          console.log(sessionStorage.getItem("token"));
          if (res.data.code == 200) {
            this.markList = res.data.data.type;
            this.id = res.data.data.type[0].id;
          } else {
            this.$bus.$emit('toast',"网络有延迟，请刷新后重试！");
          }
        });
  },
};
</script>
<style>
/* toast提示框字体 */
.mint-msgbox-title{
  font-size:0.3rem !important;
}
.mint-msgbox{
  padding-top:10px;
  border-radius: 10px;
  height:270px;
  width:75%;
}
.mint-msgbox-header{
  margin-bottom:10px;
}
.mint-msgbox-btns{
  margin:20px auto 0;
  width:70%;
  justify-content: space-between;
}
.mint-msgbox-content{
  border:none;
}
.mint-msgbox-cancel,.mint-msgbox-confirm{
  color:white !important;
  border:none;
  background:#5626F5;
  height:70px;
  border-radius:15px;
  margin-left:50px;
}
.mint-msgbox-cancel{
  margin-left:0px;
  background:#999;
}
</style>
<style lang="" scoped>
/*头部导航占位*/
#app {
  background: white;
}
#pageHead {
  border-bottom: 1px solid rgba(224, 224, 224, 1);
}
.header {
  height: 0.88rem;
}
/*倒计时*/
.time {
  width: 90%;
  margin: 0 auto;
  height: 0.6rem;
  display: flex;
  justify-content: space-between;
  line-height: 0.6rem;
  color: #999999;
  font-size: 30px;
  margin-top: 50px;
}
.time > div {
  font-size: 28px;
}
.time > div:nth-child(2) {
  font-size: 30px;
}
.timeBox {
  width: 0.6rem;
  height: 0.6rem;
  line-height: 0.6rem;
  text-align: center;
  background: #5425f5;
  color: white;
  border-radius: 15px;
  margin-left: 15px;
}
.title {
  margin-left: 15px;
}
.time > div:nth-child(2) {
  display: flex;
}
/*倒计时下的第一个板块*/
.plate {
  width: 92%;
  display: flex;
  justify-content: space-between;
  color: white;
  margin: 40px auto;
}
.plate > div {
  width: 48%;
  border-radius: 30px;
  height: 140px;
  padding: 0 34px;
  box-sizing: border-box;
  padding-top: 20px;
}
.TwoTitle>span{
  float:right;
  color:white;
  font-size:24px;
  background:#5626F5;
  padding:5px 15px;
  margin-right:15px;
  border-radius:15px;
}
.TwoTitle>.spanBg{
  background: #9271ff;
}
.plate > div > div span {
  display: block;
}
.plate > div:nth-child(1) {
  background: linear-gradient(
    180deg,
    rgba(141, 76, 251, 1) 0%,
    rgba(84, 37, 245, 1) 100%
  );
}
.plate > div:nth-child(2) {
  background: linear-gradient(
    180deg,
    rgba(199, 11, 229, 1) 0%,
    rgba(150, 5, 198, 1) 100%
  );
}
.plate > div {
  display: flex;
  justify-content: space-between;
}
.plate > div > img {
  width: 50px;
  height: 50px;
  position: relative;
  top: 20px;
}
.plate .top {
  font-size: 24px;
}
.plate .bottom {
  font-size: 30px;
  position: relative;
  bottom: 10px;
}
/*倒计时下的第二个板块*/
.plateTwo {
  width: 92%;
  height: 350px;
  margin: 0 auto;
  border-radius: 30px;
  background: linear-gradient(
    270deg,
    rgba(141, 76, 251, 1) 0%,
    rgba(84, 37, 245, 1) 100%
  );
  color: white;
  padding: 36px;
  box-sizing: border-box;
  margin-bottom: 60px;
}
.plateTwo > div:nth-child(1) {
  font-size: 28px;
  color: #ebebeb;
}
.plateTwo > div:nth-child(2) {
  font-size: 52px;
  margin-top: 20px;
}
.plateTwo > div:nth-child(3) {
  width: 85%;
  margin: 0 auto;
  display: flex;
  justify-content: space-between;
  font-size: 28px;
  margin-top: 50px;
}
.plateTwo > div:nth-child(3) > div {
  width: 46%;
  height: 80px;
  background: rgba(46, 0, 175, 1);
  border-radius: 40px;
  text-align: center;
  line-height: 80px;
  color: #ebebeb;
}
/*倒计时下的第三个板块*/
.border {
  width: 100%;
  height: 20px;
  background: rgba(243, 243, 243, 1);
}
.plateThree {
  width: 87%;
  height: 260px;
  margin: 0 auto;
  display: flex;
  justify-content: space-between;
}
.plateThree img {
  width: 196px;
  height: 204px;
  position: relative;
  top: 30px;
}
.plateThree > div {
  width: 50%;
  padding-top: 70px;
  box-sizing: border-box;
}
.threeTitle > span:nth-child(1) {
  color: rgba(87, 39, 246, 1);
  font-size: 36px;
}
.threeTitle > span:nth-child(2) {
  color: #666;
  font-size: 30px;
}
.plateThree > div > div:nth-child(2) {
  margin-top: 15px;
  height: 80px;
  color: #898989;
  font-size: 28px;
  line-height: 40px;
  /*让文本内容只显示两行*/
  overflow: hidden;
  display: -webkit-box;
  -webkit-box-orient: vertical;
  -webkit-line-clamp: 2;
}
/*第四块板块*/
.plateFour {
  width: 87%;
  margin: 0 auto 50px;
  padding-top: 20px;
}
.fourTitle {
  color: #000;
  font-size: 28px;
  font-weight: bold;
}
.fourBox {
  width: 93%;
  margin: 0 auto;
  display: flex;
  justify-content: space-between;
  margin-top: 20px;
}
.fourBox > div {
  width: 46%;
  height: 140px;
  border: 2px solid #eee;
  border-radius: 20px;
  text-align: center;
  padding-top: 15px;
  box-sizing: border-box;
}
.fourBox > div > span {
  display: block;
}
.fourBox > div > span:nth-child(1) {
  color: #999;
  font-size: 28px;
}
.fourBox > div > span:nth-child(2) {
  color: #333;
  font-size: 32px;
}
.fourButton {
  width: 70%;
  margin: 30px auto;
  display: flex;
  justify-content: space-between;
}
.fourButton > div {
  width: 45%;
  height: 70px;
  line-height: 70px;
  color: #fff;
  font-size: 24px;
  text-align: center;
  background: #9271ff;
  border-radius: 10px;
}
.fourButton > div.buttonStatus {
  background: #5626f5;
}
/*第五块板块*/
.plateFive {
  width: 87%;
  margin: 0 auto;
}
.FiveHeader {
  width: 100%;
  display: flex;
  justify-content: space-between;
  color: #000;
  font-size: 28px;
  font-weight: bold;
  margin-bottom: 20px;
}
.FiveHeader > div {
  width: 30%;
  height: 100px;
  text-align: center;
  line-height: 100px;
}
.fiveBorder {
  color: #5626f5;
  border-bottom: 4px solid #5626f5;
}
table {
  border-collapse: collapse;
  width: 100%;
  text-align: center;
  color: #656565;
  font-size: 28px;
}
th {
  font-weight: normal;
}
th,
td {
  width: 33.333%;
  height: 100px;
}
table,
tr,
th,
td {
  border: 1px solid #eee;
  border-radius: 10px;
}
.tdColor {
  color: #5626f5;
}
/*遮罩层*/
.zRadio {
  width: 75%;
  margin: 0 auto;
  margin-top: 50px;
}
.zRadio > div {
  width: 100%;
  height:110px;
  display: flex;
  color: #666;
  font-size: 24px;
  line-height: 40px;
}
.zRadio > div > div:nth-child(1) {
  width: 28px;
  height: 28px;
  border-radius: 100px;
  border: 2px solid #6531f7;
  margin-right:55px;
  margin-top:20px;
}
.zRadio > div > div:nth-child(2) > span {
  display: block;
}
.formBorder {
  width: 90%;
  margin: 50px auto;
  border-bottom: 1px solid #eee;
}
.radioColor {
  background: #6531f7;
}
.el-dialog__footer {
  text-align: left;
}
.dialog-footer {
  width: 75%;
  margin: 0 auto;
  display: flex;
  justify-content: space-between;
  margin-bottom: 30px;
}
.dialog-footer > button:nth-child(1),
.dialog-footer > button:nth-child(2) {
  width: 45%;
  height: 70px;
  color: white;
  background: #6531f7;
  border-radius: 10px;
  font-size: 28px;
  border: none;
}
.dialog-footer > button:nth-child(2) {
  background: #999999;
}
.zBox {
  width: 100%;
  height: 100%;
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  z-index: 1001;
  background: rgba(0, 0, 0, 0.5);
}
.over {
  overflow: hidden;
  height: 100%;
}
.zBox > div {
  width: 90%;
  margin: 0 auto;
  background: white;
  border-radius: 10px;
  margin-top: 20vh;
  padding: 20px;
  box-sizing: border-box;
}
.zBox .zTitle {
  text-align: center;
  padding-top: 40px;
  color: #333;
  font-size: 32px;
  font-weight: bold;
}
.zBox .zTitleTwo {
  text-align: left;
  margin-top: 20px;
  padding-left: 30px;
  color: #333;
  font-size: 30px;
}
</style>