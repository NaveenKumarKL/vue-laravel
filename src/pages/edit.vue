<template>
  <div class="container">
    <h3 class="text-center">Edit user</h3>
    <div class="row">
      <div class="col-md-6 m-auto">
        <form @submit.prevent="Update">
          <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" v-model="user.name" />
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" v-model="user.email" />
          </div>
          <button type="submit" class="btn btn-primary">Update</button>
        </form>
      </div>
    </div>
  </div>
</template>
<script>
// import User from "../api/User";
import axios from "axios";
axios.defaults.withCredentials = true;

export default {
   
  data() {
    return {
      user: {},
    };
  },
  created() {
    axios
      .get(`http://localhost:8000/api/edit/${this.$route.params.id}`)
      .then((response) => {
        this.user = response.data;
        console.log(this.user);

        // User.edit().then(res => {
        //   this.user = res.data;
        //   console.log(this.user);
      });
  },
  methods: {
    Update() {
        let id = this.user.id
        console.log(id);
       
        axios.get('http://localhost:8000/api/csrf-cookie').then(()=>{
                axios
                    .post(`http://localhost:8000/api/update/${this.$route.params.id}`, this.user)
                    .then(() => {
                        this.$router.push({name: 'dashboard'});
                    });

        });
     
 }
  },
};
</script>
