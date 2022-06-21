<!doctype html>
<html lang="en">

<head>
    <script defer data-domain="preview.tabler.io" src="https://plausible.io/js/plausible.js"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-113467793-4"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-113467793-4');
    </script>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>@yield('title')</title>
    <!-- CSS files -->
    <link href="/css/tabler.min.css?1649661161" rel="stylesheet" />
    <link href="/css/tabler-vendors.min.css?1649661161" rel="stylesheet" />
    <link href="/css/demo.min.css?1649661161" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @stack('css')
</head>

<body>
    <div class="page">
        @include('admin.layouts.aside')
        @include('admin.layouts.header')

        <div class="page-wrapper">
            <div class="container-xl">
                <x-notification />
                <!-- Page title -->
                <div class="page-header d-print-none">
                    <div class="row g-2 align-items-center">
                        <div class="col">
                            <!-- Page pre-title -->
                            <div class="page-pretitle">
                                @yield('heading')
                            </div>
                            <h2 class="page-title">
                                @yield('sub_heading')
                            </h2>
                        </div>
                        <!-- Page title actions -->
                        <div class="col-12 col-md-auto ms-auto d-print-none">
                            <div class="btn-list">
                                {{-- <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal"
                                    data-bs-target="#modal-report">
                                    Create new report
                                </a> --}}
                                @yield('page_tools')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-body">
                <div class="container-xl">
                    @yield('content')
                </div>
            </div>
            @include('admin.layouts.footer')
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="/js/tabler.min.js?1649661161" defer></script>
    <script src="/js/demo.min.js?1649661161" defer></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.basic-select2').select2({
                placeholder: 'Please select an option'
            });
        });
    </script>
    <script>
        $(".makeread").submit(function(e) {
            console.log('Ajax initiated');
            e.preventDefault(); // avoid to execute the actual submit of the form.
            var form = $(this);
            var actionUrl = form.attr('action');
            $.ajax({
                type: "POST",
                url: actionUrl,
                data: form.serialize(), // serializes the form's elements.
                success: function(data) {
                    console.log('Done');
                    $("#loading").hide();
                    $("#mainButton").show();
                    $("#notifications-user").load(" #notifications-user > *");
                },
                error: function(error) {
                    alert('Error: ' + error);
                }
            });

        });

        $(document).ajaxStart(function() {
            $("#loadingButton").show();
            $("#mainButton").hide();
        });
    </script>
    @stack('js')

</body>

</html>
