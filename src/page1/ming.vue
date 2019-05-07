<template>
    <div id="ming">
        <com-head>身份认证</com-head>
        <div class="ming_div1"></div>
        <div class="ming_div2">
            <p class="ming_p1"><img src="../assets/image/qing.png" class="ming_img1" alt=""></p>
            <p class="ming_p2">正在审核</p>
            <p class="ming_p3">请您稍加等候，平台工作人员正在为你通过审核</p>
        </div>
    </div>
</template>
<script>
    export default{

    }
</script>
<style scoped>
#ming{
     background:#fff;
}
.ming_div2{
    margin-top:200px;
    text-align:center;
    
}
    .ming_div1{
        width:100%;
        height:100px;
        border-bottom:2px solid #eee;
    }
    .ming_p1{
        width:80%;
        margin:0px 10%;
    }
    .ming_img1{
        width:90%;
    }
    .ming_p2{
        font-size:35px;
        font-weight:bold;
        margin-top:25px;
    }
    .ming_p3{
        color:#666666;
        font-size:26px;
        margin-top:30px;
    }
    
</style>

