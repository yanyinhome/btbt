<template>
  <div  :class="[hide==true?'index1':'index']">
    <div class="move" v-if="hide"></div>
    <div class="btox_div1">
        <img src="../assets/image/login22.png" class="btox_img" alt="">
    </div>
        <!--轮播-->
      <!--<div class="index_div1">
        <swiper :options="swiperOption"   ref="mySwiper">
			<swiper-slide v-for="(item,index) in banner" :key="index">
                <img :src="'http://'+item.imgurl" alt="" class="gong_img1">
			</swiper-slide>
		</swiper>
      </div>-->
    <mt-swipe :auto="3500" >
      <mt-swipe-item v-for="item in banner" :key="item.id">
          <img :src="'http://'+item.imgurl" class="img"/>
      </mt-swipe-item>
    </mt-swipe>
 
     <div class="index_aa">
             <div class="marquee">
                <p class="index_p1"><img src="../assets/image/cc.png" class="index_img2" alt=""></p> 
    <div class="marquee_box">
                <ul class="marquee_list" :class="{marquee_top:animate}" >
<li v-for="(item,index) in news1" :key="index" @click="bann(item.news_id)">{{item.news_title}}</li>
                </ul>
</div>
      </div>
      <div class="_div2">
      <div class="_div1" v-for="(item,index) in gong" :key="index">
          <p class="_p1">{{item.b_id}}/USDT</p>
          <p class="_p2">${{item.price}}</p>
          <p class="_p3" v-if="item.flag==1">+{{item.change_daily}}</p>
          <p class="_p3" v-if="item.flag==2">{{item.change_daily}}</p>
          <p class="_p4">{{item.volume}}</p>
      </div>
      </div>
     <!-- <div class="index_div4" @click="dian" v-if="false">
          <div class="index_div5">
            <p class="index_p3">C2C</p>
            <p class="index_p4">交易区</p>
          </div>
          <div class="index_div7">
            点击进入>>
          </div>
      </div>-->
      <!-- BT当前价格 -->
      <div class="btb">
        <div class="btbLeft">
          <div class="btbLeftOne">
            <span>BTB当前价格</span>
            <div>{{cont.btb_price}}<span>CNY</span></div>
          </div>
          <img src="../assets/image/indexZ.png" alt="">
        </div>
        <div class="btbRight">
          <div class="rightTOP">
            <img src="../assets/image/indexC.png" alt="">
            <div>
              <span>昨日挖矿BT数量</span>
              <span>{{cont.bt_wkday}} BT</span>
            </div>
          </div>
          <div class="rightBottom">
            <img src="../assets/image/indexL.png" alt="">
            <div>
              <span>BT总流通量</span>
              <span>{{cont.bt_all}} BT</span>
            </div>
          </div>
        </div>
      </div>
       <div class="btb1" @click="bt">
    <div style="float:left;">
      <p style="font-size:21px;font-weight:bold;margin-left:10px;padding-top:22px;color:#666666;">BT矿池</p>
      <p style="color:rgba(70, 77, 83, 1);margin-left:10px;">{{title.length>6?title.slice(0,7)+'......':title}}</p>
    </div>
    <div style="float:right;width:150px;height: 98px;margin-top:3px;margin-right:30px;">
      <img src="../assets/image/ci4.png" style="width:100%;height:100%;" alt="">
    </div>
  </div>
      <!-- 非小号 -->
      <div class="index_div9">
        <div class="index_div8" v-for="(item,index) in list" :key="index" @click="tiao(item.route,item.title)">
            <p class="index_p5">{{item.title}}</p>
            <p class="index_p6"><img :src="item.img" alt=""></p>
            <p class="index_p7">{{item.content}}</p>
        </div>
      </div>
      <div class="index_div11">
          <p class="index_p8"></p>
          <p class="index_p9" @click="clickB" :class="[st1==true? '' :'in']">涨幅榜</p>
          <p class="index_p10" @click="clickB1" :class="[st2==true? '' :'in']">跌幅榜</p>
          <span class="index_p11" @click="hang">更多数据</span>
      </div>
      <div class="index_div15" >
      <div class="index_div13" v-for="(item,index) in paihang" :key="index">
        <p class="index_p12" v-if="index==0" :class="[index==0?'active':'']">{{index+1}}</p>
        <p class="index_p12" v-if="index==1" :class="[index==1?'on':'']">{{index+1}}</p>
        <p class="index_p12" v-if="index==2" :class="[index==2?'on1':'']">{{index+1}}</p>
        <p class="index_p12"  v-if="index!=0&&index!=1&&index!=2" :class="[index!=0&&index!=1&&index!=2?'on2':'']">{{index+1}}</p>
        <div class="index_p13">
           <p class="index_p17">{{item.b_id}} <span class="bt_span">/ USDT</span></p>
           <p class="index_p14">成交量{{item.volume}}</p>
          </div>
        <!--2jian-->
        <p class="index_p16" v-if="item.flag==2" :class="[item.flag==2?'flag':'flag1']">{{item.change_daily}}</p>
        <p class="index_p16" v-if="item.flag==1" :class="[item.flag==1?'flag1':'flag']">+{{item.change_daily}}</p>
         <div class="index_div14">
            <p class="index_p15">${{ item.price}}</p>
           <p class="index_p155" v-if="item.flag==2" :class="[item.flag==2?'flag0':'flag11']">￥{{ item.price1}}</p>
           <p class="index_p155" v-if="item.flag==1" :class="[item.flag==1?'flag11':'flag0']">￥{{ item.price1}}</p>
        </div>
      </div>
      </div>
      </div>
      <div class="alert_div1" v-if="hide">
        <div class="alert_div2">
          <p class="alert_p1"><img src="../assets/image/login11.png" class="alert_img1" alt=""></p>
          <p class="alert_p2">交易即挖矿 <span class="bai"> 10% </span>收益</p>
          <p class="alert_p3">BTOX邀请您的加入共同建设社区生态计划！</p>
          <p class="alert_p5"><img src="../assets/image/bb.png" class="alert_img2" alt=""></p>
           <p class="alert_p4"><span class="spa"></span> <span class="top">让区块链回归社区</span>  <span class="spa"></span></p>
        </div>
        <div class="alert_div3">
          <p class="alert_p6">准备好了么？</p>
          <p class="alert_p7">登陆：点击-->"财务"-->"参与"-->"BT挖矿"</p>
          <p class="alert_p8" @click="handClick()">立即体验</p>
        </div>
        <p class="tui" @click="xiao"><img src="../assets/image/alert.png" class="alert_img" alt=""></p>
      </div>
      <div class="index_div12"></div>
    <com-foot></com-foot>
  </div>
