<template>
  <div class="setting-page animated fadeInUp">
      <div class="setting-title f-c">遊戲設定</div>
      
      <div class="choose-bar">
        <div @click="change_page('gametype')" class="choose-game h-100">
          <div class="bar-img f-l h-100" :id="setting.gameID"></div>
          <div class="bar-text f-l f-c h-100">{{setting.gameName}}</div>
        </div>
        <div @click="change_page('brain-method')" class="choose-method h-100">
          <div class="bar-img f-l h-100" :id="setting.brainID"></div>
          <div class="bar-text f-l f-c h-100" id="toolong">{{setting.brainName}}</div>
        </div>
      </div>

      <div class="content">
        <div v-if=" currentPage == 'gametype' " class="special" >
          <div @click="select_game(game.ID,game.name)" v-for="game in GameList" class="choose-li animated fadeInUp" >
            <div class="logo1 f-l h-100" :id="game.ID"></div>
            <div class="describe1 f-l h-100" >
              <div class="m-name1 f-c">{{game.name}}</div>
              <div class="m-all f-c">{{game.situ}}</div>
            </div>
          </div>
        </div>

        <div v-if=" currentPage == 'brain-method' " class="special" >
          <div @click="select_method(method.ID,method.name)" v-for="method in BrainList" class="choose-li animated fadeInUp" >
            <div class="logo f-l h-100" :id="method.ID"></div>
            <div class="describe f-l h-100" >
              <div class="m-name f-c">{{method.name}}</div>
              <div class="m-rule">規則：{{method.rule}}</div>
              <div class="m-situ">情境：{{method.situ}}</div>
            </div>
          </div>
        </div>

        <div v-if=" currentPage == 'default' " class="special">
          <div class="col d-time f-l">
            <div class="title h-100 f-c f-l">進行時間</div>
            <div class="set h-100 f-l f-c">{{setting.time}}</div>
          </div>
          <div class="col d-group f-l" >
            <div class="title h-100 f-c f-l">分組方式</div>
            <div class="set h-100 f-l f-c">{{setting.group}}</div>
          </div>
          <div class="col d-topic f-l" >
            <div class="title h-100 f-c f-l">發想題目</div>
            <div class="set h-100 f-l">
              <textarea class="input h-100 f-c" v-model="setting.topic" placeholder="請輸入題目"></textarea>
            </div>
          </div>
        </div>
      </div>

      <div class="topic">
      </div>

      <div class="bottom f-c">
        <button @click="sendOkToParent()" class="btn ok"></button>
        <button @click="sendCancelToParent()" class="btn cancel"></button>
      </div>
  </div>
</template>

<script>
  export default {
    props:[
      'isSettingOpen',
      'setting'
    ],
    data() {
      return {
        currentPage: 'default',
        BrainList: [
          {
            ID: "role-play",
            name: "角色扮演",
            rule: "親自體驗所扮演角色的情意與行為特徵",
            situ: "有許多不同角色"
          },
          {
            ID: "talking",
            name: "辯論",
            rule: "學會接收他人意見，不要盲目追隨自己的想法",
            situ: "有正反方的立場"
          },
          {
            ID: "sixhat",
            name: "六頂思考帽法",
            rule: "容許思考者一次處理一件事",
            situ: "從不同面向的進行充分考量，更能使得思考效果全面"
          },
          {
            ID: "stf",
            name: "六三五法",
            rule: "先討論主題一分鐘，30分鐘一個循環寫出3個簡明扼要的構想，每隔5分鐘把紙張傳給隔鄰",
            situ: "事情需要集思廣益，發散思考"
          }
        ],
        GameList: [
          {
            name: "闖關",
            ID : "passgate",
            situ: "一關一關破"
          },
          {       
            name: "團體對抗",
            ID : "groupfight",
            situ: "多方勢力，一起戰鬥"
          },
          {	    
            name: "一般模式",
            ID : "normal",
            situ: "個人對抗"
          }
        ]
      }
    },
    methods: {
      change_page: function(page) {
        this.currentPage = page;
      },
      sendOkToParent: function() {
        this.$emit('click-okay',false);
      },
      sendCancelToParent: function() {
        this.$emit('click-okay',false);
      },
      select_method: function(ID,name){
        this.setting.brainID = ID;
        this.setting.brainName = name;
        this.currentPage = 'default';
      },
      select_game: function(ID,name){
        this.setting.gameID = ID;
        this.setting.gameName = name;
        this.currentPage = 'default';
      }
    }
  }
