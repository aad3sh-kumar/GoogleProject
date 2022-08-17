<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Discussion;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PostController;

class DiscussionController extends Controller
{
    public function writeComment(Request $request, $id) {
        if (! Auth::check()) {
            return back()->with('Login to discuss');
        }
        if (! $request->input('comment')) {
            return back();
        }
        Discussion::create([
            'author' => Auth::id(), 'post' => $id, 'text' => $request->input('comment')
        ]);
        if (Auth::id() != PostController::getAuthor($id)) {
            NotificationController::send(PostController::getAuthor($id), PostController::getTitle($id).' has a new comment!');
        }
        return back();
    }

    public function dissociate($post) {
        Discussion::where('post', $post->id)->update(['post' => NULL]);
    }
}
