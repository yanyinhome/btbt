<template>
    <div id="you">
        <com-head>修改邮箱</com-head>
        <div class="you_div1"></div>
        <div class="you_div2">
               <!--<p class="you">* 修改邮箱前请先验证原邮箱</p> -->
            <p class="you_p1">
               <input type="text" v-model="account" class="you_input1" placeholder="请输入邮箱账号">
            </p>
            <p class="you_p1">
                <span class="you_span1">
                    <input type="text"  v-model="param" placeholder="验证码" class="you_input2" >
                </span>
                <button class="you_span2" :disabled="isSend" @click="indexs">
                    {{btnText}}
                </button>
            </p>
        </div>
        <p class="you_p2" :class="[account!=''&&param!=''?'active':'on']" @click="tiao">确定</p>
    </div>
</template>
<script>
    export default{
         data(){
            return{
                btnText:'获取验证码',
                isSend:false,
                sendTime:0,
                account:'',
                param:'',
                id:this.$route.query.id,
                update:'12'
            }
        },
         methods:{
              indexs(){
                  if(this.account==''){
                      this.$bus.$emit('toast','邮箱不能为空')
                  }else{
                      this.axios.post('/index.php/index/apireg/getcode',{
                          flag:2,
                          type:2,
                          update:this.update,
                          account:this.account,
                      }).then((res)=>{
                          console.log(res);
                          if(res.data.code==200){
                              this.isSend=true;
                  this.sendTime=60;
                  this.btnText=`已发送${this.sendTime}S`
                  this.timer();
                          }else{
                              this.$bus.$emit('toast',res.data.data)
                          }
                      })
                  
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
            tiao(){
                if(this.account==""){
                    this.$bus.$emit('toast','邮箱不能为空')
                }else{
                    if(this.param==''){
                        this.$bus.$emit('toast','请输入验证码')
                    }else{
                       this.axios.post('index.php/index/apiuser/edituser',{
                            id:this.id,
                            account:this.account,
                            param:this.param,
                            token:sessionStorage.getItem('token'),
                       }).then((res)=>{
                           console.log(res);
                           if(res.data.code==200){
                               this.$router.push('/zhanghu')
                               this.$bus.$emit('toast','修改成功')
                           }else{
                               this.$bus.$emit('toast',res.data.data)
                           }
                       }) 
                    }
                }
            }   
        }
    }
</script>
<style scoped>
.on{
     background:#CFD0D4;
}
.active{
    background:#FF8500;
}
.you{
        color:#666666;
        margin:30px;
        margin-left:30px;
        margin-top:20px;
        font-size:25px;

    }
#you{
    background:#fff;
}
    .you_div1{
        width:100%;
        height:105px; 
        border-bottom:1px solid #dddddd;  
    }
    .you_div2{

    }
    .you_p1{
        width:92%;
        height:100px;
        line-height:100px;
        margin:0 4%;
        border-bottom:1px solid #dddddd;
        font-size:28px;
        color:#999999;
    }
    .you_span2{
        float:right;
        margin-right:30px;
        color:#448DFF;
        background: none;
        margin-top:25px;
    }
    .you_input1{
        width:510px;
        height:90px;
        line-height:50px;
    }
    .you_input2{
        height:90px;
        line-height:50px;
    }
    ::-webkit-input-placeholder{
        font-size:25px;
    }
    .you_p2{
        width:92%;
        height:80px;
        line-height:80px;
        text-align:center;
        color:#fff;
        font-size:25px;
        border-radius:50px;
        margin-top:40px;
        margin:60px 4%;
    }
</style>

