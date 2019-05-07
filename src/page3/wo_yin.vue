<template>
    <div id="wo_yin" :class="hide==true?'wo_yin':'wo_yin1'">
        <div class="bgColor">
        <p class="iconfont icon-return" @click="clickBack"></p>
        <div class="wo_div1">
            <p class="wo_p1">我的银行卡</p>
            <div class="wo_div2" >
                 <p class="wo_p22">
                    <img src="../assets/image/kaxin.png" class="wo_img22" alt="">
                </p>
                <p class="wo_p2">
                    <img :src="'http://'+list.img" class="wo_img1" alt="">
                    {{list.bank}}
                </p>
                <p class="wo_p3">
                         {{list.bank_num}}             
                </p>
            </div>
        </div>
        </div>
        <div class="wo_div3">
            <p class="wo_p4">银行卡信息</p>
            <div class="wo_div4">
                <p class="wo_p5"> <span class="wo_span3">开户行</span>
                <span class="wo_span4">{{list.bank}}</span></p>
                <p class="wo_p5"><span class="wo_span3">支行名称</span>
              <span class="wo_span4"> {{list.bank_name}}</span></p>
                <p class="wo_p5"><span class="wo_span3">持卡人姓名</span>
               <span class="wo_span4">{{list.bank_username}}</span></p>
                <p class="wo_p5"><span class="wo_span3">银行卡号</span>
              <span class="wo_span4"> {{list.bank_num}}</span></p>
            </div>
        </div>
    </div>
</template>
<script>
    export default{
        data(){
            return{
                hide:false,
                list:[]
            }
        },
        methods:{
            clickBack(){
                this.$router.go(-1)
            },
            
        },
        created(){
              this.axios.post('index.php/index/apiuser/userbank',{
                token:sessionStorage.getItem('token')
            }).then((res)=>{
                console.log(res)
                this.list=res.data.data
            })
        }
    }
</script>
<style scoped>
#wo_yin{
    background:#fff;
}
.bgColor{
    background:url('../assets/image/bg.png') no-repeat;
    width:100%;
    height:700px;
    background-size:100% 100%;
}
.wo_span4{
  margin-left:30px;
}
.wo_yin{
    position: relative;
    overflow:hidden;
}
.wo_yin1{
    position: relative;
}
.move{
    width:100%;
    height:100%;
    position: fixed;
    top:0;
    left:0;
    right:0;
    bottom:0;
    background:#000;
    opacity:0.6;
}
.tan{
    position: fixed;
    width:100%;
    bottom:5px;
}
.tan_p1,.tan_p2{
    width:96%;
    height:120px;
    line-height:120px;
    border-radius:15px;
    margin:15px 2%;
    text-align:center;
    color:red;
    background:#F8F8F8;
    font-size:32px;
}
.tan_p2{
   color:#000;
}
#wo_yin{
    background:#fff;
   
}
    .iconfont{
        margin-left:30px;
        padding-top:30px;
    }
    .wo_p1{
        margin-left:30px;
        margin-top:40px;
        font-weight:bold;
        font-size:30px;
    }
    .wo_div2{
        width:80%;
        margin:0px 10%;
        height:360px;
        background:linear-gradient(90deg,#6054FF,#9C92FF);
        border-radius:35px;
        margin-top:30px;
    }
    .wo_p2{
        float:right;
        margin-right:30px;
        margin-top:30px;
        color:#fff;
    }
    .wo_img1{
        display:inline-block;
        vertical-align: middle;
        width:50px;
    }
    .wo_span1{
        display:inline-block;
        width:15px;
        height:15px;
        background:#fff;
    }
    .wo_p3{
        width:100%;
        float:left;
        color:#fff;
        font-size:45px;
        margin-top:110px;
        margin:0 auto;
        padding-top:100px;
        text-align: center;
    }
    .wo_span2{
        display:inline-block;
        vertical-align: middle;
    }
    .wo_div3{
        background: #fff;
        padding:30px 0px;
    }
    .wo_p4{
        font-size:25px;
        text-align:center;
        margin-bottom:30px;
    }
    .wo_div4{
        width:90%;
        margin:0px 5%;
        height:400px;
        box-shadow: 0px 0px 14px #999999;
        border-radius:15px;
    }
    .wo_p5{
        border-top:1px solid #eee;
        margin-left:30px;
        height:100px;
        line-height:100px;
        font-size:25px;
    }
    .wo_span3{
        display: inline-block;
        color:#666666;
        font-size:25px;
        width:150px;
    }   
    .wo_p22{
        float:left;
       
    }
    .wo_img22{
        width:80px;
        height:60px;
        margin-top:40px;
        margin-left:30px;
    }
</style>
