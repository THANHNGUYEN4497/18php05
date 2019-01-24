{{--  @foreach ($data as $value)
    {{$value->email}};
    {{$value->password}};
@endforeach  --}}
 {{--  <h1>Hello</h1>
    @if (isset($dataUserLogin))
        {{$dataUserLogin->fullname}}
        {{$dataUserLogin->username}}
        {{$dataUserLogin->email}}
        {{$dataUserLogin->birthday}}
        {{$dataUserLogin->address}}
    @endif  --}}
 {{-- @if (isset($dataUserLogin))
     {{hello}}
 @endif --}}
 {{-- @foreach ($databrand as $value)
    {{$value->namebrand}}
    <br>
    {{$value->connectCategory->titleCate}}
    <br>
 @endforeach --}}
 {{--  @foreach ($dataProduct as $item)
    {{$item->slider->imageslider}}
 @endforeach  --}}
 {{--  @foreach ($datacategory as $item)
    {{$item->connectBrand}}
 @endforeach  --}}

{{--   {{$datacategory->connectBrand}}  --}}
 {{$datacategory->connectProduct}}



