const state = {
    cartItems: JSON.parse(localStorage.getItem('cart')) === null ? [] : JSON.parse(localStorage.getItem('cart')),
    chosenItem: null
};

const getters = {
    ITEMS: state => {
        return state.cartItems;
    },
    CART_ITEMS_QUANTITY: state => {
        return state.cartItems.length;
    },
    CART_SUM: state => {
        let sum = 0;
        for (let i = 0; i < state.cartItems.length; i++) {
            sum += state.cartItems[i].price * state.cartItems[i].quantity;
        }
        return sum;
    }
};

const mutations = {
    addItem: (state, payload) => {
        state.cartItems.push(payload);
        localStorage.setItem('cart', JSON.stringify(state.cartItems));
    },
    clearCart: (state) => {
        state.cartItems = [];
        localStorage.setItem('cart', JSON.stringify(state.cartItems));
    },
    increaseQuantity(state, index) {
        state.cartItems[index].quantity++;
        localStorage.setItem('cart', JSON.stringify(state.cartItems));
    },
    decreaseQuantity(state, index) {
        if (state.cartItems[index].quantity === 1) {
            state.cartItems.splice(index, 1);
            localStorage.setItem('cart', JSON.stringify(state.cartItems));
            return;
        }
        state.cartItems[index].quantity--;
        localStorage.setItem('cart', JSON.stringify(state.cartItems));
    },
    deleteItem(state, index) {
        state.cartItems.splice(index, 1);
        localStorage.setItem('cart', JSON.stringify(state.cartItems));
    }
};

const actions = {
    addItemToCart: ({commit, state}, payload) => {
        let index = state.cartItems.findIndex(function (elem) {
            return elem.url === payload.url;
        })
        if (index === -1) {
            commit('addItem', payload);
            return;
        }
        state.cartItems[index].quantity++;
    },
    increaseItemsQuantity({commit, state}, url) {
        let index = state.cartItems.findIndex(function (elem) {
            return elem.url === url;
        });
        if (index === -1)
            return;
        commit('increaseQuantity', index);
    },
    decreaseItemsQuantity({commit, state}, url) {
        return new Promise((resolve, reject) => {
            let index = state.cartItems.findIndex(function (elem) {
                return elem.url === url;
            });
            if (index === -1)
                reject();
            commit('decreaseQuantity', index);
            resolve();
        })

    },
    removeItem({commit, state}, url) {
        let index = state.cartItems.findIndex(function (elem) {
            return elem.url === url;
        });
        if (index === -1)
            return;
        commit('deleteItem', index);
    },
    confirmOrder(context, order) {
        let formData = new FormData();
        formData.append('userName', order.userName);
        formData.append('userPhone', order.userPhone);
        formData.append('total', order.total);
        formData.append('orderData', order.orderData);
        return new Promise((resolve, reject) => {
            axios.post('/addOrder', formData)
                .then(() => {
                    context.commit('clearCart');
                    resolve();
                })
                .catch((error) => {
                    console.log(error);
                    reject(error);
                })
        });
    },
    clearCart(context) {
        context.commit('clearCart');
    }
};

export default {
    state,
    getters,
    mutations,
    actions
};
