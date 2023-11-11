<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Notifications\EmailNotification;
use App\Service\MessageService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Illuminate\Validation\Rules;


class ManagerUserController extends Controller
{
    private MessageService $messageService;

    public function __construct(MessageService $messageService)
    {
        $this->messageService = $messageService;
    }

    public function index(): View
    {
        $userAuth = User::find(auth()->user()->id);

        if (!$userAuth->isAdmin()) {
            return back();
        }

        $users = User::all();

        $usersView = [];
        foreach ($users as $user) {
            foreach ($user->roles as $role) {
                $user->role .= $role->name;
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
        $userAuth = auth()->user();

        $data = $request->all();

        $user = User::find($id);
        $user->roles()->sync([$request->role]);
        $user->update($data);

        if($user->device_token){
            $this->messageService->send($user->device_token, 'Seu usuário foi editado', 'Por: '.$userAuth->name);
        }

        return redirect('/manager-user')
            ->with('msg', 'Usuário atualizado com sucesso')
            ->with('colorMsg', 'success');
    }

    public function create(): View
    {
        return view('manager-user.user-create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $user->assignRoles($request->role);

        $msg = [
            'userAuth' => auth()->user()->name,
            'userMail' =>  $user->name,
            'welcome' => "Bem vindo ao taskier, clique no botão a baixo e faça login usando as credencias.",
            'email' => $user->email,
            'password' => $request->password
        ];

        $user->notify(new EmailNotification($msg));

        return redirect('/manager-user')
            ->with('msg', 'Usuário criado com sucesso')
            ->with('colorMsg', 'success');
    }

    public function destroy(int $id): RedirectResponse
    {
        $user = User::find($id);

        if ($user->id == auth()->user()->id) {
            return redirect('/manager-user')
                ->with('msgError', 'Não pode deletar o usuário que está logado!')
                ->with('colorMsg', 'warning');
        }

        $user->roles()->detach();
        $user->delete();

        return redirect('/manager-user')
            ->with('msg', 'Usuário deletado com sucesso')
            ->with('colorMsg', 'success');
    }
}
