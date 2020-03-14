<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Products;
use App\Repository\ProductRepositoryInterface;
use App\Services\DataExchange;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $productRepository;
    private $dataExchange;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
        $this->dataExchange = new DataExchange();
    }

    public function index($id, Request $request, Products $products)
    {
        $products = $products->newQuery();
        $query = [];
        $products->leftJoin('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*')
            ->where(function ($query) use ($id){
                $query->where('products.category_id', '=', $id)
                    ->orWhere('categories.parent_id', '=', $id);
            });
        if ($request->input('name')) {
            $name = $request->input('name');
            $products->where('products.name', 'like', '%' . $name . '%');
            $query['name'] = $name;
        }
        $orderBy = ['column'=>'id', 'direction'=>'desc'];
        if ($request->input('order_by')) {
            $order_by = $request->input('order_by');
            if($order_by == 1){
                $orderBy = ['column'=>'price', 'direction'=>'asc'];
            }
            if($order_by == 2){
                $orderBy = ['column'=>'price', 'direction'=>'desc'];
            }
            $query['order_by'] = $order_by;
        }
        $products = $this->dataExchange->exchangeProducts($products->orderBy($orderBy['column'], $orderBy['direction'])->paginate(6)->appends($query));
        $top_selling_products = $this->dataExchange->exchangeProducts($this->productRepository->getMostPopularProducts($id, 4));
        $cate_info = Categories::findOrFail($id);
        $cate_info->image = env("IMG_URL").$cate_info->image;

        return view('frontend.categories.index', [
            'products' => $products,
            'top_selling_products' => $top_selling_products,
            'cate_info' => $cate_info
        ]);
    }

}
