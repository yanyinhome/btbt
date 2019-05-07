<template>
    <div id="add">
        <com-head>银行卡</com-head>
        <div class="add_div1"></div>
        <p class="xiu_">* 只可绑定一张银行卡，绑定后如需更改银行卡，请联系客服进行更改。</p>
        <div class="add_div2">
            <p class="add_p1" @click="tiao">
                <span class="add_span1">开户行</span>
                 <img src="../assets/image/zhang10.png" class="add_img1" alt="">
                <span class="add_span2">{{open}}</span>
                <span class="add_span2" v-if="open==null">请选择</span>
            </p>
            <p class="add_p2">
                <span class="add_span1">支行名称</span>
                <input type="text" v-model="bank_name" class="add_input1" placeholder="请输入支行名称">
            </p>
             <p class="add_p2">
                <span class="add_span3">持卡人 &nbsp;&nbsp;</span>
                <input type="text" v-model="bank_username" class="add_input1" placeholder="请输入持卡人姓名">
            </p>
             <p class="add_p2">
                <span class="add_span1">银行卡号</span>
                <input type="text" v-model="bank_num" class="add_input1" placeholder="请输入银行卡号">
            </p>
        </div>
        <p class="add_p" @click="add">确定添加</p>
    </div>
</template>
<script>
    export default{
        data(){
            return{
                open:this.$route.query.name,
                bank_num:'',
                bank_username:"",
                bank_name:"",
                open_bank:""
            }
        },
        methods:{
            tiao(){
                this.$router.push('/xuanze');
            },
            add(){
               var reg=/^([0-9]{16}|[0-9]{19})$/;
            if(this.bank_name==''){
                this.$bus.$emit('toast','请输入支行名称')
            }else{
               if(this.bank_username==""){
                   this.$bus.$emit('toast','请输入持卡人姓名')
               }else{
                   if(this.bank_num==''){
                      this.$bus.$emit('toast','请输入银行卡号') 
                   }else if(!reg.test(this.bank_num)){
                       this.$bus.$emit('toast','银行卡格式有误') 
                   }else{
                       this.axios.post('index.php/index/apiuser/editbank',{
                            token:sessionStorage.getItem('token'),
                            flag:1,
                            bank_num:this.bank_num,
                            bank_username:this.bank_username,
                            bank_name:this.bank_name,
                            open_bank:this.$route.query.id
                       }).then((res)=>{
                           console.log(res)
                           if(res.data.code==200){
                               this.$bus.$emit('toast','添加成功')
                               this.$router.push('/wo_yin')
                           }else{
                               this.$bus.$emit('toast',res.data.data) 
                           }
                       })
                   }
               }
            }
            }
        }        
    }
</script>
<style scoped>
.add_div1{
    width:100%;
    height:120px;
}
.add_div2{
    width:100%;
    background:#fff;
}
.add_p1,.add_p2{
    width:92%;
    height:120px;
    line-height:120px;
    margin:0px 4%;
    border-bottom:1px solid #dddddd;
    font-size:25px;
}

.add_span1,.add_span3{
    float:left;
    width:170px;
    text-align: left;
}
.add_p2{
 text-align:right;
}
.add_span2{
    float:right;
    color:#999999;
    margin-right:25px;
}
.add_img1{
    float:right;
    margin-top:48px;
}

.add_input1{
   float:right;
   width:470px;
   height:118px;
   line-height:50px;
   margin-left:30px;
   text-align:right;
   color:#000;
  
}
::-webkit-input-placeholder{
    text-align:right;
    color:#999999;
}
.add_p{
    width:92%;
    height:80px;
    line-height: 80px;
    text-align:center;
    color:#fff;
    background:#FF8500;
    font-size:25px;
    border-radius:40px;
    margin:0px 4%;
    margin-top:60px;
}
.xiu_{
    font-size:20px;
    width:92%;
    margin:0px 4%;
    color:red;
}
</style>

