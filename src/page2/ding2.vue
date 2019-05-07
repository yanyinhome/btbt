<template>
    <div id="ding">
        <com-head>已完成订单</com-head>
        <div class="ding_div1"></div>
        <div class="ding_div2" v-for="(item,index) in list" :key="index">
            <div class="ding_div6">
            <div class="ding_div4">
                <p class="ding_p3">
                     <span v-if="item.type==1" :class="item.type==1?'active':''">挖矿买入BT</span>
                     <span v-if="item.type==2" :class="item.type==2?'active1':''">挖矿卖出BT</span>
                    </p>
                 <p class="ding_p7" v-if="item.type==1" :class="item.type==1?'active':''">￥{{item.num*item.price}}</p>
                 <p class="ding_p7" v-if="item.type==2" :class="item.type==2?'active1':''">￥{{item.num*item.price}}</p>
            </div>
            <div class="ding_div4"> 
                <p class="ding_p6">发布时间:{{item.create_time}}</p>
                <p class="ding_p8">数量:{{item.num}} 单价:{{item.price}}CNY</p>
            </div>
        </div>
        <div class="ding_div3">
                <p class="ding_p1">账户：&nbsp;&nbsp;{{item.username}}</p>
                <p class="ding_p2" >{{item.status}}</p>
            </div>
        </div>
        <div v-if="list==''" class="zan_div1">暂无记录~</div>
        <div class="zan_div2"></div>
    </div>
</template>
<script>
    export default{
        data(){
            return{
                list:[]
               /* list:[
                    {
                        time:'2018-09-29 09:30:25',
                        zhuang:'已完成',
                        phone:'135****3873',
                        price:'1.00',
                        num:'5000'
                    },{
                        time:'2018-09-29 09:30:25',
                        zhuang:'已匹配',
                        phone:'135****3873',
                        price:'1.00',
                        num:'5000'
                    }
                ]*/
            }
        },
        computed:{
        },
        methods:{
            handClick(id,type){
                if(type==1){
                    this.$router.push({path:'/xiang1',query:{order_id:id,type:type}})
                }else if(type==2){
                     this.$router.push({path:'/xiang4',query:{order_id:id,type:type}})
                }   
                
            }
        },
          created(){
            this.axios.post('index.php/index/apifinance/orderlist',{type:3,token:sessionStorage.getItem('token')}).then((res)=>{
                console.log(res)
                this.list=res.data.data
            })
        }
    }
</script>
<style scoped>
.bgColor{
 color:red;
}
.active{
    color:red;
}
.active1{
    color:green;
}
.ding_p7{
    float:right;
    font-size:30px;
}
.zan_div1{
    text-align:center;
    margin:50% 0px;
    color:#666666;
    font-size:35px;
    }
    .zan_div2{
        width:100%;
        height:20px;
    }
    .ding_div1{
        width:100%;
        height:90px;
    }
    .ding_div2{
        width:92%;
        margin:20px 4%;
        background:#fff;
        box-shadow: 0px 5px 5px #999999;
        border-radius:12px;
    }
    .ding_div6{
        padding:20px;
        padding-bottom:10px;
    }
    .ding_div3{
        width:100%;
        height:80px;
        line-height:80px;
        border-top:2px solid #dddddd;
        margin-top:-30px;
        color:#666666;
        font-size:25px;
    }
    .ding_p1{
        float:left;
        margin-left:22px;
    }
     .ding_p2{
        float:right;
        margin-right:20px;
        color:#666666;
    }
    .ding_div4{
        width:100%;
        color:#666666;
    }
    .ding_p3{
        font-size:30px;
        color:#000000;
    }
    .ding_p3,.ding_p4,.ding_p5{
        display:inline-block;
    }
     .ding_p4{
         margin-left:190px;
     }
.ding_p5{
    margin-left:150px;
}
.ding_p6{
     display:inline-block;
     padding-bottom:30px;
     font-size:22px;
}
.ding_p7{
         margin-left:95px;
     }
    .ding_p8{
         float:right;
         color:#666666;
         font-size:22px;
         margin-top:2px;
    }   
</style>


