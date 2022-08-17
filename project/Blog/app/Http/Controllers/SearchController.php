<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class SearchController extends Controller
{

    /*
        Search posts by titles and present their views with the data
    */
    public function search(Request $request) {
        $posts = Post::where('title', $request->input('title'))->paginate(8);
        if (sizeof($posts) > 0) {
            for($i = 0; $i < sizeof($posts); $i++) {
                $posts[$i]['author'] = User::findorFail($posts[$i]['author'])->username;
            }
            return view('dashboard', ['posts' => $posts]);
        }
        return redirect('/');
    }
}