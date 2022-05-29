<template>
    <div class="header-search">
        <button class="search-toggle">
            <i class="search-icon bardy bardy-search"></i>
            <i class="close-icon bardy bardy-cancel"></i>
        </button>
        <div class="header-search-form">
            <form action="#">
                <input type="search" placeholder="Search our store">
                <button type="submit"><i class="bardy bardy-search"></i></button>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    name: "SearchForm"
}
</script>

<style scoped>

</style>
