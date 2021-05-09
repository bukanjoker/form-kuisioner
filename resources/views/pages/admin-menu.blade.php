@extends('layouts.layout')

@php
    $formTitle = "Menu Admin"
@endphp

@section('title')
  Menu Admin
@endsection

@section('page-content')
    <div class="container mt-4">
        <div class="card p-3 mb-2">
            <div class="d-flex justify-content-between">
                <div class="mt-2">Data User</div>
                <button type="button" onclick="window.location.href = '/user-list'" class="btn btn-primary">View</button>
            </div>
        </div>
        <div class="card p-3">
            <div class="d-flex justify-content-between">
                <div class="mt-2">Data Kuisioner</div>
                <button type="button" onclick="window.location.href = '/data-table'" class="btn btn-primary">View</button>
            </div>
        </div>
    </div>
@endsection