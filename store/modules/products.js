const state = {
    products: null
};

const getters = {
    PRODUCTS: state => {
        return state.products;
    }
};

const mutations = {
    setProducts: (state, payload) => {
        state.products = payload;
    }
};

const actions = {
    loadProductsByWord: async (context, word) => {
        await axios.get('/search/' + word)
            .then((response) => {
                let validItems = response.data.filter(item => {
                    return item['onSale'] && item['price'] > 0;
                });
                validItems.map(item => {
                    item['displayName'] = item['title'];
                    item['currencySymbol'] = '$';
                });
                context.commit('setProducts', validItems);
            })
            .catch(() => {
                context.commit('setProducts', null);
            })
    },
    loadInitialProducts: async (context) => {
        await axios.get('/initialProducts')
            .then((response) => {
                let validItems = response.data.filter(item => {
                    return item['discountPrice'] > 0;
                });
                let updatedItems = validItems.map(item => {
                    item['price'] = item['discountPrice'];
                    item['currencySymbol'] = '$';
                    return item;
                });
                context.commit('setProducts', updatedItems);
            })
            .catch((error) => {
                console.log(error);
            })
    },
    loadProductsByCategoryId: async (context, id) => {
        await axios.get('/searchByCategory/' + id)
            .then((response) => {
                let validItems = response.data.filter(item => {
                    return item['discountPrice'] > 0;
                });
                let updatedItems = validItems.map(item => {
                    item['price'] = item['discountPrice'];
                    item['currencySymbol'] = '$';
                    return item;
                });
                context.commit('setProducts', updatedItems);
            })
            .catch((error) => {
                console.log(error);
            })
    }
};

export default {
    state,
    getters,
    mutations,
    actions,
};
