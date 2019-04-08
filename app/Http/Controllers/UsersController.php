<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth');
      $this->middleware(['permission:read users'])->only(['index', 'show']);
      $this->middleware(['can:update,user'])->only(['edit', 'changeEmail', 'changePassword']);
      $this->middleware(['permission:search users'])->only(['search']);
    }

    public function index()
    {
        $users = User::paginate(10);
        return view('users.index', compact('users'));
    }

    public function search(Request $request)
    {
        $input = $request->input('text');

        $users = User::where('username', 'LIKE', '\\' . $input . '%')
                     ->orWhere('id', 'LIKE', '\\' . $input . '%')
                     ->get();

        return response()->json($users);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function changeEmail(Request $request, User $user)
    {
        $attributes = $request->validate([
            'email' => 'required|email|unique:users',
        ]);

        $user->update($attributes);

        return redirect()->back()->with("success", __('Your e-mail address has been changed'));
    }

    public function changePassword(Request $request, User $user)
    {
        if (!(Hash::check($request->get('current-password'), $user->password))) {
            return redirect()->back()->withErrors("Your current password does not match with the password you provided. Please try again.");
        }
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            return redirect()->back()->withErrors("New Password cannot be same as your current password. Please choose a different password.");
        }

        $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:8|confirmed',
        ]);

        $user->update([
            'password' => bcrypt($request->get('new-password')),
        ]);

        return redirect()->back()->with("success", __('Your password address has been changed'));
    }
}
