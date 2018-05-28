<template>
  <div id="login" class="container">

    <div class="login-header f-c">
      <img class="logo animated bounceInDown" src="/img/logo.png" />
    </div>

    <div class="login-body animated fadeIn" >
      <div class="col-choose-bar f-c">
        <div @click="loginType = 'student'" :id="loginType=='student'? 'selected':''" class="bar student">學生</div>
      <div @click="loginType = 'teacher'" :id="loginType=='teacher'? 'selected':''" class="bar teacher">老師</div>
  </div>

  <div class="input f-c">
    <input class="col effect-2" id="ac" v-model="inputAccount" type="text" placeholder="請輸入帳號" />
    <span class="focus-border"</span>
      </div>

  <div class="input f-c">
    <input class="col effect-2" id="pw" v-model="inputPassword" type="password" placeholder="請輸入密碼" />
    <span class="focus-border"></span>
  </div>
    </div>

  <div class="login-bottom animated fadeIn">
    <div class="login-button f-c">
      <button @click="button_login_clicked()"  class="button-login">登入</button>
  </div>
    </div >
  </div >
</template>

<script>
export default {
  data() {
    return {
      loginType: "student",
      inputAccount: "",
      inputPassword: ""
    };
  },
  beforeMount: function() {
    // if user already login, then go to courselist
    let isLogin = localStorage.getItem("loginAs");
    if (isLogin) this.$emit("swap", "courselist");
  },
  methods: {
    button_login_clicked: function() {
      let vm = this;
      let data = {
        loginType: vm.loginType,
        account: vm.inputAccount,
        password: vm.inputPassword
      };
      axios
        .post("/login", data)
        .then(function(rtn) {
          console.log(rtn);

          if (!rtn.errmsg) {
            sessionStorage.setItem("loginAs", rtn.data.result.loginAs);
            sessionStorage.setItem("username", rtn.data.result.username);
            vm.$emit("swap", "courselist");
          } else {
            console.log(rtn.errmsg);
          }
        })
        .catch(function(err) {
          console.log(err);
        });
    }
  }
};

/* 魚尾尾參考用
      beforeCreate: function() {
      //vue instance 被 constructor 建立前
      console.log('beforeCreate');
    },
    created: function() {
      //vue instance 被 constructor 建立後，在這裡完成 data binding
      console.log('created');
    },
    beforeMount: function() {
      //綁定 DOM 之前
      console.log('beforeMount');
    },
    mounted: function() {
      //綁定 DOM 之後
      console.log('mounted');
    },
    beforeUpdate: function() {
      //資料更新，但尚未更新 DOM
      console.log('beforeUpdate');
    },
    updated: function() {
      //因資料更新，而更新 DOM
      console.log('updated');
    },
    beforeDestroy: function() {
      //移除 vue instance 之前
      console.log('beforeDestroy');
    },
    destroyed: function() {
      //移除 vue instance 之後
      console.log('destroyed');
    }*/
</script>



<style>
.login-header {
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
  width: 100%;
  height: 35%;
}

.logo {
  height: 30em;
  width: 30em;
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
  background: rgb(248, 80, 50);
  /* Old browsers */
  background: rgb(252, 234, 187);
  /* Old browsers */
  background: -moz-linear-gradient(
    -45deg,
    rgba(252, 234, 187, 1) 0%,
    rgba(252, 205, 77, 1) 50%,
    rgba(248, 181, 0, 1) 51%,
    rgba(251, 223, 147, 1) 100%
  );
  /* FF3.6-15 */
  background: -webkit-linear-gradient(
    -45deg,
    rgba(252, 234, 187, 1) 0%,
    rgba(252, 205, 77, 1) 50%,
    rgba(248, 181, 0, 1) 51%,
    rgba(251, 223, 147, 1) 100%
  );
  /* Chrome10-25,Safari5.1-6 */
  background: linear-gradient(
    135deg,
    rgba(252, 234, 187, 1) 0%,
    rgba(252, 205, 77, 1) 50%,
    rgba(248, 181, 0, 1) 51%,
    rgba(251, 223, 147, 1) 100%
  );
  /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
  filter: progid:DXImageTransform.Microsoft.gradient(
      startColorstr="#fceabb",
      endColorstr="#fbdf93",
      GradientType=1
    );
  /* IE6-9 fallback on horizontal gradient */
}

.col-choose-bar {
  width: 100%;
  height: 25%;
}

.input {
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