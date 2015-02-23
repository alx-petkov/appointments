<?php namespace App\Http\Controllers;

use App\News;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class NewsController extends Controller {

	public function index(){

		$example = '2014-12-15';

		$data = News::where('datepub', '=', $example)->firstOrFail();

		//var_dump($data);
		return view('pages.news')->with('data', $data);
	}

	public function show($id){

		$article = News::findOrFail($id);

		/*if(is_null($article)){

			abort(404);
		}*/

		return view('pages.post')->with('article', $article);

	}

	public function create(){

		return view('pages.cerate');

	}

}
