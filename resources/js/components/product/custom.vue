<template>
    <div>
        <form slot="form" id="product_custom_field" class="clearfix" v-on:submit.prevent="save()">
           <fieldset>
                <div class="form-group">
                    <label class="col-md-4 control-label">Custom Field Name</label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group">
                            <input v-model="custom.name"  name="name" placeholder="Name" class="form-control" required="true"  type="text">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Description</label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group">
                            <textarea v-model="custom.description" name="description" class="form-control" required="true" ></textarea>
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
        
        data: function() {
            return {
                custom: {
                    name:'',
                    description:'' 
                },
            }
        },
        
        methods: {
            save: function(){
                var app = this;
                var newcustom =app.custom;
                axios.post('/api/createcustom', newcustom)
                    .then(function (resp) {
                        console.log(resp);
                        alert('success');
                        app.$router.push({path: '/'});
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        alert("Could not create your Custom Field");
                    });
            },
        },
    }
</script>