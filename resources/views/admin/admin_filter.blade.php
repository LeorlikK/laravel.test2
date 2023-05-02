<form action="{{ route('admin.posts') }}" method="get">
    @if(@isset($filter['name']))
        <input name="name" placeholder="Find" value="{{ $filter['name'] }}">
    @else
        <input name="name" placeholder="Find">
    @endif

    <a href="{{ route('admin.posts') }}"><button type="submit">Find</button></a>

    <div>
        <label for="selector_sorted">Order by...</label>
        <select multiple name="sorted_select" id="selector_sorted"> // name="sorted_select[]"
            <option
                value="{{$filter['sorted_select'] ?? ''}}"
                selected>{{isset($filter['sorted_select']) ? "Filter by:" . str($filter['sorted_select']) : '...'}}
            </option>
            <option value="Alphabet">Alphabet</option>
            <option value="Price_min">Price_min</option>
            <option value="Price_max">Price_max</option>
        </select>

        <label for="selector_brand">Brand</label>
        <select name="brand_select" id="selector_brand">

            <option
                value="{{ isset($filter['brand_select']) ?? ''}}"
                selected> {{ isset($filter['brand_select']) ? "Filter by:" . $brands->where('id', $filter['brand_select'])->pluck('name')  : '...'}}
            </option>
            @foreach($brands as $brand)
                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
            @endforeach
        </select>

        <label for="selector_category">Categories(Do not work)</label>
        <select name=category_select id="selector_category">
            <option
                value="{{isset($filter['category_select']) ?? "Filter by:" . str(...$categories->where('id', $filter['category_select'])->pluck('name'))}}"
                selected>{{isset($filter['category_select']) ? "Filter by:" . str(...$categories->where('id', $filter['category_select'])->pluck('name')) : '...'}}</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
</form>
