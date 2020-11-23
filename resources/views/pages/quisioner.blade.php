@extends('layouts.layout')

@php
    $formTitle = "Kuisioner"
@endphp

@section('title')
  Form Kuisioner
@endsection

@section('page-content')
    <div class="container mt-4">
        @for ($i=0; $i < 10; $i++)
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-7">
                            <div class="d-flex justify-content-around">
                                <b>
                                    #{{$i+1}}
                                </b>
                                <span>
                                    Kata 1
                                </span>
                                <span>
                                    Kata 2
                                </span>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="">
                                    <small>Nilai Kesamaan</small><br>
                                    <select class="" name="">
                                        @for ($j=0; $j < 10; $j++)
                                            <option value={{$j}}>{{$j}}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="">
                                    <small>Nilai Keterkaitan</small><br>
                                    <select class="" name="">
                                        @for ($j=0; $j < 10; $j++)
                                            <option value={{$j}}>{{$j}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endfor
        <div class="float-right mb-5">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
@endsection