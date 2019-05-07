<!-- -->
<template>
  <div id='home'>
    <div class="tradetop">系统首页</div>
    <div class="home">
      <div class="box1">
        <div class="trend">
          <div id='echarts'>
            <div id="myChart" :style="{width: '100%', height: '500px'}"></div>
          </div>
          <button class="day">每日</button>
        </div>
      </div>
      <div class="box2">
        <div class="news">
          <div class="newsbox1">
            <div class="title">新闻</div>
            <div class="more"><router-link tag="a" to="news"><div class="buycenter">更多》</div></router-link></div>
          </div>
          <div class="newsbox2" v-for="(item,index) in news"  @click="newsdetail(item.id)" :key="index">
            <h3>{{item.title}}</h3>
            <p>{{item.zhaiyao}}</p>
            <div class="newlook">
              <div class="left"><i class="iconfont icon-yueduliang"></i>{{item.num}}</div>     
              <div class="right"><i class="iconfont  icon-zuijinyuedu"></i>{{item.add_time}}</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="box3">
       <div class="item bg1">
          <!-- <div class="box1"><img src="../assets/image/home3.png" alt="" srcset=""></div> -->
          <div class="box2"><p>${{worth}}</p><p>EBUC币持有价值</p></div>
       </div>
       <div class="item">
          <!-- <div class="box1"><img src="../assets/image/home3.png" alt="" srcset=""></div> -->
          <div class="box2"><p>${{user.jifen_money}}</p><p>现金积分</p></div>
       </div>
       <div class="item">
          <!-- <div class="box1"><img src="../assets/image/home4.png" alt="" srcset=""></div> -->
          <div class="box2"><p>{{user.zc_money}}</p><p>注册币</p></div>
       </div>
       <div class="item">
          <!-- <div class="box1"><img src="../assets/image/home3.png" alt="" srcset=""></div> -->
          <div class="box2"><p>${{user.huigou_money}}</p><p>回购钱包</p></div>
       </div>
       <div class="item">
          <!-- <div class="box1"><img src="../assets/image/home2.png" alt="" srcset=""></div> -->
          <div class="box2"><p>{{user.fission}}</p><p>裂变次数</p></div>
       </div>
       <div class="item">
          <!-- <div class="box1"><img src="../assets/image/home3.png" alt="" srcset=""></div> -->
          <div class="box2"><p>{{user.fengding}}</p><p>封顶值</p></div>
       </div>
       <div class="item">
          <!-- <div class="box1"><img src="../assets/image/home3.png" alt="" srcset=""></div> -->
          <div class="box2"><p>{{user.shop_money}}</p><p>购物积分</p></div>
       </div>
       <div class="item">
          <!-- <div class="box1"><img src="../assets/image/home1.png" alt="" srcset=""></div> -->
          <div class="box2"><p>{{user.jihuo}}</p><p>激活码</p></div>
       </div>
    </div> 
    <!-- 弹窗 -->
    <el-dialog
      title="账户系统提示"
      :visible.sync="dialogVisible"
      width="30%">
      <span>账户未激活，请在24小时内激活该账户！</span>
      <span slot="footer" class="dialog-footer">
        <!-- <el-button @click="dialogVisible = false">取 消</el-button> -->
        <el-button type="primary" @click="dialogVisible = false">我知道了</el-button>
      </span>
    </el-dialog>
  </div>
</template>

