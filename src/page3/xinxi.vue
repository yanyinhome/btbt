<template>
    <div id="xinxi">
        <com-head>支付信息</com-head>
        <div class="xinxi_div1"></div>
        <div class="xinxi_div2" @click="tiao">
            <div class="xinxi_div4">
              <p class="xinxi_p1" >银行卡</p>
              <p class="xinxi_p2"><img src="../assets/image/zhang10.png" alt=""></p>
            </div>
        </div>
        <div class="xinxi_div2" @click="tiao1">
            <div class="xinxi_div3" >
              <p class="xinxi_p1">支付宝</p>
              <p class="xinxi_p2"><img src="../assets/image/zhang10.png" alt=""></p>
            </div>
        </div>
    </div>
</template>
<script>
    export default{
        data(){
            return{}
        },
 methods:{
            tiao(){
                 this.axios.post('index.php/index/apiuser/userbank',{
                token:sessionStorage.getItem('token')
            }).then((res)=>{
                if(res.data.code==200){
                    this.$router.push('/wo_yin')
                }else if(res.data.code==201){
                    this.$router.push('/add')
                }
            })
            },
            tiao1(){
                this.axios.post('index.php/index/apiuser/alipay',{
                token:sessionStorage.getItem('token')
            }).then((res)=>{
                console.log(res)
                if(res.data.code==200){
                   this.$router.push('/fubao')
                }else if(res.data.code==201){
                   this.$router.push('/neiye')
                }
            })
            },
        },
    }
</script>
<style scoped>
.xinxi_div1{
    width:100%;
    height:110px;
}
.xinxi_div2{
    width:100%;
    height:120px;
    line-height:120px;
    background:#fff;
}
.xinxi_div3,.xinxi_div4{
    width:92%;
    margin:0px 4%;
    border-top:2px solid  #eee;
}
.xinxi_div4{
    border-top:transparent;
}
.xinxi_p1{
    float:left;
    font-size:30px;
}
.xinxi_p2{
    float:right;
}
</style>
