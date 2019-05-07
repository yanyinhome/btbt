<template>
    <div  :class="[alert==true?'BT':'']">
        <com-head>BT挖矿</com-head>
        <div class="move"   @click="handAlert" v-if="alert" ></div>
        <div class="BT_div1"></div>
        <div class="posi">
        <div class="BT_div2">
            <div class="BT_div3">
            <p class="BT_p1">买入BT</p>
            <p class="BT_p2"><span class="BT_span1">{{price}}.00</span> <span class="BT_span2">CNY</span></p>
            <p class="BT_p3">
                <input type="number" v-model="buy" class="BT_input1" placeholder="买入量">
                <span class="bt" >
                   BT  <!--<img :src="top==true?img3:img2" class="bottom" alt="">-->
                 </span> 
            </p>
              <span v-if="top" class="top_span"  >
                     <span class="top_span1" @click="xuanze(item.title)" v-for="(item,index) in xuan" :key="index">
                         {{item.title}}
                     </span>
              </span>
            <p class="BT_p4">需要：<span class="BT_span3">{{tocah}}</span> <span class="BT_span4">CNY</span></p>
            <p class="BT_p5" @click="tiao()">立即买入</p>
        </div>
        </div>
       <div class="BT_div2">
            <div class="BT_div3">
            <p class="BT_p1">卖出BT</p>
            <p class="BT_p2"><span class="BT_span5">{{list.price}}.00</span> <span class="BT_span2">CNY</span></p>
            <p class="BT_p3">
                <input type="number"  v-model="buy1"  class="BT_input1" placeholder="卖出量">
                <span class="bt1" @click="clickBottom">
                    {{title1}}
                     <img :src="bottom==true?img3:img2" class="bottom" alt="">
                </span> 
            </p>
             <span v-if="bottom" class="top_bottom">
                     <span class="top_span2" @click="xuanze1(item.title1,index)" v-for="(item,index) in xuan1" :key="index">
                         {{item.title1}}
                     </span>
                </span>
            <p class="BT_p4">可用：<span class="BT_span6">{{list.sum}}</span> <span class="BT_span4">CNY</span></p>
            <p class="BT_p6" @click="tiao1()">立即卖出</p>
        </div>
        </div>
         <div style="float:left;width:100%;background:#fff;border-bottom: 0.2rem solid #eee;">

            <p style="width:100%;height:auto;overflow:auto;padding:5px 20px;box-sizing:border-box">
                <span style="float:left;">当前挖矿贡献值可用BTB:</span>
                <span style="float:right">5000</span>
           </p>
           <p style="width:100%;height:auto;overflow:auto;padding:5px 20px;box-sizing:border-box">
                <span style="float:left">订单冻结使用BTB:</span>
                <span style="float:right">5000</span>
           </p>         
            
            
        </div>
          
          <p class="BT_p7">温馨提示</p>
             </div>
        <div class="BT_div4">
            <div class="BT_div5">
                <p class="BT_p8" v-html='jy_gz'></p>
        </div>
        </div>
        <!--弹框-->
        <div class="alert_div1" v-if="alert">
            <p class="alert_p1">挖矿提示</p>
            <p class="alert_p2" v-if="type==1">
                <span class="alert_span1">{{text1}}:</span>
                <span class="alert_span2">{{buy}} BT</span>
            </p>
            <p class="alert_p2" v-if="type==2">
                <span class="alert_span1">{{text1}}:</span>
                <span class="alert_span2">{{buy1}} BT</span>
            </p>
            <p class="alert_p3">
                <span class="alert_span1">BT单价:</span>
                <span class="alert_span2">{{price}}.00 CNY</span>
            </p>
            <p class="alert_p4">
                <span class="alert_span11">安全密码:</span>
                <input type="text" v-model="sale_code" v-if="payType" placeholder="请输入安全密码" class="alert_input1">
                <input type="password" v-model="sale_code" v-if="!payType" placeholder="请输入安全密码" class="alert_input1">
                <img :src="payType?img1:img" @click="handClick" class="yan_img1" alt="">
            </p>
            <p class="alert_p33">
                 <span class="alert_span4" @click="handAlert">取消</span>
                 <span class="alert_span3" @click="yang">确认</span>
            </p>
        </div>
    </div>
