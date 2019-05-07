<template>
    <div id="business">
        <p class="business_p1">BTB交易</p>
        <div class="move" v-if="hide"></div>
          <div class="nav_div1">
            <ul class="nav_ul1">
                <li v-for="(item,index) in list" :class="selected==index?'active':'on'"  :key="index" @click="handClick(index)">
                    {{item.title}}
                </li>
            </ul>
            <!--挂买-->
            <div v-if="selected==0">
                <div id="mai">
                  <div class="bt2_div3">
                    <span class="bt2_span3">BTB当前价格</span>
                    <span class="bt2_span3">{{money}}￥</span>
                    <span class="bt2_span4">可用数量 {{num}} BTB</span>
                </div>
                <div class="bt2_div2">
                    <span class="bt2_span3">挂买数量</span>
                     <input class="bt2_input1" v-model="shu" type="number" placeholder="请输入买入数量">
                    <span class="bt2_span4"> BTB</span>
                </div>
                <div class="bt2_div2">
                    <span class="bt2_span3">所需购买总价</span>
                    <span class="bt2_span3">{{money*shu}}</span>
                    <span class="bt2_span4">￥</span>
                </div>
                <div class="bt2_div2">
                    <span class="bt2_span3">安全密码</span>
                     <input class="bt2_input1"  v-model="sale_code" type="password" placeholder="请输入安全密码">
                    <span class="bt2_span4"> BTB</span>
                </div>
                 <div class="bt2_div4" @click="hand_mai">
                   立即挂买
                </div>
                <div class="mai_div1">
                    <div class="mai_div2">
                        <span class="mai_span1"></span>
                        <span class="mai_span2">市场挂卖</span>
                        <div class="mai_div3" @click="xu">
                            <span style="display:inline-block;width:15px;vertical-align:middle;"><img style="width:100%;" src="../assets/image/business1.png" alt=""></span>
                            <span>买卖须知</span>
                        </div>
                    </div>
                    <div class="mai_div4" v-if="arr1!=null||arr1!=''" v-for="(item,index) in arr1" :key="index">
                        <div class="mai_div5">
                            <p class="mai_p1">{{item.name}}</p>
                            <p style="color:rgba(102, 102, 102, 1);font-size:13px;">数量：{{item.num}} BTB</p>
                            <p style="color:rgba(102, 102, 102, 1);font-size:13px;">单价：{{item.price}}¥</p>
                        </div>
                        <div class="mai_div6">
                            <p class="mai_p2" @click="save(item)">买入</p>
                            <p style="clear:both;color:rgba(54, 150, 255, 1);padding-top:10px;">总价：{{item.money}}¥</p>
                        </div>
                    </div>
                    <div v-if="arr1==null||arr1==''" class="zan">暂无挂买订单~</div>
                </div>
            </div>
            </div>
            <!--挂卖-->
             <div v-if="selected==1">
                <div id="mai">
                  <div class="bt2_div3">
                    <span class="bt2_span3">BTB当前价格</span>
                    <span class="bt2_span3">{{money}}￥</span>
                    <span class="bt2_span4">可用数量 {{num}} BTB</span>
                </div>
                <div class="bt2_div2">
                    <span class="bt2_span3">卖出数量</span>
                     <input class="bt2_input1" v-model="shu1" type="number" placeholder="请输入卖出数量">
                    <span class="bt2_span4"> BTB</span>
                </div>
                <div class="bt2_div2">
                    <span class="bt2_span3">卖出总价</span>
                    <span class="bt2_span3">{{shu1*money}}</span>
                    <span class="bt2_span4">￥</span>
                </div>
                 <div class="bt2_div2">
                    <span class="bt2_span3">安全密码</span>
                     <input class="bt2_input1"  v-model="sale_code1" type="password" placeholder="请输入安全密码">
                    <span class="bt2_span4"> BTB</span>
                </div>
                 <div class="bt2_div4" @click="hand_mai1">
                   立即挂卖
                </div>
                <div class="mai_div1">
                    <div class="mai_div2">
                        <span class="mai_span1"></span>
                        <span class="mai_span2">市场挂买</span>
                        <div class="mai_div3" @click="xu">
                            <span style="display:inline-block;width:15px;vertical-align:middle;"><img style="width:100%;" src="../assets/image/business1.png" alt=""></span>
                            <span >买卖须知</span>
                        </div>
                    </div>
                    <div class="mai_div4" v-if="arr!=null||arr!=''"  v-for="(item,index) in arr" :key="index">
                        <div class="mai_div5">
                            <p class="mai_p1">{{item.name}}</p>
                            <p style="color:rgba(102, 102, 102, 1);font-size:13px;">数量：{{item.num}} BTB</p>
                            <p style="color:rgba(102, 102, 102, 1);font-size:13px;">单价：{{item.price}}¥</p>
                        </div>
                        <div class="mai_div6">
                            <p class="mai_p22" @click="save(item)">卖出</p>
                            <p style="clear:both;color:rgba(54, 150, 255, 1);padding-top:10px">总价：{{item.money}}¥</p>
                        </div>
                    </div>
                    <div v-if="arr==null||arr==''" class="zan">暂无挂卖订单~</div>
                </div>
            </div>
            </div>
            <!--当前订单-->
            <div v-if="selected==2" style="padding-bottom:110px;">
                  <template v-for="(item,index) in now_orderList">
                    <template v-if="item.sell_type==2">
                     <!-- <div class="dang_div1" :key="index">
                        <p class="dang_p1">
                          <span style="float:left;color:rgba(102, 102, 102, 1);margin-left:10px;">挂单时间：{{item.create_time}}</span>
                          <span style="float:right;color:rgba(236, 0, 0, 1);margin-right:10px;">挂买订单</span>
                        </p>
                        <div class="dang_div3">
                          <p class="dang_p2">
                            <span style="color:rgba(153, 153, 153, 1);">挂买单件：</span>
                            <span>{{item.price}}¥</span>
                          </p>
                          <p class="dang_p2">
                            <span style="color:rgba(153, 153, 153, 1);">挂买数量：</span>
                            <span>{{item.num}} BTB</span>
                          </p>
                          <p class="dang_p3">
                            <span style="color:rgba(153, 153, 153, 1);">所需总价：</span>
                            <span>{{item.money}}￥</span>
                          </p>
                        </div>
                        <div class="dang_div4">
                          <p class="dang_p4" style="color:rgba(255, 158, 41, 1);">交易中</p>
                          <p class="dang_p55" @click.stop="shen">申诉</p>
                          <p class="dang_p55" style="color:rgba(236, 0, 0, 1);border:1px solid rgba(236, 0, 0, 1);">上传截图</p>
                        </div>
                      </div>-->
                      <div class="dang_div1" :key="index" >
                        <p class="dang_p1">
                          <span style="float:left;color:rgba(102, 102, 102, 1);margin-left:10px;">挂单时间：{{item.create_time}}</span>
                          <span style="float:right;color:rgba(236, 0, 0, 1);margin-right:10px;">挂买订单</span>
                        </p>
                        <div class="dang_div3">
                          <p class="dang_p2">
                            <span style="color:rgba(153, 153, 153, 1);">挂买单件：</span>
                            <span>{{item.price}}¥</span>
                          </p>
                          <p class="dang_p2">
                            <span style="color:rgba(153, 153, 153, 1);">挂买数量：</span>
                            <span>{{item.num}} BTB</span>
                          </p>
                          <p class="dang_p3">
                            <span style="color:rgba(153, 153, 153, 1);">所需总价：</span>
                            <span>{{item.money}}￥</span>
                          </p>
                        </div>
                        <div class="dang_div4">
                          <p class="dang_p4">待交易</p>
                          <p class="dang_p5" @click="alert(item)">撤销挂单</p>
                        </div>
                      </div>
                     <!-- <div class="dang_div1" :key="index">
                        <p class="dang_p1">
                          <span style="float:left;color:rgba(102, 102, 102, 1);margin-left:10px;">挂单时间：{{item.create_time}}</span>
                          <span style="float:right;color:rgba(236, 0, 0, 1);margin-right:10px;">挂买订单</span>
                        </p>
                        <div class="dang_div3">
                          <p class="dang_p2">
                            <span style="color:rgba(153, 153, 153, 1);">挂买单件：</span>
                            <span>{{item.price}}¥</span>
                          </p>
                          <p class="dang_p2">
                            <span style="color:rgba(153, 153, 153, 1);">挂买数量：</span>
                            <span>{{item.num}} BTB</span>
                          </p>
                          <p class="dang_p3">
                            <span style="color:rgba(153, 153, 153, 1);">所需总价：</span>
                            <span>{{item.money}}￥</span>
                          </p>
                        </div>
                        <div class="dang_div4">
                          <p class="dang_p4" style="color:rgba(255, 158, 41, 1);">待确认</p>
                          <p class="dang_p55" @click.stop="shen">申诉</p>
                          <p class="dang_p55">查看截图</p>
                        </div>
                      </div>-->
                    </template>
                    <template v-if="item.sell_type==1">
                     <!-- <div class="dang_div1" :key="index">
                        <p class="dang_p1">
                          <span style="float:left;color:rgba(102, 102, 102, 1);margin-left:10px;">挂单时间：{{item.create_time}}</span>
                          <span style="float:right;color:rgba(236, 0, 0, 1);margin-right:10px;">挂卖订单</span>
                        </p>
                        <div class="dang_div3">
                          <p class="dang_p2">
                            <span style="color:rgba(153, 153, 153, 1);">挂卖单件：</span>
                            <span>{{item.price}}¥</span>
                          </p>
                          <p class="dang_p2">
                            <span style="color:rgba(153, 153, 153, 1);">挂卖数量：</span>
                            <span>{{item.num}} BTB</span>
                          </p>
                          <p class="dang_p3">
                            <span style="color:rgba(153, 153, 153, 1);">所需总价：</span>
                            <span>{{item.money}}￥</span>
                          </p>
                        </div>
                        <div class="dang_div4">
                          <p class="dang_p4" style="color:rgba(255, 158, 41, 1);">交易中</p>
                          <p class="dang_p55" @click.stop="shen">申诉</p>
                          <p class="dang_p55" style="color:rgba(236, 0, 0, 1);border:1px solid rgba(236, 0, 0, 1);">上传截图</p>
                        </div>
                      </div>-->
                      <div class="dang_div1" :key="index" >
                        <p class="dang_p1">
                          <span style="float:left;color:rgba(102, 102, 102, 1);margin-left:10px;">挂单时间：{{item.create_time}}</span>
                          <span style="float:right;color:rgba(68, 141, 255, 1);margin-right:10px;">挂卖订单</span>
                        </p>
                        <div class="dang_div3">
                          <p class="dang_p2">
                            <span style="color:rgba(153, 153, 153, 1);">挂卖单件：</span>
                            <span>{{item.price}}¥</span>
                          </p>
                          <p class="dang_p2">
                            <span style="color:rgba(153, 153, 153, 1);">挂卖数量：</span>
                            <span>{{item.num}} BTB</span>
                          </p>
                          <p class="dang_p3">
                            <span style="color:rgba(153, 153, 153, 1);">所需总价：</span>
                            <span>{{item.money}}￥</span>
                          </p>
                        </div>
                        <div class="dang_div4">
                          <p class="dang_p4">待交易</p>
                          <p class="dang_p5" @click="alert(item)">撤销挂单</p>
                        </div>
                      </div>
                      <!--<div class="dang_div1" :key="index">
                        <p class="dang_p1">
                          <span style="float:left;color:rgba(102, 102, 102, 1);margin-left:10px;">挂单时间：{{item.create_time}}</span>
                          <span style="float:right;color:rgba(68, 141, 255, 1);margin-right:10px;">挂卖订单</span>
                        </p>
                        <div class="dang_div3">
                          <p class="dang_p2">
                            <span style="color:rgba(153, 153, 153, 1);">挂卖单价：</span>
                            <span>{{item.price}}¥</span>
                          </p>
                          <p class="dang_p2">
                            <span style="color:rgba(153, 153, 153, 1);">挂卖数量：</span>
                            <span>{{item.num}} BTB</span>
                          </p>
                          <p class="dang_p3">
                            <span style="color:rgba(153, 153, 153, 1);">所需总价：</span>
                            <span>{{item.money}}￥</span>
                          </p>
                        </div>
                        <div class="dang_div4">
                          <p class="dang_p4" style="color:rgba(255, 158, 41, 1);">待确认</p>
                          <p class="dang_p55" @click.stop="shen">申诉</p>
                          <p class="dang_p55">查看截图</p>
                        </div>
                      </div>-->
                    </template>
                  </template>
            </div>
             <!--历史订单-->
            <div style="padding-bottom:110px;" v-if="selected==3">
              <template v-for="(item,index) in history_orderList">
                <div class="dang_div1" :key="index" @click="mairu(item)" v-if="item.selltype==2">
                  <p class="dang_p1">
                    <span style="float:left;color:rgba(102, 102, 102, 1);margin-left:10px;">挂单时间：{{item.create_time}}</span>
                    <span style="float:right;color:rgba(236, 0, 0, 1);margin-right:10px;">挂买订单</span>
                  </p>
                  <div class="dang_div3">
                    <p class="dang_p2">
                      <span style="color:rgba(153, 153, 153, 1);">挂买单件：</span>
                      <span>{{item.price}}¥</span>
                    </p>
                    <p class="dang_p2">
                      <span style="color:rgba(153, 153, 153, 1);">挂买数量：</span>
                      <span>{{item.num}} BTB</span>
                    </p>
                    <p class="dang_p3">
                      <span style="color:rgba(153, 153, 153, 1);">所需总价：</span>
                      <span>{{item.money}}￥</span>
                    </p>
                  </div>
                  <div class="dang_div4">
                    <p class="dang_p4" style="color:rgba(201, 51, 0, 1);">{{item.status_name}}</p>
                    <p class="dang_p55" @click.stop="shen(item)">申诉</p>
                    <p class="dang_p55" @click.stop="mairu(item)" v-if="item.status==1">上传截图</p>
                    <p class="dang_p55" @click.stop="mairu(item)" v-if="item.status==2||item.status==3">查看截图</p>
                  </div>
                </div>
                <div class="dang_div1" :key="index" @click="marichu" v-if="item.selltype==1">
                  <p class="dang_p1">
                    <span style="float:left;color:rgba(102, 102, 102, 1);margin-left:10px;">挂单时间：{{item.create_time}}</span>
                    <span style="float:right;color:rgba(68, 141, 255, 1);margin-right:10px;">挂卖订单</span>
                  </p>
                  <div class="dang_div3">
                    <p class="dang_p2">
                      <span style="color:rgba(153, 153, 153, 1);">挂卖单件：</span>
                      <span>{{item.price}}¥</span>
                    </p>
                    <p class="dang_p2">
                      <span style="color:rgba(153, 153, 153, 1);">挂卖数量：</span>
                      <span>{{item.num}} BTB</span>
                    </p>
                    <p class="dang_p3">
                      <span style="color:rgba(153, 153, 153, 1);">所需总价：</span>
                      <span>{{item.money}}￥</span>
                    </p>
                  </div>
                  <div class="dang_div4">
                    <p class="dang_p4" style="color:rgba(201, 51, 0, 1);">{{item.status_name}}</p>
                    <p class="dang_p55" @click.stop="shen(item)">申诉</p>
                    <p class="dang_p55" @click.stop="" v-if="item.status==1">等待上传</p>
                    <p class="dang_p55" @click.stop="" v-if="item.status==2">审核截图</p>
                    <p class="dang_p55" @click.stop="" v-if="item.status==3">查看截图</p>
                  </div>
                </div>
              </template>
            </div>
             <!--申诉订单-->
            <div v-if="selected==4">
                <div class="dang_div11" >
                        <p class="dang_p1">
                            <span style="float:left;color:rgba(102, 102, 102, 1);margin-left:10px;">挂单时间：2018-09-29 09:30:25</span>
                            <span style="float:right;color:rgba(236, 0, 0, 1);margin-right:10px;">挂买订单</span>
                        </p>
                        <div class="dang_div3">
                            <p class="dang_p2">
                                <span style="color:rgba(153, 153, 153, 1);">挂买单件：</span>
                                <span>1.00¥</span>
                             </p>
                             <p class="dang_p2">
                                <span style="color:rgba(153, 153, 153, 1);">挂买数量：</span>
                                <span>5000 BTB</span>
                             </p>
                             <p class="dang_p3">
                                <span style="color:rgba(153, 153, 153, 1);">所需总价：</span>
                                <span>5000.00￥</span>
                             </p>
                        </div>
                        <div class="dang_div44">
                           订单申诉已提交，请耐心等待，平台将尽快为您处理！
                        </div>
                </div>
                 <div class="dang_div11" >
                        <p class="dang_p1">
                            <span style="float:left;color:rgba(102, 102, 102, 1);margin-left:10px;">挂单时间：2018-09-29 09:30:25</span>
                            <span style="float:right;color:rgba(68, 141, 255, 1);margin-right:10px;">挂卖订单</span>
                        </p>
                        <div class="dang_div3">
                             <p class="dang_p2">
                                <span style="color:rgba(153, 153, 153, 1);">挂买单件：</span>
                                <span>1.00¥</span>
                             </p>
                             <p class="dang_p2">
                                <span style="color:rgba(153, 153, 153, 1);">挂买数量：</span>
                                <span>5000 BTB</span>
                             </p>
                             <p class="dang_p3">
                                <span style="color:rgba(153, 153, 153, 1);">所需总价：</span>
                                <span>5000.00￥</span>
                             </p>
                        </div>
                        <div class="dang_div44">
                          订单申诉已提交，请耐心等待，平台将尽快为您处理！
                        </div>
                </div>
            </div>
            <!--弹框-->
            <div class="alert" v-if="hide">
                <p class="alert_p1">确认取消订单</p>
                <p class="alert_p2">取消订单后您的挂单数额将返回到您的BTB余额中</p>
                <div class="alert_div1">
                    <p class="alert_p3" @click="quxiao">取消</p>
                    <p class="alert_p4" @click="que()">确定</p>
                </div>
            </div>
        </div>
        <com-foot></com-foot>
      <!--密码弹出框-->
      <div class="passWord_box" v-if="password_box.show">
        <div class="Toptitle">输入6位数字支付密码</div>
        <div class='from-tab dfco'>
          <div class='content' @click='Tap'>
            <div v-for="index in password_box.Length" :key="index">
              <input class='iptbox' :value="password_box.Value.length>=index?password_box.Value[index-1]:''" disabled  type="password">
            </div>
            <input name="password" type="text" v-model="password_box.Value" class='ipt' ref="input_val" :maxlength="password_box.Length" @input="Focus">
          </div>
          <button class="btn-area" type='primary' @click="submit">
            确定
          </button>
        </div>
      </div>
    </div>
