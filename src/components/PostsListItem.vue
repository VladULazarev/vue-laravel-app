<template>
    <div class="
        relative        
        md:min-h-[38rem]
        sm:min-h-[40rem] 
        min-h-[42rem]
        rounded overflow-hidden shadow-lg">
        
        <div @click="$router.push('/posts/' + post.slug)">
            <img class="
                w-full cursor-pointer 
                transition duration-500 ease-in-out delay-50 
                hover:scale-105" 
                :src='require(`/public/src/assets/images/blog/${post.thumb_img}`)' 
                :alt="post.title"
            >
        </div>
        <div class="px-8 py-6">      
            <h3 class="font-bold text-xl text-teal-600 mb-2 cursor-pointer 
                transition duration-500 ease-in-out delay-50 hover:scale-105" 
                @click="$router.push('/posts/' + post.slug)">
                {{ post.title }}
            </h3>           
            <div class="text-slate-400 font-medium text-xs my-4">{{ formatDate(post.created_at) }}</div>           
            <p class="text-slate-600 text-sm leading-6">
                {{ truncate(post.excerpt) }}
            </p>
            <DeleteButton @click="$emit('delete-post', post)">Скрыть пост</DeleteButton>
        </div>

    </div>
</template>

<script>
export default {
    props: {
        post: {
            type: Object,
            required: true
        }
    },
    methods: {

        truncate(str) {
            return str.slice(0, str.indexOf(' ', 138)) + '...';
        },
        
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