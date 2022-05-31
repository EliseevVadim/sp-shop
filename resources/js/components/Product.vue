<template>
    <div class="col-sm-6 col-lg-4 col-xl-3">
        <div class="product-item">
            <div class="inner-content">
                <div class="product-thumb">
                    <img class="w-100" :src="this.picUrl" alt="Image-HasTech">
                    <div class="product-action">
                        <div class="addto-wrap">
                            <a class="add-cart" @click="addToCart">
                                  <span class="icon">
                                    <i class="bardy bardy-shopping-cart"></i>
                                    <i class="hover-icon bardy bardy-shopping-cart"></i>
                                  </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="product-desc">
                    <div class="product-info">
                        <h4 class="title">{{this.title}}</h4>
                        <div class="prices">
                            <span class="price">Цена:<br>{{ this.price}} ₽</span>
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
    props: ['picUrl', 'title', 'price', 'companyId', 'itemId'],
    methods: {
        addToCart() {
            console.log(this.title);
        }
    }
}
</script>

<style scoped>
    a.add-cart {
        cursor: pointer;
    }
</style>
