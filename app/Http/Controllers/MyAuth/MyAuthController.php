<?php

namespace App\Http\Controllers\MyAuth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Login\LoginRequest;
use App\Jobs\MailJob;
use App\Mail\User\PasswordMail;
use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MyAuthController extends Controller
{
    public function login()
    {
        return view('admin.login.login');
    }

    public function login_store(LoginRequest $loginRequest)
    {
        $loginRequest = $loginRequest->validated();
//        dd($loginRequest->only('email', 'password')); config/auth.php /exist()

//        if (auth()->attempt($loginRequest->only('email', 'password'))) {
//            return redirect()->intended('/');
//        } else {
//            return redirect()->route('myauth.login')->withErrors(['email' => 'Неправильное адресс электронной почты!', 'password' => 'Неверный пароль!']);
//        }

//        $user = User::where('email',  $loginRequest['email'])->exists();
        $user = User::where('email',  $loginRequest['email'])->first();
//        dd($user);
        if (isset($user)) {
            if (Hash::check($loginRequest['password'], $user->password)) {
                auth()->login($user);
                return redirect()->route('admin.index');
            } else {
                return redirect()->route('myauth.login')->withErrors(['password' => 'Неверный пароль!']);
            }
        } else {
            return redirect()->route('myauth.login')->withErrors(['email' => 'Неправильное адресс электронной почты!']);
        }
    }

    public function registration()
    {
        return view('admin.login.registration');
    }

    public function registration_accept(Request $userRequest)
    {
        try {
            $userRequest = $userRequest->validate([
                'name' => ['required', 'string', 'unique:users,name'],
                'email' => ['required', 'email', 'unique:users,email'],
                'password' => ['required', 'string'],
            ]);
            $password = Str::random(10);
            $userRequest['password'] = $password;
            $userRequest['password'] = Hash::make($userRequest['password']);
            $user = User::firstOrCreate(['email' => $userRequest['email']], $userRequest);
            auth()->login($user);
            event(new Registered($user));
            MailJob::dispatch($user, $password)->onQueue('mail_send');
//            Mail::to($userRequest['email'])->send(new PasswordMail($userRequest['password']));

        } catch (\Exception $exception) {
            return $exception->getMessage();
        }

        return redirect()->route('verification.notice');
//        return redirect()->route('all_posts');
    }

    public function login_logout()
    {
        auth()->logout();
        return redirect()->route('myauth.login');
    }
}
