<template>
    <div id="shou">
        <com-head>搜索</com-head>
        <div class="shou_div1"></div>
        <div class="shou_div2">
            <p class="shou_p1"><img src="../assets/image/hang2.png" class="shou_img1" alt=""></p>
            <p class="shou_p2"><input type="text" placeholder="搜索货币/交易所名称" class="shou_input1"></p>
        </div>
        <p class="shou_p3">确定</p>
        <div class="shou_div3">
            <!--<p class="shou_p4">搜索历史</p>
            <div class="shou_div4">
                <p class="shou_p5">LCN</p>
                <p class="shou_p5">BTM</p>
            </div>-->
        </div>
    </div>
</template>
<script>
    export default{

    }
</script>
<style scoped>
#shou{
    background:#fff;
}
    .shou_div1{
        width:100%;
        height:100px;
        border-bottom:2px solid #eee
    }
    .shou_div2{
        float:left;
        width:75%;
        height:90px;
        line-height:90px;
        background:#F5F5F5;
        margin-left:30px;
        margin-top:20px;
        padding-left:30px;
    }
    .shou_p1{
        float:left;
        width:80px;
        height:90px;
    }
      .shou_p2{
        float:left;
    }
    .shou_img1{
        display:inline-block;
        vertical-align: middle;
    }
    .shou_input1{
        width:400px;
        height:90px;
        line-height:50px;
        background:none;
    }
    .shou_p3{
       display:inline-block;
        margin-left:30px;
        margin-top:35px;
        font-size:30px;
        color:#333333;
    }
    ::-webkit-input-placeholder{
        font-size:30px;
        color:#999999;
    }
    .shou_div3{
        clear: both;
    }
   .shou_p4{
       width:100%;
       height:80px;
       line-height:80px;
       font-size:40px;
       font-weight:bold;
       margin-left:30px;
       margin-top:50px;
       color:#333333;
   }
   .shou_div4{
       margin-top:20px;
   }
   .shou_p5{
       float:left;
       margin-left:30px;
       width:160px;
       height:80px;
       border-radius:12px;
       line-height:80px;
       text-align:center;
       background:#F5F5F5;
       color:#333333;
   }
</style>

