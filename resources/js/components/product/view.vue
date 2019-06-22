<template>
    <div class="product_image_area">
        <div class="container">

            <div class="row">

                <div class="col-lg-3">
                    <h1 class="my-4">Product Details</h1>
                    <router-link :to="{name: 'products'}" class="btn btn-xs btn-primary " >Home</router-link>                
                </div>
                <!-- /.col-lg-3 -->

                <div class="col-lg-9">

                    <div class="card mt-4">
                        <img class="card-img-top img-fluid" :src="product.image" alt="">
                        <div class="card-body">
                            <h3 class="card-title">{{ product.name }}</h3> <h6>Code : {{ product.code }}</h6>
                            <h4>$ {{ product.price }}</h4>
                            <p class="card-text">{{ product.description }}</p>
                        </div>
                    </div>
                    <!-- /.card -->

                    <div class="card card-outline-secondary my-4">
                        <div class="card-header">
                            Product Custom Fields
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col" >Custom Attribute</th>
                                        <th scope="col" >Value</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="attribute in customattributes">
                                        <td>{{ attribute.name }}</td>
                                        <td>{{ attribute.pivot.value }}</td>
                                    </tr>
                                    
                                    
                                    
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col-lg-9 -->

            </div>

        </div>
    </div>
</template>


<script>
    import router from '../../routes';

    export default {
        mounted() {
            let app = this;
            let id = app.$route.params.id;
            app.productId = id;
            axios.get('/api/products/' + id)
                .then(function (resp) {
                    app.product = resp.data.product;
                    app.customattributes = resp.data.attributes;
                    console.log(app.product);
                })
                .catch(function () {
                    alert("Could not load your Product")
                });
        },
        data(){
            return {
                productId :null,
                product : {
                    name : 'hghjg',
                    image :'',
                    code : '',
                    price : '',
                    description : '',
                    otherattributes: []
                },
                customattributes:{
                    
                },
                edit : false
            };
        },
            // beforeRouteEnter (to, from, next) {
            //     fetch('/api/products/'.$router.params.id)
            //         .then(res => res.json())
            //         .then(res => {
            //             this.product = res.data
            //         });
            // },
            methods: {
                
            }
    }
</script>