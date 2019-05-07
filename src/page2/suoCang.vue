<template>
  <div id="app">
    <com-head>锁仓计划</com-head>
    <div class="header"></div>
    <!--第一板块-->
    <div class="plateOne">
      <div class="OneHeader" @click="setHeader($event)">
        <div :class="headerStatus==key?'OneBorder':''" :data-num="key" v-for='(value,key) in curr' :key='key'>{{value.name}}</div>
      </div>
      <div class="moneyShow">
        <span>钱包数量</span>
        <span>{{user.zlb_money}}</span>
      </div>
      <div class="oneBottom">
        <div>
          <span>锁仓挖矿</span>
          <span>
            {{user.tradzlb_money}}
            <span>元</span>
          </span>
        </div>
        <div>
          <div @click="changeInto($event)" data-num="1">转入</div>
          <div @click="changeInto($event)">转出</div>
        </div>
      </div>
    </div>
    <!--边框-->
    <div class="border"></div>
    <!--第二个板块-->
    <div class="plateTwo">
      <!--定时器-->
      <div class="time" v-if='order.status==200'>
        <div>距锁仓计划收益时间结束</div>
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
      <div class="plateBottom">
        <div>锁仓计划</div>
        <div class="twoMiddle">
          <div>
            <span>当前{{curr_now.name}}挖矿数量</span>
            <span>{{order.money}}</span>
          </div>
          <div></div>
          <div>
            <span>昨天{{curr_now.name}}收益</span>
            <span>{{order.sy_money}}</span>
          </div>
        </div>
      </div>
      <div class="twoBottom">
        <div @click="joinWK($event)" data-num="1" :class="order.status==205?'buttonStatus':''">加入挖矿</div>
        <div @click="outWK()" :class="order.status==205?'':'buttonStatus'">退出挖矿</div>
      </div>
    </div>
    <!--边框-->
    <div class="border2"></div>
    <!--第三套板块-->
    <div class="plateThree" @click="bann($event)" data-id="1">
      <div data-id="1">
        <div class="threeTitle" data-id="1">
          <span>{{curr_now.name}}柚子币种</span>
          <span>详情</span>
        </div>
        <div data-id="1">用户充币转入智能挖矿账户，即可选择工作量即可选择工作量</div>
      </div>
      <img src="../assets/image/plate3.png" data-id="1">
    </div>
    <!--边框-->
    <div class="border2"></div>
    <!--第四套板块-->
    <div class="plateThree" @click="bann($event)">
      <div>
        <div class="threeTitle">
          <span>{{curr_now.name}}锁仓挖矿</span>
          <span>规则介绍</span>
        </div>
        <div>用户充币转入智能挖矿账户，即可选择工作量即可选择工作量</div>
      </div>
      <img src="../assets/image/plate2.png" alt class="image2">
    </div>
    <!--边框-->
    <div class="border2"></div>
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
        <div class="zTitle">锁仓计划工作量证明</div>
        <div class="zTitleTwo">选择工作量证明</div>
        <div class="zRadio" @click="setBg($event)">
          <div v-for="(value,key) in markList" :key="key" :data-num="key">
            <div :data-num="key" :data-id="value.id" :class="radio==key?'radioColor':''"></div>
            <div :data-num="key">
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
// 定义定时器
let timer = null;
export default {
  data() {
    return {
      /*头部EOX等切换状态*/
      curr:'',
      curr_now:'',  //页面中关键字
      headerStatus: 0,
      /*遮罩层数据*/
      dialogFormVisible: false,
      /*遮罩层用户选项*/
      radio: 0,
      id: "", //用户最终选中的工作量id
      markList: "",
      /*存取时间，收益记录等切换状态*/
      fiveStatus: 1,
      // 倒计时的终点时间
      countDown: 5,
      day: 0, //倒计时天数
      hour: 0, //倒计时小时
      minute: 0, //倒计时分钟
      second: 0,//倒计时秒数
      // 用户信息
      user: "",
      // 进行中的订单
      order: "",
      // 是否有信息数组
      order_status: 0,
      // 第五板块信息数组
      order_list: "",
    };
  },
  methods: {
    /**/
    setHeader(e) {
      this.headerStatus = e.target.dataset.num;
      // 切换导航时，把定时器清0
      this.day=0;
      this.minute=0;
      this.second=0;
      this.hour=0;
      clearInterval(timer);
      this.getDataInfo(this.curr[e.target.dataset.num].id);
    },
    /*点击使存取时间，收益记录等切换*/
    // 点击加入挖矿弹出遮罩层，并提交订单
    joinWK(e) {
      // 判断用户点击为加入挖矿按钮
      if (e.target.dataset.num == 1) {
        if (this.order.status == 200) {
          this.$bus.$emit('toast','您有订单正在进行中，不能再次点击加入！');
        } else {
          this.dialogFormVisible = !this.dialogFormVisible;
        }
      } else {
        // 判断用户点击为遮罩层最终提交按钮
        MessageBox({
          message: "<span style='font-size:16px;'>确定执行提交吗？</span>",
          title:"提示",
          showCancelButton: true
        }).then(action => {
          if (action == "confirm") {
              // console.log(this.id);
            this.axios
              .post(
                "http://btox.sosocnc.com/index.php/index/apitrad/zlb_order",
                {
                  token: sessionStorage.getItem("token"),
                  type:this.curr_now.id,
                  type_id: this.id
                }
              )
              .then(res => {
                // console.log(res);
                if(res.data.code==200){
                    this.getDataInfo(this.curr_now.id);
                    this.$bus.$emit('toast',res.data.data);
                    this.dialogFormVisible = !this.dialogFormVisible;
                }else{
                    this.dialogFormVisible = !this.dialogFormVisible;
                    this.$bus.$emit('toast',res.data.data);
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
                "http://btox.sosocnc.com/index.php/index/apitrad/zlb_refund",
                {
                  token: sessionStorage.getItem("token"),
                  type:this.curr_now.id
                }
              )
              .then(res => {
                // console.log(res);
                if (res.data.code == 200) {
                  this.getDataInfo(this.curr_now.id);
                  clearInterval(timer);
                  this.$bus.$emit('toast',res.data.data);
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
    getDataInfo(id) {
      Indicator.open("数据加载中");
      this.axios
        .post("http://btox.sosocnc.com/index.php/index/apitrad/zlbindex", {
          token: sessionStorage.getItem("token"),
          type:id
        })
        .then(res => {
            // console.log(res);
          if (res.data.code == 200) {
            Indicator.close();
            // 转换金额
            this.curr = res.data.data.curr.slice(0,3);
            this.curr_now = res.data.data.curr_now;
            this.user = res.data.data.user;
            this.order = res.data.data.order;
            this.countDown = res.data.data.order.end_time;
            this.order_status = res.data.data.order_status;
            this.order_list = res.data.data.order_list;
            // console.log(this.order_list);
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
    // 点击跳转新闻页
    bann(e){
      if(e.target.dataset.id==1){
        this.$router.push({path:'insidePage',query:{new_id:this.curr_now.about_id}})
      }else{
        this.$router.push({path:'insidePage',query:{new_id:this.curr_now.content_id}})        
      }
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
                        "http://btox.sosocnc.com/index.php/index/apitrad/zlb_recharge",
                        {
                        token: sessionStorage.getItem("token"),
                        type:this.curr_now.id
                        }
                    )
                    .then(res => {
                        // console.log(res);
                        if (res.data.code == 200) {
                            // 重新刷新页面数据
                            this.getDataInfo(this.curr_now.id);
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
                        "http://btox.sosocnc.com/index.php/index/apitrad/zlb_out",
                        {
                        token: sessionStorage.getItem("token"),
                        type:this.curr_now.id
                        }
                    )
                    .then(res => {
                        // console.log(res);
                        if (res.data.code == 200) {
                            // 重新刷新页面数据
                            this.getDataInfo(this.curr_now.id);
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
  },
  created() {
    this.getDataInfo(this.headerStatus);
    // if(window.sessionStorage.inputmes){
    //   this.countDown=Object.assgin({},countDown,JSON.parse(window.sessionStorage.inputmes));
    // }
    // if(window.localStorage.timer&&window.localStorage.timer>0&&window.localStorage.timer<60){
    //   this.totalnum=parseInt(window.localStorage.timer);
    //   this.getDataInfo();
    // }
    // 获取遮罩层数据
      this.axios
        .post("http://btox.sosocnc.com/index.php/index/apitrad/check_type", {
          token: sessionStorage.getItem("token"),
          type: 1
        })
        .then(res => {
          if (res.data.code == 200) {
            this.markList = res.data.data.type;
            this.id = res.data.data.type[0].id;
          }
        });
  },
  // watch:{
  //   inputmes:{
  //     handle(value){
  //       window.sessionStorage.inputmes = JSON.stringify(value);
  //     },
  //     deep:true
  //   }
  // }
};
</script>
<style>
/* toast提示框字体 */
.mint-msgbox-title{
  font-size:0.3rem !important;
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
/**/
.plateOne {
  width: 90%;
  margin: 0 auto;
}
.OneHeader {
  width: 90%;
  margin: 20px auto 40px;
  display: flex;
  justify-content: space-between;
  color: #666;
  font-size: 28px;
}
.OneHeader > div {
  width: 25%;
  height: 80px;
  text-align: center;
  line-height: 80px;
  padding-bottom: 10px;
}
.OneBorder {
  color: #5626f5;
  border-bottom: 3px solid #5626f5;
}
.moneyShow {
  width: 100%;
  background: #6531f7;
  border-radius: 20px;
  color: white;
  padding: 25px 0;
  box-sizing: border-box;
}
.moneyShow > span {
  display: block;
  text-align: center;
  font-size: 44px;
}
.moneyShow > span:nth-child(1) {
  font-size: 28px;
}
.oneBottom {
  width: 100%;
  margin: 0 auto;
  margin-top: 60px;
  display: flex;
  justify-content: space-between;
}
.oneBottom > div:nth-child(1) > span {
  display: block;
  color: #333;
  font-size: 32px;
  margin-bottom: 15px;
}
.oneBottom > div:nth-child(1) > span:nth-child(1) {
  font-size: 28px;
}
.oneBottom > div:nth-child(1) > span > span {
  color: #666;
}
.oneBottom > div:nth-child(2) {
  display: flex;
  justify-content: space-between;
  padding-top: 35px;
}
.oneBottom > div:nth-child(2) > div {
  width: 130px;
  height: 48px;
  color: white;
  font-size: 22px;
  background: #6531f7;
  border-radius: 50px;
  text-align: center;
  line-height: 48px;
  margin-right: 20px;
}
.oneBottom > div:nth-child(2) > div:nth-child(2) {
  background: #9271ff;
  margin-right: 0;
}
.border {
  width: 100%;
  height: 10px;
  background: rgba(243, 243, 243, 1);
  margin-top: 20px;
}
.border2 {
  width: 100%;
  height: 20px;
  background: rgba(243, 243, 243, 1);
  margin-top: 20px;
}
/*第二个板块*/
.plateTwo {
  width: 90%;
  margin: 0 auto;
}
/*定时器*/
.time {
  width: 100%;
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
.time > div:nth-child(1) {
  line-height: 40px;
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
.plateTwo > div.plateBottom {
  color: #000;
  font-size: 28px;
  margin-bottom: 35px;
  padding-bottom: 30px;
  border-bottom: 1px solid #eee;
}
.plateTwo > div.plateBottom > div:nth-child(1) {
  margin: 25px 0 35px;
}
.twoMiddle {
  width: 80%;
  display: flex;
  justify-content: space-between;
  margin: 0 auto;
}
.twoMiddle > div > span {
  display: block;
  text-align: center;
  color: #999;
  font-size: 28px;
}
.twoMiddle > div:nth-child(2) {
  border: 1px solid #eee;
  margin-left:10px;
}
.twoMiddle > div > span:nth-child(2) {
  color: #333;
  font-size: 32px;
}
.twoBottom {
  width: 70%;
  display: flex;
  justify-content: space-between;
  margin: 0 auto;
  margin-bottom: 60px;
  color: white;
  font-size: 24px;
}
.twoBottom > div {
width: 45%;
  height: 70px;
  line-height: 70px;
  color: #fff;
  font-size: 24px;
  text-align: center;
  background: #9271ff;
  border-radius: 10px;
}
.twoBottom > div.buttonStatus {
  background: #5626f5;
}
/*第三个板块*/
.plateThree {
  width: 90%;
  height: 260px;
  margin: 0 auto;
  display: flex;
  justify-content: space-between;
}
.plateThree img {
  width: 136px;
  height: 182px;
  position: relative;
  top: 30px;
}
.plateThree .image2 {
  width: 234px;
  height: 194px;
}
.plateThree > div {
  width: 55%;
  padding-top: 60px;
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
  margin-right: 50px;
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