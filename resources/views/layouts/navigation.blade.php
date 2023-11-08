<nav class="navbar navbar-expand-lg bg-secondary">
    <div class="container-fluid" id="container-nav-internal">

        <a class="navbar-brand" href="/dashboard">
            <img id="img-logo" src="/img/logo-taskier-light.png" alt="logo-taskier">
        </a>
        <span class="btns-nav">{{ auth()->user()->email }}</span>
        <div id="navbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="btn btn-outline-primary btn-register btn-sm" aria-current="page" href="/dashboard">
                        Dashboard
                    </a>
                </li>
                @can('admin')
                    <li class="nav-item ms-2">
                        <a class="btn btn-outline-primary btn-register btn-sm" aria-current="page"
                            href="/manager-user">
                            Gerenciamento de Usuários
                        </a>
                    </li>
                @endcan
                <li class="nav-item ms-2">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <a class="btn btn-outline-primary btn-register btn-sm" href="/logout"
                            onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            Sair
                        </a>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
