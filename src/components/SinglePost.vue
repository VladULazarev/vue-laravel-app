<template>
    <div v-if="post.title" class="relative min-h-[38rem] rounded overflow-hidden">
        
        <div @click="$router.push('/posts/' + post.id)">
            <img class="
                w-full cursor-pointer transition duration-500
                ease-in-out delay-50 hover:scale-105 mb-6"                    
                :src='require(`/public/src/assets/images/blog/${post.post_img}`)'
                :alt="post.title"
            >
        </div>
        <div class="md:px-1 px-4">  
            <div class="shadow-lg rounded-xl p-4">    
                <h3 class="font-bold text-xl text-teal-600 mb-2">
                    {{ post.title }}
                </h3>
                <div class="text-slate-400 font-medium text-xs my-4">
                    {{ formatDate(post.created_at) }}
                </div>
                <div v-html="post.content" class="text-slate-600 text-sm leading-6"></div>
            </div>

            <h2 class="text-lg text-base font-semibold text-slate-900 mb-6 mt-16 pl-1">
                Комментарии
            </h2>

            <div v-if="comments.length" class="mb-8">
                <div 
                    :comments="comments"
                    v-for="comment in comments"
                    :key="comment.id"
                >
                    <div class="relative rounded-xl overflow-auto py-4 px-1">
                        <div 
                            class="relative bg-white dark:bg-slate-800 shadow-lg 
                                ring-1 ring-black/5 rounded-xl flex flex-col 
                                divide-y">
                            <div class="flex items-center gap-4 p-4">
                                <img 
                                    class="w-12 h-12 rounded-full" 
                                    src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=4&w=256&h=256&q=80">
                                <div class="flex flex-col">
                                    <div class="flex">
                                        <strong class="text-slate-900 text-sm 
                                            font-medium dark:text-slate-200 mb-2">
                                            {{ comment.author_name }}
                                        </strong>
                                        <span class="inline-blosk ml-3 text-slate-400 
                                            font-medium text-xs pt-0.5">
                                        {{ formatDate(comment.created_at) }}
                                        </span>
                                    </div>
                                    <span class="text-slate-500 text-sm font-medium">
                                        {{ comment.comment_text }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <p v-else class="text-base text-slate-900 mb-6">Нет комментариев</p>
        </div>              

    </div>
    <h2 v-else class="flex items-center justify-center h-screen -mt-36 px-4">Нет такой публикации</h2> 
</template>

<script>

export default {
   
    props: {
        post: {
            type: Object,
            required: true
        },
        comments: {
            type: Array,
            required: true
        }     
    },

    methods: {
        
        formatDate(str) {
            var date = new Date(str);

            var options = {
                year: 'numeric',
                month: 'long',
                day: 'numeric',
            };

            return date.toLocaleString("ru", options)
        }
    }
}
</script>