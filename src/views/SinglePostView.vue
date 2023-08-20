<template>
    <div class="grid md:grid-cols-3 gap-4 p-0 sm:p-4 mb-16">
        
        <Transition name="fade">
            <SinglePost 
                v-if="!postsAreLoading" 
                :post="post" 
                :comments="comments" 
                class="md:col-span-2 col-span-12" 
            />   
            <div v-else class="loader"></div>  
        </Transition> 

        <Transition name="fade">
            <AsidePosts v-if="asidePosts" :asidePosts="asidePosts" />
        </Transition>

    </div>
</template>

<script>
import SinglePost from '@/components/SinglePost.vue'
import AsidePosts from '@/components/AsidePosts.vue'
import store from '@/store';

export default {
    components: {
        SinglePost, AsidePosts
    },
    data() {
        return {
            post: [], 
            asidePosts: [],
            postsAreLoading: false,
            comments: []
        }
    },

    methods: {

        async loadPost() {

            try {
                this.postsAreLoading = true
                let postSlug = this.$route.params.slug
                const response = await axios.get(store.state.currentDomain  + '/api/posts/' + postSlug)
             
                this.post = response.data; 
                this.comments = response.data.comments;            

            } catch (e) {
                console.log(e);
            } finally {
                                     
                this.postsAreLoading = false
                this.loadAsidePosts();
        
            }
        },

        async loadAsidePosts() {

            try {        
                const response = await axios.get(store.state.currentDomain  + '/api/posts', {
                    params: {
                        limit: 5
                    }                
                })

                this.asidePosts = response.data;

            } catch (e) {
                console.log(e);
            } 
        }
    },
    
    beforeMount() {
        this.loadPost();               
    }
}
</script>
