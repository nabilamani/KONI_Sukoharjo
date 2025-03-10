<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Latihan - KONI Sukoharjo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('gambar_aset/images/koni.png') }}">
    <link rel="stylesheet" href="{{ asset('gambar_aset/vendor/owl-carousel/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('gambar_aset/vendor/owl-carousel/css/owl.theme.default.min.css') }}">
    <link href="{{ asset('gambar_aset/vendor/jqvmap/css/jqvmap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('gambar_aset/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('gambar_aset/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('gambar_aset/assets/vendor/fonts/boxicons.css') }}" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <!-- FullCalendar CSS -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.css" rel="stylesheet">

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
            text-align: center;
            background: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(5px);
            padding: 50px;
            border-radius: 10px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .hero-overlay:hover {
            transform: scale(1.05);
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 20px;
            }

            .hero-subtitle {
                font-size: 12px;
            }

            #table-view table th,
            #table-view table td {
                font-size: 12px;
                padding: 5px;
            }
        }
    </style>
</head>

<body>
    @include('viewpublik/layouts/navbar')

    <section class="hero-section">
        <div class="hero-overlay mt-5">
            <h1 class="hero-title text-white fst-italic">#LATIHAN_KONI_SKH</h1>
            <p class="hero-subtitle">KONI Sukoharjo, wujudkan olahraga yang berprestasi dan menjunjung tinggi
                sportivitas.</p>
            <a href="#" class="btn btn-warning">Selengkapnya</a>
        </div>
    </section>

    <!-- schedule List Section -->
    <section class="container my-5">
        <h2 class="text-center mb-4 text-white">Daftar Jadwal Latihan</h2>
        <div class="d-flex justify-content-between align-items-end mb-4">
            <!-- Tombol untuk mengganti tampilan -->
            <div>
                {{-- <button id="card-view-btn" class="btn btn-primary active">Card View</button> --}}
                <button id="table-view-btn" class="btn btn-secondary">Table View</button>
            </div>
    
            <!-- Form Pencarian -->
            <form action="{{ route('showlatihan') }}" method="GET" class="d-flex justify-content-end align-items-end">
                <div class="col-md-4">
                    <input type="text" name="search" class="form-control me-2 d-none d-md-inline"
                        placeholder="Cari jadwal atau lokasi..." value="{{ request('search') }}">
                </div>
                <div class="col-6 col-md-3">
                    <label>Mulai dari</label>
                    <input type="date" name="start_date" class="form-control" value="{{ request('start_date') }}">
                </div>
                <div class="col-6 col-md-3">
                    <label>Hingga</label>
                    <input type="date" name="end_date" class="form-control" value="{{ request('end_date') }}">
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">
                        <i class="mdi mdi-filter-outline"></i>
                        <span class="d-none d-md-inline">Cari</span>
                    </button>
                </div>
            </form>
        </div>
    
        <!-- Tabel Jadwal Latihan -->
        <div id="table-view" class="table-responsive rounded">
            <table class="table table-striped" style="min-width: 845px;">
                <thead>
                    <tr>
                        <th>Kebutuhan Latihan</th>
                        <th>Tanggal</th>
                        <th>Waktu Latihan</th>
                        <th>Cabang Olahraga</th>
                        <th>Lokasi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($schedules as $schedule)
                        <tr>
                            <td>{{ $schedule->name }}</td>
                            <td>{{ \Carbon\Carbon::parse($schedule->date)->format('d M Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($schedule->time)->format('H:i') }}</td>
                            <td>{{ $schedule->sportCategory->sport_category ?? ($schedule->sport_category === null ? 'Semua' : 'Kategori Tidak Ditemukan') }}</td>
                            <td>{{ $schedule->venue_name }}</td>
                            <td>
                                @if ($schedule->venue_map)
                                    <button class="btn btn-sm btn-outline-info" data-bs-toggle="modal"
                                        data-bs-target="#viewMapModal{{ $schedule->id }}">
                                        <i class="mdi mdi-map-marker"></i> Lihat Peta
                                    </button>
                                @else
                                    <span>No Map</span>
                                @endif
                            </td>
                        </tr>
    
                        <!-- Modal for Viewing Map -->
                        <div class="modal fade" id="viewMapModal{{ $schedule->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="viewMapModalLabel{{ $schedule->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-info text-white">
                                        <h5 class="modal-title" id="viewMapModalLabel{{ $schedule->id }}">
                                            Peta Lokasi : {{ $schedule->name }}</h5>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        @if ($schedule->venue_map)
                                            <iframe src="{{ $schedule->venue_map }}" width="100%" height="400"
                                                style="border: 0;" allowfullscreen="" loading="lazy"></iframe>
                                        @else
                                            <p>Tidak ada peta lokasi yang tersedia.</p>
                                        @endif
                                    </div>
                                    <div class="modal-footer py-3">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">
                                <div class="d-flex justify-content-center align-items-center my-2">
                                    <i class="mdi mdi-alert-circle-outline me-2" style="font-size: 20px;"></i>
                                    <span class="fs-8">Tidak ada jadwal latihan yang tersedia saat ini.</span>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    
        <!-- Pagination (if applicable) -->
        {{ $schedules->links('layouts.pagination') }}
    </section>
    

    @include('viewpublik/layouts/footer')
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <!-- FullCalendar JS -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/locales/id.js"></script>

</body>

</html>
