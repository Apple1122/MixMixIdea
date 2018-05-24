<template>
  <div class="container">

    <div class="login-header">
      <img class="logo animated bounceInDown" src="/img/logo.png" />
    </div>

    <div class="login-body animated fadeIn" >
      <div class="col-choose-bar">
        <div @click="isTeacherSelected = false" :id="isTeacherSelected? '':'selected'" class="bar student">學生</div>
      <div @click="isTeacherSelected = true" :id="isTeacherSelected? 'selected':''" class="bar teacher">老師</div>
  </div>

  <div class="input">
    <input class="col effect-2" id="ac" type="text" placeholder="請輸入帳號" />
    <span class="focus-border"</span>
      </div>

  <div class="input">
    <input class="col effect-2" id="pw" type="text" placeholder="請輸入密碼" />
    <span class="focus-border"></span>
  </div>
    </div>

  <div class="login-bottom  animated fadeIn">
    <div class="login-button">
      <button  @click="swapComponent('courselist')"  class="button-login">登入</button>
  </div>
    </div >
  </div >
</template >


<script>
export default {
  props: ["swapComponent"],
  data() {
    return {
      isTeacherSelected: false
    };
  }
};
</script>


<style>
html,
body,
.container,
#app {
  width: 100%;
  height: 100%;
}

.container {
  background: transparent url("/img/bg-img.png") no-repeat center;
  background-size: 90%;
}

.login-header {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 100%;
  height: 35%;
}
.login-body {
  width: 100%;
  height: 37%;
}
.login-bottom {
  width: 100%;
  height: 30%;
}

.login-button {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 100%;
  height: 35%;
}

.logo {
  height: 90%;
}

.button-login {
  font: bold;
  border-radius: 99em;
  width: 78%;
  height: 70%;
  color: #383838;
  font-size: 4.3em;
  font-family: Microsoft JhengHei;
  transition: opacity 2s;
  box-shadow: 6px 7px 20px 1px #a4a4a4;
  background: rgb(248, 80, 50); /* Old browsers */
  background: rgb(252, 234, 187); /* Old browsers */
  background: -moz-linear-gradient(
    -45deg,
    rgba(252, 234, 187, 1) 0%,
    rgba(252, 205, 77, 1) 50%,
    rgba(248, 181, 0, 1) 51%,
    rgba(251, 223, 147, 1) 100%
  ); /* FF3.6-15 */
  background: -webkit-linear-gradient(
    -45deg,
    rgba(252, 234, 187, 1) 0%,
    rgba(252, 205, 77, 1) 50%,
    rgba(248, 181, 0, 1) 51%,
    rgba(251, 223, 147, 1) 100%
  ); /* Chrome10-25,Safari5.1-6 */
  background: linear-gradient(
    135deg,
    rgba(252, 234, 187, 1) 0%,
    rgba(252, 205, 77, 1) 50%,
    rgba(248, 181, 0, 1) 51%,
    rgba(251, 223, 147, 1) 100%
  ); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
  filter: progid:DXImageTransform.Microsoft.gradient(
      startColorstr="#fceabb",
      endColorstr="#fbdf93",
      GradientType=1
    ); /* IE6-9 fallback on horizontal gradient */
}

.col-choose-bar {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 100%;
  height: 25%;
}

.input {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 100%;
  height: 35%;
}

.col {
  width: 75%;
  height: 60%;
  font-size: 3.5em;
  text-indent: 3em;
}

#ac {
  background: transparent url(/img/account.png) no-repeat 5%;
  background-size: 9%;
}

#pw {
  background: transparent url(/img/password.png) no-repeat 4%;
  background-size: 10%;
}

.bar {
  font: bold;
  width: 30%;
  border-bottom: 8px solid #d9e1d8;
  height: 80%;
  text-align: center;
  font-size: 3.5em;
  line-height: 115px;
  color: #a3a1a1;
}

#selected {
  color: #ff5f2e;
  border-bottom: 8px solid #ff5f2e;
}
.effect-2 {
  border: 0;
  padding: 7px 0;
  border-bottom: 5px solid #ccc;
}

.effect-2 ~ .focus-border {
  position: absolute;
  bottom: 0;
  left: 50%;
  width: 0;
  height: 2px;
  background-color: #3399ff;
  transition: 0.4s;
}
.effect-2:focus ~ .focus-border {
  width: 100%;
  transition: 0.4s;
  left: 0;
}
</style>