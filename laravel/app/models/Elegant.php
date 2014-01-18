<?php namespace App\Models;

class Elegant extends \Eloquent
{
    protected $rules = array();

    protected $errors;

    public function validate($id = null, $attributes = null)
    {
		$attributes = $attributes ?: \Input::all();
		
        // make a new validator object
        $v = \Validator::make($attributes, $this->getValidationRules($id));

        // check for failure
        if ($v->fails())
        {
            // set errors and return false
            $this->errors = $v->errors();
            return false;
        }

        // validation pass
        return true;
    }

    public function errors()
    {
        return $this->errors;
    }
	
    /**
     * Get validation rules and take care of own id on update
     * @param null $id
     * @return array
     */
    private function getValidationRules($id = null)
    {
        $rules = $this->rules;
 
        if($id === null)
        {
            return $rules;
        }
		
        array_walk($rules, function(&$rules, $field) use ($id)
        {
            if(!is_array($rules))
            {
                $rules = explode("|", $rules);
            }
 
            foreach($rules as $ruleIdx => $rule)
            {
                // get name and parameters
                @list($name, $params) = explode(":", $rule);
 
                // only do someting for the unique rule
                if(strtolower($name) != "unique") {
                    continue; // continue in foreach loop, nothing left to do here
                }
 
                $p = array_map("trim", explode(",", $params));
 
                // set field name to rules key ($field) (laravel convention)
                if(!isset($p[1])) {
                    $p[1] = $field;
                }
 
                // set 3rd parameter to id given to getValidationRules()
                $p[2] = $id;
 
                $params = implode(",", $p);
                $rules[$ruleIdx] = $name.":".$params;
            }
        });
		
        return $rules;
    }
}