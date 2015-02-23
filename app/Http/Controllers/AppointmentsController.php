<?php namespace App\Http\Controllers;

use App\Appointment;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use Carbon\Carbon;
use Auth;

class AppointmentsController extends Controller {



	public function __construct()
	{
		$this->middleware('auth');
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$id = Auth::id();
		$example = Carbon::now()->format('Y-m-j') ;//'2015-02-18';

		$list = Appointment::where('user_id','=', $id)->where('date', '=', $example)->orderBy('time')->get();
		$list->button = '<a href="tasks/all">View all</a>';
		$list->btnurl= "url('tasks/all')";
		//var_dump($list);
		return view('tasks.list')->with('list', $list);
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
