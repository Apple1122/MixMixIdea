<template>
  <div class="container">
   <div class="game-header">
    <div class="timer f-l h-100">
      <div class="time-logo h-100"></div>
      <div class="time-text h-100">10:00</div>
    </div>
    <div class="type f-l h-100">
      <div class="t-l f-l h-100" :id="setting.gameID"></div>
      <div class="t-r f-l h-100" :id="setting.brainID"></div>
    </div>
    <div class="setting f-l h-100" ></div>
   </div>

   <div class="game-body">

    <div class="l-btn"></div>
    <div class="r-btn"></div>

      <div class="game-topic f-c">
        <div class="box f-c h-100">題目：{{setting.topic}}</div>
      </div>
      <div class="game-content">

        <div class="sticky ">
          <div v-for="msg in msg" class="msg animated fadeInUp">
            <div class="s-text">{{msg.content}}</div>
            <div class="s-bottom">
              <div class="s-good f-l h-100">
                <div @click="msg.goodnum++" class="s-img f-l h-100" id="good"></div>
                <div class="s-num f-l f-c h-100">{{msg.goodnum}}</div>
              </div>

              <div class="s-love f-l h-100">
                <div @click="msg.lovenum++" class="s-img f-l h-100" id="love"></div>
                <div class="s-num f-l f-c h-100">{{msg.lovenum}}</div>
              </div>

              <div class="s-hat f-l h-100">
                <div class="s-img f-l h-100" :id="msg.hatID"></div>
                <div class="s-num f-l f-c h-100">{{msg.whichhat}}</div>
              </div>
            </div>
          </div>
            <div class="groupnum"></div>
        </div>

        <div class="sticky">
        </div>

        <div class="sticky">
        </div>
      </div>
   </div>

   <div class="game-bottom">
    <div class="gb-l h-100 f-l">
      <div class="hat f-l">
        <img class="blue f-c" src="/img/sixhat_blue.png"/>
      </div>
      <div class="animal f-l"></div>
    </div>
    <div class="gb-r h-100 f-l">
        <div class="inputbox f-l f-c">
          <textarea @click="resetText()"  v-model="input_text" class="input h-100 f-c"></textarea>
        </div>
        <div class="sendbox h-100 f-l f-c">
          <div @click="sendMyText()"class="sent-btn"></div>
        </div>
    </div>
   </div>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        msg:[
          {
            groupid: 1,
            goodnum: 20,
            lovenum: 30,
            hatID: 'blue',
            whichhat: '藍帽',
            content: '程式設計好好玩'
          }
        ],
        setting: {
          gameName: "遊戲模式",
          gameID: "groupfight",
          brainName: "腦力激盪技法",
          brainID: "sixhat",
          time: "30分",
          group: "平均分配",
          topic: "程式設計好玩ㄇ"
        }
      }
    },
    methods: {
      sendMyText: function(){
        let msg = {
            groupid: 1,
            goodnum: 0,
            lovenum: 0,
            hatID: 'blue',
            whichhat: '藍帽',
            content: this.input_text
        }
        this.msg.push(msg);
      }
    }
  }
</script>

<style scoped>

.game-header{
  box-sizing: border-box;
  padding: 2%;
  width: 100%;
  height: 10%;
}

.game-body{
  width: 100%;
  height: 70%;
}

.game-bottom{
  box-sizing: border-box;
  padding: 3%;
  width: 100%;
  height: 20%;
}

.timer{
  width: 35%;
  margin-right: 5%;
}

.type{
  width: 40%;
  margin-right: 5%;
}

.setting{
  width: 15%;
  background: transparent url('/img/setting.png') no-repeat center center;
  background-size: 70%;
}

.t-l{
  width: 50%;
  border-radius: 15px 0px 0px 15px;
}

.t-r{
  width: 50%; 
  border-radius: 0px 15px 15px 0px;
}


#pass{
  background: transparent url('/img/pass.png') no-repeat center center;
  background-size: 70%;
}

#sixhat{
  background: rgba(253,153,154,.7) url('/img/hat.png') no-repeat center center;
  background-size: 80%;
}

#stf{
  background: transparent url('/img/stf.png') no-repeat center center;
  background-size: 80%;
}

#role-play{
  background: transparent url('/img/role-play.png') no-repeat center center;
  background-size: 80%;
}

