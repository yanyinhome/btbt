<template>
    <div id="register">
         <p  id="icon" ><img src="../assets/image/left.png" class="icon_img1" @click="clickBack" alt=""></p>
        <!--弹层-->
         <div id="login_div">
        <div class="move" v-if="tan"></div>
        <div>
          <p class="login_p1"> <img src="../assets/image/xin4.png" alt="" class="register_img1"></p> 
          <!--<p class="register_p2"> <img src="../assets/image/login2.png" alt="" class="register_img2"></p>-->
        </div>
        <div class="add_div1">
            <p class="add_p1">注册BTOX</p>
            <p class="add_p2">欢迎来到币涂网/可以使用BTOX国际账号进行登录</p>
        </div>
        <div class="register_div2">
            <p class="register_p5" @click="indexs" :class="[hide==true?'active':'#FFDDDDDD']">手机号</p>
            <p class="register_p6" @click="indexs1" :class="[hide1==true?'active':'#FFDDDDDD']">邮箱</p>
        </div>
        <!--手机号注册-->
        <div v-if="hide">
            <div class="register_div3">
                <input class="register_input1" v-model="phone" type="text" placeholder="手机号">
            </div>
            <div class="register_div3">
                <input class="register_input2" v-model="param" type="text" placeholder="验证码">
                <div class="float">
                   <p class="register_p8"></p>
                  <button class="register_p9"   @click="yang" :disabled="isSend">{{btnText}}</button>
                </div>
            </div>
            <div class="register_div3">
                <input class="register_input1"  v-if="hiden==true" v-model="password" type="text" placeholder="密码">
                <input class="register_input1" v-else  v-model="password" type="password" placeholder="密码">
                <p class="float_yan"><img :src="hiden==false?img:img1" alt="" @click="dianji" class="yan"></p>
            </div>
            <div class="register_div3">
                <input class="register_input1" v-if="hiden1==true" type="text" v-model="password1 " placeholder="确认密码">
                <input class="register_input1"  v-else type="password" v-model="password1 " placeholder="确认密码">
                <p class="float_yan"><img :src="hiden1==false?img:img1" alt="" @click="dianji1" class="yan"></p> 
            </div>
            <div class="register_div3">
                <input class="register_input1" v-model="pcode" :readonly='Send' type="text" placeholder="推荐人ID">
            </div>
             <p class="add">点击"注册"即同意 <router-link class="add_a" to="/xieyi">《用户注册协议》</router-link></p>
             <p class="login_p8" @click="yang3">确认注册</p>
        </div>
        <!--邮箱注册-->
        <div v-if="hide1">
            <div class="register_div3">
                <input class="register_input1" v-model="email" type="text" placeholder="邮箱">
            </div>
            <div class="register_div3">
                <input class="register_input2" type="text" v-model="param1" placeholder="验证码">
                <div class="float">
                   <p class="register_p8"></p>
                   <button   class="register_p9"  @click="register1" :disabled1="isSend1">{{btnText1}}</button>
                </div>
            </div>
            <div class="register_div3">
                <input class="register_input1" v-if="you==true"  type="text" v-model="password2" placeholder="密码">
                 <input class="register_input1" v-else type="password" v-model="password2" placeholder="密码">
                 <p class="float_yan"><img :src="you==false?img:img1" alt="" @click="xiang" class="yan"></p>
            </div>
            <div class="register_div3"> 
              <input class="register_input1" v-if="you1==true" v-model="password21" type="text" placeholder="确认密码">
              <input class="register_input1" v-else v-model="password21" type="password" placeholder="确认密码"> 
              <p class="float_yan"><img :src="you1==false?img:img1" alt="" @click="xiang1" class="yan"></p>
            </div>
            <div class="register_div3">
               <input class="register_input1" type="text" :readonly='Send' v-model="pcode1" placeholder="推荐人ID"> 
            </div>
            <p class="add">点击"注册"即同意 <router-link class="add_a" to="/xieyi">《用户注册协议》</router-link></p>
            <p class="login_p8" @click="yang2">确认注册</p>
        </div>
        <!--注册成功弹框-->
        <div class="alert" v-if="tan">
            <div class="alert_div1">
                <p class="alert_p1">恭喜您，&nbsp; 注册成功！</p>
                  <p class="qing2_p"><img src="../assets/image/qing2.png" class="qing2" alt=""></p>  
             </div>
                 <p class="alert_p2" v-html="content"></p>
             <div class="alert_div3">
                  <p class="alert_p3" @click="dl">立即下载APP</p>
             </div>
         </div>
       </div>
    </div>
