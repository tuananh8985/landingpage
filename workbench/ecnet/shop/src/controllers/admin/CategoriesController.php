<?php
/**
 * Created by Ngoc Anh Duong.
 * Email: simkbaio@gmail.com
 * Date: 12/1/2014
 * Time: 4:12 PM
 */

namespace shop\admin;


use \Acme\Forms\Shop\CategoryForm;
use Input;
use Laracasts\Flash\Flash;
use Redirect;
use shop\Category;

class CategoriesController extends AdminController  {
	public  $categoryForm;

	function __construct(CategoryForm $categoryForm ) {
		$this->categoryForm = $categoryForm;
	}


	public function index(){
		$categories = Category::whereType(3)->whereParent(0)->get();
	    return \View::make('shop::admin.categories.index')
		    ->withCategories($categories);
	}
	public function create(){
		return \View::make('shop::admin.categories.create');

	}
	public function store(){
		$input = Input::except('_token');
		$category = Category::createCategory($input);
		Flash::success('Tạo danh mục mới thành công');
		return Redirect::route('admin.shop.categories.edit',$category->id);
	}
	public function edit($id){
		$category = Category::findOrFail($id);
		return \View::make('shop::admin.categories.edit')
			->withCategory($category);
	}
	public function update($id){
		$this->categoryForm->updateValidate(Input::all());
		$category =  Category::findOrFail($id);
		$input = Input::except('_method','_token');

		$category->update($input);
		Flash::message('Cập nhật thành công!');
		return Redirect::back();

	}

	public function quickDelete($id){
	    $category = Category::findOrFail($id);
		$category->delete();
		Flash::success('Xóa danh mục: '.$category->title." Thành công!");
		return Redirect::route('admin.shop.categories.index');
	}
}