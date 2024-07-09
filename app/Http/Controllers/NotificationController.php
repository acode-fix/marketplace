<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;

class NotificationController extends Controller
{
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
}
