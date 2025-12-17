import { createRouter, createWebHistory } from 'vue-router';
import Header from '@/components/HeaderComponent.vue';
import GroupProducts from '@/components/ProductComponent.vue'
const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: "/",
      name: "home",
      component: () => import("../views/HomeView.vue")
    },
    {
      path: "/productview/:id?",
      name: "productview",
      component: () => import("../views/ProductView.vue"),
      props: true
    },
    {
      path:"/header",
      name: "header",
      component: Header,
    },
  ],
})

export default router