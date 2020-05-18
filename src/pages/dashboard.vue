<template>
  <div class="container ">
    <div class="card">
      <div class="card-body" v-if="user">
      <h1 class="text-center">Dashboard</h1> 
      <h1>Hello,{{user.name}}</h1>
      <span>your email id is {{user.email}}</span>
    </div>
    </div>
<showall></showall>
  
 
  </div>
</template>

<script>
import User from "../api/User";
import showall from "./showall";


export default {
  name: 'dashboard',
  components: {
showall
  },
  data() {
    return {
      user : null,
    
    }
  },
 
  mounted() {
    User.auth().then(res => {
      console.log(res.data);
      this.user = res.data;
    });

  }



}
</script>


