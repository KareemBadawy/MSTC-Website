<?php

namespace App\Http\Controllers;

use Mail;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\ContactUsRequest;
use App\Http\Controllers\Controller;

class ContactUsController extends Controller
{
    public function getContactUs(ContactUsRequest $request)
    {

    	// Get all data from the form
    	$data = $request->all();

    	Mail::send('contactus', $data, function($msg) use ($data)
    	{
    		$msg->from($data['email'], $data['name']);
    		$msg->to('mstc.alex.eng@outlook.com', 'MSTCAlex')->subject($data['title']);
    	});

    	return redirect('/#contact');
    }
}