</template>
<script>
import {Swipe, SwipeItem} from 'mint-ui'
import 'mint-ui/lib/style.css'
export default {
  name: 'index',
   components: {
      'mt-swipe': Swipe,
      'mt-swipe-item': SwipeItem
    },
  data () {
    return {
        title:'BT矿池的价值体系和生态规则将超越传统意义的共享经济理念',
        gong:[],
        paihang:[],
        animate: false,
        banner:[],
        username:'',
        news:[],
        num:0,
        isreal:'',
        news1:[],
        cont:[],
        st1:true,
        st2:false,
        hide:this.$route.query.hide,
        marqueeList: [
                {
                    name: '1军电视剧烦恼是的空间开发'
                },
                {
                    name: '2军水电费了羧甲淀粉钠盛开'
                },
                {
                    name: '3军第三方库收到货否'
                },
                {
                    name: '4军杜师傅iOS'
                }
            ],
      list:[
        {
          title:'非小号',
          img:require('../assets/image/index4.png'),
          content:'数字行情大数据',
          route:'/fei'
        },
        {
          title:'巴比特',
          img:require('../assets/image/index5.png'),
          content:'区块链信息服务商',
           route:'/ba'
        },
        {
          title:'新手入门',
          img:require('../assets/image/index6.png'),
          content:'基础知识讲解',
          route:'/freshman'
        },
        {
          title:'知识大讲堂',
          img:require('../assets/image/index7.png'),
          content:'轻松玩转币圈',
          route:'jiang'
        }
      ]
    };
  },
  mounted(){
  },
		created(){
     // setInterval(this.showMarquee, 2000)
     setInterval(this.scroll,3001) 
     this.showMarquee()
      this.axios.post('index.php/index/apiuser/mine',{
                token:sessionStorage.getItem('token')
            }).then((res)=>{
                this.isreal=res.data.isreal
                // console.log(res.data.data.username)
                this.username=res.data.data.username
            })
    },
  methods:{
     bt(){
      this.$router.push('/bt_k')
    },
    showMarquee(){
       this.axios.post('index.php/index/apiindex/index',
            {token:sessionStorage.getItem('token'), order:1}
            ).then((res)=>{
          this.banner=res.data.data.banner
          this.news1=res.data.data.news
          //this.news1.push(res.data.data.news[0])
          this.gong=res.data.data.info
          this.paihang=res.data.data.info1
          this.cont = res.data.data.cont
      })
    },
     scroll() {
        //申请成功
                this.animate = !this.animate;
                var that = this; 
                setTimeout(()=>{
                         this.news1.push(this.news1[0]);
                         this.news1.shift();
                         that.animate=!that.animate; 
                         //console.log(this.num)
            },2900)
},
    bann(news_id){
      if(sessionStorage.getItem('token')){
      this.$router.push({path:'sheng',query:{news_id:news_id}})
      }else{
        this.$router.push('/login')
        this.$bus.$emit('toast','请登录')
      }
    },
    clickB(){
      this.st1=true;
      this.st2=false;
      this.axios.post('index.php/index/apiindex/index',{
        order:1
      }).then((res)=>{
       // console.log(res);
        this.gong=res.data.data.info
        this.paihang=res.data.data.info1
      })
    },
     clickB1(){
        this.axios.post('index.php/index/apiindex/index',{
          order:2
      }).then((res)=>{
       // console.log(res);
        this.gong=res.data.data.info
        this.paihang=res.data.data.info1
      })
      this.st1=false;
      this.st2=true
    },
    handClick(){
        if(sessionStorage.getItem('token')&& this.username!=undefined){
        if(parseInt(this.isreal)==1){
            this.$router.push('/BT')
        }else if(parseInt(this.isreal)==3){
            this.$router.push('/shiming')
            this.$bus.$emit('toast','请先完成实名认证')
        }else if(parseInt(this.isreal)==0){
            this.$router.push('/ming')
            this.$bus.$emit('toast','正在审核中')
        }else if(parseInt(this.isreal)==2){
          this.$router.push('/shiming')
          this.$bus.$emit('toast','请先完成实名认证')
        }
      }else{
          sessionStorage.removeItem('token')
          this.$router.push('/login')
          this.$bus.$emit('toast','请登录')
      }
    },
    xiao(){
      this.hide=false;
    },
    hang(){
      sessionStorage.setItem('select',1)
      this.$router.push('/hang')
    },
    dian(){
        this.$bus.$emit('toast','暂未开放')
    },
    tiao(route,title){
      if(sessionStorage.getItem('token')){
         this.$router.push({path:route})
      }else{
        this.$router.push('/login')
        this.$bus.$emit('toast','请登录')
      }
    }
  }
};
</script>
<style  scoped>
.btb1{
  width:92%;
  height: 195px;
  background: #fff;
  margin:0 auto;
  border-radius:3px;
 border-top:20px solid #f6f6f6;

}
.img {
    width: 92%;
    height:100%;
    margin:0px 4%;
  }
  .mint-swipe {
    height: 268px;
    margin-top:140px;
  }
