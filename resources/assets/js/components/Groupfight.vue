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

   <div class="group-body">

   </div>

   <div class="group-bottom">
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
        isVoteTime: true
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


</style>