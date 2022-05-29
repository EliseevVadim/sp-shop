<template>
    <div class="header-mini-cart">
        <button class="mini-cart-toggle">
            <i class="icon bardy bardy-shopping-cart"></i>
            <span class="number">2</span>
        </button>
        <div class="mini-cart-dropdown">
            <h4 class="cart-title">Your cart</h4>
            <div class="cart-item-wrap">
                <div class="cart-item">
                    <div class="thumb">
                        <a href="#/"><img class="w-100" src="assets/img/shop/cart/mini1.jpg" alt="Image-HasTech"></a>
                        <a class="remove" href="javascript:void(0);"><i class="fa fa-trash-o"></i></a>
                    </div>
                    <div class="content">
                        <h5 class="title"><a href="#/">5. Simple product</a></h5>
                        <span>1 x Tk 50.00</span>
                    </div>
                </div>
                <div class="cart-item">
                    <div class="thumb">
                        <a href="#/"><img class="w-100" src="assets/img/shop/cart/mini2.jpg" alt="Image-HasTech"></a>
                        <a class="remove" href="javascript:void(0);"><i class="fa fa-trash-o"></i></a>
                    </div>
                    <div class="content">
                        <h5 class="title"><a href="#/">2. New badge product - m / gold</a></h5>
                        <span>1 x Tk 80.00</span>
                    </div>
                </div>
            </div>
            <div class="mini-cart-footer">
                <h4>Subtotal: <span class="total">Tk 130.00</span></h4>
                <div class="cart-btn">
                    <a href="shop-cart.html">View Cart</a>
                    <a href="shop-checkout.html">Checkout</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Cart"
}
</script>

<style scoped>

</style>
