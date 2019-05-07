<template>
    <div id="xiang">
        <div class="xiang_div1">
            <div class="zichan_div2">
                   <p class="iconfont icon-return" @click="clickBack"></p>
                   <p class="zichan_p3">订单详情</p>
             </div>
        <div class="xiang_div2">
            <div class="xiang_div3">
              <p class="xiang_p1">
                 {{list.mai}}
              </p>
            </div>
            <p class="xiang_p2">买入BT数量</p>
            <p class="xiang_p3">{{list.num}}</p>
            <p class="xiang_p4">
                单价：{{list.price}} CNY &nbsp;&nbsp;&nbsp;
                <span class="xiang_span1"></span>
               &nbsp;&nbsp;&nbsp; 买入总价：{{list.money}} CNY 
            </p>
        </div>
        </div>
        <div class="fixed"></div>
        <div class="xiang_div4">
            <p class="xiang_p5">交易信息</p>
        </div>
        <div class="xiang_div5">
            <div class="xiang_div6">
                <p class="xiang_p6" v-if="list.dakua!=''">收款方</p>
                <p class="xiang_p6" v-if="list.phone!=''">手机号</p>
                <p class="xiang_p6" v-if="list.email!=null">邮箱地址</p>
                <p class="xiang_p6" v-if="list.open_bank!=''">开户行</p>
                <p class="xiang_p6" v-if="list.bank_name!=''">支行名称</p>
                <p class="xiang_p6" v-if="list.bank_num!=''">银行卡账户</p>
                <p class="xiang_p6" v-if="list.alipay_num!=''">支付宝账号</p>
            </div>
             <div class="xiang_div7">
                <p class="xiang_p6" v-if="list.dakua!=''">{{list.dakua}}</p>
                <p class="xiang_p6" v-if="list.phone!=''">{{list.phone}}</p>
                <p class="xiang_p6" v-if="list.email!=null">{{list.email}}</p>
                <p class="xiang_p6" v-if="list.open_bank!=''">{{list.open_bank}}</p>
                <p class="xiang_p6" v-if="list.bank_name!=''">{{list.bank_name}}</p>
                <p class="xiang_p6" v-if="list.bank_num!=''">{{list.bank_num}}</p>
                <p class="xiang_p6" v-if="list.alipay_num!=''">{{list.alipay_num}}</p>
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
                <p class="xiang_p6">剩余支付时间</p>
            </div>
             <div class="xiang_div7">
                <p class="xiang_p6">{{list.order_number}}</p>
                <p class="xiang_p7">{{list.status}}</p>
                <p class="xiang_p6">{{list.create_time}}</p>
                <p class="xiang_p7">
                   <span >{{content}}</span>   
                </p>
            </div>
        </div>
        <div class="xiang_div9" >
            <p class="xiang_p8">打款截图</p>
                <div class="xiang5_div10"  v-if="list.status=='已打款待确认'">
                <div class="xiang5_div11">
                    <p class="xiang5_p1"><img src="../assets/image/ddd.png" alt="这是一张图片"></p>
                    <p class="xiang5_p2">截图已上传,请等待卖方处理</p>
                </div> 
            </div>
            <div class="xiang_div10" v-if="list.status=='已匹配'">
                <p class="xiang_p9">* 完成打款后请上传打款截图，以作为打款凭证</p>
                <div class="xiang_div11">
                    <p v-if="headimg!=''"> <img :src="'http://'+headimg" class="float_img1"> </p>
                  <p class="float"><input   class="imginp"  name="imgurl" id="imgLocal" type='file' accept="image/*" @change="shangchuan"/></p> 
                    <p class="xiang_p10" v-if="headimg==''"><img src="../assets/image/hang1.png" class="xiang_img1" alt=""></p>
                    <p class="xiang_p11" v-if="headimg==''">上传截图</p>
                </div>
                <p class="xiang_p12" @click="ti">提交</p>
            </div>
            <!--<div v-if="content=='已经结束了'" class="jie">活动结束~</div>-->
        </div>
    </div>
