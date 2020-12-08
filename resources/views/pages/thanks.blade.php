@extends('layouts.noheader')

@section('title')
  Thanks
@endsection

@section('style')
    .vertical-center {
    min-height: 100%;  /* Fallback for browsers do NOT support vh unit */
    min-height: 100vh; /* These two lines are counted as one :-)       */

    display: flex;
    align-items: center;
    }
@endsection

@section('page-content')
<div class="vertical-center">
    <div class="container">
        <div class="text-center ">
            Terimakasih banyak telah bersedia meluangkan waktu untuk mengisi seluruh kuisioner ini
            <br>
            <br>
            Fetra Moira Fiermansyah
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-heart-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                 <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
            </svg>
        </div>
    </div>
</div>
@endsection