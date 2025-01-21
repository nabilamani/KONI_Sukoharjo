<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KONI Sukoharjo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('gambar_aset/images/koni.png') }}">
    <link rel="stylesheet" href="{{ asset('gambar_aset/vendor/owl-carousel/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('gambar_aset/vendor/owl-carousel/css/owl.theme.default.min.css') }}">
    <link href="{{ asset('gambar_aset/vendor/jqvmap/css/jqvmap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('gambar_aset/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('gambar_aset/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('gambar_aset/assets/vendor/fonts/boxicons.css') }}" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <style>
        body {
            overflow-x: hidden;
            background: url('/gambar_aset/background_2.png') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
        }

        .hero-section {
            height: 100vh;
            background: url('/gambar_aset/bg-olahraga.jpg') no-repeat center center;
            background-size: cover;
            background-attachment: fixed;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            color: white;
        }

        .hero-overlay {
            width: 100%;
            height: 100vh;
            background: rgba(0, 0, 0, 0.6);
            /* Semi-transparent background */
            backdrop-filter: blur(5px);
            /* Blurring the background for the glass effect */
            padding: 50px 20px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            /* Optional: Border to enhance glass effect */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            /* Optional: Adds depth */
            transition: transform 0.3s ease;
            /* Smooth zoom effect */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .hero-title {
            font-size: 3rem;
            font-weight: bold;
        }

        .hero-subtitle {
            font-size: 16px;
        }

        .hero-overlay .btn {
            font-size: 1rem;
            border-radius: 25px;
            transition: transform 0.3s ease;
        }

        .program-section {
            background-color: #f8f9fa;
        }

        .program-section h2 {
            color: #2c3e50;
        }

        .program-section img {
            max-width: 250px;
            height: auto;
            border-radius: 10px;
        }
        .breadcrumb {
            border-right: 5px solid #FF9800;
            border-radius: 15px;
        }
        @media (max-width: 768px) {
            .hero-title {
                font-size: 16px;
            }

            .hero-subtitle {
                font-size: 12px;
            }
        }
    </style>
</head>

<body>
    @include('viewpublik/layouts/navbar')

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-overlay d-flex flex-column justify-content-center align-items-center text-center px-5 py-5"
            data-aos="zoom-in" data-aos-delay="0">
            <!-- Lottie Player -->
            <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>
            <div class="lottie-container mb-4">
                <dotlottie-player src="https://lottie.host/f7e21688-11aa-41f4-bfc3-885a4483adf5/lK6R71kTw0.lottie" background="transparent" speed="1" style="width: 250px; height: 250px" loop autoplay></dotlottie-player>
            </div>

            <!-- Hero Title -->
            <h1 class="hero-title text-white fst-italic mb-3" data-aos="zoom-in" data-aos-delay="200">
                #PROGRAM_KONI_SKH
            </h1>

            <!-- Subtitle -->
            <p class="hero-subtitle text-white mb-4" data-aos="zoom-in" data-aos-delay="400">
                KONI Sukoharjo, wujudkan olahraga yang berprestasi dan menjunjung tinggi
                sportivitas.
            </p>

            <!-- Button -->
            <a href="#tentang-section" class="btn btn btn-warning px-4 py-2" data-aos="zoom-in" data-aos-delay="600">
                Selengkapnya
            </a>
        </div>
    </section>

    <section class="program-section py-5 bg-light" id="program-section">
        <div class="container">
            <!-- Breadcrumb -->
            <nav class="breadcrumb bg-transparent px-3 py-3 shadow-sm">
                <a class="breadcrumb-item text-decoration-none" href="/">Home</a>
                <span class="breadcrumb-item active text-primary">Program</span>
            </nav>
    
            <!-- Header -->
            <div class="text-center mb-5">
                <h2 class="fw-bold text-primary mb-3">Program Unggulan KONI Sukoharjo</h2>
                <p class="text-muted">
                    KONI Sukoharjo berkomitmen untuk memajukan olahraga melalui berbagai program strategis yang inovatif dan berdampak luas. Berikut adalah program-program unggulan kami.
                </p>
            </div>
    
            <!-- Program Cards -->
            <div class="row gy-4">
                <!-- Program 1 -->
                <div class="col-lg-4">
                    <div class="card border-0 shadow h-100 text-center p-3">
                        <div class="card-body">
                            <div class="icon-container mb-3">
                                <i class="mdi mdi-run text-primary" style="font-size: 48px;"></i>
                            </div>
                            <h5 class="fw-bold text-primary">Pelatihan Atlet Berprestasi</h5>
                            <p class="text-muted">
                                Pelatihan intensif bagi atlet berbakat untuk meningkatkan kemampuan fisik dan mental, mendukung mereka menjadi yang terbaik.
                            </p>
                            <button class="btn btn-primary btn-sm">Program 1</button>
                        </div>
                    </div>
                </div>
    
                <!-- Program 2 -->
                <div class="col-lg-4">
                    <div class="card border-0 shadow h-100 text-center p-3">
                        <div class="card-body">
                            <div class="icon-container mb-3">
                                <i class="mdi mdi-school text-success" style="font-size: 48px;"></i>
                            </div>
                            <h5 class="fw-bold text-success">Pendampingan Pelatih</h5>
                            <p class="text-muted">
                                Meningkatkan profesionalisme pelatih melalui pelatihan dan sertifikasi untuk membangun standar kualitas tinggi.
                            </p>
                            <button class="btn btn-success text-white btn-sm">Program 2</button>
                        </div>
                    </div>
                </div>
    
                <!-- Program 3 -->
                <div class="col-lg-4">
                    <div class="card border-0 shadow h-100 text-center p-3">
                        <div class="card-body">
                            <div class="icon-container mb-3">
                                <i class="mdi mdi-domain text-danger" style="font-size: 48px;"></i>
                            </div>
                            <h5 class="fw-bold text-danger">Pengembangan Fasilitas</h5>
                            <p class="text-muted">
                                Meningkatkan kualitas fasilitas olahraga melalui pembangunan dan renovasi sarana olahraga modern.
                            </p>
                            <button class="btn btn-danger btn-sm">Program 3</button>
                        </div>
                    </div>
                </div>
    
                <!-- Program 4 -->
                <div class="col-lg-4">
                    <div class="card border-0 shadow h-100 text-center p-3">
                        <div class="card-body">
                            <div class="icon-container mb-3">
                                <i class="mdi mdi-trophy text-dark" style="font-size: 48px;"></i>
                            </div>
                            <h5 class="fw-bold text-dark">Turnamen dan Kompetisi</h5>
                            <p class="text-muted">
                                Menyelenggarakan berbagai turnamen lokal untuk mendukung pengembangan atlet dan menjaring bakat baru.
                            </p>
                            <button class="btn btn-dark btn-sm">Program 4</button>
                        </div>
                    </div>
                </div>
    
                <!-- Program 5 -->
                <div class="col-lg-4">
                    <div class="card border-0 shadow h-100 text-center p-3">
                        <div class="card-body">
                            <div class="icon-container mb-3">
                                <i class="mdi mdi-heart-pulse text-info" style="font-size: 48px;"></i>
                            </div>
                            <h5 class="fw-bold text-info">Edukasi dan Kampanye</h5>
                            <p class="text-muted">
                                Mengedukasi masyarakat tentang pentingnya olahraga dan gaya hidup sehat melalui kampanye dan seminar.
                            </p>
                            <button class="btn btn-info text-white btn-sm">Program 5</button>
                        </div>
                    </div>
                </div>
    
                <!-- Program 6 -->
                <div class="col-lg-4">
                    <div class="card border-0 shadow h-100 text-center p-3">
                        <div class="card-body">
                            <div class="icon-container mb-3">
                                <i class="mdi mdi-school text-secondary" style="font-size: 48px;"></i>
                            </div>
                            <h5 class="fw-bold text-secondary">Pembinaan Pelajar</h5>
                            <p class="text-muted">
                                Program pembinaan olahraga untuk pelajar dengan bekerja sama dengan sekolah-sekolah di Sukoharjo.
                            </p>
                            <button class="btn btn-secondary btn-sm">Program 6</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    





    @include('viewpublik/layouts/footer')


<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>

</body>

</html>
