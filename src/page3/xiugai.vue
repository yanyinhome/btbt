<template>
    <div id="xiugai">
        <div class="xiugai_div1">
            <div class="xiugai_div2">
               <p class="iconfont icon-return xiugai_p1" @click="clickBack"></p>
              <p class="xiugai_p2">修改登录密码</p>
            </div>
        </div>
        <div class="xiugai_div3">
             <p class="xiugai_p44">
                 <span class="xiugai_span1">原密码</span>
                 <input type="text" v-model="oldpwd"  v-if="payType" class="xiugai_input1" v placeholder="请输入原登录密码">
                 <input type="password" v-model="oldpwd" v-else class="xiugai_input1" v placeholder="请输入原登录密码">
                <img :src="payType?img1:img" @click="handClick" class="yan_img1" alt="">
             </p>
            <p class="xiugai_p4">
                <span class="xiugai_span1">新密码</span>
                <input type="text" v-model="newpwd" v-if="payType1" class="xiugai_input1" placeholder="请输入新登录密码">
                <input type="password" v-model="newpwd" v-else class="xiugai_input1" placeholder="请输入新登录密码">
                <img :src="payType1?img1:img" @click="handClick1" class="yan_img1" alt="">
            </p>
            <p class="xiugai_p4">
                <span class="xiugai_span1" >确认密码</span>
                <input type="text" v-model="newpwd1" v-if="payType2" class="xiugai_input1" placeholder="请确认新的登录密码">
                <input type="password" v-model="newpwd1"   v-else class="xiugai_input1" placeholder="请确认新的登录密码">
                <img :src="payType2?img1:img" @click="handClick2" class="yan_img1" alt="">
            </p>
        </div>
        <p class="xiugai_p3" @click="xiugai">保存</p>
    </div>
</template>
<script>
    export default{
        data(){
            return{
                newpwd:'',
                newpwd1:'',
                 img:require('../assets/image/yan32.png'),
                img1:require('../assets/image/yan33.png'),
                oldpwd:'',
                payType:false,
                payType1:false,
                payType2:false,
            }
        },
        methods:{
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
        xiugai(){
            if(this.oldpwd==''){
                    this.$bus.$emit('toast','请输入旧密码')
            }else{
               if(this.newpwd==""){
                   this.$bus.$emit('toast','请输入新密码')
               }else{
                   if(this.newpwd1==""){
                    this.$bus.$emit('toast','请输入确认密码')   
                   }else if(this.newpwd1!=this.newpwd){
                       this.$bus.$emit('toast','两次密码输入不一致') 
                   }else{
                       this.axios.post('index.php/index/apiuser/editpwd',{
                           token:sessionStorage.getItem('token'),
                           newpwd:this.newpwd,
                           newpwd1:this.newpwd1,
                           oldpwd:this.oldpwd
                       }).then((res)=>{
                           console.log(res);
                           if(res.data.code==200){
                               this.$bus.$emit('toast','修改成功')
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
    .xiugai_p4,.xiugai_p44{
        width:92%;
        height:110px;
        line-height:110px;
        background:#fff;
        border-top:1px solid #DDDDDD;
        margin:0 4%;
        font-size:30px;
    }
    .xiugai_p44{
        border-top:transparent;
    }
    .xiugai_span1{
        display:inline-block;
        width:150px;
    }
    ::-webkit-input-placeholder{
        font-size:30px;
    }
    .xiugai_input1{
        width:300px;
        color:#000;
        height:100px;
        line-height:50px;
    }
</style>

