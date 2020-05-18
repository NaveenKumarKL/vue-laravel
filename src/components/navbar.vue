<template>
  <div class="container">
    <nav>
      <ul class="nav ">
        <li class="nav-item">
          <router-link v-if="!isLoggedIn" class="nav-link" to="/">home</router-link>
        </li>
        <li class="nav-item">
          <router-link v-if="!isLoggedIn" class="nav-link" to="/login">login</router-link>
        </li>
        <li class="nav-item">
          <router-link v-if="!isLoggedIn" class="nav-link" to="/register">register</router-link>
        </li>   
        <a href="#" v-if="isLoggedIn"  class="nav-item nav-link" @click.prevent="logout">logout</a>   
      </ul>
    </nav>
  </div>
</template>

<script>
import User from '../api/User'

export default {
    name:'navbar',
  data(){
    return {
      isLoggedIn : false
    };
  },

  mounted() {
    this.$root.$on("login", () => {
      this.isLoggedIn = true;
    })
      this.isLoggedIn = !!localStorage.getItem('auth')
  },

    methods: {
      logout(){
        User.logout().then(()=>{
          this.isLoggedIn = false;
           localStorage.removeItem('auth');
           this.$router.push({name : "home"});
        })
      }
    }
}
</script>
