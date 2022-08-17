<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    //
    public function send($user, $slug) {
        Notification::create(['user' => $user, 'text' => $slug]);
        return back();
    }

    public function delete($id) {
        Notification::destroy($id);
        return back();
    }

    public function get($id) {
        return Notification::where('user', $id)->get();
        return back();
    }

    public function showNotifications() {
        return view('user/notifications', [
            'notifications' => Notification::where('user', Auth::id())->paginate(10)
        ]);
    }
}
