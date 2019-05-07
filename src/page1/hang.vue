<template>
    <div id="hang">
        <ul class="hang_div1" >
            <!--<li @click="indexs(1)"  :class="[index==1?'active':'active1']">自选比</li>-->
            <li @click="indexs1(2)" class="hang_li1" :class="[index==2?'active':'active1']">主流币</li>
            <li @click="indexs2(3)" class="hang_li2" :class="[index==3?'active':'active1']">排行榜</li>
        </ul>
        <!--自选币
     <div v-if="index==1">
        <div class="index_div1">
           <img class="index_img1" src="../assets/image/index1.png" alt="">
      </div>
      <div class="hang_div2">
          <p class="hang_p1">币种</p>
          <p class="hang_p2">最新价</p>
          <p class="hang_p3">涨跌幅</p>
      </div>
       <div class="index_div15">
      <div class="index_div13" v-for="(item,index) in str1" :key="index">
        <div class="index_p13">
          <p class="index_p17">{{item.title1}}</p>
          <p class="index_p18"> {{item.title2}}</p>
          </div>
        <div class="index_div14">
            <p class="index_p14">{{ item.content}}</p>
            <p class="index_p15">{{ item.content1}}</p>
        </div>
        <p class="index_p16">{{item.content2}}</p>
      </div>
      </div>
      <div class="hang_div16">
          <p class="hang_p17"><img src="../assets/image/hang1.png"  class="hang_img2" alt=""></p>
          <p class="hang_p19">添加自选</p>
      </div>
      <div class="foot"></div>
       <com-foot></com-foot>
    </div>-->
    <!--主流币-->
      <div v-if="index==2" class="xian">
        <div class="hang_div3">
           <p class="hang1_p4">币种</p>
           <p class="hang1_p2">最新价</p>
           <p class="hang1_p3">涨跌幅</p>
       </div>
       <div class="index_div15">
      <div class="index_div13" v-for="(item,index) in zhu" :key="index">
        <div class="index_p13">
          <p class="index_p17">{{item.b_id}} <span class="bt_span">/ USDT</span></p>
           <p class="index_p14">成交量{{item.volume}}</p>
          </div>
            <p class="index_p16" v-if="item.flag==2" :class="[item.flag==2?'flag99':'flag999']">{{item.change_daily}}</p>
         <p class="index_p16" v-if="item.flag==1" :class="[item.flag==1?'flag999':'flag99']">+{{item.change_daily}}</p>
        <div class="index_div14">
             <p  class="index_p15">${{ item.price}}</p>
             <p class="index_p155" >￥{{ item.price1}}</p>
        </div>
      </div>
      </div>
       <com-foot></com-foot>
      </div>
      <!--排行榜-->
      <div v-if="index==3" class="xian">
          <div class="hang2_div2">
             <div class="hang2_div1" v-for="(item,index) in str3" :key="index" @click="qie(index)">
                 <p class="hang2_p1"><img :src="num==index?item.img:item.img1" alt=""></p>  
                 <p class="hang2_p2" :class="[num==index?'on':'active1']">{{item.title}}</p>
            </div> 
          </div>
          <div class="hang2_div3">
               <p class="hang2_p3">货币</p> 
               <p class="hang2_p4">最新价</p>
               <p class="hang2_p5">涨跌幅</p>
          </div>
              <div class="index_div15">
      <div class="index_div13" v-for="(item,index5) in hang" :key="index5">
        <p class="index_p12"  v-if="index5==0" :class="[index5==0?'active99':'']">{{index5+1}}</p>
        <p class="index_p12" v-if="index5==1"  :class="[index5==1?'on9':'']">{{index5+1}}</p>
        <p class="index_p12" v-if="index5==2"  :class="[index5==2?'on11':'']">{{index5+1}}</p>
        <p class="index_p12"  v-if="index5!=0&&index5!=1&&index5!=2" :class="[index5!=0&&index5!=1&&index5!=2?'on22':'']">{{index5+1}}</p>
        <div class="index_p13">
          <p class="index_p17">{{item.b_id}}<span class="bt_span">/USDT</span></p>
          <p class="index_p14">成交量{{item.volume}}</p>
         </div>
         <p class="index_p16" v-if="item.flag==2" :class="[item.flag==2?'flag99':'flag999']">{{item.change_daily}}</p>
         <p class="index_p16" v-if="item.flag==1" :class="[item.flag==1?'flag999':'flag99']">+{{item.change_daily}}</p>
        <div class="index_div144">
            <p class="index_p15_">${{ item.price}}</p>
            <p class="index_p155_" >￥{{ item.price1}}</p>
        </div>
      </div>
      </div>
      </div>
      <div class="foot"></div>
      <com-foot></com-foot>
    </div>
