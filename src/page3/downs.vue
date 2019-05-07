<template>
    <div id="downs">
        <p class="iconfont icon-return" @click="clickBack"></p>
        <div class="downs_div1">
            <p class="downs_p1">交易，我用</p>
            <p class="downs_p2">BTOX</p>
            <p class="downs_p3">玩交易、看行情、看币种动态， </p>
            <p class="downs_p4">还能帮我智能盯盘，随时获取赚钱机会</p>
        </div>
        <div class="downs_div2">
            <img src="../assets/image/kefu3.png" alt="" class="downs_img1">
        </div>
        <div class="downs_div3">
            <div class="downs_div4">
                <div class="downs_div5">
                  <p class="downs_p5"><img :src="list" class="downs_img2" alt=""></p>
                  <p class="downs_p6">扫码下载app</p>
                </div>
                <div class="downs_div6">
                    <p class="downs_p7">邀请卡 &nbsp;INVITATION</p>
                    <p class="downs_p8">快来用BTOX</p>
                    <p class="downs_p9">和我一起玩 <span class="down_span1"> <b>赚</b>币圈</span></p>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default{
        data(){
            return{
                list:''
            }
        },
        methods:{
            clickBack(){
                this.$router.go(-1);
            }
        },
        created(){
            this.axios.post('index.php/index/apiuser/down',{
                token:sessionStorage.getItem('token')
            }).then((res)=>{
                console.log(res);
                this.list=res.data.data
            })
        }
    }
</script>
<style scoped>
b{
    color:#DCC900;
}
    #downs{
        background:#fff;
        padding-top:30px;
    }
    .iconfont{
        margin-left:30px;
       
    }
    .downs_div1{
        text-align:center;
        margin-top:30px;
    }
    .downs_p1{
        display:inline-block;
        font-size:70px;
        font-weight:bold;
        
    }
    .downs_p2{
        display:inline-block;
        font-size:70px;
        font-weight:bold;
        color:#448DFF;
    }
    .downs_p3{
        font-size:30px;
        margin-top:30px;
    }
    .downs_p4{
          font-size:30px;
    }
   
    .downs_img1{
        width:80%;
        margin:0 10%;
    }
    .downs_div3{
        position: relative;
        width:100%;
        height:330px;
        background:#448DFF;
        margin-top:-120px;
        padding-top:10px;
    }
    .downs_div5{
        float:left;
        width:230px;
        height:250px;
        background:#fff;
        margin:40px;
        margin-top:0px;
        margin-left:0px;
    }
    .downs_p5{
        width:200px;
        background: url('../assets/image/dan.png');
        background-size:100%;
        height:200px;
        margin: 0 auto;
    }
    .downs_img2{
        width:100%;
    }
    .downs_p6{
        margin:10px 0px;
        font-size:20px;
        text-align:center;
        margin-top:-5px;
    }
    .downs_div4{
        width:90%;
        height:250px;
        margin:0 5%;
        border:3px solid #fff;
        margin-top:30px;
    }
    .downs_div6{
         display:inline-block;
         margin-top:30px;
    }
    .downs_p7{
        width:280px;
        height:50px;
        line-height:50px;
        color:#002765;
        text-align:center;
        border-radius:30px;
        background:#fff;
        font-size:17px;
    }
    .downs_p8{
        color:#FFFFFF;
        font-size:50px;
        margin-top:15px;
    }
    .downs_p9{
     color:#FFFFFF;
     margin-top:10px;
     font-size:43px;
    }
</style>

