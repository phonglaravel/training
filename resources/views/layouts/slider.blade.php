<div class="col-md-6">
    <p>Ảnh Minh Họa</p>
    <img class="w-100 mb-4" src="{{asset('image/products/'.$product->image)}}" alt="">
    <p>Ảnh slide</p>
    <div class="row">
        @for ($i = 1; $i < 5; $i++)
        <div class="col-md-6 slide-item text">
            <p>Ảnh {{$i}}</p>
            @foreach ($slider as $item)
                @if ($item->key==$i)
                <div class="position-relative slider">
                    <img class="w-100" src="{{asset('image/sliders/'.$item->image)}}" alt="">
                    <div  style="top: 20px; left:60px" class=" putt position-absolute">
                        <button id="edit{{$i}}" style="width: 100px" class="btn btn-primary">Sửa</button>
                        <form id="form-edit{{$i}}" action="{{route('slider.update',$item->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <input id="file-edit{{$i}}" style="height: 0; width:0" type="file" name="image" id="file_upload">
                        </form>
                        <form  action="{{route('slider.destroy',$item->id)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button style="width: 100px" type="submit" class="btn btn-primary">Xóa</button>
                        </form>                           
                    </div>
                </div>                                   
                @endif
            @endforeach
            <div class='upload-field-customized'>
                <form id="form{{$i}}" action="{{route('slider.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input id="file{{$i}}" style="height: 0; width:0" type="file" name="image" id="file_upload">
                    <input type="hidden" name="product_id" value="{{$product->id}}">
                    <input type="hidden" name="key" value="{{$i}}">
                </form>               
                <span>
                    <img id="add{{$i}}" class="w-50 user-select-auto" style="margin: 30px 50px" src="{{asset('add-slide.png')}}" alt="">
                </span>                                  
            </div>
            
        </div>   
        @endfor
    </div>    
</div>
@push('scripts')
<script>
    for(let i=1; i<=4; i++){
        $('#add'+i).click(function(){
            $('#file'+i).click();
        })
        $('#file'+i).change(function() {
            $('#form'+i).submit();
        });   
        $('#edit'+i).click(function(){
            $('#file-edit'+i).click();
        })   
        $('#file-edit'+i).change(function() {
            $('#form-edit'+i).submit();
        });  
    }   
</script>
@endpush