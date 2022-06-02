<template>
    <ul class="submenu-nav">
        <li v-for="category in this.CATEGORIES">
            <a @click="searchByCategory(category.id)">{{category.name}}</a>
        </li>
    </ul>
</template>

<script>
import {mapGetters} from "vuex";
export default {
    name: "CategoriesList",
    mounted() {
        this.$store.dispatch('loadAllCategories');
    },
    computed: {
        ...mapGetters(['CATEGORIES'])
    },
    methods: {
        searchByCategory(id) {
            console.log(id);
            this.$store.dispatch('loadProductsByCategoryId', id);
        }
    }
}
</script>

<style scoped>
    li > a {
        cursor: pointer;
    }
</style>
