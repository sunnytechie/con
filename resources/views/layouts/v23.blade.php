<!doctype html>
<html lang="en" dir="ltr">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="CONAIO">
    <meta name="author" content="Anglican Church">
    <meta name="keywords" content="CONAIO">

    {{-- favicon --}}
    <link rel="icon" href="{{ asset('assets/img/Untitled_design__20_-removebg-preview.png') }}">

    <!-- TITLE -->
    <title>{{ $title ?? "Conaio Admin" }}</title>

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{ asset('v23/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- STYLE CSS -->
     <link href="{{ asset('v23/assets/css/style.css') }}" rel="stylesheet">

	<!-- Plugins CSS -->
    <link href="{{ asset('v23/assets/css/plugins.css') }}" rel="stylesheet">

    <!--- FONT-ICONS CSS -->
    <link href="{{ asset('v23/assets/css/icons.css') }}" rel="stylesheet">

    <!-- INTERNAL Switcher css -->
    <link href="{{ asset('v23/assets/switcher/css/switcher.css') }}" rel="stylesheet">
    <link href="{{ asset('v23/assets/switcher/demo.css') }}" rel="stylesheet">

    {{-- Tiny MCE --}}
    <script src="https://cdn.tiny.cloud/1/ifprekyziwmwbff5pm4lgrqgmsm0x5yaew0tctgdk95r94ae/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    {{-- Ckeditor --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/29.2.0/classic/ckeditor.js"></script>

    <style>
        .ck-editor__editable[role="textbox"] {
            /* editing area */
            min-height: 200px;
        }
  </style>
</head>

<body class="app sidebar-mini ltr light-mode">

    @if(request()->is('/'))
    <!-- GLOBAL-LOADER -->
    <div id="global-loader">
        <img src="{{ asset('v23/assets/images/loader.svg') }}" class="loader-img" alt="Loader">
    </div>
    <!-- /GLOBAL-LOADER -->
    @endif

    <!-- PAGE -->
    <div class="page">
        <div class="page-main">

            <!-- app-Header -->
            @include('v23.header')
            <!-- /app-Header -->

            <!--APP-SIDEBAR-->
            @include('v23.sidebar')
            <!--/APP-SIDEBAR-->

            <!--app-content open-->
            <div class="main-content app-content mt-0">
                <div class="side-app">

                    <!-- CONTAINER -->
                    <div class="main-container container-fluid">

                        <!-- PAGE-HEADER -->
                        <div class="page-header">
                            <h1 class="page-title">{{ $title ?? "Dashboard" }}</h1>
                            <div>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ url()->previous() }}">Back</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ $tag ?? "Dashboard" }}</li>
                                </ol>
                            </div>
                        </div>
                        <!-- PAGE-HEADER END -->


                        @if (session('success'))
                        {{-- Error Message --}}
                        <div class="text-wrap mb-4">
                            <div class="">
                                <div class="alert alert-success">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
                                    <span class=""><i class="fe fe-bell"></i></span>
                                    <strong>Heads Up</strong>
                                    <hr class="message-inner-separator">
                                    <p>{{ session('success') }}</p>
                                </div>
                            </div>
                        </div>
                        {{-- End Error Message --}}
                        @endif

                        {{-- Content --}}
                        @yield('content')
                        {{-- End content --}}


                    </div>
                    <!-- CONTAINER END -->
                </div>
            </div>
            <!--app-content close-->

        </div>



        <!-- FOOTER -->
        <footer class="footer">
            <div class="container">
                <div class="row align-items-center flex-row-reverse">
                    <div class="col-md-12 col-sm-12 text-center">
                        Copyright © <span id="year"></span> <a href="https://www.fortcan.com">Conaio</a>. Designed with <span
                            class="fa fa-heart text-danger"></span> by <a href="https://www.fortcan.com"> Spruko </a> All rights reserved.
                    </div>
                </div>
            </div>
        </footer>
        <!-- FOOTER END -->
    </div>
    <!-- BACK-TO-TOP -->
    <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

    <script>
        function createClassicEditor(selector) {
            ClassicEditor
                .create(document.querySelector(selector))
                .catch(error => {
                    console.error(error);
                });
        }

        createClassicEditor('#editor');
        createClassicEditor('#editor1');
        createClassicEditor('#editor2');
        createClassicEditor('#editor3');
        createClassicEditor('#editor4');
    </script>


    <!-- JQUERY JS -->
    <script src="{{ asset('v23/assets/js/jquery.min.js') }}"></script>

    <!-- BOOTSTRAP JS -->
    <script src="{{ asset('v23/assets/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('v23/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- SPARKLINE JS-->
    <script src="{{ asset('v23/assets/js/jquery.sparkline.min.js') }}"></script>

    <!-- Sticky js -->
    <script src="{{ asset('v23/assets/js/sticky.js') }}"></script>

    <!-- CHART-CIRCLE JS-->
    <script src="{{ asset('v23/assets/js/circle-progress.min.js') }}"></script>

    <!-- PIETY CHART JS-->
    <script src="{{ asset('v23/assets/plugins/peitychart/jquery.peity.min.js') }}"></script>
    <script src="{{ asset('v23/assets/plugins/peitychart/peitychart.init.js') }}"></script>

    <!-- SIDEBAR JS -->
    <script src="{{ asset('v23/assets/plugins/sidebar/sidebar.js') }}"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="{{ asset('v23/assets/plugins/p-scroll/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('v23/assets/plugins/p-scroll/pscroll.js') }}"></script>
    <script src="{{ asset('v23/assets/plugins/p-scroll/pscroll-1.js') }}"></script>

    <!-- INTERNAL CHARTJS CHART JS-->
    <script src="{{ asset('v23/assets/plugins/chart/Chart.bundle.js') }}"></script>
    <script src="{{ asset('v23/assets/plugins/chart/utils.js') }}"></script>

    <!-- INTERNAL SELECT2 JS -->
    <script src="{{ asset('v23/assets/plugins/select2/select2.full.min.js') }}"></script>

    <!-- INTERNAL Data tables js-->
    <script src="{{ asset('v23/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('v23/assets/plugins/datatable/js/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('v23/assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>

    <!-- INTERNAL APEXCHART JS -->
    <script src="{{ asset('v23/assets/js/apexcharts.js') }}"></script>
    <script src="{{ asset('v23/assets/plugins/apexchart/irregular-data-series.js') }}"></script>

    <!-- INTERNAL Flot JS -->
    <script src="{{ asset('v23/assets/plugins/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('v23/assets/plugins/flot/jquery.flot.fillbetween.js') }}"></script>
    <script src="{{ asset('v23/assets/plugins/flot/chart.flot.sampledata.js') }}"></script>
    <script src="{{ asset('v23/assets/plugins/flot/dashboard.sampledata.js') }}"></script>

    <!-- INTERNAL Vector js -->
    <script src="{{ asset('v23/assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('v23/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>

    <!-- SIDE-MENU JS-->
    <script src="{{ asset('v23/assets/plugins/sidemenu/sidemenu.js') }}"></script>

	<!-- TypeHead js -->
	<script src="{{ asset('v23/assets/plugins/bootstrap5-typehead/autocomplete.js') }}"></script>
    <script src="{{ asset('v23/assets/js/typehead.js') }}"></script>

    <!-- INTERNAL INDEX JS -->
    <script src="{{ asset('v23/assets/js/index1.js') }}"></script>

    <!-- Color Theme js -->
    <script src="{{ asset('v23/assets/js/themeColors.js') }}"></script>

    <!-- CUSTOM JS -->
    <script src="{{ asset('v23/assets/js/custom.js') }}"></script>

    <!-- Custom-switcher -->
    <script src="{{ asset('v23/assets/js/custom-swicher.js') }}"></script>

    <!-- Switcher js -->
    <script src="{{ asset('v23/assets/switcher/js/switcher.js') }}"></script>

    <!-- DATA TABLE JS-->
    <script src="{{ asset('v23/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('v23/assets/plugins/datatable/js/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('v23/assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('v23/assets/plugins/datatable/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('v23/assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ asset('v23/assets/plugins/datatable/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('v23/assets/plugins/datatable/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('v23/assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('v23/assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('v23/assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('v23/assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('v23/assets/plugins/datatable/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('v23/assets/js/table-data.js') }}"></script>

</body>

</html>
