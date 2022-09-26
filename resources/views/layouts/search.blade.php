
    <form style="width: 300px; float: right; margin-top: 15px">
        <input name="search" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        @if (request()->has('category'))
        <input type="hidden" name="category" value="{{request()->category}}">
        @endif
        @if (request()->has('brand'))
        <input type="hidden" name="brand" value="{{request()->brand}}">
        @endif
    </form>
