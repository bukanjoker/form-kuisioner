@extends('layouts.noheader')

@section('title')
  Greetings
@endsection

@section('style')
    .top-margin {
        margin-top: 120px;
    }
@endsection

@section('page-content')
    <div class="container mb-5">
        <div class="top-margin mb-4">
            Terimakasih yang sebesar-besarnya atas kesediaan Anda telah meluangkan waktu untuk mengisi semua kuesioner ini.
            <br>
            <br>
            Fetra Moira Fiermansyah
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-heart-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                 <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
            </svg>
        </div>
        <div class="d-flex justify-content-center">
            <a class="btn btn-primary" href="/registration" style="padding: 8px 64px;">Mulai</a>
        </div>
    </div>
@endsection