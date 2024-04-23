<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Dashboard</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/home.css"/>
    <link href="/css/dashboard.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c8126af3e1.js" crossorigin="anonymous"></script>
</head>
  <body>

  @include('dashboard.layout.header')

  <div class="container-fluid">
      <div class="columns">
          <div class="column is-2">
              @include('dashboard.layout.sidebar')
          </div>

          <div class="column">
              <main class="px-md-4">
                  @yield('container')
              </main>
          </div>
      </div>
  </div>

  <script src="/js/dashboard.js"></script>
  <script src="{{ asset('/js/script.js') }}"></script>

  </body>
</html>