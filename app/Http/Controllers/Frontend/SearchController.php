<?php

namespace App\Http\Controllers\Frontend;

use App\Constants;
use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Products;
use App\Repository\ProductRepositoryInterface;
use App\Services\DataExchange;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    private $productRepository;
    private $dataExchange;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
        $this->dataExchange = new DataExchange();
    }

    public function index(Request $request, Products $products)
    {
        $keyWord = $request->input('key_word');
        $products = $products->newQuery();
        $query = [];
        $products->select('products.*')
            ->where('name', 'like', '%' . $keyWord . '%');
        $query['key_word'] = $keyWord;
        $total = $products->count();
        $products = $this->dataExchange->exchangeProducts($products->orderBy('id', 'desc')->paginate(6)->appends($query));
        $top_selling_products = $this->dataExchange->exchangeProducts($this->productRepository->getMostPopularProducts(0, 4));
        return view('frontend.search.index', [
            'products' => $products,
            'top_selling_products' => $top_selling_products,
            'key_word' => $keyWord,
            'total' => $total
        ]);
    }
}
