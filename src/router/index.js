import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '@/views/HomeView'
import ContactView from '@/views/ContactView'
import PostsView from '@/views/PostsView'
import SinglePostView from '@/views/SinglePostView'

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/contact',
    name: 'contact',
    component: ContactView
  },
  {
    path: '/posts',
    name: 'posts',
    component: PostsView
  },
  {
    path: '/posts/:slug',
    name: 'singe-post',
    component: SinglePostView
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
