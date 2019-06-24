<?php

use Illuminate\Database\Seeder;
use App\Product;
// use Guid;
use Illuminate\Support\Facades\Hash;


class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('products')->delete();

        Product::create([
            'hashid' => 'f99b3606-a944-478d-b423-22f74d3b4b0e',
            'name' => 'Product 1',
            'code' => 'Product_1_code_xyz',
            'price' => 200,
            'image' => '/uploads/product_1.jpg',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi tincidunt ac quam ac laoreet. Suspendisse efficitur euismod elementum. Maecenas volutpat congue ante, ut tempus nunc vulputate a. Integer blandit dui nunc, et malesuada tortor consectetur et. Cras eget risus luctus, euismod dolor nec, laoreet risus. Sed eu lobortis justo. Quisque at feugiat nulla. Sed in pellentesque diam. Cras finibus enim in odio ultrices, id pellentesque ipsum pharetra. Quisque sit amet bibendum est. In vel sem at dui gravida porttitor in nec tortor. Mauris sed nisl a mauris tristique porttitor sed id sapien. Ut vel diam eget turpis finibus varius at commodo justo. Etiam rutrum aliquam eros sit amet posuere.

            Mauris egestas sem lacus, eu condimentum augue iaculis sed. Nam tristique ultricies tellus, vel dictum massa pretium sed. Nullam libero nibh, fringilla non odio vitae, rutrum porttitor massa. Pellentesque sagittis augue ac erat eleifend, eu tristique diam ultrices. In urna justo, mattis non felis vitae, scelerisque congue mauris. Morbi mollis lacus enim, sit amet convallis ipsum mattis vitae. Quisque bibendum faucibus dolor, ac commodo dolor maximus vel. Fusce faucibus interdum mi vitae auctor. Sed sit amet euismod neque. Suspendisse interdum, libero pellentesque accumsan ultricies, massa purus ultricies nunc, id venenatis enim arcu ac lorem. Suspendisse non mauris et lorem hendrerit consectetur at a libero. Nulla convallis vitae massa non vehicula. Morbi sagittis massa sed urna porttitor porta.'
        ]);

        Product::create([
            'hashid' => 'd9f7236b-c6c8-41e9-89c4-785d98c860ff',
            'name' => 'Product 2',
            'code' => 'Product_2_code_mnb',
            'price' => 250,
            'image' => '/uploads/product_2.jpg',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi tincidunt ac quam ac laoreet. Suspendisse efficitur euismod elementum. Maecenas volutpat congue ante, ut tempus nunc vulputate a. Integer blandit dui nunc, et malesuada tortor consectetur et. Cras eget risus luctus, euismod dolor nec, laoreet risus. Sed eu lobortis justo. Quisque at feugiat nulla. Sed in pellentesque diam. Cras finibus enim in odio ultrices, id pellentesque ipsum pharetra. Quisque sit amet bibendum est. In vel sem at dui gravida porttitor in nec tortor. Mauris sed nisl a mauris tristique porttitor sed id sapien. Ut vel diam eget turpis finibus varius at commodo justo. Etiam rutrum aliquam eros sit amet posuere.

            Mauris egestas sem lacus, eu condimentum augue iaculis sed. Nam tristique ultricies tellus, vel dictum massa pretium sed. Nullam libero nibh, fringilla non odio vitae, rutrum porttitor massa. Pellentesque sagittis augue ac erat eleifend, eu tristique diam ultrices. In urna justo, mattis non felis vitae, scelerisque congue mauris. Morbi mollis lacus enim, sit amet convallis ipsum mattis vitae. Quisque bibendum faucibus dolor, ac commodo dolor maximus vel. Fusce faucibus interdum mi vitae auctor. Sed sit amet euismod neque. Suspendisse interdum, libero pellentesque accumsan ultricies, massa purus ultricies nunc, id venenatis enim arcu ac lorem. Suspendisse non mauris et lorem hendrerit consectetur at a libero. Nulla convallis vitae massa non vehicula. Morbi sagittis massa sed urna porttitor porta.'
        ]);

        Product::create([
            'hashid' => 'c9e9b422-8820-4ac8-9380-b41ddd722b04',
            'name' => 'Product 3',
            'code' => 'Product_3_code_rew',
            'price' => 350,
            'image' => '/uploads/product_3.jpg',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi tincidunt ac quam ac laoreet. Suspendisse efficitur euismod elementum. Maecenas volutpat congue ante, ut tempus nunc vulputate a. Integer blandit dui nunc, et malesuada tortor consectetur et. Cras eget risus luctus, euismod dolor nec, laoreet risus. Sed eu lobortis justo. Quisque at feugiat nulla. Sed in pellentesque diam. Cras finibus enim in odio ultrices, id pellentesque ipsum pharetra. Quisque sit amet bibendum est. In vel sem at dui gravida porttitor in nec tortor. Mauris sed nisl a mauris tristique porttitor sed id sapien. Ut vel diam eget turpis finibus varius at commodo justo. Etiam rutrum aliquam eros sit amet posuere.

            Mauris egestas sem lacus, eu condimentum augue iaculis sed. Nam tristique ultricies tellus, vel dictum massa pretium sed. Nullam libero nibh, fringilla non odio vitae, rutrum porttitor massa. Pellentesque sagittis augue ac erat eleifend, eu tristique diam ultrices. In urna justo, mattis non felis vitae, scelerisque congue mauris. Morbi mollis lacus enim, sit amet convallis ipsum mattis vitae. Quisque bibendum faucibus dolor, ac commodo dolor maximus vel. Fusce faucibus interdum mi vitae auctor. Sed sit amet euismod neque. Suspendisse interdum, libero pellentesque accumsan ultricies, massa purus ultricies nunc, id venenatis enim arcu ac lorem. Suspendisse non mauris et lorem hendrerit consectetur at a libero. Nulla convallis vitae massa non vehicula. Morbi sagittis massa sed urna porttitor porta.'
        ]);

        Product::create([
            'hashid' => '3b0820c5-5a7e-410c-847a-ff9d963fb73d',
            'name' => 'Product 4',
            'code' => 'Product_4_code_mcnc',
            'price' => 500,
            'image' => '/uploads/product_4.jpg',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi tincidunt ac quam ac laoreet. Suspendisse efficitur euismod elementum. Maecenas volutpat congue ante, ut tempus nunc vulputate a. Integer blandit dui nunc, et malesuada tortor consectetur et. Cras eget risus luctus, euismod dolor nec, laoreet risus. Sed eu lobortis justo. Quisque at feugiat nulla. Sed in pellentesque diam. Cras finibus enim in odio ultrices, id pellentesque ipsum pharetra. Quisque sit amet bibendum est. In vel sem at dui gravida porttitor in nec tortor. Mauris sed nisl a mauris tristique porttitor sed id sapien. Ut vel diam eget turpis finibus varius at commodo justo. Etiam rutrum aliquam eros sit amet posuere.

            Mauris egestas sem lacus, eu condimentum augue iaculis sed. Nam tristique ultricies tellus, vel dictum massa pretium sed. Nullam libero nibh, fringilla non odio vitae, rutrum porttitor massa. Pellentesque sagittis augue ac erat eleifend, eu tristique diam ultrices. In urna justo, mattis non felis vitae, scelerisque congue mauris. Morbi mollis lacus enim, sit amet convallis ipsum mattis vitae. Quisque bibendum faucibus dolor, ac commodo dolor maximus vel. Fusce faucibus interdum mi vitae auctor. Sed sit amet euismod neque. Suspendisse interdum, libero pellentesque accumsan ultricies, massa purus ultricies nunc, id venenatis enim arcu ac lorem. Suspendisse non mauris et lorem hendrerit consectetur at a libero. Nulla convallis vitae massa non vehicula. Morbi sagittis massa sed urna porttitor porta.'
        ]);

        Product::create([
            'hashid' => '37758cee-403d-400d-a647-703b1e96f76d',
            'name' => 'Product 5',
            'code' => 'Product_5_code_xycz',
            'price' => 400,
            'image' => '/uploads/product_5.jpg',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi tincidunt ac quam ac laoreet. Suspendisse efficitur euismod elementum. Maecenas volutpat congue ante, ut tempus nunc vulputate a. Integer blandit dui nunc, et malesuada tortor consectetur et. Cras eget risus luctus, euismod dolor nec, laoreet risus. Sed eu lobortis justo. Quisque at feugiat nulla. Sed in pellentesque diam. Cras finibus enim in odio ultrices, id pellentesque ipsum pharetra. Quisque sit amet bibendum est. In vel sem at dui gravida porttitor in nec tortor. Mauris sed nisl a mauris tristique porttitor sed id sapien. Ut vel diam eget turpis finibus varius at commodo justo. Etiam rutrum aliquam eros sit amet posuere.

            Mauris egestas sem lacus, eu condimentum augue iaculis sed. Nam tristique ultricies tellus, vel dictum massa pretium sed. Nullam libero nibh, fringilla non odio vitae, rutrum porttitor massa. Pellentesque sagittis augue ac erat eleifend, eu tristique diam ultrices. In urna justo, mattis non felis vitae, scelerisque congue mauris. Morbi mollis lacus enim, sit amet convallis ipsum mattis vitae. Quisque bibendum faucibus dolor, ac commodo dolor maximus vel. Fusce faucibus interdum mi vitae auctor. Sed sit amet euismod neque. Suspendisse interdum, libero pellentesque accumsan ultricies, massa purus ultricies nunc, id venenatis enim arcu ac lorem. Suspendisse non mauris et lorem hendrerit consectetur at a libero. Nulla convallis vitae massa non vehicula. Morbi sagittis massa sed urna porttitor porta.'
        ]);

        Product::create([
            'hashid' => '2075b2ee-c83e-4c97-a17f-b84c44601cf1',
            'name' => 'Product 6',
            'code' => 'Product_6_code_xyz',
            'price' => 300,
            'image' => '/uploads/product_6.jpg',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi tincidunt ac quam ac laoreet. Suspendisse efficitur euismod elementum. Maecenas volutpat congue ante, ut tempus nunc vulputate a. Integer blandit dui nunc, et malesuada tortor consectetur et. Cras eget risus luctus, euismod dolor nec, laoreet risus. Sed eu lobortis justo. Quisque at feugiat nulla. Sed in pellentesque diam. Cras finibus enim in odio ultrices, id pellentesque ipsum pharetra. Quisque sit amet bibendum est. In vel sem at dui gravida porttitor in nec tortor. Mauris sed nisl a mauris tristique porttitor sed id sapien. Ut vel diam eget turpis finibus varius at commodo justo. Etiam rutrum aliquam eros sit amet posuere.

            Mauris egestas sem lacus, eu condimentum augue iaculis sed. Nam tristique ultricies tellus, vel dictum massa pretium sed. Nullam libero nibh, fringilla non odio vitae, rutrum porttitor massa. Pellentesque sagittis augue ac erat eleifend, eu tristique diam ultrices. In urna justo, mattis non felis vitae, scelerisque congue mauris. Morbi mollis lacus enim, sit amet convallis ipsum mattis vitae. Quisque bibendum faucibus dolor, ac commodo dolor maximus vel. Fusce faucibus interdum mi vitae auctor. Sed sit amet euismod neque. Suspendisse interdum, libero pellentesque accumsan ultricies, massa purus ultricies nunc, id venenatis enim arcu ac lorem. Suspendisse non mauris et lorem hendrerit consectetur at a libero. Nulla convallis vitae massa non vehicula. Morbi sagittis massa sed urna porttitor porta.'
        ]);
    }
}
