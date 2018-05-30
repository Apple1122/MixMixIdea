<template>
  <div class="container">
    <div class="header my-3">
        <div class="d-flex flex-row justify-content-between  align-items-center">
            <div class="">
                <div class="d-flex flex-row align-items-center ml-1">
                    <img class="icon-4" src="/img/clock.png">   
                    <p class="ml-1 time">08:44</p>
                </div>       
            </div>
        
            <div class="mode h-100">
                <span class="badge badge-warning">六頂帽子</span>
                <span class="badge badge-warning">團隊</span>
            </div>
            <div class="">
                <img class="icon-4" src="/img/setting.png">
            </div>  
        </div>
    </div>
    <div class="alert alert-primary w-75 mx-auto text-center" >
       熊貓是熊還是貓 
    </div>
    <div class="card mt-1 mb-4 answer-group">
        <div class="card-body">
        </div>
    </div>
    
    <div class="d-flex flex-row  align-items-end">
        <div class="">
            <img class="icon-4" src="/img/cat.png" alt="">
        </div>
        <div class="input-group h-75">
            <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button">送出</button>
            </div>
        </div>
    </div>
    
 </div>
 
</template>

<script>
export default {
  data() {
    return {};
  }
};
</script>

<style scoped>
.container {
  position: fixed;
  overflow: hidden;
  padding: 0% 3%;
  width: 100%;
  height: 100%;
  background: transparent url("/img/bg-img.png") no-repeat center;
  background-size: 90%;
}

.icon-4 {
  height: 4em;
  width: 4em;
}

.header {
  height: 4em;
}

.mode {
  font-size: 1.5em;
}

.answer-group {
  height: 20em;
  background-color: #f9edbd;
  box-shadow: 4px 4px 20px 1px rgba(182, 182, 206, 0.5);
  margin-left: 3em;
  margin-right: 3em;
  padding: 0.5em;
}
</style>