<template>
    <div class="panel panel-default">
        <div class="panel-heading">
            <span class="panel-title">{{model.category_id}} / {{model.name}}</span>
            <div>
                <router-link :to="'/products/' + model.id + '/edit'" class="btn btn-primary btn-sm">Edit</router-link>
                <button class="btn btn-danger btn-sm" @click="remove">Delete</button>
            </div>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-4">
                    <label>Category</label>
                    <p>{{model.category_id}}</p>
                    <label>Name</label>
                    <p>{{model.name}}</p>
                </div>
                <div class="col-sm-4">
                    <label>Description</label>
                    <p>{{model.description}}</p>
                </div>
                <div class="col-sm-4">
                    <label>Created At</label>
                    <p>{{model.created_at}}</p>
                    <label>Updated At</label>
                    <pre>{{model.updated_at}}</pre>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import Vue from 'vue'
    import axios from 'axios'
    export default {
        name: 'ProductShow',
        data() {
            return {
                model: {},
                resource: 'products',
                redirect: '/'
            }
        },
        beforeMount() {
            this.fetchData()
        },
        watch: {
            '$route': 'fetchData'
        },
        methods: {
            remove() {
                var vm = this
                axios.delete(`api/${this.resource}/${this.$route.params.id}`)
                    .then(function(response) {
                        if(response.data.deleted) {
                            vm.$router.push(vm.redirect)
                        }
                    })
                    .catch(function(error) {
                        console.log(error)
                    })
            },
            fetchData() {
                var vm = this
                axios.get(`/api/${this.resource}/${this.$route.params.id}`)
                    .then(function(response) {
                        Vue.set(vm.$data, 'model', response.data.model)
                    })
                    .catch(function(error) {
                        console.log(error)
                    })
            }
        }
    }
</script>