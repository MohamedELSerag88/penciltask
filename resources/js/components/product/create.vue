<template>
    <card card-title = "Add Product">
        <img slot="img" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABoAAAAaCAYAAACpSkzOAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAIZSURBVEhL5ZRPS1RhFMZnY9y5d/5gVjcFhQQLRLBASE1dDMkYBRWCzWxape6cxo0LFyUIunE7n6AhcSEK7oQQTJJQBD9En6Pfc+8ZJ2Goy527iDrwcM5z/r7ve9/7pv5dyWazXZ7nfQSbSSCTyXzI5XI3rX1TCK4TXEU/TQLWa93aNwVnjeAEusruxrEXwSR457puEX8Z/3P0nGB2mdiMcpQLr6gWXYWrV83aN0VOBcErkh9Yg0H809iPsKfS6fQI+olg9pRiylEudS9Ui/0S/H6Q0bblPx6EfRtfyxslOI7Ty/fpbvB8Pn/PSgOJPIiPOoav5T8iENetKzQ4tbNWGkjkQe1K5EHYuqJnf8B3jrDPSq4Jsb9sR3yDAfhCFHApnlnZleCPNgg+BF+JAnJLwMeeR2+g9c5VQbJHp6bUnqHf6+lCv4HX5QO3LC2UuIOoW6buE2ZH6Em5phXTP3aC6YQeJM4gVn9Xq8a8EXqCPrs8uD1GxSvkrBiNN4j8BeqqRgOBH/x65X3fx+WdGo03iJoNdlXEdKn9DHbADw0z+7Xy0BfSgUC2SJjjzeqMCvLXQEn1evvw9dPnC5iQjTv4XvBL6UD4b+5TtIfzMCrIP0LXrUUg+K4dHX1Hydk2Gl9ovA8KRrV6Pa6Nm+cS+8rxDhuPLzS6A47BEvTqarOTx/hOGPLWXImIVr4MvrGjc3Cp42LIwzCcSv0E/hqguVLtJVcAAAAASUVORK5CYII=">
        <form class="clearfix" slot="form">
            <bim-text v-model="name" :floatLabel="name_label"></bim-text>
            <bim-text v-model="code" :floatLabel="code_label"></bim-text>            
            <bim-text v-model="price" :floatLabel="price_label"></bim-text>            
            <bim-text v-model="description" :floatLabel="description_label"></bim-text>            
            <q-btn
                @click="submit"
                icon="save"
                size="14px"
                color="secondary"
                label="Save" />
        </form>
    </card>
</template>

<script>  
    import router from '../../routes';
    export default {
        data: () =>({
            name: '',
            name_label:'Name', 
            code : '',
            code_label:"Code",
            price : '',
            price_label:"Price",
            description : '',
            description_label:"Description",
        }),
        methods :{
            submit: function(){
                console.log(localStorage.getItem('token'));
                axios.post('/api/products', {
                    name: this.name,
                    code: this.code, 
                    price: this.price, 
                    description : this.description,     
                }, 
                { 
                    headers: 
                        {'Content-Type': 'application/json', Authorization: 'Bearer '.concat(localStorage.getItem('token')) } 
                })
                .then(response => {
                   router.push({ name: "indexproduct"});
                }).catch(error => {
                    console.log(error);
                });
            }
        },
        mounted() {
        }
    }
</script>

<style scoped>
    .q-btn{
        float: right;
        margin-top: 20px;
    }
</style>