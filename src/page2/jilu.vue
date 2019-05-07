<template>
    <div id="jilu">
        <com-head>BT记录</com-head>
        <div class="jilu_div1"></div>
        <div class="jilu_div2">
            <p class="jilu_p1" :class="[hide==true?'active':'on']" @click="indexs">交易挖矿明细</p>
            <p class="jilu_p1" :class="[hide1==true?'active':'on']" @click="indexs1">社区挖矿明细</p>
        </div>
        <div v-if="hide">
        <div class="jilu_div3" v-for="(item,index) in jiao" :key="index">
            <p class="jilu_p2">{{index}}</p>
            <div  class="jilu_div7" v-for="(item1,index1) in jiao[index]" :key="index1">
            <div class="jilu_div4" >
                <p class="jilu_p3">{{item1.month}}</p>
                <p class="jilu_p4">{{item1.day}}</p>
                <p class="xian"></p>
            </div>
            <p class="jilu_p5" v-if="item1.zi=='取'" :class="[item1.zi=='取'?'active':'']"  >{{item1.zi}}</p>
            <p class="jilu_p5"  v-if="item1.zi=='卖'" :class="[item1.zi=='卖'?'active':'']"  >{{item1.zi}}</p>
            <p class="jilu_p5" v-if="item1.zi=='释'" :class="[item1.zi=='释'?'active4':'']"  >{{item1.zi}}</p>
            <p class="jilu_p5"  v-if="item1.zi=='兑'" :class="[item1.zi=='兑'?'active2':'']"  >{{item1.zi}}</p>
            <p class="jilu_p5" v-if="item1.zi=='买'" :class="[item1.zi=='买'?'active1':'']"  >{{item1.zi}}</p>
            <p class="jilu_p5"  v-if="item1.zi=='冻'" :class="[item1.zi=='冻'?'active3':'']"  >{{item1.zi}}</p>
             <p class="jilu_p5"  v-if="item1.zi=='推'" :class="[item1.zi=='推'?'active1':'']"  >{{item1.zi}}</p>
              <p class="jilu_p5"  v-if="item1.zi=='奖'" :class="[item1.zi=='奖'?'active5':'']"  >{{item1.zi}}</p>
            <div class="jilu_div5">
                <div class="jilu_div6">
                    <p class="jilu_p6">{{item1.content}}</p>
                    <!--<p class="jilu_p7">{{item1.nums}}</p>-->
                </div>
            </div>
        </div>
        </div>
           <div class="hid" v-if="jiao==''">暂无记录~</div>
        </div>
<!--管理明细-->
<div v-if="hide1">
        <div class="jilu_div3" v-for="(item,index) in guan" :key="index">
            <p class="jilu_p2" >{{index}}</p>
            <div v-for="(item1,index1) in guan[index]" :key="index1" class="jilu_div7">
            <div class="jilu_div4">
                <p class="jilu_p3">{{item1.month}}</p>
                <p class="jilu_p4">{{item1.day}}</p>
            </div>
             <p class="jilu_p5" v-if="item1.zi=='取'" :class="[item1.zi=='取'?'active':'']"  >{{item1.zi}}</p>
            <p class="jilu_p5"  v-if="item1.zi=='卖'" :class="[item1.zi=='卖'?'active1':'']"  >{{item1.zi}}</p>
            <p class="jilu_p5" v-if="item1.zi=='释'" :class="[item1.zi=='释'?'active4':'']"  >{{item1.zi}}</p>
            <p class="jilu_p5"  v-if="item1.zi=='兑'" :class="[item1.zi=='兑'?'active2':'']"  >{{item1.zi}}</p>
            <p class="jilu_p5" v-if="item1.zi=='买'" :class="[item1.zi=='买'?'active':'']"  >{{item1.zi}}</p>
            <p class="jilu_p5"  v-if="item1.zi=='冻'" :class="[item1.zi=='冻'?'active3':'']"  >{{item1.zi}}</p>
             <p class="jilu_p5"  v-if="item1.zi=='推'" :class="[item1.zi=='推'?'active1':'']"  >{{item1.zi}}</p>
             <p class="jilu_p5"  v-if="item1.zi=='奖'" :class="[item1.zi=='奖'?'active5':'']"  >{{item1.zi}}</p>
            <div class="jilu_div5">
                <div class="jilu_div6">
                    <p class="jilu_p6">{{item1.content}}</p>
                    <!--<p class="jilu_p7">{{item1.nums}}</p>-->
                </div>
            </div>
        </div>
    </div>
        <div class="hid" v-if="guan==''">暂无记录~</div>
        </div>
    </div>
