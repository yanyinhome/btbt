<template>
    <div class="c2c_gua">
        <com-head>我要挂买</com-head>
        <div class="c2c_div1"></div>
        <div class="c2c_div2">
            <p class="c2c_p1"><span class="c2c_span1"></span>BTB单价：￥1.00</p>
            <p class="c2c_p1"><span class="c2c_span1"></span>买入数量：<input type="text" class="c2c_input1" placeholder="请输入您要购买的数量"></p>
            <p class="c2c_p1"><span class="c2c_span1"></span>购买总价：￥00.00</p>
        </div>
        <p class="c2c_p2">确定挂单</p>
    </div>
</template>
<style scoped>
    .c2c_div1{
        width:100%;
        height:110px;
    }
    .c2c_p1{
        width:92%;
        height:120px;
        line-height:120px;
        margin:0px 4%;
        background:#fff;
        border-top:1px solid #eee;
        border-radius:12px;
    }
    .c2c_span1{
        display:inline-block;
        width:30px;
    }
    ::-webkit-input-placeholder{
        font-size:30px;
    }
    .c2c_input1{
        width:300px;
    }
    .c2c_p2{
        width:92%;
        height:80px;
        line-height:80px;
        margin:0px 4%;
        border-radius:40px;
        text-align:center;
        margin-top:60px;
        color:#fff;
        background:#FF8500;
    }
</style>

