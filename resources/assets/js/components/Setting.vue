<template>
  <div class="setting-page animated fadeInUp">
      <div class="title">遊戲設定</div>

      <div class="choose-bar">
      </div>
      <div class="content">
      </div>

      <div class="topic">
      </div>

      <div class="bottom">
        <button class="btn ok"></button>
        <button class="btn cancel"></button>
      </div>
  </div>
</template>

<script>
  export default {
    data() {
      return {

      }
    }
  }
</script>

<style>
.setting-page{
  position: absolute;
  top: 15%;
  left: 7%;
  z-index: 99;
  width: 86%;
  height: 70%;
  background: #FBFFB9;
  box-shadow: 8px 8px 1px #EC7357;
  border-radius: 60px;
  box-sizing: border-box;
  padding: 3%;
}

.title{
  width: 100%;
  height: 15%;
  font-size: 9em;
  text-align: center;
  font-weight: bold;
  color: #60c5ba;
  text-shadow: 2px 2px 1px #34314c;
}

.choose-bar{
  width: 100%;
  height: 20%;
}

.content{
  width: 100%;
  height: 50%;
}

.bottom{
  box-sizing: border-box;
  padding: 3%;
  width: 100%;
  height: 15%;
}

.btn{
  float: left;
  margin-right: 4%;
  width: 40%;
  height: 100%;
  background: #cb253e;
  border-radius: 15em;
  box-shadow: 1px 2px 1px #a31d31;
  outline: none;
  border-style: none;
  margin-left: 1%;
  margin-right: 5%;
}

</style>