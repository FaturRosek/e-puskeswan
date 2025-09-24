<title>E-PUSKESWAN</title>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
crossorigin=""/>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="handheldfriendly" content="true" />
<meta name="MobileOptimized" content="width" />
<meta name="csrf-token" content="{{csrf_token()}}">
<meta name="description" content="Mordenize" />
<meta name="author" content="" />
<meta name="keywords" content="Mordenize" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/favicon.ico') }}" />
<link rel="stylesheet" href="{{ asset('assets/libs/owl.carousel/dist/assets/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/libs/fontawesome/css/all.min.css') }}">
<link id="themeColors" rel="stylesheet" href="{{ asset('assets/css/style.min.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/libs/datatables/datatables.bundle.css') }}"/>
<link rel="stylesheet" href="{{ asset('assets/plugins/global/plugins.bundle.css') }}"/>
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
@stack('vendor-css')
@stack('css')