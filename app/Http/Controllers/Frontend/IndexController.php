<?php

namespace App\Http\Controllers\Frontend;

use App\Constants;
use App\Http\Controllers\Controller;
use App\Repository\ProductRepositoryInterface;
use App\Services\DataExchange;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    private $productRepository;
    private $dataExchange;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
        $this->dataExchange = new DataExchange();
    }

    public function index(Request $request)
    {
        $cds = $this->dataExchange->exchangeProducts($this->productRepository->getListProductsByCategoryId(Constants::CATE_CD, 8, ['name' => 'id', 'value' => 'desc']));
        $dvds = $this->dataExchange->exchangeProducts($this->productRepository->getListProductsByCategoryId(Constants::CATE_DVD, 8, ['name' => 'id', 'value' => 'desc']));
        $tapes = $this->dataExchange->exchangeProducts($this->productRepository->getListProductsByCategoryId(Constants::CATE_TAPE, 8, ['name' => 'id', 'value' => 'desc']));
        $music_instruments = $this->dataExchange->exchangeProducts($this->productRepository->getListProductsByCategoryId(Constants::CATE_MUSIC_INSTRUMENTS, 8, ['name' => 'id', 'value' => 'desc']));
        $most_popular_products = $this->dataExchange->exchangeProducts($this->productRepository->getMostPopularProducts(0, 8));
        $latest_products = $this->dataExchange->exchangeProducts($this->productRepository->getLatestProducts(8));
        $liveshows = $this->dataExchange->exchangeProducts($this->productRepository->getListProductsByCategoryId(Constants::LIVE_SHOWS, 4, ['name' => 'id', 'value' => 'desc']));

        return view('frontend.index', [
            'cds' => $cds,
            'dvds' => $dvds,
            'tapes' => $tapes,
            'music_instruments' => $music_instruments,
            'most_popular_products' => $most_popular_products,
            'latest_products' => $latest_products,
            'liveshows' => $liveshows,
        ]);
    }

    public function get404()
    {
        return view('frontend.404');
    }

    public function contactUs()
    {
        return view('frontend.contact');
    }

    public function aboutUs()
    {
        return view('frontend.about_us');
    }
}
