<template>
    <div>
        <img slot="img" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABoAAAAaCAYAAACpSkzOAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAIZSURBVEhL5ZRPS1RhFMZnY9y5d/5gVjcFhQQLRLBASE1dDMkYBRWCzWxape6cxo0LFyUIunE7n6AhcSEK7oQQTJJQBD9En6Pfc+8ZJ2Goy527iDrwcM5z/r7ve9/7pv5dyWazXZ7nfQSbSSCTyXzI5XI3rX1TCK4TXEU/TQLWa93aNwVnjeAEusruxrEXwSR457puEX8Z/3P0nGB2mdiMcpQLr6gWXYWrV83aN0VOBcErkh9Yg0H809iPsKfS6fQI+olg9pRiylEudS9Ui/0S/H6Q0bblPx6EfRtfyxslOI7Ty/fpbvB8Pn/PSgOJPIiPOoav5T8iENetKzQ4tbNWGkjkQe1K5EHYuqJnf8B3jrDPSq4Jsb9sR3yDAfhCFHApnlnZleCPNgg+BF+JAnJLwMeeR2+g9c5VQbJHp6bUnqHf6+lCv4HX5QO3LC2UuIOoW6buE2ZH6Em5phXTP3aC6YQeJM4gVn9Xq8a8EXqCPrs8uD1GxSvkrBiNN4j8BeqqRgOBH/x65X3fx+WdGo03iJoNdlXEdKn9DHbADw0z+7Xy0BfSgUC2SJjjzeqMCvLXQEn1evvw9dPnC5iQjTv4XvBL6UD4b+5TtIfzMCrIP0LXrUUg+K4dHX1Hydk2Gl9ovA8KRrV6Pa6Nm+cS+8rxDhuPLzS6A47BEvTqarOTx/hOGPLWXImIVr4MvrGjc3Cp42LIwzCcSv0E/hqguVLtJVcAAAAASUVORK5CYII=">
        <form slot="form" class="clearfix">
            <input v-model="product.name" :floatLabel="name_label">
            <input v-model="product.code" :floatLabel="code_label">
            <input v-model="product.price" :floatLabel="price_label">
            <input v-model="product.description" :floatLabel="description_label">
            
            <button
                @click="edit"
                icon="edit"
                size="14px"
                color="secondary"
                label="Save Edit" >Save Edit</button>
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
                },
                id: this.$router.params.id,
                name_label:'Name',
                code_label:'Code',
                price_label:'Price',
                description_label: 'Description',
            }
        },
        
        methods: {
            edit: function(){
                axios.patch('/api/products/'+this.id, 
                   JSON.parse(JSON.stringify(this.job))
                , { headers: { Authorization: 'Bearer '.concat(localStorage.getItem('token')) } })
                .then(response => {
                   alert('success');
                   router.push({ name: "indexproduct"});
                }).catch(error => {
                    console.log('dd');
                });
            }
        },
        mounted() {
            axios.get("/api/products/"+this.id, { headers: { Authorization: 'Bearer '.concat(localStorage.getItem('token')) } })
                .then(response => {
                    this.job = response.data.data;
                }).catch(error => {
                    console.log(error);
                    alert('error')
                });
        }
    }
</script>
<style scoped>
    .q-btn{
        float: right;
        margin-top: 20px;
    }
</style>