</script>

<style scoped>
.setting-page{
  position: absolute;
  top: 7%;
  left: 0%;
  z-index: 99;
  width: 100%;
  height: 93%;
  padding: 0% 5%;
  background: rgba(255,255,255,.9);
}

.setting-title{
  width: 100%;
  height: 15%;
  font-size: 6em;
  text-align: center;
  font-weight: bold;
  color: #754F44;
  background: transparent url('/img/setting_title.png') no-repeat center center;
  background-size: 70%;
  text-shadow: 2px 2px 1px #34314c;
}

.choose-bar{
  width: 100%;
  height: 13%;
  box-sizing: border-box;
  padding: 0% 4%;
}

.content{
  width: 100%;
  height: 60%;
  box-sizing: border-box;
  padding: 3% 5% 0% 5%;
}

.bottom{
  box-sizing: border-box;
  padding: 3%;
  width: 100%;
  height: 12%;
  padding: 0% 5% 3% 5%;
}

.btn{
  float: left;
  width: 12em;
  height: 12em;
  border-radius: 99em;
  margin-right: 10%;
  margin-left: 10%;
}

.btn.ok{
  background: #8CD790 url('/img/tick.png') no-repeat center center;
  background-size: 60%;
}

.btn.cancel{
  background: #E53A40 url('/img/cross.png') no-repeat center center;
  background-size: 50%;
}

.choose-game{
  box-sizing: border-box;
  padding: 2%;
  float: left;
  width: 50%;
  height: 90%;
  margin-top: 3%;
  border-radius: 30px 0px 0px 30px;
  background-color:  rgba(253,153,154,.7);
}

.choose-method{
  box-sizing: border-box;
  padding: 2%;
  float: left;
  width: 50%;
  height: 90%;
  margin-top: 3%;
  border-radius: 0px 30px 30px 0px;
  background-color: rgba(103,213,181,.7);
}

.bar-img{
  width: 40%;
}

.bar-text{
  text-align: center;
  width: 60%;
  font-size: 3.5em;
}

.special{
  width: 100%;
  height: 100%;
  overflow-y: scroll;
}

.choose-li{
  width: 99%;
  height: 33%;
  border-radius: 15px;
  background: #fffff5;
  box-shadow: 4px 4px 5px #7f9eb2;
  margin-bottom: 3%;
  box-sizing: border-box;
  padding: 1%;
}

.logo{
  width: 30%;
}

.logo1{
  width: 40%;
}

.describe{
  width: 70%;
}

.describe1{
  width: 60%;
}

#no-r{
  background: transparent url('/img/no-r.png') no-repeat center center;
  background-size: 70%;
}

#no-g{
  background: transparent url('/img/no-g.png') no-repeat center center;
  background-size: 70%;
}

#pass{
  background: transparent url('/img/pass.png') no-repeat center center;
  background-size: 70%;
}

#sixhat{
  background: transparent url('/img/hat.png') no-repeat center center;
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
  background: transparent url('/img/groupfight.png') no-repeat center center;
  background-size: 80%;
}

#normal{
  background: transparent url('/img/normal.png') no-repeat center center;
  background-size: 80%;
}

.m-name{
  width: 100%;
  height: 25%;
  font-size: 3.5em;
}

.m-name1{
  width: 100%;
  height: 35%;
  font-size: 4em;
}

.m-all{
  width: 100%;
  height: 65%;
  font-size: 3.5em;
  text-align: center;
}

.m-rule{
  width:100%;
  height: 48%;
  font-size: 2.3em;
  line-height: 106%;
}

.m-situ{
  width: 100%;
  height: 27%;
  font-size: 2.3em;
}

.col{
  background-color: #fffff5;
  border-radius: 15px;
  background: #fffff5;
  box-shadow: 4px 4px 5px #7f9eb2;
  margin-bottom: 2%;
}

.d-time{
  width: 100%;
  height: 20%;
}

.d-group{
  width: 100%;
  height: 20%;
}

.d-topic{
  width: 100%;
  height: 30%;
}

.title{
  width: 50%;
  font-size: 4em;
}

.set{
  width: 50%;
  font-size: 3.5em;
}

.input{
  box-sizing: border-box;
  padding: 3%;
  width: 100%;
  font-size: 1em;
  outline: none;
  border: 0;
}

</style>