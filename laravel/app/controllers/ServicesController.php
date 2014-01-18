<?php

class ServicesController extends BaseController {

    public function index()
    {
		// add allowable columns to search/sort on
		$allowed_cols = array('name', 'created_at'); 
		
		// default column to sort 'created_at'
		$sort = in_array(Input::get('sort'), $allowed_cols) ? Input::get('sort') : 'created_at'; 
		
		// default order 'desc'
		$order = Input::get('order') === 'asc' ? 'asc' : 'desc';

		// sort & paginate
		$services = Service::orderBy($sort, $order)->paginate(15);
				
        return \View::make('admin.services.index')->with(array('services' => $services, 'sort' => $sort, 'order' => $order));
    }
	
    public function show($id)
    {
        return \View::make('admin.services.show')->with('service', Service::find($id));
    }
 
    public function create()
    {
        return \View::make('admin.services.create');
    }
 
    public function store()
	{		
		$service = new Service;

		if ($service->validate())
		{
			$service->name   = Input::get('name');
			$service->slug   = Str::slug(Input::get('name'));
			$service->save();
			
			// default place for ordering = service id 
			$service->place  = $service->id;
			$service->save();
		 
			Session::flash('success', 'Entry saved successfully.');

			return Redirect::route('admin.services.edit', $service->id);
		}
		else
		{
			return Redirect::back()->withInput()->withErrors($service->errors());
		}
	}
 
    public function edit($id)
    {
        return \View::make('admin.services.edit')->with('service', Service::find($id));
    }
 
    public function update($id)
	{		
		$service = Service::find($id);

		if ($service->validate($id))
		{
			$service->name   = Input::get('name');
			$service->slug   = Str::slug(Input::get('name'));
			$service->save();
		 
			Session::flash('success', 'Entry updated successfully.');

			return Redirect::route('admin.services.edit', $service->id);
		}
		else
		{
			return Redirect::back()->withInput()->withErrors($service->errors());
		}
	}
 
    public function destroy($id)
	{
		$service = Service::find($id);		
		$service->delete();
	 
		Session::flash('success', 'Entry deleted successfully.');

		return Redirect::route('admin.services.index');
	}
 
}