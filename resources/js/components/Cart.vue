<template>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    My Cart <i class="fa fa-shopping-cart"></i>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <th></th>
                        <th>Name</th>
                        <th>Brand</th>
                        <th>Finish</th>
                        <th>Unit Price</th>
                        <th>Qty</th>
                        <th>Total</th>
                        <th></th>
                        </thead>
                        <tbody>
                        <tr v-for="(item, index) in items">
                            <td><img class="product" :src="`/storage/${item.lipstick.image}`" alt=""></td>
                            <td>{{item.lipstick.name}}</td>
                            <td>{{item.lipstick.brand.name}}</td>
                            <td>{{item.lipstick.finish.name}}</td>
                            <td>{{item.lipstick.price}}</td>
                            <td>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-secondary" type="button"
                                                @click="deduct(item, index)">-
                                        </button>
                                    </div>
                                    <input readonly type="number" v-model="item.quantity"
                                           class="form-control text-center">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button"
                                                @click="item.quantity++">+
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td>{{item.quantity * item.lipstick.price}}</td>
                            <td>
                                <button @click="removeItem(index)" class="btn btn-dark btn-sm"><i
                                        class="fa fa-remove"></i>
                                </button>
                            </td>
                        </tr>
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="6" class="text-right">TOTAL PRICE</td>
                            <td colspan="2"><strong>{{totalPrice}}</strong></td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="card-footer">
                    <button class="btn btn-sm btn-dark float-right" @click="checkOut">Check Out</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                items: []
            }
        },
        created() {
            this.fetch();
        },
        methods: {
            fetch() {
                axios.get('/cart/list')
                    .then(({data}) => {
                        this.items = data
                    })
            },
            removeItem(index) {
                axios.post('/cart/delete', {id: this.items[index].id})
                    .then(({data}) => this.items.splice(index, 1))
            },
            deduct(item, index) {
                if (item.quantity === 1) {
                    this.removeItem(index)
                }
                else {
                    item.quantity--
                }
            },
            checkOut() {
                axios.post('/transaction')
                    .then(({data}) => window.location.href = `/transaction/${data}`);
            }
        },
        computed: {
            totalPrice() {
                return this.items.map(item => item.quantity * item.lipstick.price).reduce((a, b) => a + b, 0)
            }
        },
        watch: {
            totalPrice() {
                axios.post('/cart/update', {items: this.items})
            }
        }
    }
</script>

<style scoped>
    img.product {
        border-radius: 50%;
        max-width: 32px;
    }
</style>