<template>
    <div id="jiaoyi">
        <com-head>交易中订单</com-head>
        <div class="jiaoyi_div1"></div>
        <div class="jiaoyi_div2">
            <p class="jiaoyi_p1" :class="[hide==true?'active':'']" @click="indexs1">我的买入</p>
            <p class="jiaoyi_p2" :class="[hide1==true?'active':'']"  @click="indexs2">我的卖出</p>
        </div>
        <div v-if="hide">
        <div class="jiaoyi_div3" v-for="(item,index) in list" :key="index" @click="tiao()">
            <p class="jiaoyi_p3">交易时间：{{item.time}}</p>
            <div class="jiaoyi_div4">
                <p class="jiaoyi_p4">买入数量：<span class="jiaoyi_span1"> {{item.num}}</span></p>
                <p class="jiaoyi_p5">买入单价：<span class="jiaoyi_span1">{{item.dan}}</span></p>
                <p class="jiaoyi_p6">买入总价：<span class="jiaoyi_span1">{{item.zong}}</span></p>
                <p class="jiaoyi_p7">收款账户：<span class="jiaoyi_span1"> {{item.shou}}</span></p>
            </div>
            <div class="jiaoyi_div5">
                <span class='jiaoyi_span2'></span>
               <p class="jiaoyi_p8"> 上传截图</p>
            </div>
        </div>
       </div>
    <!--卖出-->

        <div v-if="hide1">
        <div class="jiaoyi_div3" v-for="(item,index) in list1" :key="index" @click="tiao">
            <p class="jiaoyi_p3">交易时间：{{item.time}}</p>
            <div class="jiaoyi_div4">
                <p class="jiaoyi_p4">买入数量：<span class="jiaoyi_span1"> {{item.num}}</span></p>
                <p class="jiaoyi_p5">买入单价：<span class="jiaoyi_span1">{{item.dan}}</span></p>
                <p class="jiaoyi_p6">买入总价：<span class="jiaoyi_span1">{{item.zong}}</span></p>
                <p class="jiaoyi_p7">收款账户：<span class="jiaoyi_span1"> {{item.shou}}</span></p>
            </div>
            <div class="jiaoyi_div5">
                <span class='jiaoyi_span2'></span>
               <p class="jiaoyi_p8"> 上传截图</p>
            </div>
        </div>
       </div>

    </div>  
</template>
<script>
    export default{
        data(){
            return{
                hide:true,
                hide1:false,
                list:[
                    {
                        time:'2018-09-29 09:30:25',
                        num:50,
                        dan:'￥1.00',
                        zong:'￥50.00',
                        shou:'6224343505050254'
                    },
                    {
                        time:'2018-09-29 09:30:25',
                        num:50,
                        dan:'￥1.00',
                        zong:'￥50.00',
                        shou:'6224343505050254'
                    }
                ],
                  list1:[
                    {
                        time:'2018-09-29 09:30:25',
                        num:50,
                        dan:'￥1.00',
                        zong:'￥50.00',
                        shou:'6224343505050254'
                    },
                    {
                        time:'2018-09-29 09:30:25',
                        num:50,
                        dan:'￥1.00',
                        zong:'￥50.00',
                        shou:'6224343505050254'
                    }, {
                        time:'2018-09-29 09:30:25',
                        num:50,
                        dan:'￥1.00',
                        zong:'￥50.00',
                        shou:'6224343505050254'
                    }
                ]
            }
        },
        methods:{
            indexs1(){
                this.hide=true;
                this.hide1=false;
            },
            indexs2(){
                this.hide1=true;
                this.hide=false;
            },
            tiao(){
                this.$router.push('/shen')
            }
        }
    }
</script>
<style scoped>
.active{
    color:#FF8500;
}
#jiaoyi{
    background:#F6F6F6;
}
    .jiaoyi_div1{
        width:100%;
        height:90px;
    }
    .jiaoyi_div2{
        width:100%;
        height:100px;
        line-height:100px;
        border-bottom:2px  solid #eee;
        text-align:center;
    }
    .jiaoyi_p1{
        width:35%;
        display:inline-block;
    }
    .jiaoyi_p2{
        width:35%;
       display:inline-block;
    }
    .jiaoyi_div3{
        width:92%;
        margin:30px 4%;
        padding-bottom:25px;
        background:#fff;
    }
    .jiaoyi_p3{
        width:92%;
        margin:30px 4%;
        height:60px;
        line-height:60px;
        color:#666666;
        font-size:28px;
        margin-left:30px;
        border-bottom:1px solid #eee;
    }
    .jiaoyi_div4{
        display:inline-block;
        margin-left:30px;
        color:#666666;
    }
    .jiaoyi_span1{
        color:#000;
    }
    .jiaoyi_p8{ 
        width:180px;
        height:60px;
        line-height:60px;
        text-align:center;
        color:#EC0000;
        border-radius:10px;
        border:1px solid #EC0000;
        margin-right:30px;
        margin-top:60px;
    }
    .jiaoyi_span2{
        float:left;
        width:1px;
        height:120px;
        background:#DDDDDD;
        margin-left:-25px;
        margin-right:15px;
        margin-top:25px;
    }
    .jiaoyi_div5{
        float:right;
    }
</style>