</template>
<script>
    export default{
        data(){
            return{
                zhu:[],
                hang:[],
                index:2,
                num:0,
                str3:[
                    {
                        img:require('../assets/image/hang4.png'),
                        img1:require('../assets/image/hang55.png'),
                        title:'涨幅榜'
                    },
                     {
                        img:require('../assets/image/hang44.png'),
                        img1:require('../assets/image/hang5.png'),
                        title:'跌幅榜'
                    },
                ],
                 str1:[
        {
          title1:'BTC',
          title2:'/BTC',
          content:'￥46142',
          content1:'$6698',
          content2:'+6.85%',
          index:0
        },
        {
          title1:'BTC',
          title2:'/BTC',
          content:'￥46142',
          content1:'$6698',
          content2:'+6.85%',
           index:1
        },
        {
          title1:'BTC',
          title2:'/BTC',
          content:'￥46142',
          content1:'$6698',
          content2:'+6.85%',
           index:2
        },
        {
          title1:'BTC',
          title2:'/BTC',
          content:'￥46142',
          content1:'$6698',
          content2:'+6.85%',
           index:3
        },
        {
          title1:'BTC',
          title2:'/BTC',
          content:'￥46142',
          content1:'$6698',
          content2:'+6.85%',
           index:4
        }
      ],
        str2:[
        {
          title1:'BTC',
          title2:'/BTC',
          content:'￥46142',
          content1:'$6698',
          content2:'+6.85%',
          index:0
        },
        {
          title1:'BTC',
          title2:'/BTC',
          content:'￥46142',
          content1:'$6698',
          content2:'+6.85%',
           index:1
        },
        {
          title1:'BTC',
          title2:'/BTC',
          content:'￥46142',
          content1:'$6698',
          content2:'+6.85%',
           index:2
        },
        {
          title1:'BTC',
          title2:'/BTC',
          content:'￥46142',
          content1:'$6698',
          content2:'+6.85%',
           index:3
        },
        {
          title1:'BTC',
          title2:'/BTC',
          content:'￥46142',
          content1:'$6698',
          content2:'+6.85%',
           index:4
        }, {
          title1:'BTC',
          title2:'/BTC',
          content:'￥46142',
          content1:'$6698',
          content2:'+6.85%',
           index:3
        },
        {
          title1:'BTC',
          title2:'/BTC',
          content:'￥46142',
          content1:'$6698',
          content2:'+6.85%',
           index:4
        },{
          title1:'BTC',
          title2:'/BTC',
          content:'￥46142',
          content1:'$6698',
          content2:'+6.85%',
           index:3
        },
        {
          title1:'BTC',
          title2:'/BTC',
          content:'￥46142',
          content1:'$6698',
          content2:'+6.85%',
           index:4
        },
       
      ],
            }
        },
        created(){
            this.axios.post('index.php/index/apiindex/hangqing',{
                token:sessionStorage.getItem('token'),
                order:1
            }).then((res)=>{
                console.log(res);
                this.zhu=res.data.data
                this.hang=res.data.paihang
            })
        },
        methods:{
            indexs(index){
                this.index=index
            },
             indexs1(index){
                this.index=index
            },
             indexs2(index){
                this.index=index
            },
            qie(index){
                if(index==0){
                    this.num=index
                     this.axios.post('index.php/index/apiindex/hangqing',{
                token:sessionStorage.getItem('token'),
                order:1
            }).then((res)=>{
                console.log(res);
                this.zhu=res.data.data
                this.hang=res.data.paihang
            })
                }else if(index==1){
                    this.num=index
                        this.axios.post('index.php/index/apiindex/hangqing',{
                token:sessionStorage.getItem('token'),
                order:2
            }).then((res)=>{
                console.log(res);
                this.zhu=res.data.data
                this.hang=res.data.paihang
            })
                }
            },
            tiao(){
                this.$router.push('/shou')
            }
        }
    }   
</script>
<style scoped>
.xian{
    padding-top:120px;
}
#hang{
    position: relative;
}
.bt_span{
  font-size:25px;
}
  .index_div144{
  float:right;
  width:150px;
  height:120px;
  margin-right:90px;
  margin-top:13px;
  }
.flag99{
  background: red;
}
.flag999{
  background: green;
}
 .index_p16,.hang1_p17{
    float:right;
    margin-right:30px;
    width:150px;
    height:60px;
    line-height:60px;
    text-align:center;
    color:#fff;
    margin-top:20px;
    border-radius:8px;
  }
