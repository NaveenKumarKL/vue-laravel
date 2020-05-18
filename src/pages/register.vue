<template>

<div class="container">  
        <h3 class="text-center">register user</h3>
        <div class="row">
            <div class="col-md-6 m-auto">
                <form @submit.prevent="register">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="form.name">
                        <span class="text-danger" v-if="errors.name"> {{errors.name[0]}}</span>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" v-model="form.email">
                         <span class="text-danger" v-if="errors.name"> {{errors.email[0]}}</span>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" v-model="form.password">
                         <span class="text-danger" v-if="errors.name"> {{errors.password[0]}}</span>
                    </div>
                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
            </div>
        </div>
</div>
    
</template>

<script>
import User from "../api/User";
// import csrf from "../api/Csrf";

export default {
    name: 'register',
    data(){
        return {
            form:{               
            name:'',
            email: '',
            password:''
            },
            errors :[]
        }
    },
    methods:{
        register(){
            // csrf.getCookie().then(()=>{
                User.register(this.form).then(()=>{
                    this.$router.push({name: "login"});
                }).catch(error => {
                    if(error.response.status === 422){
                        this.errors = error.response.data.errors;
                    }
                });
            // });          
        }
    }
}
</script>