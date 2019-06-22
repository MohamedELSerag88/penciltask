<template>
    <div class="product_image_area">
                <router-link :to="{name: 'products'}" class="btn btn-xs btn-primary" >Back</router-link>                
        <div class="container">
            <div class="row s_product_inner">
                <div class="col-lg-6">
                    <img :src="product.image" alt=""  style="width:100%;height:100%"/>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="s_product_text">
                        <h3 >Name : {{ product.name }}</h3>
                        <h2 >Price :$ {{ product.price }}</h2>
                        <h2>Code :  {{ product.code }}</h2>
                    
                        <p>
                           {{ product.description }}
                        </p>
                    </div>
                </div>
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
                    app.product = resp.data;
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
                    description : ''
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