<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\UserRequest;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index()
    {
        $users = User::latest('id')->paginate(20);
        return view('back.users.index', compact('users'));
    }

    public function create()
    {
        return view('back.users.create');
    }

    public function store(UserRequest $request)
    {
        $user = User::create($request->all());

        if($user){
            return redirect()
                ->route('back.users.edit', $user)
                ->withSuccess('登録完了');
        }else{
            return redirect()
                ->route('back.users.create')
                ->withError('登録失敗');
        }
    }

    public function edit(User $user)
    {
        return view('back.users.edit', compact('user'));
    }

    public function update(UserRequest $request, User $user)
    {
        if($user->update($request->all())){
            $flash = ['success' => '更新完了'];
        }else{
            $flash = ['error' => '更新失敗'];
        }

        return redirect()
            ->route('back.users.edit', $user)
            ->with($flash);
    }
}