<script>
import { mapState, mapMutations, mapGetters, mapActions } from "vuex";
export default {
  name: "",
  data() {
    return {
      isactive: "0",
      sellbuy: ["买入", "卖出"],
      news: [],
      message: [],
      user: {},
      money: "",
      dialogVisible: false,
      options: {
        title: {
          text: "EBUC走势图"
        },
        tooltip: {
          trigger: "axis"
        },
        xAxis: {
          type: "category",
          data: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"]
        },
        yAxis: {
          splitNumber: 10,
          max: 2.0,
          min: 1.0,
          type: "value",
          axisLabel: {
            formatter: function(value, index) {
              return value.toFixed(2);
            }
          }
        },
        series: [
          {
            data: [2, 2, 2, 2, 2, 2, 2],
            type: "line"
          }
        ]
      }
    };
  },
  computed: {
    worth: {
      get() {
        return (this.user.ebuc_money * this.money).toFixed(3);
      }
    }
  },
  created() {
    this.homemes();
  },
  mounted() {
    // 折线图
  },
  methods: {
    ...mapMutations(["addLogin"]),
    // storeDatato () {
    //   this.$store.commit({
    //     type: 'increment',
    //     jifen: this.user.jifen_money,
    //     bi: this.user.ebuc_money,
    //     zhucebi: this.user.zc_money,
    //     jihuoma: this.user.jihuo,
    //     name: this.user.user_name,
    //     grade: this.user.user_rank,
    //     baodan: this.user.type,  //报单中心
    //     uid: this.user.id,  //用户id
    //   })
    // },
    homemes() {
      this.axios
        .post("Index/index")
        .then(({ data }) => {
          console.log(data);
          this.news = data.new;
          this.message = data.order;
          this.user = data.user;
          this.money = data.money;
          const time = data.zhexian;
          this.options.series[0].data = [
            time.one.money,
            time.two.money,
            time.three.money,
            time.four.money,
            time.five.money,
            time.six.money,
            time.seven.money,
            time.eight.money,
            time.nine.money,
            time.ten.money
          ];
          // console.log(this.options.series[0].data);
          this.options.xAxis.data = [
            time.one.time.toLocaleString(),
            time.two.time,
            time.three.time,
            time.four.time,
            time.five.time,
            time.six.time,
            time.seven.time,
            time.eight.time,
            time.nine.time,
            time.ten.time
          ];
          console.log(this.options.xAxis.data);
          this.drawLine();
          if (sessionStorage.type) {
            sessionStorage.removeItem("type");
          } else {
            sessionStorage.setItem("type", data.user.type);
          }
          this.addLogin();
          if (data.user.status === "1" && !sessionStorage.status) {
            this.dialogVisible = true;
            sessionStorage.setItem("status", "1");
          }
        })
        .catch(function(error) {
          console.log(error);
        });
    },
    newsdetail(id) {
      console.log(id);
      this.$router.push({ name: "newsdetail", query: { id: id } });
    },
    issell(id) {
      if (this.isactive == "0") {
        this.isactive = "1";
        this.$router.push({
          name: "tradelist",
          query: { status1: "0", id: id }
        });
      } else {
        this.isactive = "0";
        this.$router.push({
          name: "tradelist",
          query: { status1: "1", id: id }
        });
      }
    },
    getsell() {
      this.homemes();
      this.isactive = "0";
    },
    // EBUC币挂买
    getbuy() {
      this.axios
        .post("Index/ebuc_pay")
        .then(({ data }) => {
          console.log(data);
          this.message = data.pay_order;
          this.isactive = "1";
        })
        .catch(function(error) {
          console.log(error);
        });
    },
    drawLine() {
      // 基于准备好的dom，初始化echarts实例
      this.myChart = this.$echarts.init(document.getElementById("myChart"));
      this.myChart.setOption(this.options);
    }
  }
};
</script>

