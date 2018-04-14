@extends('layouts.master')

@section('content')

<div class="container-fluid">
                        <?php foreach ($projeler as $proje ): ?>


                        <!-- SECTION FILTER
                        ================================================== -->
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 ">
                                <div class="portfolioFilter gallery-second">
                                    <!-- <a href="#" data-filter="*" class="current">All</a> -->
                                    <a href="#" data-filter=".webdesign" class="current">{{$proje->proje_name}}</a>
                                    <!-- <a href="#" data-filter=".graphicdesign">Graphic Design</a> -->
                                    <!-- <a href="#" data-filter=".illustrator">Illustrator</a> -->
                                    <!-- <a href="#" data-filter=".photography">Photography</a> -->
                                </div>
                                <div class="portfolioFilter text-right gallery-second">
                                    <!-- <a href="#" data-filter="*" class="current">All</a> -->
                                    <label><?php if ($proje->rate>0): ?>
                                      {{round($proje->rate/$proje->_count,2)}}
                                    <?php endif; ?></label>
                                    <!-- <a href="#" data-filter=".graphicdesign">Graphic Design</a> -->
                                    <!-- <a href="#" data-filter=".illustrator">Illustrator</a> -->
                                    <!-- <a href="#" data-filter=".photography">Photography</a> -->
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="port">
                          <?php $i=1; ?>
                            <div class="portfolioContainer" style="position: relative; height: 1260px;">
                                <div class="col-sm-6 col-md-4 webdesign" style="position: absolute; left: 0px; top: 0px;">
                                    <a href="assets/images/small/img-1.jpg" class="image-popup">
                                        <div class="portfolio-masonry-box">
                                            <div class="portfolio-masonry-img">
                                                <img src="assets/images/small/img-1.jpg" class="thumb-img img-fluid" alt="work-thumbnail">
                                            </div>
                                            <div class="portfolio-masonry-detail">
                                                <!-- <h4 class="font-18">Street Photography</h4>
                                                <p>Graphic Design</p> -->
                                            </div>
                                        </div>
                                    </a>


                                    <div class="col-sm-6">
                                        <div id="default"></div>
                                    </div>
                        </div> <!-- End row -->
                          <div class="form-group text-right">
                            <button class="btn btn-custom waves-effect waves-light" type="submit">
                              Daha Fazla ...
                            </button>

                          </div>
                    </div>
                  <?php endforeach; ?>
                  {{$projeler->links()}}


@endsection
