<template>
    <div id="copy">
        <com-head>平台公告</com-head>
        <div class="copy_div1"></div>
        <div class="copy_div2">
            <p class="copy_p1"><img  class="aa_img" src="../assets/image/login22.png" alt=""></p>
            <div class="copy_div3">
               <p class="copy_p2">BTOX.org 公告</p>
            </div>
            <div class="copy_div4" v-for="(item,index) in list" :key="index" @click="sheng(item.news_id)">
                <p class="copy_p3">{{item.news_title}}</p>
                <p class="copy_p4" v-html="item.news_content"></p>
                <p class="copy_p5">{{item.create_time}}</p>
            </div>
        </div>
    </div>
</template>
<script>
    export default{
        data(){
            return{
                list:[]
            }
        },
        methods:{
              sheng(id){
                  this.$router.push({path:'/sheng',query:{news_id:id}})
        }
        },
        created(){
            this.axios.post('index.php/index/apiuser/gonggao',{
                token:sessionStorage.getItem('token'),
            }).then((res)=>{
                //console.log(res);
                this.list=res.data.data
            })
        }
    }
</script>
<style scoped>
#copy{
   background:#fff;
}
.aa_img{
    transform: scale(0.6);
    margin-left:-70px;
    margin-top:10px;
}
    .copy_div1{
  width:100%;
  background:#fff;
  margin-top:100px;
  border-bottom:1px solid #dddddd;
    }
    .copy_p1{
        width:60%;
        height:100px;
    }
    .copy_div3{
        width:100%;
        height:100px;
        line-height:100px;
        margin-top:10px;
        border-bottom:1px solid #DDDDDD;
        border-top:1px solid #DDDDDD;
    }
    .copy_p2{
        font-size:40px;
        font-weight:bold;
        margin-left:30px;
    }
    .copy_div4{
        width:100%;
        border-bottom:1px solid #DDDDDD;
        margin-top:60px;
    }
    .copy_p3{
        margin-left:30px;
        font-weight:bold;
    }
    .copy_p4{
        color:#666666;
        font-size:25px;
        margin-left:30px;
    }
    .copy_p5{
        font-size:20px;
        margin-left:30px;
        color:#999999;
        margin-bottom:25px;
    }
</style>

