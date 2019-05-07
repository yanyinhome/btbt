<template>
    <div id="shi">
        <com-head>实名认证</com-head>
         <div class="xinxi_div1"></div>
        <div class="xinxi_div2">
            <div class="xinxi_div33" v-if="shiming">
                <p class="dian">*对不起，您所上传的身份信息有误，请重新上传真实的信息！</p>
            </div>
            <div class="xinxi_div3">
              <p class="xinxi_p1">真实姓名</p>
              <p class="xinxi_p2"><input type="text" class="shi_input1" v-model="real_name" placeholder="请输入您的真实姓名"></p>
            </div>
        </div>
        <div class="xinxi_div2">
            <div class="xinxi_div3">
              <p class="xinxi_p1">身份证号</p>
              <p class="xinxi_p2"><input type="text" class="shi_input1" v-model="icdard_num" placeholder="请输入18位身份证号"></p>
            </div>
        </div>
        <div class="shi_div1">
            <p class="shi_p1">证件照片</p>
            <div class="shi_div2">
              <div class="shi_div3">
                  <div class="upload">
                    <div class="img-container">
                      <img  :src="headi" :class="[headi==''?'':'img_']" > 
                   </div>
                  <div class="file_div3"> <input   class="imginp"  name="img" id="file2" type='file' accept="image/*" @change="upload"/></div>  
                </div>
                  <div class="shi_div5" v-if="headi==''">
                    <p class="shi_p2"><img src="../assets/image/shi4.png"  alt=""></p>
                    <p class="shi_p3">身份证正面照</p>
                    <p class="shi_p4">(人像面)</p>
                  </div>
              </div>
              <div class="shi_div4">
                 <p class="shi_p5"> 
                     <img src="../assets/image/shi5.png" class="shi_pimg1" alt="">
                      本人身份证正面照片：请确保照片的内容完整并清晰可见，仅支持jpg图片格式图片大小不能超过1M。
                  </p>
              </div>
            </div>
             <div class="shi_div2">
              <div class="shi_div3">
                   <div class="upload">
                    <div class="img-container">
                     <img  :src="headi1" :class="[headi1==''?'':'img_']" > 
                   </div>
                  <div class="file_div2"><input   class="imginp"  name="img1" id="file2" type='file' accept="image/*" @change="upload1"/> </div>  
                </div>
                  <div class="shi_div22" v-if="headi1==''">
                    <p class="shi_p2"><img src="../assets/image/shi4.png" alt=""></p>
                    <p class="shi_p3">身份证反面照</p>
                    <p class="shi_p4">(人像面)</p>
                  </div>
              </div>
              <div class="shi_div4">
                 <p class="shi_p5"> 
                     <img src="../assets/image/shi5.png" class="shi_pimg1" alt="">
                     本人身份证背面照片：请确保照片的内容完整并清晰可见，身份证必须在有效期内仅支持jpg图片格式。
                  </p>
              </div>
            </div>
        </div>
        <div class="shi_div6" @click="shang">确定提交</div>
    </div>
