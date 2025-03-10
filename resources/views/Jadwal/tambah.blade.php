<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Sistem Kelola Database KONI</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('gambar_aset/images/koni.png') }}">
    <link rel="stylesheet" href="{{ asset('gambar_aset/vendor/owl-carousel/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('gambar_aset/vendor/owl-carousel/css/owl.theme.default.min.css') }}">
    <link href="{{ asset('gambar_aset/vendor/jqvmap/css/jqvmap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('gambar_aset/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('gambar_aset/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('gambar_aset/assets/vendor/fonts/boxicons.css') }}" />
</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="/coba" class="brand-logo">
                <img class="logo-abbr" src="{{ asset('gambar_aset/images/koni.png') }}" alt=""
                    style="margin-left: 10px; border-radius: 50%;">
                <span class="fw-bolder d-none d-md-inline"
                    style="margin-left: 10px; font-size: 18px; font-weight: 300">Sistem Kelola KONI</span>
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        @include('layouts/header')
        <!--**********************************
            Header end
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        @include('layouts/sidebar')
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Hi, Selamat Datang kembali!</h4>
                            <p class="mb-1"><span class="text-success">{{ Auth::user()->name }},</span> Anda login
                                sebagai <span class="text-success">{{ Auth::user()->level }}</span></p>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Jadwal Pertandingan</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Tambah +</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-xxl">
                        <div class="card mb-4">
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <h5 class="mb-0">Tambah Data Schedule</h5>
                                <small class="text-muted float-end">* Wajib diisi</small>
                            </div>
                            <div class="card-body">
                                <form action="/schedules" method="post">
                                    @csrf
                                    <!-- Input untuk Kebutuhan Latihan -->
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="name">Kebutuhan Latihan *</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="name" class="form-control"
                                                placeholder="Masukkan kebutuhan latihan..." required />
                                        </div>
                                    </div>

                                    <!-- Input untuk Tanggal dan Waktu -->
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="date">Tanggal Latihan *</label>
                                        <div class="col-sm-4">
                                            <input type="date" name="date" class="form-control" required />
                                        </div>
                                        <label class="col-sm-2 col-form-label" for="time">Waktu Latihan *</label>
                                        <div class="col-sm-4">
                                            <input type="time" name="time" class="form-control" required />
                                        </div>
                                    </div>

                                    <!-- Input untuk Kategori Olahraga -->
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">Pilih Cabor *</label>
                                        <div class="col-sm-4">
                                            <select name="sport_category" class="form-control" required>
                                                <option value="" hidden selected disabled>Pilih kategori...
                                                </option>
                                                <option value="all">Semua</option> <!-- Opsi Semua -->
                                                @foreach ($sportCategories as $category)
                                                    <option value="{{ $category->id }}">
                                                        {{ $category->sport_category }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Input untuk Tempat Latihan -->
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="venue_name">Tempat Latihan *</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="venue_name" class="form-control"
                                                placeholder="Masukkan nama tempat latihan..." required />
                                        </div>
                                    </div>

                                    <!-- Input untuk Lokasi Peta -->
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="location_map">Peta (iframe)</label>
                                        <div class="col-sm-10">
                                            <textarea id="location_map" name="location_map" class="form-control" placeholder="Masukkan URL src peta Google Maps..." required></textarea>
                                            <small class="form-text text-muted">
                                                Masukkan hanya URL <code>src</code> dari iframe Google Maps. 
                                                <a href="https://www.google.com/maps" target="_blank" class="text-primary">Buka Google Maps</a> untuk mendapatkan URL.
                                                <br> Contoh: <code>https://www.google.com/maps/embed?pb=...</code>
                                            </small>
                                        </div>
                                    </div>
                                    

                                    <!-- Input untuk Catatan Tambahan -->
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="notes">Catatan Tambahan</label>
                                        <div class="col-sm-10">
                                            <textarea name="notes" class="form-control" placeholder="Masukkan catatan tambahan..." rows="3"></textarea>
                                        </div>
                                    </div>

                                    <!-- Tombol Submit -->
                                    <div class="row justify-content-end">
                                        <div class="col-sm-10">
                                            <button type="submit" class="btn btn-primary">Tambah Jadwal
                                                Latihan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>





                <!--**********************************
                    Content body end
                ***********************************-->

            </div>
        </div>
        @include('layouts/footer')
        <!--**********************************
            Main wrapper end
        ***********************************-->

        <!--**********************************
           Scripts
        ***********************************-->
        <script src="{{ asset('gambar_aset/vendor/global/global.min.js') }}"></script>
        <script src="{{ asset('gambar_aset/js/quixnav-init.js') }}"></script>
        <script src="{{ asset('gambar_aset/js/custom.min.js') }}"></script>
        <script src="{{ asset('gambar_aset/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('gambar_aset/js/plugins-init/datatables.init.js') }}"></script>
        <script src="{{ asset('gambar_aset/js/sport-category.js') }}"></script>

    </div>
</body>

</html>
