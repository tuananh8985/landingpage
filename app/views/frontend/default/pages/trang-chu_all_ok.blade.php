@extends('frontend.default.layouts.master')
		@section('content')
		@include('frontend.default.partials.home.product_news')
		@include('frontend.default.partials.home.product_news_banner')

		@include('frontend.default.partials.home.product_featured')
		@include('frontend.default.partials.home.product_featured_banner')
		@include('frontend.default.partials.home.product_best_seller')
		@include('frontend.default.partials.home.news')

		@include('frontend.default.partials.home.new_arrivals')
		@include('frontend.default.partials.home.our_brands')
		@endsection
@endsection