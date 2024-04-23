@extends('layouts.main')

@section('container')

<div class="container" id="about">
<div class="card" id="lr-mb">
    <div class="card-content">
        <p class="home-header1 title is-2 has-text-centered">{{ $title }}</p>
        <hr class="mb-5">
        <h4 class="subtitle has-text-centered">{{ $name }}</h4>
        <p class="mt-5 mb-5 has-text-centered">
            School : <a href="https://goo.gl/maps/Cucht6Ts9YUgZ7Tc8">{{ $school }}</a> 
        </p>
        <div class="has-text-centered">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3948.964085516717!2d111.08978727451888!3d-8.206366191825708!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7bdf7de1e8387f%3A0x4d70ae1734962587!2sSMK%20Negeri%201%20Pacitan!5e0!3m2!1sid!2sid!4v1689998354464!5m2!1sid!2sid" width="100%" height="300" style="border:1; max-width: 100%;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <p class="mt-5 has-text-centered">
            <a href="https://wa.me/{{ $phoneNumber }}" class="button is-primary is-rounded">
                <i class="fa fa-whatsapp" aria-hidden="true"></i>
            </a>
            <a href="mailto:{{ $email }}" class="button is-info is-rounded">
                <i class="fa fa-envelope" aria-hidden="true"></i>
            </a>
        </p>
    </div>
</div>
</div>
<hr class="mb-5">
    
@endsection