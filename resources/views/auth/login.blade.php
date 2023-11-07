@extends('layouts.guest')
@include('layouts.navigation-auth')


<div class="col-md-12 login-container">
    <img id="img-logo" class="mb-4" style="margin: 0 auto;" src="/img/logo-taskier-light.png" alt="logo-taskier">

    <form action="/login" method="POST" class="align-self-center">
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
            <input id="remember_me" class="form-check-input"" type="checkbox" name="remember_me"  />
        </div>

        <div class="d-flex flex-row-reverse align-items-center">
            <button type="submit" id="btn-login" class="btn">Entrar</button>
            <a class="nav-link btns-nav mx-3" href="/register">Cadastrar-se</a>
        </div>
    </form>
</div>