<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
use Barryvdh\Debugbar\Facades\Debugbar;
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


    public function updateReadNotification(Request $request) {

       // debugbar::info($request->notificationId);

       $validator = Validator::make($request->all(), [
        'notificationId' => 'required|exists:notifications,notifiable_id',
        'productId' => 'required|exists:products,id',

       ]);

       if($validator->fails()) {
        return response()->json([
            'status' => false,
            'message' => 'validation fails',
            'errors' => $validator->errors(),

        ], 422);
       }


       $notifications = Notification::where('notifiable_id', $request->notificationId)
                                     ->where('data->product_id', $request->productId)
                                     ->orderBy('id', 'desc')->get();

        if(!$notifications->isEmpty()) {

            foreach($notifications as $notification) {
            $notification->read_at = now();
            $notification->save();
            }
            return response()->json([
                'status' => true,
                'message' => 'Notification marked as read successfully',

            ], 200);

        }



        return response()->json([
            'status' =>false,
            'message' => 'No Match found for the notification',

        ], 404);

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
