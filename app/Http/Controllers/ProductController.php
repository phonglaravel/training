<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Repositories\BrandRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use App\Services\HomeService;
use App\Services\ProductService;
use App\Services\SliderService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function __construct(ProductService $productService, HomeService $homeService, SliderService $sliderService)
    {
        $this->productService = $productService;
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
        return view('admin', compact('brands', 'categories', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStoreRequest $request)
    {
        $product = $this->productService->store($request);
        Alert::success('Thành Công', 'Thêm sản phẩm thành công');
        return redirect()->route('detail', $product->id)->with('success', 'Thêm sản phẩm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = $this->sliderService->getAllSliderProduct($id);
        $brands = $this->homeService->getAllBrand();
        $categories = $this->homeService->getAllCategory();
        $product = $this->homeService->getProductById($id);
       
        return view('edit', compact('product', 'brands', 'categories', 'slider'));
    }
    public function editt()
    {
        return view('edit');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, $id)
    {
        $product = $this->homeService->getProductById($id);
        $this->productService->update($request, $id);
        Alert::success('Thành Công', 'Sửa sản phẩm thành công');
        return redirect()->route('detail', $product->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->productService->destroy($id);
        Alert::success('Thành Công', 'Xóa sản phẩm thành công');
        return back();
    }
}
