@extends('layouts.layout')

@php
$formTitle = "Data Kata"
@endphp

@section('title')
    Data Kata
@endsection

@section('page-content')
    <div class="container mt-4">
        <div class="mb-3 d-flex justify-content-between align-items-center">
            <button type="button" name="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAddData">Tambah Baru</button>
            <div class="">
                <small>Koresponden <b>13</b> Orang</small><br>
                <small>Total <b>500</b> Pasang Kata</small>
            </div>
        </div>
        <div class="mb-4">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search">
        </div>
        @for ($i=0; $i < 10; $i++)
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <div class="d-flex justify-content-around">
                                <div class="">
                                    Kata 1
                                </div>
                                <div class="">
                                    Kata 2
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="">
                                    <small>Total Nilai Kesamaan</small><br>
                                    <span>180</span>
                                </div>
                                <div class="">
                                    <small>Total Nilai Keterkaitan</small><br>
                                    <span>200</span>
                                </div>
                                <div class="">
                                    <a class="text-danger" href="#">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                          <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                          <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endfor
    </div>
    
    <!-- MODAL -->
    <div class="modal fade" id="modalAddData" tabindex="-1" aria-labelledby="modalAddData" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Kata</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Kata 1</label>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Kata 2</label>
                            <input type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah Kata</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection