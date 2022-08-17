<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Follower;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FollowerController extends Controller
{

    public function toggle(Request $request, $id) {
        if (Auth::id() == $id) {
            return back()->with('error', 'You can\'t follow yourself');
        }
        $users = Follower::where('user_1', Auth::id())->where('user_2', $id)->get();
        $user = User::findorFail($id);
        if (sizeof($users) > 0) {
            Follower::destroy($users[0]['id']);
            $user->followers -= 1;
        } else {
            Follower::create([
                'user_1' => Auth::id(),
                'user_2' => $id
            ]);
            $user->followers += 1;
        }
        $user->save();
        return back();
    }

    public function get($id) {
        return Follower::where('user_1', Auth::id())->where('user_2', $id)->get();
    }
}
