<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Dokumentasi - KONI Sukoharjo</title>
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

        .modal-header {
            background: var(--bs-primary);
            color: #fff;
            border-bottom: none;
        }

        .modal-body img,
        .modal-body video {
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
        }

        .modal-body hr {
            margin: 1.5rem 0;
        }

        .modal-footer .btn {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .custom-category-menu .nav-pills .nav-link {
            border-radius: 20px;
            /* Membuat elemen kategori lebih menarik */
            padding: 10px 15px;
            margin: 5px;
            transition: all 0.3s ease;
            color: #ea8d03;
        }

        .custom-category-menu .nav-pills .nav-link.active {
            background-color: #FF9800;
            /* Warna aktif */
            color: white;
        }

        .custom-category-menu .nav-pills .nav-link:hover {
            background-color: #ea8d03;
            color: white;
        }

        #toggleCategories {
            color: #ea8d03;
            transition: color 0.3s ease;
        }

        #toggleCategories:hover {
            color: #FF9800;
        }

        .dropdown-menu {
            border-radius: 12px;
            border: 1px solid #ddd;
        }

        .dropdown-item:hover {
            background-color: #f0f4ff;
            color: #0d6efd;
        }

        .dropdown-item i {
            font-size: 18px;
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 16px;
            }

            .hero-subtitle {
                font-size: 12px;
            }

            .custom-category-menu {
                flex-direction: column;
                align-items: stretch;
            }

            #categoryMenu {
                justify-content: center;
            }

            #toggleCategories {
                align-self: center;
            }

            .gallery-item img,
            .gallery-item video {
                max-height: 125px;
            }

            .gallery-item .card-title {
                font-size: 0.85rem;
            }

            .gallery-item .card-text {
                font-size: 0.75rem;
            }

            .gallery-item .btn {
                font-size: 0.75rem;
            }

            .timestamp {
                font-size: 10px;
            }

            .timestamp p {
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
                <dotlottie-player src="https://lottie.host/4c230ea2-f229-4f12-8999-e233fd39e994/vxPccYpbmc.lottie"
                    background="transparent" speed="1" style="width: 250px; height: 250px" loop
                    autoplay></dotlottie-player>
            </div>

            <!-- Hero Title -->
            <h1 class="hero-title text-white fst-italic mb-3" data-aos="zoom-in" data-aos-delay="200">
                #DOKUMENTASI_KONI_SKH
            </h1>

            <!-- Subtitle -->
            <p class="hero-subtitle text-white mb-4" data-aos="zoom-in" data-aos-delay="400">
                KONI Sukoharjo, wujudkan Peluang Emas untuk Para Atlet Muda Sukoharjo.
            </p>

            <!-- Button -->
            <a href="#cabor-section" class="btn btn btn-warning px-4 py-2" data-aos="zoom-in" data-aos-delay="600">
                Selengkapnya
            </a>
        </div>
    </section>

    <section class="container my-5">
        <h2 class="text-center text-uppercase mb-4 text-white">Galeri Dokumentasi</h2>

        <!-- Filter Dropdown -->
        <div class="d-flex justify-content-center mb-4">
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle px-4 py-2 rounded-pill shadow-sm" type="button"
                    id="filterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="mdi mdi-filter-variant me-2"></i>Filter: <span id="filterLabel">Semua Kategori</span>
                </button>
                <ul class="dropdown-menu dropdown-menu-lg-end p-2 shadow" aria-labelledby="filterDropdown"
                    style="min-width: 250px;">
                    <li>
                        <button class="dropdown-item filter-option active" data-value="all">
                            <i class="mdi mdi-checkbox-blank-circle-outline me-2 text-muted"></i>Semua Kategori
                        </button>
                    </li>
                    @foreach ($sportCategories as $category)
                        <li>
                            <button class="dropdown-item filter-option" data-value="{{ $category->sport_category }}">
                                <i class="mdi mdi-menu-right text-primary me-2"></i>{{ $category->sport_category }}
                            </button>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>


        <div class="row g-4" id="galleryContainer">
            @forelse ($galleries as $gallery)
                <div class="col-6 col-lg-4 col-md-6 gallery-item"
                    data-category="{{ $gallery->sportCategory->sport_category ?? 'Semua' }}">
                    <div class="card shadow-sm border-0 h-80 overflow-hidden">
                        @if ($gallery->media_type === 'photo')
                            <img src="{{ asset($gallery->media_path) }}" class="card-img-top img-fluid"
                                alt="{{ $gallery->title }}" style="object-fit: cover; height: 200px;">
                        @elseif ($gallery->media_type === 'video')
                            <video class="card-img-top" controls style="height: 200px; width: 101%; object-fit: cover;">
                                <source src="{{ asset($gallery->media_path) }}" type="video/mp4">
                                Browser Anda tidak mendukung video.
                            </video>
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold text-primary">{{ $gallery->title }}</h5>
                            <p class="card-text text-muted small">
                                <span
                                    class="badge bg-primary mb-2">{{ $gallery->sportCategory->sport_category ?? 'Semua' }}</span>
                                <br>
                                <span class="timestamp">{{ $gallery->date }} | {{ $gallery->location }}</span>
                            </p>
                            <button type="button" class="btn btn-warning btn-sm mt-auto" data-bs-toggle="modal"
                                data-bs-target="#modalDetail{{ $gallery->id }}">
                                Lihat Detail
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="modalDetail{{ $gallery->id }}" tabindex="-1"
                    aria-labelledby="modalLabel{{ $gallery->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header bg-primary text-white">
                                <h5 class="modal-title" id="modalLabel{{ $gallery->id }}">
                                    <i class="mdi mdi-image-multiple me-2"></i>{{ $gallery->title }}
                                </h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>

                            <!-- Modal Body -->
                            <div class="modal-body">
                                <!-- Media Display -->
                                @if ($gallery->media_type === 'photo')
                                    <img src="{{ asset($gallery->media_path) }}"
                                        class="img-fluid rounded w-100 mb-3 shadow" alt="{{ $gallery->title }}">
                                @elseif ($gallery->media_type === 'video')
                                    <video class="w-100 rounded shadow" controls>
                                        <source src="{{ asset($gallery->media_path) }}" type="video/mp4">
                                        Browser Anda tidak mendukung video.
                                    </video>
                                @endif

                                <!-- Details -->
                                <p class="mt-4">
                                    <span class="badge bg-primary">
                                        <i
                                            class="mdi mdi-soccer me-1"></i>{{ $gallery->sportCategory->sport_category ?? 'Semua' }}
                                    </span>
                                </p>
                                <div class="d-flex align-items-center timestamp">
                                    <p>
                                        <i class="mdi mdi-calendar me-2 text-primary"></i>
                                        <strong>Tanggal:</strong> {{ $gallery->date }}
                                    </p>
                                    <p>
                                        <i class="mdi mdi-map-marker me-2 text-primary ms-2"></i>
                                        <strong>Lokasi:</strong> {{ $gallery->location }}
                                    </p>
                                </div>
                                <hr class="my-1">
                                <p class="text-muted text-justify">{{ $gallery->description }}</p>
                            </div>

                            <!-- Modal Footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                    <i class="mdi mdi-close-circle-outline me-1"></i>Tutup
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="alert alert-warning text-center p-4">
                    <div class="d-flex justify-content-center align-items-center">
                        <i class="mdi mdi-emoticon-sad me-2 text-dark" style="font-size: 30px;"></i>
                        <span class="fs-6 text-dark">Maaf, saat ini belum ada dokumentasi yang tersedia.</span>
                    </div>
                </div>
            @endforelse
        </div>
    </section>






    @include('viewpublik/layouts/footer')
    <script src="{{ asset('gambar_aset/js/sport-category.js') }}"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script>
        document.querySelectorAll('.filter-option').forEach(option => {
            option.addEventListener('click', function() {
                const filterValue = this.dataset.value;
                const filterLabel = this.textContent.trim();

                // Update dropdown label
                document.getElementById('filterLabel').textContent = filterLabel;

                // Remove 'active' class from all options
                document.querySelectorAll('.filter-option').forEach(opt => {
                    opt.classList.remove('active');
                });

                // Add 'active' class to the selected option
                this.classList.add('active');

                // Call a function to filter content (replace with your logic)
                filterContent(filterValue);
            });
        });

        function filterContent(category) {
            const items = document.querySelectorAll('.gallery-item');
            items.forEach(item => {
                if (category === 'all' || item.dataset.category === category) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        }
    </script>

</body>

</html>
