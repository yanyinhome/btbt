<template>
    <div id="xuanze">
        <com-head>选择开户行</com-head>
        <div class="xuanze_div1"></div>
        <div class="xuanze_div2">
            <p class="xuanze_p1" v-for="(item,index) in data" :key="index" @click="chuan(item.bankname,item.id)">
                <span class="xuanze_span1"><img :src="'http://'+item.img" class="xuan_img1" alt=""></span>
                <span class="xuanze_span2">{{item.bankname}}</span>
            </p>
        </div>
    </div>
</template>
<script>
    export default{
        data(){
            return{
                data:[],
               /* list:[
                    {
                        img:require('../assets/image/xuan1.png'),
                        title:'中国银行'
                    },
                    {
                        img:require('../assets/image/xuan2.png'),
                        title:'中国建设银行'
                    },
                    {
                        img:require('../assets/image/xuan3.png'),
                        title:'中国工商银行'
                    },
                    {
                        img:require('../assets/image/xuan4.png'),
                        title:'中国农业银行'
                    },
                    {
                        img:require('../assets/image/xuan5.png'),
                        title:'交通银行'
                    },
                    {
                        img:require('../assets/image/xuan6.png'),
                        title:'招商银行'
                    },
                    {
                        img:require('../assets/image/xuan7.png'),
                        title:'中国邮政储蓄银行'
                    },
                    {
                        img:require('../assets/image/xuan8.png'),
                        title:'中国光大银行'
                    },
                    {
                        img:require('../assets/image/xuan9.png'),
                        title:'中国民生银行'
                    },
                    {
                        img:require('../assets/image/xuan10.png'),
                        title:'浦发银行'
                    },
                ]*/
            }
        },
        methods:{
            chuan(name,id){
                this.$router.push({path:'/add',query:{name:name,id:id}})
            }
        },
        created(){
            this.axios.post('index.php/index/apiuser/banklist',{
                token:sessionStorage.getItem('token')
            }).then((res)=>{
                console.log(res);
                this.data=res.data.data
            })
        },
    }
</script>
<style scoped>
    .xuanze_div1{
        width:100%;
        height:110px;
    }
    .xuanze_div2{
        width:100%;
        background:#fff;
    }
    .xuanze_span1{
        display:inline-block;
        vertical-align: top;
    }
    .xuan_img1{
        width:50px;
        height:50px;
        margin-top:30px;
    }
    .xuanze_span2{
        display:inline-block;
        margin-left:40px;
        line-height:110px;
    }
    .xuanze_p1{
        width:92%;
        height:110px;
        margin:0px 4%;
        border-bottom:1px solid #dddddd;
    }
</style>

