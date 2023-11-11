@extends('layouts.guest')

<div class="col-md-12 login-container">
    <img id="img-logo" class="mb-4" style="margin: 0 auto;" src="/img/logo-taskier-light.png" alt="logo-taskier">

    <form action="/register" method="POST" class="align-self-center">
        @csrf

        <div class="form-floating mb-3">
            <input id="name" class="form-control" type="text" name="name" value="{{ old('name') }}"
                required autofocus />
            <label for="name">Name</label>
        </div>
        <div class="form-floating mb-3">
            <input id="email" class="form-control" type="email" value="{{ old('email') }}" name="email"
                required autofocus />
            <label for="email">Email</label>
        </div>
        <div class="form-floating mb-3">
            <input id="password" class="form-control" type="password" name="password" required />
            <label for="password">Password</label>
        </div>
        <div class="form-floating mb-3">
            <input id="password_confirmation" class="form-control" type="password" name="password_confirmation"
                required />
            <label for="password_confirmation">Confirm Password</label>
        </div>

        <div class="d-flex flex-row-reverse align-items-center">
            <button type="submit" class="btn">Cadastrar</button>
            <a class="nav-link btns-nav mx-2" href="/login">Já é cadastrado?</a>
        </div>
    </form>
</div>
































