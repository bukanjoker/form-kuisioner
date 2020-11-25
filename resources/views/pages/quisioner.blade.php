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
                        <div class="col-7">
                            <div class="d-flex justify-content-between">
                                <b>
                                    #{{$index + 1}}
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
                                        @for ($j=0; $j <= 10; $j++)
                                            <option value={{$j}}>{{$j}}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="">
                                    <small>Nilai Keterkaitan</small><br>
                                    <select class="" name="">
                                        @for ($j=0; $j <= 10; $j++)
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
        <div class="float-right mb-5">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
@endsection