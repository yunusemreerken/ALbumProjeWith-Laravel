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
                          <!-- <th>
                            <div class="checkboxall">
                              <input id="select_all" type="checkbox"> Tümünü Seç
                            </div>
                          </th> -->
                          <th>Proje Adı</th>
                          <th>Fotoğraf Sayısı</th>
                          <th>Puan</th>
                          <th>İşlem</th>
                      </tr>
                      </thead>
                      <tbody>

                        <?php $i=1; foreach ($projeler as $proje): ?>

                      <tr>
                          <!-- <td>
                            <div class="checkboxall">
                              <input class="checkbox" type="checkbox" name="check[]">
                            </div>
                          </td> -->

                          <td>
                              <h5 class="m-0 font-weight-normal">{{$proje->proje_name}}</h5>
                              <p class="mb-0 text-muted"><small></small></p>
                          </td>

                          <td>
                              {{$proje->resimlercount}}
                          </td>

                          <td>
                            <?php if ($proje->rate !== null): ?>
                              {{round($proje->rate/$proje->resimlercount,2)}}
                              <?php else: ?>
                                 0

                            <?php endif; ?>
                          </td>



                          <td>
                            <!-- <button type="submit" </button> -->
                            <form class="" action="{{route('detay')}}" method="post">
                              @csrf
                               <a onclick="event.preventDefault();document.getElementById('logout-form{{$i}}').submit();" class="btn btn-sm btn-custom"
                               data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Düzenle"><i class="mdi mdi-tooltip-edit"></i></a>
                               <?php if ($proje->deleted!=0): ?>

                                 <button type="submit" name="activeted" value="{{$proje->proje_id}}" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Aktif Yap"><i class="mdi mdi-tooltip-outline-plus"></i></button>
                                 <?php else: ?>
                                   <button type="submit" name="delete" value="{{$proje->proje_id}}" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Pasif Yap"><i class="mdi mdi-delete"></i></button>
                               <?php endif; ?>
                            </form>

                            <form id="logout-form{{$i}}"
                            action="detay2/{{$proje->proje_id}}"
                            method="GET"
                            style="display: none;">
                          </form>
                          </td>
                      </tr>

                    <?php $i++; endforeach; ?>

                      </tbody>
                  </table>
              </div>
          <!-- end row -->

      </div> <!-- end card-box -->
  </div><!-- end col -->


</div> <!-- container -->



@endsection
