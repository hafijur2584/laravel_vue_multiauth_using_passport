import Home from './components/Home.vue'

import UserLogin from './components/UserLogin.vue'
import UserHome from './components/UserHome.vue'

import AdminLogin from './components/AdminLogin.vue'
import AdminHome from './components/AdminHome.vue'


export const routes = [
    {
        path: '/',
        name:'home',
        component:Home
    },
    {
        path: '/login',
        name:'login',
        component:UserLogin,
        beforeEnter: (to, from, next) => {
            let user_token = localStorage.getItem('user_token');
            if(user_token){
              return next({
                name:'user-home'
              })
            }
            next()
          }
    },
    {
        path: '/Home',
        name:'user-home',
        component:UserHome,
        beforeEnter: (to, from, next) => {
            let user_token = localStorage.getItem('user_token');
            if(!user_token){
              return next({
                name:'login'
              })
            }
            next()
          }
    },
    {
        path: '/admin/login',
        name:'admin-login',
        component:AdminLogin
    },
    {
        path: '/admin/home',
        name:'admin-home',
        component:AdminHome,
        beforeEnter: (to, from, next) => {
            let admin_token = localStorage.getItem('admin_token');
            if(!admin_token){
              return next({
                name:'admin-login'
              })
            }
            next()
          }
    },
]