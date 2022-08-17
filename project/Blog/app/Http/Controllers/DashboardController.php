<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Redis;

class DashboardController extends Controller
{
    //
    public function Dashboard(Request $request) {
        return view('dashboard', [
            'posts' => PostController::getPosts(true),
        ]);
    }
}
