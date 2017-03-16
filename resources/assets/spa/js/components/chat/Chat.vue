<template>
    <div>
        <div class="fixed-action-btn horizontal">
            <button @click="showForm" class="btn-floating btn-large red">
                <i class="large material-icons">chat</i>
            </button>
            <div class="background blue-grey">
                <transition name="fade">
                    <div v-if="show">
                        <form @submit.prevent="chat()" method="post" class="right-align" style="width: 300px">
                           <div class="container">
                               <div class="row">
                                   <input type="text" name="name" v-model="visitor.name" placeholder="Your name" required >
                               </div>
                               <div class="row">
                                   <input type="text" name="email" v-model="visitor.email" placeholder="Your Email" required>
                               </div>
                               <div class="row">
                                   <input type="text" name="phone" v-model="visitor.phone" placeholder="Your phone" required>
                               </div>
                               <div class="row center-align">
                                   <button type="submit" class="waves-effect waves-light btn red" >Start</button>
                               </div>
                               <br>
                           </div>
                        </form>
                    </div>
                </transition>
            </div>
        </div>
    </div>
</template>
<script>
    export default{
        data() {
            return {
                show: false,
                visitor: {
                    name : '',
                    email: '',
                    phone: ''
                },
                user: {
                    name: '',
                    email: ''
                },
                messages:{
                      message: '',
                      user_id:''
                }
            }
        },
        methods : {
            showForm(){
                return this.show = !this.show;
            },
            chat(){
                let Visitor = Vue.http.post('api/sitechat',{
                    name : this.visitor.name,
                    email : this.visitor.email,
                    phone : this.visitor.phone

                });
                //console.log(Visitor);
                Visitor.then((response)=>{
                    this.visitor = response.data.visitor;
                    this.messages = response.data.messages;
                    this.$router.push({path:'/start'})
                });
            }
        }
    }
</script>
