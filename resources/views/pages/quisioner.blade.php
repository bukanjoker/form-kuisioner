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
            <div id="{{$kata->id}}" class="card mb-2">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-7">
                            <div class="d-flex justify-content-between">
                                <b>
                                    #{{$index + 1 + ($words->currentPage() * $words->count()) - $words->count()}}
                                </b>
                                <span>
                                    {{$kata->word_1}}
                                </span>
                                <span>
                                    {{$kata->word_2}}
                                </span>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="d-flex justify-content-around align-items-center">
                                <div class="">
                                    <small>Nilai Kesamaan</small><br>
                                    <select class="" name="">
                                        @for ($j=0; $j <= 9; $j++)
                                            <option value={{$j}}>{{$j}}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="">
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
                    <a class="page-link" href="{{$words->previousPageUrl().'&code='.$user->code}}" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
                @for ($i = 1; $i <= $words->total()/$words->count(); $i++)
                    <li class="page-item"><a class="page-link" href="{{'/quisionaire?page='.$i.'&code='.$user->code}}">{{$i}}</a></li>
                @endfor
                <li class="page-item">
                  <a class="page-link" href="{{$words->nextPageUrl().'&code='.$user->code}}" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                  </a>
                </li>
            </ul>
        </div>
    </div>
@endsection