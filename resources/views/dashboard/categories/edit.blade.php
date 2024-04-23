@extends('dashboard.layout.main')

@section('container')

<div class="box">
  <div class="section" style="margin-top: 2rem">
    <div class="container">
      <div class="columns is-vcentered">
        <div class="column">
          <h1 class="title is-2">Rename Category</h1>
        </div>
      </div>
    </div>
  </div>
  <div class="section">
    <div class="container">
      <div class="columns is-vcentered">
        <div class="column is-5">
          <form action="/dashboard/categories/{{ $category->slug }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="field">
              <label class="label">Category Name</label>
              <div class="control">
                <input class="input @error('name') is-danger @enderror" type="text" name="name" id="name" value="{{ $category->name }}" required>
              </div>
              @error('name')
                <p class="help is-danger">{{ $message }}</p>
              @enderror
            </div>
            <div class="field">
              <label class="label">Slug</label>
              <div class="control">
                <input class="input @error('slug') is-danger @enderror" type="text" name="slug" id="slug" value="{{ $category->slug }}" required>
              </div>
              @error('slug')
                <p class="help is-danger">{{ $message }}</p>
              @enderror
            </div>
            <div class="field is-grouped">
              <div class="control">
                <button type="submit" class="button is-success">Rename</button>
              </div>
              <div class="control">
                <a href="/dashboard/categories">
                  <button type="button" class="button is-danger">Cancel</button>
                </a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
const name = document.querySelector('#name');
const slug = document.querySelector('#slug');

name.addEventListener('change', function() {
  fetch('/dashboard/categories/checkSlug?name=' + name.value)
    .then(response => response.json())
    .then(data => slug.value = data.slug)
});
</script>

@endsection