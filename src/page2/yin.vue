<template>
    <div id="yin">
        <div class="yin_div1">
             <p class="iconfont icon-return" @click="clickBack"></p>
        </div>
        <div v-for="(item,index) in list" :key="index" class="yin_div2" @click="indexs(item.open_bank,item.bank_id)">
            <p class="yin_p1">{{item.open_bank}}&nbsp;&nbsp;&nbsp;({{item.bank_num}})</p>
        </div>
        <!--<div class="yin_div3">
            <img src="../assets/image/hang1.png" class="yin_img1" alt="">
            <span class="yin_span1">添加银行卡</span>
        </div>-->
    </div>
</template>
<script>
    export default{
        data(){
            return{
                list:[]
               /*list:[
                   {
                       title:'建设银行 (0024)'
                   },
                   {
                       title:'农业银行 (3436)'
                   }
               ] */
            }
        },
        created(){
            this.axios.post('index.php/index/apifinance/bankcheck',{
                 token:sessionStorage.getItem('token')
            }).then((res)=>{
                console.log(res)
                this.list=res.data.data
            })
        },
        methods:{
            indexs(name,id){
                this.$router.push({path:'/mima',query:{bank_name:name,bank_id:id,num:this.$route.query.num,lixi:this.$route.query.lixi,type:this.$route.query.type}})
            },
            clickBack(){
                this.$router.go(-1);
            }
        }
    }
</script>
<style scoped>
#yin{
    background:#fff;
    position: relative;
}
       .yin_div1{
           width:100%;
           height:120px;
           line-height:120px;
           background:#fff;
           border-bottom:2px solid #eee;
       } 
       .iconfont{
           margin-left:30px;
       }
       .yin_div2{
          width:92%;
          margin:0px 4%; 
       }
    .yin_p1{
        width:100%;
        height:100px;
        line-height:100px;
        border-bottom:1px solid #eee;
    }
    .yin_div3{
        position: fixed;
        bottom:35px;
        left:260px;
        text-align:center;
    }
    .yin_img1{
        transform:scale(0.6);
        vertical-align: middle;
    }
    .yin_span1{
        display:inline-block;
        vertical-align: middle;
    }
</style>