</template>
<script>
import {formatDate} from '../assets/js/date.js';
   export default{
       data(){
           return{
                list:[],
                endTime:'',
                endText:'已经结束了',
                content:"",
                src:"",
                headimg:'',
                imgid:""
           }
       },
       mounted () {
        //    console.log(Date.parse(new Date()));      
       //     console.log(this.endTime)
        },
        methods:{
            ti(){
                this.axios.post('index.php/index/apifinance/dakuan',{
                    token:sessionStorage.getItem('token'),
                    order_id:this.$route.query.order_id,
                    imgid:this.imgid
                }).then((res)=>{
                    console.log(res)
                    if(res.data.code==200){
                        this.$bus.$emit('toast',"截图已上传,请等待卖方处理")
                        this.$router.push('/caiwu')
                    }else{
                        this.$bus.$emit('toast',res.data.data)
                    }
                });
            },
               shangchuan(e) {
      var self = this;
      let file = e.target.files[0]; //上传照片
      /* eslint-disable no-undef */
      let headimgurl = new FormData(); // 创建form对象
      headimgurl.append("imgurl", file); // 通过append向form对象添加数据
    //console.log(formData.get("img")); // FormData私有类对象，访问不到，可以通过get判断值是否传进去
      let config = {
        emulateJSON: true,
        withCredentials: false,
        headers: { "Content-Type": "multipart/form-data" }
      };
      this.$axios.post("http://btox.sosocnc.com/index.php/index/apiservice/doupload",
          headimgurl,
          config
        ).then(( res )=>{
            if(res.data.code==200){
           // console.log(res)
            this.headimg=res.data.img
            this.imgid=res.data.imgid
            }else if(res.data.code==201){
                this.$bus.$emit('toast',res.data.data)
            }
        })
        .catch(function(error) {
          console.log(error);
        });
       // this.$router.go(0);
    },
              countdowm(timestamp){
        //  console.log(this.endTime)
            let self = this;
            let timer = setInterval(function(timestamp){
                // console.log(timestamp)
                let nowTime = Date.parse(new Date());
                let endTime = self.endTime * 1000;
                let t = endTime - nowTime;
                // console.log(endTime)
                // console.log(nowTime)
               // console.log(t);
                if(t>0){
                    //console.log(t)
                    let day = Math.floor(t/86400000);
                    let hour=Math.floor((t/3600000)%24);
                    let min=Math.floor((t/60000)%60);
                    let sec=Math.floor((t/1000)%60);
                    hour = hour < 10 ? "0" + hour : hour;
                    min = min < 10 ? "0" + min : min;
                    sec = sec < 10 ? "0" + sec : sec;
                    let format = '';
                    if(day > 0){
                       format =  `${day}天${hour}小时${min}分${sec}秒`;
                    }
                    if(day <= 0 && hour > 0 ){
                       format = `${hour}小时${min}分${sec}秒`;
                    }
                    if(day <= 0 && hour <= 0){
                       format =`${min}分${sec}秒`;
                    }
                    self.content = format;
                    //console.log(self.content)
                    }else{
                      clearInterval(timer);
                      self.content = self.endText;
                      self._callback();
                    }
                 },1000);
               },
                _callback(){
                 if(this.callback && this.callback instanceof Function){
                      this.callback(...this);
                     this.axios.post('index.php/index/apifinance/overtime',{
                         token:sessionStorage.getItem('token'),
                         order_id:this.$route.query.order_id
                     }).then((res)=>{
                         console.log(res);
                     })
                }
            },
            clickBack(){
                this.$router.go(-1);
            }
        },
        created(){
            this.axios.post('index.php/index/apifinance/orderinfo',{
                token:sessionStorage.getItem('token'),
                type:this.$route.query.type,
                order:2,
                order_id:this.$route.query.order_id
            }).then((res)=>{
                console.log(res);
                this.list=res.data.data
               this.endTime=res.data.data.endtime
          this.countdowm(this.endTime)
            //console.log(res.data.data.endtime)
            })
        }
    }
