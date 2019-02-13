<template>
    <div class="row">
        <div class="col-lg-3">
            <div class="dropdown mb-4">
                <button class="btn btn-secondary dropdown-toggle w-100" type="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                    Filter Brands
                </button>
                <ul class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton">
                    <li v-for="brand in brands" class="p-2">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" :value="brand" :id="brand"
                                   v-model="checkedBrands">
                            <label class="form-check-label" :for="brand">
                                {{brand}}
                            </label>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="dropdown mb-4">
                <button class="btn btn-secondary dropdown-toggle w-100" type="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                    Filter Finishes
                </button>
                <ul class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton">
                    <li v-for="finish in finishes" class="p-2">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" :value="finish" :id="finish"
                                   v-model="checkedFinishes">
                            <label class="form-check-label" :for="finish">
                                {{finish}}
                            </label>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="d-flex align-items-baseline">
                <strong for="" class="w-25">Sort By </strong>
                <select v-model="sort" class="flex-grow-1 form-control">
                    <option value="price">Price</option>
                    <option value="name">Name</option>
                </select>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="row">
                <div v-for="product in filteredProducts" class="col-lg-4 pb-4">
                    <a :href="`/product/${product.id}`" class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <img class="flex-grow-1 p-2" style="max-height: 128px" :src="`/storage/${product.image}`"
                                     alt="">
                                <div class="d-flex flex-column justify-content-between flex-grow-1">
                                    <div>
                                        <h5 class="card-title">{{product.name}}</h5>
                                        <h6>${{product.price}}</h6>
                                    </div>
                                    <span class="badge-primary badge">{{product.brand.name}}</span>
                                    <span class="badge-dark badge">{{product.finish.name}}</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                products: [],
                checkedBrands: [],
                checkedFinishes: [],
                sort: "price",
            }
        },
        created() {
            this.fetch()
            console.log(this.produts)
        },
        methods: {
            fetch() {
                axios.get('/product/list')
                    .then(({data}) => {
                        this.products = data
                        this.checkedBrands = _.uniq(data.map(prod => prod.brand.name))
                        this.checkedFinishes = _.uniq(data.map(prod => prod.finish.name))
                    })
            },
        },
        computed: {
            brands() {
                return _.uniq(this.products.map(prod => prod.brand.name));
            },
            finishes() {
                return _.uniq(this.products.map(prod => prod.finish.name));
            },
            filteredProducts() {
                if (!this.checkedBrands) return this.products;
                return this.products.filter(prod => {
                    return this.checkedBrands.includes(prod.brand.name) && this.checkedFinishes.includes(prod.finish.name)
                }).sort((a, b) => {
                    if (this.sort == 'price')
                        return a.price - b.price;
                    if (a[this.sort].toUpperCase() < b[this.sort].toUpperCase()) {
                        return -1;
                    }
                    if (a[this.sort].toUpperCase() > b[this.sort].toUpperCase()) {
                        return 1;
                    }
                    return 0;
                });
            },
        }
    }
</script>

<style scoped>

</style>