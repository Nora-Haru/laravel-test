<div class="box">
  <aside class="sidebar" style="margin-top: 5rem;">
    <div class="menu">
      <p class="menu-label has-text-grey-dark">
        General
    </p>
      <ul class="menu-list">
        <li>
          <a class="has-icon" href="/dashboard">
            <span class="icon">
              <i class="fas fa-home"></i>
            </span>
            Dashboard
          </a>
        </li>
        <li>
          <a class="has-icon" href="/dashboard/posts">
            <span class="icon">
              <i class="fas fa-user"></i>
            </span>
            My Posts
          </a>
        </li>
        @can('admin')
        <hr>
        <p class="menu-label has-text-grey-dark">
          Administrator
      </p>
        <li>
          <a class="has-icon" href="/dashboard/categories">
            <span class="icon">
              <i class="fas fa-database"></i>
            </span>
            Post Categories
          </a>
        </li>
        <li>
          <a class="has-icon" href="/dashboard/authors">
            <span class="icon">
              <i class="fas fa-users"></i>
            </span>
            User List
          </a>
        </li>
        @endcan
        <hr>
        <p class="menu-label has-text-grey-dark">
          Others
      </p>
        <li>
          <a class="has-icon" href="/">
            <span class="icon">
              <i class="fas fa-home"></i>
            </span>
            Home
          </a>
        </li>
        <li>
          <a class="has-icon" href="/about">
            <span class="icon">
              <i class="fas fa-question-circle"></i>
            </span>
            About
          </a>
        </li>
        <li>
          <a class="has-icon" href="/posts">
            <span class="icon">
              <i class="fas fa-newspaper"></i>
            </span>
            Article
          </a>
        </li>
        <li>
          <a class="has-icon" href="/categories">
            <span class="icon">
              <i class="fas fa-th"></i>
            </span>
            Categories
          </a>
        </li>
      </ul>
      <hr>
      <ul class="menu-list">
        <li>
          <form action="/logout" method="post">
            @csrf
            <button type="submit" class="button is-danger is-fullwidth">
              <span class="icon">
                <i class="fas fa-sign-out-alt"></i>
              </span>
              <p> Logout</p>
            </button>
          </form>
        </li>
      </ul>
    </div>
  </aside>
</div>