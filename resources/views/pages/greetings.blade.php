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
    <div class="container">
        <div class="top-margin mb-4">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </div>
        <div class="d-flex justify-content-center">
            <a class="btn btn-primary" href="/form-register">Start</a>
        </div>
    </div>
@endsection