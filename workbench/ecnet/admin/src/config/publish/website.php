<?php
return array(
	//Global config
	'ROOT_PATH'=>base_path(),
	'PUBLIC_PATH'=>public_path(),
	'APP_PATH'=>app_path(),

	'title'=>'ECen Việt Nam',
	'images_path'=>public_path()."/images",
	'keywords'=>'Thiết kế, website, lập trình, website đẹp, hosting , domain',
	'description'=>'Thiết kế website chuyên nghiệp, đề cao chất lượng phục vụ. Ý tưởng, giải pháp không ngừng nâng cao',
	'frontend_style'=> URL::to('frontend').'/style.css',
	// Menus config
	// Posts config

	'posts'=>array(
		'image'=> array(
			'w'=>'680',
			'h'=>'300',
			'w_t'=>'340',
			'h_t'=>'150',
			'locate'=>'posts'
			),
	),
	// Slider config
	'slider'=>array(
		'image'=>array(
			'w'=>'600',
			'h'=>'290',
			'name'=>'slider_image',
			'locate'=>'slider',
			'w_t'=>'300',
			'h_t'=>'145',
			),

	),
	'contact_info' => array(
		'address' =>'',
		'phone'   =>'',
		'fax'     =>'',
		'email'   =>'',
		'web'     =>''

	),
	'products'=>array(
		'image'=>array(
			'w'=>'300',
			'h'=>'300',
			'w_t'=>'150',
			'h_t'=>'150',
		),
	),
	'templates'=>array(
		'0'=>'default',
		'1'=>' No silder No sidebar',
		'2'=>'No slider with sidebar',
		),
	'pages'=>array(
		'types'=>array(
			'0'=>'page',
			'1'=>'category',
			'2'=>'post',
			''
			),
		),
	'page_templates'=>array(
		'0'=>'Mặc định',
		'1'=>'exampe 1',
		'2'=>'exampe 2',
		'3'=>'exampe 3',
		),
	'category_templates'=>array(
		'frontend.layouts.category'=>'Mặc định',
		'frontend.layouts.category_portfolio'=>'Kiểu Portfolio',
		),
	'post_templates'=>array(
		'frontend.layouts.post'=>'Mặc định',
		'frontend.layouts.page'=>'Trắng',
		),
	'product_templates'=>array(
		'1'=>'exampe 1',
		'2'=>'exampe 2',
		'3'=>'exampe 3',
		),
	'partners'=>array(
		'image'=>array(
			'w'=>130,
			'h'=>30,
			'w_t'=>130,
			'w_h'=>30,
			'location'=>'partners',

		),
	),
);