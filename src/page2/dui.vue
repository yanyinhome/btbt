<template>
    <div id="dui">
        <com-head>兑换BTB</com-head>
        <div class="dui_div1"></div>
        <div class="dui_div2">
            <p class="dui_p1">BT余额:&nbsp;&nbsp;&nbsp;&nbsp;￥{{list.jy}}</p>
            <p class="dui_p1">兑换比例:&nbsp;&nbsp;{{list.bili}}</p>
            <p class="dui_p1">兑换数量:
               &nbsp;<input type="number"  v-model="num" class="dui_input1" placeholder="请输入您要兑换的数量">
            </p>
            <p class="dui_p1">安全密码:
               &nbsp;<input type="password" v-model="sale_code" class="dui_input1" placeholder="请输入您的安全密码">
            </p>
        </div>
        <p class="dui_p2" @click="dui">确定兑换</p>
    </div>
</template>
<script>
    export default{
        data(){
            return{
                list:'',
                num:'',
                sale_code :''
            }
        },
        methods:{
            dui(){
                if(this.num==''){
                    this.$bus.$emit('toast','请输入数量')
                }else{
                    if(this.sale_code==''){
                        this.$bus.$emit('toast','请输入密码')
                    }else{
                         this.axios.post('index.php/index/apifinance/doexchange',{
                    token:sessionStorage.getItem('token'),
                    num:this.num,
                    sale_code:this.sale_code
                }).then(
                    (res)=>{
                        console.log(res)
                        if(res.data.code==200){
                            this.$bus.$emit('toast','兑换成功')
                            this.$router.push('/jilu')
                        }else{
                            this.$bus.$emit('toast',res.data.data)  
                        }
                    }
                )
                    }
                }
               
            }
        },
        created(){
            this.axios.post('index.php/index/apifinance/exchange',{
                token:sessionStorage.getItem('token'),
                num:this.num, 
                sale_code:this.sale_code
            }).then((res)=>{
                console.log(res)
                this.list=res.data.data
            })
        }
    }
</script>
<style scoped>
    .dui_div1{
        width:100%;
        height:105px;
    }
    .dui_div2{
        width:92%;
        margin:0px 4%;
        background:#fff;
        font-size:30px;
    }
    .dui_p1{
        margin-left:30px;
        width:100%;
        height:120px;
        line-height:120px;
        border-top:1px solid #eee;
    }
    ::-webkit-input-placeholder{
        font-size:30px;
    }
    .dui_input1{
        width:400px;
    }
    .dui_p2{
        width:92%;
        margin:0px 4%;
        height:80px;
        line-height:80px;
        border-radius:40px;
        color:#fff;
        background:#FF8500;
        text-align:center;
        margin-top:50px;
        font-size:30px;
    }
</style>

