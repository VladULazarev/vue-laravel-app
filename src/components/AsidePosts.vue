<template>
    <div class="md:col-span-1 col-span-12 md:pl-4 md:pr-0 pl-4 pr-4 mb-16">  
             
        <h2 class="text-lg text-base font-semibold text-slate-900 mb-6 pl-1">Новые</h2>
        <div
            :asidePosts="asidePosts"
            v-for="asidePost in asidePosts"
            :key="asidePost.id"
        >
            <div @click="$router.push('/posts/' + asidePost.slug)" class="">               
                <p class="transition ease-in-out delay-50 hover:translate-x-1 
                    mb-4 cursor-pointer border-b 
                    text-sm font-semibold text-gray-700 leading-8 
                    shadow-lg rounded-xl py-2 px-4"
                >
                    {{ asidePost.title }} 
                </p>
            </div>
        </div>
        
    </div>
</template>

<script>
export default {
    props: {
        asidePosts: {
            type: Array,
            required: true
        }
    }
}
</script>

