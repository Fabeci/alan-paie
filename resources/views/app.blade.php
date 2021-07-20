<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <link rel="stylesheet" type="text/css" href="{{ asset('/template/') }}/vendors/styles/core.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/template/') }}/vendors/styles/icon-font.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/template/') }}/plugins/datatables/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/template/') }}/plugins/datatables/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/template/') }}/vendors/styles/style.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/template/') }}/plugins/dropzone2/dist/min/dropzone.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- Scripts -->
    @routes
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased sidebar-light header-dark">
    <!-- <div class="pre-loader">
        <div class="pre-loader-box">
            <div class="loader-logo"><img src="{{ asset('/template/') }}/vendors/images/loading.jpeg" alt=""></div>
            <div class='loader-progress' id="progress_div">
                <div class='bar' id='bar1'></div>
            </div>
            <div class='percent' id='percent1'>0%</div>
            <div class="loading-text">
                Rechargement...
            </div>
        </div>
    </div> -->
    @inertia

    @env ('local')
    @endenv

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="{{ asset('/template') }}/vendors/scripts/core.js"></script>
    <script src="{{ asset('/template') }}/vendors/scripts/script.min.js"></script>
    <script src="{{ asset('/template') }}/vendors/scripts/process.js"></script>
    <script src="{{ asset('/template') }}/vendors/scripts/layout-settings.js"></script>

    <script src="{{ asset('/template') }}/plugins/datatables/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('/template') }}/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('/template') }}/plugins/datatables/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('/template') }}/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ asset('/template') }}/vendors/scripts/dashboard.js"></script>


    <script src="{{ asset('/template') }}/plugins/jQuery-Knob-master/jquery.knob.min.js"></script>

    <script src="{{ asset('/template/') }}/plugins/dropzone2/dist/min/dropzone.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function() {

            var readURLPhoto = function(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('.photo').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }
            var readURLLogo = function(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('.logo-pic').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            var readURLInitiales = function(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('.initiales-pic').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            var readURLSignature = function(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('.signature-pic').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $(".photo-upload").on('change', function() {
                readURLPhoto(this);
            });

            $(".logo-upload").on('change', function() {
                readURLLogo(this);
            });

            $(".photo-upload-button").on('click', function() {
                $(".photo-upload").click();
            });

            $(".logo-upload-button").on('click', function() {
                $(".logo-upload").click();
            });

            $(".initiales-upload").on('change', function() {
                readURLInitiales(this);
            });

            $(".initiales-upload-button").on('click', function() {
                $(".initiales-upload").click();
            });

            $(".signature-upload").on('change', function() {
                readURLSignature(this);
            });

            $(".signature-upload-button").on('click', function() {
                $(".signature-upload").click();
            });
        });
    </script>

</body>

</html>