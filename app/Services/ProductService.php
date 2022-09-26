<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\BrandRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProductService
{
    public function __construct(BrandRepository $brandRepository, CategoryRepository $categoryRepository, ProductRepository $productRepository)
    {
        $this->brandRepository = $brandRepository;
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
    }
    
    public function store(Request $request)
    {
        $param = [];
        $param['title'] = $request->title;
        $param['slug'] = Str::slug($request->title);
        $param['category_id'] = $request->category_id;
        $param['brand_id'] = $request->brand_id;
        $param['description'] = $request->description;
        $param['price'] = $request->price;
        
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $image =Str::slug($request->title).'_'.Str::random(5).'.'.$extension;
        while (file_exists("image/products/". $image)){
            $image = Str::slug($request->title).'_'.Str::random(5).'.'.$extension;
        }
        $file->move('image/products', $image);
        $param['image'] = $image;
        $product = $this->productRepository->store($param);    
        return $product;  
    }
    public function update(Request $request, $id)
    {
        $product = $this->productRepository->getProductById($id);
        $product->title = $request->title;
        $product->slug = Str::slug($request->title);
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->save();
    }
    public function destroy($id)
    {
        $product = $this->productRepository->getProductById($id);
        $image_path = 'image/products/'.$product->image;
        if (File::exists($image_path)) {
        File::delete($image_path);
        }
        $product->delete();
    }
}

