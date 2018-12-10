<?php

namespace App\Http\Controllers;

use DB;
use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
   	public function index()
    {
    	$userId = auth()->id();

    	return Message::select(
    		'id',
    		DB::raw("IF(`from_id`=$userId, TRUE, FALSE) as written_by_me"),
    		'content',
    		'created_at')->get();
    }

    public function store(Request $request)
    {
    	$message = new Message();
    	$message->from_id = auth()->id();
    	$message->to_id = $request->to_id;
    	$message->content = $request->content;
    	$saved = $message->save();

    	return [
    			'success' => $saved,
    			'message' => $message
    	];
    }
}
