//tạo vùng chèn dữ liệu

@yield('ten_vung')


//Chèn vào vùng đó thì

@section('ten_vung')
//Nội dung cần chèn
@stop

//kế thừa một layout
@extents('frontend.layouts.master')


//Gọi 1 file vào.
@include('frontend.partials.head')
@include('frontend.partials.header_content')


@include('frontend.partials.footer_content')
@include('frontend.partials.footer')


@include('frontend.partials.sliders')
@include('frontend.partials.main_nav')
@include('frontend.partials.sidebar')

