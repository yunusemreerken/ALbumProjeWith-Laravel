<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/dropzone.css') }}">
        <script type="text/javascript" src="{{ asset('js/dropzone.js') }}"></script>

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: #B0BEC5;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                 <form class="form-horizontal dropzone dz-clickable" action="{{url('/upload')}}" method="post"  enctype="multipart/form-data">
                    <!-- Name input-->

                    <input id="name" name="name" type="text" placeholder="Your Name" class="form-control">

                    <div class="dz-message" id="my-dropzone">
                    <h4>Drag Photos to Upload</h4>
                    <span>Or click to browse</span>
                    </div>

                    <!-- Token -->
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <!-- Form actions -->

                    <button type="submit" class="btn btn-primary btn-lg">Add</button>
                  </form>
            </div>
        </div>
    </body>
</html>