#talking{
  background: transparent url('/img/talking.png') no-repeat center center;
  background-size: 80%;
}

#passgate{
  background: transparent url('/img/passgate.png') no-repeat center center;
  background-size: 80%;
}

#groupfight{
  background: rgba(103,213,181,.7) url('/img/groupfight.png') no-repeat center center;
  background-size: 80%;
}

#normal{
  background: transparent url('/img/normal.png') no-repeat center center;
  background-size: 80%;
}

.time-logo{
  width: 45%;
  background: transparent url('/img/clock.png') no-repeat center center;
  background-size: 90%;
}

.time-text{
  box-sizing: border-box;
  padding: 6% 9%;
    margin-left: 15%;
    position: relative;
    z-index: -99;
    margin-top: -36%;
    width: 85%;
    background: #FBFFB9;
    height: 80%;
    text-align: right;
    font-size: 3.5em;
}

.game-topic{
  width: 100%;
  height: 15%;
  box-sizing: border-box;
  padding: 2%;
}

.box{
  width: 85%;
  background: #D4DFE6;
  font-size: 3em;
  border-radius: 20px;
}

.game-content{
  display: -webkit-box;
  overflow-x: auto;
  overflow-y: hidden;
  width: 100%;
  height: 85%;
}

.sticky{
  box-sizing: border-box;
  padding: 3%;
  width: 80%;
  height: 99%;
  background: #ffda8e;
  box-shadow: 1px 1px 5px #754F44;
  border-radius: 15px;
  margin: 0% 10%;
  overflow-y: scroll;
}

.gb-l{
  width: 25%;
}

.gb-r{
  width: 75%;
}

.inputbox {
  width: 76%;
  height: 90%;
  background-color: #fff1b9;
  border-radius: 20px;
  box-shadow: 2px 2px 5px #f94e3f;
  margin-right: 4%;
}


.input {
  box-sizing: border-box;
  padding: 5%;
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
  width: 4.5em;
  height: 4.5em;
  border-radius: 99em;
  background: #ff7473 url(/img/send-button.png) no-repeat center center;
  box-shadow: 3px 3px 7px #a6172d;
  background-size: 50%;
}

.animal{
  width: 100%;
  height: 70%;
  background: transparent url('/img/cat.png') no-repeat center center;
  background-size: 90%;
}

.hat{
  width: 100%;
  height: 30%;
}

.blue{
    width: 75%;
    margin-left: 7%;
    position: relative;
}

.msg{
  width:100%;
  height: 35%;
  background: #fff1b9;
  border-radius: 10px;
  box-shadow: 1px 1px 5px #754F44;
  margin-bottom: 3%;  
}

.s-text{
  width: 100%;
  height: 70%;
  box-sizing: border-box;
  padding: 3%;
  font-size: 2.5em;
}

.s-bottom{
  width: 100%;
  height: 30%;
  box-sizing: border-box;
  padding: 2%;
}

.s-good{
  width: 30%;
  margin-right: 5%;
}

.s-love{
  width: 30%;
  margin-right: 5%;
}

.s-hat{
  width: 30%;
}

.s-img{
  width: 50%;
}

.s-num{
  width: 50%;
  font-size: 2.5em;
}

#blue{
  background: transparent url('/img/other_blue.png') no-repeat center center;
  background-size: 80%;
}

#good{
  background: transparent url('/img/goodmost.png') no-repeat center center;
  background-size: 70%;
}

#love{
  background: transparent url('/img/goodadd.png') no-repeat center center;
  background-size: 70%;
}

.l-btn{
  position: absolute;
  z-index: 99;
  top: 45%;
  left: 0%;
  width: 5em;
  height: 5em;
  background: rgba(255,255,255,.5) url(/img/return.png) no-repeat center center;
  background-size: 30%;
  border-radius: 99em;
}

.r-btn{
  position: absolute;
  z-index: 99;
  top: 45%;
  right: 0%;
  width: 5em;
  height: 5em;
  background: rgba(255,255,255,.5) url(/img/return.png) no-repeat center center;
  background-size: 30%;
  transform: rotate(180deg);
  border-radius: 99em;
}

.groupnum{
  position: relative;
  font-size: 10em;
  text-align: center;
  color:#EC7357;
  opacity: 0.7;
}

</style>