<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 | Forbbidden');

        $manager = User::with('roles')->get();

        return view('manager.index', compact('manager'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 | Forbbidden');

        $roles = Role::pluck('title', 'id');

        return view('manager.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['password'] = Hash::make($validatedData['password']);

        $manager = User::create($validatedData);
        $manager->roles()->sync($request->input('roles', []));

        return redirect()->route('manager.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $manager)
    {
        abort_if(Gate::denies('user_access'),Response::HTTP_FORBIDDEN, '403 | Forbbidden');

        return view('manager.show', compact('manager'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $manager)
    {
        //abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 | Forbbidden');

        $roles = Role::pluck('title', 'id');

        $manager->load('roles');

        return view('manager.edit', compact('manager', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $manager)
    {
        $validatedData = $request->validated();
        $validatedData['password'] = Hash::make($validatedData['password']);

        $manager->update($validatedData);
        $manager->roles()->sync($request->input('roles', []));

        return redirect()->route('manager.index')->with('status', '{{ $manager->password }}');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $manager)
    {
        //abort_if(Gate::denies('user_access', Response::HTTP_FORBIDDEN, '403 | Forbbidden'));

        $manager->delete();

        return redirect()->route('manager.index');
    }
}
