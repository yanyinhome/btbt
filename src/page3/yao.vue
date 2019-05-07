<template>
    <div id="yao">
        <com-head>我的邀请</com-head>
        <div class="yao_div1"></div>
        <div class="yao_div2">
           <p class="yao_p1">我的邀请码</p>
           <p class="yao_p2" >{{yao}}</p>
           <p class="yao_p3" @click="copy" :data-clipboard-text="yao">复制</p>
        </div>
        <div class="yao_div3">
            <p class="yao_p4"><img class="yao_img1" src="../assets/image/yao1.png" alt=""></p>
            <p class="yao_p4">我的邀请</p>
            <p class="yao_p4"><img class="yao_img2" src="../assets/image/yao2.png" alt=""></p>
        </div>
        <div class="yao_div4">
            <div class="yao_div5">
                <p class="yao_p5">{{zong}}</p>
                <p class="yao_p6">邀请总人数</p>
            </div>
            <div class="yao_div5">
                <p class="yao_p5">{{ivtcount}}</p>
                <p class="yao_p6">推荐好友数</p>
            </div>
        </div>
        <div class="yao_div6">
            <p class="yao_p7">奖励规则</p>
            <p class="yao_p8" v-html="yq_gz"></p>
        </div>
         <div class="yao_div33">
            <p class="yao_p4"><img class="yao_img1" src="../assets/image/yao1.png" alt=""></p>
            <p class="yao_p4">邀请记录</p>
            <p class="yao_p4"><img class="yao_img2" src="../assets/image/yao2.png" alt=""></p>
        </div>
        <div class="yao_div7">
            <p class="yao_p9">* 被邀请人完成实名认证才能获得邀请奖励</p>
            <div class="yao_div8">
                <div class="yao_div9">
                    <p class="yao_p10">日期</p>
                    <p class="yao_p10">被邀请人账号</p>
                    <p class="yao_p10">是否完成认证</p>
                </div>
                <div class="yao_div10" v-for="(item,index) in ivtlog" :key="index">
                    <p class="yao_p11">{{item.create_time}}</p>
                    <p class="yao_p11">{{item.do_userid}}</p>
                    <p class="yao_p12" v-if="item.rank>0">
                        <img src="../assets/image/v.png" alt="" class="yao1_img">
                        <span class="yao1_span1" >
                           {{item.rank}}
                         </span>
                      </p>
                    <p class="yao_p13">{{item.status}}</p>
                </div>
                <div  v-if="ivtlog==''" class="zan">暂无记录~</div>
            </div>
        </div>
    </div>
</template>
<script>
import  Clipboard from 'clipboard'
    export default{
        data(){
            return{
                yao:'',
                zong:'',
                ivtcount  :'',
                ivtlog:[],
                yq_gz:""
                /*list:[
                    {
                        time:'2018-10-10',
                        phone:'135****2526',
                        vip:require('../assets/image/v.png'),
                        jie:'完成',
                        shu:1
                    }, {
                        time:'2018-10-10',
                        phone:'135****2526',
                        vip:require('../assets/image/v.png'),
                        jie:'完成',
                         shu:2
                    },
                     {
                        time:'2018-10-10',
                        phone:'135****2526',
                        vip:require('../assets/image/v.png'),
                        jie:'完成',
                         shu:3
                    },{
                        time:'2018-10-10',
                        phone:'135****2526',
                        vip:require('../assets/image/v.png'),
                        jie:'完成',
                         shu:4
                    },
                    {
                        time:'2018-10-10',
                        phone:'135****2526',
                        vip:require('../assets/image/v.png'),
                        jie:'完成',
                         shu:5
                    },
                    {
                        time:'2018-10-10',
                        phone:'135****2526',
                        vip:require('../assets/image/v.png'),
                        jie:'完成',
                         shu:6
                    },
                    {
                        time:'2018-10-10',
                        phone:'135****2526',
                        vip:require('../assets/image/v.png'),
                        jie:'完成',
                         shu:7
                    },
                ]*/
            }
        },
        created(){
            this.axios.post('index.php/index/apiuser/my_ivt',{
                token:sessionStorage.getItem('token')
            }).then((res)=>{
                console.log(res);
                this.yao=res.data.data.ivt_code
                 this.zong=res.data.data.team
                 this.ivtcount  =res.data.data.ivtcount
                 this.ivtlog=res.data.data.ivtlog;
                 this.yq_gz=res.data.data.yq_gz
            })  
        },
        methods:{
            copy(){
                var clipboard=new Clipboard('.yao_p3');
                clipboard.on('success',(e)=>{
                    this.$bus.$emit('toast','复制成功')
                      clipboard.destroy();
                })
            }
        }
    }
</script>
<style scoped>
.zan{
    font-size:35px;
    text-align:center;
    padding:100px 0px;
}
.yao1_span1{
   float:right;
    font-size:25px;
    color:#fff;
    margin-top:10px;
    margin-right:8px;
}
.yao1_img{
     display:inline-block;
    margin-top:10px;
    margin-left:5px;
    text-align:center;
}
#yao{
    background:#fff;
}
 .yao_div1{
     width:100px;
     height:95px;
 }
 .yao_div2{
     width:100%;
     height:300px;
     background:linear-gradient(90deg,#6DDFFF,#448DFF)
 }
 .yao_div2{
     text-align:center;
     color:#fff;
 }
 .yao_p1{
     padding:30px 0px;
 }
 .yao_p2{
     font-size:50px;
 }
 .yao_p3{
     width:150px;
     height:60px;
     border-radius:60px;
     border:1px solid #fff;
     margin:30px auto;
 }
 .yao_div3{
     margin:50px 100px;
     padding-bottom:40px;
 }
 .yao_div33{
     margin:50px 100px;
     padding-bottom:40px;     
     margin-left:110px;
 }
 .yao_p4{
     float:left;
     margin-left:25px;
 }
 .yao_div4{
   width:100%;
   margin:0px 30px;
   margin-left:10px;
 }
 .yao_div5{
     float:left;
     width:325px;
     height:140px;
     background:#DBE3EF;
     border-radius:10px;
     text-align:center;
     margin-left:30px;
 }
 .yao_p5{
     font-size:35px;
     margin-top:20px;
     font-weight:bold;
 }
 .yao_p6{
 }
 .yao_div6{
     clear: both;
     width:92%;
     margin:0px 4%;
     padding-top:70px;
 }
 .yao_p7{
 }
 .yao_p8{
     margin:30px 0px;
 }
 .yao_div7{
     clear: both;
     width:92%;
     margin:0px 4%;
 }
 .yao_p9{
     color:#666666;
     font-size:25px;
 }
 .yao_div9{
     width:100%;
     height:50px;
     line-height:50px;
     background:#999999;
     color:#fff;
     margin-top:15px;
 }
 .yao_p10{
     float:left;
     width:33.3%;
     text-align:center;
     font-size:20px;
 }
 .yao_div10{
    clear: both;
 }
 .yao_p11{
     display:inline-block;
     margin-left:50px;
     text-align:center;
     font-size:25px;
     margin-top:30px;
     text-align:right
 }
 .yao_p13{
     float:right;
     margin-top:30px;
     margin-right:20px;
     font-size:25px;
 }
.yao_p12{
     display:inline-block;
     width:50px;
     font-size:12px;
     height:50px;
     line-height:50px;
     border-radius:50%;
     background:red;
     text-align:center;
     color:#000;
     margin-top:30px;
 }
</style>

