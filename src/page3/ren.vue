<template>
    <div id="ren">
       <div class="xiang_div1">
 <div class="zichan_div2">
                   <p class="iconfont icon-return" @click="clickBack"></p>
                   <p class="zichan_p3">身份认证</p>
             </div>
        <div class="ren_div2">
             <p class="radio"><img src="../assets/image/yuan.png" alt=""></p>
            <div class="ren_div3">
                <p class="ren_p2">{{name}}</p>
                <p class="ren_p3">{{idcard_num}}</p>
            </div>
             <p class="ren_p4"><img src="../assets/image/88.png" class="ren_img2" alt=""></p>
            <div class="ren_div4">
             <p class="ren">
                 <img src="../assets/image/ssss.png" class="renimg" alt="">
                 <span class="redspan">已认证</span>
             </p>
                <span class="ren_span1"> 个人隐私信息安全保护中</span> 
            </div>
        </div>
       </div>
       <div class="add_div3">
       <div class="add_div1">
           <div class="add_div2">
            <p class="add_p1">安全信息</p>
            <p class="add_p2"><img src="../assets/image/zhang10.png" class="add_img1" alt=""></p>
           </div>
       </div>
       <div class="add_div1">
           <div class="add_div4">
            <p class="add_p1">实名认证</p>
            <p class="add_p2">已认证</p>
           </div>
       </div>
       </div>
    </div>
</template>
<script>
    export default{
        data(){
            return{
                 name:'',
                 idcard_num:''
            }
        },
        created(){
            this.axios.post('index.php/index/apiuser/isreal',{
                token:sessionStorage.getItem('token')
            }).then((res)=>{
                console.log(res)
                this.name=res.data.data.name;
                this.idcard_num=res.data.data.idcard_num
            })
        },
        methods:{
            clickBack(){
                this.$router.go(-1);
            }
        },
       
    }
</script>
<style scoped>
.add_p1{
    display: inline-block;
}
.add_p2{
float:right;
color:#555555;
}
.add_div3{
    clear: both;
    padding-top:40px;
   
}
.add_div1{
    background:#fff;
    width:100%;
}
.add_div4{
    border-top:1px solid #dddddd;
}
.add_div2,.add_div4{
    width:92%;
    height:120px;
    line-height:120px;
     margin:0px 4%;
}
#ren{
    position: relative;
}
.radio{
    position: fixed;
    top:100px;
    width:130px;
    height: 130px;
    border-radius: 50%;
    background:#fff;
    left:300px;
    border: 10px solid #448DFF;
}
.redspan{
    display:inline-block;
    vertical-align: top;
    color:#FF8500;
}
.renimg{
    transform: scale(0.6);
}
.ren{
    font-size:20px;
    width:180px;
    height:50px;
    line-height:50px;
    border:1px solid #FF8500;
    margin:0 auto;
}
.xiang_div1{
    width:100%;
    height:400px;
    background:#448DFF;
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
    .ren_div1{
        width:100%;
        height:80px;
    }
    .ren_div2{
        width:92%;
        height:400px;
        margin:50px 4%;
        padding-top:30px;
        background: #fff;
        border-radius:15px;
        text-align:center;
        box-shadow: 0px 7px 7px #dddddd;
    }
    .ren_p1{
        float:left;
        width:200px;
        height:200px;
        border-radius:50%;
        margin-top:30px;
        margin-left:50px;
    }
    .ren_div3{
        float:left;
        color:#000;
        font-size:35px;
        text-align:center;
        margin-top:95px;
        margin-left:220px;
    }
    .ren_p4{
        float:right;
        color:#000;
    }
    .ren_p3{
        font-size:25px;
        color:#000;
        margin-top:20px;
    }
    .ren_div4{
        clear: both;
        padding-top:30px;
    }
    .ren_img2{
        float:right;
        margin-right:10px;
    }
    .ren_img3{
        float:left;
        transform: scale(0.7);
    }
    .ren_span1{
        float:left;
        color:#666666;
        margin-left:30px;
        font-size:25px;
        margin-top:25px;
    }
</style>

