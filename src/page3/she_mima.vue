<template>
    <div id="she_mima">
      <div class="xiugai_div1">
            <div class="xiugai_div2">
              <p class="xiugai_p1" @click="clickBack">取消</p>
              <p class="xiugai_p2">设置安全密码</p>
            </div>
        </div>
        <p class="she_p1">* 您还未设置安全密码，请验证手机号后设置安全密码</p>
        <div class="she_div1">
            <p class="she_p2">
                <span class="she_span1" >手机号</span> 
                <input type="text" v-model="account" :disabled="isSend1" class="she_input1"  placeholder="请输入手机号">
            </p>
             <p class="she_p3">
                <span class="she_span1">验证码</span> 
                <input type="text" class="she_input1" v-model="param" placeholder="请输入验证码">
                <span class="she_span3"></span>
                <button class="she_span4" @click="register" :disabled="isSend">{{btnText}}</button>
            </p>
            <p class="she_p3">
                <span class="she_span11">设置密码</span>
                <input type="text" class="she_input11" v-if="payType"  v-model="newcode" placeholder="请设置安全密码">
                <input type="password" class="she_input11"  v-else v-model="newcode" placeholder="请设置安全密码">
                <img :src="payType?img1:img" @click="handClick" class="yan_img1" alt="">
            </p>
             <p class="she_p3">
                <span class="she_span11">确认密码</span>
                <input type="text" v-model="newcode1" v-if="payType1" class="she_input11" placeholder="请确认安全密码">
                <input type="password" v-model="newcode1" v-else class="she_input11" placeholder="请确认安全密码">
                 <img :src="payType1?img1:img" @click="handClick1" class="yan_img1" alt="">
            </p>
        </div>
        <p class="xiugai_p3" @click="xiugai">保存</p>
    </div>
</template>
<script>
    export default{
         data(){
            return{
                payType:false,
                payType1:false,
                newcode:"",
                newcode1:'',
                account:'',
                param:'',
                btnText:'获取验证码',
                isSend:false,
                sendTime:0,
                img:require('../assets/image/yan32.png'),
                img1:require('../assets/image/yan33.png'),
                phone:'',
                isSend1:false
            }
        },
        created(){
            this.axios.post('index.php/index/apiuser/salecode',{
                token:sessionStorage.getItem('token')
            }).then((res)=>{
                console.log(res);
                    if(res.data.data!=''){
                    this.account=res.data.data
                    this.isSend1=true
                    }else{
                      this.isSend1=false    
                    }
            })
        },
        methods:{
             handClick(){
                this.payType=!this.payType
            },
             handClick1(){
                this.payType1=!this.payType1
            },
             register(){
                var  regExp=/^(1[3-9])\d{9}$/;
                if(this.account==""){
                    this.$bus.$emit('toast','请输入手机号')
                }else if(!regExp.test(this.account)){
                    this.$bus.$emit('toast','请输入正确的手机号格式')
                }else{
                    this.axios.post('/index.php/index/apireg/getcode',{
                        type:1,
                        flag:2,
                        update:1,
                        account:this.account
                    }).then((res)=>{
                        console.log(res);
                    })
                this.isSend=true;
                this.sendTime=60;
                this.btnText=`已发送${this.sendTime}S`
                this.timer();
                }
            },
            timer(){
                if(this.sendTime>0){
                    this.sendTime--;
                    this.btnText=`已发送${this.sendTime}S`
                    setTimeout(()=>{
                        this.timer();
                    },1000)
                }else{
                    this.isSend=false;
                    this.btnText='重新获取';
                    this.sendTime=60;
                }
            },
            clickBack(){
                this.$router.go(-1);
            },
             xiugai(){
            if(this.param==''){
                    this.$bus.$emit('toast','请输入验证码')
            }else{
               if(this.newcode==""){
                   this.$bus.$emit('toast','请输入新密码')
               }else{
                   if(this.newcode1==""){
                    this.$bus.$emit('toast','请输入确认密码')   
                   }else if(this.newcode1!=this.newcode){
                       this.$bus.$emit('toast','两次密码输入不一致') 
                   }else{
                       this.axios.post('index.php/index/apiuser/editsalecode',{
                           token:sessionStorage.getItem('token'),
                           newcode:this.newcode,
                           newcode1:this.newcode1,
                           account:this.account,
                           param:this.param
                       }).then((res)=>{
                           console.log(res);
                           if(res.data.code==200){
                               this.$bus.$emit('toast','安全密码设置成功')
                               this.$router.push('/zhanghu')
                           }else{
                               this.$bus.$emit('toast',res.data.data)
                           }
                       })
                   }
               }     
            }
        }
        }
    }
</script>
<style scoped>
.yan_img1{
   float:right;
   margin-top:25px; 
   margin-right:30px;
}
 .xiugai_div1{
        width:100%;
        height:80px;
        line-height:80px;
        background:#fff;
    }
    .xiugai_div2{
        width:92%;
        margin:0px 4%;
        font-size:25px;
    }
   .xiugai_p1{
        display:inline-block;
        text-align:left;
    }
    .xiugai_p2{
        display:inline-block;
        text-align:center;
        margin-left:200px;
        font-weight:bold;
        font-size:30px;
    }
    .xiugai_p3{
        width:92%;
        height:80px;
        line-height:80px;
        margin:50px 4%;
        background:#FF8500;
        border-radius:40px;
        text-align:center;
        color:#fff;
        font-size:25px;
    }
    .she_span1{
        display:inline-block;
        width:120px;
        font-size:27px;
    }
    .she_span11{
        display:inline-block;
        width:145px;
        font-size:25px;
    }
    
    .she_p1{
         margin:15px 0px;
        margin-left:30px;
        color:red;
        font-size:20px;
    }
    .she_div1{
        width:100%;
        background:#fff;
    }
    .she_p2{
        width:92%;
        height:120px;
        line-height:120px;
        margin:0 4%;
    }
     .she_p3{
        width:92%;
        height:100px;
        line-height:100px;
        border-top:1px solid #DDDDDD;
        margin:0 4%;
    }
    .she_span2{
        display:inline-block;
        margin-left:50px;
    }
    .she_input1{
        margin-left:30px;
        height:90px;
        line-height: 90px;
        background:none;
    }
    .she_input2{
        margin-left:30px;
    }
    ::-webkit-input-placeholder{
        font-size:30px;
        color:#999999;
    }
    .she_span3{
         display:inline-block;
        width:2px;
        height:40px;
        background:#DDDDDD;
        vertical-align: middle;
        margin-left:70px;
  }
      .she_span4{
          float:right;
          color:#FF8500;
          font-size:30px;
          background:none;
          margin-right:30px;
          margin-top:40px;
    }
    .she_input1{
        margin-left:30px;
        width:200px;
        height:90px;
        line-height: 90px;
        background:none;
    }
   .she_input11{
        height:120px;
        line-height: 120px;
        background:none;
    }
    .she_span1{
        display:inline-block;
        width:120px;
        font-size:30px;
    }
    .she_p3{
        width:92%;
        height:120px;
        line-height:120px;
        border-top:1px solid #DDDDDD;
        margin:0 4%;
    }
</style>
