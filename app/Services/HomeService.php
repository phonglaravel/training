<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\BrandRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use Illuminate\Support\Str;

class HomeService
{
    public function __construct(BrandRepository $brandRepository, CategoryRepository $categoryRepository, ProductRepository $productRepository)
    {
        $this->brandRepository = $brandRepository;
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
    }
    
    public function getAllCategory()
    {
        return $this->categoryRepository->getAllCategory();
    }
    public function getAllBrand()
    {
        return $this->brandRepository->getAllBrand();
    }
    public function getAllProduct()
    {
        return $this->productRepository->getAllProduct();
    }
    public function getProductById($id)
    {
        return $this->productRepository->getProductById($id);
    }
    public function getProductLienQuan($id)
    {
        return $this->productRepository->getProductLienQuan($id);
    }
    public function filterProduct($param)
    {
        return $this->productRepository->filterProduct($param);
    }
   
}   


