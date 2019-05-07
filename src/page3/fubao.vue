<template>
    <div id="fubao">
           <com-head>支付宝</com-head> 
           <div class="fubao_div1"></div>
           <div class="fubao_div2">
               <p class="fubao_p1">
                   <span class="fubao_span1">支付宝账号</span>
                   <span class="fubao_span2">{{list.bank_num}}</span>
               </p>
               <p class="fubao_p2">
                   <span class="fubao_span1">真实姓名</span>
                   <span class="fubao_span2">{{list.bank_username}}</span>
               </p>
           </div>
    </div>
</template>
<script>
    export default{
        data(){
            return{
                list:[]
            }
        },
        created(){
                this.axios.post('index.php/index/apiuser/alipay',{
                token:sessionStorage.getItem('token')
            }).then((res)=>{
               console.log(res)
               this.list=res.data.data
            })
         }
    }
</script>
<style scoped>
.fubao_div2{
    width:100%;
    background:#fff;
}
    .fubao_div1{
        width:100%;
        height:105px;
    }
    .fubao_p1,.fubao_p2{
        width:92%;
        height:100px;
        line-height:100px;
        background:#fff;
        margin:0 4%;
        border-bottom:1px solid #dddddd;
    }
    .fubao_span1{
        display:inline-block;
        font-size:30px;
    }
    .fubao_p2{
        border:none;
    }
    .fubao_span2{
        float:right;
        color:#999999;
        font-size:30px;
    }
  
</style>
