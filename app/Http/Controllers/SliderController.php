<?php

namespace App\Http\Controllers;

use App\Services\SliderService;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function __construct(SliderService $sliderService)
    {
        $this->sliderService = $sliderService;
    }
   
    public function store(Request $request)
    {
        $this->sliderService->store($request);
        return back();
    }

  
    public function update(Request $request, $id)
    {
        $this->sliderService->update($request,$id);
        return back();
    }

    
    public function destroy($id)
    {
        $this->sliderService->destroy($id);
        return back();
    }
}
