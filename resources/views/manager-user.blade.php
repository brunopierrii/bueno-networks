@extends('layouts.app')

@section('content')
    @if (session('msg') || session('msgError'))
        <div class="alert alert-{{ session('colorMsg') }} float-end text-center col-md-3 me-2 mt-2 align-item-center position-absolute end-0" role="alert">
            {{ session('msg') ?? session('msgError') }}
        </div>
    @endif
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
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ date('d/m/Y H:i:s', strtotime($user->created_at)) }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center flex-row">
                                            <a href="/manager-user/edit/{{ $user->id }}" class="btn btn-primary btn-sm">
                                                <ion-icon name="create-outline"></ion-icon>
                                                Editar
                                            </a>
                                            <button type="button" class="ms-2 btn btn-danger btn-sm"
                                                data-dado="/manager-user/delete/{{ $user->id }}" data-bs-toggle="modal"
                                                data-bs-target="#modal-delete">
                                                <ion-icon name="trash-outline"></ion-icon>
                                                Excluir
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modal-delete" tabindex="-1" aria-labelledby="modalDelete" aria-hidden="true">
            <div class="modal-dialog modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="modalDelete">Confirma ?</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Deseja realmente excluir esse usuário ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <form id="form-btn-modal" action="" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="event.preventDefault(); this.closest('form').submit()"
                                class="btn btn-primary">
                                Confirmar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