</template>
<script>
export default {
  data(){
      return{
          password_box:{
            show:false,//密码框显示隐藏
            Length: 6, //输入框个数
            isFocus: true, //聚焦
            Value: "", //输入的内容
            ispassword: true, //是否密文显示 true为密文， false为明文。
            disabled: true,
          },
          orderTempData:{},
          selected:0,
          hide:false,
          sale_code:'',
          arr:[],
          arr1:[],
          sale_code1:"",
          shu:'',
          shu1:"",
          money:"",
          shu1:'',
          num:"",
          history_orderList:[],
          now_orderList:[],
          afterSale_orderList:[],
          list:[
              {
                  title:'挂买'
              },
              {
                  title:'挂卖'
              },{
                  title:'当前订单'
              },{
                  title:'历史订单'
              },{
                  title:'申诉订单'
              }
          ]
      }
  },
  created(){
      this.axios.post('index/apibtb/index',{
          token:sessionStorage.getItem('token')
      }).then((res)=>{
          console.log(res,"creat")
          this.arr=res.data.data.buy
          this.arr1=res.data.data.sell
      })
      this.axios.post('index/apibtb/can_do',{
          token:sessionStorage.getItem('token')
      }).then((res)=>{
         //console.log(res)
         if(res.data.code==200){
             this.axios.post('index/apibtb/mybuy',{
                 token:sessionStorage.getItem('token'),
                 type:1
             }).then((res)=>{
                 console.log(res)
                 this.money=res.data.data.price
                 this.num=res.data.data.num
             })
         }
      })
  },
  methods:{
    Focus(e) {
      console.log(this.password_box.Value);
      let ilen = this.password_box.Value.length;
      if (ilen == 6) {
       this.password_box.disabled=false;
      } else {
        this.password_box.disabled=true;
      }
    },
    Tap() {
      console.log("tab")
      this.$refs.input_val.focus();
    },
      //存储订单信息
    save(item){
      this.orderTempData=item;
      console.log(item)
      this.password_box.show=true;
    },
      //提交
    submit(){
      this.market(this.orderTempData,this.password_box.Value)
    },
      //市场挂买挂卖
      market(item,pass){
        let token=sessionStorage.getItem('token');
        console.log(item,pass)
        if(this.selected==0){
         let sell_id=item.sell_id;
          this.axios.post('index/apibtb/buybtb',{
            token:token,sell_id:sell_id,sale_code:pass
          }).then(
            res=>{
              if(res.data.code==200){
                this.$bus.$emit('toast',res.data.msg);
                this.password_box.show=false;
                this.selected=3;
              }else {
                this.$bus.$emit("toast",res.data.msg)
              }
            }
          )
        }
        if(this.selected==1){
          let buy_id=item.buy_id;
          this.axios.post('index/apibtb/sellbtb',{
            token:token,buy_id:buy_id,sale_code:pass
          }).then(
            res=>{
              if(res.data.code==200){
                this.$bus.$emit('toast',res.data.msg)
                this.password_box.show=false;
                this.selected=3;
              }else {
                this.$bus.$emit("toast",res.data.msg)
              }
            }
          )
        }
    },
      //当前订单视图
      get_ordersList(){
        let token=sessionStorage.getItem('token');
        this.axios.post("index/apibtb/myordering",{token:token}).then(
          res=>{
            if(res.data.code==200){
              this.now_orderList=res.data.data;
            }else if (res.data.code==205){
              this.now_orderList=[]
            } else {
              this.$bus.$emit("toast",res.data.msg)
            };
          }
        )
      },
      //历史订单视图
        get_lastOrdersList(){
          let token=sessionStorage.getItem('token');
          this.axios.post("index/apibtb/lastorder",{token:token}).then(
            res=>{
              if(res.data.code==200){
                this.history_orderList=res.data.data;
              }else if (res.data.code==205){
                this.history_orderList=[]
              } else {
                this.$bus.$emit("toast",res.data.msg)
              };
            }
          )
        },
      //投诉订单列表
    get_AfterSaleOrdersList(){
      let token=sessionStorage.getItem('token');
      this.axios.post("index/apibtb/tsorder",{token:token}).then(
        res=>{
          console.log(res,"get_afersale")
          if(res.data.code==200){
            this.afterSale_orderList=res.data.data;
          }else if (res.data.code==205){
            this.afterSale_orderList=[]
          } else {
            this.$bus.$emit("toast",res.data.msg)
          };
        }
      )
    },
      //撤销挂单
      cancleOrder(order){
          let order_type=order.sell_type;
          let token=sessionStorage.getItem('token');
          // sell_type 1 为卖 2为买
          if(order_type==2){
            let type=1;
            // 1 买入订单 2 卖出订单
            let order_id=order.buy_id;
            this.axios.post('index/apibtb/cancel',{token:token,type:type,order_id:order_id})
              .then(
                res=>{
                 if(res.data.code==200){
                   this.$bus.$emit('toast',res.data.msg)
                   this.get_ordersList()
                 }else {
                   this.$bus.$emit('toast',res.data.msg)
                 }
                }
              )
          }
        if(order_type==1){
          let type=2;
          // 1 买入订单 2 卖出订单
          let order_id=order.sell_id;
          this.axios.post('index/apibtb/cancel',{token:token,type:type,order_id:order_id})
            .then(
              res=>{
                if(res.data.code==200){
                  this.$bus.$emit('toast',res.data.msg)
                  this.get_ordersList()
                }else {
                  this.$bus.$emit('toast',res.data.msg)
                }
              }
            )
        }
      },
      hand_mai(){
          if(this.shu==''){
              this.$bus.$emit('toast','请输入买入数量！')
          }else if(this.sale_code==''){
              this.$bus.$emit('toast','请输入安全密码！')
          }else{
          this.axios.post('index/apibtb/dobuy',{
              token:sessionStorage.getItem('token'),
              type:1,
              num:this.shu,
              sale_code:this.sale_code
          }).then((res)=>{
             // console.log(res)
              if(res.data.code==200){
                    this.shu1=""
                   this.sale_code=""
                   this.$bus.$emit('toast',res.data.data)
                  this.selected=2
                this.get_ordersList()
              }else if(res.data.code==201){
                   this.$bus.$emit('toast',res.data.data)
              }
          })
           }
      },
       hand_mai1(){
          if(this.shu1==''){
              this.$bus.$emit('toast','请输入买入数量！')
          }else if(this.sale_code1==''){
              this.$bus.$emit('toast','请输入安全密码！')
          }else{
          this.axios.post('index/apibtb/dobuy',{
              token:sessionStorage.getItem('token'),
              type:2,
              num:this.shu1,
              sale_code:this.sale_code1
          }).then((res)=>{
             // console.log(res)
              if(res.data.code==200){
                  this.shu1=""
                  this.sale_code=""
                   this.$bus.$emit('toast',res.data.data)
                  this.selected=2
                this.get_ordersList()
              }else if(res.data.code==201){
                   this.$bus.$emit('toast',res.data.data)
              }
          })
           }
      },
      xu(){
          this.$router.push('/btb_xu')
      },
      quxiao(){
          this.hide=false;
      },
      que(){
          this.hide=false;
          this.cancleOrder(this.orderTempData)
      },
      alert(data){
          this.hide=true;
          this.orderTempData=data;
          console.log(data,1)
      },
      handClick(index){
        this.selected=index
          if(index==1){
              this.axios.post('index/apibtb/can_do',{
          token:sessionStorage.getItem('token')
      }).then((res)=>{
         //console.log(res)
         if(res.data.code==200){
             this.axios.post('index/apibtb/mybuy',{
                 token:sessionStorage.getItem('token'),
                 type:2
             }).then((res)=>{
                 console.log(res)
                 this.money=res.data.data.price
                 this.num=res.data.data.num
             })
         }
      })
          }else if(index==2){
            this.get_ordersList()
          }else  if(index==3){
            this.get_lastOrdersList()
          }
      },
      marichu(){
        this.$router.push({path:'/btb_maichu',query:{order_id:item.order_id,order:2,type:2}})
      },
        mairu(){
          this.$router.push({path:'/btb_mairu',query:{order_id:item.order_id,order:2,type:1}})
      },
      shen(item){
          this.$router.push({path:'/btb_tousu',query:{id:item.order_id,order:2}})
      }
  }
}
</script>
<style scoped>
.zan{
    width:100%;
    text-align: center;
    color:#666666;
    margin-top:55px;
}
.alert_p3{
    float: left;
    width:49.5%;
    height:100px;
    line-height: 100px;
    text-align: center;
    border-right:1px solid rgba(63, 63, 63, 0.7);
}
.alert_p4{
    float: right;
    width:50%;
    height:100px;
    line-height: 100px;
    text-align: center;
}
.alert_div1{
    width:100%;
    color:rgba(0, 122, 255, 1);
    height:100px;
    line-height: 100px;
    margin-top:25px;
    border-top:1px solid rgba(63, 63, 63, 0.7);
}
.alert_p2{
    width:84%;
    margin:0px 8%;
    text-align: center;
    font-size:26px;
    margin-top:10px;
    line-height: 40px;
}
.alert_p1{
    width:100%;
    text-align: center;
    font-weight: bold;
    margin-top:25px;
}
.alert{
    position: absolute;
    top:25%;
    width:72%;
    height:290px;
    margin:0px 14%;
    z-index:101;
    background:rgba(248, 248, 248,1);
    border-radius:30px;
}
.move{
    width:100%;
    height: 100%;
    position: absolute;
    top:0;
    left:0;
    right:0;
    bottom: 0;
    background: #000000;
    opacity: .4;
    z-index: 100;
}
.dang_div44{
    font-size:25px;
    margin-top:20px;
    margin-left:20px;
}
.dang_p4{
    float: left;
    margin-left: 20px;
    color:rgba(255, 158, 41, 1);
    margin-top:30px;
}
.dang_p55{
     float: right;
    width:205px;
    height: 60px;
    line-height: 60px;
    border-radius: 10px;
    margin-top:25px;
    font-size:25px;
    text-align: center;
    margin-right: 20px;
    color:rgba(102, 102, 102, 1);
    border:1px solid rgba(102, 102, 102, 1);
}
.dang_p5{
    float: right;
    width:185px;
    height: 60px;
    line-height: 60px;
    border-radius: 10px;
    margin-top:30px;
    font-size:25px;
    text-align: center;
    margin-right: 20px;
    color:rgba(102, 102, 102, 1);
    border:1px solid rgba(102, 102, 102, 1);
}
.dang_p2{
    margin-left:20px;
    margin-top:5px;
}
.dang_p3{
    margin-left:20px;
}
.dang_div3{
    width:100%;
    height:170px;
    font-size:28px;
    border-bottom: 1px solid rgba(233, 233, 233, 1);
}
.dang_p1{
    width:100%;
    height:80px;
    font-size:25px;
    line-height: 80px;
    border-bottom: 1px solid rgba(233, 233, 233, 1);
}
.dang_div2{
    width:94%;
    margin:0 3%;
    font-size:25px;
}
.dang_div1{
    width:92%;
    height: 360px;
    margin:0 4%;
    margin-top:25px;
    background: #ffffff;
    box-shadow: 0px 0px 5px 5px rgba(9, 21, 41, 0.05);
}
.dang_div11{
    width:92%;
    height: 330px;
    margin:0 4%;
    margin-top:25px;
    background: #ffffff;
    box-shadow: 0px 0px 5px 5px rgba(9, 21, 41, 0.05);
}
.mai_p2{
    float: right;
width:150px;
height:65px;
line-height: 65px;
font-size:28px;
background: rgba(236, 0, 0, 1);
border-radius:8px;
color:#ffffff;
text-align: center;
}
.mai_p22{
    float: right;
width:150px;
height:65px;
line-height: 65px;
font-size:28px;
background: rgba(68, 141, 255, 1);
border-radius:8px;
color:#ffffff;
text-align: center;
}
.mai_p1{
    color:rgba(0, 0, 0, 1);
}
.mai_div5{
    float: left;
    margin-top:25px;
}
.mai_div6{
    float:right;
    margin-top:45px;
}
.mai_div4{
    float:left;
    width:92%;
    margin:0px 4%;
    height: 220px;
    border-bottom: 1px solid rgba(246, 246, 246, 1);
}
.mai_div1{
    float:left;
   width:100%;
   border-top:20px solid rgba(246, 246, 246, 1);
   padding-bottom:120px;
}
.mai_span2{
    margin-left:30px;
    font-weight: bold;
    font-size:30px;
}
.mai_div2{
    width:100%;
    height: 100px;
    line-height: 100px;
    border-bottom: 1px solid rgba(221, 221, 221, 1);
}
.mai_div3{
    float:right;
    color:rgba(20, 122, 255, 1);
    margin-right:30px;
}
.mai_span1{
    display: inline-block;
    width:10px;
    height:20px;
    background: rgba(255, 133, 0, 1);
    margin-top:35px;
}
::-webkit-input-placeholder{
    font-size:28px;
    color:rgba(153, 153, 153, 1);
}
.active{
    color:rgba(255, 133, 0, 1);
    border-bottom: 3px solid rgba(255, 133, 0, 1);
}
.on{
    color:#666666;
}
#business{
    background:#ffffff;
}
.business_p1{
    width:100%;
    height: 100px;
    line-height: 100px;
    border-bottom: 1px solid rgba(0, 0, 0, 0.3);
    text-align:center;
    font-weight:600;
    font-size:40px;
}
.nav_ul1{
    width:100%;
    height:120px;
    line-height:120px;
    font-size:25px;
    background: #ffffff;
    border-bottom: 3px solid rgba(233, 233, 233, 1);
}
.nav_ul1>li{
    float:left;
    width:20%;
    text-align: center;
}
.bt2_span3{
    float:left;
    margin-left:30px;
    font-size:25px;
}
.bt2_div3,.bt2_div2{
    float:left;
    width:90%;
    height: 100px;
    line-height: 100px;
    margin:0px 5%;
    margin-top:50px;
    color:rgba(0, 0, 0, 1);
    border-radius:8px;
    border:1px solid rgba(233, 233, 233, 1);
}
.bt2_div2{
     margin-top:30px;
}
.bt2_input1{
    float: left;
    height: 90px;
    line-height: 50px;
    margin-top:5px;
    margin-left:30px;
}
.bt2_span4{
    float: right;
    margin-right:20px;
    font-size:25px;
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
    margin-top:40px;
    margin-bottom: 40px;
}
/*弹出框*/
.passWord_box{
  position: fixed;
  width: 100%;
  height: 100%;
  background: rgba(255,255,255,1);
  top: 0;
  left: 0;
  box-sizing: border-box;
}
.Toptitle{
  text-align: center;
  margin: 1.5rem auto 2rem;
  font-size: 0.4rem;
  font-weight: 600;
}
.content{
  width: 100%;
  padding:0 30px;
  display: flex;
  justify-content: space-around;
  align-items: center;
  box-sizing: border-box;
}

.iptbox{
  width: 0.85rem;
  height: 0.85rem;
  border:1px solid #888;
  box-sizing: border-box;
  display: flex;
  justify-content: center;
  align-items: center;
  text-align: center;
  margin-right:-1px;
  margin-left: -1px;
}
.ipt{
  width: 0;
  height: 0;
}
.from-tab{
  text-align: center;
}
.remtip{
  text-align: center;
  font-size:26rem;
  color: #888;
  margin: 0rem auto 80rem;
}
.btn-area{
  width:90%;
  height:0.85rem;
  background:rgba(255,122,1,1);
  border-radius:0.4rem;
  margin-top: 1rem;
}
button[disabled][type=primary] {
  background:rgba(255,122,1,1);
}
button[type=primary] {
  background:rgba(255,122,1,1);
}
</style>

