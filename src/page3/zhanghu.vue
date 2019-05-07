<template>
    <div :class="hide==true?'zhanghu':'zhanghu1'">
         <div class="move" @click="guan" v-if="hide">
        </div>
        <div class="zhanghu_div1">
            <div v-if="toke!=null" class="zhanghu_div3" @click="wo">
                 <p class="zhanghu_p1"><img :src="'http://'+headimg" class="xiu_img" alt=""></p>   
                 <div class="zhanghu_div4">
                     <p class="zhanghu_p2">{{tele}}</p>
                     <div class="zhanghu_p3">
                         <p class="xiu_p1"> <img src="../assets/image/blue.png" alt="" v-if="rank1!=0" class="deng"> <span class="xiu_span1" v-if="rank1!=0">{{rank1}}</span></p>
                          <div >
                              <p class="xiu_p2"> {{rank[rank1]}}</p>
                          </div>
                       </div>
                     <p></p>
                 </div>
            </div>
               <div class="zhanghu_div3" v-if="toke==null">
                 <p class="zhanghu_p1"><img src="../assets/image/zhanghu1.png" alt=""></p>   
                 <div class="zhanghu_div4">
                     <p class="zhanghu_p2"> <router-link to="/login" class="aa_a">登 录</router-link> / <router-link class="aa_a" to="/register">注 册</router-link></p>
                 </div>
            </div>
        </div>
        <div class="zhanghu_div2" >
            <div class="zhanghu_div5" v-for="(item,index) in list" :key="index" @click="handClick(index,item.route)">
                <p class="zhanghu_p4"><img :src="item.img" class="zhanghu_img1"  alt=""></p>
                <p class="zhanghu_p5">{{item.title}}</p>
                <p class="zhanghu_p5" @click="toast" v-if="toke!=null&&index==7">当前版本 <span class="ban">{{edition}}</span></p>
                <p class="zhanghu_p5" v-if="toke==null&&index==7">当前版本</p>
                <p class="zhanghu_p6"><img :src="item.img1" alt=""></p>
            </div>
        </div>
        <div class="zhanghu_div6" v-if="toke!=null" @click="tan">退出当前账户</div>
        <div class="zhanghu_div9" v-if="toke==null" ></div>
        <div class="zhanghu_div7"></div>
        <div class="tan" v-if="hide">
            <p class="tan_p1" @click="tui">确定退出</p>
            <p class="tan_p2" @click="guan">取消</p>
        </div>
        <com-foot></com-foot>
    </div>
</template>
<script>
    export default{
        data(){
            return{
                toke:sessionStorage.getItem('token'),
                hide:false,
                isreal:'',
                headimg:'',
                tele:'',
                edition:'',
                rank:'',
                list:[],
                real:'',
                rank1:'',
                is_real:{},
               list:[
                   {
                       img:require('../assets/image/tu7.png'),
                       title:'我的邀请',
                       img1:require('../assets/image/zhang10.png'),
                       route:'/yao'
                   },{
                       img:require('../assets/image/tu6.png'),
                       title:'支付信息',
                       img1:require('../assets/image/zhang10.png'),
                       route:'/xinxi'
                   },
                   {
                       img:require('../assets/image/tu1.png'),
                       title:'实名认证',
                       img1:require('../assets/image/zhang10.png'),
                       route:''
                   },
                   {
                       img:require('../assets/image/tu2.png'),
                       title:'安全中心',
                       img1:require('../assets/image/zhang10.png'),
                       route:'/anquan'
                   },
                   {
                       img:require('../assets/image/tu8.png'),
                       title:'邀请返佣',
                       img1:require('../assets/image/zhang10.png'),
                        route:'/yong'
                   },
                   {
                       img:require('../assets/image/tu5.png'),
                       title:'平台公告',
                       img1:require('../assets/image/zhang10.png'),
                        route:'/copy'
                   },
                   {
                       img:require('../assets/image/tu3.png'),
                       title:'客服中心',
                       img1:require('../assets/image/zhang10.png'),
                        route:'/kefu'
                   },
                   {
                       img:require('../assets/image/tu4.png'),
                       title:'',
                       img1:require('../assets/image/zhang10.png'),
                        route:''
                   },
                   {
                       img:require('../assets/image/tu.png'),
                       title:'下载APP',
                       img1:require('../assets/image/zhang10.png'),
                        route:'/downs'
                   },
               ]
            }
        },
        created(){
            //this.toke=sessionStorage.getItem('token')
            this.axios.post('index.php/index/apiuser/mine',{
                token:sessionStorage.getItem('token')
            }).then((res)=>{
                this.isreal=res.data.isreal
                this.rank=res.data.rank
                this.rank1=res.data.data.rank
                console.log(this.isreal);
               // console.log(res)
               console.log(res)
               this.is_real=res.data.isreal
               this.edition=res.data.edition
                  this.headimg=res.data.data.headimgurl
                  if(res.data.data.username!=undefined){
                      this.tele=res.data.data.username
                     // console.log(this.tele)
                  }else{
                      if(res.data.data.phone!=undefined){
                        this.tele=res.data.data.phone  
                       // console.log(this.tele)
                      }else{
                          if(res.data.data.email!=undefined){
                               this.tele=res.data.data.email
                          }
                      }
                  }
            })
        },
        methods:{
            toast(){
                this.$bus.$emit('toast','当前版本已是最新')
            },
            wo(){
                this.$router.push('/wo')
            },
            tui(){
                sessionStorage.setItem('select',0)
                sessionStorage.removeItem('token')
                this.$bus.$emit('toast','退出成功')
                this.$router.push('/login')
            },
            handClick(index,route){
                if(sessionStorage.getItem('token')){
                if(index==2){
                    if(parseInt(this.isreal)==1){
                        this.$router.push('/ren')
                    }else if(parseInt(this.isreal)==2){
                        this.$bus.$emit('toast','实名被驳回，请重试')
                        this.$router.push('/shiming')
                    }else if(parseInt(this.isreal)==0){
                        this.$router.push('/ming')
                    }else if(parseInt(this.isreal)==3){
                         this.$router.push('/shiming')
                    }
                  }else{
                     this.$router.push({path:route}) 
                  }
                }else{
                    this.$router.push('/login')
                }
            },
             tan(){
                this.hide=true
            },
            guan(){
                this.hide=false
            },
        }
    }
