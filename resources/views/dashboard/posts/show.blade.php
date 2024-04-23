@extends('dashboard.layout.main')

@section('container')

<div class="box">
  <div class="section" style="margin-top: 2rem">
    <div class="container">
      <div class="columns">
        <div class="column is-8">
          <h2 class="title is-3">{{ $post->title }}</h2>
          <small>
            <a href="/dashboard/posts/" class="button is-success is-small">
              <span class="icon">
                <i class="fas fa-search"></i>
              </span>
              <span>Back to all my post</span>
            </a>
            <a href="/dashboard/posts/{{ $post->slug }}/edit" class="button is-warning is-small">
              <span class="icon">
                <i class="fas fa-edit"></i>
              </span>
              <span>Edit</span>
            </a>
            <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
              @method('delete')
              @csrf
              <button class="button is-danger is-small mt-1" onclick="return confirm('Are you sure to delete?')">
                <span class="icon">
                  <i class="fas fa-trash-alt"></i>
                </span>
                <span>Delete</span>
              </button>
            </form>
          </small>
          <hr>
          @if ($post->image)
            <figure class="image">
              <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid h-100 w-100" style="object-fit: cover;">
            </figure>
          @else
            <img src="https://source.unsplash.com/1024x576?{{ $post->category->name }}" class="img-fluid shadow" alt="{{ $post->category->name }}">
          @endif
          <hr>
          <article>
            {!! $post->body !!}
          </article>
          <hr>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection