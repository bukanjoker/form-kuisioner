@extends('layouts.layout')

@php
    $formTitle = "Kuisioner"
@endphp

@section('title')
  Form Kuisioner
@endsection

@section('user')
    @if ($request->code && $user)
        <span class="mr-3">{{$user->name.' ('.$user->code.')'}}</span>
    @endif
@endsection

@section('page-content')
    <div class="container mt-4 mb-4">
        @foreach ($words as $index => $kata)
            <div class="card mb-2">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <div class="row">
                                <div class="col-3">
                                    <b>
                                        {{$index + 1}}
                                    </b>
                                </div>
                                <div class="col-9">
                                    <div class="row">
                                            {{$kata->word_1}}
                                        <br>
                                            {{$kata->word_2}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <small>Nilai Kesamaan</small><br>
                                    <select class="" name="">
                                        @for ($j=0; $j <= 9; $j++)
                                            <option value={{$j}}>{{$j}}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <small>Nilai Keterkaitan</small><br>
                                    <select class="" name="">
                                        @for ($j=0; $j <= 9; $j++)
                                            <option value={{$j}}>{{$j}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="d-flex justify-content-center">
           <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                  </a>
                </li>
            </ul>
        </div>

    </div>
@endsection