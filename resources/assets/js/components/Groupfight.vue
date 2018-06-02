<template>
  <div class="container">
   <div class="group-header">
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

   <div class="group-body">
    <div class="vote-status">
      
      <div class="v-group f-c">第一組：5票</div>
      <div class="v-group f-c">第二組：15票</div>
      <div class="v-group f-c">第三組：3票</div>
      <div class="v-group f-c">第四組：10票</div>
      <div class="v-group f-c">第五組：20票</div>
    </div>

    <div class="game">

      <div @click="attackSelect('one')" class="g-group">
       <img class="g-logo" src="/img/animal0.png"></img>
        <div class="g-body f-c">自己</div>
      </div>

      <div @click="attackSelect('two')" class="g-group">
        <div v-if="attack.isOK" id="twenty" class="g-white"></div>
        <img class="g-logo" src="/img/animal1.png"></img>
        <div class="g-body f-c" id="two">{{attack.two? '攻擊':''}}</div>
      </div>

      <div @click="attackSelect('three')" class="g-group" >
      <div v-if="attack.isOK" id="seventy" class="g-white"></div>
        <img class="g-logo" src="/img/animal2.png"></img>
        <div class="g-body f-c" id="three">{{attack.three? '攻擊':''}}</div>
      </div>

      <div @click="attackSelect('four')" class="g-group">
      <div v-if="attack.isOK" id="ten" class="g-white"></div>
        <img class="g-logo" src="/img/animal3.png"></img>
        <div class="g-body f-c" id="four">{{attack.four? '攻擊':''}}</div>
      </div>

      <div @click="attackSelect('five')" class="g-group">
        <div v-if="attack.isOK" id="fifty" class="g-white"></div>
        <img class="g-logo" src="/img/animal4.png"></img>
        <div class="g-body f-c" id="five">{{attack.five? '攻擊':''}}</div>
      </div>


    </div>
   </div>

   <div class="group-bottom f-c">
    <div @click="attackGO()" class="send-btn f-c h-100">送出</div>
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
            content: '程式設計好好玩',
            isvoted: false
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
        },
        input_text: '',
        isVoteTime: true,
        attack: {
          one: false,
          two: false,
          three: false,
          four: false,
          five: false,
          isOK: false
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
            content: this.input_text,
            isvoted: false
        }
        this.msg.push(msg);
      },
      FocuseOn: function(text) {
        let obj = document.getElementById('slide');
        if(obj!= null){
          let which = (obj.scrollLeft / 377);
          if(text == 'left'){
            obj.scrollLeft = 377 * (which-1);
          }
          else {
            obj.scrollLeft = 377 * (which+1);
          }
          // if (test >= 188){
          //   obj.scrollLeft = 377 * (page+1);
          // }
          // else if (obj.scrollLeft <=188){
          //   obj.scrollLeft = 0;
          // }
          // else {
          //   obj.scrollLeft = 377 * (page);
          // }
        }
      },
      attackSelect: function(text) {
        switch (text) {
          case 'one':
          this.attack.one = !this.attack.one;
          break;

          case 'two':
          this.attack.two = !this.attack.two;
          break;

          case 'three':
          this.attack.three = !this.attack.three;
          break;

          case 'four':
          this.attack.four = !this.attack.four;
          break;

          case 'five':
          this.attack.five = !this.attack.five;
          break;

        }
      },
      attackGO: function(){
        this.attack.isOK = true;
      }
    }
  }
</script>

<style scoped>

.group-header{
  box-sizing: border-box;
  padding: 2%;
  width: 100%;
  height: 10%;
}

.group-body{
  width: 100%;
  height: 80%;
}

.vote-status{
  box-sizing: border-box;
  padding: 3%;
  width: 100%;
  height: 20%;
}

.game{
  width: 100%;
  height: 80%;
  overflow: hidden;
    box-sizing: border-box;
    padding: 0% 7%;
}

.group-bottom{
  box-sizing: border-box;
  padding: 3%;
  width: 100%;
  height: 10%;
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

.v-group{
  float: left;
  width: 28%;
  height: 40%;
  border-radius: 20px;
  font-size: 2.2em;
  background: #ff7473;
  border: 2px solid #f94e3f;
  margin-right: 5%;
  margin-bottom: 2%;
}

.send-btn{
  width: 70%;
  background-color:rgba(71,184,224,.5);
  border-radius: 15px;
  font-size: 3em;
  transition: background-color 0.7s;
  box-shadow: 2px 2px 3px #34314c;
}

.send-btn:hover{
  background-color:rgba(71,184,224,.9);
}

.g-group{
  float: left;
  box-shadow: border-box;
  padding: 1%;
  margin-right: 5%;
  width: 20%;
  height: 40%;
  overflow: hidden;
  margin: 0% 6%;
}

.g-logo{
  width: 95%;
}

.g-cicle{
  width: 90%;
  height: 20%;
  background: red;
}

.g-body{
  width: 90%;
  height: 70%;
  margin-top: -10%;
  background: #e85a71;
font-size: 3em;
}

#two{
    background: #4ea1d3;
}

#three{
    background: #fbd14b;
}

#four{
  background: #79bd9a;
}

#five{
  background: #AAABD3;
}

.g-white{
  transition: width 0.7s;
  width: 100%;
  height: 10%;
}

#ten{
  width: 100%;
  height: 10%
}

#twenty{
  transition: width 0.7s;
  width: 100%;
  height: 20%;
}

#fourty{
  height: 40%;
}

#seventy{
  height: 50%;
}

#fifty{
  height: 15%;
}

</style>