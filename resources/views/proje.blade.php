@extends('layouts.app')

@section('content')
<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h1 class="display-4">Projeler</h1>
</div>
<?php foreach ($projects as $project): ?>
  <div class="container">
        <div class="jumbotron mt-3">
          <h1>{{$project->proje_name}}</h1>
          <!-- <p class="lead">This example is a quick exercise to illustrate how the bottom navbar works.</p> -->
          <form class="" action="{{route('galery')}}" method="post">
            @csrf
            <input type="hidden" name="project_id" value="{{$project->id}}">
            <img src="" alt="">
            <input class="btn btn-xs btn-primary" type="submit" name="submit" value="Detay Gör">
          </form>
        </div>
  </div>
<?php endforeach; ?>
@endsection
