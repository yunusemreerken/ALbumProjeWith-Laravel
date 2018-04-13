@extends('layouts.master')

@section('content')
<div class="container-fluid">
                  <?php $i =1; foreach ($images as $image): ?>
                        <!-- SECTION FILTER
                        ================================================== -->
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 ">
                                <div class="portfolioFilter text-center gallery-second">
                                    <a href="" data-filter=".webdesign" class="current">{{$image->proje_name}}</a>

                                    <!-- <a href="#" data-filter=".graphicdesign">Graphic Design</a> -->
                                    <!-- <a href="#" data-filter=".illustrator">Illustrator</a> -->
                                    <!-- <a href="#" data-filter=".photography">Photography</a> -->
                                </div>
                            </div>
                        </div>
                        <?php if ($i==1) {
                            break;
                        } ?>
                      <?php endforeach; ?>
                      <div class="port">
                        <div class="portfolioContainer" style="position: relative; height: 1260px;">
                      <?php foreach ($images as $image): ?>
                              <div class="col-sm-6 col-md-4 webdesign" style="position: absolute; left: 0px; top: 0px;">
                                      <div class="portfolio-masonry-box">
                                          <div class="portfolio-masonry-img">
                                              <img src="{{URL::asset('/images/'.$image->image_name)}}" class="thumb-img img-fluid" alt="work-thumbnail">

                                          </div>
                                          <div class="portfolio-masonry-detail">
                                            <!-- <button type="button" name="activeted"  onclick="event.preventDefault();document.getElementById('logout-form').submit();" value="{{$image->resim_id}}" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Aktif Yap"><i class="mdi mdi-tooltip-outline-plus"></i></button>
                                            <button type="button" name="delete"  onclick="event.preventDefault();document.getElementById('logout-form').submit();" value="{{$image->resim_id}}" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Pasif Yap"><i class="mdi mdi-delete"></i></button>

                                            <form id="logout-form" action="{{route('dd')}}"  method="post">
                                                {{ csrf_field() }}
                                            </form> -->

                                            <form class="" action="{{route('imageStatus')}}" method="post">
                                              @csrf
                                              <button type="submit" name="activeted" value="{{$image->resim_id}}" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Aktif Yap"><i class="mdi mdi-tooltip-outline-plus"></i></button>
                                              <button type="submit" name="delete" value="{{$image->resim_id}}" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Pasif Yap"><i class="mdi mdi-delete"></i></button>
                                            </form>



                                          </div>
                                      </div>
                                      <div class="project-sort pull-right">
                                          <div class="project-sort-item">
                                              <form class="form-inline">

                                                  <div class="form-group">
                                                      <label for="sort-select">
                                                        <?php if ($image->rate>0): ?>
                                                            {{round($image->rate/$image->_count,2)}}

                                                        <?php endif; ?>
                                                      </label>
                                                  </div>
                                              </form>
                                          </div>
                                      </div>

                              </div>
                            <?php endforeach; ?>
                            </div>
                        </div> <!-- End row -->

                    </div>
@endsection
