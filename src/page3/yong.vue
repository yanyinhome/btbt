<template>
    <div id="yong">
           <div class="yong_div1" >
               <img src="../assets/image/left.png"  class="icon_img1" alt="" @click="clickBack">
            </div>
            <div class="yong_div2">
              <p class="yong_p1"><img class="yong_img1" src="../assets/image/login11.png" alt=""></p>  
              <p class="yong_p2">全球领先多元化资产服务交易平台</p>
              <p class="yong_p3">安全 · 稳定 · 可靠</p>
            </div>
            <div class="yong_div3">
                <p class="yong_p4">邀请好友</p>
                <div class="yi">
                   <p class="yong_p5">扫码分享注册好友</p>
                   <p class="yong_p5">注册邀请好友越多奖励越多！</p>
                </div>
                <!--<p class="yong_p6">
                    <img :src="'http://'+list.src_path2" alt="" class="p6_img1">
                </p>-->
               <canvas id="qrcode-canvas" ></canvas>
                <p class="yong_div4"></p>
                <div class="yong_div5">
                    <p class="yong_p9">我的BTOX邀请码</p>
                    <p class="yong_p10">{{list.ivt_code}}</p>
                </div>
                <div class="yong_div6">
                    <p class="yong_p7" @click='copy' :data-clipboard-text='list.ivt_code'>立即复制</p>
                    <p class="yong_p8" @click="savecanvas">保存分享</p>
                </div>
            </div>
    </div>
</template>
<script>
import Clipboard from 'clipboard'
import html2canvas from 'html2canvas';
import QrCode from 'qrcode'
    export default{
        data(){
            return{
                list:[]
            }
        },
        created(){
            this.axios.post('index.php/index/apiuser/fenxiang',{
                token:sessionStorage.getItem('token')
            }).then((res)=>{
                if(res.data.code==200){
               this.list=res.data.data
               var codeUrl=res.data.data.url
      var canvas = document.getElementById('qrcode-canvas');
                QrCode.toCanvas(canvas, codeUrl, function(success){
                	console.log(success)
                            })
                        }
                    }
                    )
        },
        methods:{ 
            savecanvas(){
        let canvas = document.querySelector('#yong');
        let that = this;
        html2canvas(canvas,{useCORS:true,logging:true,}).then(function(canvas) {
                let type = 'png';
                let imgData = canvas.toDataURL(type);
                  console.log(imgData)
                // 照片格式处理
                let _fixType = function(type) {
                    type = type.toLowerCase().replace(/jpg/i, 'jpeg');
                    let r = type.match(/png|jpeg|bmp|gif/)[0];
                    return 'image/' + r;
                };
                imgData = imgData.replace(_fixType(type),'image/octet-stream');
                let filename = "UUSound" + '.' + type;
                that.saveFile(imgData,filename);
        });
    },
    saveFile(data, filename){
        let save_link = document.createElementNS('http://www.w3.org/1999/xhtml', 'a');
        save_link.href = data;
        //save_link.crossOrigin = "Anonymous"
       
        save_link.download = filename;
        let event = document.createEvent('MouseEvents');
        event.initMouseEvent('click', true, false, window, 0, 0, 0, 0, 0, false, false, false, false, 0, null);
        save_link.dispatchEvent(event);
    },
            clickBack(){
                this.$router.go(-1);
            },
            copy(){
                var clipboard=new Clipboard('.yong_p7');
                clipboard.on('success',(e)=>{
                    this.$bus.$emit('toast','复制成功');
                    clipboard.destroy();
                })
            },
            downs() {
      //必须同源才能下载
      var alink = document.createElement("a");
      alink.href = '';
      alink.download = "二维码"; //图片名
      alink.click();
    },
       }
    }
</script>
<style scoped>
canvas{
    width:380px;
    height:380px;
}
#qrcode-canvas{
   
}
.yi{
    margin-top:-30px;
}
.icon_img1{
   width:3%;
   margin-top:30px;
}
    #yong{
        background:url('../assets/image/peng.png') no-repeat;
        background-size:100% 100%;
    }
    .yong_div1{
        margin-left:30px;
        padding-top:30px;
          
    }
    .yong_p1{
       width:50%; 
       margin:0 auto;
    }
    .yong_img1{
       width:100%; 
    }
   .yong_p2{
       text-align: center;
       color:#fff;
   }
    .yong_p3{
       text-align: center;
       color:#fff;
   }
   .yong_div3{
    width:80%;
    background:url('../assets/image/yaoqing.png') no-repeat;
    background-size:100%;
    margin:30px 10%;
    margin:0 auto;
    text-align:center;
    border-radius:12px;
   }
   .yong_p4{
       padding-top:30px; 
       font-size:35px;
       font-weight:bold;
   }
   .p6_img1{
       width:100%;
       height:100%;
   }
   .yong_p4{
       margin:30px 0px;
   }
   .yong_p5{
       font-size:20px;
       margin-top:-15px;
   }
   .yong_p6{
       width:400px;
       height:400px;
       background:#dddddd;
       margin:30px auto;
       margin-top:-15px;
   }
   .yong_div4{
       border-top:2px dashed #999999;
       width:92%;
       margin:0px 4%;
       margin-top:-10px;
   }
   .yong_p9{
       font-size:25px;
       color:#888888;
   }
   .yong_p10{
       font-size:60px;
       font-weight:bold;
       margin-top:20px;
   }
   .yong_div6{
       padding-bottom:55px;
       margin-top:70px;
   }
   .yong_div5{
       margin-top:25px;
   }
   .yong_p7,.yong_p8{
       display: inline-block;
       width:210px;
       height:65px;
       line-height:65px;
       background:#4792FF;
       color:#fff;
       text-align:center;
       border-radius:50px;
       font-size:25px;
   }
   .yong_p8{
       background: #FF8500;
   }
</style>

