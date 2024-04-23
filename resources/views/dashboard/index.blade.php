@extends('dashboard.layout.main') 
 
@section('container') 
    <div class="hero" style="margin-top: 3rem"> 
        <div class="hero-body"> 
            <h1 class="title"> 
                Welcome Back, {{ auth()->user()->name }} 
            </h1> 
        </div> 
        <div class="hero-foot"> 
            <div class="container"> 
                <nav class="level"> 
                    <div class="level-left"> 
                        <div class="level-item"> 
                            <div class="buttons"> 
                                <div class="dropdown is-hoverable"> 
                                    <div class="dropdown-trigger"> 
                                        @auth
                                        <button class="button is-dark is-small" aria-haspopup="true" aria-controls="dropdown-menu"> 
                                            <span>{{ auth()->user()->name }}</span> 
                                            <span class="icon is-small"> 
                                                <i class="bi bi-caret-down-fill"></i> 
                                            </span> 
                                        </button> 
                                    </div>
                                    <div class="dropdown-menu" id="dropdown-menu" role="menu"> 
                                        <div class="dropdown-content"> 
                                            <a href="/dashboard" class="dropdown-item"> 
                                                <i class="fas fa-user-circle"></i> My Dashboard 
                                            </a> 
                                            <a href="/dashboard/posts" class="dropdown-item"> 
                                                <i class="fas fa-clipboard-list"></i> My Posts 
                                            </a> 
                                            <hr class="dropdown-divider"> 
                                            <form action="/logout" method="post"> 
                                                @csrf 
                                                <button type="submit" class="dropdown-item"> 
                                                    <i class="fas fa-sign-out-alt"></i> Logout 
                                                </button> 
                                            </form> 
                                            @else
                                            <div class="level-right"> 
                                                <div class="level-item"> 
                                                    <a href="/login" class="button is-small"> 
                                                        <i class="fas fa-user"></i> Login 
                                                    </a> 
                                                </div> 
                                            </div> 
                                            @endauth
                                        </div> 
                                    </div> 
                                </div> 
                            </div> 
                        </div> 
                    </div>
                </nav> 
            </div> 
        </div> 
    </div> 
    <div class="container mt-4"> 
        <div class="card"> 
            <div class="columns is-multiline"> 
                @foreach ($userPosts as $post) 
                    <div class="column is-4"> 
                        <div class="card-content"> 
                            <div class="tags has-addons"> 
                                <span class="tag is-dark"> 
                                    <a href="/posts?category={{ $post->category->slug }}" class="has-text-white">{{ $post->category->name }}</a> 
                                </span> 
                            </div> 
                            <div class="image-container" style="height: 200px; overflow: hidden;"> 
                                @if ($post->image) 
                                    <img src="{{ asset('storage/' . $post->image) }}" class="image" style="object-fit: cover; width: 100%; height: 100%;" alt="{{ $post->category->name }}"> 
                                @else 
                                    <img src="https://source.unsplash.com/1024x576?{{ $post->category->name }}" class="image" style="object-fit: cover; width: 100%; height: 100%;" alt="{{ $post->category->name }}"> 
                                @endif 
                            </div> 
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
                @endforeach 
            </div> 
        </div> 
    </div> 
@endsection 