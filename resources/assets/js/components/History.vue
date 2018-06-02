<template>
  <div class="container">
    <div class="head">
      <div class="nav-bar f-c"></div>
      <div class="nav-btn h-100" id="return" ></div>
      <div class="class-name h-100 f-c">〈歷史紀錄〉</div>
      <div class="nav-btn h-100" ></div>
    </div>
    <div class="body">
      <div class="choose-text f-c"> 選擇歷史紀錄 </div> 
      <div v-if="isClickItem" class="actionClick">
        <div class="history-brief">
          <div  v-for="brief in historyBrief" class="brieflist1">
            <div class="ranking f-c">{{brief.name}}</div>
            <div class="brief-infro f-c">{{brief.infro}}</div>
          </div>
          
        </div>
         <div  @click="hideblock()" class="bottom">
            <div class="btn f-c">閱讀完畢</div>
          </div>  
      </div>
      
      <div v-else="isClickItem" class="historylist">
        <div v-for="his in historylist" class="history-title">
          <div @click="openBrief()" class="history-infro">
            <div class="course-name f-c"> {{his.name}} </div>
            <div class="history-time f-c"> {{his.time}} </div>
          </div>
        </div>
      </div>
    </div>
  </div>
 
</template>

<script>
  export default {
    data() {
      return {
        isClickItem: false,
        historylist: [
          {
            name: "test1",
            time: "time1"
          },
          {
            name: "test2",
            time: "time2"
          },
          {
            name: "test3",
            time: "time3"
          },
          {
            name: "test4",
            time: "time4"
          }
          
        ],

        historyBrief: [
          {
            name: "題目: ",
            infro: "熊貓是熊還是貓?"
          },
          {
            name: "排名:",
            infro: "詳情請按此"
          },
          {
            name: "設定:",
            infro: "詳細請按此"
          },
          {
            name: "出席率:",
            infro: "100%"
          }
        ]
      }
    },
    methods : {
      openBrief : function() {
        this.isClickItem = true;
      },
      hideblock : function() {
        this.isClickItem = false;
      }
    }
  }
</script>

<style scoped>
  .container{
    width: 98%;
    height: 100%;

  }
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
    width: 76%;
    font-weight: bold;
    font-size: 4.5em;
  }
  .head{
    width: 100%;
    height: 15%;
  }
  .body{
    width: 100%;
    height: 70%;
  }
  .choose-text{
    font-weight: bold;
    width: 100%;
    height: 12%;
    color: #ff7473;
    font-size: 3.5em;
  }
  .historylist{
    width: 100%;
    height: 85%;
  }
  .history{
    height: 40%;
    width: 90%;
    border-radius: 50px;
    margin: auto;
    margin-bottom: 2.5%;
  
  }
  .history-title{
    width: 90%;
    height: 20%;
    border-radius: 50px;
    margin:auto;
    margin-bottom: 2.5%;
    padding: 3%;
  }
  .history-infro{
    position: relative;
    box-sizing: border-box;
    padding: 3%;
    width: 100%;
    height: 100%;
    background-color: #ffc952;
    border-radius: 40px;
  }
  .course-name{
    width: 50%;
    height: 100%;
    font-size: 3em;
    float: left;
  }
  .history-time{
    width: 50%;
    height: 100%;
    font-size: 3em;
    float: left;
  }
  .history-brief{
    box-sizing: border-box;
    padding: 2.5%;

    margin-top: -2%;
    width: 100%;
    height: 80%;
  }
  .ranking{
    height: 100%;
    width: 50%;
    margin-bottom: 2.5%;
    background-color: rgba(253,153,154,.7);
    float: left;
    font-size: 2em;
  }
  .actionClick{
    height: 100%;
    width: 100;
    background: rgba(255,255,255,.9);
  }
  .bottom{
    height: 14%;
    width: 78%;
    background-color: rgba(255,201,82,.8);
    margin: auto;
    border-radius: 99em;
    margin: auto;
    padding: -1%;
    margin-bottom: 10%;
    padding-bottom: 12px;
  }
  .btn{
    width: 60%;
    height: 60%;
    border-radius: 99em;
    margin: 0 auto;
    font-size: 5em;
    background-size: 60%;
    vertical-align: middle;
    padding: 3%;
    top: 20%; 
  }
  .brief-infro{
    width: 50%;
    height: 100%;
    float: left;
    background-color: rgba(103,213,181,.7);
  }
  .brieflist1{
    height: 20%;
    width: 100%;
    margin-bottom: 2.5%;
    font-size: 2em;
    border-radius: 99px;
    padding: 2%;
  }
</style>