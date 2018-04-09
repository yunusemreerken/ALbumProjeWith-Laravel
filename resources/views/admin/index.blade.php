@extends('layouts.master')

@section('content')
<div class="container-fluid">

  <div class="col-12">
      <div class="card-box">
          <h4 class="m-t-0 header-title">Projeler</h4>
          <ol class="button-list float-right">
                <!-- <button type="button" class="btn btn-outline-primary waves-light waves-effect">Yeni Proje Ekle</button> -->
                <a href="{{route('projeEkle')}}" class="btn btn-outline-primary waves-light waves-effect">Yeni Proje Ekle</a>
                                        <!-- <li class="breadcrumb-item"><a href="#">Forms</a></li> -->
                                        <!-- <li class="breadcrumb-item active">Wysiwig Editor</li> -->
          </ol>
          <!-- <p class="text-muted m-b-30 font-14">
              Most common form control, text-based input fields. Includes support for all HTML5 types: <code>text</code>, <code>password</code>, <code>datetime</code>, <code>datetime-local</code>, <code>date</code>, <code>month</code>, <code>time</code>, <code>week</code>, <code>number</code>, <code>email</code>, <code>url</code>, <code>search</code>, <code>tel</code>, and <code>color</code>.
          </p> -->


          <div class="">
                  <table class="table table-hover table-centered m-0">
                      <thead>
                      <tr>
                          <th>
                            <div class="checkboxall">
                              <input id="select_all" type="checkbox"> Tümünü Seç
                            </div>
                          </th>
                          <th>Proje Adı</th>
                          <th>Fotolar</th>
                          <th>Puan</th>
                          <th>İşlem</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                          <td>
                            <div class="checkboxall">
                              <input class="checkbox" type="checkbox" name="check[]">
                            </div>
                          </td>

                          <td>
                              <h5 class="m-0 font-weight-normal">proje 1</h5>
                              <p class="mb-0 text-muted"><small>Member Since 2017</small></p>
                          </td>

                          <td>
                              281
                          </td>

                          <td>
                              0.00816117
                          </td>



                          <td>
                              <label class="btn btn-sm switch">
                                  <input type="checkbox">
                                  <span class="slider round" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Aktif/Pasif"></span>
                              </label>
                              <a href="{{route('projeDetay')}}" class="btn btn-sm btn-custom" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Düzenle"><i class="mdi mdi-tooltip-edit"></i></a>
                              <a href="#" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Sil"><i class="mdi mdi-delete"></i></a>

                          </td>
                      </tr>

                      </tbody>
                  </table>
              </div>
          <!-- end row -->

      </div> <!-- end card-box -->
  </div><!-- end col -->


</div> <!-- container -->




@endsection