.index_aa{
     margin-top:32px;
}
.marquee {
clear: both;
width: 100%;
height: 80px;
color: #3A3A3A;
background-color: white;
display: flex;
box-sizing: border-box;
overflow: hidden;
}
.marquee_title{
padding: 0 20px;
height: 21px;
font-size: 14px;
border-right: 1px solid #d8d8d8;
}
.marquee_box {
display: block;
background: #fff;
width: 100%;
height: 80px;
}
.marquee_list {
 display: block;
}
.marquee_top {
 transition: all 0.5s;
 /*margin-top: -106px;*/
 margin-top: -76px;
}
.marquee_list li {
height:80px;
line-height:80px;
font-size: 25px;
margin-left:-20px;
}
.index_div3{
   width:100%;
   background:#fff;
   line-height:80px;
 }
.marquee_list li span {
padding: 0 2px;
}
.top{
  display:inline-block;
  height:50px;
}
.spa{
  display:inline-block;
  width:50px;
  height:2px;
  background: #fff;
  vertical-align: 5px;
}
.btox_div1{
  width:100%;
  position: fixed;
  background:#fff;
  z-index:1002;
  border-bottom:1px solid #dddddd;
}
.btox_img{
    transform: scale(0.6);
    margin-left:-70px;
}
/* BTB */
.btb{
  width:92%;
  margin:20px auto 0;
  display: flex;
  justify-content: space-between;
}
.btbLeft{
  display: flex;
  justify-content: space-between;
  padding:30px 20px;
  box-sizing: border-box;
}
.btbLeft,.btbRight{
  width:53%;
  height:230px;
  background: white;
  border-radius: 20px;
}
.btbRight{
  width:45%;
  background: none;
}
.btbLeft img{
  width:110px;
  height:110px;
  margin-top:30px;
}
.btbLeftOne>span{
  font-size: 26px;
  color:#666;
  font-weight: bold;
}
.btbLeftOne>div{
  font-size: 50px;
  color:#EC0000;
  font-weight: bold;
  margin-top:35px;
}
.btbLeftOne>div>span{
  font-size: 28px;
  color:#888888;
  margin-left:15px;
}
.btbRight img{
  width:60px;
  height:60px;
  margin-top:10px;
  margin-right:20px;
}
.btbRight>div{
  width:100%;
  height:48%;
}
.btbRight>div:nth-child(1){
  margin-bottom:10px;
}
.rightTOP,.rightBottom{
  display: flex;
  background: white;
  border-radius: 10px;
  box-sizing: border-box;
  padding: 15px 15px;
}
.rightTOP>div>span,.rightBottom>div>span{
  display:block;
  line-height: 40px;
}
.rightTOP>div>span:nth-child(1),.rightBottom>div>span:nth-child(1){
  font-size:25px;
  color:#666;
}
.rightTOP>div>span:nth-child(2),.rightBottom>div>span:nth-child(2){
  font-size:22px;
  color:black;
  font-weight: bold;
}
.index_p1{
   display:inline-block;
   margin-left:-5px;
   margin-right:0px;
   margin-top:-7px;
   color:#000;
   font-size:25px;
 }
 .index_img2{
   transform: scale(0.35);
 }
