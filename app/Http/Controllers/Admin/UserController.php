<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Fortify\CreateNewUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //----------------------------------------------------------------------------------------------
    public function index()
    {
        if (Gate::denies('logged-in')){
            dd('no acess allowed');
        }

        if (Gate::allows('is-admin')){
            return view('admin.users.index', ['users' => User::paginate(10)]);
        }

        dd('you need to be admin');

    }

    //----------------------------------------------------------------------------------------------
    public function create()
    {
        return view('admin.users.create', ['roles' => Role::all()]);
    }

    //----------------------------------------------------------------------------------------------
    public function store(StoreUserRequest $request)
    {
        //$validatedData = $request->validated();
        //$user = User::create($validatedData);

        $newUser = new CreateNewUser();
        $user = $newUser->create($request->only(['name', 'email', 'password', 'password_confirmation']));

        $user->roles()->sync($request->roles);

        $request->session()->flash('sucess', 'User Stored');

        return redirect(route('admin.users.index'));
    }

    //----------------------------------------------------------------------------------------------
    public function show($id)
    {
        //
    }

    //----------------------------------------------------------------------------------------------
    public function edit($id)
    {
        return view('admin.users.edit',
            [
                'roles' => Role::all(),
                'user'  => User::find($id)
            ]);
    }

    //----------------------------------------------------------------------------------------------
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if (!$user) {
            $request->session()->flash('error', 'Not Edited');
            return redirect(route('admin.users.index'));
        }

        $user->update($request->except(['_token', 'roles']));
        $user->roles()->sync($request->roles);

        $request->session()->flash('sucess', 'User Edited');
        return redirect(route('admin.users.index'));
    }

    //----------------------------------------------------------------------------------------------
    public function destroy($id, Request $request)
    {
        User::destroy($id);

        $request->session()->flash('sucess', 'User Deleted');
        return redirect(route('admin.users.index'));
    }
}
