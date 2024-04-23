@extends('layouts.main')

@section('container')
    <section class="section">
        <div class="container my-5">
            <div class="columns is-centered">
                <div class="column is-half">

                    @if (session('success'))
                        <div class="notification is-success">
                            {{ session('success') }}
                            <button class="delete"></button>
                        </div>
                    @endif

                    @if (session('loginError'))
                        <div class="notification is-danger">
                            {{ session('loginError') }}
                            <button class="delete"></button>
                        </div>
                    @endif
                    
                    <div class="card" id="login-card">
                        <header class="card-header has-background-dark">
                            <p class="card-header-title has-text-white">Login</p>
                        </header>
                        <div class="card-content">
                            <form id="loginform" class="form-horizontal" action="/login" method="post" role="form">
                                @csrf <!-- Tambahkan ini untuk proteksi CSRF -->
                                <label for="login-email" class="label">Email</label>
                                <div class="field">
                                    <p class="control has-icons-left has-icons-right">
                                        <input id="login-email" type="email" class="input @error('email') is-danger @enderror" name="email" placeholder="Email" required autofocus value="{{ old('email') }}">
                                        <span class="icon is-medium is-left">
                                            <i class="fas fa-envelope"></i>
                                        </span>
                                        <span class="icon is-medium is-right">
                                            <i class="fas fa-check"></i>
                                        </span>
                                        @error('email')
                                            <p class="help is-danger">{{ $message }}</p>
                                        @enderror
                                    </p>
                                  </div>
                                <div class="field">
                                    <label for="login-password" class="label">Password</label>
                                    <p class="control has-icons-left">
                                        <input id="login-password" type="password" class="input @error('password') is-danger @enderror" name="password" placeholder="Password" required>
                                        <span class="icon is-small is-left">
                                          <i class="fas fa-lock"></i>
                                        </span>
                                    </p>
                                    @error('password')
                                        <p class="help is-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="field is-grouped">
                                    <div class="control">
                                        <button type="submit" name="login" class="button is-primary">Login</button>
                                    </div>
                                    <div class="control">
                                        <button type="reset" name="reset" class="button is-danger">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <p class="mt-2 has-text-centered" id="lr-mb">Have not registered yet? <a href="/register">Register Here!</a></p>
                </div>
            </div>
        </div>
    </section>
@endsection
