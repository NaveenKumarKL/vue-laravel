import Api from './Api';
import Csrf from "./Csrf";


export default {
  async register(form){
      await Csrf.getCookie();
        return Api.post('/register',form);
    },
    async login(form){
      await Csrf.getCookie();
        return Api.post('/login',form);
    },
    async logout(){
      await Csrf.getCookie();
        return Api.post('/logout');
    },
    async show(){
      // await Csrf.getCookie();
        return Api.get('/show');
    },  
    async Update(user){
      await Csrf.getCookie();
        return Api.post('/update',user);
    },

    auth(){
      return Api.get('/user');
    },
  
};