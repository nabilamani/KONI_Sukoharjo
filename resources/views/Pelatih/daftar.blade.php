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
                <span class="fw-bolder d-none d-md-inline"
                    style="margin-left: 10px; font-size: 18px; font-weight: 300">Sistem Kelola
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
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Pelatih</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Daftar Pelatih</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row -->
                <div class="row">
                    <!-- Basic Layout -->
                    <div class="col-12">
                        <div class="card">
                            <div id="chart" class="mt-5 mx-3"></div>
                            <hr class="mx-4">
                            <div class="card-header">
                                <h4 class="card-title">Daftar Pelatih</h4>
                                <form action="{{ route('coaches.index') }}" method="GET" class="form-inline">
                                    <input type="text" name="search" class="form-control mr-2"
                                        placeholder="Cari pelatih..." value="{{ request('search') }}">
                                    <button type="submit" class="btn btn-outline-primary">Cari</button>
                                </form>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="coachTable" class="table table-striped table-hover"
                                        style="min-width: 845px;">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Umur</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Cabang Olahraga</th>
                                                <th>Alamat</th>
                                                {{-- <th style="width: 20%">Deskripsi</th> --}}
                                                {{-- <th>Domisili</th> --}}
                                                {{-- <th>Club</th> --}}
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-dark">
                                            @php
                                                $no = ($coaches->currentPage() - 1) * $coaches->perPage() + 1;
                                            @endphp
                                            @forelse ($coaches as $key => $coach)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <!-- Increment $no to continue numbering -->
                                                    <td><img src="{{ $coach->photo }}" width="50" alt="">
                                                        {{ $coach->name }}</td>
                                                    <td>{{ $coach->age }}</td>
                                                    <td>{{ $coach->gender }}</td>
                                                    <td>{{ $coach->sportCategory->sport_category }}</td>
                                                    <td>{{ $coach->address }}</td>
                                                    {{-- <td>{{ $coach->description }}</td> --}}
                                                    <td>
                                                        <div class="dropdown">
                                                            <button
                                                                class="btn btn-outline-primary btn-sm dropdown-toggle"
                                                                type="button" data-toggle="dropdown"
                                                                aria-expanded="false">
                                                                Aksi
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href=""
                                                                    data-toggle="modal"
                                                                    data-target="#coachDetailModal{{ $coach->id }}"><i
                                                                        class="bx bx-info-circle"></i> Lihat
                                                                    Detail</a>
                                                                <a class="dropdown-item" href=""
                                                                    data-toggle="modal"
                                                                    data-target="#coachEditModal{{ $coach->id }}"><i
                                                                        class="bx bx-edit-alt"></i> Edit</a>
                                                                <!-- Delete Message Form -->
                                                                <form
                                                                    action="{{ route('coaches.destroy', $coach->id) }}"
                                                                    method="POST" class="d-inline">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="button"
                                                                        class="dropdown-item delete-button">
                                                                        <i class="bx bx-trash"></i> Hapus
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="8" class="text-center">
                                                        <div
                                                            class="d-flex justify-content-center align-items-center my-2">
                                                            <i class="mdi mdi-alert-circle-outline me-2"
                                                                style="font-size: 20px;"></i>
                                                            <span class="fs-8">Saat ini belum ada data daftar
                                                                pelatih.</span>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>

                                    </table>
                                    @foreach ($coaches as $coach)
                                        <!-- Modal -->

                                        <div class="modal fade" id="coachDetailModal{{ $coach->id }}"
                                            tabindex="-1" role="dialog"
                                            aria-labelledby="coachDetailModalLabel{{ $coach->id }}"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-primary text-white">
                                                        <h5 class="modal-title"
                                                            id="coachDetailModalLabel{{ $coach->id }}">
                                                            Detail Pelatih: {{ $coach->name }}
                                                        </h5>
                                                        <button type="button" class="close text-white"
                                                            data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <!-- Left column: Coach photo -->
                                                            <div class="col-md-4 text-center">
                                                                <img src="{{ $coach->photo ? asset($coach->photo) : 'https://via.placeholder.com/300x200' }}"
                                                                    class="img-fluid rounded shadow"
                                                                    alt="Foto Pelatih"
                                                                    style="max-height: 300px; object-fit: cover; border: 2px solid #ddd;">
                                                                <p class="mt-3 font-italic text-muted">
                                                                    <i class="mdi mdi-camera-outline text-primary"></i>
                                                                    Foto Pelatih
                                                                </p>
                                                            </div>
                                                            <!-- Right column: Coach details -->
                                                            <div class="col-md-8">
                                                                <ul class="list-group list-group-flush">
                                                                    <li class="list-group-item">
                                                                        <i
                                                                            class="mdi mdi-account-outline text-primary mr-2"></i>
                                                                        <strong>Nama:</strong> {{ $coach->name }}
                                                                    </li>
                                                                    <li class="list-group-item">
                                                                        <i class="mdi mdi-cake text-primary mr-2"></i>
                                                                        <strong>Umur:</strong> {{ $coach->age }}
                                                                    </li>
                                                                    <li class="list-group-item">
                                                                        <i
                                                                            class="mdi mdi-gender-male-female text-primary mr-2"></i>
                                                                        <strong>Gender:</strong> {{ $coach->gender }}
                                                                    </li>
                                                                    <li class="list-group-item">
                                                                        <i
                                                                            class="mdi mdi-whatsapp text-primary mr-2"></i>
                                                                        <strong>WhatsApp:</strong>
                                                                        {{ $coach->whatsapp ?: 'Belum diketahui' }}
                                                                    </li>
                                                                    <li class="list-group-item">
                                                                        <i
                                                                            class="mdi mdi-instagram text-primary mr-2"></i>
                                                                        <strong>Instagram:</strong>
                                                                        {{ $coach->instagram ?: 'Belum diketahui' }}
                                                                    </li>
                                                                    <li class="list-group-item">
                                                                        <i class="mdi mdi-home text-primary mr-2"></i>
                                                                        <strong>Alamat:</strong> {{ $coach->address }}
                                                                    </li>
                                                                    <li class="list-group-item">
                                                                        <i
                                                                            class="mdi mdi-soccer text-primary mr-2"></i>
                                                                        <strong>Cabang Olahraga:</strong>
                                                                        {{ $coach->sportCategory->sport_category }}
                                                                    </li>
                                                                    <li class="list-group-item">
                                                                        <i
                                                                            class="mdi mdi-information text-primary mr-2"></i>
                                                                        <strong>Deskripsi:</strong>
                                                                        {{ $coach->description }}
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                            <i class="mdi mdi-close-circle-outline mr-1"></i> Tutup
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="modal fade" id="coachEditModal{{ $coach->id }}"
                                            tabindex="-1" role="dialog"
                                            aria-labelledby="coachEditModalLabel{{ $coach->id }}"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-primary text-white">
                                                        <h5 class="modal-title"
                                                            id="coachEditModalLabel{{ $coach->id }}">Edit Pelatih:
                                                            {{ $coach->name }}</h5>
                                                        <button type="button" class="close text-white"
                                                            data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body p-4">
                                                        <!-- Form Edit Pelatih -->
                                                        <form action="/edit-pelatih/{{ $coach->id }}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="row">
                                                                <!-- Left column -->
                                                                <div class="col-md-6">
                                                                    <!-- Nama -->
                                                                    <div class="form-group">
                                                                        <label for="name" class="text-primary font-weight-bold">
                                                                            <i class="mdi mdi-account-outline"></i> Nama
                                                                        </label>
                                                                        <input type="text" class="form-control border-primary" id="name" name="name"
                                                                               value="{{ $coach->name }}" placeholder="Masukkan nama pelatih" required>
                                                                    </div>
                                                                    <!-- Umur -->
                                                                    <div class="form-group">
                                                                        <label for="age" class="text-primary font-weight-bold">
                                                                            <i class="mdi mdi-cake"></i> Umur
                                                                        </label>
                                                                        <input type="number" class="form-control border-primary" id="age" name="age"
                                                                               value="{{ $coach->age }}" placeholder="Masukkan umur pelatih" required>
                                                                    </div>
                                                                    <!-- Jenis Kelamin -->
                                                                    <div class="form-group">
                                                                        <label for="gender" class="text-primary font-weight-bold">
                                                                            <i class="mdi mdi-gender-male-female"></i> Jenis Kelamin
                                                                        </label>
                                                                        <select name="gender" class="form-control border-primary" required>
                                                                            <option value="Laki-laki" {{ $coach->gender == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                                                            <option value="Perempuan" {{ $coach->gender == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                                                        </select>
                                                                    </div>
                                                                    <!-- WhatsApp -->
                                                                    <div class="form-group">
                                                                        <label for="whatsapp" class="text-primary font-weight-bold">
                                                                            <i class="mdi mdi-whatsapp"></i> WhatsApp
                                                                        </label>
                                                                        <input type="text" class="form-control border-primary" id="whatsapp" name="whatsapp"
                                                                               value="{{ $coach->whatsapp }}" placeholder="Masukkan nomor WhatsApp" required>
                                                                    </div>
                                                                    <!-- Instagram -->
                                                                    <div class="form-group">
                                                                        <label for="instagram" class="text-primary font-weight-bold">
                                                                            <i class="mdi mdi-instagram"></i> Instagram
                                                                        </label>
                                                                        <input type="text" class="form-control border-primary" id="instagram" name="instagram"
                                                                               value="{{ $coach->instagram }}" placeholder="Masukkan username Instagram" required>
                                                                    </div>
                                                                </div>
                                                                <!-- Right column -->
                                                                <div class="col-md-6">
                                                                    <!-- Cabang Olahraga -->
                                                                    <div class="form-group">
                                                                        <label for="sport_category" class="text-primary font-weight-bold">
                                                                            <i class="mdi mdi-football"></i> Cabang Olahraga
                                                                        </label>
                                                                        <select class="form-control border-primary" id="sport_category" name="sport_category" required>
                                                                            <option value="" disabled>Pilih Cabang Olahraga</option>
                                                                            @foreach ($sportCategories as $category)
                                                                                <option value="{{ $category->id }}"
                                                                                    {{ $coach->sport_category == $category->id ? 'selected' : '' }}>
                                                                                    {{ $category->sport_category }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <!-- Alamat -->
                                                                    <div class="form-group">
                                                                        <label for="address" class="text-primary font-weight-bold">
                                                                            <i class="mdi mdi-home"></i> Alamat
                                                                        </label>
                                                                        <input type="text" class="form-control border-primary" id="address" name="address"
                                                                               value="{{ $coach->address }}" placeholder="Masukkan alamat" required>
                                                                    </div>
                                                                    <!-- Deskripsi -->
                                                                    <div class="form-group">
                                                                        <label for="description" class="text-primary font-weight-bold">
                                                                            <i class="mdi mdi-information"></i> Deskripsi
                                                                        </label>
                                                                        <textarea class="form-control border-primary" id="description" name="description" rows="3"
                                                                                  placeholder="Masukkan deskripsi" required>{{ $coach->description }}</textarea>
                                                                    </div>
                                                                    <!-- Foto -->
                                                                    <div class="form-group">
                                                                        <label for="photo" class="text-primary font-weight-bold">
                                                                            <i class="mdi mdi-camera-outline"></i> Foto
                                                                        </label>
                                                                        <input type="file" class="form-control-file border-primary" id="photo" name="photo"
                                                                               onchange="previewNewPhoto()">
                                                                        <div class="mt-2">
                                                                            <img id="photo-preview" src="{{ $coach->photo ? asset($coach->photo) : '#' }}"
                                                                                 class="img-fluid rounded {{ $coach->photo ? '' : 'd-none' }}" width="100"
                                                                                 alt="Foto Pelatih">
                                                                            <span id="no-photo-text" class="text-muted {{ $coach->photo ? 'd-none' : '' }}">Tidak ada Foto</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- Modal Footer -->
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                                    <i class="mdi mdi-close-circle-outline"></i> Batal
                                                                </button>
                                                                <button type="submit" class="btn btn-primary">
                                                                    <i class="mdi mdi-content-save-outline"></i> Simpan Perubahan
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>                                                    
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                    {{ $coaches->appends(request()->except('page'))->links() }}
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="/coaches/create" class="btn btn-rounded btn-primary">
                                    <i class="mdi mdi-account-plus"></i> Tambah Pelatih
                                </a>
                                <a href="{{ route('cetak-pelatih') }}" target="_blank"
                                    class="btn btn-rounded btn-primary mx-2">
                                    <i class="mdi mdi-printer"></i> Cetak Laporan
                                </a>
                            </div>
                        </div>
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
        </div>
        @include('layouts/footer')
        <!--**********************************
        Main wrapper end
    ***********************************-->
        <script src="{{ asset('gambar_aset/js/imgpreview.js') }}"></script>
        <!--**********************************
        Scripts
    ***********************************-->
        <!-- Required vendors -->
        <script src="{{ asset('gambar_aset/vendor/global/global.min.js') }}"></script>
        <script src="{{ asset('gambar_aset/js/quixnav-init.js') }}"></script>
        <script src="{{ asset('gambar_aset/js/custom.min.js') }}"></script>
        <script src="{{ asset('gambar_aset/js/sport-category.js') }}"></script>

        <!-- Vectormap -->
        <script src="{{ asset('gambar_aset/vendor/raphael/raphael.min.js') }}"></script>


        <script src="{{ asset('gambar_aset/vendor/circle-progress/circle-progress.min.js') }}"></script>

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

        <!-- Datatable -->
        <script src="{{ asset('gambar_aset/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('gambar_aset/js/plugins-init/datatables.init.js') }}"></script>
        <script>
            $(document).on('click', '.delete-button', function(e) {
                e.preventDefault();
                let form = $(this).closest('form'); // Form yang menghapus pesan
                swal({
                    title: "Apakah Anda yakin?",
                    text: "Data Pelatih ini akan dihapus secara permanen!",
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
                        form.submit(); // Kirim formulir untuk menghapus data

                        // Tampilkan notifikasi sukses setelah penghapusan
                        swal({
                            title: "Berhasil!",
                            text: "Data Pelatih berhasil dihapus.",
                            icon: "success",
                            button: {
                                text: "OK",
                                className: "btn btn-primary"
                            }
                        });
                    }
                });
            });
        </script>

        <!-- Alert -->
        @if (Session::has('message'))
            <script>
                swal("Berhasil", "{{ Session::get('message') }}", 'success', {
                    button: true,
                    button: "Ok",
                    timer: 5000
                });
            </script>
        @endif
        

        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var options = {
                    chart: {
                        type: 'bar',
                        height: 350
                    },
                    series: [{
                        name: 'Jumlah Pelatih',
                        data: @json($categories->pluck('total')) // Data jumlah pelatih per kategori
                    }],
                    xaxis: {
                        categories: @json($categories->pluck('sportCategory.sport_category')), // Nama kategori olahraga
                        labels: {
                            style: {
                                fontSize: '10px' // Ukuran font untuk label kategori
                            }
                        }
                    },
                    yaxis: {
                        title: {
                            text: 'Jumlah Pelatih', // Label pada sumbu Y
                            style: {
                                fontSize: '12px', // Ukuran font untuk label Y
                                fontWeight: 'bold'
                            }
                        },
                        labels: {
                            style: {
                                fontSize: '10px' // Ukuran font untuk angka pada sumbu Y
                            }
                        }
                    },
                    colors: ['#FFA500'],
                    title: {
                        text: 'Statistik Pelatih per Kategori Olahraga',
                        align: 'center'
                    }
                };

                var chart = new ApexCharts(document.querySelector("#chart"), options);
                chart.render();
            });
        </script>

</body>

</html>
