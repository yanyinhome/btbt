<template>
    <div id="caiwu">
        <div class="caiwu_div1">财务</div>
          <div class="back"
  @touchstart.prevent="touchStart" @touchmove.prevent="touchMove"
  @touchend="touchEnd" ref="back">
    <div class="back-l" ref="left">
            <div class="caiwu_div3" >
               <p class="jiao">交易账户</p>
               <p class="caiwu_p1">BT {{money.jy}}</p>
               <p class="jiao" >￥ {{money.money}}</p>
               </div>
            </div>
  <div class="back-r" ref="right">
            <div class="caiwu_div4">
               <p class="jiao">挖矿账户</p>
               <p class="caiwu_p1">BT {{money.wk}}</p>
               <p class="jiao">￥ {{money.wk_money}}</p>
               </div>
               </div>
 <div class="back-c" ref="right">
             <div class="caiwu_div44">
               <p class="jiao">产量账户</p>
               <p class="caiwu_p1">BT {{money.cl}}</p>
               <p class="jiao">￥ {{money.cl_money}}</p>
               </div>
               </div>
        </div>
        <div class="caiwu_div5">
                <div class="caiwu_div6">
                    <p class="caiwu_p2"></p>
                    <p class="caiwu_p3">BT资产 ：￥{{money.wk}}</p>
                    <p class="caiwu_p11"></p>
                    <p class="caiwu_p3">BTB资产 ：￥{{money.btb_money}}</p>
                    <p class="caiwu_p4"></p>
                    <p class="caiwu_p3">智能挖矿：￥0.00</p>
                    <p class="caiwu_p6"></p>
                    <p class="caiwu_p3">锁仓计划：￥0.00</p>
                    <p class="caiwu_p66"></p>
                    <p class="caiwu_p3">产量账户：￥{{money.cl_money}}</p>
                </div>
          <div id='echarts'>
               <div v-show="true" id="myChart" :style="{width: '150px', height: '150px'}"></div>
         </div>
                <div class="caiwu_div9">
                    <div v-for="(item,index) in list" :key="index" class="caiwu_div8" @click="handClick(item.route,item.title)">
                        <p class="caiwu_p7">{{item.title}}</p>
                    </div>
                </div>
        </div>
        <div class="caiwu_div10">
            <div class="caiwu_div11" v-for="(item,index) in str" :key="index" @click="handClick1(item.title,item.route)">
                <p class="cai_p"><img class="cai_img1"  :src="item.img" alt="" ></p>
                <p class="title">{{item.title}}</p>
            </div>
             <div id="wid"></div>
        </div>
        <com-foot></com-foot>
    </div>
