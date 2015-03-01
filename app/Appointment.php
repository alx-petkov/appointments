<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;
use Auth;

class Appointment extends Model {

	protected $table = 'appointments';

	public $timestamps = false;

	public function isValid($input){
		

		$rules = array(
			'date' => 'required|date',
			'index' => 'required|integer',
			'title' => 'required|min:4');

		$validator = Validator::make($input,$rules);

		if($validator->fails()){

			//return var_dump($input);
			if(array_key_exists('origin', $input)){
				return redirect('tasks/'.$input['origin'].'/edit')->withErrors(
				$validator);

			}else{
				return redirect('tasks/create')->withErrors(
				$validator);
			}
			
		}else{
			$this->user_id = Auth::id();
			$this->date = $input['date'];
			//$this->time = $input['hour'];
			$this->time_index = $input['index'];
			$this->title = $input['title'];
			$this->text = $input['text'];
			$this->save();
			return redirect('tasks');
		}
	}

}
