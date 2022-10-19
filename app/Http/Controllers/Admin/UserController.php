<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Fortify\CreateNewUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class UserController extends Controller
{
    //------------------------------------------------------------------------
    public function index()
    {
        $users = User::paginate(10);

        if (Gate::denies('logged-in')){
            dd('no access allowed');
        }

        if (Gate::allows('is-admin')){
            return view('admin.users.index', ['users' => $users ]);
        }

        dd('you need to be admin');
    }

    //------------------------------------------------------------------------
    public function create()
    {
        return view('admin.users.create', ['roles' => Role::all()]);
    }

    //------------------------------------------------------------------------
    public function store(StoreUserRequest $request)
    {
        //$validatedData = $request->validated();
        //$user = User::create($validatedData);

        $newUser = new CreateNewUser();
        $user = $newUser->create($request->only(['name', 'email', 'password', 'password_confirmation']));

        $user->roles()->sync($request->roles);

        Password::sendResetLink($request->only(['email']));

        $request->session()->flash('success', 'User Created');

        return redirect(route('admin.users.index'));
    }

    //------------------------------------------------------------------------
    public function show($id)
    {
        //
    }

    //------------------------------------------------------------------------
    public function edit($id)
    {
        return view('admin.users.edit', [
            'roles' => Role::all(),
            'user' => User::find($id)
        ]);
    }

    //------------------------------------------------------------------------
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if (!$user) {
            $request->session()->flash('error', 'You can not edit this user.');
            return redirect(route('admin.users.index'));
        }



        $user->update($request->except(['_token', 'roles']));
        $user->roles()->sync($request->roles);

        $request->session()->flash('success', 'User Updated');

        return redirect (route('admin.users.index'));
    }

    //------------------------------------------------------------------------
    public function destroy($id, Request $request)
    {
        User::destroy($id);
        $request->session()->flash('success', 'User Deleted');

        return redirect(route('admin.users.index'));
    }
}
