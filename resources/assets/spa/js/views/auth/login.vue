<template>
   <div class="container-fluid">

          <form method="post" @submit.prevent="login()" class="form-signin" >
              <div class="row">
                  <div class="form-group">
                      <label for="email">Email</label>
                      <input type="text" id="email" v-model="user.email" class="form-control">
                  </div>
              </div>
              <div class="row">
                  <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" id="password" v-model="user.password" class="form-control">
                  </div>
              </div>

              <div class="row">
                  <div class="form-group">
                      <button type="submit" class="btn btn-lg btn-primary btn-block"> Login </button>
                  </div>
              </div>
          </form>

   </div>
</template>
<script>
    import Auth from '../../services/auth';

    export default {
        name: 'Login',
        data(){
            return {
                user: {
                    email: '',
                    password: ''
                },
                error:{
                    message :''
                }
            }
        },
        methods:{
            login(){
                Auth.login(this.user.email,this.user.password).then(()=>this.$router.push({path:'/dashboard'}));
            }
        }

    }
</script>
