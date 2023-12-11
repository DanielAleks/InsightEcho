import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
// import InfoPage from '../views/InfoPage.vue'
// import ResearchPage from '../views/ResearchPage.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/info',
      name: 'info',
      component: () => import('../views/InfoPage.vue')
    },
    {
      path: '/research',
      name: 'research',
      component: () => import('../views/ResearchPage.vue')
    },
    {
      path: '/research/:id',
      name: 'researchPreview',
      component: () => import('../views/ResearchProductPreview.vue')
    },
    {
      path: '/about',
      name: 'about',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import('../views/AboutView.vue')
    }
  ]
})

export default router
