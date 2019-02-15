<template>
    <ContentWrapper>
        <div class="content-heading">
            <span style="width: 80%">
                {{client.name}}
            </span>
            <router-link tag="button" :to="{path: edit_url}" :class="'btn mr-1 mb-1 btn-success'" style="color: #fff">Edit</router-link>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="card card-default border-primary">
                    <div class="card-header text-white bg-primary">
                        Products
                    </div>
                    <div class="card-body">
                        <ul>
                            <li v-for="client_products in client.client_products">
                                {{client_products.product.product_category.name}} -
                                {{client_products.product.name}}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card card-default border-success">
                    <div class="card-header text-white bg-success">
                        Logins
                    </div>
                    <div class="card-body">
                        <span v-if="client.logins[0]">Test</span>
                    </div>
                </div>
            </div>
        </div>
    </ContentWrapper>
</template>

<script>
    export default {
        name: "ClientView",
        data() {
            return {
                client: '',
                edit_url : '/clients/' + this.$route.params.slug + '/edit'
            }
        },
        mounted() {
            let self = this
            axios.get('api/clients/' + this.$route.params.slug)
                .then(function (res) {
                    self.client = res.data
                })
                .catch()
        }
    }
</script>

<style scoped>

</style>
