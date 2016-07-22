<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\CreateNewsRequest;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Image;
use File;
class NewsController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    
	public function create(){
		return view('news.create');
	}

	public function store(CreateNewsRequest $request)
	{
		News::create($request->all());
		if (File::exists($request->file('image')))
		{$file = Image::make($request->file('image'));
		$new = News::where('title', '=', $request->input('title'))->first();
		$filename = $request->input('title') . '-new-' . $new->id. '.jpg';
		$file->save('image/News/'.$filename);}
		return redirect('news');
	}

	public function edit($id)
	{
		$news = News::findOrFail($id);
		return view('news.edit', compact('news'));
	}

	public function update(CreateNewsRequest $request, $id)
	{   $news = News::where('id', '=', $id)->first();
		$new_filename = $request->input('title') . '-new-' . $news['id']. '.jpg';
		$old_filename = $news['title'] . '-new-' . $news['id'] . '.jpg';
		News::findOrFail($id)->update($request->all());
		if (File::exists($request->file('image'))) {
			$file =Image::make( $request->file('image'));
			$file->save('image/News/'.$new_filename) ;
		}
		if (!File::exists($request->file('image'))) {
			if (File::exists('image/News/'.$old_filename)){
				$file = Image::make('image/News/'.$old_filename);
				$file->save('image/News/' . $new_filename);
			}
		}
		if($request->input('title')!=$news['title'])
		{
			if(File::exists('image/News/'.$old_filename))
				File::delete('image/News/'.$old_filename);
		}
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
	

	public function destroy($id)
    {$news = News::where('id', '=', $id)->first();
		$filename = $news['title'] . '-new-' . $news['id'] . '.jpg';
		if(File::exists('image/News/'.$filename))
			File::delete('image/News/'.$filename);
        News::findOrfail($id)->delete();
        return redirect('news');
    }

}