</template>
<script>
export default {
  data() {
    return {
      currentPlay: "red",
      percent: 0,
      currentPlay: "red",
      percent: 0,
      myChart: [],
      options: {
        tooltip: {
          trigger: "item",
          formatter: "{a} <br/>{b}: {c} ({d}%)"
        },
        color: ["#ffa51e ", "#2978CD", "#532BAF", "#8E1818","#2e4c6c"],
        legend: {
          orient: "vertical",
          x: "left",
          data: ["直接访问", "邮件营销", "联盟广告", "视频广告", "搜索引擎"]
        },
        series: [
          {
            name: "资产分率",
            type: "pie",
            radius: ["60%", "80%"],
            avoidLabelOverlap: false,
            label: {
              normal: {
                show: false,
                position: "center"
              },
              emphasis: {
                show: true,
                textStyle: {
                  fontSize: "15",
                  fontWeight: "bold"
                }
              }
            },
            labelLine: {
              normal: {
                show: false
              }
            },
            data: [
              { value: 335, name: "BT资产" },
              { value: 310, name: "BTB资产" },
              { value: 0, name: "智能挖矿" },
              { value: 0, name: "锁仓计划" },
                { value: 0, name: "产量账户" }
            ]
          }
        ]
      },
      money: [],
      list: [
        { title: "买入", route: "/BT" },
        { title: "卖出", route: "/BT" },
        { title: "兑换", route: "/dui" },
        { title: "明细", route: "/jilu" }
      ],
      str: [
        {
          img: require("../assets/image/cai.png"),
          title: "现货资产",
          route: "/zichan"
        },
        {
          img: require("../assets/image/cai2.png"),
          title: "BT挖矿",
          route: "/BT"
        },
        {
          img: require("../assets/image/cai1.png"),
          title: "买入订单",
          route: "/ding"
        },
        {
          img: require("../assets/image/cai3.png"),
          title: "卖出订单",
          route: "/ding1"
        },
        {
          img: require("../assets/image/cai4.png"),
          title: "已完成订单",
          route: "/ding2"
        },
        {
          img: require("../assets/image/cai5.png"),
          title: "智能挖矿",
          route: "/waKuang"
        },
        {
          img: require("../assets/image/cai6.png"),
          title: "锁仓计划",
          route: "/suoCang"
        },
        {
          img: require("../assets/image/cai7.png"),
          title: "释放率值",
          route: "shifang"
        },
        {
          img:require("../assets/image/btb2.png"),
          title:'BT基金',
          route:'/btbPage'
        }
      ]
    };
  },
  methods: {
    touchStart(e) {
      const touch = e.touches[0];
      this.touch.startX = touch.pageX;
      this.touch.startY = touch.pageY;
    },
    touchMove(e) {
      console.log("move");
      const touch = e.touches[0];
      const deltaX = touch.pageX - this.touch.startX;
      const deltaY = touch.pageY - this.touch.startY;
      if (Math.abs(deltaY) > Math.abs(deltaX)) {
        return;
      }
      const left = this.currentPlay == "red" ? 0 : -window.innerWidth;
      var offsetWidth = Math.min(
        0,
        Math.max(-window.innerWidth, left + deltaX)
      );
      this.percent = Math.abs(offsetWidth / window.innerWidth);
      this.$refs.back.style["transform"] = `translate3d(${offsetWidth /
        2.05}px,0,0)`;
      this.$refs.back.style["transitionDuration"] = 10;
    },
    touchEnd() {
      console.log("end");
      console.log(this.percent);
      let offsetWidth;
      let percent;
      if (this.currentPlay === "red") {
        if (this.percent > 0.1) {
          this.currentPlay = "yellow";
          offsetWidth = -window.innerWidth;
        } else {
          offsetWidth = 0;
        }
      } else {
        if (this.percent < 0.9) {
          this.currentPlay = "red";
          offsetWidth = 0;
        } else {
          offsetWidth = -window.innerWidth;
        }
      }
      this.$refs.back.style["transform"] = `translate3d(${offsetWidth /
        2.05}px,0,0)`;
      this.$refs.back.style["transitionDuration"] = 10;
    },
    touchStart(e) {
      const touch = e.touches[0];
      this.touch.startX = touch.pageX;
      this.touch.startY = touch.pageY;
    },
    touchMove(e) {
      console.log("move");
      const touch = e.touches[0];
      const deltaX = touch.pageX - this.touch.startX;
      const deltaY = touch.pageY - this.touch.startY;
      if (Math.abs(deltaY) > Math.abs(deltaX)) {
        return;
      }
      const left = this.currentPlay == "red" ? 0 : -window.innerWidth;
      var offsetWidth = Math.min(
        0,
        Math.max(-window.innerWidth, left + deltaX)
      );
      this.percent = Math.abs(offsetWidth / window.innerWidth);
      this.$refs.back.style["transform"] = `translate3d(${offsetWidth /
        2.05}px,0,0)`;
      this.$refs.back.style["transitionDuration"] = 1;
    },
    touchEnd() {
      console.log("end");
      console.log(this.percent);
      let offsetWidth;
      let percent;
      if (this.currentPlay === "red") {
        if (this.percent > 0.1) {
          this.currentPlay = "yellow";
          offsetWidth = -window.innerWidth;
        } else {
          offsetWidth = 0;
        }
      } else {
        if (this.percent < 0.9) {
          this.currentPlay = "red";
          offsetWidth = 0;
        } else {
          offsetWidth = -window.innerWidth;
        }
      }
      this.$refs.back.style["transform"] = `translate3d(${offsetWidth /
        2.05}px,0,0)`;
      this.$refs.back.style["transitionDuration"] = 10;
    },
    drawLine() {
      var app = this;
      // 基于准备好的dom，初始化echarts实例
      app.myChart = app.$echarts.init(document.getElementById("myChart"));
      app.myChart.setOption(app.options);
    },
    handClick1(title, route) {
      if (title == "买入订单") {
        this.$router.push({ path: route, query: { type: 1 } });
      } else if (title == "卖出订单") {
        this.$router.push({ path: route, query: { type: 2 } });
      } 
      else if(title == "智能挖矿"){
        this.$router.push({ path: route, query: { type: 2 } });
        // this.$bus.$emit("toast", "暂未开放");
      }else if (title == "锁仓计划") {
        this.$router.push({ path: route, query: { type: 2 } });
        // this.$bus.$emit("toast", "暂未开放");
      } else {
        this.$router.push({ path: route });
      }
    },
    handClick(route, title) {
      if (title == "兑换") {
        this.$bus.$emit("toast", "暂未开放");
      } else {
        this.$router.push({ path: route });
      }
    }
  },
  created() {
    this.touch = {};
    this.axios
      .post("index.php/index/apifinance/index", {
        token: sessionStorage.getItem("token")
      })
      .then(res => {
        //console.log(res);
        this.money = res.data.data;
        this.options.series[0].data[1].value = res.data.data.btb_money.replace(/,/g,'');
        this.options.series[0].data[0].value = res.data.data.wk_money.replace(/,/g,'');
        this.options.series[0].data[2].value = 0;
        this.options.series[0].data[3].value = 0;
        this.options.series[0].data[4].value = res.data.data.cl_money.replace(/,/g,'');
        this.drawLine();
      });
    var app = this;
    this.$nextTick(function() {
      app.drawLine();
    });
  }
};
</script>
<style scoped>

