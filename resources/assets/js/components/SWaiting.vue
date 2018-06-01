<template>
  <div class="container">

     <chatroom
      v-if="isChattingOpen"
      :chatting="chatting"
      :socket="socket">
    </chatroom>

    <div class="nav-bar f-c">
      <div class="nav-btn h-100" id="return" @click="return_to_pre()"></div>
      <div class="class-name h-100 f-c">〈{{courseName}}〉</div>
      <div class="nav-btn h-100" ></div>
    </div>
    <div class="waiting-header f-c animated bounceInDown">等待遊戲者...</div>
    <div class="waiting-body b-x">
      <div class="col infro-people b-x f-c animated fadeInUp">
        <span class="current f-c h-100">{{currentPeople}}</span>
        <span class="total f-c h-100">/ 15人</span>
      </div>

      <div @click="!isSettingOpen" class="col infro-setting b-x animated fadeInUp">
        <div class="gametype h-100">
          <div class="infro-img" id="pass"></div>
          <div class="infro-text f-c">闖關</div>
        </div>
        <div class="brain-method h-100">
          <div class="infro-img" id="sixhat"></div>
          <div class="infro-text f-c" id="toolong">六頂思考帽法</div>
        </div>
        <div class="other-setting h-100">
          <li class="set-li">各種遊戲設定rrrrrr</li>
          <li class="set-li">懶得排版惹</li>
          <li class="set-li">QQQQQQQQ</li>
          <li class="set-li">GGGGGGGG</li>
        </div>
      </div>

      <div @click="OpenChattingPage()" class="col infro-chatting b-x animated fadeInUp">
          <ul class="chat-ul">
            <li v-for="t in chatting" class="chat-li">{{t.name}}:{{t.text}}</li>
          </ul>
      </div>
    </div>
    <div class="waiting-bottom b-x">
      <button class="go-button"></button>
    </div>
  </div>
</template>

<script>
import Chatroom from "./Chatroom";
export default {
  data() {
    return {
      socket: "",
      chatting: [],
      isChattingOpen: false,
      currentPeople: 1,
      courseName: "",
      course_id: sessionStorage.getItem("room_course_id")
    };
  },
  components: {
    chatroom: Chatroom
  },
  methods: {
    return_to_pre: function() {
      if (this.isChattingOpen) this.isChattingOpen = false;
      else {
        let self = this;
        self.socket.emit("leaveRoom", self.course_id);
        sessionStorage.removeItem("room_course_id");
        self.$router.push({ path: "/courselist" });
      }
    },
    OpenChattingPage: function() {
      this.isChattingOpen = true;
    }
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
    self.socket.on("teacherLeave", function() {
      let self = this;
      self.socket.emit("leaveRoom", self.course_id);
      sessionStorage.removeItem("room_course_id");
      self.$router.push({ path: "/courseList" });
      console.log("teacher left!");
    });
    self.socket.on("gameStart", function() {
      console.log("game start");
      self.$nextTick(function() {
        axios
          .post("/room/join", {
            course_id: self.course_id
          })
          .then(function(rtn) {
            if (!rtn.data.errmsg) {
              console.log(rtn.data);
              self.$router.push({ path: "/gameroom_sixhat" });
            } else {
              console.log(rtn.data.errmsg);
            }
          })
          .catch(function(err) {
            console.log(err);
          });
      });
    });
    self.socket.on("disconnect", function() {});
  },
  updated: function() {
    let chatbox = this.$el.querySelector(".chat-ul");
    chatbox.scrollTop = chatbox.scrollHeight;
  },
  destroyed: function() {
    // let self = this;
    // self.socket.emit("leaveRoom", self.course_id);
    // sessionStorage.removeItem("room_course_id");
  }
};
</script>

<style scoped>
.nav-bar {
  width: 106%;
  height: 7%;
  margin-left: -3%;
  box-shadow: 0px 5px 8px #9baec8;
  font-size: 3em;
}

.nav-btn {
  float: left;
  width: 12%;
}

.class-name {
  float: left;
  font-weight: bold;
  width: 76%;
  font-size: 1.1em;
}

#return {
  background: transparent url("/img/return.png") no-repeat center center;
  background-size: 25%;
}

.waiting-class {
  width: 100%;
  height: 7%;
  font-size: 3em;
}

.waiting-header {
  width: 100%;
  height: 8%;
  font-size: 7em;
  font-weight: bold;
  color: #ff7473;
  text-shadow: 2px 3px 9px #c03546;
}

.waiting-body {
  padding: 3.5% 5%;
  width: 100%;
  height: 70%;
}

.waiting-bottom {
  width: 100%;
  height: 15%;
}

.col {
  width: 100%;
  border-radius: 30px;
  box-shadow: 2px 2px 2px rgba(20%, 20%, 40%, 0.6),
    4px 4px 6px rgba(20%, 20%, 40%, 0.4), 6px 6px 12px rgba(20%, 20%, 40%, 0.4);
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
  margin-bottom: 3%;
  background: rgba(255, 201, 82, 0.8) url(/img/room_people.png) no-repeat 5%
    100%;
  background-size: 40%;
}

.infro-setting {
  padding: 3%;
  height: 35%;
  margin-bottom: 3%;
  background: rgba(236, 115, 87, 0.8) url(/img/setting_1.png) no-repeat 94% -5%;
  background-size: 45%;
}

.infro-chatting {
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
  text-align: right;
  font-size: 4em;
  float: left;
  width: 40%;
}

.current {
  font-weight: bold;
  font-size: 7em;
  float: left;
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
  font-size: 4em;
  font-weight: bold;
  text-align: center;
}

#toolong {
  font-size: 2.5em;
  font-weight: bold;
}

#pass {
  background: transparent url(/img/pass.png) no-repeat center center;
  background-size: 70%;
}

#sixhat {
  background: transparent url(/img/hat.png) no-repeat center center;
  background-size: 80%;
}

.white-bg {
  position: absolute;
  z-index: 1;
  width: 100%;
  height: 100%;
  background-color: rgba(255, 255, 255, 0.7);
}
</style>