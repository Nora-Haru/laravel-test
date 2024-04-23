@extends('dashboard.layout.main')

@section('container')

  <div class="container" style="margin-top: 2rem">
    <div class="box">
      <div class="section">
        <div class="columns is-vcentered">
          <div class="column">
            <h1 class="title is-2">Create New Category</h1>
          </div>
        </div>
      </div>
      <div class="columns is-vcentered">
        <div class="column is-5">
          <form action="/dashboard/categories" method="post">
            @csrf
            <div class="field">
              <label class="label">Category Name</label>
              <div class="control">
                <input class="input @error('name') is-danger @enderror" type="text" name="name" id="name" value="{{ old('name') }}">
              </div>
              @error('name')
                <p class="help is-danger">{{ $message }}</p>
              @enderror
            </div>
            <div class="field">
              <label class="label">Category Slug</label>
              <div class="control">
                <input class="input @error('slug') is-danger @enderror" type="text" name="slug" id="slug" value="{{ old('slug') }}">
              </div>
              @error('slug')
                <p class="help is-danger">{{ $message }}</p>
              @enderror
            </div>
            <div class="field is-grouped">
              <div class="control">
                <button type="submit" class="button is-success">Create Category</button>
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

<script>
  const name = document.querySelector('#name');
  const slug = document.querySelector('#slug');

  name.addEventListener('change', function() {
    fetch('/dashboard/categories/create/checkSlug?name=' + name.value)
      .then(response => response.json())
      .then(data => slug.value = data.slug)
  });
</script>

@endsection