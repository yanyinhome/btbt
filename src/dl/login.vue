<template>
    <div id="login">
        <p  id="icon" ><img src="../assets/image/left.png" class="icon_img1" @click="clickBack" alt=""></p>
        <div id="login_div">
        <div>
          <p class="login_p1"> <img src="../assets/image/xin4.png" alt="" class="login_img1"></p> 
          <!--<p class="login_p2"> <img src="../assets/image/login2.png" alt="" class="login_img2"></p>-->
        </div>
        <div>
            <p class="login_p3">登录BTOX</p>
            <p class="login_p4">欢迎来到币涂网/可以使用BTOX国际账号进行登录</p>
        </div>
        <div class="login_div2">
            <p class="login_p5" @click="indexs" :class="[hide==true?'active':'#DDDDDD']" >手机号</p>
            <p class="login_p6" @click="indexs1" :class="[hide1==true?'active':'#DDDDDD']" >邮箱</p>
        </div>
        <div>
            <div v-if="hide">
              <div class="login_div3">
                  <input class="login_input1" type="text" v-model="phone" placeholder="手机号">
              </div>
              <div class="login_div3">
                  <input class="login_input1" v-if="dis1==false"  type="password" v-model="password" placeholder="密码">
                  <input class="login_input1" v-if="dis1==true" type="text" v-model="password" placeholder="密码"> 
                    <img :src="dis1==false?img:img1" alt="" @click="dianji1" class="yan">
              </div>
            <p class="login_p8" @click="login1">登 &nbsp;录</p>
            </div>
              <!--邮箱-->
        <div v-if="hide1">
             <div class="login_div3">
                <input class="login_input1" type="text" v-model="email " placeholder="邮箱">
            </div>
            <div class="login_div3">
                <input class="login_input1"  v-if="dis==false" type="password" v-model="password1 " placeholder="密码">
                <input class="login_input1"  v-if="dis==true" type="text" v-model="password1 " placeholder="密码">
                <img :src="dis==false?img:img1" alt="" @click="dianji" class="yan">
            </div>
            <p class="login_p8" @click="login">登 &nbsp;录</p>
        </div>
            <router-link to="/forget" class="login_a1">忘记密码？</router-link>
            <p class="login_p9">还没有币涂账号？&nbsp;<router-link to="/register" class="login_a2">注册</router-link> </p>
        </div>
        </div>
    </div>
</template>
<script>
    export default{
        data(){
            return{
                hide:true,
                hide1:false,
                email:this.email,
                password1:"",
                type:1,
                phone:'',
                dis:false,
                password:'',
                dis1:false,
                img:require('../assets/image/mima.png'),
                img1:require('../assets/image/mima2.png'),
               
            }
        },
        methods:{
            dianji(){
                this.dis=!this.dis
            },
             dianji1(){
                this.dis1=!this.dis1
            },
            clickBack(){
                this.$router.go(-1)
            },
            ind(){
                if(this.hide==true){
                    this.type=1
                }else{
                    this.type=2
                }
            },
            
             login1(){
                this.ind();
                //console.log(this.type)
                if(this.phone==""){
                    this.$bus.$emit('toast','电话不能为空')
                }else{
                    if(this.password==''){
                      this.$bus.$emit('toast','登录密码不能为空')  
                    }else{
                        this.axios.post('index.php/index/apireg/login',{
                            type:this.type ,
                            phone:this.phone,
                            password:this.password
                        }).then((res)=>{
                            console.log(res);
                            if(res.data.code==200){
                                this.$bus.$emit('toast','登陆成功')
                                this.$router.push({path:'/index',query:{hide:true}})
                                 sessionStorage.setItem('select',0)
                                sessionStorage.setItem('token',res.data.token)
                            }else{
                                this.$bus.$emit('toast',res.data.data)
                            }
                        })
                    }
                }
            },
            login(){
                this.ind();
                //console.log(this.type)
                if(this.email==""){
                    this.$bus.$emit('toast','邮箱地址不能为空')
                }else{
                    if(this.password1==''){
                      this.$bus.$emit('toast','邮箱密码不能为空')  
                    }else{
                        this.axios.post('index.php/index/apireg/login',{
                            type:this.type ,
                            email:this.email,
                            password1:this.password1
                        }).then((res)=>{
                            console.log(res);
                            if(res.data.code==200){
                                this.$bus.$emit('toast','登陆成功')
                                this.$router.push({path:'/index',query:{hide:true}})
                                sessionStorage.setItem('select',0)
                                sessionStorage.setItem('token',res.data.token)
                                  console.log(res.data.token)
                            }else{
                                this.$bus.$emit('toast',res.data.data)
                            }
                        })
                    }
                }
            },
            indexs(){
                 this.hide=true
                 this.hide1=false   
            },
             indexs1(){
                 this.hide=false
                 this.hide1=true
            }
        }
    }
</script>
<style scoped>
.yan{
    float:right;
    transform: scale(0.4);
    margin-top:60px;
}
.icon_img1{
   width:3%;
   margin-left:30px;
   margin-top:30px;
}
 .login_p1{
        text-align:left;
        margin:40px 0px;
        margin-left:30px;
        width:400px;
    }
.icon{
}
.login_img1{
    width:100%;
}
.active{
    color:#fff;
    border-bottom:3px solid #fff;
}
    #login{
        background: #448DFF;
        position: relative
    }
    #login_div{
        width:92%;
        margin:0px 4%;
    }
    .login_div1{
        width:100%;
        height:100px;
    }
   .login_p2{
        display:inline-block;
        margin-top:49px;
        margin-left:30px;
    }
    .login_p3{
        font-size:30px;
        margin-left:30px;
        color:#fff;
    }
    .login_p4{
        color:#9DC3FF;
        margin-left:30px;
        font-size:25px;
    }
    .login_div2{
        color:#DDDDDD;
        margin:40px 80px;
        margin-bottom:0px;
    }
    .login_p5{
       display:inline-block;  
       width:110px;
       text-align:center; 
    }
    .login_p6{
      display:inline-block; 
      width:110px;
      text-align:center; 
    }
    .login_div3{
      width:92%;
      height:120px;
      line-height:160px;
      margin:0px 4%;  
      border-bottom:1px solid #ABCCFF;
    }
    .login_p7{
        display:inline-block;
        width:150px;
        color:#fff;
        margin-left:25px;
    }
    .login_input1{
        background:none;
        outline:none;
        border:none;
        width:400px;
        height:120px;
        padding-left:30px;
        line-height:50px;
        color:#fff;
    }
    ::-webkit-input-placeholder{
        color:#9DC3FF;
        font-size:30px;
    }
    .login_p8{
        width:92%;
        margin:0 4%;
        height:70px;
        line-height:70px;
        background:#fff;
        border-radius:70px;
        margin-top:70px;
        text-align:center;
        font-size:25px;
        color: #333;
        font-weight:bold;
    }
    .login_a1{
        display:inline-block;
        color:#DDDDDD;
        font-size:25px;
        margin-left:30px;
        margin-top:30px;
    }
    .login_p9{
      color:#F8F8F8;
      font-size:27px;
      margin-top:340px;
      margin-left:40px;
    }
   .login_a2{
      color:#F8F8F8;
   }
</style>

