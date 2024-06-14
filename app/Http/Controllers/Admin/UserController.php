<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use App\Models\User;

class UserController extends Controller
{
    private $view = 'admin.users.';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all()->where('type', '!=', 3);
        return view($this->view . 'index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view($this->view . 'create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $user = new User($request->except('_token'));
        $user->save();
        return redirect()->route('users.show',$user->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view($this->view.'show')->with('user',$user);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view($this->view.'edit')->with('user',$user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->except('_token'));
        return view($this->view.'show')->with('user',$user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }
}
