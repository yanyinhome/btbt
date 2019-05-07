<template>
    <div id="nei">
        <div class="nei_div1">
          <p class="iconfont icon-return" @click="clickBack"></p>
        </div>
        <div class="nei_p1">注：支付宝绑定必须与本人同一张银行卡姓名完全一致，如需更改请联系平台客服人员</div>
        <div class="nei_div2">
             <p class="nei_p3">
                <span class="nei_span1">真实姓名</span>
                <input type="text" class="nei_input1" v-model="bank_username" placeholder="请输入真实姓名">
            </p>
            <p class="nei_p2">
                <span class="nei_span1">支付宝账号</span>
                <input type="text" class="nei_input1" v-model="bank_num"  placeholder="请输入支付宝账号">
            </p>
        </div>
        <p class="add_p" @click="zhifu">确定添加</p>
    </div>
</template>
<script>
    export default{
        data(){
            return{
                bank_num:'',
                bank_username:""
            }
        },
         methods: {
             zhifu(){
                 var regExp=/^(?:\w+\.?)*\w+@(?:\w+\.)+\w+|\d{9,11}$/
                var str= /^[a-zA-Z0-9_]{0,}$/
               var ste=/^([\u4E00-\u9FA5]+|[a-zA-Z]+)$/
                 if(this.bank_num==''){
                     this.$bus.$emit('toast','支付宝账号不能为空')
                 }else if(!regExp.test(this.bank_num)&&!str.test(this.bank_num)){
                     this.$bus.$emit('toast','支付宝账号格式不正确！')
                 }else{
                     if(this.bank_username==''){
                         this.$bus.$emit('toast','真实姓名不能为空')
                     }else if(!ste.test(this.bank_username)){
                         this.$bus.$emit('toast','请输入真实姓名！')
                     }else{
                         this.axios.post('index.php/index/apiuser/editbank',{
                             flag:2,
                             token:sessionStorage.getItem('token'),
                             bank_num:this.bank_num,
                             bank_username:this.bank_username              
                         }).then((res)=>{
                             console.log(res);
                             if(res.data.code==200){
                                 this.$bus.$emit('toast','添加成功')
                                 this.$router.push('/zhanghu')
                             }else{
                                 this.$bus.$emit('toast',res.data.data)
                             }
                         })
                     }
                 }
             },
        clickBack () {
      this.$router.go(-1);
    }
  },
    }
</script>
<style scoped>
.add_p{
    width:92%;
    height:80px;
    line-height: 80px;
    text-align:center;
    color:#fff;
    background:#FF8500;
    font-size:25px;
    border-radius:40px;
    margin:0px 4%;
    margin-top:60px;
}
    .nei_div1{
        width:100%;
        height:100px;
        line-height:100px;
        background:#fff;
        border-bottom:1px solid #dddddd;
    }
    .iconfont{
        margin-left:30px;
    }
    .nei_p1{
        width:92%;
        color:red;
        height:80px;
        line-height:40px;
        font-size:20px;
        margin:20px 4%;
    }
    .nei_div2{
        width:100%;
        background:#fff;
        margin-top:0px;
    }
    .nei_p2,.nei_p3{
        width:92%;
        height:120px;
        line-height:120px;
        margin:0px 4%;
        border-top:1px solid #dddddd;
    }
   .nei_p3{
       border:none;
   }
    .nei_span1{
        display:inline-block;
        width:150px;
    }
    .nei_input1{
        float:right;
        width:460px;
        text-align:right;
        height:120px;
        background:none;
        color:#000;
    }
    ::-webkit-input-placeholder{
        text-align:right;
        color:#999999;
    }
</style>

