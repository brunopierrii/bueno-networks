@extends('layouts.app')

@section('content')
    <div class="container d-flex align-items-center justify-content-center flex-column" id="container-main">
        <div id="container-form" class="col-md-8">

            <div class="row">
                <div class="col p-4 text-center">
                    <h2>Novo usuário</h2>
                </div>
            </div>

            <div class="row">
                <div class="col d-flex justify-content-center row-edit-user">
                    <form action="/manager-user/new" method="POST" class="align-self-center">
                        @csrf

                        <div class="form-floating mb-3">
                            <input id="name" class="form-control" type="text" name="name" required autofocus />
                            <label for="name">Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input id="email" class="form-control" type="email" name="email" required autofocus />
                            <label for="email">Email</label>
                        </div>

                        <div class="mb-3 form-floating">
                            <select id="role" name="role" class="form-select">
                                <option value="admin">Administrador</option>
                                <option value="commom">Comum</option>
                            </select>
                            <label for="email">Selecione o nível do usuário</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input id="password" class="form-control" type="password" name="password" required />
                            <label for="password">Password</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input id="password_confirmation" class="form-control" type="password"
                                name="password_confirmation" required />
                            <label for="password_confirmation">Confirm Password</label>
                        </div>

                        <div class="d-grid gap-2 col-6 mx-auto">
                            <button type="submit" class="btn btn-submit">Salvar</button>
                            <a href="/manager-user" class="btn btn-secondary">Voltar</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
