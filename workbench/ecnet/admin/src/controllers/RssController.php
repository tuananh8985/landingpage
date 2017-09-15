<?php

class RssController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function all()
	{
		$feed = Rss::feed('2.0', 'UTF-8');
		$feed->channel(array(
			'title' => Config::get('admin::website.title'), 
			'description' => Config::get('admin::website.description'), 
			'link' => URL::to('/'))
		);
		$list = Page::wheretype(2)
		->orderBy('created_at','DESC')
		->take(10)
		->get();
		foreach ($list as $item){
			$feed->item(array(
				'title' => $item->title,
				'description|cdata' => $item->description,

				'link' => URL::to($item->full_link()),
				'pubDate'=>Date('d-m-Y',strtotime($item->created_at)),
				));
		}

		return Response::make($feed, 200, array('Content-Type' => 'text/xml'));
	}
	public function rss1($slug){
		return RssController::cat($slug);
	}
	public function rss2($slug1,$slug){
		return RssController::cat($slug);
	}
	public function rss3($slug2,$slug1,$slug){
		return RssController::cat($slug);
	}
	public static function cat($slug)
	{
		$cat = Page::whereslug($slug)->first();
		if($cat->count() == 0){
			return "";
		}
		$feed = Rss::feed('2.0', 'UTF-8');
		$feed->channel(array(
			'title' => $cat->title, 
			'description' => $cat->description, 
			'link' => URL::to($cat->full_link()),
			));
		$list = Page::wheretype(2)
		->orderBy('created_at','DESC')
		->whereIn('parent',Page::array_child($cat->id))
		->take(10)
		->get();
		if($list->count() >0){
			foreach ($list as $item){
				$feed->item(array(
					'title' => $item->title,
					'description|cdata' => $item->description, 
					'link' => URL::to($item->full_link()),
					'pubDate'=>Date('d-m-Y',strtotime($item->created_at)),
					));
			}
		}
		else{
			$feed->item =(array(
				'title' => $cat->title,
				'description|cdata' => $cat->description, 
				'link' => URL::to($cat->full_link()),
				'pubDate'=>Date('d-m-Y',strtotime($cat->created_at)),
				));
		}

		return Response::make($feed, 200, array('Content-Type' => 'text/xml'));
	}
	public function sitemap(){
		$header_xml = '<?xml version="1.0" encoding="UTF-8"?>

		<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"></urlset>';
		$xml = new SimpleXMLElement($header_xml);
		foreach(Page::whereIn('type',array(0))->orderBy('order')->get() as $cat){
			$catxml = $xml->addChild('url');
			$catxml->addChild('loc',URL::to($cat->full_link()));
			$catxml->addChild('lastmod',date('Y-m-d',strtotime($cat->updated_at)));
			$catxml->addChild('changefreq','daily');
			$catxml->addChild('priority','0.5');
		}
		foreach(Page::whereIn('type',array(1))->orderBy('order')->get() as $cat){
			$catxml = $xml->addChild('url');
			$catxml->addChild('loc',URL::to($cat->full_link()));
			$catxml->addChild('lastmod',date('Y-m-d',strtotime($cat->updated_at)));
			$catxml->addChild('changefreq','daily');
			$catxml->addChild('priority','0.5');
		}
		foreach(Page::whereIn('type',array(2))->orderBy('title')->get() as $cat){
			$catxml = $xml->addChild('url');
			$catxml->addChild('loc',URL::to($cat->full_link()));
			$catxml->addChild('lastmod',date('Y-m-d',strtotime($cat->updated_at)));
			$catxml->addChild('changefreq','daily');
			$catxml->addChild('priority','0.5');
		}
		return Response::make($xml->asXML(), 200, array('Content-Type' => 'text/xml'));
	}


}
