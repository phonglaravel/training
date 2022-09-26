@extends('layouts.app')
@section('content')
<div id="layoutSidenav">
    @include('layouts.menu')
    <div id="content">
        <main>
          
            <div class="list" style="margin-top: 40px">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="mb-4">Thông tin sản phẩm</h4>
                        <form action="{{route('product.update',$product->id)}}" method="POST">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                              <label class="form-label">Tên sản phẩm *</label>
                              <input name="title" value="{{$product->title}}" type="text" class="form-control" placeholder="Nhập tên sản phẩm">
                              @error('title')
                              <span style="color: red">{{ $message }}</span>
                              @enderror
                            </div>
                            <div class="mb-2">
                                <label class="form-label">Danh mục sản phẩm *</label>
                                <select name="category_id" class="form-select">
                                    @foreach ($categories as $item)
                                    <option value="{{$item->id}}" {{$item->id==$product->category_id ? 'selected':''}}>{{$item->title}}</option>
                                    @endforeach
                                    
                                   
                                  </select>
                            </div>
                            <div class="mb-2">
                                <label class="form-label">Hãng sản xuất*</label>
                                <select name="brand_id" class="form-select">
                                    @foreach ($brands as $item)
                                        <option value="{{$item->id}}" {{$item->id==$product->brand_id ? 'selected':''}}>{{$item->title}}</option>
                                    @endforeach
                                  
                                  </select>
                            </div>
                            <div class="mb-2">
                                <label class="form-label">Giá *</label>
                                <input name="price" value="{{$product->price}}" type="text" class="form-control" placeholder="nhập giá sản phẩm">
                                @error('price')
                                <span style="color: red">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label class="form-label">Mô tả</label>
                                <textarea name="description" type="text" class="form-control" placeholder="Nhập mô tả">{{$product->description}}</textarea>
                                @error('description')
                                <span style="color: red">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="text-center">
                                <button style="width: 100px; margin-right: 10px; border-radius: 15px" type="button" class="btn btn-outline-dark" onclick="history.back();">Hủy</button>
                                <button style="width: 100px; margin-left: 10px; border-radius: 15px" type="submit" class="btn btn-primary">Lưu</button>
                              </div>
                          </form>
                    </div>
                    @include('layouts.slider')
                </div>
            </div>
        </main>
        
    </div>
</div>
@endsection

