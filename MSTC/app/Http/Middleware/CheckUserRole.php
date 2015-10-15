<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class CheckUserRole
{

    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        try{
            $next($request);
        }
        catch(Request $require){
            return response(view('error.404'), 404);
        }
        
        if($this->auth->check())
        {
            $role = $this->auth->user()->getRole();

            switch ($role) {
                case 'President':
                    #
                case 'Head':
                    if($request->is('auth/*')){
                        return $next($request);
                    }
                case 'ViceHead':
                    if($request->is('tasks/*')||
                        $request->is('events/*')||
                        $request->is('news/*')||
                        $request->is('subscribtions')){
                       return $next($request); 
                    }
                case 'Member':
                    if($request->is('dashboard')||
                        $request->is('posts/*')||
                        $request->is('tasks')||$request->is('tasks/{id}')||
                        $request->is('auth/logout')){
                        return $next($request);
                    }
                default:
                    break;
            }
        }
        if($request->is('/')||$request->is('news')||$request->is('news/{id}')
            ||$request->is('events')||$request->is('events/{id}')
            ||$request->is('auth/login')||$request->is('auth/logout')

            /*Just for Debuging*/||$request->is('auth/register')){

            return $next($request);
        }

        return redirect('auth/login');
    }
}
