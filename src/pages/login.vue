<template>
  <div class="container">
    <h3 class="text-center">Login user</h3>
    <div class="row">
      <div class="col-md-6 m-auto">
        <form @submit.prevent="login">
          <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" v-model="form.email" />
            <span class="text-danger" v-if="errors.email"> {{errors.email[0]}}</span>
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" v-model="form.password" />
            <span class="text-danger" v-if="errors.email"> {{errors.password[0]}}</span>
          </div>
          <button type="submit" class="btn btn-primary">Login</button>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import User from "../api/User";

export default {
  name: "login",
  data() {
    return {
      form: {
        email: "",
        password: "",
      },
      errors : []
    };
  },
  methods:{
      login(){
          User.login(this.form).then(()=>{
            this.$root.$emit("login",true);
              localStorage.setItem('auth',true);
              this.$router.push({name: 'dashboard' });
          }).catch(error => {
                    if(error.response.status === 422){
                        this.errors = error.response.data.errors;
                    }
                });
      }
  }
};
</script>
