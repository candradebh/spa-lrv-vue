<template>
       <div>
           <ul class="nav nav-sidebar">
               <li><router-link to="/login">Login</router-link></li>
               <li><router-link to="/customer">Customer</router-link></li>
               <li><router-link to="/invoice">Invoice</router-link></li>
               <li><router-link to="/categories">Categories</router-link></li>
               <li><router-link to="/products">Produtos</router-link></li>
           </ul>
       </div>
</template>

<script>
    import Auth from '../services/auth'

    export default{

    }

</script>
