<?php
	class SearchController extends BaseController{
		public function search(){

			$str ="Điện thoại di động";

			$string = Input::get('search');
		    $wordsArray = explode(" ",$string);
			$searchString = "%".join("%",$wordsArray)."%";
			$result = Page::where('title','LIKE',$searchString)
				->whereIn('type',['2'])
				->paginate();
			if(!$result->count()){
				$result = Page::where('description','LIKE',$searchString)
				              ->whereIn('type',['2'])
				              ->paginate();
			}
			if(!$result->count()){
				$result = Page::where('title','LIKE',$searchString)
				              ->whereIn('type',['2'])
				              ->paginate();
			}

			$page = new Page();
			$page->type = 0;
			$page->title = "Tìm Kiếm";
			$page->meta_title = "Tìm kiếm";
			return View::make('frontend.default.layouts.search',compact('result','page'));
		}

	}

?>