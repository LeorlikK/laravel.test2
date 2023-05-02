<?php

namespace App\Http\Controllers\Admin\Personal;

use App\Events\CommentCreated;
use App\Http\Controllers\Admin\BaseAdminController;
use App\Http\Requests\Admin\Post\PostSearchRequest;
use App\Http\Requests\Admin\User\UserRequest;
use App\Http\Requests\Admin\User\UserUpdateRequest;
use App\Jobs\MailJob;
use App\Mail\User\PasswordMail;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class PersonalController extends BaseAdminController
{
    const CLASS_NAME = 'users';

    public function index()
    {
        try {
            $data = [
                'class_name' => self::CLASS_NAME,
                self::CLASS_NAME => User::paginate(10),
                'role' => User::getRoles()
            ];
        } catch (\Exception $exception) {
            return abort('404');
        }

        return response()->view('admin.personal.all', compact('data'));
    }

    public function create()
    {
        try {
            $data = [
                'class_name' => self::CLASS_NAME,
                'role' => User::getRoles()
            ];
        } catch (\Exception $exception) {
            return abort('500');
        }
        return response()->view('admin.users.create', compact('data'));
    }

    public function store(UserRequest $userRequest)
    {
        try {
            $userRequest = $userRequest->validated();
            $userRequest['password'] = Str::random(10);
            Mail::to($userRequest['email'])->send(new PasswordMail($userRequest['password']));
            $userRequest['password'] = Hash::make($userRequest['password']);
            if ($userRequest['role'] == 500) unset($userRequest['role']);
            $userRequest['name'] = $userRequest['login'];
            unset($userRequest['login']);
            if (isset($userRequest['avatar'])) $userRequest['avatar'] = Storage::disk('public')->put('/avatar', $userRequest['avatar']);
            $user = User::firstOrCreate(['email' => $userRequest['email']], $userRequest);
            event(new Registered($user));
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }

        return redirect()->route('admin.users.index');
    }

    public function show(User $user, Request $request)
    {
        try {
            $page = $request->page;
            $data = [
                'class_name' => self::CLASS_NAME,
                'users' => User::find($user->id)
            ];
        } catch (\Exception $exception) {
            return abort('404');
        }

        event(new CommentCreated($data['users']));
        return view('admin.users.read', compact('data', 'page'));
    }

    public function edit(User $user, Request $request)
    {
        try {
            $page = $request->page;
            $data = [
                'class_name' => self::CLASS_NAME,
                'users' => User::find($user->id),
                'role' => User::getRoles()
            ];
        } catch (\Exception $exception) {
            return abort('404');
        }

        return view('admin.users.update', compact('data', 'page'));
    }

    public function update(User $user, UserUpdateRequest $userUpdateRequest)
    {
//        dd($user['avatar']);
        try {
            $page = $userUpdateRequest->page;
            $userUpdateRequest = $userUpdateRequest->validated();
            $userUpdateRequest['name'] = $userUpdateRequest['login'];
            unset($userUpdateRequest['login']);
            if ($userUpdateRequest['password'] == null) unset($userUpdateRequest['password']);
            if (isset($userUpdateRequest['avatar'])){
                if ($user->avatar != null) {
                    Storage::disk('public')->delete('avatar', $user['avatar']);
                }
                $userUpdateRequest['avatar'] = Storage::disk('public')->put('avatar', $userUpdateRequest['avatar']);
            }
            else {
                if (!Hash::check($userUpdateRequest['password'], $user->password)) {
                    $userUpdateRequest['password'] = Hash::make($userUpdateRequest['password']);
                } else {
                    unset($userUpdateRequest['password']);
                }
            }

            $user->update($userUpdateRequest);
        } catch (\Exception $exception) {
            return abort('404');
        }

        return redirect()->route('admin.users.show', [$user->id, "page={$page}"]);
    }

    public function destroy(User $user)
    {
        try {
            $user->delete();
        } catch (\Exception $exception) {
            return abort('404');
        }

        return redirect()->route('admin.users.index');
    }
}