.index_div14{
  float:right;
  width:150px;
  height:120px;
  margin-right:120px;
  margin-top:20px;
  }
  .index_p15_{
    margin-left:3px;
    font-size:35px;
  }
  .index_p155_{
    color:#666666;
    margin-left:3px;
    font-size:22px;
    margin-top:-5px;
  }
.index_p15{
    margin-left:3px;
    font-size:35px;
  }
  .index_p155{
    color:#666666;
    margin-left:3px;
    font-size:22px;
    margin-top:-15px;
  }
 .index_p14{
 display: inline-block;
 font-size:23px;
 color:#666666;
 line-height:20px;
 margin-top:20px;
  }
.flag0{
  color:#EC0000;
}
.flag11{
  color:green;
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

.index_p17{
     margin-top:20px;
   line-height:30px; 
   }

.active99{
    background: red;
}
.on9{
  background:#FF8848;
}
.on11{
  background:#FFAA0C;
}
.on22{
  background: #8297AA;
}
.foot{
    clear: both;
    width:100%;
    height:100px;
}
.active{
 color:#FF8500;
 border-bottom:4px solid #FF8500;
}
.on{
   color:#FF8500; 
}
.active1{
    color:#9AA9B6;
}
.hang2_div1{
    display:inline-block;
    text-align:center;
    margin-left:180px;
    margin-top:50px;
}
.hang2_div2{
    width:100%;
    height:200px;
    background: #fff;
    margin-top:-30px;
}   
.hang2_div3{
    width:100%;
    height:60px;
    line-height:60px;
    background:#F1F4F6;
    color:#666666;
    margin-top:-30px;
}
.hang2_p3{
    display:inline-block;
    width:29%;
    text-align:left;
    margin-left:30px;
}
.hang2_p4{
    display:inline-block;
    width:29%;
    text-align:center;
    margin-left:10px;
}
.hang2_p5{
    display:inline-block;
    width:29%;
    text-align:right;
    margin-right:30px;
}
#hang{
    background: #fff;
}
    .hang_div1{
        position: fixed;
        width:100%;
        background: #fff;
        height:120px;
        line-height:120px;
        border-bottom:4px solid #E1EDFF;
        text-align:center;
    }
    .hang_div1>li{
        display:inline-block;
        width:120px;
       
    }
  .hang_li1{
      margin-right:140px;
  }
.hang_img1{
    vertical-align: middle;
   margin-left:50px;
}
 .index_div1{
   width:92%;
   margin:30px 4%;
 }
 .index_img1{
  width:100%;
 }
 .hang_div2{
     width:92%;
     margin:0px 4%;
     margin-top:-30px;
 }
 .hang_div3{
     width:92%;
     margin:0px 4%;
 }
 .hang_p1,.hang_p2,.hang_p3{
     display:inline-block;
     width:32.3%;
     height:80px;
     line-height:80px;
     border-top:1px solid #eee;
     border-bottom:1px solid #eee;
     text-align:left;
     color:#666666;
     font-size:25px;
 }
 .hang1_p4,.hang1_p2,.hang1_p3{
     display:inline-block;
     width:32.3%;
     height:80px;
     line-height:80px;
     border-bottom:1px solid #eee;
     text-align:left;
     color:#666666;
     font-size:25px;
 }
 .hang1_p2{
      text-align:center;
 }
 .hang1_p3{
      text-align:right;
 }
 .hang_p2{
     text-align:center;
 }
 .hang_p3{
     text-align:right;
 }
 
  
  
  .index_div15{
     margin-bottom:5px;
     margin-top:15px;
   }
    
   .index_p18{
     display:inline-block;
     color:gray;
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
    
  
  
 
  .flag3{
background: #1B9A31;
  }
  .flag4{
background: red;
  }
  .tive{
      background: #1B9A31;
  }
  .tive1{
      background: red;
  }
  .hang1_p17{
      background:none;
      font-weight:bold;
  }
  .flag{
       color:#1B9A31;
  }
  .flag1{
       color:red;
  }
  .hang_div16{
      margin-top:30px;
  }
  .hang_img2{
      vertical-align: bottom;
  }
  .hang_p17{
      display:inline-block;
      margin-left:260px;
      margin-top:15px;
  }
  .hang_p19{
      display:inline-block;
      margin-left:30px;
      font-size:35px;
      color:#9AA9B6;
  }
  .hang1_p1{
      float:right;
      margin-right:30px;
      margin-top:-8px;
  }
</style>