</template>
<script>
    export default{
        data(){
            return{
                list:[],
                price:'',
                title:'',
                title1:'',
                img:require('../assets/image/yan32.png'),
                img1:require('../assets/image/yan33.png'),
                img2:require('../assets/image/top.png'),
                img3:require('../assets/image/bottom2.png'),
                top:false,
                bottom:false,
                buy:'',
                jie:'',
                buy1:'',
                data1:"",
                lixi:'',
                jy1:'',
                jy_gz:'',
                alert:false,
                sale_code:'',
                flag:'',
                payType:false,
                type:'',
                text1:'',
                cl:'',
                yzm:false,
                 xuan:[
                    {
                        title:'交易账户'
                    },
                     {
                        title:'产量账户'
                    }
                ],
                 xuan1:[
                    {
                        title1:'交易账户'
                    },
                     {
                        title1:'产量账户'
                    }
                ],
            }
        },
        computed:{
            tocah(){
                this.jie=this.price*this.buy
                //console.log(this.jie)
                return this.jie.toFixed(2)
            },
        },
        methods:{
             yang(){
                if(!this.yzm){
                    this.handbuy();
                }else{
                    this.$bus.$emit('toast','不可重复点击!')
                }
            },
              handClick(){
                this.payType=!this.payType
            },
             handbuy(){
                 this.yzm=true
                    if(this.sale_code==''){
                        this.$bus.$emit('toast','请输入安全密码')
                    }else{
                        this.axios.post('index.php/index/apifinance/dobuybt',{
                            token:sessionStorage.getItem('token'),
                            num:this.buy,
                            num1:this.buy1,
                            type:this.type,
                            sale_code:this.sale_code,
                            flag:this.flag
                        }).then((res)=>{
                            //console.log(res)
                              this.yzm=false
                            if(res.data.code==200){
                                if(this.type==1){
                                 this.$router.push({path:'/ding',query:{type:this.type}})
                                }else if(this.type==2){
                                  this.$router.push({path:'/ding1',query:{type:this.type}})    
                                }
                            }else{
                                this.$bus.$emit('toast',res.data.data)
                            }
                        })
                }
            },
            xuanze(title){
                this.title=title
                this.top=false
            },
             xuanze1(title,index){
                 if(index==0){
                     this.title1=title
                     this.bottom=false
                     this.flag=1
                 }else if(index==1){
                     this.title1=title
                     this.bottom=false
                     this.flag=3
                 }
               console.log(this.flag)
            },
            clickTop(){
                this.top=!this.top
            },
            clickBottom(){
                this.bottom=!this.bottom
            },
               handAlert(){
                this.alert=false;
            },
            tiao(lixi){
                if(this.buy==''){
                    this.$bus.$emit('toast','请输入买入数量')
                }else{
                  this.axios.post('index.php/index/apifinance/beforbuy',{
                      token:sessionStorage.getItem('token'),
                      num:this.buy,
                      type:1,
                  }).then((res)=>{
                      console.log(res);
                      if(res.data.code==201){
                          this.$bus.$emit('toast',res.data.data)
                      }else if(res.data.code==202){
                          this.$bus.$emit('toast','请先设置安全密码')
                      }else if(res.data.code==203){
                          this.$bus.$emit('toast','请先添加银行卡')
                      }else{
                          //this.$router.push({path:'/mima',query:{num:this.buy,type:1,lixi:lixi}})
                          this.alert=true
                          this.type=1
                          this.text1='买入数量'
                      }
                  })
                }
            },  
            tiao1(){
                 if(this.buy1==''){
                    this.$bus.$emit('toast','请输入卖入数量')
                }else{
                    this.axios.post('index.php/index/apifinance/beforbuy',{
                      token:sessionStorage.getItem('token'),
                      num:this.buy1,
                      type:2,
                      flag:this.flag
                  }).then((res)=>{
                      if(res.data.code==201){
                          this.$bus.$emit('toast',res.data.data)
                      }else if(res.data.code==202){
                          this.$bus.$emit('toast','请先设置安全密码')
                      }else if(res.data.code==203){
                          this.$bus.$emit('toast','请先添加银行卡')
                      }else{
                       // this.$router.push({path:'/mima',query:{num:this.buy1,type:2}})
                       this.alert=true
                       this.type=2
                       this.text1='卖出数量'
                      }
                  })
                }
            }
        },
        created(){
            this.axios.post('index.php/index/apifinance/buybt',{
                token:sessionStorage.getItem('token')
            }).then(
                (res)=>{
                    //console.log(res)
                    this.data1=res.data.data
                }
            )
            this.axios.post('index.php/index/apifinance/transaction',{
                token:sessionStorage.getItem('token')
            }).then(
                (res)=>{
                    console.log(res) 
                    this.list=res.data.data  
                    this.price=res.data.data.price
                    this.jy1=res.data.data.jy
                    this.cl=res.data.data.cl
                    this.jy_gz=res.data.data.jy_gz
                }
            )
        }
    }
