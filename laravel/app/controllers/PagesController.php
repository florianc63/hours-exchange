<?php

class PagesController extends BaseController {

    public function index()
    {
		// add allowable columns to search/sort on
		$allowed_cols = array('title', 'created_at'); 
		
		// default column to sort 'created_at'
		$sort = in_array(Input::get('sort'), $allowed_cols) ? Input::get('sort') : 'created_at'; 
		
		// default order 'desc'
		$order = Input::get('order') === 'asc' ? 'asc' : 'desc';

		// sort & paginate
		$pages = Page::orderBy($sort, $order)->paginate(15);
		
        return \View::make('admin.pages.index')->with(array('pages' => $pages, 'sort' => $sort, 'order' => $order));
    }
	
    public function show($id)
    {
        return \View::make('admin.pages.show')->with('page', Page::find($id));
    }
 
    public function create()
    {
        return \View::make('admin.pages.create');
    }
 
    public function store()
	{		
		$page = new Page;

		if ($page->validate())
		{
			$page->title   = Input::get('title');
			$page->slug    = Str::slug(Input::get('title'));
			$page->body    = Input::get('body');
			$page->user_id = Sentry::getUser()->id;
			$page->save();
		 
			Session::flash('success', 'Entry saved successfully.');

			return Redirect::route('admin.pages.edit', $page->id);
		}
		else
		{
			return Redirect::back()->withInput()->withErrors($page->errors());
		}
	}
 
    public function edit($id)
    {
        return \View::make('admin.pages.edit')->with('page', Page::find($id));
    }
 
    public function update($id)
	{		
		$page = Page::find($id);

		if ($page->validate($id))
		{
			$page->title   = Input::get('title');
			$page->slug    = Str::slug(Input::get('title'));
			$page->body    = Input::get('body');
			$page->save();
		 
			Session::flash('success', 'Entry updated successfully.');

			return Redirect::route('admin.pages.edit', $page->id);
		}
		else
		{
			return Redirect::back()->withInput()->withErrors($page->errors());
		}
	}
 
    public function destroy($id)
	{
		$page = Page::find($id);		
		$page->delete();
	 
		Session::flash('success', 'Entry deleted successfully.');

		return Redirect::route('admin.pages.index');
	}
 
}