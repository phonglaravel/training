@extends('layouts.app')
@section('content')
<div id="layoutSidenav">
   @include('layouts.menu')
    <div id="content">
        <main>
            <div class="search align-right" style="height: 70px; ">
                
                @include('layouts.search')
            </div>
            <div class="list">
                @if ($products->isEmpty())
                    <h3>Không tìm thấy sản phẩm</h3>
                @else 
                    <div class="row">
                        @foreach ($products as $item)
                        <div class="col-md-4" style="padding: 20px">
                            <a href="{{route('detail',$item->id)}}">
                                <div class="item">
                                    <img src="{{asset('image/products/'.$item->image)}}" alt="">
                                    <h5>{{$item->title}}</h5>
                                    <p>{{number_format($item->price,0,'.','.')}} đ</p>
                                </div>
                            </a>
                        </div>
                        @endforeach                  
                    </div>
                @endif
                
            </div>
            <div class="d-flex justify-content-center">
                <nav> {{ $products->withQueryString()->links() }} </nav>
            </div>
            
        </main>
        
    </div>
</div>
@endsection
