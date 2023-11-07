@extends('layouts.guest')


@section('content')
    @dump()

    <div class="col-md-12 login-container">
        <img id="img-logo" class="mb-4" style="margin: 0 auto;" src="/img/logo-taskier-light.png" alt="logo-taskier">

        <form action="/login" method="POST" class="align-self-center">

            @if (session('msg'))
                <div class="alert alert-danger" role="alert">
                    {{ session('msg') }}
                </div>
            @endif

            @csrf
            <div class="form-floating mb-3">
                <input id="email" class="form-control" type="email" name="email" required autofocus />
                <label for="email">Email</label>
            </div>
            <div class="form-floating mb-3">
                <input id="password" class="form-control" type="password" name="password" required />
                <label for="password">Password</label>
            </div>
            <div class="form-check mb-3">
                <label class="form-check-label" for="remember_me">Remember-me</label>
                <input id="remember_me" class="form-check-input" type="checkbox" name="remember_me" />
            </div>

            <div class="d-grid gap-2 col-6 mx-auto">
                <button onclick="event.preventDefault();this.closest('form').submit();" id="btn-login"
                    class="btn btns-submit">Entrar</button>
            </div>
        </form>
    </div>
@endsection
