import home from './components/HelloWorld.vue';
import login from './pages/login.vue';
import register from './pages/register.vue';
import dashboard from './pages/dashboard.vue';
import edit from './pages/edit.vue';
import showall from './pages/showall.vue';


export const routes = [
    {
        name: 'home',
        path: '/',
        component: home,   
        meta:{ guestOnly: true}    
    },
    {
        name: 'login',
        path: '/login',
        component: login, meta:{ guestOnly: true} 
     
    },
    {
        name: 'register',
        path: '/register',
        component: register,
        meta:{ guestOnly: true} 
      
    },  
    {
        name: 'edit',
        path: '/edit/:id',
        component: edit,
        meta:{ authOnly: true}
    },
    {
        name: 'dashboard',
        path: '/dashboard',
        component: dashboard,
        meta:{ authOnly: true}
    },
    {
        name: 'showall',
        path: '/showall',
        component: showall,
        meta:{ authOnly: true}
    }
];

