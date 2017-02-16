<template>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed"
                        data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <router-link to="/dashboard" class="navbar-brand">Dashboard</router-link>
            </div>
            <div id="navbar" class="navbar-collapse collapse">

                <ul class="nav navbar-nav navbar-right">
                   <li class="dropdown">
                       <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                           {{name}} <span class="caret"></span>
                       </a>
                       <ul class="dropdown-menu" >
                           <li><a v-on:click="logout()">Exit</a></li>
                       </ul>
                   </li>
                </ul>
                <form class="navbar-form navbar-right">
                    <input type="text" class="form-control" placeholder="Search...">
                </form>
            </div>
        </div>
    </nav>
</template>

<script>
    import LocalStorage from '../services/localStorage'
    import Auth from '../services/auth';

export default{
    data(){

        return{
            user: Auth.user
        }
    },
    computed:{
        name(){
            return this.user.data ? this.user.data.name : '';
        }
    },
    methods:{
       logout(){
           let goToLogin = ()=>this.$router.push({path:'/'});
           Auth.logout().then(goToLogin()).catch(goToLogin());
       }
   }
}

</script>