</script>
<style scoped> 
.xiang5_div11{
    text-align:center;
    font-size:25px;
    overflow: hidden;
}
.xiang5_p2{
    margin-top:30px;
}
#xiang{
    position: relative;
}
.float_img1{
    width:100%;
    height:339px;
}
.float{
    position: absolute;
    top:1300px;
    width:80%;
    height:298px;
} 
#imgLocal{
    opacity:0;
    width:400px;
    height:300px;
}
.jie{
    text-align:center;
    font-size:35px;
    padding:100px 0px;
    background:#fff;
}
.xiang_div1{
    position: fixed;
    width:100%;
    height:400px;
    background:#448DFF;
}
.fixed{
    width:100%;
    height:400px;
}
.xiang_div3{
    width:60px;
    height:60px;
    border-radius:50%;
}
.xiang_p1{
    width:50px;
    height:50px;
    line-height:50px;
    background:red;
    border-radius:50%;
    color:#fff;
    border:5px solid #fff;
    font-size:20px;
    text-align:center;
    margin-left:345px;
}
  .zichan_div2{
        width:100%;
        height:120px;
        line-height:120px;
        color:#fff;
    }
     .zichan_p3{
        display:inline-block;
        text-align:center;
        margin-left:255px;
        font-weight:bold;
        font-size:32px;
    }
    .iconfont{
        float:left;
        margin-left:30px;
    }
    .xiang_div2{
        text-align:center;
    }
    .xiang_p2{
        color:#FFFFFF;
        font-size:26px;
        margin-top:20px;
    }
.xiang_p3{
    color:#fff;
    margin-top:-10px;
    font-size:25px;
    font-weight:50px;
}
.xiang_p4{
    color:#fff;
    font-size:22px;
    margin-left:110px;
    margin-top:10px;
}
.xiang_span1{
    display:inline-block;
    width:2px;
    height:20px;
    background:#fff;
    margin-top:10px;
}
.xiang_p5{
    margin-left:30px;
    height:80px;
    line-height:80px;
    font-size:25px;
    font-weight:bold;
}
.xiang_div5{
    width:100%;
    background:#fff;
    overflow: auto;
}
.xiang_div6{
    display:inline-block;
    margin-left:30px;
    color:#666666;
    font-size:25px;
}
.xiang_div7{
    float:right;
    margin-right:30px;
    text-align:right;
    font-size:25px;
}
.xiang_p6,.xiang_p7{
   margin-top:15px; 
   height:50px;
}
.xiang_div8{
    width:100%;
    height:290px;
    background:#fff;
}

.xiang_p6,.xiang_p7{
margin-top:15px; 
}
.xiang_p7{
    color:red;
}
.xiang_p8{
      margin-left:30px;
    height:80px;
    line-height:80px;
    font-size:25px;
    font-weight:bold;
}
.xiang_div10{
    width:100%;
    height:500px;
    background:#fff;
}
.xiang5_div10{
    width:100%;
    height:260px;
    background:#fff;
    padding-top:50px;
}
.xiang_p9{
    margin-left:30px;
    line-height:100px;
    color:red;
    font-size:25px;
}
.xiang_div11{
    width:80%;
    height:330px;
    margin:30px 10%;
    margin-top:0px;
    border:2px dashed #999999;
    border-radius:12px;
    text-align:center;
}
.xiang_p10{
    margin-top:80px;
}
.xiang_p11{
    color:#999999;
    margin-top:10px;
    font-size:25px;
}
.xiang_p12{ 
    position: relative;
    z-index:1000;
    width:90%;
    height:80px;
    line-height:80px;
    background:#FF8500;
    color:#fff;
    text-align:center;
    margin:60px auto;
    border-radius:40px;
    font-size:25px;
}
</style>

