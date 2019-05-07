<template>
    <div id="ding">
        <com-head>买入订单</com-head>
        <div class="ding_div1"></div>
         <div class="ding_div2" v-for="(item,index) in list" :key="index" @click="handClick(item.order_id,item.status)">
            <div class="ding_div6">
             <div class="ding_div4">
                <p class="ding_p3" :class="[type==1?'active':'']" >挖矿BT</p>
                 <p class="ding_p7">￥{{item.num*item.price}}</p>
             </div>
            <div class="ding_div4"> 
                <p class="ding_p6">发布时间:{{item.create_time}}</p>
                <p class="ding_p8">数量:{{item.num}} 单价:{{item.price}}CNY</p>
            </div>
        </div>
        <div class="ding_div3">
                <p class="ding_p1">账户：&nbsp;&nbsp;{{item.username}}</p>
                <p class="ding_p2" :class="[item.status=='等待挖矿中'?'on':'bgColor']">{{item.status}}</p>
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
                list:[],
                type:this.$route.query.type
                /*list:[
                    {
                        time:'2018-09-29 09:30:25',
                        zhuang:'已匹配',
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
        methods:{
            handClick(id,status){
                if(status=='等待挖矿中'){
                    this.$router.push({path:'/xiang3',query:{order_id:id,type:this.$route.query.type}})
                }else if(status=='已匹配'||status=='已打款待确认'){
                    this.$router.push({path:'/xiang',query:{order_id:id,type:this.$route.query.type}})
                }
            }
        },
        created(){
            this.axios.post('index.php/index/apifinance/orderlist',{type:1,token:sessionStorage.getItem('token')}).then((res)=>{
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
.on{
     color:#666666;
}
.active{
    color:red;
}
.ding_p7{
    float:right;
     color:red;
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
    }
    .ding_div4{
        width:100%;
       
        color:#666666;
    }
    .ding_p3{
        font-size:30px;
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
     font-size:22px;
     display:inline-block;
     padding-bottom:30px;
}
.ding_p7{
         margin-left:95px;
     }
    .ding_p8{
         font-size:22px;
         float:right;
         color:#666666;
         margin-top:2px;
    }

</style>


