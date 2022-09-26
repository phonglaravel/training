<?php

namespace App\Repositories;

use App\Models\Slider;


class SliderRepository
{

    protected $slider;

    public function __construct(Slider $slider)
    {
        $this->slider = $slider;
    }

    public function getAllSliderProduct($id)
    {
        return $this->slider->orderBy('key','ASC')->where('product_id',$id)->get();
    }

    public function store($param)
    {
        return $this->slider->create($param);
    }
    
    public function getSliderById($id)
    {
        return $this->slider->find($id);
    }
   
}