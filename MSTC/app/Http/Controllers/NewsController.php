<?php

namespace App\Http\Controllers;

use App\News;
use App\Http\Requests;
use App\Http\Requests\CreateNewsRequest;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class NewsController extends Controller
{
    
	public function create(){
		return view('news.create');
	}

	public function store(CreateNewsRequest $request)
	{
		News::create($request->all());
		return redirect('news');
	}

	public function index(){

		$news = News::latest('published_at')->published()->get();
		return view('news.index', compact('news'));
		
	}

	public function show($id){

		$new = News::findOrFail($id);
		return view('news.show', compact('new'));

	}

}
