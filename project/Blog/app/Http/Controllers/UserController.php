<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\NotificationController;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Laravel\Socialite\Facades\Socialite;

use Google\Client;
use Google\Service\Oauth2;

class UserController extends Controller
{

    public function Register(Request $request) {
        if (!$request->input('email')) {
            return view('user/register');
        }
    }

    public function SocialLogin(Request $request, $provider) {
        // The plugin sends the user to the Google Authentication Page with requested scopes
        return Socialite::driver($provider)->redirect();
    }

    public function SocialCallback(Request $request, $provider) {
        // The plugin returns here with the Token, Refresh Token and User details.
        $user =  Socialite::driver($provider)->user();
        
        $record = User::where('email', $user->getEmail())->first();
        if($record) {
            Auth::login($record);
        } else {
            $created = User::create(['email' => $user->getEmail(), 'password' => 123456, 'username' => $user->getName()]);
            Auth::login($created);
        }
        return redirect()->intended();
    }

    public function Login() {
        if (Auth::check()) {
            return redirect()->intended();
        }
        return view('user/login');
    }

    public function PostLogin(Request $request) {
        $user_cred = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        if (Auth::attempt($user_cred)) {
            $request->session()->regenerate();
            return back();
        } else {
            return back()->with('error', 'Wrong Login Details');
        }
    }

    public function Logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function RegisterCheck(Request $request) {
        $user_data = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
            'username' => 'required',
        ]);
        if (sizeof(User::where('email', $request->input('email'))->get()) > 0) {
            return back()->with('error', 'This Email is already registered');
        } else {
            User::create([
                'username' => $request->input('username'), 'password' => Hash::make($request->input('password')), 'email' => $request->input('email')
            ]);
            return redirect('/');
        }
    }

    public function ShowProfile(Request $request, $id) {
        $user = User::findorFail($id);
        $following = FollowerController::get($id);
        return view('user/profile', [
            'user' => $user, 'id' => $id, 'following' => (sizeof($following)>0)
        ]);
    }

    public function index() {
        return view('user/index', [
            'users' => User::all()
        ]);
    }

    public function editProfile(Request $request) {
        $user = User::findorFail(Auth::id());
        if (! $request->input('email')) {
            return view('user/edit', [
                'user' => $user
            ]);
        }
        $user->update($request->except(['_token']));
        return redirect('/');
    }
}
