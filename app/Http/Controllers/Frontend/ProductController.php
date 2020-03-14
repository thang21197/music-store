<?php

namespace App\Http\Controllers\Frontend;

use App\Repository\ProductRepositoryInterface;
use App\Repository\CategoryRepositoryInterface;
use App\Services\DataExchange;
use Illuminate\Http\Request;
use App\Models\{Artists,Products};
use App\Http\Controllers\Controller;


class ProductController extends Controller
{   
	private $productRepository;
    private $categoryRepository;
    private $dataExchange;
     public function __construct(ProductRepositoryInterface $productRepository, CategoryRepositoryInterface $categoryRepository)
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->dataExchange = new DataExchange();

    }
    function GetProduct(){
    	return view('frontend.product.product');
    }
    function GetProductDetail($id){

        // dd($this->productRepository->getProduct($id));
    	return view('frontend.product.product-detail', [
    	    'product' => $this->productRepository->getProduct($id),
            'category'=>$this->productRepository->getCateById($id),
            'rale_product'=>$this->dataExchange->exchangeProducts($this->productRepository->getRelateProduct($id,4))
        ]);
    }
}
