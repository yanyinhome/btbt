<template>
    <div id="jiang">
        <com-head>知识大讲堂</com-head>
        <div class="jiang_div1"></div>
        <div class="jiang_div2" v-for="(item,index) in list" :key="index" @click="tiao(item.news_id)">
            <p class="jiang_p1">{{item.news_title}}</p>
            <p class="jiang_p2">{{item.create_time}}</p>
            <p class="jiang_p3"><img :src="'http://'+item.img" class="jiang_img1" alt=""></p>
        </div>
    </div>
</template>
<script>
    export default{
        data(){
            return{
                list:[]
                 /*list:[
            {
                title:'虚拟币是什么？',
                time:'2018-09-25 09:32:55',
                img:require('../assets/image/zhishi1.png')
            },
            {
                title:'虚拟币是什么？',
                time:'2018-09-25 09:32:55',
                img:require('../assets/image/zhishi1.png')
            }
        ]*/
            }
        },
        methods:{
            tiao(id){
                this.$router.push({path:'/zhishi',query:{news_id:id}})
            }
        },
         created(){
            this.axios.post('index.php/index/apiindex/novice',{
                flag:2
            }).then((res)=>{
                console.log(res);
                this.list=res.data.data
            })
        },
    }
</script>
<style scoped>
    .jiang_div1{
        width:100%;
        height:100px;
    }
    .jiang_div2{
        clear: both;
        width:100%;
        height:160px;
        background:#fff;
        border-bottom:1px solid #eee;
    }
    .jiang_p1{
       width:550px;
       padding-top:20px;
       font-weight:bold;
       margin-left:30px;
    }
     .jiang_p2{
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

