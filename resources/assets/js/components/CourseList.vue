<template>
  <div class="container">
    <div class="cl-header">
      <div class="ch-LR">
        <div class="LR-top">
          <span class="before-text">現在時間</span>
          <span class="before-text">5/24 18:00</span>
        </div>

        <div class="LR-bottom">
          <button class="top-button setting"></button>
        </div>
      </div>
      <div class="ch-center">
        <div class="infro-img animated flipInX">
            <img class="circle" src="/img/test_img.jpg"/>
        </div>
        <div class="infro-name animated fadeIn">{{username}}</div>
      </div>
      <div class="ch-LR">
        <div class="LR-top">
          <span class="before-text">上次登入</span>
          <span class="before-text">5/24 18:00</span>
        </div>
        <div class="LR-bottom">
          <button class="top-button shop"></button>          
        </div>
      </div>
    </div>
    
    <div class="cl-body">
      <div class="choose-text">請選擇課程</div>
      <div class="courselist">
      <!-- 這裡開始會用到for -->
        <div class="course animated fadeInUp" v-for="c in courses">
          <div class="subject">{{c.department}}</div>
          <div class="class-name">{{c.name}}</div>
          <div class="class-time">
            <img  class="logo-time" src="/img/time.png" />
            <span class="time-text">{{c.class_time}}</span>
          </div>
        </div>

      </div>
    </div>
  </div >
</template>

<script>
export default {
  data() {
    return {
      username: localStorage.getItem('username'),
      courses: ""
    };
  },
  mounted: function() {
    let self = this;
    self.$nextTick(function() {
      axios
        .post("/courselist/getCourses")
        .then(function(rtn) {
          if (!rtn.errmsg) {
            console.log(1);
            self.courses = rtn.data.result;
            
          }
        })
        .catch(function(err) {
          console.log(err);
        });
    });
  }
};
</script>

<style>
.cl-header {
  width: 100%;
  height: 30%;
}

.cl-body {
  width: 100%;
  height: 70%;
}

.ch-LR {
  float: left;
  width: 26%;
  height: 100%;
}

.ch-center {
  float: left;
  width: 44%;
  height: 100%;
}

.infro-img {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 100%;
  height: 80%;
}

.infro-name {
  color: #34314c;
  font-weight: bold;
  text-align: center;
  font-size: 4em;
  width: 100%;
  height: 20%;
  text-shadow: 0px 4px 3px rgba(0, 0, 0, 0.4), 0px 8px 13px rgba(0, 0, 0, 0.1),
    0px 18px 23px rgba(0, 0, 0, 0.1);
}

.circle {
  width: 76%;
  height: 80%;
  border-radius: 99em;
  box-shadow: 0px 4px 3px rgba(0, 0, 0, 0.3), 0px 8px 13px rgba(0, 0, 0, 0.1),
    0px 18px 23px rgba(0, 0, 0, 0.1);
}

.LR-top {
  box-sizing: border-box;
  padding: 3%;
  padding-top: 30%;
  width: 100%;
  height: 50%;
}

.LR-bottom {
  width: 100%;
  height: 50%;
}

.before-text {
  width: 100%;
  font-size: 2.5em;
  float: left;
  text-align: center;
  margin: 3%;
  text-shadow: 2px 2px 1px #ccc;
}

.top-button {
  width: 100%;
  height: 100%;
}

.setting {
  background: transparent url(/img/setting.png) no-repeat top center;
  background-size: 50%;
  position: relative;
  left: 20%;
  top: 5%;
}

.shop {
  background: transparent url(/img/shop.png) no-repeat top center;
  background-size: 52%;
  position: relative;
  left: -10%;
  top: 5%;
}

.choose-text {
  display: flex;
  align-items: center;
  justify-content: center;
  font-weight: bold;
  width: 100%;
  height: 12%;
  color: #ff7473;
  font-size: 4.5em;
}

.courselist {
  box-sizing: border-box;
  padding: 8%;
  padding-top: 4%;
  width: 100%;
  height: 88%;
  overflow-y: scroll;
}

.course {
  box-sizing: border-box;
  padding: 3%;
  width: 100%;
  height: 16%;
  background-color: #ffc952;
  border-radius: 40px;
  box-shadow: 3px 3px 3px 2px #ccc;
  margin-bottom: 5%;
}

.subject {
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 2.7em;
  float: left;
  width: 25%;
  height: 100%;
}

.class-name {
  font-weight: bold;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 3em;
  float: left;
  width: 60%;
  height: 100%;
}

.class-time {
  font-size: 2.3em;
  display: flex;
  align-items: center;
  justify-content: center;
  float: left;
  width: 15%;
  height: 100%;
}

.logo-time {
  width: 40%;
  margin: 3%;
}

.time-text {
  text-align: center;
  line-height: 130%;
}
</style>