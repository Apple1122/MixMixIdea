<template>
  <div class="container">
    <div class="nav-bar f-c">
      <div class="nav-btn h-100" id="return" @click="return_to_pre()"></div>
      <div class="class-name h-100 f-c">〈程式設計〉</div>
      <div class="nav-btn h-100" id="home" @click="return_to_home()"></div>
    </div>

    <div class="analysis-title f-c">遊戲分析</div>
  
    <div class="choose-bar">
      <div
        @click="change_page('chart')"
        class="choose-chart h-100"
        :id="currentPage=='chart'? 'chart_clicked' : '' " 
      >
        <div class="bar-img f-l h-100" id="chart"></div>
        <div class="bar-text f-l f-c h-100">圖表</div>
      </div>

      <div
        @click="change_page('data')"
        class="choose-data h-100"
        :id="currentPage=='data'? 'data_clicked' : '' " 
      >
        <div class="bar-img f-l h-100" id="data"></div>
        <div class="bar-text f-l f-c h-100">數據</div>
      </div>
    </div>

    <div class="analysis-body">

      <div v-if=" currentPage == 'chart' " class="special animated fadeInUp" >
        <div class="content">
          <div class="name f-c">本次出席率</div>
          <div class="chart">
            <Attend :width="800" :height="490" ></Attend>
          </div>
        </div>

        <div class="content1" id="achieve">
          <div class="name f-c">成就</div>
          <div class="achieve">
            <div v-for="achieve in achievelist" class="ac-li f-l h-100">
              <div class="ac-img f-c">
                <div class="img" :id="achieve.id"></div>
              </div>
              <div class="ac-title f-c">{{achieve.title}}</div>
              <div class="ac-name f-c">{{achieve.person}}</div>
            </div>
          </div>
        </div>

        <div class="content">
          <div class="name f-c">各組留言狀況</div>
          <div class="chart">
            <Talking :width="800" :height="490" ></Talking>
          </div>
        </div>

        <div class="content">
          <div class="name f-c">遊戲進行狀況</div>
          <div class="chart">
            <TimeStatus :width="800" :height="490" ></TimeStatus>
          </div>
        </div>

        <div class="content">
          <div class="name f-c">最高讚數留言</div>
          <div class="chart">
            <Good :width="800" :height="490" ></Good>
          </div>
        </div>

        <div class="list">

        </div>
          
      </div>

      <div v-if=" currentPage == 'data' " class="special animated fadeInUp" >
        <div class="content1">
          <div class="name f-c">本次題目</div>
          <div class="data-text">程式設計成為近期來普及的趨勢，你對此有什麼看法？</div>
        </div>

        <div class="content1" id="set">
            <div class="name f-c">遊戲設定</div>

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

        <div class="content1">
          <div class="name f-c">讚數最多留言</div>
          <div v-for="msg in popularmsg" class="data-text">{{msg.text}}：{{msg.num}}個讚</div>
        </div>

        <div class="content1">
          <div class="name f-c">回答詳細</div>
          <div v-for="msg in allmsg" class="data-text">{{msg.text}}</div>
        </div>

      </div>

    </div>

  </div>  
</template>

<script>  
  import Attend from './StatDetail/Attend';
  import Talking from './StatDetail/Talking';
  import Good from './StatDetail/Good';
  import TimeStatus from './StatDetail/TimeStatus';

  export default {
    data() {
      return {
        currentPage: 'chart',
        setting: {
          gameName: "遊戲模式",
          gameID: "no-r",
          brainName: "腦力激盪",
          brainID: "no-g",
          time: "30分",
          group: "平均分配",
          topic: "題目未定"
        },
        allmsg:[
          {
            text: '程式設計是一門藝術',
            time: '2017-05-31'
          },
          {
            text: '程式設計入學門檻稍高',
            time: '2017-05-31'
          },
          {
            text: '程式設計學起來',
            time: '2017-05-31'
          },
          {
            text: '程式設計安安安安',
            time: '2017-05-31'
          }
        ],
        popularmsg:[
          {
            text: '程式設計是一門藝術',
            num: 55
          },
          {
            text: '程式設計入學門檻稍高',
            num: 30
          },
          {
            text: '程式設計學起來',
            num: 25
          }
        ],
        achievelist:[
          {
            id: 'goodmost',
            title: '讚數最多獎',
            person: 'Andy'
          },
          {
            id: 'goodtalk',
            title: '讚數最多獎',
            person: 'Andy'
          },
          {
            id: 'goodadd',
            title: '最佳參與獎',
            person: 'Andy'
          },
          {
            id: 'goodwrite',
            title: '最佳書寫獎',
            person: 'Andy'
          },
          {
            id: 'goodtime',
            title: '最佳精神獎',
            person: 'Andy'
          }
        ]
      }
    },
    components: {
      Attend,
      Talking,
      Good,
      TimeStatus
    },
    methods: {
      change_page: function(page) {
        this.currentPage = page;
      },
      return_to_pre: function() {
        this.$router.push({ path: "/t_waiting" });
      },
      return_to_home: function() {
        this.$router.push({ path: "/courselist" });
      }
    }
  }
</script>

<style scoped>
.nav-bar{
  width: 106%;
  height: 7%;
  margin-left: -3%;
  box-shadow: 0px 5px 8px #9baec8; 
  font-size: 3em;
}

.nav-btn{
  float: left;
  width: 12%;
}

.class-name{
  float: left;
  font-weight: bold;
  width: 76%;
  font-size: 1.1em;
}

#return{
  background: transparent url('/img/return.png') no-repeat center center;
  background-size: 25%;
}

