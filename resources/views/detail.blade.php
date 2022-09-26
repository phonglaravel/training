@extends('layouts.app')
@section('content')
<div id="layoutSidenav">
    @include('layouts.menu')
    <div id="content">
        <main>
          
            <div class="list" style="margin-top: 40px">
                <a onclick="history.back();" class="text-decoration-none" style="cursor: pointer"><i class="fa-solid fa-arrow-left"></i> Quay lại</a>
                <div class="row" style="margin-top: 20px">
                    <div class="col-md-5">
                        <h5 class="mb-3">{{$product->title}}</h5>
                        <p class="mb-2">Danh mục: {{$product->category->title}}</p>
                        <p class="mb-2">Hãng sản xuất: {{$product->brand->title}}</p>
                        <p class="mb-2">Giá sản phẩm: {{number_format($product->price,0,'.','.')}} đ</p>
                        <p class="mb-2">Mô tả sản phẩm:</p>
                        <p class="mb-2">{{$product->description}}</p>
                    </div>
                    <div class="col-md-7">
                      @if ($slider->count()==0)
                        <img src="{{asset('image/products/'.$product->image)}}" alt="" class="w-100">
                      @else 
                      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                          @foreach ($slider as $key => $item)
                              @if ($key==0)
                              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                              @else 
                              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{$key}}" aria-label="Slide {{$key+1}}"></button>
                              @endif
                          @endforeach
                          
                        </div>
                        <div class="carousel-inner">
                          @foreach ($slider as $key=> $item)
                          <div class="carousel-item {{$key==0 ? 'active':''}}">
                            <img style="height: 300px" src="{{asset('image/sliders/'.$item->image)}}" class="d-block w-100" alt="...">
                          </div>
                          @endforeach
                          
                          
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Next</span>
                        </button>
                      </div>
                      @endif
                      
                       
                    </div>
                   
                </div>
                @if ($lienquan->count()>0)
                <div class="goiy mt-3">
                    <p>Gợi ý cho bạn</p>
                    <div class="row mt-3">
                        @foreach ($lienquan as $item)
                        <div class="col-md-4" style="padding: 20px">
                            <a href="{{route('detail',$item->id)}}">
                                <div class="item">
                                    <img src="{{asset('image/products/'.$item->image)}}" alt="">
                                     <h5>{{$item->title}}</h5>
                                     <p>{{number_format($item->price,0,'.','.')}}</p>
                                </div>
                            </a>
                        </div>
                        @endforeach                      
                    </div>
                </div>
                @endif
                
            </div>
        </main>
        
    </div>
</div>
@include('sweetalert::alert')
@endsection
