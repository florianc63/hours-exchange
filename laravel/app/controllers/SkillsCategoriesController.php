<?php

class SkillsCategoriesController extends BaseController {

    public function index()
    {
		// add allowable columns to search/sort on
		$allowed_cols = array('name', 'created_at'); 
		
		// default column to sort 'created_at'
		$sort = in_array(Input::get('sort'), $allowed_cols) ? Input::get('sort') : 'created_at'; 
		
		// default order 'desc'
		$order = Input::get('order') === 'asc' ? 'asc' : 'desc';

		// sort & paginate
		$categories = SkillsCategory::orderBy($sort, $order)->paginate(15);
				
        return \View::make('admin.skillscategories.index')->with(array('categories' => $categories, 'sort' => $sort, 'order' => $order));
    }
	
    public function show($id)
    {
        return \View::make('admin.skillscategories.show')->with('category', SkillsCategory::find($id));
    }
 
    public function create()
    {
        return \View::make('admin.skillscategories.create');
    }
 
    public function store()
	{		
		$category = new SkillsCategory;

		if ($category->validate())
		{
			$category->name   = Input::get('name');
			$category->slug   = Str::slug(Input::get('name'));
			$category->save();
			
			// default place for ordering = category id 
			$category->place  = $category->id;
			$category->save();
		 
			Session::flash('success', 'Entry saved successfully.');

			return Redirect::route('admin.skillscategories.edit', $category->id);
		}
		else
		{
			return Redirect::back()->withInput()->withErrors($category->errors());
		}
	}
 
    public function edit($id)
    {
        return \View::make('admin.skillscategories.edit')->with('category', SkillsCategory::find($id));
    }
 
    public function update($id)
	{		
		$category = SkillsCategory::find($id);

		if ($category->validate($id))
		{
			$category->name   = Input::get('name');
			$category->slug   = Str::slug(Input::get('name'));
			$category->save();
		 
			Session::flash('success', 'Entry updated successfully.');

			return Redirect::route('admin.skillscategories.edit', $category->id);
		}
		else
		{
			return Redirect::back()->withInput()->withErrors($category->errors());
		}
	}
 
    public function destroy($id)
	{
		$category = SkillsCategory::find($id);		
		$category->delete();
	 
		Session::flash('success', 'Entry deleted successfully.');

		return Redirect::route('admin.skillscategories.index');
	}
 
}