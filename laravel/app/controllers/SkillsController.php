<?php

class SkillsController extends BaseController {

    public function index()
    {
		// add allowable columns to search/sort on
		$allowed_cols = array('name', 'created_at'); 
		
		// default column to sort 'created_at'
		$sort = in_array(Input::get('sort'), $allowed_cols) ? Input::get('sort') : 'created_at'; 
		
		// default order 'desc'
		$order = Input::get('order') === 'asc' ? 'asc' : 'desc';

		// sort & paginate
		$skills = Skill::orderBy($sort, $order)->paginate(15);
		
        return \View::make('admin.skills.index')->with(array('skills' => $skills, 'sort' => $sort, 'order' => $order));
    }
	
    public function show($id)
    {
        return \View::make('admin.skills.show')->with('skill', Skill::find($id));
    }
 
    public function create()
    {
        return \View::make('admin.skills.create');
    }
 
    public function store()
	{		
		$skill = new Skill;

		if ($skill->validate())
		{
			$skill->name   	      = Input::get('name');
			$skill->slug          = Str::slug(Input::get('name'));
			$skill->category_id   = Input::get('category_id');
			$skill->user_id       = Sentry::getUser()->id;
			$skill->save();
      		 
			// default place for ordering = category id 
			$skill->place 		  = $skill->id;
			$skill->save();
			 
			Session::flash('success', 'Entry saved successfully.');

			return Redirect::route('admin.skills.edit', $skill->id);
		}
		else
		{
			return Redirect::back()->withInput()->withErrors($skill->errors());
		}
	}
 
    public function edit($id)
    {
        return \View::make('admin.skills.edit')->with('skill', Skill::find($id));
    }
 
    public function update($id)
	{		
		$skill = Skill::find($id);

		if ($skill->validate($id))
		{
			$skill->name   	      = Input::get('name');
			$skill->slug          = Str::slug(Input::get('name'));
			$skill->category_id   = Input::get('category_id');
			$skill->save();
		 
			Session::flash('success', 'Entry updated successfully.');

			return Redirect::route('admin.skills.edit', $skill->id);
		}
		else
		{
			return Redirect::back()->withInput()->withErrors($skill->errors());
		}
	}
 
    public function destroy($id)
	{
		$skill = Skill::find($id);		
		$skill->delete();
	 
		Session::flash('success', 'Entry deleted successfully.');

		return Redirect::route('admin.skills.index');
	}
 
}