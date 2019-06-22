<template>
    <div>
        
        <form slot="form" id="product_edit_form" class="clearfix" enctype="multipart/formdata"  v-on:submit.prevent="save()">
           <fieldset>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="col-md-4 control-label">Product Name</label>
                        <div class="col-md-8 inputGroupContainer">
                            <div class="input-group">
                                <input v-model="product.name"  name="name" placeholder="Full Name" class="form-control" required="true"  type="text">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="col-md-4 control-label">Price</label>
                        <div class="col-md-8 inputGroupContainer">
                            <div class="input-group">
                                <input v-model="product.price"  name="price" placeholder="price" class="form-control" required="true"  type="text ">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="col-md-4 control-label">Code</label>
                        <div class="col-md-8 inputGroupContainer">
                            <div class="input-group">
                                <input v-model="product.code" name="code" placeholder="Code" class="form-control" required="true"  type="text">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="col-md-4 control-label">Image</label>
                        <div class="col-md-8 inputGroupContainer">
                            <div class="input-group">
                                <input ref="file"  name="image" placeholder="Choose file" class="form-control" required="true"  type="file">
                            </div>
                            <div class="col-xs-12">
                                <img :src="product.image"  style="width:200px;object-fit:contain">
                                <p >{{ product.image }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-6" v-for="attribute ,index  in customattributes">
                        <label class="col-md-4 control-label">{{ attribute.name }}</label>
                        <div class="col-md-8 inputGroupContainer">
                            <div class="input-group">
                                <input v-model="product.attributes[index + 1]"  :placeholder="attribute.name" class="form-control"   type="text">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="col-md-4 control-label">Description</label>
                        <div class="col-md-8 inputGroupContainer">
                            <div class="input-group">
                                <textarea v-model="product.description" name="description" class="form-control" required="true" ></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <router-link :to="{name: 'products'}" class="btn btn-xs btn-primary" >Back</router-link>

                <button  class="btn btn-success">Save </button>   
            </fieldset>
        </form>
    </div>
</template>

<script>  
    import router from '../../routes';
    export default {
        data: () =>({
            product: {
                    name:'',
                    code :'',
                    price :'',
                    description:'',  
                    image: '',
                    attributes:[]
                },
                image:'',
                customattributes:{
                    
                }
        }),
        methods :{
            save: function(){
                var app = this;
                var newproduct =app.product;
                axios.post('/api/products', newproduct)
                    .then(function (resp) {
                        console.log(resp);
                        alert('success');
                        app.$router.push({path: '/'});
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        alert("Could not create your Product");
                    });
            },
        },
        mounted() {
            let app = this;
            axios.get('/api/getcustoms')
                .then(function (resp) {
                    app.customattributes = resp.data;
                })
                .catch(function () {
                });
        },
    }
</script>

