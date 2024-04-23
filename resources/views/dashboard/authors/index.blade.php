@extends('dashboard.layout.main')

@section('container')

<div class="container" style="margin-top: 3rem">
    <div class="box">
        <div class="section">
            <div class="columns is-vcentered">
                <div class="column">
                    <h1 class="title is-2">List of Authors</h1>
                </div>
                <div class="column">
                    @if (session()->has('success'))
                        <div class="notification is-success">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="section">
            <div class="table-container">
                <table class="table is-bordered is-fullwidth is-hoverable is-narrow">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Registered At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($authors as $author)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <figure class="image is-48x48">
                                        <img src="https://source.unsplash.com/500x500?{{ $author->name }}" alt="Placeholder image" class="is-rounded"/>
                                    </figure>
                                </td>
                                <td>{{ $author->name }}</td>
                                <td>{{ $author->username }}</td>
                                <td>{{ $author->email }}</td>
                                <td>{{ $author->created_at->format('d M Y H:i:s') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection