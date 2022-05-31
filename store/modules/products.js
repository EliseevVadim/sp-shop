const state = {
    products: null,
    chosenProduct: null
};

const getters = {
    PRODUCTS: state => {
        return state.products;
    },
    CHOSEN: state => {
        return state.chosenProduct;
    }
};

const mutations = {
    setProducts: (state, payload) => {
        state.products = payload;
    },
    setChosenProduct: (state, payload) => {
        state.chosenProduct = payload;
    }
};

const actions = {
    loadProductsByWord: async (context, word) => {
        await axios.get('/search/' + word)
            .then((response) => {
                let validItems = response.data.filter(function (item) {
                    return item['onSale'] && item['price'] > 0;
                });
                context.commit('setProducts', validItems);
            })
            .catch((error) => {
                console.log(error.response.data);
            })
    }
};

export default {
    state,
    getters,
    mutations,
    actions,
};
