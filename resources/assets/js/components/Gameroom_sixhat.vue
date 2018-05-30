<template>
  <div class="container">
    <div class="header my-3">
        <div class="d-flex flex-row justify-content-between  align-items-center">
            <div class="">
                <div class="d-flex flex-row align-items-center ml-1">
                    <img class="icon-4" src="/img/clock.png">   
                    <p class="ml-1 time">08:44</p>
                </div>       
            </div>        
            <div class="mode h-100">
                <span class="badge badge-warning">六頂帽子</span>
                <span class="badge badge-warning">團隊</span>
            </div>
            <div class="">
                <img class="icon-4" src="/img/setting.png">
            </div>  
        </div>
    </div>
    <div class="alert alert-primary w-75 mx-auto text-center" >
       熊貓是熊還是貓 
    </div>
    <div class="card mt-1 mb-4 answer-group">
        <div class="card-body">
        </div>
    </div>
    
    <div class="d-flex flex-row  align-items-end align-items-center">
        <div class="">
            <img class="icon-4" src="/img/cat.png" alt="">
        </div>

            <div class="inputbox">
            <textarea @click="resetText()"  v-model="input_text" class="input h-100 f-c"></textarea>
            </div>

            <div class="sendbox">
            <div @click="sendMyText()"class="sent-btn"></div>
            </div>
    </div>
    
 </div>
 
</template>

<script>
export default {
  props: ["chatting"],
  data() {
    return {
      input_text: "輸入想要傳送的訊息吧！"
    };
  },
  methods: {
    resetText: function() {
      if (this.input_text == "輸入想要傳送的訊息吧！") {
        this.input_text = "";
      }
    },
    sendMyText: function() {
      let now = new Date();
      let chat = {
        name: "Andy",
        text: this.input_text,
        time:
          now.getHours() +
          ":" +
          (now.getMinutes() < 10 ? "0" : "") +
          now.getMinutes()
      };
      this.chatting.push(chat);
      this.input_text = "";
    }
  }
};
</script>

<style scoped>
.container {
  position: fixed;
  overflow: hidden;
  padding: 0% 3%;
  width: 100%;
  height: 100%;
  background: transparent url("/img/bg-img.png") no-repeat center;
  background-size: 90%;
}

.icon-4 {
  height: 4em;
  width: 4em;
}

.header {
  height: 4em;
}

.mode {
  font-size: 1.5em;
}

.answer-group {
  height: 20em;
  background-color: #f9edbd;
  box-shadow: 4px 4px 20px 1px rgba(182, 182, 206, 0.5);
  margin-left: 3em;
  margin-right: 3em;
  padding: 0.5em;
}

.chatting-page {
  position: absolute;
  top: 7%;
  left: 0%;
  z-index: 99;
  width: 100%;
  height: 93%;
  padding: 0% 5%;
  background: rgba(255, 255, 255, 0.9);
}

.chatting-content {
  box-sizing: border-box;
  padding: 2%;
  width: 100%;
  height: 70%;
  overflow-y: scroll;
}

.chatting-title {
  width: 100%;
  height: 15%;
  font-size: 6em;
  text-align: center;
  font-weight: bold;
  color: #754f44;
  background: transparent url("/img/setting_title.png") no-repeat center center;
  background-size: 70%;
  text-shadow: 2px 2px 1px #34314c;
}

.chatting-bottom {
  box-sizing: border-box;
  padding: 3%;
  width: 100%;
  height: 15%;
}

.inputbox {
  width: 78%;
  background-color: #fff1b9;
  border-radius: 20px;
  box-shadow: 3px 3px 7px #f94e3f;
  margin-right: 2%;
}

.input {
  box-sizing: border-box;
  padding: 3%;
  width: 100%;
  outline: none;
  border: none;
  background: transparent;
  font-size: 2.2em;
}

.sendbox {
  width: 20%;
}

.sent-btn {
  width: 4em;
  height: 4em;
  border-radius: 99em;
  background: #ff7473 url(/img/send-button.png) no-repeat center center;
  box-shadow: 3px 3px 7px #a6172d;
  background-size: 50%;
}

.myself-message,
.others-message {
  box-sizing: border-box;
  padding: 1.5%;
  position: relative;
  left: 0;
  width: 97%;
  min-height: 10%;
  animation: fadeIn 1s;
}

.myself-message .image,
.others-message .image {
  float: left;
  top: 28%;
  left: 3%;
  width: 8em;
  height: 8em;
  border-radius: 99em;
  background-color: white;
  box-shadow: 1px 1px 1px $input-shadow;
}

.myself-message .name,
.others-message .name {
  float: left;
  margin-top: 7%;
  text-align: center;
  width: 100%;
  font-size: 2.3em;
}

.myself-message .dialogbox,
.others-message .dialogbox {
  font-size: 3em;
  display: inline-block;
  width: 80%;
  margin-top: 1%;
  box-sizing: border-box;
  box-shadow: 4px 4px 5px #7f9eb2;
  padding: 2% 5% 2% 5%;
  background: #fffff5;
  word-break: break-all;
  border-radius: 6px;
  line-height: 200%;
}

.myself-message .dialogbox:after,
.others-message .dialogbox:after {
  content: " ";
  height: 0;
  width: 0;
  pointer-events: none;
  border: solid transparent;
  border-color: #fffff5;
  border-width: 7px;
}

.myself-infro {
  box-sizing: border-box;
  padding: 1%;
  position: absolute;
  width: 17%;
  height: 90%;
}

.others-infro {
  box-sizing: border-box;
  padding: 1%;
  position: absolute;
  right: 1%;
  width: 17%;
  height: 90%;
}

.myself-message .time {
  position: relative;
  margin-top: 2%;
  left: 86%;
  font-size: 2.2em;
}

.myself-message .dialogbox {
  position: relative;
  left: 20%;
  top: 0%;
}

.myself-message .dialogbox :after {
  position: absolute;
  right: 99%;
  top: 4%;
  border-right-color: #fff;
}

.others-message .time {
  position: relative;
  margin-top: 2%;
}

.others-message .dialogbox {
  position: relative;
  left: 0%;
  top: 0%;
}

.others-message .dialogbox:after {
  position: absolute;
  right: -6%;
  top: 6%;
  border-left-color: #fff;
}
</style>