<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>E-STOCK</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <style>
        #map {
            height: 500px;
            /* Ubah nilai ini sesuai dengan kebutuhan Anda */
        }
    </style>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    {{-- <link href="landing/img/favicon.png" rel="icon"> --}}
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logo.png') }}" />
    <link href="landing/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <!-- Favicons -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/logo.png') }}" />
    <link href="landing/img/apple-touch-icon.png" rel="apple-touch-icon">


    <!-- Vendor CSS Files -->
    <link href="landing/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="landing/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="landing/vendor/aos/aos.css" rel="stylesheet">
    <link href="landing/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="landing/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="landing/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="landing/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="landing/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="landing/css/css.css" rel="stylesheet">

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>E-STOCK</title>
    <meta content="" name="description">
    <meta content="" name="keywords">


    <!-- Favicons -->
    {{-- <link href="landing/img/favicon.png" rel="icon"> --}}
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/logo.png') }}" />
    <link href="landing/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="landing/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="landing/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="landing/vendor/aos/aos.css" rel="stylesheet">
    <link href="landing/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="landing/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="landing/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="landing/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="landing/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="landing/css/css.css" rel="stylesheet">

</head>

<body>

    <!-- ======= Top Bar ======= -->
    <div id="topbar" class="d-flex align-items-center fixed-top">
        <div class="container d-flex align-items-center justify-content-center justify-content-md-between">
            <div class="align-items-center d-none d-md-flex">
                <i class="bi bi-clock"></i> Monday - Saturday, 8AM to 10PM
            </div>
            <div class="d-flex align-items-center">
                <i class="bi bi-phone"></i> Call us now +6285854470080
            </div>
        </div>
    </div>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">

            <a href="/" class="logo me-auto"><img src="{{ asset('assets/images/logos/Hospital.png') }}"alt=""></a>

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link scrollto " href="#hero">Beranda</a></li>
                    <li><a class="nav-link scrollto" href="#about">Profil</a></li>
                    <li><a class="nav-link scrollto" href="#berita">Berita</a></li>
                    <li><a class="nav-link scrollto" href="#pengumuman">Pengumuman</a></li>
                    <li><a class="nav-link scrollto" href="#lokasi">Lokasi</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

            <a href="/auth_login" class="appointment-btn scrollto">Login</a>

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

            <ol class="" id="hero-carousel-indicators"></ol>

            <div class="carousel-inner" role="listbox">

                <!-- Slide 1 -->
                @foreach ($beranda as $d)
                    <div class="carousel-item active" style="background-image: url('{{ asset($d->image) }}')">
                        <div class="container">
                            <h2>{{ $d->judul }}</h2>
                            <p>{{ $d->sub_judul }}</p>
                            <a href="#about" class="btn-get-started scrollto">Profil</a>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= About Us Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">
                <div id="profileCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($profile as $key => $p)
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                <div class="section-title">
                                    <p>Profil</p>
                                </div>
                                <div class="row justify-content-between">
                                    <div class="col-lg-6" data-aos="fade-right" data-aos-delay="60">
                                        <img src="/profile_photo/{{ $p->photo }}" class="img-fluid"
                                            alt="Profile Image"
                                            style="width: 100%; height:600px; border-radius: 50%; object-fit: cover">
                                    </div>
                                    <div class="col-lg-5 pt-4 pt-lg-0 content" data-aos="fade-left"
                                        data-aos-delay="100">
                                        <h3 class="mt-5 mb-2 p-3">{{ $p->title }}</h3>
                                        <p class="p-3 text-start">{{ $p->description }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </section>

        <!-- ======= Counts Section ======= -->
        <section id="counts" class="counts">
            <div class="container" data-aos="fade-up">

                @foreach ($statistik as $d)
                    <div class="row no-gutters">

                        <div class="col-lg-4 col-md-6 d-md-flex align-items-md-stretch">
                            <div class="count-box">
                                <i class="fas fa-user-md"></i>
                                <span data-purecounter-start="0" data-purecounter-end="{{ $d->tenaga_medis }}"
                                    data-purecounter-duration="1" class="purecounter"></span>

                                <p><strong>Tenaga Medis</strong></p>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 d-md-flex align-items-md-stretch">
                            <div class="count-box">
                                <i class="fas fa-pills"></i>
                                <span data-purecounter-start="0" data-purecounter-end="{{ $d->alat_medis }}"
                                    data-purecounter-duration="1" class="purecounter"></span>
                                <p><strong>Peralatan Medis</strong></p>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 d-md-flex align-items-md-stretch">
                            <div class="count-box">
                                <i class="far fa-hospital"></i>
                                <span data-purecounter-start="0" data-purecounter-end="{{ $d->total_puskeswan }}"
                                    data-purecounter-duration="1" class="purecounter"></span>
                                <p><strong>Total Puskeswan</strong></p>
                            </div>
                        </div>

                    </div>
                @endforeach

            </div>
        </section><!-- End Counts Section -->

        <!-- ======= Berita Section ======= -->
        <section id="berita" class="doctors section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <p>Berita</p>
                    <h2>Berita eksklusif Untuk anda hari ini</h2>
                </div>

                <div class="row">
                    @foreach ($news as $s)
                        <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                            <div class="member" data-aos="fade-up" data-aos-delay="100">
                                <div class="member-img">
                                    <img src="/data_file/{{ $s->thumbnail }}" class="img-fluid" alt="">
                                </div>
                                <div class="member-info">
                                    <span>{{ $s->title }}</span>
                                    <h4 class="overflow-y-scroll p-2" style="height: 175px;">{{ $s->description }}
                                    </h4>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>
        </section><!-- End Berita Section -->

        <!-- ======= Pengumuman Section ======= -->
        <section id="pengumuman" class="about">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <p>Pengumuman</p>
                </div>

                <div id="pengumumanCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($pengumuman as $index => $data)
                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                <div class="row">
                                    <div class="col-lg-6" data-aos="fade-right">
                                        <img src="{{ Storage::url($data->image) }}" class="img-fluid" alt=""
                                            style="width: 100%;height:600px;border-radius: 50%;object-fit: cover">
                                    </div>
                                    <div class="col-lg-6 pt-4 pt-lg-0 content mt-5" data-aos="fade-left">
                                        <h3 class="mt-4">{{ $data->judul }}</h3>
                                        <p>
                                            {{ $data->deskripsi }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#pengumumanCarousel"
                        data-bs-slide="prev">
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#pengumumanCarousel"
                        data-bs-slide="next">
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

            </div>
        </section><!-- End Pengumuman Section -->

        <!-- ======= Contact Section ======= -->
        <section id="lokasi" class="contact">
            <div class="container">

                <div class="section-title">
                    <p>Contact</p>
                </div>

                <div class="row mt-2">

                    <div class="col-lg-12">
                        @foreach ($contact as $d)
                            <div class="row">
                                <div class="col-md-4 mb-4">
                                    <div class="info-box">
                                        <i class="bx bx-envelope"></i>
                                        <h3>Email</h3>
                                        <p>{{ $d->email }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <div class="info-box">
                                        <i class="bx bx-map"></i>
                                        <h3>Alamat</h3>
                                        <p>{{ $d->alamat }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <div class="info-box">
                                        <i class="bx bx-phone-call"></i>
                                        <h3>Telepon</h3>
                                        <p>{{ $d->telepon }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <section id="lokasi" class="lokasi">
                            <div class="container" data-aos="fade-up">

                                <div class="section-title">
                                    <h2>Puskeswan</h2>
                                    <p>Temukan Puskeswan kami</p>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div id="map"></div>
                                    </div>
                                </div>

                            </div>
                        </section><!-- End Lokasi Section -->

                    </div>
                </div>
            </div>
        </section><!-- End Contact Section -->


    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>Puskeswan</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                Designed by <a href="#">BootstrapMade</a>
            </div>
        </div>


        </div>
        </div>
        </div>


    </footer><!-- End Footer -->

    {{-- <div id="preloader"></div> --}}
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="landing/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="landing/vendor/aos/aos.js"></script>
    <script src="landing/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="landing/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="landing/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="landing/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="landing/js/main.js"></script>

    </footer><!-- End Footer -->

    {{-- <div id="preloader"></div> --}}
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="landing/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="landing/vendor/aos/aos.js"></script>
    <script src="landing/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="landing/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="landing/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="landing/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="landing/js/main.js"></script>

    <script>
        // Inisialisasi peta
        var map = L.map('map').setView([-8.1183, 112.1576], 13); // Set initial view to Kabupaten Blitar

        // Set up the OSM layer
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Tentukan batas koordinat Kabupaten Blitar
        var bounds = L.latLngBounds(
            L.latLng(-8.2532, 111.9735), // Koordinat sudut barat daya
            L.latLng(-7.9838, 112.4224) // Koordinat sudut timur laut
        );

        // Atur tampilan peta agar hanya menampilkan wilayah Kabupaten Blitar
        map.fitBounds(bounds);

        // Tambahkan marker untuk setiap puskeswan
        @foreach ($puskeswans as $puskeswan)
            L.marker([{{ $puskeswan->latitude }}, {{ $puskeswan->longitude }}]).addTo(map)
                .bindPopup('{{ $puskeswan->name }}') // Sesuaikan dengan atribut yang sesuai di model
                .bindTooltip('{{ $puskeswan->name }}', {
                    permanent: true,
                    direction: 'top'
                }); // Tambahkan label nama puskeswan
        @endforeach
    </script>

</body>

</html>
