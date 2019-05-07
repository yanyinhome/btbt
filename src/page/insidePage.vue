<template>
    <div id="insidePage">
        <div class="insidePage_div1">
          <p class="iconfont icon-return" @click="clickBack"></p>
        </div>
        <div class="insidePage_div2" >
            <p class="insidePage_p1">{{list.news_title}}</p>
            <p class="insidePage_p2">{{list.create_time}}</p>
            <p class="insidePage_p3" v-html="list.news_content"></p>
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
                        title:'如何购买虚拟币？',
                        time:'2018-09-25 09:32:55',
                        content:'正文内容正文内容正文内容正文内容正文内容正文内容正文内容正文内容正文内容正文内容正文内容正文内容'
                    }
                ]*/
            }
        },
        methods:{
            clickBack(){
                this.$router.go(-1)
            }
        },
        created(){
            this.axios.post('index.php/index/apiindex/noviceinfo',{
                news_id:this.$route.query.new_id,
            }).then((res)=>{
                console.log(res)
                this.list=res.data.data
            })
        },
    }
</script>
<style scoped>
#insidePage{
    background:#fff;
}
    .insidePage_div1{
        width:100%;
        height:80px;
        line-height:80px;
        background:#fff;
        border-bottom:1px solid #eee;
    }
    .iconfont{
        margin-left:30px;
    }
    .insidePage_div2{
        text-align:center;
    }
    .insidePage_p1{
        font-weight:bold;
        margin-top:10px;
        margin-bottom:20px;
    }
     .insidePage_p2{
        color:#999999;
        font-size:25px;
    }
     .insidePage_p3{
        width:92%;
        margin:0px 4%;
        margin-top:30px;
        text-align: left;
    }
</style>