.index_p11{
    padding-left:30px;
    float:left;
    color:#0088FF;
  }
  .index_p33{
    position: relative;
    z-index:1000;
    color:#666666;
    width:70%;
    margin-left:110px;
    font-size:25px;
  }
  .index_p22{
    float:left;
    padding-left:5px;
  }
.index_div55{
    width:100%;
    height:80px;
    line-height:80px;
    background:#fff;
    display:inline-block;
    margin-top:310px;
    margin-bottom:15px;
    overflow:hidden;
  }
  .index_div44{
    margin-top:-80px;
  }
  .index_div44>li{
   width:100%;
   height:80px;
   margin-left:-40px;
  }
.flag0{
  color:#EC0000;
}
.flag11{
  color:green;
}
.bt_span{
  display: inline-block;
  font-size:25px;
}
.index_div15{
     margin-bottom:5px;
   }
.index_p16{
    float:right;
    margin-right:30px;
    width:150px;
    height:60px;
    line-height:60px;
    text-align:center;
    color:#fff;
    margin-top:30px;
    border-radius:8px;
  }
.index_p15{
    margin-left:3px;
    font-size:35px;
    margin-top:-5px;
  }
  .index_p155{
    color:#666666;
    margin-left:3px;
    font-size:22px;
    text-align: left;
    margin-top:-7px;
  }
  .index_div14{
  float: right;
  width:150px;
  height:120px;
  margin-right:60px;
  margin-top:15px;
  }
