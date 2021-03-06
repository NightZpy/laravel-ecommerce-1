<?php

namespace Mage2\Catalog\Controllers;

use Mage2\Catalog\Models\Category;
use Mage2\Framework\Http\Controllers\Controller;
use Mage2\Common\Models\Configuration;

class CategoryViewController extends Controller
{


    public function __construct(){

        parent::__construct();
    }

    public function view($slug) {
        $productsOnCategoryPage = Configuration::getConfiguration('mage2_catalog_no_of_product_category_page');
        $category = Category::where('slug','=',$slug)->get()->first();
        $products = $category->products()->paginate($productsOnCategoryPage);
        return view('category.view')
                    ->with('category', $category)
                    ->with('products', $products)
            ;

    }
}
