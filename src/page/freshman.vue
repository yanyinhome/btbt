<template>
    <div id="freshman">
        <com-head>新手入门</com-head>
        <div class="freshman_div1"></div>
        <div class="freshman_div3">
          <div class="freshman_div2" v-for="(item,index) in list" :key="index" @click="tiao(item.news_id)">
              <p class="freshman_p1">{{item.news_title}}</p>
              <p class="freshman_p2">{{item.create_time}}</p>
              <p class="jiang_p3"><img :src="'http://'+item.img" class="jiang_img1" alt=""></p>
          </div>
        </div>
    </div>
</template>
<script>
    export default{
        data(){
            return{
                list:[]
               /* list:[
                    {
                        title:'如何购买虚拟币？',
                        content:'2018-09-25 09:32:55'
                    },
                      {
                        title:'如何购买虚拟币？',
                        content:'2018-09-25 09:32:55'
                    },
                      {
                        title:'如何购买虚拟币？',
                        content:'2018-09-25 09:32:55'
                    }
                ]*/
            }
        },
        created(){
            this.axios.post('index.php/index/apiindex/novice',{
                flag:1,
               // token:sessionStorage.getItem('token')
            }).then((res)=>{
                console.log(res);
                this.list=res.data.data
            })
        },
    methods:{
        tiao(id){
            this.$router.push({path:'/insidePage',query:{new_id:id}})
        }
    }
    }
</script>
<style scoped>
    .freshman_div1{
        width:100%;
        height:100px;
    }
     .freshman_div3{
       width:100%;
       background:#fff;
       margin-top:-8px;
   }
    .freshman_div2{
        clear: both;
        width:100%;
        height:160px;
        background:#fff;
        border-bottom:1px solid #eee;
    }
   .freshman_p1{
       width:550px;
       padding-top:20px;
       font-weight:bold;
       margin-left:30px;
   }
    .freshman_p2{
         float:left;
        color:#999999;
        font-size:23px;
        margin-left:30px;
   }
   .jiang_p3{
        float:right;
        margin-top:-40px;
    }
    .jiang_img1{
        width:150px;
        height:100px;
        border-radius:6px;
        margin-right:30px;
    }
</style>

