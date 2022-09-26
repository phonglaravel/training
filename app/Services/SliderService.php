<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\BrandRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use App\Repositories\SliderRepository;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class SliderService
{
    public function __construct(SliderRepository $sliderRepository)
    {
        $this->sliderRepository = $sliderRepository;
    }

    public function store(Request $request)
    {
        $param = [];
        $param['product_id'] = $request->product_id;
        $param['key'] = $request->key;

        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $image = Str::random(10) . '.' . $extension;
        while (file_exists("image/sliders/" . $image)) {
            $image = Str::random(10) . '.' . $extension;
        }
        $file->move('image/sliders', $image);
        $param['image'] = $image;
        $slider = $this->sliderRepository->store($param);
    }
    public function update(Request $request, $id)
    {
        $slider = $this->sliderRepository->getSliderById($id);

        $image_path = 'image/sliders/' . $slider->image;
        if (File::exists($image_path)) {
            File::delete($image_path);
        }

        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $image = Str::random(10) . '.' . $extension;
        while (file_exists("image/sliders/" . $image)) {
            $image = Str::random(10) . '.' . $extension;
        }
        $file->move('image/sliders', $image);
        $slider->image = $image;
        $slider->save();
    }
    public function destroy($id)
    {
        $slider = $this->sliderRepository->getSliderById($id);
        $image_path = 'image/sliders/' . $slider->image;
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        $slider->delete();
    }

    public function getAllSliderProduct($id)
    {
        return $this->sliderRepository->getAllSliderProduct($id);
    }
}
