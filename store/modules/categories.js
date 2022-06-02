const state = {
    categories: null
};

const getters = {
    CATEGORIES: state => {
        return state.categories;
    }
};

const mutations = {
    setCategories: (state, payload) => {
        state.categories = payload;
    }
};

const actions = {
    loadAllCategories: async (context) => {
        await axios.get('/allCategories')
            .then((response) => {
                context.commit('setCategories', response.data);
            })
            .catch((error) => {
                console.log(error.response);
            })
    }
}

export default {
    state,
    getters,
    mutations,
    actions,
};
