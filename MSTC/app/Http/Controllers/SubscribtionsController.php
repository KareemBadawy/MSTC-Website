<?php

namespace App\Http\Controllers;

use App\Subscribtion;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\SubscribtionRequest;
use App\Http\Controllers\Controller;

class SubscribtionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscribers = Subscribtion::all();
        return view('Subscribtions.index', compact('subscribers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(SubscribtionRequest $request)
    {
        Subscribtion::create($request->all());
        return redirect('/');
    }
}