<style lang='scss' scoped>
#home {
  // width: 100%;
  // padding-right: 500px;
  height: 100%;
  overflow: auto;
  .tradetop {
    width: 100%;
    height: 55px;
    line-height: 65px;
    font-size: 13px;
    font-family: MicrosoftYaHei-Bold;
    color: rgba(0, 0, 0, 1);
    font-weight: 700;
    padding-left: 25px;
    box-sizing: border-box;
    border-bottom: 1px solid rgba(153, 153, 153, 1);
  }
  .home {
    height: 500px;
    min-width: 1100px;
    // min-height: 900px;
    padding: 0px 17px;
    display: flex;
    justify-content: space-between;
    .box1 {
      width: 75%;
      height: 100%;
      // background: red;
      .trend {
        height: 100%;
        width: 100%;
        // background: rgba(255, 255, 255, 1);
        border-radius: 2px;
        padding: 20px 20px;
        box-sizing: border-box;
        .day {
          width: 38px;
          height: 17px;
          font-size: 10px;
          font-family: MicrosoftYaHei;
          color: rgba(255, 255, 255, 1);
          line-height: 17px;
          background: rgba(136, 136, 136, 1);
          border-radius: 3px;
        }
      }
    }
    .box2 {
      background-color: #f2f2f2;
      width: 29%;
      height: 100%;
      .news {
        height: 100%;
        min-width: 290px;
        overflow: auto;
        border-radius: 2px;
        padding: 20px;
        padding-right: 30px;
        box-sizing: border-box;
        background: rgba(255, 255, 255, 1);
        .newsbox1 {
          display: flex;
          justify-content: space-between;
          align-items: center;
          padding: 0 10px;
          .title {
            font-size: 17px;
            font-weight: 700;
            font-family: MicrosoftYaHei-Bold;
            color: rgba(0, 0, 0, 1);
            line-height: 45px;
            border-bottom: 2px solid rgba(224, 3, 0, 1);
          }
          .more {
            font-size: 13px;
            font-family: MicrosoftYaHei;
            color: rgba(136, 136, 136, 1);
          }
        }
        .newsbox2 {
          cursor: pointer;
          padding: 0 17px;
          text-align: left;
          border-bottom: 1px solid rgba(153, 153, 153, 1);
          h3 {
            line-height: 45px;
            color: black;
            font-family: MicrosoftYaHei-Bold;
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
            overflow: hidden;
          }
          p {
            margin-top: 10px;
            line-height: 20px;
            font-size: 11px;
            font-family: MicrosoftYaHei;
            color: rgba(102, 102, 102, 1);
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
          }
          .newlook {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            font-size: 10px;
            font-family: MicrosoftYaHei;
            color: rgba(136, 136, 136, 1);
            line-height: 30px;
            .left {
              margin-right: 55px;
            }
            .right .iconfont {
              font-size: 10px;
            }
            .left .iconfont {
              font-size: 14px;
            }
          }
        }
      }
    }
  }
  .box3 {
    width: 100%;
    height: 260px;
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
    .item {
      width: 22%;
      height: 45%;
      margin-top: 1%;
      padding-right: 15px;
      box-sizing: border-box;
      border-radius: 5px;
      background: url("../assets/image/home3.png") no-repeat;
      background-position: 15px 25px;
      background-color: #7482c4;
      text-align: right;
      .box2 {
        p:nth-of-type(1) {
          font-size: 30px;
          font-family: PingFangSC-Semibold;
          font-weight: 700;
          color: rgba(255, 255, 255, 1);
          line-height: 85px;
        }
        p:nth-of-type(2) {
          font-size: 16px;
          font-family: PingFangSC-Regular;
          font-weight: 400;
          color: rgba(255, 255, 255, 1);
          line-height: 0;
        }
      }
    }
  }
  .item:nth-of-type(2),
  .item:nth-of-type(7) {
    background: url("../assets/image/home2.png") no-repeat;
    background-color: #9d5ebf;
  }
  .item:nth-of-type(3),
  .item:nth-of-type(6) {
    background: url("../assets/image/home4.png") no-repeat;
    background-color: #d4a82e;
  }
  .item:nth-of-type(4),
  .item:nth-of-type(5) {
    background: url("../assets/image/home1.png") no-repeat;
    background-color: #cb5f5f;
  }
  .item:nth-of-type(8) {
    background: url("../assets/image/home1.png") no-repeat;
    background-color: #7482c4;
  }
}
</style>