.index_div13{
   float:left;
    width:100%;
    height:120px;
    background:#fff;
    border-bottom:1px solid #eee;
  }
.index_p13{
     display: inline-block;
     margin-left:30px;
  }
.index_p14{
display: inline-block;
 font-size:23px;
 color:#666666;
 line-height:20px;
 margin-top:20px;
  }
.index_p17{
   margin-top:20px;
   line-height:30px; 
 }
.flag{
  background: red;
}
.flag1{
  background: green;
}
.on{
  background:#FF8848;
}
.on1{
  background:#FFAA0C;
}
.on2{
  background: #8297AA;
}
._div2{
  width:92%;
  padding-top:20px;
  padding-bottom:20px;
  margin:0 4%;
  background:#fff;
  border-top:20px solid #f6f6f6;
}
._div1{
  display: inline-block;
  width:33%;
  text-align:center;
}
  ._p1{
    font-weight:bold;
  }
  ._p2{
    color:red;
    margin-top:-10px;
  }
  ._p3{
     color:red;
     font-size:25px;
      margin-top:-10px;
  }
  ._p4{
   color:#888888;
    font-size:22px;
     margin-top:-10px;
  }
.index_p2{
  font-size:25px;
}
.bai{
  display:inline-block;
  font-size:45px;
}
.index{
  position: relative;
  overflow: hidden;
}
.index1{
  position: fixed;
}
.tui{
  width:80px;
  height:80px;
  margin:0  auto;
  margin-top:35px;
}
.alert_img{
  width:100%;
}
.alert_p8{
  width:300px;
  height:85px;
  line-height:85px;
  background: #FF8500;
  color:#fff;
  text-align:center;
  margin:0 auto;
  margin-top:20px;
  border-radius:50px;
}
.alert_p7{
  width:92%;
  height:60px;
  line-height:60px;
  margin:0px 4%;
  margin-top:15px;
  text-align:center;
  color:#666666;
  font-size:28px;
}
.alert_p6{
  text-align:center;
  font-size:35px;
  height:50px;
  line-height:50px;
  font-weight:bold;
  padding-top:30px;
}
.alert_div3{
  width:100%;
  background:#fff;
  padding-bottom:30px;
  border-bottom-left-radius: 8px;
  border-bottom-right-radius: 8px;
}
.alert_img2{
  float:right;
  width:100%;
}
.alert_p5{
  float:right;
  width:50%;
  margin-top:-250px;
  margin-right:-20px;
}
.alert_p4{
  display:inline-block;
  width:100%;
  color:#dddddd;
  font-size:20px;
  text-align:center;
}
.alert_p2{
  display: inline-block;
  margin-left:30px;
  font-size:30px;
  color:#fff;
  margin-top:35px;
}
.alert_p3{
  width:300px;
  font-size:20px;
  color:#dddddd;
  line-height:35px;
  margin:20px 0px;
  margin-left:30px;
}
.alert_img1{
  width:100%;
  height:100%;
}
.alert_p1{
  width:40%;
  padding-top:30px;
  padding-left:30px;
}
.alert_div1{
  position: fixed;
  top:240px;
  width:80%;
  height:700px;
  margin:0px 10%;
  z-index: 1005;
}
.alert_div2{
  width:100%;
  background:url('../assets/image/bbg.png') no-repeat;
  background-size:100% 100%;
  padding-bottom:10px;
}
#index{
  position: relative;
}
.move{
  position: fixed;
  top:0;
  left:0;
  bottom:0;
  right:0;
  background: #000;
  opacity:0.6;
  z-index:1003;
}
.lunbo1{
    width: 100%;
    height: 360px;
    position: relative;
    padding-bottom: 25px;
    background: rgba(245, 245, 245, 1);
    margin-top:80px;
    }
    .swiper-container {
      width: 100%;
      margin-bottom:120px;
    }
       .swiper-pagination-bullets {
       bottom: 85px;
      }
      .swiper-pagination-bullet {
        width: 12px;
        height: 12px;
        background: #b0aeaf;
        border-radius: 6px;
      }
      .swiper-pagination-bullet-active {
        width: 12px;
        height: 12px;
        background: #ff762c;
        border-radius: 6px;
      }
      .gong_img1{
        display:inline-block;
        width:100%;
 }
  .title{
    color:#333333;
    font-weight:bold;
  }

