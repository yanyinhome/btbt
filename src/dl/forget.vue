<template>
    <div id="forget">
        <com-head>找回密码</com-head>
        <div class="forget_div1"></div>
         <div >
              <div class="forget_div3">
                  <p class="forget_p7">手机号/邮箱</p>
                  <input class="forget_input1" v-model="account" type="text" placeholder="请输入手机号/邮箱地址">
              </div>
              <div class="forget_div4">
                <p class="forget_p8">验证码</p>
                <input class="forget_input2" v-model="param" type="text" placeholder="请输入验证码">
                <button class="forget_p9"  :disabled="isSend" @click="indexs">{{btnText}}</button>
            </div>
            <div class="forget_div3">
                  <p class="forget_p7">新密码</p>
                  <input class="forget_input1" v-model="password" type="password" placeholder="请设置新的密码">
              </div>
              <div class="forget_div3">
                  <p class="forget_p7">确认密码</p>
                  <input class="forget_input1"  v-model="password1" type="password" placeholder="再次新确认密码">
              </div>
              <p class="forget_p10" :class="[this.account!=''&&this.param!=''&&this.password1!=''&&this.password!=''?'active':'on']" @click="forget">确定</p>
            </div>
    </div>
</template>
<script>
    export default{
        data(){
            return{
                btnText:'获取验证码',
                isSend:false,
                time:0,
                account:"",
                param:'',
                password:"",
                password1:"",
                type:0,
            }
        },
        methods:{
            forget(){
                 var reg=/^\d{5,12}@[qQ][qQ]\.(com|cn)$/;
                var  regExp=/^(1[3-9])\d{9}$/;
                if(this.account==""){
                    this.$bus.$emit('toast','请输入邮箱账号或手机号')
                }else{
                    if(this.param==''){
                         this.$bus.$emit('toast','请输入验证码')
                    }else{
                        if(this.password==""){
                           this.$bus.$emit('toast','请输入新密码') 
                        }else{
                            if(this.password1==''){
                                this.$bus.$emit('toast','请输入确认密码') 
                            }else if(this.password1!=this.password){
                                this.$bus.$emit('toast','两次密码不一致')
                            }else{
                               this.axios.post('/index.php/index/apireg/forgetpwd',{
                                   account:this.account,
                                   param:this.param,
                                   password:this.password,
                                   password1:this.password1
                               }).then((res)=>{
                                   console.log(res);
                                   if(res.data.code==200){
                                       this.$bus.$emit('toast','找回成功')
                                       this.$router.push('/login')
                                   }else{
                                       this.$bus.$emit('toast',res.data.data)
                                   }
                               })
                            }
                        }
                    }
                }
            },
            indexs(){
                var reg=/^\d{5,12}@[qQ][qQ]\.(com|cn)$/;
                var  regExp=/^(1[3-9])\d{9}$/;
                if(this.account==""){
                    this.$bus.$emit('toast','请输入邮箱账号或手机号')
                }else if(!reg.test(this.account)){
                    this.type=1
                      this.axios.post('index.php/index/apireg/getcode',{
                        flag:2,
                        type:this.type,
                        account:this.account
                    }).then((res)=>{
                        console.log(res);
                        if(res.data.code==200){
                            this.$bus.$emit('toast','发送成功')
                        }else{
                           this.$bus.$emit('toast',res.data.data) 
                        }
                    })
                  if(reg.test(this.account)||regExp.test(this.account)){
                this.isSend=true;
                this.time=60;
                this.btnText=`已发送${this.time }S`;
                this.timer();
                }
                }else if(!regExp.test(this.account)){
                    this.type=2
                    this.axios.post('index.php/index/apireg/getcode',{
                        flag:2,
                        type:this.type,
                        account:this.account
                    }).then((res)=>{
                        console.log(res);
                        if(res.data.code==200){
                            this.$bus.$emit('toast','发送成功')
                        }else{
                           this.$bus.$emit('toast',res.data.data) 
                        }
                    })
                if(reg.test(this.account)||regExp.test(this.account)){
                this.isSend=true;
                this.time=60;
                this.btnText=`已发送${this.time }S`;
                this.timer();
                }
                }
            },
            timer(){
               if(this.time>0){
                   this.time--;
                    this.btnText=`已发送${this.time }S`;
                setTimeout(()=>{
                        this.timer();
                    },1000)
               }else{
                this.btnText='重新获取',
                this.time=60,
                this.isSend=false
               }
            }
        }
    }
</script>
<style scoped>
.active{
    background:#FF8500;
}
.on{
      background:#CFD0D4;
}
#forget{
    background:#fff;
}
.forget_div1{
     width:100%;
     height:100px;
     border-bottom:1px solid #DDDDDD;
}
 .forget_div3{
      width:92%;
      height:120px;
      line-height:120px;
      margin:0px 4%;  
      border-bottom:1px solid #DDDDDD;
    }
    .forget_p7{
        display:inline-block;
        width:170px;
        color:#000;
        margin-left:25px;
        font-size:27px;
        margin-top:15px;
    }
    .forget_input1{
        width:50%;
        height:120px;
        line-height:50px;
        background:none;
        outline:none;
        border:none;
        padding-left:30px;
        color:#000;
    }
  ::-webkit-input-placeholder{
      color:gray;
     font-size:27px;
  }
   .forget_div4{
      width:92%;
      height:120px;
      line-height:120px;
      margin:0px 4%;  
      border-bottom:1px solid #DDDDDD;
    }
    .forget_p8{
        display:inline-block;
        width:170px;
        margin-left:25px;
        font-size:27px;
        margin-top:15px;
    }
    .forget_input2{
        background:none;
        outline:none;
        border:none;
        width:32%;
        height: 120px;
        line-height:50px;
        padding-left:30px;
        color:#000;
    }
   .forget_p9{
        width:190px;
        height:60px;
        line-height:60px;
        text-align:center;
        display:inline-block;
        font-size:24px;
        color:#fff;
        background:#FF8500;
        margin-left:35px;
    }
    .forget_p10{
        width:92%;
        margin:0 4%;
        height:70px;
        line-height:70px;
        border-radius:70px;
        margin-top:70px;
        text-align:center;
        font-size:27px;
        color: #fff;
        font-weight:bold;
    }
</style>

