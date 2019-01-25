<template>
    <div class="row">
        <div class="col-md-8 mb-3">
            <div class="card">
                <div class="card-header">
                    Brand List
                </div>
                <div class="card-body">
                    <input type="text" class="form-control mb-3" placeholder="Search Brand" v-model="search">
                    <table class="table table-bordered table-sm">
                        <thead>
                        <th>Name</th>
                        <th>Created</th>
                        </thead>
                        <tbody>
                        <tr v-for="brand in filteredBrands">
                            <td>{{brand.name}}</td>
                            <td>{{brand.created_at}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Add Brand</div>
                <div class="card-body">
                    <form @submit.prevent="add">
                        <input type="text" class="form-control" placeholder="Brand Name" v-model="name">
                        <button class="btn btn-sm text-white bg-dark float-right mt-3">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['brandprop'],
        data() {
            return {
                search: "",
                name: "",
                brands: []
            }
        },
        created() {
            this.brands = this.brandprop
        },
        methods: {
            add() {
                axios.post('/admin/brand', {name: this.name})
                    .then(({data}) => {
                        this.brands.push(data)
                        this.name = ""
                    })
            }
        },
        computed: {
            filteredBrands() {
                return this.brands.filter(brand => brand.name.toLowerCase().match(this.search.toLowerCase()))
            }
        }
    }
</script>

<style scoped>

</style>