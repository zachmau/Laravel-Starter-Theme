<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class MessagesController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function submit(Request $request){

    $this->validate($request, [
      'name' => 'required',
      'email' => 'required'
    ]);

    // Create New Message
    $message = new Message;
    $message->name = $request->input('name');
    $message->email = $request->input('email');
    $message->message = $request->input('message');

    //Save Message
    $message->save();

    //Redirect
    return redirect('/')->with('success', 'Message Sent');
  }

  public function getMessages(Request $request) {
    $messages = Message::all();
    $request->user()->authorizeRoles('admin');

    return view('messages')->with('messages', $messages);
  }

}
