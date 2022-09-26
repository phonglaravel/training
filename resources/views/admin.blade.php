@extends('layouts.app')
@section('content')
<div id="layoutSidenav">
    @include('layouts.menu')
    <div id="content">
        <main>
            <div class="search align-right" style="height: 70px; ">
                <button type="button" class="btn-create" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Thêm sản phẩm
                </button>
                @include('layouts.search')
            </div>
            <div class="list">
                @if ($products->isEmpty())
                <h3>Không tìm thấy sản phẩm</h3>
                @else 
                <div class="row">
                    @foreach ($products as $item)
                    <div class="col-md-4" style="padding: 20px">
                        <div class="item">
                           <a href="{{route('detail',$item->id)}}"><img src="{{asset('image/products/'.$item->image)}}" alt=""></a>
                            <h5>{{$item->title}}</h5>
                            <div class="row pb-3">
                                <div class="col md-6">
                                    <a href="{{route('product.edit',$item->id)}}" class="btn btn-warning" style="width: 100px; margin-left: 24px">Cập nhật</a>
                                </div>
                                <div class="col md-6">
                                    <form style="width: 100px ; " action="{{route('product.destroy', $item->id)}}" method="POST" >
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" style="width: 100px" >Xóa</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach                  
                </div>
                @endif
                <div class="d-flex justify-content-center">
                    <nav> {{ $products->withQueryString()->links() }} </nav>
                </div>
            </div>
            
        </main>
        
    </div>
</div>
<!-- Button trigger modal -->

  
@include('layouts.modal-create')
@include('sweetalert::alert')
@endsection
