<?php
namespace admin;
use Acme\Forms\PageForm;
use View;
use Input;
use Redirect;
use Validator;
class PagesController extends AdminController {

	/**
	 * Page Repository
	 *
	 * @var Page
	 */
	protected $page;
	protected $pageForm;

	public function __construct(\Page $page, PageForm $pageForm)
	{
		$this->page = $page;
		$this->pageForm = $pageForm;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$pages = $this->page->all();

		return View::make('admin.pages.index', compact('pages'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.pages.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::only('title',
			'description',
			'body',
			'template',
			'activated',
			'meta_description',
			'meta_title',
			'meta_keywords');
		$input['slug'] = \Str::slug($input['title']);
		$this->pageForm->validate($input);


		return;

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$page = $this->page->findOrFail($id);

		return View::make('admin.pages.show', compact('page'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$page = $this->page->find($id);

		if (is_null($page))
		{
			return Redirect::route('admin.pages.index');
		}

		return View::make('admin.pages.edit', compact('page'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = array_except(Input::all(), '_method');
		$validation = Validator::make($input, \Page::$rules);

		if ($validation->passes())
		{
			$page = $this->page->find($id);
			$page->update($input);

			return Redirect::route('admin.pages.show', $id);
		}

		return Redirect::route('admin.pages.edit', $id)
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->page->find($id)->delete();

		return Redirect::route('admin.pages.index');
	}

}
