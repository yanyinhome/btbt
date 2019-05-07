<template>
    <div id="you">
        <com-head>修改邮箱</com-head>
        <div class="you_div1"></div>
        <div class="you_div2">
            <p class="you_p3">* 修改邮箱前请先验证原邮箱</p>
            <p class="you_p1">
               
               <input type="text" class="you_input1" placeholder="请输入原邮箱账号">
            </p>
            <p class="you_p1">
                <span class="you_span1">
                    <input type="text" placeholder="验证码" class="you_input2" >
                </span>
                <span class="you_span2">
                    获取验证码
                </span>
            </p>
        </div>
        <p class="you_p2">下一步</p>
    </div>
</template>
<script>
    export default{

    }
</script>
<style scoped>
#you{
    background:#fff;
}
    .you_div1{
        width:100%;
        height:105px; 
        border-bottom:1px solid #dddddd;  
    }
    .you_div2{

    }
    .you_p1{
        width:92%;
        height:100px;
        line-height:100px;
        margin:0 4%;
        border-bottom:1px solid #dddddd;
        font-size:28px;
        color:#999999;
    }
    .you_span2{
        float:right;
        margin-right:30px;
        color:#448DFF;
    }
    .you_input1{
       
        width:510px;
    }
    ::-webkit-input-placeholder{
        font-size:25px;
    }
    .you_p2{
        width:92%;
        height:80px;
        line-height:80px;
        text-align:center;
        color:#fff;
        font-size:25px;
        border-radius:50px;
        margin-top:40px;
        background:#CFD0D4;
        margin:60px 4%;
    }
    .you_p3{
        font-size:25px;
        color:#666666;
        margin-top:30px;
        margin-left:30px;
    }
    you_input2{
        width:300px;
    }
</style>

