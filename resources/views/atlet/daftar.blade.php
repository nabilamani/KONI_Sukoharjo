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
    {{-- <link rel="stylesheet" href="https//cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css"> --}}
    <link rel="stylesheet" href="{{ asset('gambar_aset/assets/vendor/fonts/boxicons.css') }}" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>




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
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Atlet</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Daftar Atlet</a></li>
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
                                <h4 class="card-title">Daftar Atlet</h4>
                                {{-- <form action="{{ route('athletes.index') }}" method="GET" class="form-inline">
                                    <input type="text" name="search" class="form-control mr-2"
                                        placeholder="Cari atlet..." value="{{ request('search') }}">
                                    <button type="submit" class="btn btn-outline-primary">Cari</button>
                                </form> --}}
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="athleteTable" class="table table-striped table-hover shadow-sm"
                                        style="min-width: 845px;">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Atlet</th>
                                                <th>Cabang Olahraga</th>
                                                <th>Tanggal Lahir</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Berat Badan (kg)</th>
                                                <th>Tinggi Badan (cm)</th>
                                                <th>Kategori Atlet</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-dark table-striped">
                                            @php
                                                $no = 1;
                                            @endphp
                                            @foreach ($athletes as $athlete)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $athlete->name }}</td>
                                                    <td>{{ $athlete->SportCategory->sport_category }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($athlete->birth_date)->format('d-m-Y') }}
                                                    </td>
                                                    <td>{{ $athlete->gender }}</td>
                                                    <td>{{ $athlete->weight }} kg</td>
                                                    <td>{{ $athlete->height }} cm</td>
                                                    <td>{{ $athlete->athlete_type }}</td>
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
                                                                    data-target="#athleteDetailModal{{ $athlete->id }}">
                                                                    <i class="bx bx-info-circle"></i> Lihat Detail
                                                                </a>
                                                                <a class="dropdown-item" href=""
                                                                    data-toggle="modal"
                                                                    data-target="#athleteEditModal{{ $athlete->id }}">
                                                                    <i class="bx bx-edit-alt"></i> Edit
                                                                </a>
                                                                <form action="/delete-athlete/{{ $athlete->id }}"
                                                                    method="POST" class="d-inline">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="dropdown-item"
                                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus atlet ini?')">
                                                                        <i class="bx bx-trash"></i> Hapus
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <!-- Modal for Athlete Details -->
                                                <div class="modal fade" id="athleteDetailModal{{ $athlete->id }}"
                                                    tabindex="-1" role="dialog"
                                                    aria-labelledby="athleteDetailModalLabel{{ $athlete->id }}"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-lg"
                                                        role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-primary text-white">
                                                                <h5 class="modal-title d-flex align-items-center" id="athleteDetailModalLabel{{ $athlete->id }}">
                                                                    <i class="mdi mdi-account-circle-outline mr-2"></i> Detail Atlet: {{ $athlete->name }}
                                                                </h5>
                                                                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <!-- Left column: Athlete photo -->
                                                                    <div class="col-md-4 text-center">
                                                                        <img src="{{ $athlete->photo ? asset($athlete->photo) : 'https://via.placeholder.com/300x200' }}" class="img-fluid rounded shadow" alt="Foto Atlet"
                                                                            style="max-height: 300px; object-fit: cover; border: 2px solid #ddd;">
                                                                        <p class="mt-3 font-italic text-muted">
                                                                            <i class="mdi mdi-camera-outline"></i> Foto Atlet
                                                                        </p>
                                                                    </div>
                                                                    <!-- Right column: Athlete details -->
                                                                    <div class="col-md-8">
                                                                        <ul class="list-group list-group-flush">
                                                                            <li class="list-group-item">
                                                                                <i class="mdi mdi-account-outline mr-2"></i>
                                                                                <strong>Nama:</strong> {{ $athlete->name }}
                                                                            </li>
                                                                            <li class="list-group-item">
                                                                                <i class="mdi mdi-soccer mr-2"></i>
                                                                                <strong>Cabang Olahraga:</strong> {{ $athlete->SportCategory->sport_category }}
                                                                            </li>
                                                                            <li class="list-group-item">
                                                                                <i class="mdi mdi-calendar mr-2"></i>
                                                                                <strong>Tanggal Lahir:</strong> {{ \Carbon\Carbon::parse($athlete->birth_date)->format('d-m-Y') }}
                                                                            </li>
                                                                            <li class="list-group-item">
                                                                                <i class="mdi mdi-gender-male-female mr-2"></i>
                                                                                <strong>Jenis Kelamin:</strong> {{ $athlete->gender }}
                                                                            </li>
                                                                            <li class="list-group-item">
                                                                                <i class="mdi mdi-weight-kilogram mr-2"></i>
                                                                                <strong>Berat Badan:</strong> {{ $athlete->weight }} kg
                                                                            </li>
                                                                            <li class="list-group-item">
                                                                                <i class="mdi mdi-human mr-2"></i>
                                                                                <strong>Tinggi Badan:</strong> {{ $athlete->height }} cm
                                                                            </li>
                                                                            <li class="list-group-item">
                                                                                <i class="mdi mdi-information mr-2"></i>
                                                                                <strong>Kategori Atlet:</strong> {{ $athlete->athlete_type }}
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

                                                <!-- Modal for Editing Athlete -->
                                                <div class="modal fade" id="athleteEditModal{{ $athlete->id }}"
                                                    tabindex="-1" role="dialog"
                                                    aria-labelledby="athleteEditModalLabel{{ $athlete->id }}"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-lg"
                                                        role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-primary text-white">
                                                                <h5 class="modal-title"
                                                                    id="athleteEditModalLabel{{ $athlete->id }}">Edit
                                                                    Atlet: {{ $athlete->name }}</h5>
                                                                <button type="button" class="close text-white"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body p-4">
                                                                <!-- Form Edit Atlet -->
                                                                <form action="/edit-athlete/{{ $athlete->id }}" method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="row">
                                                                        <!-- Left column -->
                                                                        <div class="col-md-6">
                                                                            <!-- Nama Atlet -->
                                                                            <div class="form-group">
                                                                                <label for="name" class="text-primary font-weight-bold">
                                                                                    <i class="mdi mdi-account-outline"></i> Nama Atlet
                                                                                </label>
                                                                                <input type="text" class="form-control border-primary" id="name" name="name"
                                                                                       value="{{ $athlete->name }}" placeholder="Masukkan nama atlet" required>
                                                                            </div>
                                                                            <!-- Cabang Olahraga -->
                                                                            <div class="form-group">
                                                                                <label for="sport_category" class="text-primary font-weight-bold">
                                                                                    <i class="mdi mdi-football"></i> Cabang Olahraga
                                                                                </label>
                                                                                <select class="form-control border-primary" id="sport_category" name="sport_category" required>
                                                                                    <option value="" disabled>Pilih Cabang Olahraga</option>
                                                                                    @foreach ($sportCategories as $category)
                                                                                        <option value="{{ $category->id }}"
                                                                                            {{ $athlete->sport_category == $category->id ? 'selected' : '' }}>
                                                                                            {{ $category->sport_category }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <!-- Tanggal Lahir -->
                                                                            <div class="form-group">
                                                                                <label for="birth_date" class="text-primary font-weight-bold">
                                                                                    <i class="mdi mdi-calendar"></i> Tanggal Lahir
                                                                                </label>
                                                                                <input type="date" class="form-control border-primary" id="birth_date" name="birth_date"
                                                                                       value="{{ \Carbon\Carbon::parse($athlete->birth_date)->format('Y-m-d') }}" required>
                                                                            </div>
                                                                            <!-- Kategori Atlet -->
                                                                            <div class="form-group">
                                                                                <label for="athlete_type" class="text-primary font-weight-bold">
                                                                                    <i class="mdi mdi-trophy-outline"></i> Kategori Atlet
                                                                                </label>
                                                                                <select name="athlete_type" class="form-control border-primary" required>
                                                                                    <option value="" disabled>Pilih Tipe Atlet</option>
                                                                                    <option value="Normal" {{ $athlete->athlete_type == 'Normal' ? 'selected' : '' }}>Normal</option>
                                                                                    <option value="Disabilitas" {{ $athlete->athlete_type == 'Disabilitas' ? 'selected' : '' }}>Disabilitas</option>
                                                                                </select>
                                                                            </div>
                                                                            <!-- Prestasi -->
                                                                            <div class="form-group">
                                                                                <label for="achievements" class="text-primary font-weight-bold">
                                                                                    <i class="mdi mdi-star-outline"></i> Prestasi
                                                                                </label>
                                                                                <textarea class="form-control border-primary" id="achievements" name="achievements" rows="3"
                                                                                          placeholder="Masukkan prestasi atlet">{{ $athlete->achievements }}</textarea>
                                                                            </div>
                                                                        </div>
                                                            
                                                                        <!-- Right column -->
                                                                        <div class="col-md-6">
                                                                            <!-- Jenis Kelamin -->
                                                                            <div class="form-group">
                                                                                <label for="gender" class="text-primary font-weight-bold">
                                                                                    <i class="mdi mdi-gender-male-female"></i> Jenis Kelamin
                                                                                </label>
                                                                                <select name="gender" class="form-control border-primary" required>
                                                                                    <option value="Laki-laki" {{ $athlete->gender == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                                                                    <option value="Perempuan" {{ $athlete->gender == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                                                                </select>
                                                                            </div>
                                                                            <!-- Berat Badan -->
                                                                            <div class="form-group">
                                                                                <label for="weight" class="text-primary font-weight-bold">
                                                                                    <i class="mdi mdi-weight-kilogram"></i> Berat Badan (kg)
                                                                                </label>
                                                                                <input type="number" class="form-control border-primary" id="weight" name="weight"
                                                                                       value="{{ $athlete->weight }}" placeholder="Masukkan berat badan" required>
                                                                            </div>
                                                                            <!-- Tinggi Badan -->
                                                                            <div class="form-group">
                                                                                <label for="height" class="text-primary font-weight-bold">
                                                                                    <i class="mdi mdi-ruler"></i> Tinggi Badan (cm)
                                                                                </label>
                                                                                <input type="number" class="form-control border-primary" id="height" name="height"
                                                                                       value="{{ $athlete->height }}" placeholder="Masukkan tinggi badan" required>
                                                                            </div>
                                                                            <!-- Foto -->
                                                                            <div class="form-group">
                                                                                <label for="photo" class="text-primary font-weight-bold">
                                                                                    <i class="mdi mdi-camera-outline"></i> Foto
                                                                                </label>
                                                                                <input type="file" class="form-control-file border-primary" id="photo" name="photo">
                                                                                <div class="mt-2">
                                                                                    @if ($athlete->photo)
                                                                                        <img src="{{ asset($athlete->photo) }}" class="img-fluid rounded" width="100"
                                                                                             alt="Foto Atlet">
                                                                                    @else
                                                                                        <span class="text-muted">Tidak ada Foto</span>
                                                                                    @endif
                                                                                </div>
                                                                                <small class="text-muted">Biarkan kosong jika tidak ingin mengubah foto.</small>
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
                                        </tbody>
                                    </table>
                                    {{-- <div class="mt-4">
                                        {{ $athletes->appends(request()->except('page'))->links() }}
                                    </div> --}}
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="/athletes/create" class="btn btn-rounded btn-primary">
                                    <i class="mdi mdi-account-plus"></i> Tambah Atlet</a>
                                <a href="{{ route('cetak-athlete') }}" target="_blank"
                                    class="btn btn-rounded btn-primary mx-2">
                                    <i class="mdi mdi-printer"></i> Cetak Laporan </a>
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

        <!-- Datatable -->
        <script src="{{ asset('gambar_aset/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>

        {{-- <!-- DataTables JavaScript -->
            <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>

            <!-- DataTables Bootstrap 5 integration -->
            <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script> --}}


        <script>
            $(document).ready(function() {
                $('#athleteTable').DataTable({
                    paging: true, // Enable pagination
                    pageLength: 5, // Display 5 rows per page
                    searching: true, // Enable search
                    info: true, // Show table information
                    order: [], // No default column sorting
                    columnDefs: [{
                        orderable: false,
                        targets: 8 // Disable sorting for the "actions" column
                    }]
                });
            });
        </script>

        @if (Session::has('message'))
            <script>
                swal("Berhasil", "{{ Session::get('message') }}", 'success', {
                    button: true,
                    button: "Ok",
                    timer: 5000
                });
            </script>
        @endif

        <!-- ApexCharts -->
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var options = {
                    chart: {
                        type: 'bar',
                        height: 350
                    },
                    series: [{
                        name: 'Jumlah Atlet',
                        data: @json($categories->pluck('total')) // Data jumlah atlet per kategori
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
                            text: 'Jumlah Atlet', // Label pada sumbu Y
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
                    colors: ['#FFA500'], // Warna oranye
                    title: {
                        text: 'Statistik Atlet per Kategori Olahraga',
                        align: 'center'
                    }
                };

                var chart = new ApexCharts(document.querySelector("#chart"), options);
                chart.render();
            });
        </script>



</body>

</html>
