@extends('dashboard.layout.main')

@section('container')

  <div class="box">
    <div class="container" style="margin-top: 2rem">
      <div class="section">
        <div class="columns is-vcentered">
          <div class="column">
            <h1 class="title is-2">Create New Post Here!</h1>
          </div>
        </div>
      </div>
    </div>
    <div class="section">
      <div class="container">
        <div class="columns is-vcentered">
          <div class="column is-8">
            <form method="post" action="/dashboard/posts" class="mb-5" enctype="multipart/form-data">
              @csrf
              <div class="field">
                <label for="title" class="label">Title</label>
                <div class="control">
                  <input type="text" class="input @error('title') is-danger @enderror" id="title" name="title" autofocus value="{{ old('title') }}" required>
                </div>
                @error('title')
                <p class="help is-danger">{{ $message }}</p>
                @enderror
              </div>

              <div class="field">
                <label for="slug" class="label">Slug</label>
                <div class="control">
                  <input type="text" class="input @error('slug') is-danger @enderror" id="slug" name="slug" value="{{ old('slug') }}" required>
                </div>
                @error('slug')
                <p class="help is-danger">{{ $message }}</p>
                @enderror
              </div>

              <div class="field">
                <label for="category" class="label">Category</label>
                <div class="control">
                  <div class="select">
                    <select name="category_id">
                      @foreach ($categories as $category)
                      @if (old('category_id') == $category->id)
                      <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                      @else
                      <option value="{{ $category->id }}">{{ $category->name }}</option>
                      @endif
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>

              <div class="field">
                <label for="image" class="label">Post Your Image</label>
                <div class="control">
                  <img class="img-preview mb-3" style="display: none;">
                  <input class="input @error('image') is-danger @enderror" type="file" id="image" name="image" onchange="previewImage()">
                  @error('image')
                  <p class="help is-danger">{{ $message }}</p>
                  @enderror
                </div>
              </div>

              <div class="field">
                <label for="body" class="label">Body</label>
                <div class="control">
                  <textarea id="body" class="textarea @error('body') is-danger @enderror" name="body" rows="3">{{ old('body') }}</textarea>
                  @error('body')
                  <p class="help is-danger">{{ $message }}</p>
                  @enderror
                </div>
              </div>

              <div class="field is-grouped">
                <div class="control">
                  <button type="submit" class="button is-success">Let's Go!</button>
                </div>
                <div class="control">
                  <a href="/dashboard/posts">
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
  const title = document.querySelector('#title');
  const slug = document.querySelector('#slug');

  title.addEventListener('change', function () {
    fetch('/dashboard/posts/checkSlug?title=' + title.value)
      .then(response => response.json())
      .then(data => slug.value = data.slug)
  });

  function previewImage() {
    const image = document.querySelector('#image');
    const imagePreview = document.querySelector('.img-preview');

    imagePreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function (oFREvent) {
      imagePreview.src = oFREvent.target.result;
    }
  }
</script>

<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
  CKEDITOR.replace('body');
</script>
@endsection