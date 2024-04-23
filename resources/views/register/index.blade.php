@extends('layouts.main')

@section('container')

<main class="form-registry">
    <div class="container my-5">
        <div class="columns is-centered">
            <div class="column is-half">

                <div class="card" id="register-card">
                    <header class="card-header has-background-dark">
                        <p class="card-header-title has-text-white">Register</p>
                    </header>
                    <div class="card-content">
                        <form id="registerform" class="form-horizontal" action="/register" method="post" role="form">
                            @csrf <!-- Tambahkan ini untuk proteksi CSRF -->

                            <div class="field">
                                <label for="register-name" class="label">Name</label>
                                <div class="control">
                                    <input id="register-name" type="text" class="input @error('name') is-danger @enderror" name="name" placeholder="Type Your Name" required value="{{ old('name') }}">
                                </div>
                                @error('name')
                                    <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="field">
                                <label for="register-username" class="label @error('username') is-danger @enderror">Username</label>
                                <div class="control">
                                    <input id="register-username" type="text" class="input" name="username" placeholder="Enter Username" required value="{{ old('username') }}">
                                </div>
                                @error('username')
                                    <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="field">
                                <label for="register-email" class="label @error('email') is-danger @enderror">Email</label>
                                <div class="control">
                                    <input id="register-email" type="email" class="input" name="email" placeholder="name@example.com" required value="{{ old('email') }}">
                                </div>
                                @error('email')
                                    <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="field">
                                <label for="register-password" class="label @error('password') is-danger @enderror">Password</label>
                                <div class="control">
                                    <input id="register-password" type="password" class="input" name="password" placeholder="Your Password" required value="{{ old('password') }}">
                                </div>
                                @error('password')
                                    <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="field is-grouped">
                                <div class="control">
                                    <button type="submit" name="register" class="button is-primary">Register</button>
                                </div>
                                <div class="control">
                                    <button type="reset" name="reset" class="button is-danger">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <p class="has-text-centered mt-2"id="lr-mb">Already have an account? <a href="/login">Login Here!</a></p>
            </div>
        </div>
    </div>
</main>
@endsection
