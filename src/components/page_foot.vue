<template>
  <div id="pageFoot">
    <div class="page_foot_inner">
      <div class="page_foot_nav" :class="{'page_foot_select': select == item.index}" v-for="(item, index) in routeList" :key="index" @click="footRoute(item.index,item.route)">
        <p class="tubiao" :class="[select == item.index ? item.iconfont1 : item.iconfont, select === item.index ? 'select' : '', 'page_foot_iconfont', 'iconfont']">
          <img :src="select == item.index ? item.iconfont1 : item.iconfont" class="img1" alt="图片">
        </p>
        <p :class="[select == item.index ? 'selectText' : '', 'page_foot_name']" class="name">{{ item.name }}</p>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: 'pageFoot',
  data () {
    return {
       username:'',
       select:0,
      routeList: [
        //底部信息
        {
          iconfont: require('../assets/image/hui1.png'),
          iconfont1: require('../assets/image/hui3.png'),
          name: '首页',
          route: '/index',
          index:0
        },
        {
          iconfont: require('../assets/image/shou3.png'),
          iconfont1:  require('../assets/image/shou4.png'),
          name: '行情',
          route: '/hang',
          index:1
        },
           {
          iconfont: require('../assets/image/xin_foot1.png'),
          iconfont1:  require('../assets/image/xin_foot2.png'),
          name: '交易',
          route: '/business',
          index:2
        },
        {
          iconfont: require('../assets/image/shou5.png'),
          iconfont1:  require('../assets/image/shou6.png'),
          name: '财务',
          route: '/caiwu',
          index:3
        },
        {
          iconfont: require('../assets/image/4b.png'),
          iconfont1:  require('../assets/image/4b1.png'),
          name: '账户',
          route: '/zhanghu',
          index:4
        }
      ]
    };
  },
   created(){
    if(sessionStorage.getItem('select')==''||sessionStorage.getItem('select')==null||sessionStorage.getItem('select')==undefined){
      sessionStorage.setItem('select',0)
    } 
            this.axios.post('index.php/index/apiuser/mine',{
                token:sessionStorage.getItem('token')
            }).then((res)=>{
                this.isreal=res.data.isreal
               // console.log(res.data.data.username)
                this.username=res.data.data.username
            })
        },
   mounted(){
            sessionStorage.getItem(this.select,0)
            this.select=sessionStorage.getItem('select');
        },
  methods: {
    footRoute (index,route){
                if(index==3){
                    if(sessionStorage.getItem('token') && this.username!=undefined){
                    if(parseInt(this.isreal)==1){
                       this.$router.push({path:route}) 
                       this.select=index
                    sessionStorage.setItem('select',this.select)
                    }else if(parseInt(this.isreal)==4){
                        this.$router.push('/shiming')
                        this.$bus.$emit('toast','请先完成实名认证')
                    }else if(parseInt(this.isreal)==0){
                        this.$router.push('/ming')
                        this.$bus.$emit('toast','正在审核中')
                    }else if(parseInt(this.isreal)==3){
                      this.$router.push('/shiming')
                      this.$bus.$emit('toast','请先完成实名认证')
                    }
                  }else{
                       sessionStorage.removeItem('token')
                       this.$router.push('/login')
                       this.$bus.$emit('toast','请登录')
                  }
                }else if(index==3 && this.username==undefined){
                       sessionStorage.removeItem('token')
                       this.$router.push({path:route}) 
                }else if(index==2){
                    if(sessionStorage.getItem('token') && this.username!=undefined){
                   this.axios.post('index/apibtb/can_do',{
          token:sessionStorage.getItem('token')
      }).then((res)=>{
         if(res.data.code==200){
           this.$router.push({path:route}) 
          this.select=index
                    sessionStorage.setItem('select',this.select)
                    console.log(res)
         }else{
           this.$bus.$emit('toast',res.data.data)
         }
      })
      }else{
                        sessionStorage.removeItem('token')
                       this.$router.push('/login')
                       this.$bus.$emit('toast','请登录')
      }
                }else{
                    this.$router.push({path:route}) 
                    this.select=index
                    sessionStorage.setItem('select',this.select)
                }
      }
  }

};
</script>

<style lang="scss">
  @import '../assets/scss/common_style.scss';
  .name{
  }
  .img1{
   width:50px;
   height:45px;
  }
  #pageFoot {
    position: fixed;
    top: 100vh;
    left: 50%;
    width: 750px;
    margin-left: -375px;
    .page_foot_inner {
      position: fixed;
      bottom: 0;
      left: 0;
      width: 100%;
      height: 110px;
      background: #fff;
      border-top:1px solid #eee;
      .page_foot_nav {
        width: 20%;
        float: left;
        text-align: center;
        color: #5f5b8e;
        .page_foot_iconfont {
          font-size: 46px;
          line-height: 46px;
          padding-top: 10px;
        }
        .page_foot_name {
          font-size: 20px;
          line-height: 40px;
        }
        &.page_foot_select {
          .page_foot_iconfont {
            color: #eb1d50;
          }
          .page_foot_name {
            color: #FF8500;
          }
        }
      }
    }
  }
</style>
