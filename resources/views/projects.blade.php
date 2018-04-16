@extends('layouts.master')
@section('css')
<link rel="stylesheet" href="css/customStar.css">

@endsection
@section('content')
    <div class="container-fluid">

        <!-- SECTION FILTER
        ================================================== -->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 ">
                <div class="portfolioFilter text-center gallery-second">
                    <a href="#" data-filter="*" class="current">All</a>
                    <a href="#" data-filter=".webdesign">Web Design</a>
                    <a href="#" data-filter=".graphicdesign">Graphic Design</a>
                    <a href="#" data-filter=".illustrator">Illustrator</a>
                    <a href="#" data-filter=".photography">Photography</a>
                </div>
            </div>
        </div>

        <div class="port">
            <div class="portfolioContainer">
                <div class="col-sm-6 col-md-4 webdesign illustrator">
                    <a href="assets/images/small/img-1.jpg" class="image-popup">
                        <div class="portfolio-masonry-box">
                            <div class="portfolio-masonry-img">
                                <img src="assets/images/small/img-1.jpg" class="thumb-img img-fluid" alt="work-thumbnail">
                            </div>
                            <div class="portfolio-masonry-detail">
                                <h4 class="font-18">Street Photography</h4>
                                <p>Graphic Design</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-sm-6 col-md-4 graphicdesign illustrator photography">
                    <a href="assets/images/small/img-2.jpg" class="image-popup">
                        <div class="portfolio-masonry-box">
                            <div class="portfolio-masonry-img">
                                <img src="assets/images/small/img-2.jpg" class="thumb-img" alt="work-thumbnail">
                            </div>
                            <div class="portfolio-masonry-detail">
                                <h4 class="font-18">Traditional Building</h4>
                                <p>Photography</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-sm-6 col-md-4 webdesign graphicdesign">
                    <a href="assets/images/small/img-3.jpg" class="image-popup">
                        <div class="portfolio-masonry-box">
                            <div class="portfolio-masonry-img">
                                <img src="assets/images/small/img-3.jpg" class="thumb-img img-fluid" alt="work-thumbnail">
                            </div>
                            <div class="portfolio-masonry-detail">
                                <h4 class="font-18">Beautiful House</h4>
                                <p>Natural</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-sm-6 col-md-4 illustrator photography">
                    <a href="assets/images/small/img-4.jpg" class="image-popup">
                        <div class="portfolio-masonry-box">
                            <div class="portfolio-masonry-img">
                                <img src="assets/images/small/img-4.jpg" class="thumb-img img-fluid" alt="work-thumbnail">
                            </div>
                            <div class="portfolio-masonry-detail">
                                <h4 class="font-18">Creative Agency</h4>
                                <p>Natural</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-sm-6 col-md-4 graphicdesign photography">
                    <a href="assets/images/small/img-5.jpg" class="image-popup">
                        <div class="portfolio-masonry-box">
                            <div class="portfolio-masonry-img">
                                <img src="assets/images/small/img-5.jpg" class="thumb-img" alt="work-thumbnail">
                            </div>
                            <div class="portfolio-masonry-detail">
                                <h4 class="font-18">Street Photography</h4>
                                <p>Photography</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-sm-6 col-md-4 webdesign photography">
                    <a href="assets/images/small/img-6.jpg" class="image-popup">
                        <div class="portfolio-masonry-box">
                            <div class="portfolio-masonry-img">
                                <img src="assets/images/small/img-6.jpg" class="thumb-img img-fluid" alt="work-thumbnail">
                            </div>
                            <div class="portfolio-masonry-detail">
                                <h4 class="font-18">Creative Agency</h4>
                                <p>Web Design</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-sm-6 col-md-4 illustrator photography graphicdesign">
                    <a href="assets/images/small/img-7.jpg" class="image-popup">
                        <div class="portfolio-masonry-box">
                            <div class="portfolio-masonry-img">
                                <img src="assets/images/small/img-7.jpg" class="thumb-img" alt="work-thumbnail">
                            </div>
                            <div class="portfolio-masonry-detail">
                                <h4 class="font-18">Traditional Building</h4>
                                <p>Photography</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-sm-6 col-md-4 graphicdesign photography webdesign">
                    <a href="assets/images/small/img-1.jpg" class="image-popup">
                        <div class="portfolio-masonry-box">
                            <div class="portfolio-masonry-img">
                                <img src="assets/images/small/img-1.jpg" class="thumb-img img-fluid" alt="work-thumbnail">
                            </div>
                            <div class="portfolio-masonry-detail">
                                <h4 class="font-18">Beautiful House</h4>
                                <p>Natural</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-sm-6 col-md-4 webdesign illustrator">
                    <a href="assets/images/small/img-3.jpg" class="image-popup">
                        <div class="portfolio-masonry-box">
                            <div class="portfolio-masonry-img">
                                <img src="assets/images/small/img-3.jpg" class="thumb-img img-fluid" alt="work-thumbnail">
                            </div>
                            <div class="portfolio-masonry-detail">
                                <h4 class="font-18">Creative Agency</h4>
                                <p>Natural</p>
                            </div>
                        </div>
                    </a>
                </div>

            </div>
        </div> <!-- End row -->

    </div> <!-- container -->


@endsection
