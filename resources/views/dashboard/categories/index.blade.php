@extends('dashboard.layout.main')

@section('container')
<div class="container" style="margin-top: 2rem">
  <div class="box">
    <div class="section">
      <div class="columns is-vcentered">
        <div class="column">
          <h1 class="title is-2">Post Categories</h1>
        </div>
      </div>

      @if (session()->has('success'))
        <div class="notification is-success">
          {{ session('success') }}
        </div>
      @endif

      <div class="table-container">
        <div class="column is-8">
          <a href="/dashboard/categories/create" class="button is-success mb-3 shadow">Create New Category</a>
          <table class="table is-bordered is-fullwidth is-hoverable is-narrow">
            <thead>
              <tr>
                <th>No</th>
                <th>Category Name</th>
                <th>Category Slug</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($categories as $category)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->slug }}</td>
                <td>
                  <div class="field is-grouped">
                    <p class="control">
                      <a href="/posts?category={{ $category->slug }}" class="button is-info">
                        <span class="icon">
                          <i class="fas fa-search"></i>
                        </span>
                      </a>
                    </p>
                    <p class="control">
                      <a href="/dashboard/categories/{{ $category->slug }}/edit" class="button is-warning">
                        <span class="icon">
                          <i class="fas fa-edit"></i>
                        </span>
                      </a>
                    </p>
                    <p class="control">
                      <form action="/dashboard/categories/{{ $category->slug }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="button is-danger" onclick="return confirm('Are you sure to delete?')">
                          <span class="icon">
                            <i class="fas fa-trash-alt"></i>
                          </span>
                        </button>
                      </form>  
                    </p>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection