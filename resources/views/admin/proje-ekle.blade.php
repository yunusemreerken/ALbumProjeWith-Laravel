@extends('layouts.master')

@section('content')

@if(!Session::has('success'))
        <div class="alert-box success">
            <h2>{!! Session::get('success') !!}</h2>
        </div>
    @endif

<div class="container-fluid">
                        <div class="row">
                          <div class="col-12">
                              <div class="card-box">
                                  <h4 class="header-title m-t-0">Proje Ekleyin</h4>

                                  <form action="{{ url('projeEkle') }}" method="post" class="dropzone dropzone-file-area dz-clickable" id="my-dropzone" style="width: 500px; margin-top: 50px;">
                                    @csrf
                                       <h3 class="sbold">Drop files here or click to upload</h3>
                                       <p> This is just a demo dropzone. Selected files are not actually uploaded. </p>
                                       <div class="dz-default dz-message"><span></span></div>
                                       <input type="submit" name="submit" value="gönder">
                                  </form>


                              </div>
                          </div>
                        </div>
                        <!-- end row -->

                    </div>

@endsection
