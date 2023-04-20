<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use Illuminate\Notifications\DatabaseNotification;
//use Illuminate\Notifications\Notifiable;
class UserNotifyController extends Controller
{
    //

      public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Topic $topic, DatabaseNotification $notification)
    {

        $notification->markAsRead();

       return view('notification.show',[
         'topic'=>$topic,
         'notification' =>$notification
       ]);
    }

}
