<template>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center section-heading probootstrap-animate">
                    <h2> Products</h2>
                </div>
                <router-link :to="{name: 'createproduct'}" class="btn btn-xs btn-primary" >Add New Product</router-link>
                <router-link :to="{name: 'customfield'}" class="btn btn-xs btn-primary" style="margin-left: 20px;">Add New Custom Field</router-link>

            </div>
            <div class="row">
                <div class="col-md-4 probootstrap-animate card card-body" v-for="product, index in products" v-bind:key="product.id">
                    <div class="probootstrap-card with-hover">
                        <div class="probootstrap-card-media">
                            <a href="#"><img :src="product.image" class="img-responsive img-border" alt="image"></a>
                        </div>
                        <div class="probootstrap-card-text">
                            <h2 class="probootstrap-card-heading mb0">{{ product.name }}</h2>
                            <router-link :to="{name: 'Viewproduct', params: {id: product.hashid}}" class="btn btn-xs btn-primary" >View</router-link>
                            <router-link :to="{name: 'Editproduct', params: {id: product.hashid}}" class="btn btn-xs btn-primary" >Edit</router-link>
                            <a href="#" class="btn btn-xs btn-danger" v-on:click="deleteEntry(product.hashid, index)">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</template>

<script>
    export default {
        data(){
                return {
                    products : [],
                    product : {
                        hashid : '',
                        name : '',
                        code : '',
                        image : '',
                        description : ''
                    },
                    product_id : '',
                    pagination : {},
                    edit : false
                };
            },
            created() {
                this.fetchproducts();
            },
            methods: {
                fetchproducts() {
                    fetch('/api/products')
                    .then(res => res.json())
                    .then(res => {
                        this.products = res.data
                    });
                },
                deleteEntry(id, index) {
                if (confirm("Do you really want to delete it?")) {
                    var app = this;
                    axios.delete('/api/products/' + id)
                        .then(function (resp) {
                            app.products.splice(index, 1);
                            console.log('success');
                        })
                        .catch(function (resp) {
                            alert("Could not delete product");
                            console.log(resp);

                        });
                }
            }
        
            }
    }
</script>