<template>
    <div 
      class="
        text-right 
        absolute 
        bottom-0 
        right-4 
        left-4 
        border-t-2 border-slate-100 
        pt-2 pb-2"
    >
      <button type="button"
        class="
          hover:bg-slate-100 
          focus:outline-none focus:ring focus:ring-slate-100 
          active:bg-slate-100 
          px-3 py-2 
          text-sm 
          leading-5
          rounded 
          font-semibold 
          text-slate-600 
          transition-all"
        >
        <slot/>
      </button>
    </div>
</template>
  
<script>
  export default {
    name: 'DeleteButton'
  }
</script>
  