</script>
<style scoped>
 .zhanghu_p3{
        display:inline-block;
        width:200px;
        height:50px;
        border-radius:8px;
        text-align:center;
        line-height:50px;
        font-size:10px;
        color:blue;
        font-weight:bold;
        background:#fff;
        opacity:0.5;
    }
.xiu_p2{
    font-size:28px;
    width:100%;
    height:50px;
    line-height:50px;
}
.ban{
    float:right;
    margin-left:340px;
}
.xiu_p1{
    float:left;
    margin-left:5px;
}
.xiu_span1{
    display:inline-block;
    margin-top:10px;
    margin-left:-10px;
    font-size:28px;
}
.deng{
  float:left;
  transform: scale(0.6);
}
.aa_a{
    color:#fff;
}
.xiu_img{
        width:100px;
        height:100px;
        border-radius:50%;  
    }
.zhanghu{
    width:100%;
    height:100%;
    position: relative;
    overflow:hidden;
}
.zhanghu1{
    position: relative;
}
.move{
    width:100%;
    height:100%;
    position: fixed;
    top:0;
    left:0;
    right:0;
    bottom:0;
    background:#000;
    opacity:0.6;
    z-index:100;
}
.tan{
    position: fixed;
    width:100%;
    bottom:5px;
     z-index:101;
}
.tan_p1,.tan_p2{
    width:96%;
    height:120px;
    line-height:120px;
    border-radius:15px;
    margin:15px 2%;
    text-align:center;
    color:red;
    background:#F8F8F8;
    font-size:32px;
}
.tan_p2{
   color:#000;
}
    .zhanghu_div1{
        width:100%;
        height:400px;
        background:#448DFF;
        border-bottom-left-radius: 90px;
        border-bottom-right-radius: 90px;
    }
    .zhanghu_div2{
        width:92%;
        background:#fff;
        margin:0px 4%;
        margin-top:-100px;
        border-radius:12px;
    }
    .zhanghu_div3{
        width:92%;
        margin:0px 4%;
       padding-top:130px;
    }
    .zhanghu_p1{
        float:left;
        margin-right:30px;
    }
    .zhanghu_div4{
       color:#fff;
       margin-top:10px;
    }
    .zhanghu_div5{
        clear: both;
        width:92%;
        height:100px;
        line-height:100px;
        border-top:1px solid #DDDDDD;
        margin:0px 4%;
    }
    .zhanghu_p5{
       display:inline-block;
       margin-left:-5px;
    }
      .zhanghu_p6{
       float:right;
    }
     .zhanghu_p4{
       float:left;
       margin-top:8px;
       margin-right:30px;
       width:7%;
    }
    .zhanghu_img1{
        display:inline-block;
        width:100%;
    }
     .zhanghu_div9{
        clear: both;
        width:92%;
        height:80px;
     }
    .zhanghu_div6{
        clear: both;
        width:92%;
         height:80px;
        line-height:80px;
        margin:30px 4%;
        background:#fff;
        text-align:center;
        font-size:25px;
        color:#EC0000;
        font-weight: bold;
    }
    .zhanghu_div7{
        width:100%;
        height:100px;
    }
</style>

