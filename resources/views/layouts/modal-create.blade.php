<!-- Modal -->
<div  class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Thêm sản phẩm</h5>
          <button type="button" class="btn-close close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
              @csrf
                <div class="mb-3">
                  <label class="form-label">Tên sản phẩm *</label>
                  <input id="title" value="{{old('title')}}" name="title" type="text" class="form-control" placeholder="Nhập tên sản phẩm">
                  @error('title')
                    <span style="color: red">{{ $message }}</span>
                  @enderror
                </div>
                <div class="mb-2">
                    <label class="form-label">Danh mục sản phẩm *</label>
                    <select id="category_id" name="category_id" class="form-select">
                        <option value="">Chọn danh mục sản phẩm</option>
                        @foreach ($categories as $item)
                        <option value="{{$item->id}}">{{$item->title}}</option>
                        @endforeach                       
                    </select>
                    @error('category_id')
                    <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-2">
                    <label class="form-label">Hãng sản xuất*</label>
                    <select id="brand_id" name="brand_id" class="form-select">
                        <option value="">Chọn hãng sản xuất</option>
                        @foreach ($brands as $item)
                        <option value="{{$item->id}}">{{$item->title}}</option>
                        @endforeach                      
                    </select>
                    @error('brand_id')
                    <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-2">
                    <label class="form-label">Giá *</label>
                    <input id="price" value="{{old('price')}}" name="price" type="text" class="form-control" placeholder="nhập giá sản phẩm">
                    @error('price')
                    <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-2">
                    <label class="form-label">Mô tả</label>
                    <textarea id="description"  name="description" type="text" class="form-control" placeholder="Nhập mô tả">{{old('description')}}</textarea>
                    @error('description')
                    <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="formFile" class="form-label">Chọn ảnh sản phẩm *</label>
                    <input id="image" name="image" class="form-control" type="file" id="formFile">
                    @error('image')
                    <span style="color: red">{{ $message }}</span>
                    @enderror
                  </div>
                <div class="text-center">
                    <button id="close2" style="width: 100px; margin-right: 10px; border-radius: 15px" type="button" class="close btn btn-outline-dark" data-bs-dismiss="modal">Hủy</button>
                    <button style="width: 100px; margin-left: 10px; border-radius: 15px" type="submit" class="btn btn-primary">Thêm</button>
                  </div>
              </form>
        </div>
        
      </div>
    </div>
</div>
@if ($errors->any())
    @push('scripts')
        <script>
          $('.btn-create').click();
          
        </script>
    @endpush
@endif
@push('scripts')
<script>
  $('.close').click(function(){
    $("input[type=text], textarea").val("");
  })
</script>
@endpush
