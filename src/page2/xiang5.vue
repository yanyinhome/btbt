<template>
    <div  :class="alert==true?'active':'xiang'">
        <div class="move" v-if="alert"></div>
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
            <p class="xiang_p2">卖出BT数量</p>
            <p class="xiang_p3">{{list.num}}</p>
            <p class="xiang_p4">
                单价：{{list.price}} CNY &nbsp;&nbsp;&nbsp;
                <span class="xiang_span1"></span>
               &nbsp;&nbsp;&nbsp; 卖出总价：{{list.money}} CNY 
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
        <div class="xiang_div9">
            <p class="xiang_p8">打款截图</p>
            <div class="xiang_div10" v-if="list.status=='已付款待确认'">
                <div class="xiang_div11">
                    <img :src="'http://'+list.img" alt="" class="dakuan">
                </div> 
             <p class="xiang2_p1">* 如果您在审核打款截图时，发现有虚假打款信息或未收到款项，都可以投诉本订单，我们将竭尽全力帮您解决问题。</p>  
                <div class="xiang2_div1">
                    <p class="xiang2_p2" @click="tousu">投诉订单</p>
                    <p class="xiang2_p3" @click="yang">已收款并放行</p>
                </div>
            </div>
            <div class="xiang_div10"  v-if="list.status=='已匹配'">
                <div class="xiang5_div11">
                    <p class="xiang5_p1"><img src="../assets/image/ddd.png" alt="这是一张图片"></p>
                    <p class="xiang5_p2">等待对方上传打款截图</p>
                </div> 
            </div>
        </div>
        <!--弹框-->
        <div class="alert" v-if="alert">
            <p class="alert_p1">温馨提示</p>
            <p class="alert_p4">卖出订单已完成！</p>
             <p class="alert_p5"><span class="heng"></span> 是否继续买入BT挖矿订单？</p>
            <div class="alert_div1">
                <p class="alert_p2" @click="shi">是</p>
                <p class="alert_p3" @click="fou">否</p>
            </div>
        </div>
    </div>
</template>
<script>
   export default{
       data(){
           return{
               list:[],
                endTime:'',
                endText:'已经结束了',
                content:"",
                alert:false,
                hand:false
           }
       },
        methods:{
             yang(){
                if(!this.hand){
                    this.que();
                }else{
                    this.$bus.$emit('toast','不可重复点击!')
                }
            },
            fou(){
               this.alert=false
               this.$router.push('/caiwu')
            },
            shi(){
                this.$router.push('/BT')
            },
            tousu(){
                this.$router.push({path:'/tousu2',query:{order_id:this.$route.query.order_id}})
            },
            que(){
                this.hand=true
                this.axios.post('index.php/index/apifinance/suborder',{
                    token:sessionStorage.getItem('token'),
                    order_id:this.$route.query.order_id
                }).then((res)=>{
                    this.hand=false
                    //console.log(res);
                    if(res.data.code==200){
                        this.alert=true
                      // this.$bus.$emit('toast','收款成功')
                    }else{
                        this.$bus.$emit('toast',res.data.data)
                    }
                })
            },
              countdowm(timestamp){
          console.log(timestamp)
            let self = this;
            let timer = setInterval(function(timestamp){
                // console.log(timestamp)
                let nowTime = Date.parse(new Date());
                let endTime = self.endTime * 1000;
                let t = endTime - nowTime;
                // console.log(endTime)
                // console.log(nowTime)
                //console.log(t);
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
                order_id:this.$route.query.order_id,
                order:2
            }).then((res)=>{
                console.log(res);
                this.list=res.data.data
                 this.endTime=res.data.data.endtime
                 this.countdowm(this.endTime)
            })
        }
    }
</script>
<style scoped>
.heng{
    display:inline-block;
    width:60px;
    height:2px;
    background: #000;
    vertical-align: middle;
}
.xiang{
    position: relative;
}
.active{
    position: fixed;
    overflow: hidden;
    width:100%;
    height:100%;
}
.alert_div1{
    width:80%;
    margin:40px 10%;
}
.alert_p2,.alert_p3{
    display:inline-block;
    width:220px;
    height:70px;
    line-height:70px;
    text-align:center;
    background:#FF8500;
    color:#fff;
    border-radius:8px;
}
.alert_p3{
    float:right;
    margin-left:20px;
    background:#666666;
}
.alert_p1{
    text-align:center;
    font-size:35px;
    margin-top:50px;
    font-weight: bold;
}
.alert_p4{
    font-size:33px;
    margin-top:45px;
    margin-left:68px;
}
.alert_p5{
    font-size:33px;
    margin-top:25px;
     margin-left:68px;
}
.move{
    position: fixed;
    left:0;
    top:0;
    left:0;
    right:0;
    background:#000;
    opacity:0.6;
    width:100%;
    height:100%;
    z-index:500;
} 
.alert{
    position:fixed;
    width:92%;
    top:400px;
    height:420px;
    background:#fff;
    margin:0px 4%;
    border-radius:12px;
    z-index:502;
} 
.dakuan{
    width:100%;
    height:330px;
}
.xiang_div11{
    width:80%;
    height:330px;
    margin:30px 10%;
    margin-top:0;
    border:2px dashed #999999;
    border-radius:12px;
    text-align:center;
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
    background:#1B9A31;
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
.auto{
   background:#fff;  
}
.xiang_p6,.xiang_p7{
margin-top:15px; 
height:50px;
}
.xiang_div8{
    clear: both;
    width:100%;
    height:270px;
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
    background:#fff;
    padding-top:50px;
    padding-bottom:40px;
}
.xiang_p9{
    margin-left:30px;
    line-height:100px;
    color:red;
    font-size:25px;
}
.xiang5_div11{
    text-align:center;
    font-size:25px;
}
.xiang5_p2{
    margin-top:30px;
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
    width:60%;
    height:80px;
    line-height:80px;
    background:#FF8500;
    color:#fff;
    text-align:center;
    margin:60px auto;
    border-radius:40px;
    font-size:25px;
}
.xiang2_p1{
    width:92%;
    margin:0px 4%;
    color:#EC0000;
    font-size:25px;
}
.xiang2_div1{
    margin:30px 50px;
    background:#fff;
    height: auto;
    overflow: auto;
}
.xiang2_p2,.xiang2_p3{
    float:left;
    width:260px;
    text-align:center;
    color:#666666;
    background:#fff;
    border:2px solid #666666;
    border-radius:10px;
    margin-left:40px;
    font-size:25px;
}
.xiang2_p3{
    color:#EC0000;
    border:2px solid #EC0000;
}
</style>

