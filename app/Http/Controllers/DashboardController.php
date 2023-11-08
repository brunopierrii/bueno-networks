<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $userLogged = auth()->user();

        $users = User::all();
        
        $usersView = [];
        foreach($users as $user){
            $user->roles = '';
            foreach($user->roles()->getResults()->toArray() as $role){
                $user->role .= $role['name'];
            }
            $usersView[] = $user;
        }

        return view('dashboard', [
            'userLogged' => $userLogged,
            'users' => $usersView
        ]);
    }
}
