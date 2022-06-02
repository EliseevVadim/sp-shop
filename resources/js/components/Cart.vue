<template>
    <div class="header-mini-cart">
        <button class="mini-cart-toggle" @click="showModal">
            <i class="icon bardy bardy-shopping-cart"></i>
            <span class="number">{{this.CART_ITEMS_QUANTITY}}</span>
        </button>
        <div id="modal" v-if="needToShowModal">
            <div class="modal fade show" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: block;">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header border-bottom-0">
                            <h5 class="modal-title" id="exampleModalLabel">
                                Ваша корзина
                            </h5>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" width="20" height="20" @click="closeModal" id="closeButton">
                                <path d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"/>
                            </svg>
                        </div>
                        <div class="modal-body">
                            <table class="table table-image">
                                <thead>
                                <tr>
                                    <th scope="col">Навзание</th>
                                    <th scope="col">Цена</th>
                                    <th scope="col">Количество</th>
                                    <th scope="col">Стоимость</th>
                                    <th scope="col">Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="item in this.ITEMS">
                                    <td v-html="item.title"></td>
                                    <td>{{item.price}}</td>
                                    <td>{{item.quantity}}</td>
                                    <td>{{Math.round((item.price * item.quantity) * 100) / 100}}</td>
                                    <td>
                                        <a href="#" class="btn btn-primary btn-sm" @click="increaseQuantity(item.url)">
                                            +
                                        </a>
                                        <a href="#" class="btn btn-danger btn-sm" @click="decreaseQuantity(item.url)">
                                            -
                                        </a>
                                        <a href="#" class="btn btn-danger btn-sm" @click="removeItem(item.url)">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="16" height="16">
                                                <path fill="white" d="M135.2 17.69C140.6 6.848 151.7 0 163.8 0H284.2C296.3 0 307.4 6.848 312.8 17.69L320 32H416C433.7 32 448 46.33 448 64C448 81.67 433.7 96 416 96H32C14.33 96 0 81.67 0 64C0 46.33 14.33 32 32 32H128L135.2 17.69zM394.8 466.1C393.2 492.3 372.3 512 346.9 512H101.1C75.75 512 54.77 492.3 53.19 466.1L31.1 128H416L394.8 466.1z"/>
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-danger" @click="clearCart" :disabled="this.ITEMS.length === 0">Очистить корзину</button>
                                <h5>Total: <span class="price text-success">{{this.CART_SUM}} $</span></h5>
                            </div>
                            <form v-if="this.ITEMS.length > 0">
                                <h2 class="text-center">Данные о пользователе</h2>
                                <div class="form-group">
                                    <label for="user-name" class="col-form-label">Введите свое имя:</label>
                                    <input class="form-control" id="user-name" type="text" name="name" v-model="userName" required placeholder="Ваше имя...">
                                </div>
                                <div class="form-group">
                                    <label for="user-phone" class="col-form-label">Введите свой номер телефона:</label>
                                    <input class="form-control" id="user-phone" type="text" name="phone" v-model="userPhone" required placeholder="Ваш телефон...">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer border-top-0 d-flex justify-content-between">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="closeModal">Закрыть</button>
                            <button type="button" class="btn btn-success" :disabled="this.ITEMS.length === 0" @click="confirmOrder">Подтвердить заказ</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {mapGetters} from "vuex";

export default {
    name: "Cart",
    data() {
        return {
            needToShowModal: false,
            userName : "",
            userPhone : ""
        }
    },
    methods: {
        showModal() {
            this.needToShowModal = true;
        },
        closeModal() {
            this.needToShowModal = false;
        },
        increaseQuantity(url) {
            this.$store.dispatch('increaseItemsQuantity', url);
        },
        decreaseQuantity(url) {
            this.$store.dispatch('decreaseItemsQuantity', url);
        },
        removeItem(url) {
            this.$store.dispatch('removeItem', url);
        },
        confirmOrder() {
            let order = {
                'userName' : this.userName,
                'userPhone' : this.userPhone,
                'total' : this.CART_SUM,
                'orderData' : JSON.stringify(this.ITEMS)
            };
            this.$store.dispatch('confirmOrder', order)
                .then(() => {
                    this.$notify({
                        group: 'general-message',
                        title: 'Оповещение о подтверждении',
                        text: 'Заказ успешно оформлен!',
                        type: 'success'
                    });
                })
                .catch(() => {
                    this.$notify({
                        group: 'general-message',
                        title: 'Оповещение о подтверждении',
                        text: 'Произошла ошибка заполнения личных данных!',
                        type: 'error'
                    });
                });
            this.clearText();
        },
        clearCart() {
            this.$store.dispatch('clearCart');
        },
        clearText() {
            this.userPhone = "";
            this.userName = "";
        }
    },
    computed: {
        ...mapGetters(['CART_ITEMS_QUANTITY']),
        ...mapGetters(['ITEMS']),
        ...mapGetters(['CART_SUM'])
    }
}
</script>

<style scoped>
    #modal {
        position: fixed;
        left: 20px;
        top: 100px;
    }

    #cartModal {
        position: relative;
        width: 60%;
    }
    .modal-body {
        max-height: 400px;
        overflow-y: scroll;
    }
    .modal-header {
        max-height: 60px;
    }
    .modal-content {
        position: fixed;
        width: 80%;
        top: 120%;
        left: 10%;
    }
    .table-image thead td, .table-image thead th {
        border: 0;
        color: #666;
        font-size: 0.8rem;
    }
    .table-image td, .table-image th {
        vertical-align: middle;
        text-align: center;
    }
    .table-image td.qty, .table-image th.qty {
        max-width: 2rem;
    }
    .price {
        margin-left: 1rem;
    }
    td {
        line-height: 1rem;
    }
    .modal-footer {
        padding-top: 0;
    }
    #closeButton {
        cursor: pointer;
    }
</style>
