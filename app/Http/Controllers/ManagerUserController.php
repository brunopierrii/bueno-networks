<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Illuminate\Validation\Rules;
use Termwind\Components\Raw;

class ManagerUserController extends Controller
{

    public function index()
    {
        $userAuth = User::find(auth()->user()->id);

        if(!$userAuth->isAdmin()){
            return back();
        }

        $users = User::all();

        $usersView = [];
        foreach($users as $user){
            $user->roles = '';
            foreach($user->roles()->getResults()->toArray() as $role){
                $user->role .= $role['name'];
            }
            $usersView[] = $user;
        }

        return view('manager-user', ['users' => $usersView]);
    }

    public function edit(int $id): View
    {
        $user = User::find($id);

        $roles = Role::all();

        return view('manager-user.user-edit', [
            'user' => $user,
            'roles' => $roles
        ]);
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $data = $request->all();

        $user = User::find($id);

        $user->roles()->sync([$request->role]);
        $user->update($data);

        return redirect('/manager-user');
    }

    public function create(): View
    {
        return view('manager-user.user-create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $user->assignRoles($request->role);

        return redirect('/manager-user')->with('msg', 'Usuário salvo com sucesso');
    }
}
