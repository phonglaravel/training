<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Services\HomeService;
use App\Services\SliderService;

class HomeController extends Controller
{

    public function __construct(HomeService $homeService, SliderService $sliderService)
    {
        $this->homeService = $homeService;
        $this->sliderService = $sliderService;
    }
    public function index()
    {
        $category = request()->category ?? null;
        $brand = request()->brand ?? null;
        $search = request()->search ?? null;
        $brands = $this->homeService->getAllBrand();
        $categories = $this->homeService->getAllCategory();
        $products = $this->homeService->filterProduct([
            'category' =>  $category,
            'brand' => $brand,
            'search' =>  $search,
        ]);

        return view('home', compact('brands', 'categories', 'products'));
    }

    public function detail(int $id)
    {
        $slider = $this->sliderService->getAllSliderProduct($id);
        $brands = $this->homeService->getAllBrand();
        $categories = $this->homeService->getAllCategory();
        $product = $this->homeService->getProductById($id);
        $lienquan = $this->homeService->getProductLienQuan($id);

        return view('detail', compact('categories', 'brands', 'product', 'lienquan', 'slider'));
    }
}
