<template>
  <div class="cart">
    <p class="cart-title">Shopping Cart</p>
    <p class="cart-empty" v-if="total == 0">Your Shopping Cart is Empty!</p>
    <div class="items" v-else>
      <div class="item clearfix" v-for="item in items">
        <img :src="'/img/site/products/' + item.image" class="item-image">
        <div class="item-details">
          <p class="item-title">{{item.title}}</p>
          <p class="item-price">
            <span>x{{item.qty}}</span>
            <span class="right">$ {{item.qty * item.price}}</span>
          </p>
        </div>
      </div>
    </div>
    <div class="cart-total">
      <span>Total</span>
      <span class="right">$ {{total}}</span>
    </div>
  </div>
</template>
<script>
  import State from '../shoppingCartState'
  import _ from 'lodash'

  export default {
    data() {
      return {
        items: State.data.cart
      }
    },
    computed: {
      total () {
        return _.sumBy(this.items, function(item) {
          return (item.price * item.qty)
        })
      }
    }
  }
</script>
