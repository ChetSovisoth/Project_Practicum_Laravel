<nav class="navbar navbar-expand-xl bg-black fixed-top navigation-bar">
    <div class="container-fluid text-white">
        <a class="navbar-brand mx-5 fw-bold fs-3 text-white" href="{{ url('/') }}" wire:navigate.prevent>Mentorship</a>
        <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse mx-4" id="navbarNavDropdown">
            <ul class="navbar-nav flex-grow-1 justify-content-end align-items-center">
                <li class="nav-item">
                    <a href="{{ url('/') }}" wire:navigate.prevent class="nav-link text-white">Home</a>
                </li>
                <li class="nav-item mx-1">
                    <a href="{{ url('/contact') }}" wire:navigate.prevent class="nav-link text-white">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('chat') }}" wire:navigate.hover class="nav-link text-white">Chat</a>
                </li>
                <li class="nav-item mx-1">
                    <a href="{{ route('group') }}" wire:navigate.prevent class="nav-link text-white">Group</a>
                </li>
                <li class="nav-item">
                    @livewire('notification.notification')
                </li>
                <li class="nav-link mx-1">
                    @if (Route::has('login'))
                        <nav class="flex flex-1 justify-end">
                            @auth
                                @if (Auth::user()->role === 'admin')
                                    <div class="d-flex ">
                                        <a href="{{ route('admin.dashboard') }}" 
                                            wire:navigate.prevent
                                            class="pe-3 nav-link text-decoration-none text-center text-white rounded-md text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                            Dashboard
                                        </a>
                                        <form action="{{ route('logout') }}" method="POST" class="text-decoration-none text-white rounded-md text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">   
                                            @method('POST')
                                            @csrf
                                            <button class="btn btn-link text-decoration-none text-white">Log out</span>
                                        </form>
                                    </div>
                                @else
                                    <a href="{{ route('user.profile') }}" 
                                        wire:navigate.prevent
                                        class="text-decoration-none text-white rounded-md text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                        <i class="bi bi-person"></i></a>
                                    </a>
                                @endif
                            @else
                                <a href="{{ route('login') }}"
                                    wire:navigate.prevent
                                    class="text-decoration-none text-white rounded-md text-black pe-3 ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                    Log in
                                </a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}"
                                        wire:navigate.prevent
                                        class="text-decoration-none text-white rounded-md text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                        Register
                                    </a>
                                @endif
                            @endauth
                        </nav>
                    @endif
                </li>
            </ul>
        </div>
    </div>
</nav>
