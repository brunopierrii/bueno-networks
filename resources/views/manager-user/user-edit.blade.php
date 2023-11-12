@extends('layouts.app')

@section('content')
    <div class="container d-flex align-items-center justify-content-center flex-column" id="container-main">
        <div id="container-form" class="col-md-8">

            <div class="row">
                <div class="col p-4 text-center">
                    <h2>Editar usuário</h2>
                </div>
            </div>

            <div class="row">
                <div class="col d-flex justify-content-center row-edit-user">
                    <form action="/manager-user/update/{{ $user->id }}" method="POST" class="align-self-center">
                        @if (!empty($errors->toArray()))
                            <div class="alert alert-danger" role="alert">
                                @if (isset($errors->toArray()['email']))
                                    {{ $errors->toArray()['email'][0] }}   
                                @endif
                                <br>
                            </div>
                        @endif
                        @csrf
                        @method('PUT')
                        <div class="form-floating mb-3">
                            <input id="name" class="form-control" type="text" name="name"
                                value="{{ $user->name }}" required autofocus />
                            <label for="name">Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input id="email" class="form-control" type="email" value="{{ $user->email }}"
                                name="email" required autofocus />
                            <label for="email">Email</label>
                        </div>
                        <div class="mb-3 form-floating">
                            <select id="role" name="role_id" class="form-select">
                                @foreach ($roles as $role)
                                <option value="{{$role->id}}">{{ $role->name == 'admin' ? 'Administrador' : 'Comum' }}</option>
                                @endforeach
                            </select>
                            <label for="email">Selecione o nível do usuário</label>
                        </div>
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <button type="submit" class="btn btn-submit">Atualizar</button>
                            <a href="/manager-user" class="btn btn-secondary">Voltar</a>
                        </div>
                    </form>
                    <script type="text/javascript">
                        const select = document.getElementById('role');
                        select.value = {{ $roleUser->id }}
                    </script>
                </div>
            </div>
        </div>
    </div>
@endsection
