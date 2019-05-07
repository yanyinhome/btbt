<template>
    <div id="nei">
        <div class="nei_div1">
             <p class="iconfont icon-return" @click="clickBack"></p>
             <p class="nei_pp1">支付宝</p>
             <p class="nei_pp2">修改</p>
        </div>
        <div class="nei_div2">       
            <p class="nei_p2">
                <span class="nei_span1">支付宝</span>
                <input type="text" class="nei_input1" placeholder="请输入支付宝账号">
            </p>
             <p class="nei_p3">
                <span class="nei_span1">真实姓名</span>
                <input type="text" class="nei_input1" placeholder="请输入真实姓名">
            </p>
        </div>
    </div>
</template>
<script>
    export default{
       
    }
</script>
<style scoped>
.nei_div1{
    width:100%;
    height:100px;
    line-height:100px;
    background:#fff;
    border-bottom:1px solid #dddddd;
}
.iconfont{
    display:inline-block;
    margin-left:30px;
}
.nei_pp1{
    display:inline-block;
    margin-left:270px;
    font-weight:bold;
    font-size:35px;
}
.nei_pp2{
    float:right;
    margin-right:30px;
    font-size:25px;
}
    .nei_p1{
        width:92%;
        color:red;
        height:80px;
        line-height:40px;
        font-size:20px;
        margin:25px 4%;
    }
    .nei_div2{
        width:100%;
        background:#fff;
        margin-top:20px;
    }
    .nei_p2,.nei_p3{
        width:92%;
        height:120px;
        line-height:120px;
        margin:0px 4%;
        border-bottom:1px solid #dddddd;
    }
   .nei_p3{
       border:none;
   }
    .nei_span1{
        display:inline-block;
        width:120px;
    }
    .nei_input1{
        width:560px;
    }
    ::-webkit-input-placeholder{
        text-align:right;
        color:#999999;
    }
</style>

