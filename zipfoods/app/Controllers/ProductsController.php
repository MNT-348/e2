<?php

namespace App\Controllers;

use App\Products;

class ProductsController extends Controller
{
    private $productsObj;

    # Create a construct method to set up a productsObj property that can be used across different methods
    public function __construct($app)
    {
        parent::__construct($app);

        $this->productsObj = new Products($this->app->path('database/products.json'));
    }

    public function index()
    {
        $products = $this->$productsObj->getAll();

        return $this->app->view('products/index', [
            'products' => $products
        ]);
    }

    public function show()
    {
        $sku = $this->app->param('sku');

        $product = $this->productsObj->getBySku($sku);

        if (is_null($product)) {
            return $this->app->view('errors/404');
        }

        return $this->app->view('products/show', [
            'product' => $product
        ]);
    }
}