<template>
  <div class="container">
    <set
      v-if="isSettingOpen"
      :isSettingOpen="isSettingOpen"
      :setting="setting"
      v-on:click-okay="changePage"
    >
    </set>

    <chatroom
      v-if="isChattingOpen"
      :chatting="chatting"
      :socket="socket"
    >
    </chatroom>

    <div class="nav-bar f-c">
      <div class="nav-btn h-100" id="return" @click="return_to_pre()"></div>
      <div class="class-name h-100 f-c">〈{{courseName}}〉</div>
      <div class="nav-btn h-100" ></div>
    </div>
    <div class="waiting-header f-c animated bounceInDown">等待遊戲者...</div>
    <div class="waiting-body b-x">
      <div class="col infro-people b-x f-c animated fadeInUp">
        <span class="people f-c h-100"></span>
        <span class="current f-c h-100">{{currentPeople}}</span>
        <span class="total f-c h-100">/ 15人</span>
      </div>

      <div @click="OpenSettingPage()" class="col infro-setting b-x animated fadeInUp">
        <div class="gametype h-100">
          <div class="infro-img" :id="setting.gameID"></div>
          <div class="infro-text f-c">{{setting.gameName}}</div>
        </div>
        <div class="brain-method h-100">
          <div class="infro-img" :id="setting.brainID"></div>
          <div class="infro-text f-c" >{{setting.brainName}}</div>
        </div>
        <div class="other-setting h-100">
          <li class="set-li">時間：{{setting.time}}</li>
          <li class="set-li">分組：{{setting.group}}</li>
          <li class="set-li">題目：{{setting.topic}}</li>
        </div>
      </div>

      <div @click="OpenChattingPage()" class="col infro-chatting b-x animated fadeInUp">
          <ul class="chat-ul">
            <li v-for="t in chatting" class="chat-li">{{t.name}}:{{t.text}}</li>
          </ul>
      </div>

    </div>
    <div @click="swapToGame()" class="waiting-bottom b-x">
      <button class="go-button"></button>
    </div>
  </div>
</template>

<script>
import Setting from "./Setting";
import Chatroom from "./Chatroom";
export default {
  data() {
    return {
      socket: "",
      chatting: [],
      isSettingOpen: false,
      isChattingOpen: false,
      currentPeople: 1,
      course_id: sessionStorage.getItem("room_course_id"),
      courseName: "",
      setting: {
        gameName: "遊戲模式",
        gameID: "no-r",
        brainName: "腦力激盪技法",
        brainID: "no-g",
        time: "30分",
        group: "平均分配",
        topic: "題目未定"
      }
    };
  },
  components: {
    set: Setting,
    chatroom: Chatroom
  },
  methods: {
    return_to_pre: function() {
      if (this.isChattingOpen) this.isChattingOpen = false;
      else if (this.isSettingOpen) this.isSettingOpen = false;
      else {
        var self = this;
        this.$nextTick(function() {
          axios
            .post("/room/leave", {
              course_id: self.course_id,
              setting: JSON.stringify(self.setting)
            })
            .then(function(rtn) {
              if (!rtn.data.errmsg) {
                console.log(rtn.data);
                self.socket.emit("teacherLeave", self.course_id);
                sessionStorage.removeItem("room_course_id");
                self.$router.push({ path: "/courselist" });
              } else {
                console.log(rtn.data.errmsg);
              }
            })
            .catch(function(err) {
              console.log(err);
            });
        });        
      }
    },
    changePage: function(data) {
      this.isSettingOpen = data;
    },
    changeSetting: function(data) {
      this.isSettingOpen = data;
    },
    OpenSettingPage: function() {
      this.isSettingOpen = true;
    },
    OpenChattingPage: function() {
      this.isChattingOpen = true;
    },
    swapToGame: function() {
      var self = this;
      self.$nextTick(function() {
        axios
          .post("/room/gameStart", {
            course_id: self.course_id
          })
          .then(function(rtn) {
            if (!rtn.data.errmsg) {
              console.log(rtn.data);
              self.socket.emit("gameStart", self.course_id);  
              self.$router.push({ path: "/gameroom_sixhat" });            
            } else {
              console.log(rtn.data.errmsg);
            }
          })
          .catch(function(err) {
            console.log(err);
          });
      });      
    }
  },

  beforeCreate: function() {
    let isLogin = sessionStorage.getItem("loginAs");
    if (!isLogin) this.$router.push({ path: "/" });
  },
  mounted: function() {
    let self = this;
    self.$nextTick(function() {
      axios
        .post("/getcourse", {
          course_id: self.course_id
        })
        .then(function(rtn) {
          if (!rtn.data.errmsg) {
            self.courseName = rtn.data.result.name;
          } else {
            console.log(rtn.data.errmsg);
          }
        })
        .catch(function(err) {
          console.log(err);
        });
    });

    self.socket = require("socket.io-client")("http://localhost:6379");
    self.socket.on("connect", () => {
      console.log(self.socket.id);
      self.socket.emit("joinRoom", self.course_id);
    });
    self.socket.on("message", function(data) {
      console.log(data);
    });
    self.socket.on("updateCurrentPeople", function(data) {
      console.log("房間人數: " + data);
      self.currentPeople = data;
    });
    self.socket.on("updateChat", function(msg) {
      self.chatting.push(msg);
    });

    self.socket.on("disconnect", () => {});

    //For Test
    // let repeat = "測試";
    // for(let i=0; i<=5 ; i++){
    //   let now = new Date();
    //   let chat = {
    //     name: 'Andy',
    //     text: 'hihi,for test'+repeat,
    //     time: now.getHours()+':'+now.getMinutes()
    //   };
    //   repeat += repeat;
    //   self.chatting.push(chat);
    // };
  },
  updated: function() {
    let chatbox = this.$el.querySelector(".chat-ul");
    chatbox.scrollTop = chatbox.scrollHeight;
  },
  destroyed: function() {
    // let self = this;
    // self.$nextTick(function() {
    //   axios
    //     .post("/room/leave", {
    //       course_id: self.course_id
    //     })
    //     .then(function(rtn) {
    //       if (!rtn.data.errmsg) {
    //         console.log(rtn.data);
    //         self.socket.emit("teacherLeave", self.course_id);
    //         sessionStorage.removeItem("room_course_id");
    //       } else {
    //         console.log(rtn.data.errmsg);
    //       }
    //     })
    //     .catch(function(err) {
    //       console.log(err);
    //     });
    // });
  }
};
</script>


