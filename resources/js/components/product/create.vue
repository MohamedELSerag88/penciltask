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
                                <input v-model="product.price"  name="price" placeholder="price" class="form-control" required="true"  type="number">
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
                        <div class="col-md-8 inputGroupContainer">
                            <div class="input-group">
                                <input v-model="product.attributes[attribute.id]"  :placeholder="attribute.name" class="form-control"   type="text">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="col-md-4 control-label">Image</label>
                        <div class="col-md-8 inputGroupContainer">
                            <div class="input-group">
                                <a class="btn btn-xs btn-primary" @click="onPickFile" style="height: max-content;"> Upload Photo</a>  
                                <input type="file"  @change="selectedfile" style="display:none" accept="image/*" ref="file">           

                                <div>
                                    <img :src="imageURL" alt="" height="200">

                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group col-md-6">
                        <label class="col-md-4 control-label">Description</label>
                        <div class="col-md-8 inputGroupContainer">
                            <div class="input-group">
                                <textarea v-model="product.description" name="description" class="form-control" ></textarea>
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
                        image:null,
                        description:'',  
                        attributes:[]
                    },
            productId:null,        
            image: null,
            SelectedFile:null,
            imageURL:null,
            customattributes:{
                
                            }
        }),
        methods :{
            save: function(){
                var app = this;
                var newproduct =app.product;
                console.log(app.product.image);
                axios.post('/api/products',newproduct)
                    .then(function (resp) { 
                        app.product = resp.data;
                        app.productId= app.product.id; 
                        var formdata = new FormData();
                        formdata.append('image',app.image,app.image.name);
                        axios.post('/api/uploadimage/'+app.productId,formdata)
                        .then(function (resp) {
                                app.$router.push({path: '/'});
                        }).catch(function (error) {
                        });  
                    })
                    .catch(function (resp) {
                        alert("Could not create your Product");
                    });
                  
            },
            onPickFile :function(){
                this.$refs.file.click();
            },
            selectedfile (event){
                var app = this;
                app.image = event.target.files[0];
                var filename = app.image.name;
                var filereader = new FileReader();
                filereader.addEventListener('load',function(){
                app.imageURL = filereader.result;
                });
                filereader.readAsDataURL(app.image);
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