</template>
<script>
    export default{
        data(){
            return{
                //邮箱
                code:'',
                you:false,
                you1:false,
                hiden:false,
                hiden1:false,
                img:require('../assets/image/mima.png'),
                img1:require('../assets/image/mima2.png'),
                code1:'',
                param1:'',
                password2:"",
                password21:"",
                pcode1:'',
                phone:'',
                email :'',
                content:'',
                param :'',
                dis1:false,
                dis:false,
                password :"",
                password1:"",
                pcode :'',
                hide:true,
                hide1:false,
                isSend:false,
                btnText:'获取验证码',
                btnText1:'获取验证码',
                sendTime:0,
                flag:1,
                type:1,
                isSend1:false,
                sendTime1:0,
                Send:false,
                tan:false,
                yzm:false,
                yzm1:false,
                yzm2:false,
                yzm3:false
            }
        },
        created(){
            this.ind();
            if(this.$route.query.from_code){
                this.pcode=this.$route.query.from_code
                this.pcode1=this.$route.query.from_code
                this.Send=true
            }else{
                this.Send=false
            }
        },
        methods:{
            yang(){
                if(!this.yzm){
                    this.register();
                }else{
                    this.$bus.$emit('toast','不可重复点击!')
                }
            },
             yang1(){
                if(!this.yzm1){
                    this.register1();
                }else{
                    this.$bus.$emit('toast','不可重复点击!')
                }
            }, 
            yang2(){
                if(!this.yzm2){
                    this.zc1();
                }else{
                    this.$bus.$emit('toast','不可重复点击!')
                }
            },
             yang3(){
                if(!this.yzm3){
                    this.zc();
                }else{
                    this.$bus.$emit('toast','不可重复点击!')
                }
            },
             xiang(){
                this.you=!this.you
            },
            xiang1(){
                this.you1=!this.you1
            },
               dianji(){
                this.hiden=!this.hiden
            },
             dianji1(){
                this.hiden1=!this.hiden1
            },
            clickBack(){
                this.$router.go(-1);
            },
            index(){
                this.$router.push('/index')
                sessionStorage.getItem('select',0)
            },
            dl(){
                this.$router.push('/haibao')
            },
            indexs(){
                this.hide=true;
                this.hide1=false
            },
            ind(){
                if(this.hide==true){
                    this.type=1;
                }else if(this.hide1==true){
                    this.type=2;
                }
            },
              indexs1(){
                this.hide=false;
                this.hide1=true
            },
              zc1(){
                   this.yzm2=true
                if(this.email==""){
                    this.$bus.$emit('toast','邮箱不能为空')
                }else{
                    if(this.param1==''){
                        this.$bus.$emit('toast','验证码不能为空')
                    }else{
                        if(this.password2==''){
                         this.$bus.$emit('toast','登录密码不能为空')   
                        }else{
                            if(this.password21==''){
                               this.$bus.$emit('toast','确认密码不能为空')    
                            }else if(this.password21!=this.password2){
                                this.$bus.$emit('toast','确认密码与登录密码不一致') 
                            }else{
                                if(this.pcode1==''){
                                   this.$bus.$emit('toast','推荐码') 
                                }else{
                                    this.axios.post('index.php/index/apireg/index',{
                                        type:this.type,
                                        email:this.email,
                                        param1:this.param1,
                                        password2:this.password2,
                                        password21:this.password21,
                                        pcode1:this.pcode1
                                    }).then((res)=>{
                                         this.yzm2=false
                                        console.log(res);
                                        if(res.data.code==200){
                                            this.$bus.$emit('toast','注册成功')
                                            this.tan=true
                                            this.content=res.data.content
                                        }else{
                                           this.$bus.$emit('toast',res.data.data)
                                        }
                                    })
                                }
                            }
                        }
                    }
                }
            },
            zc(){
                this.yzm3=true
                let regExp = /^(1[3-9])\d{9}$/;
                if(this.phone==""){
                    this.$bus.$emit('toast','手机号不能为空')
                }else if(!regExp.test(this.phone)){
                    this.$bus.$emit('toast','手机号格式不正确')
                }else{
                    if(this.param==''){
                        this.$bus.$emit('toast','验证码不能为空')
                    }else{
                        if(this.password==''){
                         this.$bus.$emit('toast','登录密码不能为空')   
                        }else{
                            if(this.password1==''){
                               this.$bus.$emit('toast','确认密码不能为空')    
                            }else if(this.password1!=this.password){
                                this.$bus.$emit('toast','确认密码与登录密码不一致')
                            }else{
                                if(this.pcode==''){
                                   this.$bus.$emit('toast','推荐人ID不能为空') 
                                }else{
                                   this.axios.post('index.php/index/apireg/index',{
                                       phone:this.phone,
                                       param:this.param,
                                       type:this.type,
                                       password:this.password,
                                       password1:this.password1,
                                       pcode:this.pcode
                                   }).then((res)=>{
                                       this.yzm3=false
                                       // console.log(res);
                                        if(res.data.code==200){
                                            this.$bus.$emit('toast','注册成功') 
                                            this.tan=true
                                            this.content=res.data.content
                                        }else{
                                           this.$bus.$emit('toast',res.data.data)   
                                        }
                                   })
                                }
                            }
                        }
                    }
                }
            },
            register(){
                this.yzm=true
                 this.ind();
                 let regExp = /^(1[3-9])\d{9}$/;
                 if(this.phone==""){
                    this.$bus.$emit('toast','手机号不能为空')
                }else if(!regExp.test(this.phone)){
                    this.$bus.$emit('toast','手机号格式不正确')
                }else{
                   // console.log(this.flag);
                  //  console.log(this.type);
                    this.axios.post('index.php/index/apireg/getcode',{
                        type:this.type,
                        flag:this.flag,
                        phone:this.phone
                    }).then((res)=>{
                        this.yzm=false
                        console.log(res);
                        this.code=res.data.code
                          if(this.code==200){
                this.isSend=true;
                this.sendTime=60;
                this.btnText=`已发送${this.sendTime}S`
                this.timer();
                this.$bus.$emit('toast','发送成功')
                }else if(this.code==201){
                    this.$bus.$emit('toast',res.data.data)
                }
                    })
                }
            },
             register1(){
                 this.yzm1=true
                 this.ind();
                 if(this.email==""){
                    this.$bus.$emit('toast','邮箱不能为空')
                }else{
                    this.axios.post('index.php/index/apireg/getcode',{
                        type:this.type,
                        flag:this.flag,
                        email:this.email
                    }).then((res)=>{
                        this.yzm1=false
                       // console.log(res)
                       this.code1=res.data.code
                          if(res.data.code==200){
                  this.$bus.$emit('toast','发送成功'),
                this.isSend1=true,
                this.sendTime1=60,
                this.btnText1=`已发送${this.sendTime1}S`,
                this.timer1()
                }else if(res.data.code==201){
                    this.$bus.$emit('toast',res.data.data)
                }
                    })
                }
            },
            timer1(){
                if(this.sendTime1>0){
                    this.sendTime1--;
                    this.btnText1=`已发送${this.sendTime1}S`
                    setTimeout(()=>{
                        this.timer1();
                    },1000)
                }else{
                    this.isSend1=false,
                    this.btnText1='重新获取',
                    this.sendTime1=60
                }
            },
           
            timer(){
                if(this.sendTime>0){
                    this.sendTime--,
                    this.btnText=`已发送${this.sendTime}S`,
                    setTimeout(()=>{
                        this.timer()
                    },1000)
                }else{
                    this.btnText='重新获取',
                    this.isSend=false,
                    this.sendTime=60
                }
            }
        }
    }
