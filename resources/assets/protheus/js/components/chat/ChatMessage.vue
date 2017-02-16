<template lang="html">
  <div class="chat-message">
    <p>{{ messages.message }}</p>
    <small>{{ messages.user.name }}</small>
  </div>
</template>

<script>
export default {
    props: ['messages'],
    data: {
      messages: [],
      visitor: [],
      usersInRoom: []
    },
    methods: {
      newChat(visitor) {
        // Add to existing messages
        this.visitor.(message);

        // Persist to the database etc
        axios.post('/sitechat/store', visitor).then(response => {
          // Do whatever;
        })
      },
      addMessage(message) {
        // Add to existing messages
        this.messages.push(message);

        // Persist to the database etc
        axios.post('/messages', message).then(response => {
          // Do whatever;
        })
      }
    },
    created() {
      axios.get('/messages').then(response => {
        this.messages = response.data;
      });

      Echo.join('chatroom')
              .here((users) => {
                this.usersInRoom = users;
              })
              .joining((user) => {
                this.usersInRoom.push(user);
              })
              .leaving((user) => {
                this.usersInRoom = this.usersInRoom.filter(u => u != user)
              })
              .listen('MessagePosted', (e) => {
                this.messages.push({
                  message: e.message.message,
                  user: e.user
                });
              });
    }

}
</script>


