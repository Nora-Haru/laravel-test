<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>NFRBLOG | Find Something, Have Fun and Enjoy Blogging</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
  <link rel="stylesheet" href="/css/style.css"/>
  <link rel="stylesheet" href="/css/home.css"/>
  <script src="https://kit.fontawesome.com/c8126af3e1.js" crossorigin="anonymous"></script>

    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400&display=swap" as="style">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400&display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma-carousel@4.0.4/dist/css/bulma-carousel.min.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bulma-carousel@4.0.4/dist/js/bulma-carousel.min.js"></script>

    <script src="{{ asset('/js/script.js') }}"></script>
    
    <style>
      html {
      scroll-behavior: smooth;
      }
      body{
          font-family: 'Nunito Sans', sans-serif, 'Segoe UI','Fira Sans','Droid Sans', 'Helvetica Neue',Helvetica Arial,sans-serif;
      }
      .button:hover {
          text-shadow: 0px 0px 6px rgba(255, 255, 255, 1);
          -webkit-box-shadow: 0px 5px 40px -10px rgba(0,0,0,0.57);
          -moz-box-shadow: 0px 5px 40px -10px rgba(0,0,0,0.57);
          transition: all 0.4s ease 0s;
      }
  
      hr.rounded {
          border-top: 2px solid  #c7b8ea;
          border-radius: 2px;
        }
  
      .button{
          background-color: #c7b8ea;
      }
  
      #features{
          background: linear-gradient(180deg, rgba(238,174,202,0.7973390039609594) 0%, rgba(200,179,215,1) 26%, rgb(255 255 255) 100%);
          padding-top: 3rem;
          padding-bottom: 3rem;
      }
  
      .sectionf{
          padding-top: 1.5rem;
      }
  
      #footer{
          padding: 0.5rem;
      }
  
      #users-feed{
          padding: 4rem 1.5rem;
      }
    </style>
</head>
<body>
  @include('partials.navbar')

  <div class="home-container">
    <section class="home-hero">
      <div class="home-main">
        <div class="home-video">
          <img src="/img/hero-cover.jpg" id="hero-cover" class="img-thumbnail" style="height: 200%; width: 200%; object-fit: cover">
          <div class="home-tint"></div>
        </div>
        <div class="home-content">
          <div class="home-center">
            <div class="home-heading">
              <h1 class="home-header mb-5">Explore The Blog</h1>
              <p class="home-caption mt-4 mb-5">Find something interesting, Informative, Fun or Post Yours</p>
            </div>
            <div class="home-border">
              <div class="section search-form">
                <div class="columns is-centered">
                  <div class="column">
                    <form action="/posts">
                      @if (request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                      @endif
                      @if (request('author'))
                        <input type="hidden" name="author" value="{{ request('author') }}">
                      @endif
                      <div class="field has-addons">
                        <div class="control is-expanded">
                          <input type="text" class="input shadow-sm" placeholder="Search Something..." name="search" value="{{ request('search') }}">
                        </div>
                        <div class="control">
                          <button class="button is-primary" type="submit">Go</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <div class="container mt-5">
    @yield('container')
  </div>

  @include('partials.footer')

  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>