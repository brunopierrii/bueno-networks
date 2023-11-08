@extends('layouts.app')

@section('content')
    <div class="container d-flex align-items-center justify-content-center flex-column" id="container-main">
        <div id="container-secondary" class="col-md-10">

            <div class="row">
                <div class="col p-4">
                    <h1>Gerenciamento de Usuários</h1>
                    <a href="/manager-user/create" class="btn btn-success btn-sm">Criar usuário</a>
                </div>

            </div>
            <div class="row">
                <div class="col d-flex justify-content-center">


                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="text-center" scope="col">Name</th>
                                <th class="text-center" scope="col">Email</th>
                                <th class="text-center" scope="col">Criado em</th>
                                <th class="text-center" scope="col">Nível de acesso</th>
                                <th class="text-center" scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr class="text-center ">
                                    <td class="align-self-center">{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ date('d/m/Y H:i:s', strtotime($user->created_at)) }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>
                                        <a href="/manager-user/edit/{{ $user->id }}" class="btn btn-primary btn-sm">
                                            <ion-icon name="create-outline"></ion-icon>
                                            Editar
                                        </a>
                                        <a href="#" class="btn btn-danger btn-sm">
                                            <ion-icon name="trash-outline"></ion-icon>
                                            Excluir
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
