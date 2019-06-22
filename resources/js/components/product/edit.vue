<template>
    <div>
        <img slot="img" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABoAAAAaCAYAAACpSkzOAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAIZSURBVEhL5ZRPS1RhFMZnY9y5d/5gVjcFhQQLRLBASE1dDMkYBRWCzWxape6cxo0LFyUIunE7n6AhcSEK7oQQTJJQBD9En6Pfc+8ZJ2Goy527iDrwcM5z/r7ve9/7pv5dyWazXZ7nfQSbSSCTyXzI5XI3rX1TCK4TXEU/TQLWa93aNwVnjeAEusruxrEXwSR457puEX8Z/3P0nGB2mdiMcpQLr6gWXYWrV83aN0VOBcErkh9Yg0H809iPsKfS6fQI+olg9pRiylEudS9Ui/0S/H6Q0bblPx6EfRtfyxslOI7Ty/fpbvB8Pn/PSgOJPIiPOoav5T8iENetKzQ4tbNWGkjkQe1K5EHYuqJnf8B3jrDPSq4Jsb9sR3yDAfhCFHApnlnZleCPNgg+BF+JAnJLwMeeR2+g9c5VQbJHp6bUnqHf6+lCv4HX5QO3LC2UuIOoW6buE2ZH6Em5phXTP3aC6YQeJM4gVn9Xq8a8EXqCPrs8uD1GxSvkrBiNN4j8BeqqRgOBH/x65X3fx+WdGo03iJoNdlXEdKn9DHbADw0z+7Xy0BfSgUC2SJjjzeqMCvLXQEn1evvw9dPnC5iQjTv4XvBL6UD4b+5TtIfzMCrIP0LXrUUg+K4dHX1Hydk2Gl9ovA8KRrV6Pa6Nm+cS+8rxDhuPLzS6A47BEvTqarOTx/hOGPLWXImIVr4MvrGjc3Cp42LIwzCcSv0E/hqguVLtJVcAAAAASUVORK5CYII=">
        <form slot="form" id="product_edit_form" class="clearfix" enctype="multipart/formdata">
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
                    <div class="form-group col-md-6" v-for="attribute ,index  in customattributes">
                        <label class="col-md-4 control-label">{{ attribute.name }}</label>
                        <label class="col-md-4 control-label">  {{ attribute.name }}</label>
                        <div class="col-md-8 inputGroupContainer">
                            <div class="input-group">
                                <input :placeholder="attribute.name" class="form-control"   type="text">
                            </div>
                        </div>
                    </div>
                    <!-- <div class="form-group">
                        <label class="col-md-4 control-label">Other Fileds</label>
                        <div class="col-md-8 inputGroupContainer">
                            <div class="input-group">
                                <input  name="custom" placeholder="Full Name" class="form-control" required="true"  type="text">
                            </div>
                        </div>
                    </div> -->
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
                <button  @click="edit" class="btn btn-success">Save Edit</button>   
            </fieldset>
        </form>
    </div>
</template>

<script>
    import router from '../../routes';

    export default {
        
        data: function() {
            return {
                product: {
                    name:'',
                    code :'',
                    price :'',
                    description:'',  
                    image: null,
                    attributes :[]
                },
                customattributes:{
                    
                }
            }
        },
        
        methods: {
            edit: function(){
                var app = this;
                var newproduct =app.product;
                axios.patch('/api/products/'+app.productId,newproduct)
                .then(function (resp) {
                    console.log(resp);
                    alert('success');
                   app.$router.replace('/');
                }).catch(function (error) {
                    console.log(error)
                });
            },
        },
        mounted() {
            let app = this;
            let id = app.$route.params.id;
            app.productId = id;
            axios.get('/api/products/' + id+ '/edit')
                .then(function (resp) {
                    app.product = resp.data.product;
                    app.product.attributes = resp.data.attributes;
                    app.customattributes = resp.data.allattribute;
                })
                .catch(function () {
                    alert("Could not load your Product")
                });
        },
    }
</script>
