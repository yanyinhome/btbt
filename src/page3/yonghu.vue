<template>
    <div id="yonghu">
        <div class="xiugai_div1">
            <div class="xiugai_div2">
              <p class="xiugai_p1" @click="clickBack">取消</p>
              <p class="xiugai_p2">用户名</p>
              <p class="xiugai_p3" @click="wang">完成</p>
            </div>
        </div>
          <div class="xiugai_div3">
                <input type="text" class="_input" v-model="username"  placeholder="请输入用户名">
          </div>
    </div>
</template>
<script>
    export default{
        data(){
            return{
                username:'',
            }
        },
        methods:{
          clickBack(){
              this.$router.go(-1);
          },
           wang(){
            this.axios.post('index.php/index/apiuser/edituser',{
                username:this.username,
                id:this.$route.query.id,
                token:sessionStorage.getItem('token')
            }).then((res)=>{
                console.log(res);
                if(res.data.code==200){
                    this.$router.push('/zhanghu')
                }else{
                    this.$bus.$emit('toast',res.data.data)
                }
            })
        }
        },
       
       
    }
</script>
<style scoped>
._input{
    height:90px;
    line-height:50px;
}
    .xiugai_div1{
        width:100%;
        line-height:80px;
        background:#fff;
    }
    .xiugai_div2{
        width:92%;
        margin:0px 4%;
        font-size:25px;
    }
   .xiugai_p1{
        display:inline-block;
        text-align:left;
    }
    .xiugai_p2{
        display:inline-block;
        text-align:center;
        margin-left:260px;
        font-weight:bold;
        font-size:30px;
    }
    .xiugai_p3{
        float:right;
        text-align:right;
        color:#0088FF;
    }
   .xiugai_div3{
       background:#fff;
       height:100px;
       line-height:100px;
       margin-top:25px;
       padding-left:30px;
   }
</style>

