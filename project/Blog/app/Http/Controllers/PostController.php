<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Discussion;
use App\Models\Follower;
use App\Models\Notification;

class PostController extends Controller
{

    public function getPosts($authorname) {
        $posts = Post::paginate(8);
        if ($authorname == true) {
            for($i = 0; $i < sizeof($posts); $i++) {
                $id = $posts[$i]['author'];
                $username = User::findorFail($id)->username;
                $posts[$i]['author'] = $username;
            }
        }
        return $posts;
    }

    public function getBlogsbyAuthor() {
        return view('post/user', ['posts' => Post::where('author', Auth::id())->paginate(8)]);
    }

    public function getAuthor($id) {
        return Post::findorFail($id)->author;
    }

    public function getTitle($id) {
        return Post::findorFail($id)->title;
    }

    public function isUnique($title) {
        return Post::where('author', Auth::id())->where('title', $title)->first() != null;
    }

    public function CreatePost(Request $request) {
        if (!Auth::check()) {
            return redirect()->intended()->with('error', 'Log In to create posts');
        }

        if (!$request->input('title')) {
            return view('post/create');
        }

        if ($this->isUnique($request->input('title'))) {
            return redirect()->intended()->with('error', 'You have already made a post with that title!');
        }

        $this->create($request);
        
        return redirect()->intended();
    }

    public function create(Request $request) {
        $post = new Post();
        $post->title = $request->input('title');
        $post->text = $request->input('text');
        $post->author = Auth::id();
        $user = User::find(Auth::id());
        $user->blogs += 1;

        // send a notification to all the followers of the authenticated user
        $followers = Follower::where('user_2', Auth::id())->get();
        foreach($followers as $follower) {
            Notification::create(['text' => $user['username'].' has created a new post!', 'user' => $follower['user_1']]);
        }

        $user->save();
        $post->save();
    }

    public function viewPost(Request $request, $id) {
        $post = Post::findorFail($id);
        $userId = $post['author'];
        $post['author'] = User::findorFail($userId)->username;
        $discussions = Discussion::where('post', $id)->get();
        for($i=0; $i<sizeof($discussions); $i++) {
            $userid = $discussions[$i]['author'];
            $username = User::findorFail($userid)->username;
            $discussions[$i]['author'] = $username;
        }
        return view('post/view', ['post' => $post, 'discussions' => $discussions]);
    }

    public function editPost(Request $request, $id) {
        if (!Auth::check()) {
            return redirect()->intended()->with('error', 'Log In to create/edit Posts');
        }
        if (!$request->input('Title') && !$request->input('text')) {
            $post = Post::findorFail($id);
            if ($post['author'] != Auth::id()) {
                return back()->with('error', 'You are not the author of this post');
            }
            return view('post/edit', ['post' => $post, 'id' => $id]);
        }
        $post = Post::findorFail($id);
        $post->title = $request->input('title');
        $post->text = $request->input('text');
        $post->save();
        return redirect('/');
    }

    public function vote($id, $up) {
        if (! Auth::check())    // user is not logged in
            return back()->with('message', "Log in before voting on a post");
        if (Auth::id() == Post::findorFail($id)->author)     // user is the author himself
            return back()->with('message', "You can't vote on your own post");
        
        $post = Post::findorFail($id);
        if ($up == 'upvote')
            $post->votes += 1;
        else
            $post->votes -= 1;
        $post->save();
        return back();
    }

    public function deleteForm(Post $post) {
        if (!Auth::check() || $post['author'] != Auth::id()) {
            return back()->with('error', 'Only Author can delete post');
        }

        $this->delete($post);

        return redirect()->intended();
    }

    public function delete(Post $post) {
        $user = User::findorFail($post->author);
        // decrement author's blog count
        $user->blogs -= 1;
        $user->save();

        // delete discussions as well
        DiscussionController::dissociate($post);

        $post->delete();
    }
}