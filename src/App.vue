<template>
  <div>
    
    <Navigation/>
    
    <div class="container mt-72 max-w-[1140px] mx-auto md:mt-36">
      <router-view :key="$route.path" />     
    </div>

  </div>
</template>

<script>
import Navigation from "@/components/ui/Navigation";

export default {
  components: {
    Navigation
  }
  
}
</script>

<style>

.loader {
  width: 50px;
  height: 50px;
  display: grid;
  animation: s4 0s infinite;
  position: absolute;
  top: 42%;
  left: 50%;
  margin-right: -50%;
  background: transparent;
  transform: translate(-50%, -50%);
}
.loader::before,
.loader::after {    
  content:"";
  grid-area: 1/1;
  border:8px solid;
  border-radius: 50%;
  border-color:#F42E72 #F42E72 #0000 #0000;
  mix-blend-mode: darken;
  animation: s4 0.5s infinite linear;
}
.loader::after {
  border-color:#0000 #0000 #EDCE7D #EDCE7D;
  animation-direction: reverse;
}

@keyframes s4{ 
  100%{transform: rotate(1turn)}
}

.fade-enter-active,
.fade-leave-active {
  transition: opacity .5s ease;
}

.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}
</style>

