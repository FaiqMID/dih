<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index(){
        $user = User::where('id', Auth::user()->id)->first();
        $notifications = Notification::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('notification', compact('notifications'));
        // return view('notification');
    }
    public function markAsRead(Request $request)
    {
        $notification = Notification::findOrFail($request->id);
        $notification->is_read = true;
        $notification->save();

        return redirect()->back()->with('success', 'Notification marked as read.');
    }

    public function markAllAsRead()
    {
        Notification::where('is_read', false)->update(['is_read' => true]);

        return redirect()->back()->with('success', 'All notifications marked as read.');
    }
}
