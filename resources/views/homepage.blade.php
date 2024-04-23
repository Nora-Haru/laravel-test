@extends('layouts.home-hero')

@section('container')

<section id="tours" class="home-quick-view">
    <div class="home-main1">
      <div class="home-heading1">
        <h2 class="home-header1 mb-3">Find other blog</h2>
        <p class="home-caption1 mb-5">
          Recent post article you may like, enjoy blogging!!
        </p>
      </div>
    </div>
    <div class="container mt-5">
        <div class="card">
            <div class="columns is-multiline">
                @foreach ($otherPosts as $post) 
                    <div class="column is-4"> 
                        <div class="card-image">
                            <div class="image-container" style="height: 200px; overflow: hidden;"> 
                                @if ($post->image) 
                                    <img src="{{ asset('storage/' . $post->image) }}" class="image" style="object-fit: cover; width: 100%; height: 100%;" alt="{{ $post->category->name }}"> 
                                @else 
                                    <img src="https://source.unsplash.com/1024x576?{{ $post->category->name }}" class="image" style="object-fit: cover; width: 100%; height: 100%;" alt="{{ $post->category->name }}"> 
                                @endif 
                            </div>
                        </div>
                        <div class="card-content has-background-white">
                            <div class="media">
                                <div class="media-left">
                                    <figure class="image is-48x48">
                                        <img src="https://source.unsplash.com/500x500?{{ $post->author->name }}" alt="Placeholder image" class="is-rounded"/>
                                    </figure>
                                </div>
                                <div class="media-content">
                                    <p class="title is-4 has-text-grey-dark">
                                        {{ $post->author->name }}
                                    </p>
                                    <p class="subtitle is-6 has-text-grey">
                                        @.{{ $post->author->username }}
                                    </p>
                                </div>
                            </div>
                            <div class="content has-text-grey">
                                <div class="content"> 
                                    <h5 class="title is-5 mt-2">{{ $post->title }}</h5> 
                                    <p>{{ $post->excerpt }}</p> 
                                    <div class="mt-auto"> 
                                        <p class="mb-0"> 
                                            <small class="has-text-grey"> 
                                                By. <a href="/posts?author={{ $post->author->username }}" class="has-text-link">{{ $post->author->name }}</a> 
                                                | <a href="/posts?category={{ $post->category->slug }}" class="has-text-link">{{ $post->category->name }}</a> 
                                                | {{ $post->created_at->diffForHumans() }} 
                                            </small> 
                                        </p> 
                                        <p class="mb-0"> 
                                            <small><a href="/posts/{{ $post->slug }}">Read More...</a></small> 
                                        </p> 
                                    </div> 
                                </div> 
                            </div>
                        </div>
                    </div> 
                @endforeach 
            </div>
        </div>
        <div class="text-center mt-5">
            <div class="button-container">
                <a href="/posts" class="button is-primary">View All Post Article</a>
            </div>
        </div>
    </div>
</section>

<section class="hero" id="home-categories" style="margin-top: 2rem;margin-bottom: 4rem;">
    <div class="hero-body is-paddingless">
      <div class="container" style="overflow:hidden;">
        <div class="home-main1">
            <div class="home-heading1">
              <h2 class="home-header1 mb-3">Many Categories</h2>
              <p class="home-caption1 mb-5">
                Explore category you like most
              </p>
            </div>
          </div>
        <section class="section is-paddingless">
          <div id="slider">
            @foreach ($categories as $category)
            <div class="card mb-5" style="">
              <div class="card-image">
                <figure class="image is-covered">
                        <img src="https://source.unsplash.com/1024x576?{{ $category->name }}" class="image" style="object-fit: cover; width: 100%; height: 100%;" alt="{{ $category->name }}"> 
                </figure>
                <div class="card-overlay mt-1">
                    <h5 class="is-5 has-text-centered ">{{ $category->name }}</h5>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </section>
      </div>
    </div>
</section>
  

<section class="hero" id="home-categories" style="margin-top: 8rem;margin-bottom: 5rem;">
    <div class="hero-body">
      <div class="container">
        <div class="home-main1">
            <div class="home-heading1">
              <h2 class="home-header1 mb-3">Highlight Post</h2>
              <p class="home-caption1 mb-5">
                Star Post
              </p>
            </div>
          </div>
          <div class="card">
            <div class="card-image">
                <div class="image-container" style="height: 500px;overflow: hidden;"> 
                    @if ($post->image) 
                        <img src="{{ asset('storage/' . $post->image) }}" class="image" style="object-fit: cover; width: 100%; height: 100%;" alt="{{ $post->category->name }}"> 
                    @else 
                        <img src="https://source.unsplash.com/1024x576?{{ $post->category->name }}" class="image" style="object-fit: cover; width: 100%; height: 100%;" alt="{{ $post->category->name }}"> 
                    @endif 
                </div>
            </div>
            <div class="card-content has-background-white">
                <div class="media">
                    <div class="media-left">
                        <figure class="image is-48x48">
                            <img src="https://source.unsplash.com/500x500?{{ $post->author->name }}" alt="Placeholder image" class="is-rounded"/>
                        </figure>
                    </div>
                    <div class="media-content">
                        <p class="title is-4 has-text-grey-dark">
                            {{ $post->author->name }}
                        </p>
                        <p class="subtitle is-6 has-text-grey">
                            @.{{ $post->author->username }}
                        </p>
                    </div>
                </div>
                <div class="content has-text-grey">
                    <div class="content"> 
                        <h5 class="title is-5 mt-2">{{ $post->title }}</h5> 
                        <p>{{ $post->excerpt }}</p> 
                        <div class="mt-auto"> 
                            <p class="mb-0"> 
                                <small class="has-text-grey"> 
                                    By. <a href="/posts?author={{ $post->author->username }}" class="has-text-link">{{ $post->author->name }}</a> 
                                    | <a href="/posts?category={{ $post->category->slug }}" class="has-text-link">{{ $post->category->name }}</a> 
                                    | {{ $post->created_at->diffForHumans() }} 
                                </small> 
                            </p> 
                            <p class="mb-0"> 
                                <small><a href="/posts/{{ $post->slug }}">Read More...</a></small> 
                            </p> 
                        </div> 
                    </div> 
                </div>
            </div>
        </div>
      </div>
    </div>
</section>

@endsection
