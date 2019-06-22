import Vue from 'vue';
import Router from 'vue-router';
import products from './components/product/ProductsComponent';
import Indexproduct from './components/product/index';
import createproduct from './components/product/create';
import Editproduct from './components/product/edit';
import Viewproduct from './components/product/view';
import customfield from './components/product/custom'

// Plugins.
Vue.use(Router);

export default [
    {
        path: '/products',
        name: 'products',
        component: products,
        meta: { title: 'Products' },
        redirect: {
            name: 'Indexproduct'
        },
        children: [
            {
                path: '/',
                name: 'Indexproduct',
                component: Indexproduct,
                meta: { title: 'Products' },   
            },
            {
                path: 'show/:id',
                name: 'Viewproduct',
                component: Viewproduct,
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
            },
            {
                path: '/custom',
                name: 'customfield',
                component: customfield,
                meta: { title: 'Custom Field' },   
            }
        ]
    }
];