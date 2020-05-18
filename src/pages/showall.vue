<template>
  <div>
    <h3 class="text-center">All Users</h3>
    <br />

    <table class="table table-bordered">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="user in Users" :key="user.id">
          <td>{{ user.id }}</td>
          <td>{{ user.name }}</td>
          <td>{{ user.email }}</td>
          <td>
            <div class="btn-group" role="group">
              <router-link
                :to="{ name: 'edit', params: { id: user.id } }"
                class="btn btn-primary"
                >Edit
              </router-link>
              <button class="btn btn-danger" @click="adel(user.id)">
                Delete
              </button>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>
<script>
import User from "../api/User";
import axios from "axios";

export default {
  name: "showall",
  data() {
    return {
      Users: [],
    };
  },
   created(){
      User.show().then(res => {       
        this.Users = res.data;
        // console.log(this.Users);
      });
  },
    methods:{
    adel(id){
           axios.post(`http://localhost:8000/api/delete/${id}`)
                    .then(() => {
                        let i = this.Users.map(item => item.id).indexOf(id); // find index of your object
                        this.Users.splice(i, 1)
                    });

    }


  }
};
</script>
