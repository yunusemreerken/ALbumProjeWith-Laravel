@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ana Sayfa</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{route('projeler')}}">Projeler</a>
                    <a href="{{route('album')}}">Albümler</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
