<template>
  <div class="container">
    <div class="nav-bar f-c">
      <div class="nav-btn h-100" id="return" @click="return_to_pre()"></div>
      <div class="class-name h-100 f-c">〈程式設計〉</div>
      <div class="nav-btn h-100" ></div>
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

      <div v-if=" currentPage == 'chart' " class="special" >
        <div class="content">
          <div class="name f-c">本次出席率</div>
          <div class="chart">
            <Attend :width="800" :height="490" ></Attend>
          </div>
        </div>

        <div class="list">

        </div>
          
      </div>

      <!--
      <div v-if=" currentPage == 'data' " class="special" >
        <div class="content">
          <div class="name f-c">本次出席率</div>
          </div class="chart"></div>
        </div>
      </div>
      -->

    </div>

  </div>  
</template>

<script>  

  import Attend from './StatDetail/Attend';
  export default {
    data() {
      return {
        currentPage: 'chart'
      }
    },
    components: {
      Attend
    },
    methods: {
      change_page: function(page) {
        this.currentPage = page;
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

#data{
  background: transparent url('/img/data.png') no-repeat center center;
  background-size: 80%;
}

.content{
  width: 100%;
  height: 45%;
}

.name{
  width: 100%;
  height: 20%;
  font-size: 3em;
}

.chart{
  width: 100%;
  height: 80%;
}

</style>