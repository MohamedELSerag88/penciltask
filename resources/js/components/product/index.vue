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
                <div class="col-md-4" v-for="product, index in products" v-bind:key="product.id">
                    <figure class="card card-product">
                        <div class="img-wrap"><img :src="product.image"></div>
                        <figcaption class="info-wrap">
                                <h4 class="title">{{ product.name }}</h4>
                                <!-- rating-wrap.// -->
                        </figcaption>
                        <div class="bottom-wrap">
                            
                            <a href="#" class="btn btn-sm btn-danger float-right" v-on:click="deleteEntry(product.hashid, index)">Delete</a>	
                            <router-link :to="{name: 'Editproduct', params: {id: product.hashid}}" class="btn btn-sm btn-primary float-righ" >Edit</router-link>
                            <router-link :to="{name: 'Viewproduct', params: {id: product.hashid}}" class="btn btn-sm btn-primary float-righ" >View</router-link>
                            <div class="price-wrap h5">
                                <span class="price-new">$ {{ product.price }}</span> 
                            </div> <!-- price-wrap.// -->
                        </div> <!-- bottom-wrap.// -->
                    </figure>
                </div>
                
            </div>
            <!-- <div class="row">
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
            </div> -->
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
                        this.products = res
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

<style>
.card-product .img-wrap {
    border-radius: 3px 3px 0 0;
    overflow: hidden;
    position: relative;
    height: 220px;
    text-align: center;
}
.card-product .img-wrap img {
    max-height: 100%;
    max-width: 100%;
    object-fit: cover;
}
.card-product .info-wrap {
    overflow: hidden;
    padding: 15px;
    border-top: 1px solid #eee;
}
.card-product .bottom-wrap {
    padding: 15px;
    border-top: 1px solid #eee;
}

.label-rating { margin-right:10px;
    color: #333;
    display: inline-block;
    vertical-align: middle;
}

.card-product .price-old {
    color: #999;
}
</style>
