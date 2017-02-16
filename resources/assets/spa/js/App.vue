<template>
    <div id="root">


        <navbar v-if="showMenu"></navbar>

        <div class="col-sm-3 col-md-2 sidebar">
            <sidebar v-if="showMenu"></sidebar>
        </div>

        <div class="col-sm-9 col-md-10 col-md-offset-2">
            <router-view></router-view>
        </div>

    </div>
</template>

<script>
    import Auth from './services/auth';

    export default {
        data(){
          return{
            year: new Date().getFullYear(),
            user: Auth.user

          }
        },
        computed:{
            showMenu(){
                return this.user.check && this.$route.name != 'auth.login';
            }
        }

    }
</script>