</script>
<style scoped>
.posi{
    position: fixed;
    width:100%;
    background:#fff;
}
.BT_p8{
       width:92%;
       margin:0px 4%;
       margin-top:200px;
}
.top_span{
position: absolute;
width:100px;
margin-left:50px;
font-size:20px;
text-align: center;
background:#fff;
border:1px solid #dddddd;
border-top:1px solid transparent;
color:gray;
left:200px;
margin-top:-10px;
}
.top_span1{
    
}
.top_bottom{
position: absolute;
width:100px;
margin-left:50px;
font-size:20px;
text-align: center;
background:#fff;
border:1px solid #dddddd;
border-top:1px solid transparent;
color:gray;
right:25px;
margin-top:-10px;
}
.yan_img1{
   float:right;
   margin-top:50px; 
}
.bottom{
    float:right;
    margin-top:12px;
    vertical-align:top;
}
.bt{
    float:right;
    margin-right:15px;
    color:#666666;
    font-size:25px;
    margin-top:4px;
}
.bt1{
    float:right;
    width:140px;
    margin-right:15px;
    color:#666666;
    font-size:25px;
    margin-top:4px;
}
.BT_p2{
      width:320px;
      height:60px;
      line-height:60px;
      border:1px solid #eee;
      margin:10px 0px;
}
::-webkit-input-placeholder{
    font-family:Arial;
    font-size:27px;
}
.alert_span4,.alert_span3{
    float: left;
    width:220px;
    height:70px;
    line-height:70px;
    border-radius:50px;
    background:#FF8500;
    color:#fff;
    margin:30px 20px;
}
.alert_span4{
    background:gray;
    margin-left:40px;
}
.alert_p33{
    clear: both;
    width:90%;
    height:110px;
    margin:0px 10%;
    padding-top:40px;
}
.alert_span2{
    float:right;
    font-size:27px;
    margin-top:55px;
}
.alert_input1{
    width:220px;
    float:left;
    height:90px;
    margin-top:33px;
    margin-left:30px;
    background: none;
}
.alert_span1,.alert_span11{
    float:left;
    font-size:27px;
    margin-top:55px;
}
.alert_span11{
    margin-top:52px;
}
.alert_p2,.alert_p3{
    width:80%;
    height:110px;
    margin:0px 10%;
}
.alert_p3{
    border-top:1px solid #dddddd;
}
.alert_p4{
    height:110px;
    margin:0px 10%;
    border-top:1px solid #dddddd;
    border-bottom:1px solid #dddddd;
}

.alert_p1{
    width:100%;
    margin-top:25px;
}
.alert_div1{
    position: fixed;
    top:200px;
    width:90%;
    margin:0px 5%;
    background:#fff;
    z-index:500;
    border-radius:20px;
    text-align:center;
}
.BT{
    width:100%;
    height:100%;
    position: fixed;
    overflow: hidden;
}
.move{
    position: fixed;
    width: 100%;
    height:100%;
    top:0;
    left:0;
    bottom:0;
    right:0;
    background:#000;
    opacity: 0.6;
    z-index:100;
}
    .BT_div1{
        width:100%;
        height:88px;
        line-height:88px;
    }
    .BT_div2{
        float:left;
        width:50%;
        height:410px;
        background:#fff;
        margin-bottom:20px;
        border-bottom:20px solid #eee;
    }
    .BT_div3{
        margin-left:30px;
        margin-top:30px;
        font-size:25px;
    }
    .BT_span1{
        float:left;
        color:#EC0000;
        margin-left:15px;
    }
    .BT_span5{
        float:left;
        margin-left:15px;
        color:#1B9A31;
    }
     .BT_span2{
         float:right;
        color:#666666;
        font-size:22px;
         margin-right:15px;
    }
    .BT_span3{
        color:red;
    }
    .BT_span6{
        color:#1B9A31;
    }
    .BT_input1{
        background:none;
        width:150px;
        height:60px;
        line-height:50px;
        padding-left:15px;
    }
    .BT_p3{
      width:320px;
      height:60px;
      border:1px solid #eee;
      margin:10px 0px;
}
    .BT_p5,.BT_p6{
        width:320px;
        height:65px;
        line-height:65px;
        text-align:center;
        color:#EC0000;
        border:3px solid #EC0000;
        margin-top:20px;
        border-radius:10px;
    }
    .BT_p6{
        color:#1B9A31;
        border:3px solid #1B9A31;
    }
    .BT_div4{
        clear: both;
        width:100%;
        background:#fff;
        margin-top:470px;
    }
    .BT_div5{
        padding-top:5px;
        font-size:25px;
    }
    .BT_p7{
        font-size:27px;
        margin-top:30px;
        margin-left:30px;
    }
    
</style>

