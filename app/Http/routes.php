<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use App\Event;
use App\News;


// All Routes Requires Authentication
Route::group(['middleware' => 'auth'], function(){

//All Routes with ViceHead Access or Higher
	Route::group(['middleware' => 'role:Vice Head'], function(){
	// News Routes
		Route::resource('news', 'NewsController');
		Route::get('news/{id}/destroy', 'NewsController@destroy');
/*----------------------------------------------------------------------------------*/
	// Events Routes
        Route::get('events/present', 'EventsController@index_present');
        Route::get('events/past', 'EventsController@index_past');
        Route::get('events/upcoming', 'EventsController@index_upcoming');
		Route::resource('events', 'EventsController');
        Route::get('events/{id}/destroy', 'EventsController@destroy');
		Route::get('events/{id}/publish', 'EventsController@publish');
        Route::post('events/{id}/images/update', 'EventsController@update_images');
        Route::get('events/{id}/images/{name}/destroy', 'EventsController@delete_agallery_photo');
		Route::get('events/{id}/images/{name}/cover', 'EventsController@change_cover');
/*----------------------------------------------------------------------------------*/
		// announcement Routes
		Route::resource('announcements', 'AnnouncementsController');
		Route::get('announcements/{id}/destroy', 'AnnouncementsController@destroy');
/*----------------------------------------------------------------------------------*/
	//Tasks Routes
		Route::get('tasks/finish','TasksController@finished');
		Route::get('tasks/owntasks','TasksController@owntasks');
		Route::get('tasks/head/create','TasksController@createFhead');
		Route::resource('tasks','TasksController');
		Route::get('tasks/{id}/updatestatus','TasksController@updatestatus');
		Route::get('tasks/{id}/destroy','TasksController@destroy');
/*----------------------------------------------------------------------------------*/
	// Subscribtions Routes
		Route::get('subscribtions', 'SubscribtionsController@index');
/*----------------------------------------------------------------------------------*/
	// Question Routes
		Route::resource('questions','QuestionsController');
/*----------------------------------------------------------------------------------*/
	// Choices Routes 
		Route::resource('questions.choices','ChoicesController');
/*------------------------------------------------------------------------------*/
	// Votes Routes
		Route::resource('questions.choices.votes','VotesController');
/*------------------------------------------------------------------------------*/
		// Scores Routes
		Route::get('scores', 'ScoresController@index');
		Route::get('scores/getByuser/{user_id}', 'ScoresController@getByuser');
		Route::get('scores/{id}/show', 'ScoresController@show');
		Route::get('scores/{task_id}/create', 'ScoresController@create');
		Route::get('scores', 'ScoresController@index');
		Route::post('scores/{task_id}', 'ScoresController@store');
/*----------------------------------------------------------------------------------*/
	}); //End of ViceHead Access Group


// All Routes with Member Access or Higher
	Route::group([],function(){
	// Dashboard Route
		Route::get('dashboard', function(\Illuminate\Http\Request $request){
            $posts = \App\Post::whereIn('vertical_id',Auth::User()->Verticals()->lists('id'))->latest()->paginate('8');
            $tasks=Auth::User()->tasks->take(3);

                //if there is ajax call it send the  posts and the new page of posts
                if($request->ajax())
                {
                    return['posts'=>view('endless-pagination')->with(compact('posts'))->render(),
                        'next_page'=>$posts->nextPageUrl()
                    ];
                }
			try {
				// request with vimeo api to get the videos of our account on vimeo
				$response = Vimeo::request('/users/mstcalex/videos', ['per_page' => 10], 'GET');
				//get the last video sent by the request
				$video_info = $response['body']['data']["0"];
			}
			catch (\Vimeo\Exceptions\VimeoRequestException $e )
			{
				$video_info=null;
			}

			return view('dashboard')->with(['posts'=>$posts])->with(['tasks'=>$tasks])->with(['video_info'=>$video_info]);
		});
/*----------------------------------------------------------------------------------*/
	//User Routes
		Route::get('profile', 'UsersController@profile');
		Route::post('/profile/picture', 'UsersController@Profile_upload');
		Route::get('/profileimage/{filename}', ['uses' => 'UsersController@getprofileImage', 'as' => 'profile.image']);
/*----------------------------------------------------------------------------------*/
	//Posts Routes
		Route::resource('posts','PostsController');
		Route::get('posts/{id}/destroy','PostsController@destroy');
		Route::get('posts/verticalPosts/{id}','PostsController@post_vertical');
/*----------------------------------------------------------------------------------*/	
	// Tasks Routes
		Route::get('tasks', 'TasksController@index');
		Route::get('tasks/{tasks}', 'TasksController@show');
		Route::get('tasks/finish','TasksController@finished');
		Route::get('tasks/{id}/updatestatus','TasksController@updatestatus');
/*----------------------------------------------------------------------------------*/
	}); // End of Member Access Group

}); // End of Auth Group


// All Public Routes
Route::group([],function(){
// Homepage Route
	Route::get('/', function () {
		$News=News::orderBy('created_at','desc')->get()->take(2);
		$upcoming_events=Event::where('status','=',1)->orderby('started_at','desc')->where('ended_at', '>=', Carbon\Carbon::now())->take(3)->get();
		$present_events=Event::where('status','=',0)->orderby('started_at','desc')->where('ended_at', '>=', Carbon\Carbon::now())->take(3)->get();
		$past_events=Event::where('status','<=',1)->where('ended_at', '<', Carbon\Carbon::now())->orderBy('ended_at','desc')->take(3)->get() ;
		$announcements=\App\Announcement::orderby('created_at','desc')->get();
		return view('homepage')->with(['upcoming_events'=>$upcoming_events])->with(['present_events'=>$present_events])->with(['past_events'=>$past_events])->with(['News'=>$News])->with(['announcements'=>$announcements]);
	});
/*----------------------------------------------------------------------------------*/
// News Routes
	Route::get('news', 'NewsController@index');
	Route::get('news/{news}', 'NewsController@show');
/*----------------------------------------------------------------------------------*/
// Announcements Routes
    Route::get('announcements/{announcements}', 'AnnouncementsController@show');
/*----------------------------------------------------------------------------------*/
// Events Routes
    Route::get('events/present', 'EventsController@index_present');
    Route::get('events/past', 'EventsController@index_past');
    Route::get('events/upcoming', 'EventsController@index_upcoming');
	Route::get('events', 'EventsController@index');
	Route::get('events/{events}', 'EventsController@show');
    Route::get('events/{id}/images', 'EventsController@show_images');
	/*----------------------------------------------------------------------------------*/
// Submit Subscribtions Routes
	Route::post('subscribe', 'SubscribtionsController@store');
	Route::get('subscribe', function(){});
/*----------------------------------------------------------------------------------*/
// User Routes
	Route::get('auth/login', 'Auth\AuthController@getLogin');
	Route::post('auth/login', 'Auth\AuthController@postLogin');
/*----------------------------------------------------------------------------------*/
// Contact Us Routes
	Route::post('contactus', 'ContactUsController@getContactUs');
	Route::get('contactus', function(){});
/*----------------------------------------------------------------------------------*/
}); // End of Public Access Group





// User routes
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
Route::get('email', 'Auth\PasswordController@getEmail');
Route::post('email', 'Auth\PasswordController@postEmail');
Route::get('reset/{code}', 'Auth\PasswordController@getReset');
Route::post('reset', 'Auth\PasswordController@postReset');
/*------------------------------------------------------------------------------*/

