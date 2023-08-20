<template>
    <div class="mb-24">

        <Transition name="fade">            
            <PostsList            
                :posts="posts"
                @delete-post="deletePost"
                v-if="!postsAreLoading"
            />
            <div v-else><div class="loader"></div></div>
        </Transition>
        <div ref="observer" class="observer h-4 bg-white"></div>

    </div>
</template>

<script>

import PostsList from '@/components/PostsList';
import store from '@/store';

export default {
    components: {
        PostsList
    },
    data() {
        return {
            posts: [],
            observerVisible: false,
            postsAreLoading: false,
            page: 1,
            limit: 6,
            totalPages: 0
        }
    },
    methods: {

        deletePost(post) {
            this.posts = this.posts.filter(p => p.id !== post.id)
        },

        // Получаем обшее количество страниц для 'loadMorePosts()'
        async findAmountPostsPages() {

            try {                
                // Общее количество публикаций
                const response = await axios.get(store.state.currentDomain  + '/api/posts-amount')  
                // console.log(response.data)                       

                this.totalPages = Math.ceil(response.data / this.limit);

                // Общее количество страниц 
                return this.totalPages             

            } catch (e) {
                console.log(e);
            } 
        },

        // Загружаем первые 'this.limit' публикации
        async loadPosts() {

            try {
                this.postsAreLoading = true
                const response = await axios.get(store.state.currentDomain + '/api/posts', {
                    params: {
                        limit: this.limit
                    }                
                })               
                this.posts = response.data;     

            } catch (e) {
                console.log(e);
            } finally {
                this.postsAreLoading = false
            }
        },

        // Загружаем следующие 'this.limit' публикации
        async loadMorePosts() {
            try {
  
                this.page += 1;
                
                const response = await axios.get(store.state.currentDomain + '/api/more-posts',  {
                    params: {
                        page: this.page,
                        limit: this.limit
                    }  
                })
                               
                // timeout для более плавного появления публикаций
                setTimeout( async () => {
                    if ( response.data.length ) {
                        this.posts =[...this.posts, ...response.data];                  
                    }                   
                }, 100);
                
            } catch (e) {
                console.log(e)
            } 
            
        }
    },

    beforeMount() {
        this.findAmountPostsPages()
        this.loadPosts();  
    },

    mounted() {

        // Intersection Api
        const options = {
            rootMargin: '0px',
            threshold: 1.0
        }

        const callback = (entries, observer) => {           
         
           if (entries[0].isIntersecting && this.page < this.totalPages) {                  
                this.loadMorePosts();          
            }
        };

        const observer = new IntersectionObserver(callback, options);
        
        observer.observe(this.$refs.observer);
    } 
}
</script>
