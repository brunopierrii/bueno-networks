@extends('layouts.app')

@section('content')
    <div class="container d-flex align-items-center justify-content-center flex-column" id="container-main">
        <div id="container-secondary" class="col-md-8">

            <div class="row">
                <div class="col p-4">
                    <h1>Olá, {{ ucfirst($userLogged->name) }}</h1>
                    @can('admin')
                        <p>Usuários existentes no sistema</p>
                    @elsecan('commom')
                        <p>Abaixo está seu dados</p>
                    @endcan
                </div>

            </div>
            <div class="row">
                <div class="col d-flex justify-content-center">

                    @if (auth()->user()->hasRole('admin'))
                        <table class="table table-sm table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center" scope="col">Name</th>
                                    <th class="text-center" scope="col">Email</th>
                                    <th class="text-center" scope="col">Criado em</th>
                                    <th class="text-center" scope="col">Nível de acesso</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr class="text-center">
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ date('d/m/Y H:i:s', strtotime($user->created_at)) }}</td>
                                        <td>{{ $user->role }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <ul class="list-group col-12">
                            <li class="fs-5 list-group-item">
                                <span class="fw-bold">Nome: </span>{{ ucfirst($userLogged->name) }}
                            </li>
                            <li class="fs-5 list-group-item">
                                <span class="fw-bold">Email: </span>{{ $userLogged->email }}
                            </li>
                            <li class="fs-5 list-group-item">
                                <span class="fw-bold">Criado em:</span>
                                {{ date('d/m/Y H:i:s', strtotime($userLogged->created_at)) }}
                            </li>
                            <li class="fs-5 list-group-item">
                                <span class="fw-bold">Atualizado em:</span>
                                {{ date('d/m/Y H:i:s', strtotime($userLogged->updated_at)) }}
                            </li>
                            <li class="fs-5 list-group-item">
                                <span class="fw-bold">Nível de acesso:</span>
                                {{ $userLogged->roles }}
                            </li>
                        </ul>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection