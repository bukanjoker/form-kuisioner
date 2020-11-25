@extends('layouts.layout')

@php
    $formTitle = "Form Data Diri"
@endphp

@section('title')
  Form Data Diri
@endsection

@section('page-content')
    <div class="container mt-4">
        <form action="/user-register" method="post">
        @csrf
          <div class="form-group">
            <label for="exampleInputEmail1">Nama Lengkap <span class="text-danger">*</span></label>
            <input name="name" type="text" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Universitas / Institusi <span class="text-danger">*</span></label>
            <input name="institution" type="text" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">NIM (Nomor Induk Mahasiswa)</label>
            <input name="nim" type="text" class="form-control">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Semester</label>
            <input name="semester" type="text" class="form-control">
          </div>
          <div class="mb-2">
              <small class="text-danger">* Wajib diisi</small>
          </div>
          <div class="float-right">
              <button type="submit" class="btn btn-primary">Next</button>
          </div>
        </form>
    </div>
@endsection