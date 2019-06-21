// Import packages.
import Vue from 'vue';
import VueRouter from 'vue-router';
import products from './components/product/ProductsComponent';
import productRoutes from './productRoutes';

Vue.use(VueRouter);

const baseRoutes = [
    {
        path: '/',
        name: 'home',
        component: products,
        redirect: {
            name: 'products'
        },
        meta: { title: 'Dashboard' }
    }
];

// Register imported routes to baseRoutes.
const routes = baseRoutes.concat(
    productRoutes
);

const router = new VueRouter({
    routes
});

// Set document title to router meta title value.
router.beforeEach((to, from, next) => {
    document.title = to.meta.title
    next()
});

export default router;