<template>
    <div id="xiang">
        <div class="xiang_div1">
            <div class="zichan_div2">
                   <p class="iconfont icon-return" @click="clickBack"></p>
                   <p class="zichan_p3">订单详情</p>
             </div>
        <div class="xiang_div2">
            <div class="xiang_div3">
              <p class="xiang_p1" :class="[list.mai=='买'?'active':'on']">
                 {{list.mai}}
              </p>
            </div>
            <p class="xiang_p2" v-if="list.mai=='买'">买入BT数量</p>
             <p class="xiang_p2" v-if="list.mai=='卖'">卖出BT数量</p>
            <p class="xiang_p3">{{list.num}}</p>
            <p class="xiang_p4" v-if="list.mai=='买'">
                单价：{{list.price}} CNY &nbsp;&nbsp;&nbsp;
                <span class="xiang_span1"></span>
               &nbsp;&nbsp;&nbsp; 买入总价：{{list.money}} CNY 
            </p>
             <p class="xiang_p4" v-if="list.mai=='卖'">
                单价：{{list.price}} CNY &nbsp;&nbsp;&nbsp;
                <span class="xiang_span1"></span>
               &nbsp;&nbsp;&nbsp; 卖出总价：{{list.money}} CNY 
            </p>
        </div>
        </div>
        <div class="xiang3_div1">
                 <p class="xiang3_p1"><img class="xiang3_img1" src="../assets/image/qing1.png" alt=""></p>
                 <p class="xiang3_p2">您的订单正在挖矿等待中，请您耐心等候！</p>
        </div> 
    </div>
</template>
<script>
   export default{
       data(){
           return{
               list:[],
           }
       },
        methods:{
            clickBack(){
                this.$router.go(-1);
            }
        },
        created(){
            this.axios.post('index.php/index/apifinance/orderinfo',{
                token:sessionStorage.getItem('token'),
                type:this.$route.query.type,
                order:1,
                order_id:this.$route.query.order_id
            }).then((res)=>{
                console.log(res)
                this.list=res.data.data
            })
        }
    }
</script>
<style scoped> 
#xiang{
    background:#fff;
}
.active{
     background:#EC0000;
} 
.on{
     background:#1B9A31;
} 
.xiang_div1{
    width:100%;
    height:400px;
    background:#448DFF;
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
.xiang3_p1{
    width:50%;
    margin: 0 auto;
}
.xiang3_img1{
   width:100%;
}
.xiang3_div1{
    margin-top:120px;
    text-align:center;
    font-size:25px;
}
</style>

