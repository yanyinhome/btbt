<template>
    <div id="tibi">
        <com-head>提币</com-head>
        <div class="tibi_div1"></div>
        <div class="tibi_div2">
            <div class="tibi_div3">
              <p class="tibi_p1">可用： <span class="tibi_span1">{{yu}}</span> <span class="tibi_span2"> BTB</span></p>
              <p class="tibi_p5"></p>
              <div class="tibi_div4">
                  <p class="tibi_p3">地址：</p>
                  <p class="tibi_p3"><input type="text" v-model="btb_code" class="tibi_input2" placeholder="请输入要转币的钱包地址"></p>
              </div>
               <div class="tibi_div5">
                  <p class="tibi_p7">数量：</p>
                  <p class="tibi_p8"><input type="number" v-model="num" class="tibi_input1" placeholder="请输入要转币的数量"></p>
                  <p class="tibi_p9" @click="quan">提取全部</p>
              </div>
               <div class="tibi_div5">
                  <p class="tibi_p10">备注：</p>
                  <p class="tibi_p11"><input type="text" v-model="content" class="tibi_input3" placeholder="请输入备注信息"></p>
              </div>
              <div class="tibi_div5">
                  <p class="tibi_p10">安全密码：</p>
                  <p class="tibi_p11"><input type="text" v-if="payType" v-model="sale_code" class="tibi_input4" placeholder="请输入安全密码"></p>
                  <p class="tibi_p11"><input type="password" v-if="!payType"  v-model="sale_code" class="tibi_input4" placeholder="请输入安全密码"></p>
                  <p class="yan_p"><img :src="payType?img1:img" @click="handClick" class="yan_img1" alt=""></p>
              </div>
              <div class="tibi_div5">
                  <p class="tibi_p10">提币手续费：</p>
                  <p class="tibi_p12">{{tou}} BTB</p>
              </div>
            </div>
        </div>
        <p class="tibi_p4" @click.stop="inde">确定转出</p>
    </div>
</template>
<script>
    export default{
        data(){
            return{
                yu:"",
                num:'',
                btb_code:"",
                sale_code:'',
                bili:'',
                content:'',
                payType:false,
                img:require('../assets/image/yan32.png'),
                img1:require('../assets/image/yan33.png'),
                dbclick:false
            }
        },
        computed:{
            tou(){
              return  this.sxf = this.bili*this.num
            }
        },
        methods:{
             handClick(){
                this.payType=!this.payType
            },
            quan(){
                this.num=this.yu;
            },
            inde(){
                if(!this.dbclick){
                 this.que();
              }else{
                 this.$bus.$emit('toast','不可重复点击') 
             }
            },
            que(){
                this.dbclick=true
                if(this.btb_code==''){
                    this.$bus.$emit('toast','钱包地址不能为空')
                }else{
                    if(this.num==''){
                        this.$bus.$emit('toast','请输入数量')
                    }else if(this.num==0){
                        this.$bus.$emit('toast','交易数量不能小于0')
                    }else{
                        if(this.content==''){
                            this.$bus.$emit('toast','请输入备注信息')
                        }else if(this.sale_code==''){
                            this.$bus.$emit('toast','安全密码不能为空')
                        }else{
                            this.axios.post('index.php/index/apifinance/dotibtb',{
                                token:sessionStorage.getItem('token'),
                                num:this.num,
                                btb_code:this.btb_code,
                                sxf:this.tou,
                                content:this.content,
                                sale_code:this.sale_code
                            }).then((res)=>{
                                this.dbclick=false
                                if(res.data.code==200){
                                     //console.log(res);
                                      this.$bus.$emit('toast','转出成功')
                                      this.$router.push('/zichan')
                                }else{
                                    this.$bus.$emit('toast',res.data.data)
                                }
                            })
                        }
                    }
                }
            }
        },
        created(){
        
            this.axios.post('index.php/index/apifinance/tibtb',{
                token:sessionStorage.getItem('token')
            }).then((res)=>{
                //console.log(res);
                if(res.data.code==200){
                     this.yu=res.data.data
                     this.bili=res.data.bili
                }else{
                    this.$router.push('/login')
                    this.$bus.$emit('toast','请登录')
                }
            })
        }
    }
</script>
<style scoped>
.yan_p{
 float:right;
}
.yan_img1{
   margin-top:25px; 
   margin-right:30px;
}
.tibi_p12{
    display:inline-block;
    margin-left:20px;
}
.tibi_input3{
    height:110px;
    line-height:120px;
    margin-left:105px;
}
.tibi_input4{
    width:300px;
    height:110px;
    line-height:50px;
    margin-left:50px;
}
.tibi_p10{
    float: left;
}
.tibi_p11{
    float: left;
}
.tibi_p7{
     height:120px;
     line-height: 120px;
    display: inline-block;
}
.tibi_p8{
 line-height: 120px;
    height:120px;
   display: inline-block;
}
.tibi_p9{
   float:right;
   color:#448DFF;
}
.tibi_div5{
    padding-left:30px;
    padding-right:30px;
    background:#fff;
    height:120px;
    line-height:120px;
    margin-top:20px;
}
::-webkit-input-placeholder{
    color:#999999;
    font-size:30px;
}
    .tibi_div1{
        width:100%;
        height:110px;
    }
    .tibi_div2{
        width:100%;
        padding-bottom:30px;
        border-radius:12px;
    }
    .tibi_p1{
        font-size:25px;
        height:100px;
        line-height:100px;
        background:#fff;
        padding-left:30px;
    }
    .tibi_span1{
        color:red;
    }
    .tibi_span2{
        color:#999999;;
    }
    .tibi_div4{
        padding-left:30px;
        margin-top:20px;
        background: #fff;
        padding-top:20px;
    }
    .tibi_input1{
        width:350px;
        height:110px;
        line-height:110px;
        margin-left:100px;
    }
    .tibi_input2{
        width:100%;
        height:100px;
        border-bottom:1px solid #dddddd;
        margin-bottom:35px;
    }
    .tibi_p4{
        width:92%;
        height:80px;
        line-height:80px;
        font-size:25px;
        color:#fff;
        text-align:center;
        background:#FF8500;
        margin:40px 4%;
        border-radius:40px;
    }
</style>
