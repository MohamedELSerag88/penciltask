import Vue from 'vue';
import Router from 'vue-router';
import products from './components/product/ProductsComponent';
import indexproduct from './components/product/index';
import createproduct from './components/product/create';
import Editproduct from './components/product/edit';

// Plugins.
Vue.use(Router);

export default [
    {
        path: '/products',
        name: 'products',
        component: products,
        meta: { title: 'Products' },
        redirect: {
            name: 'indexproduct'
        },
        children: [
            {
                path: '/',
                name: 'indexproduct',
                component: indexproduct,
                meta: { title: 'Products' },   
            },
            {
                path: 'create',
                name: 'createproduct',
                component: createproduct,
                meta: { title: 'Create Product' },   
            },
            {
                path: 'edit/:id',
                name: 'Editproduct',
                component: Editproduct,
                meta: { title: 'Edit Product' },   
            }
        ]
    }
];