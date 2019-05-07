<template>
    <div id="wo">
        <com-head>我</com-head>
        <div class="wo_div1"></div>
        <div class="wo_div2">
            <div class="wo_div3">
                <p class="wo_p1">头像</p>
               <p class="shang"><!--<input  class="imginp"  disabled="false" name="headimgurl" id="imgLocal" type='file' accept="image/*" @change="shangchuan"/>--></p>  
                <div class="wo_div4">
                    <p class="wo_p2"><img :src="'http://'+headimg" class="xiu_img" alt=""></p>
                    <p class="wo_p3"><img src="../assets/image/zhang10.png" alt=""></p>
                </div>
            </div>
        </div>
        <div class="wo_div5" v-for="(item,index) in list" :key="index" @click="tiao(item.url,item.isup)">
            <div class="wo_div6" >
                <p class="wo_p1">{{item.left}}</p>
                <div class="wo_div4">
                    <p class="wo_p4">{{item.title}}</p>
                    <p class="wo_p3"><img src="../assets/image/zhang10.png" alt=""></p>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default{
        data(){
            return{
                list:[],
                headimg:'',
                ming:''
            }
        },
        methods:{
            tiao(index,isup){
                console.log(isup)
                if(isup){
                  this.$router.push({path:index})
                }else{
                    this.$bus.$emit('toast','手机号暂不可更改!如有需要请联系客服')
                }
            },
             shangchuan(e) {
      var self = this;
      let file = e.target.files[0]; // 上传照片
      /* eslint-disable no-undef */
      let headimgurl = new FormData(); // 创建form对象
      headimgurl.append("headimgurl", file); // 通过append向form对象添加数据
      headimgurl.append('token',sessionStorage.getItem('token'))
    //  console.log(formData.get("img")); // FormData私有类对象，访问不到，可以通过get判断值是否传进去
      let config = {
        emulateJSON: true,
        withCredentials: true,
        headers: { "Content-Type": "multipart/form-data" }
      };
      this.$axios.post("http://btox.sosocnc.com/index.php/index/apireal/editheadimg",
          headimgurl,
          config
        )
        .then(( data )=>{
            console.log(data)
        })
        .catch(function(error) {
          console.log(error);
        });
        this.$router.go(0);
    },
        },
        created(){
            this.axios.post('index.php/index/apiuser/index',{
                token:window.sessionStorage.getItem('token')
            }).then((res)=>{
                console.log(res);
                this.list=res.data.data
                this.headimg=res.data.headimg
            })
        }
    }
</script>
<style scoped>
.shang{
    float:left;

}
.imginp{
    float:left;
    width:420px;
    height:150px;
    opacity:0;
    margin-left:50px;
}
    .wo_div1{
        width:100%;
        height:110px;
    }
    .wo_div2{
        width:100%;
        height:150px;
        line-height:150px;
        background:#fff;
    }
    .wo_div5{
        width:100%;
        height:120px;
        line-height:120px;
        background:#fff;
    }
    .wo_div3{
        width:92%;
        height:150px;
        margin:0px 4%;
    }
    .wo_div6{
        width:92%;
        height:120px;
        margin:0px 4%;
        border-top:1px solid #DDDDDD;
    }
    .wo_p4{
        float:left;
        color:#555555;
        font-size:25px;
    }
    .wo_p2{
        float:left;
        width:100px;
        height:100px;
        border-radius:50%;
        background:#D8D8D8;
        margin-top:20px;
    }
    .xiu_img{
       width:100px;
        height:100px;
        border-radius:50%;  
    }
    .wo_p3{
        float:right;
        margin-left:20px;
    }
    .wo_div4{
        float:right;
    }
    .wo_p1{
        float:left;
        font-size:25px;
        color:#333333;
    }
</style>

