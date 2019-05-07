<template>
    <div id="sheng">
        <div class="sheng_div1">
          <p class="iconfont icon-return" @click="clickBack"></p>
         </div>
         <div class="sheng_div2" >
             <p class="sheng_p1">{{list.news_title}}</p>
             <p class="sheng_p2">{{list.create_time}}</p>
         </div>
         <div class="sheng_div3" v-html="list.news_content">
            
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
            clickBack(){
                this.$router.go(-1)
            },
        },
        created(){
            this.axios.post('index.php/index/apiuser/gonggaoinfo',{
                token:sessionStorage.getItem('token'),
                news_id:this.$route.query.news_id
            }).then((res)=>{
                console.log(res)
                this.list=res.data.data
            })
        }
    }
</script>
<style scoped>
#sheng{
    background:#fff;
}
    .sheng_div1{
        width:100%;
        height:80px;
        line-height:80px;
        border-bottom:1px solid #DDDDDD;
    }
    .iconfont{
        margin-left:30px;
        margin-top:30px;
    }
    .sheng_div2{
        width:92%;
        height:150px;
        margin:0px 4%;
        border-bottom:1px solid #DDDDDD;
        font-size:25px;
        text-align:center;
    }
    .sheng_p1{
        padding-top:25px;
        font-size:32px;
        font-weight:bold;
    }
    .sheng_p2{
        color:#999999;
        font-size:20px;
    }
    .sheng_div3{
        width:92%;
        margin:30px 4%;
        font-size:27px;
    }
</style>