.analysis-title{
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

.analysis-body{
  box-sizing: border-box;
  width: 100%;
  height: 72%;
  padding: 2% 5%;
}

.special{
  width: 100%;
  height: 100%;
  overflow-y: scroll;
}


.choose-bar{
  width: 100%;
  height: 7%;
  box-sizing: border-box;
  padding: 0% 15%;
}

.choose-chart{
  box-sizing: border-box;
  padding: 2%;
  float: left;
  width: 50%;
  height: 90%;
  border-radius: 30px 0px 0px 30px;
  box-shadow: 0px 5px 5px #df405a;
  background-color: rgba(253,153,154,.2);
  border-right: none;
  transition: background-color 0.3s;
}

#chart_clicked{
  background-color:  rgba(253,153,154,.7);
}

#data_clicked{
  background-color: rgba(103,213,181,.7);
}

.choose-data{
  box-sizing: border-box;
  padding: 2%;
  float: left;
  width: 50%;
  height: 90%;
  border-radius: 0px 30px 30px 0px;
  box-shadow: 0px 5px 5px #3b8686;
  border-left: none;
  background-color: rgba(103,213,181,.2);
  transition: background-color 0.3s;
}

.bar-img{
  width: 40%;
}

.bar-text{
  text-align: center;
  width: 60%;
  font-size: 3.5em;
}

#chart{
  background: transparent url('/img/chart.png') no-repeat center center;
  background-size: 80%;
}

#next {
  background: transparent url("/img/return.png") no-repeat center center;
  background-size: 25%;
  transform: rotate(180deg);
}

#home {
  background: transparent url(/img/home.png) no-repeat left center;
  background-size: 60%;
}

#data{
  background: transparent url('/img/data.png') no-repeat center center;
  background-size: 80%;
}

.content{
    box-sizing: border-box;
    width: 100%;
    height: 50%;
    background: rgba(255,255,245,.8);
    box-shadow: 2px 2px 9px #7f9eb2;
    margin-bottom: 3%;
    border-radius: 30px;
}

#achieve{
  height: 30%;
}

.content1{
    box-sizing: border-box;
    padding: 3%;
    width: 99%;
    min-height: 15%;
    background: rgba(255,255,245,.8);
    box-shadow: 2px 2px 9px #7f9eb2;
    margin-bottom: 3%;
    border-radius: 30px;
}

.name{
  width: 100%;
  height: 20%;
  font-size: 3em;
  font-weight: bold;
  margin-bottom: 1%;
}

.chart{
  width: 100%;
  height: 80%;
}

.achieve{
  width: 100%;
  height: 80%;
  overflow-x: scroll;
}

.ac-li{
  width: 30%;
}

.data-text{
  width: 100%;
  height: 80%;
  box-sizing: border-box;
  padding: 3%;
  font-size: 2.5em;
}


#no-r {
  background: transparent url("/img/no-r.png") no-repeat center center;
  background-size: 60%;
}

#no-g {
  background: transparent url("/img/no-g.png") no-repeat center center;
  background-size: 60%;
}

#pass {
  background: transparent url("/img/pass.png") no-repeat center center;
  background-size: 60%;
}

#sixhat {
  background: transparent url("/img/hat.png") no-repeat center center;
  background-size: 70%;
}

#stf {
  background: transparent url("/img/stf.png") no-repeat center center;
  background-size: 70%;
}

#role-play {
  background: transparent url("/img/role-play.png") no-repeat center center;
  background-size: 70%;
}

#talking {
  background: transparent url("/img/talking.png") no-repeat center center;
  background-size: 70%;
}

.gametype {
  float: left;
  box-sizing: border-box;
  padding: 1%;
  width: 25%;
  height: 75%;
  margin-top: 2%;
  border-radius: 30px 0px 0px 30px;
  background-color: rgba(253, 153, 154, 0.7);
}

.brain-method {
  float: left;
  box-sizing: border-box;
  padding: 1%;
  width: 25%;
  height: 75%;
  margin-top: 2%;
  border-radius: 0px 30px 30px 0px;
  background-color: rgba(103, 213, 181, 0.7);
}

.infro-img {
  width: 100%;
  height: 60%;
}

.infro-text {
  width: 100%;
  height: 40%;
  font-size: 2.3em;
  font-weight: bold;
  text-align: center;
}

.other-setting {
  box-sizing: border-box;
  padding: 2%;
  float: left;
  width: 50%;
}

.set-li {
  list-style: none;
  width: 100%;
  font-size: 2.5em;
  margin-bottom: 1%;
  line-height: 135%;
  margin-right: 3%;
}

#set{
  height: 25%;
}

.img{
  width: 5em;
  height: 5em;
  border-radius: 99em;
  box-shadow: 4px 4px 10px #666;
}

.ac-img{
  width: 100%;
  height: 60%;
  font-size: 2em;
}

.ac-title{
  width: 100%;
  height: 20%;
  font-size: 2.4em;
}

.ac-name{
  width: 100%;
  height: 20%;
  font-size: 2.5em;
  font-weight: bold;
}

#goodmost{
  background: #ffda8e url('/img/goodmost.png') no-repeat center center;
  background-size: 100%;
}

#goodtalk{
  background: #ffda8e url('/img/goodtalk.png') no-repeat center center;
  background-size: 70%;
}

#goodadd{
  background: #ffda8e url('/img/goodadd.png') no-repeat center center;
  background-size: 100%;
}

#goodwrite{
  background: #ffda8e url('/img/goodwrite.png') no-repeat center center;
  background-size: 100%;
}

#goodtime{
  background: #ffda8e url('/img/goodtime.png') no-repeat center center;
  background-size: 100%;
}

</style>