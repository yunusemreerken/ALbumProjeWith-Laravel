@extends('layouts.master')

@section('content')
<div class="container-fluid">
                        <!-- SECTION FILTER
                        ================================================== -->
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 ">
                                <div class="portfolioFilter text-center gallery-second">
                                  <?php $t=1;  foreach ($images as $image): ?>
                                    <?php if ($t==1): ?>
                                      <a href="" data-filter=".webdesign" class="current">{{$image->proje_name}}</a>
                                      @if(session()->has('success'))
                                          <div class="alert alert-success">
                                              {{ session()->get('success') }}
                                          </div>
                                      @endif
                                      @if(session()->has('warning'))
                                          <div class="alert alert-warning">
                                              {{ session()->get('warning') }}
                                          </div>
                                      @endif
                                      @if(session()->has('danger'))
                                          <div class="alert alert-danger">
                                              {{ session()->get('danger') }}
                                          </div>
                                      @endif


                                    <?php endif; $t++;?>
                                  <?php endforeach; ?>
                                </div>
                            </div>
                        </div>

                      <div class="port">
                        <div class="portfolioContainer" style="position: relative; height: 1260px;">
                          <?php $i=1;  foreach ($images as $image): ?>
                            <?php $i++;  ?>
                              <div class="col-sm-6 col-md-4 webdesign" style="position: absolute; left: 0px; top: 0px;">
                                      <div class="portfolio-masonry-box">
                                          <div class="portfolio-masonry-img">
                                              <img src="{{URL::asset('/images/full_size/')}}{{"/".$image->image_name}}" class="thumb-img img-fluid" alt="work-thumbnail">

                                          </div>
                                          <div class="portfolio-masonry-detail">
                                          

                                            <form class="" action="{{route('imageStatus')}}" method="post">
                                              @csrf
                                              <?php if ($image->deleted !=0): ?>
                                                <button type="submit" name="activeted" value="{{$image->resim_id}}" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Aktif Yap"><i class="fa fa-plus"></i></button>
                                                <?php else: ?>
                                                  <button type="submit" name="delete" value="{{$image->resim_id}}" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Pasif Yap"><i class="fa fa-minus"></i></button>
                                              <?php endif; ?>
                                              <button type="submit" name="image_delete" value="{{$image->resim_id}}" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Sil"><i class="fa fa-trash-o"></i></button>
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
