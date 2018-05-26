<template>
  <div class="container">
    <div v-if="isSettingOpen" class="setting">
    </div>

    <div class="waiting-header f-c">等待遊戲者...</div>
    <div class="waiting-body b-x">
      <div class="infro-people b-x f-c">
        人數 10人 / 5人
      </div>

      <div @click="!isSettingOpen" class="infro-setting b-x">
        遊戲狀態
      </div>

      <div class="infro-chatting b-x">
        聊天室
      </div>

    </div>
    <div class="waiting-bottom b-x">
      <button class="go-button"></button>
    </div>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        isSettingOpen: true
      }
    }
  }
</script>

<style>

.waiting-header{
  width: 100%;
  height: 15%;
  font-size: 7em;
  font-weight: bold;
  color: #ff7473;
  text-shadow: 2px 3px 9px #c03546;
}

.waiting-body{
  padding: 5%;
  width: 100%;
  height: 60%;
}

.waiting-bottom{
  padding: 5%;
  width: 100%;
  height: 25%;
}

.infro-people{
  padding: 3%;
  width: 100%;
  height: 20%;
  margin-bottom: 5%;
  font-size: 5.5em;
  border-radius: 50px;
  background-color: rgba(255,201,82,.7);
;
}

.infro-setting{
  padding: 5%;
  width: 100%;
  height: 35%;
  margin-bottom: 5%;
  border-radius: 50px;
  background-color: rgba(236,115,87,.7)
}

.infro-chatting{
  padding: 5%;
  width: 100%;
  height: 35%;
  border-radius: 50px;
  background-color: rgba(117,79,68,.7);
}

.go-button{
  background: transparent url(/img/go.png) no-repeat top center;
  background-size: 75%;
  width:100%;
  height:100%;
}

</style>