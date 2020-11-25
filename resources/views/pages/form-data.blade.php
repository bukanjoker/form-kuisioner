@extends('layouts.layout')

@php
$formTitle = "Data Kata"
@endphp

@section('title')
    Data Kata
@endsection

@section('script')
    <script>
        function search(event) {
            if (event.key == "Enter") {
                var searchQuery = $('#search-word').val()
                if (searchQuery != "") {
                    window.location.href = '/form-data?search='+searchQuery
                }
                else {
                    window.location.href = '/form-data'
                }
            }
        }
        
    </script>
@endsection

@section('page-content')
    <div class="container mt-4 mb-4">
        <div class="mb-3 d-flex justify-content-between align-items-center">
            <button type="button" name="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAddData">Tambah Baru</button>
            <div class="text-right">
                <small>Koresponden <b>{{$koresponden}}</b> Orang</small><br>
                <small>Total <b>{{$wordCount}}</b> Pasang Kata</small>
            </div>
        </div>
        <div class="mb-3">
            <input id="search-word" class="form-control" type="search" placeholder="Search" aria-label="Search" onkeyup="search(event)" value="{{Request::query()['search'] ?? ''}}">
        </div>
        @if (count($words) == 0)
            <div class="mb-2 text-center">
                Tidak ada data
            </div>
        @endif
        @foreach ($words as $index => $kata)
            <div class="card mb-2">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-4 offset-1">
                            <div class="d-flex justify-content-between">
                                <div class="">
                                    {{$kata->word_1}}
                                </div>
                                <div class="">
                                    {{$kata->word_2}}
                                </div>
                            </div>
                        </div>
                        <div class="col-6 offset-1">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="">
                                    <small>Total Nilai Kesamaan</small><br>
                                    <span>{{$kata->score_similarity}}</span>
                                </div>
                                <div class="">
                                    <small>Total Nilai Keterkaitan</small><br>
                                    <span>{{$kata->score_relatedness}}</span>
                                </div>
                                <div class="">
                                    <form action="/words/{{$kata->id}}/delete" method="post">
                                        @csrf
                                        <button type="submit" class="text-danger" onclick="confirm('Delete can`t be restored, are you sure?');">
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                              <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                              <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
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
                <form action="/add-word" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Kata 1</label>
                            <input name="word_1" type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Kata 2</label>
                            <input name="word_2" type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Jenis Kata</label>
                            <select name="type" class="custom-select">
                              <option value="noun">Noun</option>
                              <option value="verb">Verb</option>
                            </select>
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