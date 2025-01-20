{{-- @dd($coaches) --}}

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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>
<style>
    .card {
        border-bottom: 3px solid orange;

        /* You can adjust the width (3px) as needed */
        .image-container {
            position: relative;
            overflow: hidden;
            border: 5px solid #FF9800;
        }

        .image-container:hover {
            background: rgba(0, 0, 0, 0.6);
        }

        .image-container img {
            transition: transform 0.5s ease;
            transform-origin: center center;
            transform: scale(0.9);
        }

        .image-container:hover img {
            transform: scale(0.8);
        }

        .image-overlay {
            display: flex;
            align-items: flex-end;
            justify-content: flex-start;
            transition: background 0.5s ease;
        }

        .text-overlay {
            transition: opacity 0.5s ease;
            opacity: 0;
            text-align: left;
        }

        .image-container:hover .text-overlay {
            opacity: 1;
        }
    }
</style>

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
                    style="margin-left: 10px; border-radius: 50%; ">
                <span class="fw-bolder " style="margin-left: 10px; font-size: 18px; font-weight: 300">Sistem Kelola
                    KONI</span>
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
            Header end ti-comment-alt
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
                            <h4>Hi, Selamat Datang!</h4>
                            <p class="mb-1"><span class="text-success">{{ Auth::user()->name }},</span> Anda login
                                sebagai <span class="text-success">{{ Auth::user()->level }}</span></p>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Struktural Koni</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Daftar Struktural</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-12">
                        @forelse ($strukturals as $struktur)
                            <div class="card shadow-sm border-0 rounded-4 mb-4">
                                <div class="card-body text-center p-0">
                                    <!-- Full Image Section -->
                                    <div class="image-container position-relative overflow-hidden rounded-4">
                                        @if ($struktur->photo)
                                            <img src="{{ asset($struktur->photo) }}" alt="Struktural KONI"
                                                class="img-fluid rounded-4 shadow-lg p-5">
                                        @else
                                            <img src="https://via.placeholder.com/300x200" alt="Struktural KONI"
                                                class="img-fluid rounded-4 shadow-lg p-5">
                                            <div class="alert alert-warning mt-3" role="alert">
                                                <strong>Warning!</strong> Foto belum diunggah.
                                            </div>
                                        @endif
                                        <div class="image-overlay top-0 start-0 w-100 h-100">
                                            <div class="text-overlay text-white position-absolute bottom-0 start-0 p-4">
                                                <h3 class="fw-bold mb-0 text-white">{{ $struktur->title }}</h3>
                                                <p class="mb-0">Periode Jabatan Tahun {{ $struktur->period }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-center">
                                    <!-- Toggle Inline Edit Form -->
                                    <button class="btn btn-warning text-white me-2 toggle-edit"
                                        data-id="{{ $struktur->id }}">
                                        <i class="mdi mdi-pencil"></i> Edit
                                    </button>

                                    <!-- Delete Button -->
                                    <form action="/delete-konistructure/{{ $struktur->id }}" method="POST"
                                        style="display: inline;" class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="mdi mdi-trash-can"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                                <!-- Inline Edit Form -->
                                <div class="edit-form-container px-5 pb-5" id="edit-form-{{ $struktur->id }}"
                                    style="display: none;">
                                    <form action="/edit-konistructure/{{ $struktur->id }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group mb-3">
                                            <label for="title-{{ $struktur->id }}">Judul</label>
                                            <input type="text" class="form-control" id="title-{{ $struktur->id }}"
                                                name="title" value="{{ $struktur->title }}" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="period-{{ $struktur->id }}">Periode</label>
                                            <input type="text" class="form-control"
                                                id="period-{{ $struktur->id }}" name="period"
                                                value="{{ $struktur->period }}" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="photo-{{ $struktur->id }}">Foto Struktural</label>
                                            <input type="file" class="form-control" id="gambar"
                                                onchange="previewImage()" name="photo">
                                            <img id="preview" src="#" alt="Preview Foto"
                                                class="img-fluid mt-3 d-none"
                                                style="max-height: 200px; border: 1px solid #ddd; padding: 5px;" />
                                            <small class="text-muted">Kosongkan jika Anda tidak ingin mengubah
                                                foto</small>
                                        </div>
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                            <button type="button" class="btn btn-secondary cancel-edit"
                                                data-id="{{ $struktur->id }}">Batal</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <div class="alert alert-warning py-5" role="alert"
                                style="font-size: 1.25rem; text-align: center; border-radius: 1rem;">
                                <i class="mdi mdi-information-outline mt-5"
                                    style="font-size: 3rem; margin-bottom: 15px;"></i>
                                <div><strong>Info!</strong> Data struktur masih kosong, silahkan segera upload.</div>
                            </div>
                        @endforelse
                    </div>
                </div>




                <!--**********************************
            Content body end
        ***********************************-->



                <!--**********************************
           Support ticket button start
        ***********************************-->

                <!--**********************************
           Support ticket button end
        ***********************************-->


            </div>
            <!--**********************************
        Main wrapper end
    ***********************************-->

            <!--**********************************
        Scripts
    ***********************************-->
            <!-- Required vendors -->
            <script src="{{ asset('gambar_aset/vendor/global/global.min.js') }}"></script>
            <script src="{{ asset('gambar_aset/js/quixnav-init.js') }}"></script>
            <script src="{{ asset('gambar_aset/js/custom.min.js') }}"></script>
            <script src="{{ asset('gambar_aset/js/imgpreview.js') }}"></script>

            <!-- Vectormap -->
            <script src="{{ asset('gambar_aset/vendor/raphael/raphael.min.js') }}"></script>
            <script src="{{ asset('gambar_aset/vendor/morris/morris.min.js') }}"></script>


            <script src="{{ asset('gambar_aset/vendor/circle-progress/circle-progress.min.js') }}"></script>
            <script src="{{ asset('gambar_aset/vendor/chart.js') }}/Chart.bundle.min.js') }}"></script>

            <script src="{{ asset('gambar_aset/vendor/gaugeJS/dist/gauge.min.js') }}"></script>

            <!--  flot-chart js -->
            <script src="{{ asset('gambar_aset/vendor/flot/jquery.flot.js') }}"></script>
            <script src="{{ asset('gambar_aset/vendor/flot/jquery.flot.resize.js') }}"></script>

            <!-- Owl Carousel -->
            <script src="{{ asset('gambar_aset/vendor/owl-carousel/js/owl.carousel.min.js') }}"></script>

            <!-- Counter Up -->
            <script src="{{ asset('gambar_aset/vendor/jqvmap/js/jquery.vmap.min.js') }}"></script>
            <script src="{{ asset('gambar_aset/vendor/jqvmap/js/jquery.vmap.usa.js') }}"></script>
            <script src="{{ asset('gambar_aset/vendor/jquery.counterup/jquery.counterup.min.js') }}"></script>


            <script src="{{ asset('gambar_aset/js/dashboard/dashboard-1.js') }}"></script>

            <script>
                $(document).on('click', '.delete-button', function(e) {
                    e.preventDefault();
                    let form = $(this).closest('form'); // Form yang menghapus struktur KONI

                    // Menampilkan SweetAlert untuk konfirmasi penghapusan
                    swal({
                        title: "Apakah Anda yakin?",
                        text: "Struktur KONI ini akan dihapus secara permanen!",
                        icon: "warning",
                        buttons: {
                            cancel: {
                                text: "Batal",
                                visible: true,
                                className: "btn btn-secondary"
                            },
                            confirm: {
                                text: "Ya, Hapus",
                                className: "btn btn-danger"
                            }
                        },
                        dangerMode: true,
                    }).then((willDelete) => {
                        if (willDelete) {
                            // Kirimkan form penghapusan menggunakan AJAX
                            $.ajax({
                                url: form.attr('action'), // Ambil URL dari form
                                method: form.attr('method'), // Gunakan metode DELETE
                                data: form.serialize(), // Serialize data form
                                success: function(response) {
                                    // Menghapus elemen struktural KONI dari tampilan
                                    form.closest('.card').fadeOut(function() {
                                        $(this).remove();
                                    });

                                    // Tampilkan notifikasi sukses
                                    swal({
                                        title: "Berhasil!",
                                        text: "Struktur KONI berhasil dihapus.",
                                        icon: "success",
                                        button: {
                                            text: "OK",
                                            className: "btn btn-primary"
                                        }
                                    });
                                }
                            });
                        }
                    });
                });
            </script>
            <!-- Script for toggling edit form -->
            <script>
                document.querySelectorAll('.toggle-edit').forEach(button => {
                    button.addEventListener('click', () => {
                        const id = button.getAttribute('data-id');
                        const form = document.getElementById(`edit-form-${id}`);
                        form.style.display = form.style.display === 'none' ? 'block' : 'none';
                    });
                });

                document.querySelectorAll('.cancel-edit').forEach(button => {
                    button.addEventListener('click', () => {
                        const id = button.getAttribute('data-id');
                        const form = document.getElementById(`edit-form-${id}`);
                        form.style.display = 'none';
                    });
                });
            </script>

</body>

</html>
