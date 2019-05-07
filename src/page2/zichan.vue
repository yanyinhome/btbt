<template>
    <div id="zichan">
        <div class="zichan_div1">
             <div class="zichan_div2">
                   <p class="iconfont icon-return" @click="clickBack"></p>
                   <p class="zichan_p3">
                       现货资产
                    </p>
             </div>
             <div class="zichan_div3">
                 <div class="zichan_p1">
                   <span class="span11"> <img src="../assets/image/heng1.png" class="heng1" alt=""> </span>
                      <span class="heng_span1">  总资产 </span>
                   <span class="span12"> <img src="../assets/image/heng.png" class="heng"  alt=""></span>
                  </div>
                 <p class="zichan_p2">￥{{arr1.money}}</p>
                 <p class="zichan_p4">$ {{arr1.amoney}}</p>
                 <p class="zichan_p4" v-if="arr1.amoney==''||arr1.amoney==null">$0.00</p>
             </div>
        </div>
        <div class="ding"></div>
        <div class="ding1"></div>
        <div class="zichan_div4" >
            <div class="zichan_div5">
                <div class="zichan_div6">
                    <p class="zichan_p5">BTB</p>
                    <p class="zichan_p66">冻结：{{arr1.dj}}</p>
                </div>
                <div class="zichan_div7">
                    <p class="zichan_p7">{{arr1.num}}</p>
                    <p class="zichan_p8">折合（¥）：{{arr1.money}}</p>
                </div>
            </div>
            <div class="zichan_div8" >
                    <p class="zichan_p9" @click="handClick(item.route,index)"  v-for="(item,index) in list" :key="index">
                        <img :src="item.img" class="x_img" alt="">
                        {{item.title}}
                    </p>
            </div>
        </div>
         <div class="zichan_div4" v-for="(item,index) in other" :key="index" @click="tisi">
            <div class="zichan_div5">
                <div class="zichan_div6">
                    <p class="zichan_p5">{{item.english}}</p>
                    <p class="zichan_p6">冻结：0.00</p>
                </div>
                <div class="zichan_div7">
                    <p class="zichan_p7">0.00</p>
                    <p class="zichan_p8">折合（¥）：0</p>
                </div>
            </div>
            <div class="zichan_div8" >
                    <p class="zichan_p9"   v-for="(item,index) in list" :key="index">
                        <img :src="item.img" class="x_img" alt="">
                        {{item.title}}
                    </p>
            </div>
        </div>
        <div class="ding3"></div>
    </div>
</template>
<script>
    export default{
        data(){
            return{
                arr1:[],
                other:[],
                list:[
                {
                    title:'充币',
                    route:'/chong',
                    img:require('../assets/image/x.png')
                }, {
                     title:'提币',
                     route:'/tibi',
                     img:require('../assets/image/x.png')
                }, {
                    title:'账单',
                    route:'/btb',
                    img:require('../assets/image/x.png')
                }
                ]
            }
        },
        created(){
            this.axios.post('index.php/index/apifinance/btb',{
                token:sessionStorage.getItem('token')
            }).then((res)=>{
                console.log(res);
                this.arr1=res.data.data
                this.other=res.data.other
            })
        },
        methods:{
            tisi(){
                this.$bus.$emit('toast','暂未开放')
            },
            clickBack(){
                this.$router.go(-1);
            },
            handClick(route,index){
                if(index==1){
                     this.$router.push({path:route})
                     this.$router.go(0)
                }
                this.$router.push({path:route})
            },
        }
    }
</script>
<style scoped>
.span11{
float:left;
margin-left:210px;
margin-right:30px;
margin-top:-10px;
}
.span12{
 float:right;
margin-right:180px;
margin-left:20px;
margin-top:-10px;
}
.heng{
   width:100px;
}
.heng_span1{
   width:100px;
}
.heng1{
   width:100px;
   
}
#zichan{
    background: #F6F6F6;
}
.ding3{
    width:100%;
    height:25px;
}
.ding1{
    position: fixed;
    width:100%;
    height:25px;
    background:#F6F6F6;
}
.ding{
    width:100%;
    height:350px;
}
.x_img{
    display:inline-block;
    vertical-align: middle;
}
.zichan_div1{
    position: fixed;
    background:url('../assets/image/bgColor.png') no-repeat;
    background-size:100% 100%;
    width:100%;
    height:340px;
    top:0px;
}
    .zichan_div2{
        width:100%;
        height:120px;
        line-height:120px;
        color:#fff;
    }
     .zichan_p3{
        display:inline-block;
        text-align:center;
        margin-left:270px;
    }
    .iconfont{
        float:left;
        margin-left:30px;
    }
    .zichan_div3{
        color:#fff;
    }
    .zichan_p2{
        font-size:50px;
        text-align: center;
        margin-top:20px;
    }
   .zichan_p4{
       margin-top:15px;
       text-align: center;
   }
   
   .zichan_div5{
       margin:0px 30px;
       margin-top:30px;
   }
   .zichan_div6{
       float:left;
       padding-top:20px;
   }
   .zichan_div7{
       text-align:right;
       padding:10px 0px;
       padding-bottom:0px;
       margin-bottom:-10px;
   }
   .zichan_p5{
       color:#FF8500;
       font-size:33px;
   }
     .zichan_p6{
       color:#999999;
       font-size:20px;
       margin-top:40px;
   }
   .zichan_p66{
       color:#999999;
       font-size:20px;
       margin-top:40px;
   }
   .zichan_p7{
       font-size:50px;
       font-weight:bold;
       margin-top:10px;
   }
   .zichan_p8{
       color:#999999;
       font-size:20px;
       margin-top:43px;
   }
   .zichan_div4{
       width:92%;
       margin:0px 4%;
       background:#fff;
       border-radius:12px;
       box-shadow: 0px 5px 5px #999999;
   }
   .zichan_div8{
       clear: both;
       width:100%;
       text-align:center;
       margin-top:10px;
       border-bottom-left-radius: 8px;
       border-bottom-right-radius: 8px;
   }
   .zichan_p9{
       display:inline-block;
       width:33.3%;
       height:80px;
       line-height:80px;
       background:#E4E7EA;
   }
</style>

