<template>
    <div class="panel panel-default">
        <div class="panel-heading">
            {{title}}
        </div>
        <div class="panel-body">
            <form class="form" @submit.prevent="save">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control" v-model="form.category_id">
                                <option>Select</option>
                                <option v-for="category in option.categories" :value="category.id">
                                    {{category.id}} - {{category.name}}
                                </option>
                            </select>
                            <small class="text-danger" v-if="errors.category_id">{{errors.customer_id[0]}}</small>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Name</label>
                            <input class="form-control" v-model="form.name">
                            <small class="text-danger" v-if="errors.name">{{errors.name[0]}}</small>
                        </div>
                    </div>
                </div>
                <div class="row">
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" v-model="form.description"></textarea>
                            <small class="text-danger" v-if="errors.description">{{errors.description[0]}}</small>
                        </div>
                </div>
                <button class="btn btn-success">Save</button>
            </form>
        </div>
    </div>
</template>
<script>
    import Vue from 'vue'
    import axios from 'axios'
    export default {
        name: 'ProductForm',
        data() {
            return {
                form: {
                    items: []
                },
                errors: {},
                option: {
                    customers: []
                },
                title: 'Create',
                initialize: '/api/products/create',
                redirect: '/products',
                store: '/api/products',
                method: 'post'
            }
        },
        beforeMount() {
            if(this.$route.meta.mode === 'edit') {
                this.title = 'Edit'
                this.initialize = '/api/products/' + this.$route.params.id + '/edit'
                this.store = '/api/products/' + this.$route.params.id
                this.method = 'put'
            }
            this.fetchData()
        },
        watch: {
            '$route': 'fetchData'
        },

        methods: {

            fetchData() {
                var vm = this
                axios.get(this.initialize)
                        .then(function(response) {
                            Vue.set(vm.$data, 'form', response.data.form)
                            Vue.set(vm.$data, 'option', response.data.option)
                        })
                        .catch(function(error) {
                            console.log(error)
                        })
            },
            save() {
                var vm = this
                axios[this.method](this.store, this.form)
                        .then(function(response) {
                            if(response.data.saved) {
                                vm.$router.push(vm.redirect)
                            }
                        })
                        .catch(function(error) {
                            Vue.set(vm.$data, 'errors', error.response.data)
                        })
            }
        }
    }
</script>