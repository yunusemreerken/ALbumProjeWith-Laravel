@extends('layouts.master')

@section('content')
<div class="container-fluid">

                        <!-- SECTION FILTER
                        ================================================== -->
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 ">
                                <div class="portfolioFilter text-center gallery-second">
                                    <a href="#" data-filter=".webdesign" class="current">Proje 1</a>
                                    <!-- <a href="#" data-filter=".graphicdesign">Graphic Design</a> -->
                                    <!-- <a href="#" data-filter=".illustrator">Illustrator</a> -->
                                    <!-- <a href="#" data-filter=".photography">Photography</a> -->
                                </div>
                            </div>
                        </div>
                        <div class="port">
                            <div class="portfolioContainer" style="position: relative; height: 1260px;">
                              <div class="col-sm-6 col-md-4 webdesign" style="position: absolute; left: 0px; top: 0px;">
                                  <a href="">
                                      <div class="portfolio-masonry-box">
                                          <div class="portfolio-masonry-img">
                                              <img src="assets/images/small/img-1.jpg" class="thumb-img img-fluid" alt="work-thumbnail">
                                          </div>
                                          <div class="portfolio-masonry-detail">
                                              <label class="btn btn-sm switch">
                                                <input type="checkbox">
                                                <span class="slider round" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Aktif/Pasif"></span>
                                              </label>
                                              <a href="#" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Sil"><i class="mdi mdi-delete"></i></a>

                                          </div>
                                      </div>
                                      <div class="project-sort pull-right">
                                          <div class="project-sort-item">
                                              <form class="form-inline">

                                                  <div class="form-group">
                                                      <label for="sort-select">Sort</label>
                                                  </div>
                                              </form>
                                          </div>
                                      </div>
                                  </a>
                              </div>
                            </div>
                        </div> <!-- End row -->

                    </div>
@endsection
