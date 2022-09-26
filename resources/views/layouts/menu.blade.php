
@if (request()->is('product') || request()->is('product/*'))
<div id="menu">
    <div class="menu-child position-relative">           
        <h6 class="category" style="cursor: pointer;">Danh Mục</h6>
        <i class="fas fa-angle-down position-absolute" style="right: 30px; top: 30px"></i>
        <a class="{{request()->has('category') ? '' : 'brand-active'}}" href="{{ route('product.index', [ 'brand' => request()->brand]) }}"><h6>Tất Cả</h6></a>
        <div class="toggle_category">
            @foreach ($categories as $item)
            <a class="{{request()->category==$item->id ? 'category-active' : ''}}" href="{{ route('product.index', ['category' => $item->id, 'brand' => request()->brand]) }}"><h6>{{$item->title}}</h6></a>    
            @endforeach           
        </div>
    </div>
    <div class="menu-child position-relative">           
        <h6 class="brand" style="cursor: pointer;">Hãng sản xuất</h6>
        <i class="fas fa-angle-down position-absolute" style="right: 30px; top: 30px"></i>
        <a class="{{request()->has('brand') ? '' : 'brand-active'}}" href="{{ route('product.index', [ 'category' => request()->category]) }}"><h6>Tất Cả</h6></a>
        <div class="toggle_brand">
            @foreach ($brands as $item)
            <a class="{{request()->brand==$item->id ? 'brand-active' : ''}}" href="{{ route('product.index', ['brand' => $item->id, 'category' => request()->category]) }}"><h6>{{$item->title}}</h6></a>
            @endforeach           
        </div>
    </div>
</div>
@else 
<div id="menu">
    <div class="menu-child position-relative">           
        <h6 class="category" style="cursor: pointer;">Danh Mục</h6>
        <i class="fas fa-angle-down position-absolute" style="right: 30px; top: 30px"></i>
        <a class="{{request()->has('category') ? '' : 'brand-active'}}" href="{{ route('home', [ 'brand' => request()->brand]) }}"><h6>Tất Cả</h6></a>
        <div class="toggle_category">
            @foreach ($categories as $item)
            <a class="{{request()->category==$item->id ? 'category-active' : ''}}" href="{{ route('home', ['category' => $item->id, 'brand' => request()->brand]) }}"><h6>{{$item->title}}</h6></a>    
            @endforeach           
        </div>
    </div>
    <div class="menu-child position-relative">           
        <h6 class="brand" style="cursor: pointer;">Hãng sản xuất</h6>
        <i class="fas fa-angle-down position-absolute" style="right: 30px; top: 30px"></i>
        <a class="{{request()->has('brand') ? '' : 'brand-active'}}" href="{{ route('home', [ 'category' => request()->category]) }}"><h6>Tất Cả</h6></a>
        <div class="toggle_brand">
            @foreach ($brands as $item)
            <a class="{{request()->brand==$item->id ? 'brand-active' : ''}}" href="{{ route('home', ['brand' => $item->id, 'category' => request()->category]) }}"><h6>{{$item->title}}</h6></a>
            @endforeach           
        </div>
    </div>
</div>
@endif
