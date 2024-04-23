<header class="navbar is-fixed-top is-dark">
  <div class="container">
    <div class="navbar-brand is-2">
      <a class="navbar-item" href="/">
        <img src="/img/logo2.png" alt="Logo">
      </a>
    </div>
    <div class="navbar-burger burger" data-target="navMenu">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </div>

    <div id="navMenu" class="navbar-menu">
      <div class="navbar-start is-hidden-touch">
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

      <div class="navbar-center">
        <div class="navbar-item">
          <div class="field has-addons">
            <div class="control mt-2">
              <form action="/posts">
                <p class="control has-icons-left">
                  <input type="text" class="input is-shadowless" placeholder="Search Something..." name="search" value="{{ request('search') }}">
                  <span class="icon is-small is-left">
                    <i class="fas fa-search"></i>
                  </span>
                </p>
              </form>
            </div>
          </div>
        </div>
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
</header>

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