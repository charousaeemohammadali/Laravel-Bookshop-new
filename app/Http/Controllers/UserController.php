<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.list' , compact('users'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit(User $user)
    {
        if ($user->role == 'superAdmin'){
            return redirect()->route('users.index');
        }
        return view('admin.users.edit' , compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => ['required'],
            'lastname' => ['required'],
            'email' => ['required'],
            'role' => ['required'],
        ]);
        $user->update($request->all());
        alert()->success('کاربر مورد نظر با موفقیت ویرایش گردید');
        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        //
    }
}