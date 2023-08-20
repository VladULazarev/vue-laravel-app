<template>

    <div 
      v-if="posts.length" 
      class="grid md:grid-cols-3 sm:grid-cols-2 gap-12 p-0 sm:p-4 md:p-6 
      lg:p-8 mt-8"
    > 
      <transition-group name="post-list">
        <PostsListItem
          :post="post"
          v-for="post in posts"
          :key="post.id"
          @delete-post = "$emit('delete-post', post)"     
        />
      </transition-group>     
    </div>
    <h2 v-else class="flex items-center justify-center h-screen -mt-36 px-4">
      Что-то пошло не так...
    </h2> 
</template>
  
<script>
  import PostsListItem from '@/components/PostsListItem';
  
  export default {
    components: { PostsListItem },
    props: {
      posts: {
        type: Array,
        required: true
      }
    }
  }
</script>
  
<style scoped>

  /* transition-group style */
  .post-list-item {
    display: inline-block;
    margin-right: 10px;
  }

  .post-list-enter-active,
  .post-list-leave-active {
    transition: all 0.4s ease;
  }

  .post-list-enter-from,
  .post-list-leave-to {
    opacity: 0;
    transform: translateY(30px);
  }

  .post-list-move {
    transition: transform 0.4s ease;
  }
  </style>
  