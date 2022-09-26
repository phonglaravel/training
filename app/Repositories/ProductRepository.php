<?php

namespace App\Repositories;

use App\Models\Product;


class ProductRepository
{

    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function getProductById($id)
    {
        return $this->product->where('id',$id)->first();
    }

    public function getProductLienQuan($id)
    {
        $product = $this->product->where('id',$id)->first();
        return $this->product->where('category_id',$product->category_id)->whereNotIn('id',[$product->id])->take(3)->get();
    }

    public function store($param)
    {
        return $this->product->create($param);
    }
    
    public function filterProduct($param)
    {
        $query = $this->product->orderBy('id','DESC');
        if($param['category']){
            $query = $query->where('category_id', $param['category']);
        }
        if($param['brand']){
            $query = $query->where('brand_id', $param['brand']);
        }
        if($param['search']){
            $query = $query->where('title', 'LIKE', '%'.$param['search'].'%');
        }

        return $query->paginate(3);
    }
}