<template>
    <div class="fixed-action-btn horizontal">
        <button @click="showForm" class="btn-floating btn-large red">
            <i class="large material-icons">chat</i>
        </button>
        <div v-if="show">
            <transition>
                <div v-if="formchat">
                    <div class="background blue-grey">
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
                </div>
                <div v-else="startchat" class="background grey">

                        <div class="background white">
                            <div id="headerchat" class="background grey">
                                <h5>Messages</h5>
                            </div>
                            <div class="background white" >
                                <p class="alert-danger">Olá {{visitor.name}}, em que posso ajudar?</p>
                                <div id="messages"  v-for="chat in messages">
                                    <p class="alert-info">{{ chat.user.name}}: {{ chat.message}} </p>
                                </div>
                            </div>
                            <div id="sendMessage" class="background grey">
                                <form @submit.prevent="sendMessage()">
                                   <div class="row background grey">
                                       <input
                                              type="hidden"
                                              name="visitor_id"
                                              v-model="message.visitor_id">
                                       <div class="form-group background white">
                                           <input @keyup.enter="submit"
                                                  type="text"
                                                  name="message"
                                                  v-model="message.message">
                                       </div>
                                   </div>
                                </form>
                            </div>
                        </div>
                </div>
            </transition>
        </div>
    </div>
</template>
<script>
    import LocalStorage from '../../services/localStorage'
    export default{
        data() {
            return {
                show : false,
                formchat : false,
                startchat : false,
                newmessage: '',
                visitor: {
                    name : '',
                    email: '',
                    phone: ''
                },
                mensage:{
                    visitor_id:'',
                    user_id:'',
                    message:''
                },
                messages: []

            }
        },
        methods : {
            showForm(){
                if(LocalStorage.getObject('visitor') != null){
                    this.visitor = LocalStorage.getObject('visitor');
                    this.messages = this.getMessages();
                    this.startchat = true;
                    this.formchat = false;
                }else{
                    this.formchat = true;
                    this.startchat = false;
                }
                return this.show = !this.show;
            },
            chat(){
                let openChat = Vue.http.post('api/sitechat',{
                    name : this.visitor.name,
                    email : this.visitor.email,
                    phone : this.visitor.phone
                });
                //console.log(Visitor);
                openChat.then((response)=>{
                    console.log(response.data);
                    LocalStorage.setObject('visitor',response.data.visitor);
                    this.messages = this.getMessages();
                    this.formchat = false;
                    this.startchat = true;
                }).catch(()=>{
                    LocalStorage.remove('visitor');
                    this.formchat=true;
                    this.startchat = false;
                    console.log('Não foi criado um chat para esse usuário');
                });
            },
            getMessages(){
                let get = Vue.http.post('api/messages',{
                    visitor: LocalStorage.getObject('visitor')
                });
                get.then((response)=>{
                    console.log(response.data.messages);
                    this.messages = response.data.messages;
                });
            },
            sendMessage(){
                this.message.visitor_id = LocalStorage.getObject('visitor');
                let sendMsg = Vue.http.post('api/sendmessage',this.message);
                sendMsg.then(()=>{

                    this.messages.push(this.message);

                })
            }
        }
    }
</script>
