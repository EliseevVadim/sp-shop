<template>
    <div>
        <notifications group="cart-adding-message" position="top left"/>
        <notifications group="general-message" position="top center"/>
    </div>
</template>

<script>
export default {
    name: "MyNotifications",
    mounted() {
        window.$alertHub.$on('new-alert', (message) => {
            this.$notify({
                group: 'general-message',
                title: 'Результат поиска',
                text: message,
                type: 'error'
            })
        });
    }
}
</script>

<style scoped>

</style>
