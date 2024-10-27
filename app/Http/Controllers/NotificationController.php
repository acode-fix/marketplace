<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
use Illuminate\Support\Facades\Validator;

class NotificationController extends Controller
{  

    public function getNotifications(Request $request) {

        if(!$request->user()) {

            return response()->json([
                'status' => false,
                'message' => 'authentication failed'

            ], 401);
        }

        $userId = $request->user()->id;
         
      $notifications =  Notification::where('notifiable_id', $userId)->whereNull('read_at')->get();

      if($notifications) {

        return response()->json([
            'status' => true,
            'message' => 'user Notifications fetched successfully',
            'notifications' => $notifications,

        ], 200);
      }else {

        return response()->json([
            'status' => false,
            'message' => 'empty notification'

        ], 404);
      }



    }
    
    
    
    
    
    
    
    
    
    /*
    public function index(Request $request)
    {
        return response()->json($request->user()->notifications()->orderBy('created_at', 'desc')->get());
    }

    public function show($id)
    {
        $notification = Notification::findOrFail($id);
        return response()->json($notification);
    }

    public function markAsRead($id)
    {
        $notification = Notification::findOrFail($id);
        $notification->update(['is_read' => true]);
        return response()->json($notification);
    }

    public function destroy($id)
    {
        $notification = Notification::findOrFail($id);
        $notification->delete();
        return response()->json(null, 204);
    }




    */
}
