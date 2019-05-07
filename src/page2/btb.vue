<template>
    <div id="jilu">
        <com-head>BTB记录</com-head>
        <div class="jilu_div1"></div>
        <div class="jilu1_div2" v-for="(item,index) in jilu" :key="index">
            <p class="jilu1_p1">{{index}}</p>
            <div class="jilu1_div3" v-for="(item1,index1) in jilu[index] " :key="index1">
                <div class="jilu1_div4">
                   <div class="jilu1_div5">
                       <p class="jilu1_p2">BTB  <span class="jilu1_span1" :class="[item1.type==2?'active7':'on7']" >{{item1.nums}}</span></p>
                       <p class="jilu1_p3">{{item1.month}} {{item1.day}}</p>
                   </div>
                   <div class="jilu1_div6">
                       <p  class="jilu1_p4">{{item1.btb_code}}</p>
                       <p class="jilu1_p5">{{item1.flag}}</p>
                   </div>
                </div>
            </div>
        </div>
        <div v-if="jilu==''" class="ji">暂无记录~</div>
    </div>
</template>
<script>
    export default{
        data(){
            return{
                jilu:[]
            }
        },
        created(){
            this.axios.post('index.php/index/apifinance/btblog',{
                token:sessionStorage.getItem('token')
            }).then((res)=>{
                if(res.data.code==200){
                    this.jilu=res.data.data
                    console.log(res);
                }else{
                    this.$bus.$emit('toast',res.data.data)
                }
            })
        },
        methods:{
         
        }
    }
</script>
<style scoped>
.ji{
    text-align:center;
    color:#DDDDDD;
    margin-top:240px;
}
.jilu1_div6{
   clear: both;

}
.active7{
color:#1B9A31;
}
.on7{
    color:#EC0000;
}
.jilu1_div5{
   padding-top:15px;
}
.jilu1_p2{
    float:left;
   }
.jilu1_p3{
    float:right;
     color:#999999;
    font-size:27px;
}
.jilu1_p4{
    float:left;
    color:#999999;
    font-size:27px;
   
}
.jilu1_p5{
    float:right;
}
.jilu1_div4{
    width:92%;
    height:140px; 
    margin:0px 4%;
}
.jilu1_div3{
    width:100%;
    background:#fff;
    border-bottom:1px solid #DDDDDD;
}
.jilu1_p1{
    width:92%;
    height:80px;
    line-height:80px;
    margin:0px 4%;
    font-size:25px;
  
}
.active{
    color:#fff;
    background:#448DFF;
}
.active1{
     background:red;
}
.active2{
     background:purple;
}
.active3{
     background:green;
}
.active4{
     background:#448DFF;
}
.active5{
     background:yellow;
}
.active6{
    background:blue;
}
.on{
    background:none;
    color:#000;
}
    .jilu_div1{
        width:100%;
        height:88px;
    }
    .jilu_div2{
        width:520px;
        height:80px;
        border-radius:60px;
        border:2px solid #448DFF;
        margin:0 auto;
        text-align:center;
    }
    .jilu_p1{
        float:left;
        width:46%;
        height:60px;
        line-height:60px;
        border-radius:50px;
        font-size:25px;
        margin-left:13px;
        margin-top:10px;
    }
    .jilu_div3{
        width:92%;
        margin:0px 4%;
    }
    .jilu_div10{
        width:92%;
        margin:0px 4%;
        margin-top:220px;
    }
    .jilu_p2{
        margin-top:20px;
        font-weight:bold;
        font-size:35px;
    }
    .jilu_div4{
        float:left;
        margin-top:30px;
        text-align:right;
    }
    .jilu_p3{
        font-size:26px;
    }
    .jilu_p4{
        color:#999999;
        font-size:20px;
    }
    .jilu_p5{
        float:left;
        width:40px;
        height:40px;
        line-height:40px;
        border-radius:50%;
       
        font-size:20px;
        color:#fff;
        text-align:center;
        margin-top:60px;
        margin-left:40px;
    }
    .jilu_div5{
        float:right;
        width:470px;
        height:85px;
        background:#fff;
        margin-top:40px;
        font-size:25px;
        padding-left:20px;
        border-radius:10px;
    }
    .jilu_p6{
        width:200px;
        margin-bottom:-15px;
        font-size:24px;
    }
    .jilu_p7{
        display:inline-block;
        color:#666666;
        font-size:20px;
        width:200px;
       
    }
    .jilu_p8{
       float:right;
       margin-top:-90px;
       margin-right:30px;
       font-size:20px;
       color:red;
       font-weight:bold;
    }
    .jilu_p88{
       float:right;
       margin-top:-50px;
       margin-right:30px;
       font-size:20px;
       color:#666666;
    }
    .jilu_div7{
        clear: both;
    }
</style>

