<template>
    <div id="xiugai">
        <div class="xiugai_div1">
            <div class="xiugai_div2">
               <p class="iconfont icon-return xiugai_p1" @click="clickBack"></p>
              <p class="xiugai_p2">修改安全密码</p>
            </div>
        </div>
        <div class="xiugai_div3">
             <p class="xiugai_p44">
                 <span class="xiugai_span1" >手机号</span>
                 <input type="text" v-model="account" :disabled='isSend1'  class="xiugai_input1" placeholder="请输入原安全密码">
             </p>
                 <p class="she_p3">
                <span class="she_span1">验证码</span> 
                <input type="text" class="she_input1" v-model="param" placeholder="请输入验证码">
                <span class="she_span3"></span>
                <button class="she_span4" @click="register" :disabled="isSend">{{btnText}}</button>
            </p>
             <p class="xiugai_p4">
                 <span class="xiugai_span1" >原密码</span>
                 <input type="text" v-model="oldcode" v-if="payType"  class="xiugai_input1" placeholder="请输入原安全密码">
                 <input type="password" v-model="oldcode" v-else class="xiugai_input1" placeholder="请输入原安全密码">
                 <img :src="payType?img1:img" @click="handClick" class="yan_img1" alt="">
             </p>
            <p class="xiugai_p4">
                <span class="xiugai_span1">新密码</span>
                <input type="text" v-model="newcode" v-if="payType1" class="xiugai_input1" placeholder="请输入新安全密码">
                <input type="password" v-model="newcode" v-else class="xiugai_input1" placeholder="请输入新安全密码">
                <img :src="payType1?img1:img" @click="handClick1" class="yan_img1" alt="">
            </p>
            <p class="xiugai_p4">
                <span class="xiugai_span1" >确认密码</span>
                <input type="text" v-model="newcode1" v-if="payType2" class="xiugai_input1" placeholder="请确认新的安全密码">
                <input type="password" v-model="newcode1" v-else class="xiugai_input1" placeholder="请确认新的安全密码">
                <img :src="payType2?img1:img" @click="handClick2" class="yan_img1" alt="">
            </p>
        </div>
         <p class="xiugai_p3" @click="pan">保存</p>
    </div>
</template>
<script>
    export default{
        data(){
            return{
                newcode: "",
                account:'',
                newcode1:'',
                oldcode: '',
                img:require('../assets/image/yan32.png'),
                img1:require('../assets/image/yan33.png'),
                payType:false,
                payType1:false,
                payType2:false,
                isSend1:false,
                param:'',
                btnText:'获取验证码',
                isSend:false,
                sendTime:0,
                bao:false
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
            pan(){
               if(!this.bao){
                   this.xiugai();
               }else{
                   this.$bus.$emit('toast','请勿重复点击！')
               }
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
                        if(res.data.code==200){
                        this.$bus.$emit('toast','验证码已发送')
                        }else{
                          this.$bus.$emit('toast',res.data.data)   
                        }
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
            handClick(){
                this.payType=!this.payType
            },
             handClick1(){
                this.payType1=!this.payType1
            },
             handClick2(){
                this.payType2=!this.payType2
            },
            clickBack(){
                this.$router.go(-1);
            },
            xiugai1(){
                     this.bao=true
                       this.axios.post('index.php/index/apiuser/editsalecode',{
                           token:sessionStorage.getItem('token'),
                           newcode:this.newcode,
                           newcode1:this.newcode1,
                           oldcode:this.oldcode,
                           account:this.account,
                           param:this.param
                       }).then((res)=>{
                           //console.log(res);
                           this.bao=false
                           if(res.data.code==200){
                               this.$bus.$emit('toast','修改成功')
                               this.$router.push('/zhanghu')
                           }else{
                               this.$bus.$emit('toast',res.data.data)
                           }
                       })
            },
             xiugai(){
            if(this.account==''){
                    this.$bus.$emit('toast','手机号不能为空')
            }else if(this.param==''){
                this.$bus.$emit('toast','验证码不能为空！')
            }else if(this.oldcode==''){
                    this.$bus.$emit('toast','请输入旧密码')
            }else{
               if(this.newcode==""){
                   this.$bus.$emit('toast','请输入新密码')
               }else{
                   if(this.newcode1==""){
                    this.$bus.$emit('toast','请输入确认密码')   
                   }else if(this.newcode1!=this.newcode){
                       this.$bus.$emit('toast','两次密码输入不一致') 
                   }else{
                       this.xiugai1();
                   }
               }     
            }
        }
        }
    }
</script>
<style scoped>
.she_span1{
        display:inline-block;
        width:120px;
        font-size:30px;
    }
  .she_span4{
          float:right;
          color:#FF8500;
          font-size:30px;
          background:none;
          margin-right:30px;
          margin-top:40px;
    }
.she_span3{
        display:inline-block;
        width:2px;
        height:40px;
        background:#DDDDDD;
        vertical-align: middle;
        margin-left:70px;
  }
 .she_input1{
        margin-left:30px;
        width:200px;
        height:90px;
        line-height: 50px;
        background:none;
    }
 .she_p3{
        width:92%;
        height:120px;
        line-height:120px;
        border-top:1px solid #DDDDDD;
        margin:0 4%;
    }
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
        font-size:30px;
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
        font-size:30px;
    }
    .xiugai_div3{
       background:#fff;
       margin-top:20px;
    }
    .xiugai_p4{
        width:92%;
        height:110px;
        line-height:110px;
        background:#fff;
        border-top:1px solid #DDDDDD;
        margin:0 4%;
        font-size:30px;
    }
    .xiugai_p44{
        width:92%;
        height:110px;
        line-height:110px;
        background:#fff;
        margin:0 4%;
        font-size:30px;
    }
    .xiugai_span1{
        display:inline-block;
        width:150px;
    }
    ::-webkit-input-placeholder{
        font-size:30px;
    }
    .xiugai_input1{
        background:none;
        outline:none;
        width:350px;
        height:120px;
        line-height:50px;
    }
</style>

