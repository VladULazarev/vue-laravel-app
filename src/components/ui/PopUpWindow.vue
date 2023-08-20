<template>
  <div class="popup-window" v-if="show" @click="hidePopUpWindow">

    <div class="popup-window__content relative">
      <button 
        type="button" 
        class="
          absolute 
          top-2 right-2 
          text-white bg-transparent hover:bg-gray-200 
          hover:text-gray-900 
          rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" 
        data-modal-toggle="default-modal"
      >
        <svg 
          class="w-5 h-5" 
          fill="currentColor" 
          viewBox="0 0 20 20" 
          xmlns="http://www.w3.org/2000/svg"
        >
          <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
        </svg>  
      </button>
      <slot/>
    </div>
    
  </div>
</template>
  
<script>
  export default {
    name: 'PopUpWindow',
    props: {
      show: {
        type: Boolean,
        default: false
      }
    },
  
    methods: {
      hidePopUpWindow(){
        this.$emit('update:show', false);
      }
    }
  }
</script>
  
<style scoped>
  .popup-window {
    top: 0;
    bottom: 0;
    right: 0;
    left: 0;
    background: rgb(54 70 89 / 50%);
    position: fixed;
    display: flex;
    z-index: 10;
  }

  .popup-window__content {
      color: #fff;
      max-width: 400px;
      margin: auto;
      text-align: center;
      border-radius: 5px;
      background: rgb(1 97 88 / 93%);
      padding: 3rem 1rem; 
  }
</style>