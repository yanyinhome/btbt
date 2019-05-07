<template>
    <div id="shifang">
        <com-head>释放率值</com-head>
        <div class="fang_div1"></div>
        <div class="fang_div2">
            <p class="fang_p1">我的释放率值</p>
            <div class="fang_div4">
               <div class="fang_div3">
                  <p class="fang_p2">{{list.lizhi}}%</p>
                  <p class="fang_p3"><img src="../assets/image/money.png" class="qq_img" alt=""></p>
              </div>
              <div class="fang_div5">
                  <p class="fang_p23">1.00%</p>
                  <p class="fang_p3"><img src="../assets/image/money2.png" class="qq_img" alt=""></p>
              </div>
               <div class="fang_div6">
                  <p class="fang_p23">1.00%</p>
                  <p class="fang_p3"><img src="../assets/image/money1.png" class="qq_img" alt=""></p>
              </div>
            </div>
            <div class="fang_div8">
               <div class="fang_div7">
                  <p class="fang_p4"></p>
                  <p class="fang_p5">BT率值</p>
               </div>
               <div class="fang_div78">
                  <p class="fang_p6"></p>
                  <p class="fang_p5">智能率值</p>
               </div>
               <div class="fang_div79">
                  <p class="fang_p7"></p>
                  <p class="fang_p5">基石锁仓</p>
               </div>
            </div>
        </div>
        <div class="fang_div10">
           <div class="fang_div9">
              <p class="fang_p8">释放规则:</p>
              <p class="fang_p9" v-html="list.gz"></p>
          
          </div>
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
            this.axios.post('index.php/index/apiservice/lizhi',{
                token:sessionStorage.getItem('token')
            }).then((res)=>{
                console.log(res)
                this.list=res.data.data
            })
        }
    }
</script>
<style scoped>
.fang_p3,.fang_p33{
       width:100px;
       height:100px;
       margin-left:15px;
       margin-top:-15px;
 }
.fang_p33{
    margin-top:-10px;
}
.qq_img{
  width:100%;
  height:110%;
}
    .fang_div1{
        width:100%;
        height:92px;
    }
    .fang_div2{
        width:100%;
        background:#479FEF;
    }
    .fang_p1{
        margin-left:30px;
        padding-top:30px;
        color:#fff;
        font-size:25px;
    }
    .fang_div4{
        width:92%;
        margin:0px 4%;
    }
    .fang_div3,.fang_div6,.fang_div5{
        display:inline-block;
        width:180px;
        height:170px;
        background:#4F0395;
        margin-top:40px;
        border-top-left-radius: 35px;
        border-bottom-right-radius: 35px;
        margin-left:35px;
    }
    .fang_div6{
         background:#3BA800;
         padding-bottom:0px;
         padding-top:5px;
    }
    .fang_div5{
         background:#DC9001;
         padding-top:3px;
    }
    .fang_p2{
        color:#fff;
        text-align:right;
        margin-right:47px;
        padding-top:20px;
        font-weight:bold;
    }
     .fang_p23{
        color:#fff;
        text-align:right;
        margin-right:50px;
        padding-top:20px;
        font-weight:bold;
    }
     .fang_p24{
        float:left;
        color:#fff;
        margin-right:50px;
        font-weight:bold;
    }
    .qq_img{
      transform: scale(0.7);
    }
    .fang_p4,.fang_p6,.fang_p7{
        display:inline-block;
        width:16px;
        height:16px;
        background:#7D07E8;
    }
    .fang_p6{
        width:15px;
        height:15px;
        background:#FFA600; 
    }
    .fang_p7{
        width:15px;
        height:15px;
        background:#40A10B;
    }
    .fang_p5{
        display:inline-block;
        color:#fff;
    }
    .fang_div7{
        display:inline-block;
        width:30%;
        text-align:center;
        margin-top:20px;
        margin-bottom:40px;
        margin-left:32px;
    }
    .fang_div78{
        display:inline-block;
        width:30%;
        text-align:center;
        margin-top:20px;
        margin-bottom:40px;
    }
    .fang_div79{
        display:inline-block;
        width:30%;
        text-align:center;
        margin-top:20px;
        margin-bottom:40px;
        margin-left:-10px;
    }
    .fang_div10{
        background:#fff;
    }
    .fang_div9{
        width:94%;
        margin:0px 3%;
    }
    .fang_p8{
        padding-top:30px;
    }
    .fang_p9{
        font-size:25px;
        margin-top:20px;
    }
    .fang_p10{

    }
    .fang_p11{
        font-size:25px;
    }
    .fang_p12{
        font-size:25px;
    }
    .fang_p13{
        padding-bottom:30px;
        font-size:25px;
    }
</style>

