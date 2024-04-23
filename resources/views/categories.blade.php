@extends('layouts.main')

@section('container')
    <hr><p class="home-header1 title is-3 has-text-centered mb-4 has-text">{{ $title }}</p><hr>
    <div class="container mt-4">
        <div class="columns is-multiline" id="lr-mb">
            @foreach ($categories as $category)
                <div class="column is-4-tablet is-2-desktop">
                    <a href="/posts?category={{ $category->slug }}">
                        <div class="card">
                            <div class="card-image">
                                <figure class="image is-4by3">
                                    <img src="https://source.unsplash.com/640x480?{{ $category->name }}" alt="{{ $category->name }}">
                                </figure>
                                <div class="card-overlay mt-1">
                                    <h5 class="is-5 has-text-centered ">{{ $category->name }}</h5>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <hr class="mb-5">
    </div>
@endsection
