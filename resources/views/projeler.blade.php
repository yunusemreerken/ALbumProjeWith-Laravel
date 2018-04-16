@extends('layouts.master2')
@section('css')
<link rel="stylesheet" href="css/customStar.css">

@endsection
@section('content')

<div class="container-fluid">


                        <!-- SECTION FILTER
                        ================================================== -->
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 ">
                                <div class="portfolioFilter gallery-second">
                                    <!-- <a href="#" data-filter="*" class="current">All</a> -->
                                    <a href="#" data-filter=".webdesign" class="current">name</a>
                                    <!-- <a href="#" data-filter=".graphicdesign">Graphic Design</a> -->
                                    <!-- <a href="#" data-filter=".illustrator">Illustrator</a> -->
                                    <!-- <a href="#" data-filter=".photography">Photography</a> -->
                                </div>
                                <div class="portfolioFilter text-right gallery-second">
                                    <!-- <a href="#" data-filter="*" class="current">All</a> -->

                                    <!-- <a href="#" data-filter=".graphicdesign">Graphic Design</a> -->
                                    <!-- <a href="#" data-filter=".illustrator">Illustrator</a> -->
                                    <!-- <a href="#" data-filter=".photography">Photography</a> -->
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="port">
                            <div class="portfolioContainer" style="position: relative; height: 1260px;">
                              <?php $i=0; ?>
                              <?php foreach ($projeler as $proje ): ?>
                                <?php $i++; ?>
                                <div class="col-sm-6 col-md-4 webdesign" style="position: absolute; left: 0px; top: 0px;">
                                    <a href="{{URL::asset('/images/full_size/')}}{{"/".$proje->image_name}}" class="image-popup">
                                        <div class="portfolio-masonry-box">
                                            <div class="portfolio-masonry-img">
                                                <img src="{{URL::asset('/images/full_size/')}}{{"/".$proje->image_name}}" class="thumb-img img-fluid" alt="work-thumbnail">
                                            </div>
                                            <div class="portfolio-masonry-detail">
                                                <!-- <h4 class="font-18">Street Photography</h4>
                                                <p>Graphic Design</p> -->
                                            </div>
                                        </div>
                                    </a>
                                    <div class="star-rating">
                                      <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                      <input type="radio" id="5-stars{{$i}}" name="rating" value="5"  onclick="tiklandi(this,'5','{{$proje->resim_id}}','{{$i}}')"/>
                                      <label for="5-stars{{$i}}" class="star">&#9733;</label>
                                      <input type="radio" id="4-stars{{$i}}" name="rating" value="4" onclick="tiklandi(this,'4','{{$proje->resim_id}}','{{$i}}')"/>
                                      <label for="4-stars{{$i}}" class="star">&#9733;</label>
                                      <input type="radio" id="3-stars{{$i}}" name="rating" value="3" onclick="tiklandi(this,'3','{{$proje->resim_id}}','{{$i}}')"/>
                                      <label for="3-stars{{$i}}" class="star">&#9733;</label>
                                      <input type="radio" id="2-stars{{$i}}" name="rating" value="2" onclick="tiklandi(this,'2','{{$proje->resim_id}}','{{$i}}')"/>
                                      <label for="2-stars{{$i}}" class="star">&#9733;</label>
                                      <input type="radio" id="1-star{{$i}}" name="rating" value="1" onclick="tiklandi(this,'1','{{$proje->resim_id}}','{{$i}}')"/>
                                      <label for="1-star{{$i}}" class="star">&#9733;</label>
                                    </div>
                                    <div class="text-right" id ="result{{$i}}">
                                        oran
                                  </div>
                                </div> <!-- End row -->


                              <?php endforeach; ?>
                            </div>
                        </div>
                  <div class="form-group text-right">
                    <a href="{{ route('projeDetay') }}" class="btn btn-custom waves-effect waves-light" onclick="event.preventDefault(); document.getElementById('projedetay-form').submit();">Daha Fazla</a>
                    <?php if (isset($proje->id)): ?>

                      <form id="projedetay-form" action="{{ route('projeDetay') }}" method="POST" style="display: none;">{{ csrf_field() }} <input type="hidden" name="proje_id" value="{{$proje->proje_id}}"> </form>
                    <?php endif; ?>

                  </div>
                </div>


@endsection
