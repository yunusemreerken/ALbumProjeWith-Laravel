@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    @include('admin.left.sidebar')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
              <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                <h1 class="h2">Proje Seç ve Resim Ekle</h1>
                @if(Session::has('success'))
                        <div class="alert-box success">
                            <h2>{!! Session::get('success') !!}</h2>
                        </div>
                    @endif
                <!-- <div class="btn-toolbar mb-2 mb-md-0">

                  <div class="btn-group mr-2">

                    <button class="btn btn-sm btn-outline-secondary">Share</button>
                    <button class="btn btn-sm btn-outline-secondary">Export</button>
                  </div>
                  <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                    <span data-feather="calendar"></span>
                    This week
                  </button>
                </div> -->
              </div>
              <form class="" action="selectProje" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <label for="">Proje Seç:</label>
                <select class="" name="proje_id" required>
                  <option value=""></option>
                  <?php foreach ($proje as $key): ?>
                      <option name ="proje_id" value="{{($key->id)}}" >{{$key->name}}</option>
                  <?php endforeach; ?>
                </select><br>
                <!-- <label for="">Proje Adı</label>
                <input type="text" name="name" value=""><br> -->
                <label for="">Resim Seçin :</label>
                <input type="file" name="image" value="Resim Seç" required><br><br>
                <input type="submit"value="Yükle">
                <input type="reset" name="" value="Sıfırla">
                <!-- <input type="submit" name="sec" value="Seç"> -->
              </form>
              <!-- <canvas class="my-4" id="myChart" width="900" height="380"></canvas> -->
    </main>
  </div>
</div>
      </div>
</div>

@endsection
