<template>
    <div class="col-sm-6 col-lg-4 col-xl-3">
        <div class="product-item">
            <div class="inner-content">
                <div class="product-thumb">
                    <img class="w-100" :src="this.picUrl === undefined ? '/img/blank-item.jpg' : this.picUrl" alt="Image-HasTech">
                    <div class="product-action">
                        <div class="addto-wrap">
                            <button class="btn btn-primary cart-button" @click="addToCart">
                                +
                            </button>
                            <a class="add-cart" @click="addToCart">
                                  <span class="icon">
                                    <i class="bardy bardy-shopping-cart"></i>
                                    <i class="hover-icon bardy bardy-shopping-cart"></i>
                                  </span>
                            </a>
                            <button class="btn btn-danger cart-button" @click="decreaseQuantity(url)">
                                -
                            </button>
                        </div>
                    </div>
                </div>
                <div class="product-desc">
                    <div class="product-info">
                        <h4 class="title" v-html="displayName"></h4>
                        <div class="prices">
                            <span class="price">Цена:<br>{{ this.price}} {{this.currencySymbol}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Product",
    props: ['picUrl', 'displayName', 'price', 'url', 'currencySymbol'],
    methods: {
        addToCart() {
            let addition = {
                'title' : this.displayName,
                'url' : this.url,
                'quantity' : 1,
                'price' : this.price,
                'picUrl' : this.picUrl
            }
            this.$store.dispatch('addItemToCart', addition);
            this.$notify({
                group: 'cart-adding-message',
                title: 'Оповещение о добавлении',
                text: 'Товар успешно добавлен в корзину!',
                type: 'success'
            });
        },
        increaseQuantity(item) {
            this.$store.dispatch('addItemToCart', item);
        },
        decreaseQuantity(url) {
            this.$store.dispatch('decreaseItemsQuantity', url)
                .then(() => {
                    this.$notify({
                        group: 'cart-adding-message',
                        title: 'Оповещение об удалении',
                        text: 'Единица товара была удалена из корзины',
                        type: 'error'
                    });
                });
        }
    }
}
</script>

<style scoped>
    a.add-cart {
        cursor: pointer;
    }
    .cart-button {
        font-size: 25px;
        font-weight: bolder;
    }
</style>
