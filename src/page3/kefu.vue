<template>
    <div id="kefu">
        <com-head>客服中心</com-head>
        <div class="kefu_div1"></div>
        <div class="kefu_div2">
            <p class="kefu_p1">非常感谢您对本平台的信任，有任何问题都可以通过“客服中心”发送，我们将尽快解决并回复您。</p>
            <p class="kefu_p2"><input type="text" v-model="service_title" class="kefu_input1" placeholder="请输入标题"></p>
            <p class="kefu_p3">
                <textarea class="textarea" v-model="service_content" placeholder="请输入您想要反馈的信息内容" name="" id="" cols="30" rows="10"></textarea>
            </p>
         <!--<img v-if="headimg!=''" :src="'http://'+headimg"  class="head_img" alt="">-->
          <img   v-if="list!=''" v-for="(item,index) in list" :key="index"  class="head_img" :src="'http://'+item" alt="">
            <div class="kefu_div3">
                <!--<p class="kefu_p4">
                    <img class="kefu_img1" src="../assets/image/shi4.png" alt="">
                </p>-->
                 <p class="shang"  @click="sss"><input :disabled="isSend"  class="imginp"  name="imgurl" id="imgLocal" type='file' accept="image/*" @change="shangchuan"/></p>    
                <p class="kefu_p5">添加图片</p>
            </div>
        </div>
        <p class="kefu_p6" @click="fan">确定提交</p>
    </div>
</template>
<script>
         export default{
      name: 'upload',                       // 这里是我的component的name
    data () {
      return {
          list:[],
          service_title:"", 
          service_content:"",                          
          src: '/static/image/avatar.png',  //先设置一个默认图片
          headimg:'',
          imgid:[],
          imgid1:"",
          isSend:false
      }
    },
    created(){
        
    },
methods: {
    sss(){
        if(this.list.length>=2){
                    this.isSend=true
                    this.$bus.$emit('toast','一次最多上传二张')
            }
    },
    fan(){
        if(this.service_title==''){
            this.$bus.$emit('toast','请输入标题')
        }else{
            if(this.service_content==''){
            this.$bus.$emit('toast','请输入反馈内容')   
            }else{
                this.axios.post('index.php/index/apiservice/fankui',{
                   token:sessionStorage.getItem('token'),
                   service_title:this.service_title, 
                   service_content:this.service_content, 
                   image:this.imgid   
                }).then((res)=>{
                    console.log(res);
                    if(res.data.code==200){
                        this.$bus.$emit('toast',res.data.data)
                        this.$router.push('/zhanghu')
                    }else{
                        this.$bus.$emit('toast',res.data.data)
                    }
                })
            }
        }
    },
       shangchuan(e) {
      var self = this;
      let file = e.target.files[0]; //上传照片
      /* eslint-disable no-undef */
      let headimgurl = new FormData(); // 创建form对象
      headimgurl.append("imgurl", file); // 通过append向form对象添加数据
    //console.log(formData.get("img")); // FormData私有类对象，访问不到，可以通过get判断值是否传进去
      let config = {
        emulateJSON: true,
        withCredentials: false,
        headers: { "Content-Type": "multipart/form-data" }
      };
      this.$axios.post("http://btox.sosocnc.com/index.php/index/apiservice/doupload",
          headimgurl,
          config
        ).then(( res )=>{
            if(res.data.code==200){
            // console.log(res.data.imgid)
            if(res.data.imgid!==undefined&&this.imgid.length<3){
                this.imgid.push(res.data.imgid)
               // this.imgid.$remove(item)
            }
           console.log(this.imgid)
            this.headimg=res.data.img
            this.list.push(res.data.img)
            }else if(res.data.code==201){
                this.$bus.$emit('toast',res.data.data)
            }
        })
        .catch(function(error) {
          console.log(error);
        });
       // this.$router.go(0);
    }
},
    }
</script>
<style scoped>
#kefu{
    position: relative;
}
.shang{
    width:150px;
    height:100px;
}
.imginp{
    width:150px;
    height:100px;
    opacity:0;
}
.head_p1{
   
}
.head_img{
    width:200px;
    height:200px;
    margin-left:30px;
    border:1px solid #dddddd;
}
#kefu{
    background:#fff;
}
    .kefu_div1{
        width:100%;
        height:110px;
        border-bottom:1px solid   #DDDDDD;
    }
    .kefu_div2{
        background:#fff;
    }
    .kefu_p1{
        width:89%;
        margin:20px 5.5%;
        font-size:25px;
    }
    .kefu_p2{
       
    }
    .kefu_input1{
        width:92%;
        margin:0 4%;
        height:80px;
        line-height:50px;
        border:1px solid #DDDDDD;
        background:#F6F6F6;
    }
    ::-webkit-input-placeholder{
        padding-left:30px;
        font-size:30px;
    }
    .textarea{
        width:92%;
        height:370px;
        line-height:50px;
        margin:0px 4%;
        border:1px solid #DDDDDD;
        margin-top:30px;
        padding-top:30px;
        background:#F6F6F6;
        font-size:30px;
    }
    .kefu_div3{
        display:inline-block;
        margin-left:30px;
        border:1px solid #DDDDDD;
        margin-top:10px;
        width:150px;
        text-align:center;
        height:150px;
       background: url('../assets/image/shi4.png') no-repeat 25px 10px; 
    }
    .kefu_img1{
        width:50%;
        text-align:center;
        margin-left:35px;
        margin-top:20px;
    }
    .kefu_p5{
        font-size:20px;
        color:#999999;
        text-align:center;
    }
    .kefu_p6{
        width:92%;
        height:80px;
        line-height:80px;
        text-align:center;
        margin:0 4%;
        margin-top:32%;
        margin-bottom:55px;
        font-size:25px;
        border-radius:40px;
        color:#fff;
        background:#FF8500;
    }
</style>

