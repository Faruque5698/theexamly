@foreach($subcategories as $subcategory)
<option value="{{$subcategory->id}}" @if($subcategory->id==$product_category) selected @endif > <?php echo str_repeat("&nbsp;", $n); ?> {{$subcategory->title}}</option>
        @if(count($subcategory->sub_categories))
            <?php 
            $n=$n+3
            ?>
            @include('backend.layout.subcategories',['subcategories' => $subcategory->sub_categories])
        @endif 
    @endforeach