</script>
<style scoped>
.float_yan{
    float:right;
}

.yan{
    transform: scale(0.5);
    margin-top:55px;
}

.yong{
    position: fixed;
    top:100px;
    width:92%;
    height:100%;
}
.qing2_p{
    margin:50px auto;
    width:400px;
}
.qing2{
    width:100%;
}
.float{
    float:right;
}
 .login_p1{
        text-align:left;
        margin:40px 0px;
        width:400px;
        margin-left:30px;
    }
  .register_img1{
   width:100%;
}
.icon_img1{
   width:3%;
   margin-left:30px;
   margin-top:30px;
}
#login_div{
        width:92%;
        margin:0px 4%;
    }
.add_div1{
    color:#fff;
}
.add_p1{
    font-size:30px;
    margin-left:25px;
}
.add_p2{
    margin-left:30px;
    color:#9DC3FF;
    font-size:25px;
}
.add{
    color:#DDDDDD;
    margin-left:50px;
    font-size:20px;
    margin-top:15px;
}
.add_a{
    color:#fff;
    border-bottom:1px solid #fff;
}
.move{
    position: fixed;
    top:0;
    left:0;
    right:0;
    bottom:0;
    background:#000;
    width:100%;
    height:100%;
    opacity: 0.6;
}
.alert_p3,.alert_p4{
    width:420px;
    height:80px;
    line-height:80px;
    border-radius:40px;
    text-align:center;
    font-size:25px; 
    color:#fff;
    background:#FF8500;
    margin:0 auto;
    margin-top:60px;
}
.alert_p4{
    border:1px solid #FF8500;
    background:none;
    color:#FF8500;
    margin-top:25px;
}
.alert_p1{
    text-align:center;
    margin-top:80px;
    font-size:50px;
    color:#FF8500;
    font-weight:bold;
}
.alert_div3{
    margin-top:-100px;
}
.alert_p2{
    width:420px;
    text-align:center;
    margin:0  auto;
    font-size:25px;
    color:#666666;
    margin-top:55px;
}
.alert_span1{
    color:red;
}
.alert_div1{
 width:92%;
 height:340px;
 margin:0px 4%;
 margin-top:30px;
 background-size: 100% 100%;
}   
#register{
    position: relative;
}
.alert{
    position: fixed;
    top:140px;
    width:92%;
    padding-bottom:50px;
    background:#fff;
    border-radius:12px;
}
input{
    color:#fff;
}
.active{
    color:#fff;
    border-bottom:3px solid #fff;
}
#register{
    position: relative;
     background: #448DFF;
}
     .register_div1{
        width:100%;
        height:100px;
    }
    .register_p1{
        text-align:left;
        margin-left:-140px;
        
    }
   .register_p2{
        display:inline-block;
        margin-top:79px;
        margin-left:30px;
    }
     .register_div2{
        color:#DDDDDD;
        margin:0px 80px;
        margin-bottom:0px;
        margin-top:45px;
    }
    .register_p5{
       display:inline-block;  
       width:110px;
       text-align:center;
    }
    .register_p6{
      display:inline-block; 
      width:110px;
      text-align:center;
    }
     .register_div3{
     display: inline-block;
      width:92%;
      height:120px;
      line-height: 160px;
      margin:0px 4%;  
        border-bottom:1px solid #ABCCFF;
    }
    .register_p7{
        display:inline-block;
        width:150px;
        color:#fff;
        margin-left:25px;
        line-height:120px;
    }
    .register_input1{
        background:none;
        outline:none;
        border:none;
        width:400px;
        height:120px;
        line-height: 50px;
        color:#fff;
    }
    .register_input2{
        background:none;
        outline:none;
        width:40%;
        height:120px;
        line-height:50px;
        border:none;
        color:#fff;
    }
    ::-webkit-input-placeholder{
        color:#9DC3FF;
        font-size:30px;
    }
    .register_p8{
        display:inline-block;
        width:2px;
        height:40px;
        background:#fff;
        margin-right:10px;
        vertical-align:middle;
    }
    .register_p9{
        display:inline-block;
        color:#fff;
        font-size:20px;
        background:transparent;
        outline: none;
        border:none;
        margin-left:15px;
    }
    .login_p8{
        width:92%;
        margin:0 4%;
        height:70px;
        line-height:70px;
        background:#fff;
        border-radius:70px;
        margin-top:40px;
        text-align:center;
        font-size:27px;
        color: #999999;
    }
</style>


