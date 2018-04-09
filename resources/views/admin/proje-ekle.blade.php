@extends('layouts.master')

@section('content')



<div class="container-fluid">
                        <div class="row">
                          <div class="col-12">
                              <div class="card-box">
                                  <h4 class="header-title m-t-0">Proje Ekleyin</h4>
                                  <p class="text-muted font-14 m-b-10">
                                      Your awesome text goes here.
                                  </p>
                                  <form class="form-horizontal" role="form">
                                    <div class="form-group row">
                                      <label class="col-2 col-form-label">Proje Adı :</label>
                                      <div class="col-10">
                                        <input class="form-control" placeholder="Projenin adını girin" type="text" required>
                                      </div>

                                    </div>


                                  </form>

                                  <form action="#" class="dropzone dz-clickable" id="dropzone">


                                  <div class="dz-default dz-message"><span class=" mdi mdi-plus-circle-outline " ></span></div></form>
                                  <div class="clearfix text-right mt-3">
                                      <button type="button" class="btn btn-custom waves-effect waves-light">Ekle</button>
                                  </div>

                              </div>
                          </div>
                        </div>
                        <!-- end row -->

                    </div>
@endsection
