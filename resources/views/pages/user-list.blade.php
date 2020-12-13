@extends('layouts.layout')

@php
    $formTitle = "Data User"
@endphp

@section('title')
    Data User
@endsection

@section('script')
    <script>        
        function deleteUser(id, name) {
            if (!confirm('Are you sure to delete '+name+'?')) {
                return
            }
            
            $.ajax({
                url: '/user/'+id+'/delete',
                method: 'post',
                data: $('#formUser').serialize(),
                success: function() {
                    location.reload();
                }
            });
        }
        
    </script>
@endsection

@section('page-content')
	<div class="container mt-4">
		@if (count($users) == 0)
            <div class="mb-2 text-center">
                Belum ada koresponden
            </div>
        @endif
        @foreach ($users as $index => $user)
        	<div class="card mb-2">
        		<div class="card-body">
        			<div class="row align-items-center">
        				<div class="col-10">
        					<div class="row align-items-center">
		        				<div class="col-sm-8">
		        					<div>
		        						<b>{{$user->name}} </b><span class="text-secondary">({{$user->code}})</span>
		        					</div>
		        					<div>
		        						<small>Institusi: {{$user->institution}}</small><br>
		        						<small>Semester: {{$user->semester}}</small><br>
		        						<small>NIM: {{$user->nim}}</small>
		        					</div>
		        				</div>
		        				<div class="col-sm-4">
		        					Progres: {{$user->progress}}/{{$wordCount}}
		        				</div>
		        			</div>
        				</div>
        				<div class="col-2">
        					<button class="text-danger" onclick="deleteUser({{$user->id}}, '{{$user->name}}')">
	                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
	                              <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
	                              <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
	                            </svg>
	                        </button>
        				</div>
        			</div>
        		</div>
        	</div>
        @endforeach
        <form id="formUser" class="d-none">
        	@csrf
        </form>
	</div>
@endsection