@extends('layouts.layout')

@php
    $formTitle = "Data Kata"
@endphp

@section('title')
  Data Kata
@endsection

@section('page-content')
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center">
            <button type="button" name="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAddData">Tambah Baru</button>
            <div class="">
                <span>Submitted 13 Data</span>
            </div>
        </div>
    </div>
    
    <!-- MODAL -->
    <div class="modal fade" id="modalAddData" tabindex="-1" aria-labelledby="modalAddData" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            ...
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>
@endsection