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
                        <div class="col-6">
                            <div class="row">
                                <div class="col-sm-4">
                                    <b>
                                        #{{$index + 1 + ($words->currentPage() * $words->count()) - $words->count()}}
                                    </b>
                                </div>
                                <div class="col-sm-8">
                                    <div class="mb-2">
                                        {{$kata->word_1}}
                                    </div>
                                    <div>
                                        {{$kata->word_2}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row">
                                <div class="col-sm-6">
                                    <small>Nilai Kesamaan</small><br>
                                    <select class="form-control" name="">
                                        @for ($j=0; $j <= 9; $j++)
                                            <option value={{$j}}>{{$j}}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <small>Nilai Keterkaitan</small><br>
                                    <select class="form-control" name="">
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
                <li class="page-item {{$words->currentPage() == 1 ? 'disabled':''}}">
                    <a class="page-link" href="{{$words->previousPageUrl().'&code='.$user->code}}" aria-label="Previous">
                        Prev
                    </a>
                </li>
                @for ($i = 1; $i <= $words->lastPage(); $i++)
                    <li class="page-item {{$words->currentPage() == $i ? 'active':''}}"><a class="page-link" href="{{'/quisionaire?page='.$i.'&code='.$user->code}}">{{$i}}</a></li>
                @endfor
                <li class="page-item {{$words->currentPage() == $words->lastPage() ? 'disabled':''}}">
                    <a class="page-link" href="{{$words->nextPageUrl().'&code='.$user->code}}" aria-label="Next">
                        Next
                    </a>
                </li>
            </ul>
        </div>
    </div>
@endsection