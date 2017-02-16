<template>
  <div>
            <div v-for="product in products">
              <div class="card">
                <div class="card-image">
                 <!-- <img :src="'/img/site/products/product.png'" class="image">-->
                  <span class="card-title">{{ product.name}}</span>
                  <a class="btn-floating halfway-fab waves-effect waves-light red">
                    <i class="material-icons">shopping_cart</i>
                  </a>
                  <div class="card-content">
                    <p class="price">
                      <span>$ {{product.description}}</span>
                      <span class="qty" ></span>
                    </p>
                  </div>
                </div>
              </div>
            </div>
  </div>
</template>
<script>

  export default {

    data(){
      return {
        products : 'products'
      }
    },
    ready(){

        console.log(this.products);
    }

  }
</script>
