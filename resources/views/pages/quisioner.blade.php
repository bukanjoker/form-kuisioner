@extends('layouts.layout')

@php
    $formTitle = "Kuisioner"
@endphp

@section('title')
  Form Kuisioner
@endsection

@section('user')
    @if ($request->code && $user)
        <span class="mr-3">Progres <span id="progress">{{$progress}}</span>/{{$words->total()}}</span>
    @endif
@endsection

@section('style')
    .submitted {
        background: linear-gradient(to right, #66BB6A, #66BB6A calc(100% / 8), white calc(100% / 8));
    }

    @media only screen and (max-width: 786px) {
        .submitted {
            background: linear-gradient(to right, #66BB6A, #66BB6A calc(100% / 30), white calc(100% / 30));
        }
    }
@endsection

@section('page-content')
    <div class="container mt-4 mb-4">
        @foreach ($words as $index => $kata)
            <div id="{{$kata->id}}" class="card mb-2 {{$kata->score_similarity != null || $kata->score_relatedness != null ? 'submitted' : ''}}" onchange="submitScore(this, {{ $kata->q_id }})">
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
                                    <select class="similarity form-control" name="">
                                        @for ($j=0; $j <= 9; $j++)
                                            <option {{$kata->score_similarity == $j ? 'selected' : ''}}  value={{$j}}>{{$j}}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <small>Nilai Keterkaitan</small><br>
                                    <select class="relatedness form-control" name="">
                                        @for ($j=0; $j <= 9; $j++)
                                            <option {{$kata->score_relatedness == $j ? 'selected' : ''}} value={{$j}}>{{$j}}</option>
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
                <li class="page-item">
                    <a class="page-link" href="{{$words->currentPage() == $words->lastPage() ? '/thanks' : $words->nextPageUrl().'&code='.$user->code}}" aria-label="Next">
                        Next
                    </a>
                </li>
            </ul
>        </div>
        <div style="display: none;">
            <form id="form-questionaire" action="" method="post">
                @csrf
                <input id="code" type="text" name="code">
                <input id="word_id" type="number" name="word_id">
                <input id="score_similarity" type="number" name="score_similarity">
                <input id="score_relatedness" type="number" name="score_relatedness">
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        var code = {!! json_encode($user->code) !!}
        var page = {!! json_encode($words->currentPage()) !!}
        
        if (code) {
            localStorage.setItem("code", code);
        }

        if (page) {
            localStorage.setItem("page", page);
        }

        function submitScore(event, id) {
            var similarity = $(event).find('.similarity').val()
            var relatedness = $(event).find('.relatedness').val()
            var wordId = $(event).attr('id')

            $('#code').val(code)
            $('#word_id').val(wordId)
            $('#score_similarity').val(similarity)
            $('#score_relatedness').val(relatedness)

            // update
            if (id) {
                $.ajax({
                    url: '/quisionaire/'+id+'/update',
                    method: 'post',
                    data: $('#form-questionaire').serialize(),
                    success: function() {
                        location.reload();
                    }
                })
            }
            // insert
            else {
                $.ajax({
                    url: '/quisionaire/insert',
                    method: 'post',
                    data: $('#form-questionaire').serialize(),
                    success: function() {
                        location.reload();
                    }
                })
            }
        }
    </script>
@endsection