<style scoped>
.nav-bar {
  width: 106%;
  height: 7%;
  margin-left: -3%;
  box-shadow: 0px 2px 8px #9baec8;
  font-size: 3em;
}

.waiting-header {
  width: 100%;
  height: 12%;
  font-size: 7em;
  font-weight: bold;
  color: #ff7473;
  text-shadow: 2px 3px 4px #c03546;
}

.waiting-body {
  padding: 0% 6%;
  width: 100%;
  height: 63%;
}

.waiting-bottom {
  width: 100%;
  height: 18%;
}

.col {
  width: 100%;
  border-radius: 30px;
  box-shadow: 2px 2px 2px rgba(20%, 20%, 40%, 0.6),
    4px 4px 6px rgba(20%, 20%, 40%, 0.4);
}

.chat-ul {
  width: 100%;
  height: 100%;
  overflow-y: scroll;
}

.chat-li {
  width: 100%;
  font-size: 3em;
  margin-bottom: 1%;
  line-height: 135%;
  font-weight: bold;
  color: white;
  text-shadow: 1px 1px 5px #000, 2px 2px 5px #000;
}

.set-li {
  list-style: none;
  width: 100%;
  font-size: 2.5em;
  margin-bottom: 1%;
  line-height: 135%;
  font-weight: bold;
  color: white;
  text-shadow: 1px 1px 5px #000, 2px 2px 5px #000;
}

.infro-people {
  height: 20%;
  margin-bottom: 2%;
  background: rgba(255, 201, 82, 0.8) url(/img/room_people.png) no-repeat 5%
    100%;
  background-size: 40%;
}

.infro-setting {
  box-sizing: border-box;
  padding: 3%;
  height: 35%;
  margin-bottom: 2%;
  background: rgba(236, 115, 87, 0.8) url(/img/setting_1.png) no-repeat 94% -5%;
  background-size: 45%;
}

.infro-chatting {
  box-sizing: border-box;
  padding: 3%;
  height: 40%;
  background: rgba(117, 79, 68, 0.8) url(/img/chat.png) no-repeat 5% 120%;
  background-size: 53%;
}

.go-button {
  background: transparent url(/img/go.png) no-repeat center 15%;
  background-size: 50%;
  width: 100%;
  height: 100%;
}

.people {
  float: left;
  width: 40%;
}

.current {
  font-weight: bold;
  font-size: 7em;
  float: right;
  width: 25%;
}

.total {
  font-size: 3.5em;
  float: right;
  width: 20%;
}

.gametype {
  float: left;
  width: 25%;
  height: 90%;
  margin-top: 3%;
  border-radius: 30px 0px 0px 30px;
  background-color: rgba(253, 153, 154, 0.7);
}

.brain-method {
  float: left;
  width: 25%;
  height: 90%;
  margin-top: 3%;
  border-radius: 0px 30px 30px 0px;
  background-color: rgba(103, 213, 181, 0.7);
}

.other-setting {
  box-sizing: border-box;
  padding: 2%;
  float: left;
  width: 50%;
}

.infro-img {
  width: 100%;
  height: 60%;
}

.infro-text {
  width: 100%;
  height: 40%;
  font-size: 2.8em;
  font-weight: bold;
  text-align: center;
}

#no-r {
  background: transparent url("/img/no-r.png") no-repeat center center;
  background-size: 70%;
}

#no-g {
  background: transparent url("/img/no-g.png") no-repeat center center;
  background-size: 70%;
}

#pass {
  background: transparent url("/img/pass.png") no-repeat center center;
  background-size: 70%;
}

#sixhat {
  background: transparent url("/img/hat.png") no-repeat center center;
  background-size: 80%;
}

#stf {
  background: transparent url("/img/stf.png") no-repeat center center;
  background-size: 80%;
}

#role-play {
  background: transparent url("/img/role-play.png") no-repeat center center;
  background-size: 80%;
}

#talking {
  background: transparent url("/img/talking.png") no-repeat center center;
  background-size: 80%;
}

#passgate {
  background: transparent url("/img/passgate.png") no-repeat center center;
  background-size: 80%;
}

#groupfight {
  background: transparent url("/img/groupfight.png") no-repeat center center;
  background-size: 80%;
}

.white-bg {
  position: absolute;
  z-index: 1;
  width: 100%;
  height: 100%;
  background-color: rgba(255, 255, 255, 0.7);
}

.nav-btn {
  float: left;
  width: 12%;
}

#return {
  background: transparent url("/img/return.png") no-repeat 75% center;
  background-size: 25%;
}

.class-name {
  float: left;
  font-weight: bold;
  width: 76%;
  font-size: 1.1em;
}

.container {
  height: 100%;
}
</style>