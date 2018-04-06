
@extends('layouts.app')

@section('content')
<br>
<?php $t=1; foreach ($images as $key): ?>
<main role="main" class="container">
  <h1 class="mt-5">{{$key->proje_name}}</h1>
  <p class="header-right">proje puan gelecek</p>
  <?php if ($t==1): ?>
    <?php break; ?>
  <?php endif; ?>
<?php endforeach; ?>
  <hr>
      <div class="album py-5 bg-light">
        <div class="container">
          <div class="row">
            <?php  $i=1; foreach ($images as $image ): ?>
              <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                  <!-- <img src="{{URL::asset('/images/'.$image->image_name)}}" style="height: 225px; width: 100%; display: block;"> -->
                  <div class="row2">
                    <div class="column">
                      <img src="{{URL::asset('/images/'.$image->image_name)}}" style="height: 225px; width: 100%; display: block;" onclick="openModal();currentSlide(1)" class="hover-shadow cursor" >
                    </div>
                  </div>
                  <div class="card-body">
                    <!-- <p class="card-text">This is a wider card with supportingext below as a natural lead-in to additional content. This content is a little bit longer.</p> -->
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group">

                      <div class="star">
                        <div class="row">
                        <!-- Ortala -->
                          <div class="radio">
                          <fieldset class="rate1">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <!-- <input class="id" type="hidden" name="id{{$i}}" value="{{$image->id}}"> -->
                            <!-- <input class="i" type="hidden" name="i" value="{{$i}}"> -->

                            <input class="rate" id="rate1-star5{{$i}}" type="radio" name="rate" value="5" onclick="tiklandi(this,'5','{{$image->id}},'{{$i}}')"/>
                            <label for="rate1-star5{{$i}}" title="Excellent">5</label>

                            <input class="rate" id="rate1-star4{{$i}}" type="radio" name="rate" value="4" onclick="tiklandi(this,'4','{{$image->id}}','{{$i}}')"/>
                            <label for="rate1-star4{{$i}}" title="Good">4</label>

                            <input class="rate" id="rate1-star3{{$i}}" type="radio" name="rate" value="3" onclick="tiklandi(this,'3','{{$image->id}}','{{$i}}')" />
                            <label for="rate1-star3{{$i}}" title="Satisfactory">3</label>

                            <input class="rate" id="rate1-star2{{$i}}" type="radio" name="rate" value="2" onclick="tiklandi(this,'2','{{$image->id}}','{{$i}}')" />
                            <label for="rate1-star2{{$i}}" title="Bad">2</label>

                            <input class="rate" id="rate1-star1{{$i}}" type="radio" name="rate" value="1" onclick="tiklandi(this,'1','{{$image->id}}','{{$i}}')" />
                            <label for="rate1-star1{{$i}}" title="Very bad">1</label>
                            </fieldset>
                          </div>
                          <?php $i++; ?>
                          </div>

                      </div>
                      </div>

                      <br>
                      <br>

                      <div id ="result{{$i-1}}">
                            {{"/".round(($image->rate)/($image->count),2)}}
                      </div>

                      <!-- <small class="text-muted">9 mins</small> -->
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>


          </div>
        </div>
      </div>

    </main>

    <section class="text-center">
        <div class="container">
          <!-- <h1 class="jumbotron-heading">Album example</h1> -->
          <!-- <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p> -->
          <p>
            <!-- <a href="#" class="btn btn-primary my-2">Main call to action</a> -->
            <a href="#" class="btn btn-primary my-2">Devamını Gör ...</a>
          </p>
        </div>
      </section>

      <div id="myModal" class="modal">
        <span class="close cursor" onclick="closeModal()">&times;</span>
        <div class="modal-content">
          <?php  $i=1; foreach ($images as $image ): ?>
            <div class="mySlides">
              <div class="numbertext"></div>
                <img src="{{URL::asset('/images/'.$image->image_name)}}" style="width:100%">
            </div>
          <?php $i++; endforeach; ?>

          <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
          <a class="next" onclick="plusSlides(1)">&#10095;</a>

          <div class="caption-container">
            <div class="caption-container">
             <p id="caption"></p>
           </div>
          </div>
        </div>
      </div>
@endsection
