<nav id="navbar" class="navbar navbar-expand-lg navbar-dark bg-body-transparent shadow-lg">
    <div class="container ">
        <a class="navbar-brand pe-4" href="#">

            <img src="{{ asset('img/hehe1.png') }}" alt="Logo" width="40" height="24">

        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <div class="nav w-100">
                <ul class="navbar-nav mx-lg-auto ">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" aria-current="page"
                            href="/dashboard">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('tournament.showAllTournaments') ? 'active' : '' }} "
                            aria-current="page" href="{{ route('tournament.showAllTournaments') }}">Tournaments</a>
                    </li>
                </ul>
            </div>
            <div class="profile d-sm-flex align-sm-items-center ms-lg-auto">

                <ul class=" navbar-nav">
                    <li class="nav-item d-flex align-items-center">
                        <a class="nav-link {{ request()->routeIs('orders.history') ? 'active' : '' }}"
                            href="{{ route('orders.history') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" fill="currentColor"
                                class="bi bi-cart  " viewBox="0 0 16 16">
                                <path
                                    d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
                            </svg>
                        </a>
                    </li>
                    <li class="nav-link dropdown text-light fw-bold">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" width=30
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        </a>
                        <div class="dropdown-menu dropdown-menu-start" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item text" href="{{ route('profile.edit') }}">
                                {{ __('Profile') }}
                            </a>

                            <a class="btn dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                {{ __('Log Out') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
