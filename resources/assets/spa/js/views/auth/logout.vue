<template>
   <div class="container">

         <h3>Exit...</h3>

   </div>
</template>
<script>
    import Auth from '../../services/auth';

    export default {
        name: 'Logout',

        ready(){
            setTimeout(()=>{
                this.logout();
            },1000);
        },
        methods:{
            logout(){
                let goToLogin = ()=>this.$router.go({name:'auth.login'});
                Auth.logout().then(goToLogin()).catch(goToLogin());
            }
        }

    }
</script>

