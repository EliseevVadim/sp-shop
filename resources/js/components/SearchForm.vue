<template>
    <div class="header-search">
        <button class="search-toggle">
            <i class="search-icon bardy bardy-search"></i>
            <i class="close-icon bardy bardy-cancel"></i>
        </button>
        <div class="header-search-form">
            <form @submit.prevent="search">
                <input type="search" placeholder="Search our store" v-model="word">
                <button type="submit"><i class="bardy bardy-search"></i></button>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    name: "SearchForm",
    data() {
        return {
            word : ""
        }
    },
    methods: {
        search() {
            if (this.word === "")
                return;
            this.$store.dispatch('loadProductsByWord', this.word);
        }
    }
}
</script>

<style scoped>

</style>
