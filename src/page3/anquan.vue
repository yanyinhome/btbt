<template>
     <div id="xinxi">
        <com-head>安全中心</com-head>
        <div class="xinxi_div1"></div>
        <div class="xinxi_div2" @click="tiao">
            <div class="xinxi_div4">
              <p class="xinxi_p1">登录密码</p>
              <p class="xinxi_p2"><img src="../assets/image/zhang10.png" alt=""></p>
            </div>
        </div>
        <div class="xinxi_div2" @click="tiao1">
            <div class="xinxi_div3">
              <p class="xinxi_p1">安全密码</p>
              <p class="xinxi_p2"><img src="../assets/image/zhang10.png" alt=""></p>
            </div>
        </div>
    </div>
</template>
<script>
    export default{
        data(){
            return{
                data:''
            }
        },
        methods:{
            tiao(){
                this.$router.push('/xiugai')
            },
            tiao1(){
                if(this.data==0){
                    this.$router.push('/she_mima')
                }else if(this.data==1){
                    this.$router.push('/xiu_an')
                }
                
            }
        },
        created(){
            this.axios.post('index.php/index/apiuser/safe',{
                token:sessionStorage.getItem('token')
            }).then((res)=>{
                console.log(res)
                this.data=res.data.data
            })
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

