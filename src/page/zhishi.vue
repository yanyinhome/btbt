<template>
    <div id="zhishi">
         <div class="zhishi_div1">
          <p class="iconfont icon-return" @click="clickBack"></p>
        </div>
        <div class="zhishi_div2" >
            <p class="zhifu_p1">{{list.news_title}}</p>
            <p class="zhifu_p2">{{list.create_time}}</p>
            <p class="zhifu_p3" v-html="list.news_content"></p>
        </div>
    </div>
</template>
<script>
        /*$(document).ready(function (e) {
            $(".zhifu_p3 img").css({ "height": "auto", "width": "auto" });
        })*/
    export default{
            data(){
                return{
                    list:[]
                    /*list:[
                        {
                            title:'虚拟币是什么？',
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
                news_id:this.$route.query.news_id,
            }).then((res)=>{
                console.log(res)
                this.list=res.data.data
            })
        },
           
    }
</script>
<style scoped>
.zhifu_p3 img{
    max-width:100%;
}
.zhifu_p3{
    width:92%;
    margin:0px 4%;
}
#zhishi{
    background:#fff;
}
     .zhishi_div1{
        width:100%;
        height:80px;
        line-height:80px;
        background:#fff;
        border-bottom:1px solid #eee;
    }
    .iconfont{
        margin-left:30px;
    }
    .zhishi_div2{
        width:92%;
        margin:0px 4%;
    }
    .zhifu_p1{
        margin-top:20px;
        font-weight:bold;
        font-size:35px;
    }
    .zhifu_p2{
        margin-bottom:20px;
        color:#999999;
        font-size:27px;
    }
    .zhishi_div3{
         width:92%;
         height:400px;
         margin:50px 4%;
    }
    .zhishi_img1{
       max-width:100%;
       height:100%;
    }
    
</style>

