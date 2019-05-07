<template>
  <div class="app">
    <div class="bg">
      <div class="back" @click="back()">
        <img src="../assets/image/back1.png" alt>
      </div>
    </div>
    <div class="caiwu_div10">
      <div
        class="caiwu_div11"
        v-for="(item,index) in str"
        :key="index"
        @click="handClick1(item.title,item.route)"
      >
        <p class="cai_p">
          <img class="cai_img1" :src="item.img" alt>
        </p>
        <p class="title">{{item.title}}</p>
      </div>
      <div id="wid"></div>
    </div>
    <div class="main">
      <div>BT基金总量：</div>
      <div class="bala">{{pageInfo.money}}</div>
      <div class="flex">
        <div>
          <span>当前释放：</span>
          <span>{{pageInfo.now_money}}</span>
        </div>
        <div class="bor">|</div>
        <div>
          <span>累计释放：</span>
          <span>{{pageInfo.shifang_money}}</span>
        </div>
      </div>
      <div class="btn" @click="dialogFormVisible=true">立即转出</div>
    </div>
    <div class="plateThree" @click="bann()">
      <div>
        <div class="threeTitle">
          <span>什么是</span>
          <span>BT基金</span>
        </div>
        <div>BT基金是BTOX交易所基金会，基于区块链技术…</div>
      </div>
      <img src="../assets/image/btb5.png" alt>
    </div>
    <!-- 弹框 -->
    <div :class="['zBox',dialogFormVisible?'over':'']" @touchmove.prevent v-if="dialogFormVisible">
      <div>
        <div class="zTitle">转出</div>
        <img src="../assets/image/close.png" alt="" @click="dialogFormVisible=false">
        <div class="zTitleTwo">￥0.00</div>
        <div class="zRadio">
          <div @click="setBg($event)" v-for="(item,key) in arr" :key="key" :data-num="key">
            <img :src="radio==key?require('../assets/image/btb13.png'):require('../assets/image/btb12.png')" alt="" :data-num="key">
            <span :data-num="key">{{item}}</span>
          </div>
        </div>
        <div class="btn">立即转出</div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      // 弹出框数据
      radio: 0,
      status:true,
      dialogFormVisible:false,
      arr:[
        '帐户一',
        '帐户二',
        '帐户三'
      ],
      // 页面数据
      str: [
        {
          img: require("../assets/image/btb1.png"),
          title: "BTB兑换",
          route: "/zichan"
        },
        {
          img: require("../assets/image/btb7.png"),
          title: "基金理财",
          route: "/BT"
        },
        {
          img: require("../assets/image/btb9.png"),
          title: "主流币兑换",
          route: "/ding"
        },
        {
          img: require("../assets/image/btb8.png"),
          title: "基金联盟商",
          route: "/ding1"
        },
        {
          img: require("../assets/image/btb6.png"),
          title: "BT商户",
          route: "/ding2"
        },
        {
          img: require("../assets/image/btb10.png"),
          title: "社区投票",
          route: "/waKuang"
        }
      ],
      pageInfo:''
    };
  },
  methods:{
    setBg(e){
      this.radio = e.target.dataset.num;
      console.log(this.radio)
    },
    getInfo(){
      this.axios
        .post("http://btox.sosocnc.com/index.php/index/apitrad/jijin", {
          token: sessionStorage.getItem("token")
        })
        .then(res => {
          console.log(res);
          if (res.data.code == 200) {
            this.pageInfo = res.data.data;
          } else {
            this.$bus.$emit('toast',"网络有延迟，请刷新后重试！");
          }
        });
    },
    back(){
      this.$router.go(-1);
    }
  },
  created(){
    this.getInfo();
  }
};
</script>
<style scoped>
/* 弹框 */
.zRadio {
  width: 90%;
  margin: 0 auto;
  margin-top: 30px;
}
.zRadio > div {
  width: 100%;
  height:110px;
  border-bottom:2px solid #ddd;
  color: #000;
  font-size: 30px;
  line-height:110px;
}
.zRadio img{
  width:40px;
  height:40px;
  margin-right:20px;
  position:relative;
  top:10px;
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
  width: 100%;
  height:814px;
  background: white;
  position:fixed;
  bottom:0;
  padding: 20px 0;
  box-sizing: border-box;
}
.zBox .btn{
  margin-top: 70px;
}
.zBox>div>img{
  float:right;
  position: relative;
  bottom:85px;
  right:50px;
}
.zBox .zTitle {
  text-align: center;
  padding: 10px 0 30px 0;
  color: #000;
  font-size: 36px;
  font-weight: bold;
  border-bottom:2px solid #ddd;
}
.zBox .zTitleTwo {
  text-align: center;
  margin-top: 70px;
  color: #000;
  font-size: 60px;
}
/* 页面 */
.app{
    padding-bottom:20px;
}
.bg {
  width: 100%;
  height: 388px;
  background: url(../assets/image/btb4.png) no-repeat;
  background-size: cover;
}
.back {
  width: 100%;
  padding: 50px 0 0 30px;
  box-sizing: border-box;
}
.back > img {
  width: 24px;
  height: 42px;
}
.caiwu_div10 {
  display: inline-block;
  width: 100%;
  height: 318px;
  background: #fff;
}
.caiwu_div11 {
  display: inline-block;
  width: 25%;
  margin-top: 30px;
  text-align: center;
  font-size: 25px;
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
.title {
  font-size: 25px;
  margin-top: 5px;
}
#wid {
  width: 100%;
  height: 155px;
}
.main {
  width: 100%;
  margin: 20px 0;
  height: 422px;
  text-align: center;
  background: #fff;
  box-sizing: border-box;
  padding-top: 30px;
}
.main > div:nth-child(1) {
  width: 100%;
  font-size: 26px;
  color: #333;
}
.main .bala {
  width: 100%;
  color: #ec0000;
  margin: 20px 0 30px;
  font-size: 60px;
}
.main .flex {
  width: 70%;
  margin: 45px auto;
  display: flex;
  justify-content: space-between;
  font-size: 26px;
  color: #999;
}
.main .bor {
  color: #ddd;
}
.main > .flex > div > span:nth-child(2) {
  color: #333;
}
.btn {
  width: 400px;
  height: 76px;
  text-align: center;
  margin: 0 auto;
  border-radius: 50px;
  line-height: 76px;
  color: #fff;
  font-size: 26px;
  background: #ff8500;
}
.plateThree {
  width: 100%;
  height: 220px;
  background: #fff;
  padding:0 40px;
  padding-right:60px;
  box-sizing: border-box;
  display: flex;
  justify-content: space-between;
}
.plateThree img {
  width: 156px;
  height: 134px;
  position: relative;
  top: 50px;
}
.plateThree > div {
  width: 60%;
  padding-top: 30px;
  box-sizing: border-box;
}
.threeTitle > span:nth-child(2) {
  color: #448DFF;
  font-size: 40px;
}
.threeTitle > span:nth-child(1) {
  color: #000000;
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

</style>


