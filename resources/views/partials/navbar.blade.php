<nav class="navbar navbar-expand-lg navbar-dark ">
    <div class="container-fluid">
        <!-- Navbar brand/logo -->
        <a class="navbar-brand" href="{{ url('/') }}">Shirtify</a>
        <!-- Toggle button for smaller screens -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Navbar items -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link red active" aria-current="page" href="{{ url('/') }}">Home</a>
                </li>
               
                <li class="nav-item">
                    <a class="nav-link" href="">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contect">Contact</a>
                </li>
                <!-- Categories Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Categories
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="nav-link dropdown-item" href="">Casual Wear</a></li>
                        <li><a class="nav-link dropdown-item" href="">Classic Shirts</a></li>
                        <li><a class="nav-link dropdown-item" href="">Premium Collection</a></li>
                        <li><a class="nav-link dropdown-item" href="">Sports & Active</a></li>
                    </ul>
                </li>
                <!-- Cart Link -->
                <li class="nav-item">
                    <a class="nav-link" href="">
                        <i class="bi bi-cart"></i> Cart
                    </a>
                </li>

                @guest
                    <!-- Auth Links for Guest -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('loginForm') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('signupForm') }}">Sign Up</a>
                    </li>
                @else
                    <!-- Auth Links for Logged-in User -->
                    @if(auth()->user()->is_admin == 1)
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.main')}}">Profile</a>
                    </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>