#caiwu {
  width: 100%;
  position: relative;
  overflow-x: hidden;
   
}
.back {
  width: 100%;
  white-space: nowrap;
  margin: 30px 0px;
}
.back-l {
  position: relative;
  vertical-align: top;
  display: inline-block;
  width: 40%;
}
.back-r {
  display: inline-block;
  vertical-align: top;
  position: relative;
  width: 40%;
  margin-left: 50px;
}
.back-c {
  position: relative;
  vertical-align: top;
  display: inline-block;
  width: 40%;
  margin-left: 50px;
}
#echarts {
  float: right;
  margin-top: -295px;
  margin-right: 40px;
}

.title {
  font-size: 25px;
  margin-top: 5px;
}

.cai_img1 {
  width: 100%;
  height: 100%;
}
.cai_p {
  width: 60px;
  height: 60px;
  margin: 0 auto;
}
#wid {
  width: 100%;
  height: 155px;
}
.caiwu_div1 {
  width: 100%;
  height: 100px;
  line-height: 100px;
  text-align: center;
  background: #fff;
  border-bottom: 2px solid #eee;
}
.caiwu_div2 {
  margin: 20px 0px;
  background: #f6f6f6;
}
.caiwu_div3,
.caiwu_div4 {
  float: left;
  width: 100%;
  height: 140px;
  margin-left: 30px;
  padding: 15px 0px;
  padding-left: 30px;
  background: linear-gradient(90deg, #437aa5, #2e4c6c);
  border-radius: 8px;
  color: #fff;
  font-size: 25px;
}
.caiwu_div4 {
  background: linear-gradient(90deg, #8b9199, #47545f);
  margin-left: 35px;
}
.caiwu_div44 {
  float: left;
  width: 100%;
  height: 140px;
  margin-left: 40px;
  padding: 15px 0px;
  padding-left: 30px;
  border-radius: 8px;
  color: #fff;
  font-size: 25px;
  background: linear-gradient(90deg, #5694A1, #276161);
}
.jiao {
  font-size: 20px;
  margin-top: -3px;
}
.caiwu_p1 {
  font-size: 35px;
  font-weight: bold;
  margin-top: -2px;
}
.caiwu_div5 {
  display: inline-block;
  width: 100%;
  background: #fff;
  padding-top:25px;

}
.caiwu_p2,
.caiwu_p4,
.caiwu_p5,
.caiwu_p6,
.caiwu_p11,.caiwu_p66 {
  float: left;
  width: 30px;
  height: 30px;
  border-radius: 50%;
  background: #ffa51e;
  margin-left: 30px;
  margin-top: 10px;
  margin-right: 20px;
}
.caiwu_p66{
  background:#2e4c6c;
  margin-top:5px;
}
.caiwu_p4 {
  margin-top: 5px;
  background: #532baf;
}
.caiwu_p5 {
  background: #9442ff;
  margin-top: 5px;
}
.caiwu_p6 {
  margin-top: 7px;
  background: #8e1818;
}
.caiwu_p11 {
  margin-top: 5px;
  background: #2978cd;
   display:inline-block;
  vertical-align: top;
}
.caiwu_p3 {
  color: #666666;
  margin-top:-3px;
  font-size:28px;
}
.caiwu_div6{
  width: 54%;
  margin-top: 20px;
  margin-bottom:20px;
}
.caiwu_div7 {
  float: right;
  width: 130px;
  height: 130px;
  line-height: 130px;
  border-radius: 50%;
  border: 60px solid #ffa51e;
  margin-top: -230px;
  font-size: 20px;
  color: #999999;
  text-align: center;
  margin-right: 60px;
}
.caiwu_div8 {
  width: 25%;
  height: 90px;
  line-height: 90px;
  background: #fff;
  display: inline-block;
  text-align: center;
  border-top: 1px solid #eee;
}
.active {
  height: 50px;
  line-height: 50px;
  margin-top: 40px;
}
.caiwu_p7 {
  height: 50px;
  line-height: 50px;
  border-right: 1px solid #dddddd;
  margin-top: 20px;
}
.caiwu_div9 {
  display: inline-block;
  height: 80px;
  line-height: 80px;
  width: 100%;
  background: #fff;
  margin-top:20px;
}
.caiwu_div10 {
  display: inline-block;
  width: 92%;
  height: 435px;
  background: #fff;
  margin: 30px 4%;
  padding: 30px 0px;
  border-radius: 12px;
  margin-top:40px;
}
.caiwu_div11 {
  display: inline-block;
  width: 33%;
  margin-top: 30px;
  text-align: center;
  font-size: 25px;
}
</style>



