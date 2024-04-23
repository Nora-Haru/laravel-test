<nav class="navbar is-dark">
    <div class="container">
        <div class="navbar-brand">
            <a class="navbar-item" href="/">
                <img src="/img/logo3.png" alt="NFR BLOG">
            </a>
            <a role="button" class="navbar-burger burger" id="nav-menu" aria-label="menu" aria-expanded="false"
                data-target="navbarNav">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>
        <div id="navbarNav" class="navbar-menu">
            <div class="navbar-start">
                <a class="navbar-item{{ Request::is('/') ? ' is-active' : '' }}" href="/">
                    Home
                </a>
                <a class="navbar-item{{ Request::is('about') ? ' is-active' : '' }}" href="/about">
                    About
                </a>
                <a class="navbar-item{{ Request::is('posts') ? ' is-active' : '' }}" href="/posts">
                    Article
                </a>
                <a class="navbar-item{{ Request::is('categories') ? ' is-active' : '' }}" href="/categories">
                    Categories
                </a>
            </div>
            <div class="navbar-end">
                @auth
                <div class="navbar-item has-dropdown">
                    <a class="navbar-link">
                        {{ auth()->user()->name }}
                    </a>
                    <div class="navbar-dropdown">
                        <a class="navbar-item" href="/dashboard">
                            <span class="icon"><i class="fas fa-user-circle"></i></span>
                            My Dashboard
                        </a>
                        <a class="navbar-item" href="/dashboard/posts">
                            <span class="icon"><i class="fas fa-clipboard-list"></i></span>
                            My Posts
                        </a>
                        <hr class="dropdown-divider">
                        <form action="/logout" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                <span class="icon"><i class="fas fa-sign-out-alt"></i></span>
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
                @else
                <a class="navbar-item" href="/login">
                    <span class="icon"><i class="fas fa-user"></i></span>
                    Login
                </a>
                @endauth
            </div>
        </div>
    </div>
  </nav>
  
  <script>
      document.addEventListener('DOMContentLoaded', function() {
        var dropdowns = document.querySelectorAll('.navbar-item.has-dropdown');
        dropdowns.forEach(function(dropdown) {
          dropdown.addEventListener('click', function(event) {
            event.stopPropagation();
            dropdown.classList.toggle('is-active');
          });
        });
    
        document.addEventListener('click', function() {
          dropdowns.forEach(function(dropdown) {
            dropdown.classList.remove('is-active');
          });
        });
      });
    </script>