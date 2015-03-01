<?php namespace App\Http\Controllers;

use App\Appointment;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use Carbon\Carbon;
use Auth;

class AppointmentsController extends Controller {



	/*public function __construct()
	{
		$this->middleware('auth');
	}*/

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$id = Auth::id();
		$today = Carbon::now()->format('Y-m-j') ;

		$list = Appointment::where('user_id','=', $id)->where('date', '=', $today)->orderBy('time_index')->get();
		$list->button = '<a href="tasks/all">View all</a>';
		$list->date = $today;
		//var_dump($list);
		return view('tasks.today')->with('list', $list);
	}

	public function weekSelect()
	{

		//$id = Auth::id();
		$id = 1;
		$today = Carbon::now()->format('Y-m-j');
		$dayOfWeek = date('N');
		//$daysToMonday = 8 - $dayOfWeek;
		//$lastSunday = Carbon::now()->subDays($dayOfWeek-1)->format('Y-m-d');
		//$sunday = str_replace("-", "", $lastSunday);
		//$NextMonday= Carbon::now()->addDays($daysToMonday)->format('Y-m-j');
		
		$weekdays = array();
		for ($i=0; $i <= 8; $i++) { 
			if($dayOfWeek - $i > 0){

				$weekdays[$i] = Carbon::now()->subDays($dayOfWeek-$i)->format('Y-m-d');
			}else{
				$weekdays[$i] = Carbon::now()->addDays($i - $dayOfWeek)->format('Y-m-d');
			}
		}
        //var_dump($weekdays);
		$list = Appointment::where('user_id','=', $id)->where('date', '>', $weekdays[0])->orderBy('date')->orderBy('time_index')->get();
		$list->button = '<a href="tasks/all">View all</a>';
		$list->date = $today;
		$list->week = $weekdays;
		var_dump($list->last());
		
		return view('tasks.week')->with('list', $list);
	}



	public function fullSelect()
	{
		$id = Auth::id();

		$list = Appointment::where('user_id','=', $id)->latest('date')->get();
		$list->button = '<a href="../tasks">Today</a>';
		
		//var_dump($data);
		return view('tasks.list')->with('list', $list);

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('tasks.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$newTask = new Appointment;
		$input = Request::all();
		return $newTask->isValid($input);	
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$task = Appointment::findOrFail($id);

		return view('tasks.single')->with('task', $task);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$original = Appointment::findOrFail($id);
		return view('tasks.edit')->with('original', $original);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$newTask = Appointment::findOrFail($id);;
		$input = Request::all();
		$input['origin'] = $id;
		return $newTask->isValid($input);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Appointment::destroy($id);
		return redirect('tasks');
	}

}
