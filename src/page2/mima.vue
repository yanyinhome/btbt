<template>
    <div id="dui">
        <div class="dui_div1">
            <p class="iconfont icon-return" @click="clickBack"></p>
        </div>
        <div class="dui_div2">
            <p class="dui_p1">买(卖)入数量:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="mima_span1">{{nums}}</span></p>
            <p class="dui_p1" v-if="type==1">利息 (￥):&nbsp;&nbsp;<span class="mima_span2">{{lixi}}</span></p>
            <p class="dui_p1" @click="sss">结尾账号:
               &nbsp;<span type="text" class="dui_input1"  >{{names1}}</span>
               &nbsp;<span type="text" class="dui_input3" v-if="names1==null">请选择银行</span>
            </p>
            <p class="dui_p1">安全密码:
               &nbsp;<input type="password" class="dui_input2" v-model="sale_code" placeholder="请输入您的安全密码">
            </p>
        </div>
        <p class="dui_p2" @click="buy">确定</p>
    </div>
</template>
<script>
    export default{
        data(){
            return{
                nums:this.$route.query.num,
                lixi:this.$route.query.lixi,
                names1:this.$route.query.bank_name,   
                id:this.$route.query.bank_id,  
                sale_code:"",
                type:this.$route.query.type
            }
        },
        mounted(){
           
        },
          created(){
               this.axios.post('index.php/index/apifinance/transaction',{
                token:sessionStorage.getItem('token')
            }).then(
                (res)=>{
                    //console.log(res) 
                    this.list=res.data.data  
                    this.price=res.data.data.price
                }
            )
        },
        methods:{
            buy(){
                if(this.names1==null){
                    this.$bus.$emit('toast','请选择银行')
                }else{
                    if(this.sale_code==''){
                        this.$bus.$emit('toast','请输入安全密码')
                    }else{
                        this.axios.post('index.php/index/apifinance/dobuybt',{
                            type:this.$route.query.type,
                            token:sessionStorage.getItem('token'),
                            num:this.nums,
                            lixi:this.lixi,
                            bank_id:this.$route.query.bank_id,
                            sale_code:this.sale_code
                        }).then((res)=>{
                            console.log(res)
                            if(res.data.code==200){
                                if(this.type==1){
                                this.$router.push({path:'/ding',query:{type:this.type}})
                                }else if(this.type==2){
                                  this.$router.push({path:'/ding1',query:{type:this.type}})    
                                }
                            }else{
                                this.$bus.$emit('toast',res.data.data)
                            }
                        })
                    }
                }
            },
             name(){
             this.names1=this.$route.query.bank_name 
        },
            sss(){
                this.$router.push({path:'/yin',query:{num:this.$route.query.num,lixi:this.$route.query.lixi,type:this.$route.query.type}})
            },
            clickBack(){
                this.$router.go(-1);
            }
        },
      
    }
</script>
<style scoped>
    .dui_div1{
        width:100%;
        height:105px;
        background:#fff;
        line-height:105px;
    }
    .iconfont{
        margin-left:30px;
    }
    .dui_div2{
        width:92%;
        margin:0px 4%;
        background:#fff;
        font-size:25px;
        margin-top:20px;
    }
    .dui_p1{
        margin-left:30px;
        width:100%;
        height:120px;
        line-height:120px;
        border-top:1px solid #eee;
    }
    ::-webkit-input-placeholder{
        font-size:25px;
        text-align:right;
    }
    .dui_input1{
        float:right;
        margin-right:50px;
         text-align:right;
    }
    .dui_input3{
        float:right;
        margin-right:50px;
        color:#666666;
         text-align:right;
    }
    .dui_input2{
        float:right;
        width:470px;
        height:120px;
        margin-right:50px;
        text-align:right;
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
        font-size:25px;
    }
    .mima_span1{
        display:inline-block;
        width:150px;
        height:80px;
        text-align:right;
        margin-left:265px;
    }
    .mima_span2{
        float:right;
        margin-right:65px;
    }
</style>