.active{
   background:#FF1803;
}
 .index_div1{
   width:92%;
   margin:30px 4%;
   margin-top:130px;
 }
 .index_img1{
  width:100%;
 }
 .index_div2{
   width:100%;
   height:80px;
 }
 .index_tr2{
  color:#EC0000;
  font-size:27px;
 }
 .index_tr3{
   color:#888888;
   font-size:23px;
 }
 .index_tr1{
   color:#000;
 }
 .index_div4{
   width:92%;
   margin:0px 4%;
   height:150px;
   background:url('../assets/image/index_.png') no-repeat;
 }
 .index_p3{
   float:left;
   font-size:65px;
   font-weight:bold;
   margin-left:30px;
   margin-top:45px;
 }
 .index_p4{
   float:left;
   margin-top:52px;
   font-size:30px;
   font-weight:bold;
   margin-left:20px;
 }
 .index_div6{
  float:left;
  margin-top:85px;
  text-align:left;
  font-size:28px;
  margin-left:-235px;
  color:#666666;
 }
 .index_div7{
   float:right;
   margin-right:30px;
   margin-top:55px;
   color:#666666;
   font-size:24px;
 }
 .index_div8{
  float:left;
  width:340px;
  height:140px;
  background:#fff;
  margin:10px 0px;
  margin-left:10px;
 }
 .index_p5{
   display:inline-block;
   margin-left:30px;
   margin-top:15px;
   font-size:32px;
 }
 .index_p6{
   float:right;
   margin-top:20px;
   margin-right:20px;
 }
 .index_p7{
   margin-left:30px;
   display:inline-block;
   color:#9AA9B6;
   font-size:27px;
 }
 .index_div9{
   margin-top:10px;
   margin-left:20px;
 }
  .index_div11{
    display:inline-block;
    width:100%;
    height:100px;
    line-height:100px;
    background:#fff;
    border:1px solid #eee;
    margin-top:10px;
  }
  .index_p8{
    display:inline-block;
    width:12px;
    height:30px;
    background:#FF8500;
    margin-top:30px;
  }
  .index_p9{
   display:inline-block;
   margin-left:30px;
  }
  .index_p10{
     display:inline-block;
     margin-left:30px;
  }
  .in{
     color:#999999;
  }
  .index_p11{
    float:right;
    text-align:right;
    margin-right:30px;
    color:#999999;
    font-size:25px;
  }
  .index_div12{
    float:left;
    width:100%;
    height:100px;
  }
  
  .index_p12{
    float:left;
    color:#fff;
    width:40px;
    height:40px;
    line-height:40px;
    text-align:center;
    border-radius:8px;
    margin-left:30px;
    margin-top:40px;
  }
   .index_p18{
     display:inline-block;
     color:gray;
   }
   
   
  </style>
 
