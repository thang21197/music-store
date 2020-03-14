<?php

namespace App\Repository;

use App\Models\Categories;
use App\Models\Products;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductRepository implements ProductRepositoryInterface
{

    public function addProduct(Request $request)
    {
        $product = new Products();
        $path = "upload/product_image";
        //main_picture
        if ($request->hasFile('main_picture')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $image = Str::random(4) . "_" . $filename;
            while (file_exists($path . $image)) {
                $image = Str::random(4) . "_" . $filename;
            }
            $file->move($path, $image);
            if (!empty($product->image)) {
                unlink($path . "/" . $product->image);
            }
            $product->image = $image;

        } else {
            $product->image = "";
        }



        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->save();
    }

    public function updateProduct(Request $request, $id)
    {
        // TODO: Implement updateProduct() method.
        $product = Products::find($id);
        $path = "upload/product_image";
        //main_picture
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $image = Str::random(4) . "_" . $filename;
            while (file_exists($path . $image)) {
                $image = Str::random(4) . "_" . $filename;
            }
            $file->move($path, $image);
            if (!empty($product->image)) {
                unlink($path . "/" . $product->image);
            }
            $product->image = $image;
        }
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->save();
    }

    public function getListProducts()
    {
        // TODO: Implement getListProducts() method.
        $products = DB::table('products')
            ->orderBy('id','desc')
            ->paginate(15);
        return $products;
    }
    public function getListProductsByCategoryId($id, $limit, $orderBy)
    {
        // TODO: Implement getListProductsByCategoryId() method.
        $products = Products::where('category_id', $id)
            ->orderBy($orderBy['name'], $orderBy['value'])
            ->take($limit)
            ->get();

        return $products;
    }

    public function getProduct($id)
    {
        $product=new Products();
        $product = $product->newQuery();
        $result=$product->leftjoin('artists','artists.id', '=', 'products.artist_id')
        ->select('products.*','artists.name as artist_name')->where('products.id',$id)->get();
        $result=$result[0];
        $result->image = env('IMG_URL').$result->image;
        return $result;
    }
    public function searchProducts($id, $search)
    {
        $products = DB::table('products')
            ->where([['category_id', '=',$id],['name','like','%'.$search.'%']])
            ->get();
        return $products;
    }

    public function getMostPopularProducts($cate_id = 0, $limit = 8)
    {
        // TODO: Implement getMostPopularProducts() method.
        $products = new Products();
        $products = $products->newQuery();
        $products->select('products.*');
        if ($cate_id > 0) {
            $products->where('products.category_id', '=', $cate_id);
        }
        $products = $products->orderBy('sale_count', 'desc')->take($limit)->get();
        return $products;
    }

    public function getLatestProducts($limit)
    {
        // TODO: Implement getLatestProducts() method.
        $products = Products::orderBy('created_at', 'desc')
            ->take($limit)
            ->get();

        return $products;
    }
    public function getRelateProduct($id,$limit)
    {   $product = Products::find($id);
        $rela_products = DB::table('products')->where([
            ['id', '!=', $id],
            ['category_id', '=', $product->category_id],
        ])->limit($limit)->get();
        return $rela_products;
    }
    public function getCateById($id){
        $product = Products::find($id);
        $category= Categories::find($product->category_id);
        $category->image = env('IMG_URL').$category->image;
        return $category;
    }
}
