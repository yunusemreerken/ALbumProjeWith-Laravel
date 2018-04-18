@extends('layouts.master2')
@section('css')
<link rel="stylesheet" href="css/customStar.css">

@endsection
@section('content')

<div class="container-fluid">
<!-- SELECT proje.id,proje.name,images.filename,SUM(resim_rating.rate),COUNT(resim_rating.user_id),resim_rating.user_id FROM proje INNER JOIN images ON proje.id = images.proje_id LEFT JOIN resim_rating ON images.id = resim_rating.resim_id GROUP BY images.id order by proje.id DESC -->

                        <?php $k=0; foreach ($names as $name ): //proje isimeleri çekilir?>

                        <!-- SECTION FILTER
                        ================================================== -->
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 ">
                                <div class="portfolioFilter gallery-second">
                                    <!-- <a href="#" data-filter="*" class="current">All</a> -->
                                    <a href="#" data-filter=".webdesign" class="current">{{$name->proje_name}}</a>
                                    <!-- <a href="#" data-filter=".graphicdesign">Graphic Design</a> -->
                                    <!-- <a href="#" data-filter=".illustrator">Illustrator</a> -->
                                    <!-- <a href="#" data-filter=".photography">Photography</a> -->
                                </div>
                                <div class="portfolioFilter text-right gallery-second">
                                    <!-- <a href="#" data-filter="*" class="current">All</a> -->
                                  <?php if ($name->rate>0) {
                                      echo "  proje ortalaması : ".round($name->rate/$name->_count,2);
                                    } ?>
                                    <!-- <a href="#" data-filter=".graphicdesign">Graphic Design</a> -->
                                    <!-- <a href="#" data-filter=".illustrator">Illustrator</a> -->
                                    <!-- <a href="#" data-filter=".photography">Photography</a> -->
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="port">
                            <div class="portfolioContainer" style="position: relative; height: 5040px;">
                              <?php $i=0; $j=1; ?>
                              <?php foreach ($projeler as $proje): ?>
                                <?php $i++;  ?>

                                  <?php if ($name->proje_id==$proje->proje_id && $j%7 !=0)://max 6 resim listenmesi için ?>
                                    <?php $j++; ?>
                                  <div class="col-sm-6 col-md-4 webdesign" style="position: absolute; left: 0px; top: 0px;">
                                    <a href="{{URL::asset('/images/full_size/')}}{{"/".$proje->image_name}}" class="image-popup">
                                        <div class="portfolio-masonry-box">
                                            <div class="portfolio-masonry-img border-none">
                                                <img src="{{URL::asset('/images/full_size/')}}{{"/".$proje->image_name}}" class="thumb-img img-fluid" alt="work-thumbnail">
                                            </div>
                                            <div class="portfolio-masonry-detail">
                                                <!-- <h4 class="font-18">Street Photography</h4>
                                                <p>Graphic Design</p> -->
                                            </div>
                                          </a>
                                            <div class="image-border ">
                                              <fieldset class="rating">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="radio" id="star5{{$i}}" name="rating" value="5" onclick="tiklandi(this,'5','{{$proje->resim_id}}','{{$i}}')"/><label class = "full" for="star5{{$i}}" title="Awesome - 5 stars"></label>

                                                <input type="radio" id="star4{{$i}}" name="rating" value="4" onclick="tiklandi(this,'4','{{$proje->resim_id}}','{{$i}}')"/><label class = "full" for="star4{{$i}}" title="Pretty good - 4 stars"></label>

                                                <input type="radio" id="star3{{$i}}" name="rating" value="3" onclick="tiklandi(this,'3','{{$proje->resim_id}}','{{$i}}')"/><label class = "full" for="star3{{$i}}" title="Meh - 3 stars"></label>

                                                <input type="radio" id="star2{{$i}}" name="rating" value="2" onclick="tiklandi(this,'2','{{$proje->resim_id}}','{{$i}}')"/><label class = "full" for="star2{{$i}}" title="Kinda bad - 2 stars"></label>

                                                <input type="radio" id="star1{{$i}}" name="rating" value="1" onclick="tiklandi(this,'1','{{$proje->resim_id}}','{{$i}}')"/><label class = "full" for="star1{{$i}}" title="Sucks big time - 1 star"></label>

                                              </fieldset>
                                              <?php if ($proje->rate > 0): ?>
                                                  <p id ="result{{$i}}" class="text-right">/{{$proje->rate /$proje->_count}}</p>
                                                  <?php else: ?>
                                                    <p id ="result{{$i}}" class="text-right">0/0</p>
                                              <?php endif; ?>
                                            </div>
                                        </div>
                            </div> <!-- End row -->
                            <?php endif; ?>

                        <?php endforeach; ?>

                            </div>
                        </div>
                        <form id="projedetay-form{{$k}}" action="{{ route('projeDetay') }}" method="POST" style="display: none;">{{ csrf_field() }} <input type="hidden" name="proje_id" value="{{$name->proje_id}}"> </form>

                  <div class="form-group text-right">
                    <a href="{{ route('projeDetay') }}" class="btn btn-custom waves-effect waves-light" onclick="event.preventDefault(); document.getElementById('projedetay-form{{$k}}').submit();">Daha Fazla</a>
                  </div>
                  <?php $k++; ?>
                <?php endforeach; ?>
            </div>


@endsection
