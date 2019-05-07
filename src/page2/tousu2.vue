<template>
    <div id="tousu2">
        <com-head>投诉</com-head>
        <div class="tousu2_div1"></div>
          <p class="add">提示： 未收到款，请上传收款信息支付宝及银行流水号截图。</p>
           <div class="xiang_div5">
               <p class="tousu2_p1">订单信息</p>
            <div class="xiang_div6">
                <p class="xiang_p6">卖出数量：</p>
                <p class="xiang_p7">{{arr1.num}}</p>
            </div>
          <div class="xiang_div6">
               <p class="xiang_p6">打款方：</p>
                <p class="xiang_p7">{{arr1.dakuan}}</p>
            </div>
              <div class="xiang_div6">
               <p class="xiang_p6">打款方手机号：</p>
                <p class="xiang_p7">{{arr1.username}}</p>
            </div>
            <div class="xiang_div6">
                 <p class="xiang_p6">订单号：</p>
               <p class="xiang_p7">{{arr1.order_number}}</p>
            </div>
              <div class="xiang_div6">
                  <p class="xiang_p6">交易时间：</p>
                  <p class="xiang_p7">{{arr1.create_time}}</p>
            </div>
        </div>
        <div class="tousu2_div2">
            <p class="tousu2_p2"><input type="text" class="tousu2_input1" v-model="service_title" placeholder="请输入标题"></p>
          <p class="textarea"><textarea name="" id="" cols="30" rows="10" v-model="service_content" placeholder="请输入您投诉的内容"></textarea></p>  
            <img   v-if="list!=''" v-for="(item,index) in list" :key="index"  class="head_img" :src="'http://'+item" alt="">
            <div class="tousu2_div3">
                <p class="shang"  @click="sss"><input :disabled="isSend"  class="imginp"  name="imgurl" id="imgLocal" type='file' accept="image/*" @change="shangchuan"/></p>    
                <p class="tousu2_p3"><img src="../assets/image/add3.png" class="add_img" alt=""></p>
                <p class="tousu2_p4">上传截图</p>
            </div>
        </div>
         <p class="tousu2_p5" :class="[service_title!=''&&service_content!=''?'active':'on']" @click="fan">提交投诉</p>
    </div>
</template>
<script>
    export default{
      name: 'upload',                       // 这里是我的component的name
    data () {
      return {
          list:[],
          arr1:[],
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
        this.axios.post('index.php/index/apifinance/tousu',{
            token:sessionStorage.getItem('token'),
            order_id:this.$route.query.order_id
        }).then((res)=>{
            console.log(res)
            this.arr1=res.data.data
        })
    },
methods: {
    sss(){
        if(this.list.length>1){
                    this.isSend=true
                    this.$bus.$emit('toast','一次最多上传三张')
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
                   image:this.imgid,
                   order_id:this.$route.query.order_id  
                }).then((res)=>{
                    console.log(res);
                    if(res.data.code==200){
                        this.$router.push('/caiwu')
                        this.$bus.$emit('toast','反馈成功')
                    }else{
                        this.$bus.emit('toast',res.data.data)
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
   // console.log(formData.get("img")); // FormData私有类对象，访问不到，可以通过get判断值是否传进去
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
            }else{
                this.$bus.$emit('toast',res.data.data)
            }
            
            console.log(this.imgid)
            this.headimg=res.data.img
            this.list.push(res.data.img)
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
.add{
    width:92%;
    margin:0px 4%;
    color:red;
    font-size:25px;
    margin-bottom:25px;
}
.shang{
    position: absolute;
    width:150px;
    height:100px;
}
.head_img{
    width:200px;
    height:200px;
    margin-left:30px;
    border:1px solid #dddddd;
}
.imginp{
    width:150px;
    height:100px;
    opacity:0;
}

.tousu2_div1{
    width:100%;
    height:110px;
}
.xiang_div5{
    width:92%;
    height:440px;
    background:#fff;
    margin:0px 4%;
    border-radius:10px;
}
.xiang_div6{
    display: inline-block;
    width:100%;
    margin-left:30px;
    color:#666666;
    font-size:25px;
}
.xiang_div7{
    float:left;
    font-size:25px;
}
.xiang_p6{
display:inline-block;
margin-top:15px; 
}
.xiang_p7{
display:inline-block;
margin-top:15px;
color:#000000;
}
.tousu2_p1{
    width:92%;
    margin:0px 4%; 
    height:80px;
    line-height:80px;
    border-bottom:2px solid #eee;  
    font-size:25px;
}
.tousu2_input1{
    width:500px;
    height:80px;
    line-height:50px;
    margin-left:30px;
}
.tousu2_p2{
    width:92%;
    margin:20px 4%;
    height:80px;
    background:#fff;
}
.textarea{
    width:92%;
    margin:0px 4%;
    height:400px;
    background:#fff;
}
textarea{
    width:90%;
    height:370px;
    margin-top:30px;
    margin-left:30px;
    resize:none; 
}
.tousu2_div3{
    width:150px;
    height:150px;
    border:1px dashed #999999;
    border-radius:12px;
    font-size:20px;
    margin-left:30px;
    margin-top:20px;
    color:#999999;
    text-align:center;
}
.tousu2_p3{
    margin-top:10px;
    margin-left:28px;
    width:100px;
}
.tousu2_p4{
    margin-top:-35px;
}
.add_img{
    width:100%;
}
.on{
    background:#CFD0D4;
}
.active{
    background:#FF8500;
}
.tousu2_p5{
    width:92%;
    height:90px;
    line-height:90px;
    margin:0 4%;
    color:#fff;
    border-radius:40px;
    text-align:center;
    font-size:25px;
    margin-top:70px;
    margin-bottom:50px;
}
</style>

