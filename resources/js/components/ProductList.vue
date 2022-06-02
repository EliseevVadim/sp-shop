<template>
    <div>
        <notifications group="cart-adding-message" position="top left"/>
        <notifications group="general-message" position="top center"/>
        <div class="col-12">
            <div class="product-header-wrap">
                <div class="grid-list-option">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-grid-tab" data-bs-toggle="tab" data-bs-target="#nav-grid" type="button" role="tab" aria-controls="nav-grid" aria-selected="true"><span data-bg-img="assets/img/icons/1.webp" style="background-image: url(&quot;assets/img/icons/1.webp&quot;);"></span></button>
                            <button class="nav-link" id="nav-list-tab" data-bs-toggle="tab" data-bs-target="#nav-list" type="button" role="tab" aria-controls="nav-list" aria-selected="false"><span data-bg-img="assets/img/icons/1.webp" style="background-image: url(&quot;assets/img/icons/1.webp&quot;);"></span></button>
                        </div>
                    </nav>
                </div>
                <div class="show-product-area">
                    <p class="show-product">Showing {{currentPage * recordsPerPage + 1}} - {{Math.min((currentPage + 1) * recordsPerPage, this.PRODUCTS.length)}} of {{this.PRODUCTS.length}} result</p>
                </div>
            </div>
            <div class="product-body-wrap">
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade active show" id="nav-grid" role="tabpanel" aria-labelledby="nav-grid-tab">
                        <div class="row">
                            <product v-bind:picUrl="product.picUrl"
                                     v-bind:displayName="product.displayName"
                                     v-bind:price="product.price"
                                     v-bind:url="product.url"
                                     v-bind:currencySymbol="product.currencySymbol"
                                     :key="index" v-for="(product, index) in customProductList">
                            </product>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="pagination-content-wrap">
                                    <nav class="pagination-nav">
                                        <ul class="pagination justify-content-center">
                                            <li>
                                                <a class="prev" v-bind:class="{disabled: currentPage === 0}" @click="loadPrevPage">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="20" height="20">
                                                        <path d="M447.1 256C447.1 273.7 433.7 288 416 288H109.3l105.4 105.4c12.5 12.5 12.5 32.75 0 45.25C208.4 444.9 200.2 448 192 448s-16.38-3.125-22.62-9.375l-160-160c-12.5-12.5-12.5-32.75 0-45.25l160-160c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25L109.3 224H416C433.7 224 447.1 238.3 447.1 256z"/>
                                                    </svg>
                                                    Back
                                                </a>
                                            </li>
                                            <li v-for="page in pages">
                                                <a
                                                    v-bind:class="{disabled: page === currentPage}"
                                                    @click="setPage(page)">
                                                    {{page + 1}}
                                                </a>
                                            </li>
                                            <li>
                                                <a class="next" v-bind:class="{disabled: currentPage === pages[pages.length - 1]}" @click="loadNextPage">Next
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="20" height="20">
                                                        <path d="M438.6 278.6l-160 160C272.4 444.9 264.2 448 256 448s-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L338.8 288H32C14.33 288 .0016 273.7 .0016 256S14.33 224 32 224h306.8l-105.4-105.4c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l160 160C451.1 245.9 451.1 266.1 438.6 278.6z"/>
                                                    </svg>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {mapGetters} from "vuex"
export default {
    name: "ProductList",
    data() {
        return {
            recordsPerPage: 12,
            currentPage: 0
        }
    },
    methods: {
        setPage(number) {
            this.currentPage = number;
        },
        loadNextPage() {
            if (this.currentPage === this.pages[this.pages.length - 1])
                return;
            this.currentPage++;
        },
        loadPrevPage() {
            if (this.currentPage === 0)
                return;
            this.currentPage--;
        }
    },
    created() {
        this.$store.dispatch('loadInitialProducts');
    },
    computed: {
        ...mapGetters(['PRODUCTS']),
        pages() {
            let numberOfPages = Math.ceil(this.PRODUCTS.length / this.recordsPerPage);
            let pages = [];
            for (let i = 0; i < numberOfPages; i++) {
                pages.push(i);
            }
            return pages;
        },
        customProductList() {
            return this.PRODUCTS.slice(this.currentPage * this.recordsPerPage, this.currentPage * this.recordsPerPage + this.recordsPerPage);
        }
    }
}
</script>

<style scoped>
    li > a {
        cursor: pointer;
    }
</style>
