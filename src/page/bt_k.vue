<template>
    <div id="bt">
        <div class="bt_div1">
            <div  class="bt_div2"> 
               <p class="bt_p1" @click="handClick()"><img src="../assets/image/ci1.png"  style="width:100%;" alt=""></p>
               <p class="bt_p2">BT矿池</p>
            </div>
            <div class="bt_div3">
                <p class="bt_p3"><img style="width:100%;height:100%;" src="../assets/image/ci2.png" alt=""></p>
                <p class="bt_p4">
                    <span class="bt_span1"><img style="width:100%;" src="../assets/image/ci3.png" alt=""></span>
                    <router-link style="color:rgba(20, 122, 255, 1);" to="/btb_shifang">释放规则</router-link>
                </p>
                <p style="clear:both;width:100%;padding-top:8px;text-align:center;color:rgba(0, 28, 79, 1);">BT矿池总量</p>
                <p style="clear:both;font-size:33px;font-weight:550;width:100%;padding-top:20px;text-align:center;color:rgba(0, 28, 79, 1);">5000</p>
              <div class="bt_div4">
                <div class="bt_div5">
                    <p class="bt_p5">释放率值</p>
                    <p style="color:rgba(0, 28, 79, 1);font-weight:bold;">1%</p>
                </div>
                <div class="bt_div5">
                    <p class="bt_p5">最近释放</p>
                    <p style="color:rgba(0, 28, 79, 1);font-weight:bold;">50</p>
                </div>
                <div class="bt_div5">
                    <p class="bt_p5">释放总量</p>
                    <p style="color:rgba(0, 28, 79, 1);font-weight:bold;">500</p>
                </div>
               </div>
            </div>
        </div>
        <div class="bt2_div1">
            <p>
                <span class="bt2_span1"></span>
                <span class="bt2_span2">BT转出</span>
            </p>
            <div class="bt2_div2" >
                <p class="bt2_p1">可转出 <span style="color:rgba(255, 133, 0, 1);">500000</span> BT</p>
                <p class="bt2_p2">待释放500000 BT</p>
            </div>
            <div class="bt2_div3">
                <span class="bt2_span3">转出数量</span>
                  <input class="bt2_input1" type="text" placeholder="请输入转出数量">
                <span class="bt2_span4">BT</span>
            </div>
             <div class="bt2_div3">
                <span class="bt2_span3">转出类型</span>
                <span class="bt2_span5">产量账户</span>
            </div>
             <div class="bt2_div3">
                <span class="bt2_span3">安全密码</span>
                  <input class="bt2_input1" type="text" placeholder="请输入安全密码">
            </div>
            <div class="bt2_div4">
                立即转出
            </div>
        </div>
        <div class="bt3_div1">
            <div class="bt3_div2">
                <p class="bt3_p1"></p>
                <div class="bt3_div3">
                    <p class="bt3_p3" >BT释放转出</p>
                    <p class="bt3_p4" >2019-04-28 05:30</p>
                </div>
                <p class="bt3_p2">-5000 BTB</p>
            </div>
            <div class="bt3_div2">
                <p class="bt3_p1"></p>
                <div class="bt3_div3">
                    <p class="bt3_p3" >BT释放转出</p>
                    <p class="bt3_p4" >2019-04-28 05:30</p>
                </div>
                <p class="bt3_p2">-5000 BTB</p>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data(){
        return{
            handClick(){
                this.$router.go(-1)
            }
        }
    }
}
</script>
<style scoped>
.bt3_p3{
    color:rgba(0, 28, 79, 1)
}
.bt3_p4{
    color:rgba(155, 160, 170, 1);
    font-size:25px;
}
.bt3_p2{
    float:right;
    color:rgba(255, 133, 0, 1);
    margin-right:30px;
    margin-top:30px;
}
.bt3_div3{
    float:left;
    margin-top:20px;
    margin-left:30px;
}
.bt3_p1{
    float:left;
    background: rgba(137, 206, 102, 1);
    width:3px;
    height:50px;
    margin-top:40px;
}
.bt3_div1{
    float: left;
    width:92%;
    margin:0px 4%;
    border-radius:12px;
    margin-top:30px;
    margin-bottom: 30px;
    box-shadow: 0px 1px 10px 4px rgba(41, 93, 174, 0.1);
}
.bt3_div2{
    width:100%;
    height: 150px;
    border-bottom:1px solid rgba(239, 241, 246, 1);
}
.bt2_div4{
    float:left;
    width:92%;
    margin:0px 4%;
    text-align:center;
    height: 80px;
    line-height: 80px;
    color:#fff;
    background: rgba(255, 133, 0, 1);
    border-radius:50px;
    margin-top:60px;
}
.bt2_span4{
    float: right;
    margin-right:20px;
}
.bt2_span5{
     float: left;
     margin-left:40px;
     font-size:28px;
}
::-webkit-input-placeholder{
    font-size:28px;
    color:rgba(153, 153, 153, 1);
}
.bt2_input1{
    float: left;
    height: 90px;
    line-height: 50px;
    margin-top:5px;
    margin-left:40px; 
}
.bt2_span3{
    float:left;
    margin-left:20px;
    font-size:25px;
}
.bt2_div3{
    float:left;
    width:90%;
    height: 100px;
    line-height: 100px;
    margin:0px 5%;
    margin-top:30px;
    border-radius:4px;
    border:1px solid rgba(233, 233, 233, 1);
}
.bt2_p1{
    float:left;
    width:43%;
    height: 100px;
    line-height: 100px;
    padding-left:20px;
    font-size:25px;
    border:1px solid rgba(233, 233, 233, 1);
    border-radius:5px;
}
.bt2_p2{
    float:left;
    width:43%;
    height: 100px;
    line-height: 100px;
    padding-left:20px;
    margin-left:35px;
    font-size:25px;
    border:1px solid rgba(233, 233, 233, 1);
     border-radius:5px;
}
.bt2_div2{
    width:90%;
    margin:0px 5%;
    margin-top:22px;
    border-radius:4px;
}
.bt2_span2{
    color:rgba(0, 28, 79, 1);
    font-weight:bold;
    margin-left:20px;
    font-size:30px;
}
.bt2_span1{
    display: inline-block;
    width:11px;
    height:21px;
    background: rgba(255, 133, 0, 1);
    margin-top:35px;
}
#bt{
    background: rgba(246, 246, 246, 1);
}
.bt_div1{
    width:100%;
    height: 500px;
    background: linear-gradient(90deg, rgba(86, 195, 255, 1), rgba(68, 141, 255, 1));
}
.bt_div2{
    padding-top:30px;
}
.bt_p1{
    float:left;
    width:30px;
    margin-left:30px;
    margin-top:10px;
}
.bt_p2{
    color:#ffffff;
    margin-left:41%;
    font-size:40px;
    font-weight:500;
    margin-top:10px;
}
.bt_div3{
   position: relative;
   width:92%;
   height:480px;
   background: #ffffff;
   border-radius:20px; 
   margin:0 auto;
   margin-top:95px;
   box-shadow: 0px 10px 5px 5px rgba(41, 93, 174, 0.05);
}
.bt_p3{
    position: absolute;
    top:-65px;
    width:150px;
    height:150px;
    margin:0 auto;
    left:39%;
}
.bt_p4{
    float: right;
    margin-right:50px;
    margin-top:40px;
    font-size:30px;
}
.bt_span1{
    display: inline-block;
    width:25px;
    margin-top:3px;
}
.bt_div4{
    width:88%;
    margin:0px 6%;
    margin-top:70px;
}
.bt_div5{
    float:left;
    width:33.3%;
    text-align: center;
}
.bt_p5{
    color:rgba(155, 160, 170, 1);
    font-size:27px;
}
.bt2_div1{
    float: left;
    width:92%;
    margin:0 4%;
    margin-top:85px;
    background: rgba(255, 255, 255, 1);
    box-shadow: 0px 10px 10px 4px rgba(41, 93, 174, 0.15);
    border-radius:20px;
    padding-bottom: 40px;
}
</style>

