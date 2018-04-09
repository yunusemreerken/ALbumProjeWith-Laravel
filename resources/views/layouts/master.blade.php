<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Highdmin - Responsive Bootstrap 4 Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App css -->
        <link href="{{URL::asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{URL::asset('assets/css/icons.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{URL::asset('assets/css/metismenu.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{URL::asset('assets/css/style.css')}}" rel="stylesheet" type="text/css" />

        <link href="{{URL::asset('plugins/bootstrap-fileupload/bootstrap-fileupload.css')}}" rel="stylesheet">
        <link href="{{URL::asset('plugins/dropzone/dropzone.css')}}" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{URL::asset('plugins/magnific-popup/css/magnific-popup.css')}}">
        <!-- <link rel="stylesheet" href="{{URL::asset('css/star.css')}}"> -->
        <script src="{{URL::asset('assets/js/modernizr.min.js')}}"></script>


        <style type="text/css">
        .switch {
          position: relative;
          display: inline-block;
          top: 5px;
          width: 50px;
          height: 30px;
        }

        .switch input {display:none;}

        .slider {
          position: absolute;
          cursor: pointer;
          top: 0;
          left: 0;
          right: 0;
          bottom: 0;
          background-color: #ccc;
          -webkit-transition: .4s;
          transition: .4s;
        }

        .slider:before {
          position: absolute;
          content: "";
          height: 20px;
          width: 18px;
          left: 4px;
          bottom: 4px;
          background-color: white;
          -webkit-transition: .4s;
          transition: .4s;
        }

        input:checked + .slider {
          background-color: #2196F3;
        }

        input:focus + .slider {
          box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
          -webkit-transform: translateX(26px);
          -ms-transform: translateX(26px);
          transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
          border-radius: 20px;
        }

        .slider.round:before {
          border-radius: 50%;
        }

        </style>

    </head>


    <body>

        <!-- Begin page -->
        <div id="wrapper">

          @include('admin.left-sidebar')



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->

            <div class="content-page">

                @include('admin.top-bar')


                <!-- Start Page content -->
                <div class="content">
                    @yield('content')
                </div> <!-- content -->

              @include('admin.footer')

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->



        <!-- jQuery  -->
        <script src="{{URL::asset('assets/js/jquery.min.js')}}"></script>
        <script src="{{URL::asset('assets/js/popper.min.js')}}"></script>
        <script src="{{URL::asset('assets/js/bootstrap.min.js')}}"></script>
        <script src="{{URL::asset('assets/js/metisMenu.min.js')}}"></script>
        <script src="{{URL::asset('assets/js/waves.js')}}"></script>
        <script src="{{URL::asset('assets/js/jquery.slimscroll.js')}}"></script>

        <script src="{{URL::asset('plugins/bootstrap-fileupload/bootstrap-fileupload.js')}}"></script>
        <script src="{{URL::asset('plugins/dropzone/dropzone.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('plugins/isotope/js/isotope.pkgd.min.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('plugins/magnific-popup/js/jquery.magnific-popup.min.js')}}"></script>
        <script src="{{URL::asset('plugins/raty-fa/jquery.raty-fa.js')}}"></script>
        <script src="{{URL::asset('assets/pages/jquery.rating.js')}}"></script>
        <!-- <script type="{{URL::asset('js/star.js')}}"></script> -->

        <!-- Flot chart -->
        <!-- <script src="../plugins/flot-chart/jquery.flot.min.js"></script> -->
        <!-- <script src="../plugins/flot-chart/jquery.flot.time.js"></script> -->
        <!-- <script src="../plugins/flot-chart/jquery.flot.tooltip.min.js"></script> -->
        <!-- <script src="../plugins/flot-chart/jquery.flot.resize.js"></script> -->
        <!-- <script src="../plugins/flot-chart/jquery.flot.pie.js"></script> -->
        <!-- <script src="../plugins/flot-chart/jquery.flot.crosshair.js"></script> -->
        <!-- <script src="../plugins/flot-chart/curvedLines.js"></script> -->
        <!-- <script src="../plugins/flot-chart/jquery.flot.axislabels.js"></script> -->

        <!-- KNOB JS -->
        <!--[if IE]>
        <script type="text/javascript" src="../plugins/jquery-knob/excanvas.js"></script>
        <![endif]-->
        <!-- <script src="../plugins/jquery-knob/jquery.knob.js"></script> -->

        <!-- Dashboard Init -->
        <script src="{{URL::asset('assets/pages/jquery.dashboard.init.js')}}"></script>

        <!-- App js -->
        <script src="{{URL::asset('assets/js/jquery.core.js')}}"></script>
        <script src="{{URL::asset('assets/js/jquery.app.js')}}"></script>
        <script type="text/javascript">
            $(window).on('load', function () {
                var $container = $('.portfolioContainer');
                $container.isotope({
                    filter: '*',
                    animationOptions: {
                        duration: 750,
                        easing: 'linear',
                        queue: false
                    }
                });

                $('.portfolioFilter a').click(function(){
                    $('.portfolioFilter .current').removeClass('current');
                    $(this).addClass('current');

                    var selector = $(this).attr('data-filter');
                    $container.isotope({
                        filter: selector,
                        animationOptions: {
                            duration: 750,
                            easing: 'linear',
                            queue: false
                        }
                    });
                    return false;
                });
            });
            $(document).ready(function() {
                $('.image-popup').magnificPopup({
                    type: 'image',
                    closeOnContentClick: true,
                    mainClass: 'mfp-fade',
                    gallery: {
                        enabled: true,
                        navigateByImgClick: true,
                        preload: [0,1] // Will preload 0 - before current, and 1 after the current image
                    }
                });
            });
        </script>
        <script>
        var select_all = document.getElementById("select_all"); //select all checkbox
        var checkboxes = document.getElementsByClassName("checkbox"); //checkbox items

        //select all checkboxes
        select_all.addEventListener("change", function(e){
          for (i = 0; i < checkboxes.length; i++) {
              checkboxes[i].checked = select_all.checked;
          }
        });


        for (var i = 0; i < checkboxes.length; i++) {
          checkboxes[i].addEventListener('change', function(e){ //".checkbox" change
              //uncheck "select all", if one of the listed checkbox item is unchecked
              if(this.checked == false){
                  select_all.checked = false;
              }
              //check "select all" if all checkbox items are checked
              if(document.querySelectorAll('.checkbox:checked').length == checkboxes.length){
                  select_all.checked = true;
              }
          });
        }
        </script>


    </body>
</html>