


@foreach($image_all as $item)
<img class="{{$item['id']}}" src="{{ asset($item->link) }}" width="50px" height="50px" id="{{route('delete_image_ajax')}}">
@endforeach