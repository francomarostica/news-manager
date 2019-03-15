<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\NotificationSent;

class NotificationsController extends Controller
{
    public function __contruct(){
        //$this->middleware('auth');
    }
    
    public function listenNotifications(Request $request)
    {
        return $request;
    }

    public function sendNotification(Request $request)
    {
        $message = $request->get('message');

        //broadcast(new NotificationSent($message, 'information'))->toOthers();
        event(new NotificationSent($message, 'info'));
        return $message;
    }
}
