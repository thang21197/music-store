<?php

namespace App\Services;



class DataExchange
{
    public function exchangeProducts($products)
    {
        if(count($products) > 0) {
            foreach ($products as &$product) {
                $product->image = env('IMG_URL').$product->image;
            }
            return $products;
        }
        return [];
    }
}