</template>
<script>
    export default{
        data(){
            return{
                hide:true,
                hide1:false,
                jiao:[],
                guan:[],
                btntext:'',
                list:[
                    {   
                        month:'09-30',
                        time:'08:20:23',
                        biao:'兑',
                        dui:'兑换BTB',
                        yu:6630,
                        xiao:'-50'
                    },
                    {   
                        month:'09-30',
                        time:'08:20:23',
                        biao:'兑',
                        dui:'兑换BTB',
                        yu:6630,
                        xiao:'-50'
                    },
                    {   
                        month:'09-30',
                        time:'08:20:23',
                        biao:'兑',
                        dui:'兑换BTB',
                        yu:6630,
                        xiao:'-50'
                    },
                    {   
                        month:'09-30',
                        time:'08:20:23',
                        biao:'兑',
                        dui:'兑换BTB',
                        yu:6630,
                        xiao:'-50'
                    },
                  
                ]
            }
        },
    
        created(){
           
            this.axios.post('index.php/index/apifinance/jylog',{
                token:sessionStorage.getItem('token'),
            }).then((res)=>{
                console.log(res.data.data);
                this.jiao=res.data.data
            }),
            this.axios.post('index.php/index/apifinance/gllog',{
                token:sessionStorage.getItem('token'),
            }).then((res)=>{
                console.log(res);
                this.guan=res.data.data
            })
        },
        methods:{
           
            indexs(){
                this.hide=true;
                this.hide1=false;
            },
            indexs1(){
                this.hide=false;
                this.hide1=true;
            }
        }
    }
</script>
<style scoped>
.jilu_div7{
        clear: both;
    }

.active5{
    background:gray;
}
.active{
 background:#FF8500;
}

.active1{
 background:red;
 
}
.active2{
 background:#FF8500;
}
.active3{
 background:green;
}
.active4{
 background:purple;
}
.hid{
    text-align:center;
    margin-top:300px;
}
.active{
    color:#fff;
    background:#448DFF;
}
.on{
    background:none;
    color:#000;
}
    .jilu_div1{
        width:100%;
        height:110px;
    }
    .jilu_div2{
        width:520px;
        height:80px;
        border-radius:60px;
        border:2px solid #448DFF;
        margin:0 auto;
        text-align:center;
    }
    .jilu_p1{
        float:left;
        width:46%;
        height:60px;
        line-height:60px;
        border-radius:50px;
        font-size:25px;
        margin-left:13px;
        margin-top:10px;
    }
    .jilu_div3{
        width:92%;
        margin:0px 4%;
    }
    .jilu_div10{
        width:92%;
        margin:0px 4%;
        margin-top:220px;
    }
    .jilu_p2{
        float:left;
        margin-top:20px;
        font-weight:bold;
        width:100%;
        
    }
    .jilu_div4{
        float:left;
        margin-top:30px;
        text-align:right;
    }
    .jilu_p3{
        font-size:26px;
    }
    .jilu_p4{
        color:#999999;
        font-size:20px;
    }
    .jilu_p5{
        float:left;
        width:40px;
        height:40px;
        line-height:40px;
        border-radius:50%;
        font-size:20px;
        color:#fff;
        text-align:center;
        margin-top:60px;
        margin-left:40px;
    }
    .jilu_div5{
        float:right;
        width:470px;
        height:80px;
        line-height:80px;
        background:#fff;
        margin-top:40px;
        font-size:25px;
        padding-left:20px;
        border-radius:10px;
    }
    .jilu_p6{
        font-size:24px;
    }
    .jilu_p7{
        display:inline-block;
        color:#666666;
        font-size:25px;
        width:200px;
    }
    .jilu_p8{
       float:right;
       margin-top:-50px;
       margin-right:30px;
       font-size:20px;
    }
    
</style>

