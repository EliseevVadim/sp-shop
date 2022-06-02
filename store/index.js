import Vue from "vue";
import Vuex from "vuex";
import products from "./modules/products";
import cart from "./modules/cart";
import categories from "./modules/categories";

Vue.use(Vuex);

export const store = new Vuex.Store({
    state: {},
    getters: {},
    mutations: {},
    actions: {},
    modules: {
        products,
        cart,
        categories
    }
});