</template>
<script>
import Exif from "exif-js";
export default {
  data() {
    return {
      real_name: "",
      icdard_num: "",
      list: [],
      headimg: "",
      headi: "",
      headi1: "",
      headimg1: "",
      imgid: "",
      imgid1: "",
      img: "",
      img1: "",
      newdata: "",
      newdata1: "",
      headerImage: "",
      headerImage1: "",
      headerImage2: "",
      picValue: "",
      picValue1: "",
      shiming: false
    };
  },
  created() {
    this.axios
      .post("index.php/index/apiuser/mine", {
        token: sessionStorage.getItem("token")
      })
      .then(res => {
        this.isreal = res.data.isreal;
        // console.log(res.data.data.username)
        this.username = res.data.data.username;
        if (sessionStorage.getItem("token") && this.username != undefined) {
          if (parseInt(this.isreal) == 3) {
            this.$router.push("/shiming");
            this.$bus.$emit("toast", "请先完成实名认证");
          } else if (parseInt(this.isreal) == 2) {
            this.$router.push("/shiming");
            this.$bus.$emit("toast", "请先完成实名认证");
            this.shiming = true;
          }
        } else {
          sessionStorage.removeItem("token");
          this.$router.push("/login");
          this.$bus.$emit("toast", "请登录");
        }
      });
  },
  methods: {
    upload1(e) {
      let files = e.target.files || e.dataTransfer.files;
      if (!files.length) return;
      this.picValue1 = files[0];
      this.imgPreview1(this.picValue1);
    },
    imgPreview1(file) {
      let self = this;
      let Orientation;
      //去获取拍照时的信息，解决拍出来的照片旋转问题
      //Exif.getData(file, function(){
      //   Orientation = Exif.getTag(this, 'Orientation');
      // });
      // 看支持不支持FileReader
      if (!file || !window.FileReader) return;
      if (/^image/.test(file.type)){
        // 创建一个reader
        let reader = new FileReader();
        // 将图片2将转成 base64 格式
        reader.readAsDataURL(file);
        // 读取成功后的回调
        reader.onloadend = function() {
          let result = this.result;
          self.headi1 = result;
          let img = new Image();
          img.src = result;
          // console.log(result)
          //判断图片是否大于100K,是就直接上传，反之压缩图片
          if (this.result.length <= 100 * 1024) {
            //self.$bus.$emit('toast','没压缩')
            self.newdata1 = this.result;
          } else {
            img.onload = function() {
              let data = self.compress1(img, Orientation);
              self.headerImage1 = data;
              self.newdata1 = data;
              // console.log(self.newdata1);
              //self.$bus.$emit('toast','已上传');
            };
          }
        };
      }
    },
    postImg1() {
      //这里写接口
    },
    compress1(img, Orientation) {
      this.$bus.$emit("toast", "上传成功");
      let canvas = document.createElement("canvas");
      let ctx = canvas.getContext("2d");
      //瓦片canvas
      let tCanvas = document.createElement("canvas");
      let tctx = tCanvas.getContext("2d");
      let initSize = img.src.length;
      let width = img.width;
      let height = img.height;
      //如果图片大于四百万像素，计算压缩比并将大小压至400万以下
      let ratio;
      if ((ratio = width * height / 4000000) > 1) {
        console.log("大于400万像素");
        ratio = Math.sqrt(ratio);
        width /= ratio;
        height /= ratio;
      } else {
        ratio = 1;
      }
      canvas.width = width;
      canvas.height = height;
      //        铺底色
      ctx.fillStyle = "#fff";
      ctx.fillRect(0, 0, canvas.width, canvas.height);
      //如果图片像素大于100万则使用瓦片绘制
      let count;
      if ((count = width * height / 1000000) > 1) {
        this.$bus.$emit("toast", "大于100万像素");
        console.log("超过100W像素");
        count = ~~(Math.sqrt(count) + 1); //计算要分成多少块瓦片
        //            计算每块瓦片的宽和高
        let nw = ~~width;
        let nh = ~~height;
        tCanvas.width = nw;
        tCanvas.height = nh;
        tctx.drawImage(img, 0, 0, nw, nh);
        ctx.drawImage(tCanvas, 0, 0, nw, nh);
      } else {
        ctx.drawImage(img, 0, 0, width, height);
      }
      //修复ios上传图片的时候 被旋转的问题
      if (Orientation != "" && Orientation != 1) {
        switch (Orientation) {
          case 6: //需要顺时针（向左）90度旋转
            this.rotateImg(img, "left", canvas);
            break;
          case 8: //需要逆时针（向右）90度旋转
            this.rotateImg(img, "right", canvas);
            break;
          case 3: //需要180度旋转
            this.rotateImg(img, "right", canvas); //转两次
            this.rotateImg(img, "right", canvas);
            break;
        }
      }
      //进行最小压缩
      let ndata = canvas.toDataURL("image/jpeg", 0.1);
      console.log("压缩前：" + initSize);
      console.log("压缩后：" + ndata.length);
      console.log(
        "压缩率：" + ~~(100 * (initSize - ndata.length) / initSize) + "%"
      );
      tCanvas.width = tCanvas.height = canvas.width = canvas.height = 0;
      //this.newdata1=ndata
      return ndata;
    },
    upload(e) {
      let files = e.target.files || e.dataTransfer.files;
      if (!files.length) return;
      this.picValue = files[0];
      this.imgPreview(this.picValue);
    },
    imgPreview(file) {
      let self = this;
      let Orientation;
      //去获取拍照时的信息，解决拍出来的照片旋转问题
      // Exif.getData(file, function(){
      //     Orientation = Exif.getTag(this, 'Orientation');
      // });
      // 看支持不支持FileReader
      if (!file || !window.FileReader) return;
      if (/^image/.test(file.type)) {
        // 创建一个reader
        let reader = new FileReader();
        // 将图片2将转成 base64 格式
        reader.readAsDataURL(file);
        // 读取成功后的回调
        reader.onloadend = function() {
          let result = this.result;
          let img = new Image();
          self.headi = result;
          img.src = result;
          //判断图片是否大于100K,是就直接上传，反之压缩图片
          //if (this.result.length <= (10 * 1024)) {
          if (this.result.length <= 100 * 1024) {
            // self.$bus.$emit('toast','没压缩')
            self.newdata = this.result;
            // console.log(self.newdata)
          } else {
            img.onload = function() {
              let data = self.compress(img, Orientation);
              self.headerImage = data;
              self.newdata = data;
              // console.log(this.newdata)
              //  self.$bus.$emit('toast','已上传');
            };
          }
          // }else {
          //   img.onload = function () {
          //     let data = self.compress(img,Orientation);
          //     self.headerImage = data;
          //       this.newdata=data
          //     self.postImg();
          //     self.$bus.$emit('toast','已上传');
          //   }
          // }
        };
      }
    },
    postImg() {
      //这里写接口
    },
    compress(img, Orientation) {
      this.$bus.$emit("toast", "上传成功");
      let canvas = document.createElement("canvas");
      let ctx = canvas.getContext("2d");
      //瓦片canvas
      let tCanvas = document.createElement("canvas");
      let tctx = tCanvas.getContext("2d");
      let initSize = img.src.length;
      let width = img.width;
      let height = img.height;
      //如果图片大于四百万像素，计算压缩比并将大小压至400万以下
      let ratio;
      if ((ratio = width * height / 4000000) > 1) {
        console.log("大于400万像素");
        ratio = Math.sqrt(ratio);
        width /= ratio;
        height /= ratio;
      } else {
        ratio = 1;
      }
      canvas.width = width;
      canvas.height = height;
      //        铺底色
      ctx.fillStyle = "#fff";
      ctx.fillRect(0, 0, canvas.width, canvas.height);
      //如果图片像素大于100万则使用瓦片绘制
      let count;
      if ((count = width * height / 1000000) > 1) {
        console.log("超过100W像素");
        count = ~~(Math.sqrt(count) + 1); //计算要分成多少块瓦片
        //            计算每块瓦片的宽和高
        let nw = ~~width;
        let nh = ~~height;
        tCanvas.width = nw;
        tCanvas.height = nh;
        tctx.drawImage(img, 0, 0, nw, nh);
        ctx.drawImage(tCanvas, 0, 0, nw, nh);
      } else {
        ctx.drawImage(img, 0, 0, width, height);
      }
      //修复ios上传图片的时候 被旋转的问题
      if (Orientation != "" && Orientation != 1) {
        switch (Orientation) {
          case 6: //需要顺时针（向左）90度旋转
            this.rotateImg(img, "left", canvas);
            break;
          case 8: //需要逆时针（向右）90度旋转
            this.rotateImg(img, "right", canvas);
            break;
          case 3: //需要180度旋转
            this.rotateImg(img, "right", canvas); //转两次
            this.rotateImg(img, "right", canvas);
            break;
        }
      }
      //进行最小压缩
      let ndata = canvas.toDataURL("image/jpeg", 0.1);
      console.log("压缩前：" + initSize);
      console.log("压缩后：" + ndata.length);
      console.log(
        "压缩率：" + ~~(100 * (initSize - ndata.length) / initSize) + "%"
      );
      tCanvas.width = tCanvas.height = canvas.width = canvas.height = 0;
      // this.newdata=ndata
      return ndata;
    },
    shangchuan1(e) {
      var self = this;
      let file = e.target.files[0]; //上传照片
      /* eslint-disable no-undef */
      let headimgurl = new FormData(); // 创建form对象
      headimgurl.append("imgurl", file); // 通过append向form对象添加数据
      headimgurl.onloadend = function() {
        let result = this.result;
        let img = new Image();
        img.src = result;
        //判断图片是否大于100K,是就直接上传，反之压缩图片
        if (this.result.length <= 100 * 1024) {
          self.headimg1 = this.result;
          self.shangchuan1(e);
        } else {
          img.onload = function() {
            let data = self.compress(img, Orientation);
            self.headimg1 = data;
            self.shangchuan1(e);
          };
        }
      };
      //console.log(formData.get("img")); // FormData私有类对象，访问不到，可以通过get判断值是否传进去
      let config = {
        emulateJSON: true,
        withCredentials: true,
        headers: { "Content-Type": "multipart/form-data" }
      };
      this.$axios
        .post(
          "http://btox.sosocnc.com/index.php/index/apiservice/doupload",
          headimgurl,
          config
        )
        .then(res => {
          if (res.data.code == 200) {
            //console.log(res)
            this.headimg1 = res.data.img;
            this.imgid1 = res.data.imgid;
            // console.log(this.imgid)
          } else if (res.data.code == 201) {
            this.$bus.$emit("toast", res.data.data);
          }
        })
        .catch(function(error) {
          console.log(error);
        });
      // this.$router.go(0);
    },
    shangchuan(e) {
      var self = this;
      let file = e.target.files[0]; //上传照片
      /* eslint-disable no-undef */
      let headimgurl = new FormData(); // 创建form对象
      headimgurl.append("imgurl", file); // 通过append向form对象添加数据
      headimgurl.onloadend = function() {
        let result = this.result;
        let img = new Image();
        img.src = result;
        //判断图片是否大于100K,是就直接上传，反之压缩图片
        if (this.result.length <= 100 * 1024) {
          self.headimg = this.result;
          self.shangchuan(e);
        } else {
          img.onload = function() {
            let data = self.compress(img, Orientation);
            self.headimg = data;
            self.shangchuan(e);
          };
        }
      };
      //console.log(formData.get("img")); // FormData私有类对象，访问不到，可以通过get判断值是否传进去
      let config = {
        emulateJSON: true,
        withCredentials: true,
        headers: { "Content-Type": "multipart/form-data" }
      };
      this.$axios
        .post(
          "http://btox.sosocnc.com/index.php/index/apiservice/doupload",
          headimgurl,
          config
        )
        .then(res => {
          if (res.data.code == 200) {
            console.log(res);
            //console.log(this.imgid)
            this.headimg = res.data.img;
            this.imgid = res.data.imgid;
          } else if (res.data.code == 201) {
            this.$bus.$emit("toast", res.data.data);
          }
        })
        .catch(function(error) {
          console.log(error);
        });
      // this.$router.go(0);
    },
    shang() {
      let reg = /^[1-9]\d{5}(18|19|([23]\d))\d{2}((0[1-9])|(10|11|12))(([0-2][1-9])|10|20|30|31)\d{3}[0-9Xx]$/;
      if (this.real_name == "") {
        this.$bus.$emit("toast", "请输入您的真实姓名");
      } else {
        if (this.icdard_num == "") {
          this.$bus.$emit("toast", "请输入您的身份证号");
        } else if (!reg.test(this.icdard_num)) {
          this.$bus.$emit("toast", "您输入的身份证号格式有误");
        } else {
          console.log(this.newdata);
          //console.log('222')
          console.log(this.newdata);
          this.axios
            .post("/index.php/index/apireal/index", {
              token: window.sessionStorage.getItem("token"),
              real_name: this.real_name,
              idcard_num: this.icdard_num,
              img: this.newdata,
              img1: this.newdata1
            })
            .then(res => {
              console.log(res);
              if (res.data.code == 200) {
                this.$bus.$emit("toast", "提交成功,请等待审核");
                this.$router.push("/ming");
              } else {
                this.$bus.$emit("toast", res.data.data);
              }
            });
        }
      }
    }
  }
};
</script>
<style type="text/css" scoped>
.xinxi_div33 {
  width: 100%;
  background: #fff;
  color: #fff;
}
.dian {
  text-align: center;
  color: red;
  font-size: 25px;
}
.shi_input1 {
  width: 550px;
  height: 120px;
  line-height: 50px;
  background: none;
  text-align: right;
}
::-webkit-input-placeholder {
  text-align: right;
}
.img-container .img_ {
  float: left;
  width: 486px;
  height: 330px;
}
.upload {
  float: left;
}
.file_div2 {
  position: absolute;
  top: 986px;
  width: 486px;
  height: 330px;
  background: transparent;
}
.file_div3 {
  position: absolute;
  top: 486px;
  width: 486px;
  height: 330px;
  background: transparent;
}
#file1 {
  height: 400px;
  opacity: 0;
}
#file2 {
  height: 400px;
  opacity: 0;
}
.file_div1 {
  position: absolute;
  top: 1486px;
  width: 486px;
  height: 330px;
  background: transparent;
}
#file {
  height: 400px;
  opacity: 0;
}
.xinxi_div1 {
  width: 100%;
  height: 110px;
}
.xinxi_div2 {
  width: 100%;
  height: 120px;
  line-height: 120px;
  background: #fff;
}
.xinxi_div3 {
  width: 92%;
  margin: 0px 4%;
  border-bottom: 2px solid #eee;
}
.xinxi_p1 {
  float: left;
}
.xinxi_p2 {
  float: right;
}
::-webkit-input-placeholder {
  font-size: 30px;
}
.shi_div1 {
  background: #fff;
  margin-top: 2px;
}
.shi_div2 {
  text-align: center;
}
.shi_p1 {
  padding-top: 30px;
  margin-left: 27px;
  font-size: 27px;
}
.shi_div3 {
  width: 65%;
  height: 330px;
  border: 1px dashed #999999;
  margin: 0 auto;
  margin-top: 50px;
}
.shi_div5,
.shi_div22,
.shi_div33 {
  background: url("../assets/image/shi1.png") no-repeat;
  background-size: cover;
  width: 90%;
  height: 280px;
  border: 1px dashed #999999;
  border-radius: 10px;
  margin: 20px 5%;
}
.shi_div22 {
  background: url("../assets/image/shi2.png") no-repeat;
}
.shi_div33 {
  background: url("../assets/image/shi3.png") no-repeat;
}
.shi_p2 {
  margin-top: 50px;
}
.shi_p3 {
  margin-top: 10px;
  color: #666666;
}
.shi_p4 {
  margin-top: 10px;
  font-size: 20px;
  color: #999999;
}
.shi_p5 {
  width: 92%;
  margin: 0 4%;
  text-align: center;
  color: #999999;
  font-size: 25px;
  margin-top: 15px;
}
.shi_div6 {
  width: 92%;
  height: 80px;
  line-height: 80px;
  text-align: center;
  font-size: 25px;
  color: #fff;
  background: #ff8500;
  margin: 30px 4%;
  border-radius: 40px;
}
.imginp {
  float: left;
  opacity: 0;
}
</style>

