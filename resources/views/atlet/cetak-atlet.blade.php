<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Daftar Atlet</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }
        .header {
            display: flex;
            align-items: center;
            padding: 10px;
            border-bottom: 4px solid #000000; /* Garis tebal di bawah header */
        }
        .header img {
            width: 100px; /* Sesuaikan ukuran logo */
            height: auto;
            margin-right: 20px; /* Jarak antara logo dan teks */
        }
        .header .header-info {
            text-align: center;
        }
        .header .header-info h1 {
            margin: 5px 0;
            font-size: 24px;
        }
        .header .header-info p {
            margin: 5px 0;
            font-size: 14px;
        }
        .content {
            padding: 20px;
            margin-top: -30px;
        }
        h2 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 0.9em;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .footer {
            background-color: #4CAF50;
            color: white;
            text-align: center;
            padding: 10px 0;
            position: relative;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <!-- Header -->
    {{-- <div class="header">
        <img src="{{ asset('gambar_aset/images/koni.png') }}" alt="Logo KONI Sukoharjo"> <!-- Ganti dengan path logo yang sesuai -->
        <div class="header-info">
            <h1>Komite Olahraga Nasional Indonesia (KONI)</h1>
            <p>Sukoharjo</p>
            <p>Alamat: Jl. Contoh Alamat No. 123, Sukoharjo, Indonesia</p>
            <p>Telepon: (0271) 1234567 | Email: info@koni-sukoharjo.org</p>
        </div>
    </div> --}}
    <table style="width: 100%; border-bottom: 4px solid #000000;">
        <tr>
            <td style="width: 15%; border: none;">
                <img src="{{ asset('gambar_aset/images/koni.png') }}" alt="Logo KONI Sukoharjo" style="width: 100px; height: auto;"> <!-- Adjust size as needed -->
            </td>
            <td style="text-align: center; border: none;">
                <h2 style="margin: 0;">Komite Olahraga Nasional Indonesia (KONI)</h2>
                <p style="margin: 0;">Sukoharjo</p>
                <p style="margin: 0;">Alamat: Jl. Contoh Alamat No. 123, Sukoharjo, Indonesia</p>
                <p style="margin: 0;">Telepon: (0271) 1234567 | Email: info@koni-sukoharjo.org</p>
            </td>
            <td style="width: 15%; border: none;">
            </td>
        </tr>
    </table>

    <!-- Main Content -->
    <div class="content">
        <h2>Laporan Daftar Atlet</h2>
        <p style="text-align: center; font-size:14px;">Tanggal: {{ \Carbon\Carbon::now()->format('d-m-Y') }}</p>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Berat (kg)</th>
                    <th>Tinggi (cm)</th>
                    <th>Cabang Olahraga</th>
                    <th>Kategori</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($athletes as $index => $athlete)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $athlete->name }}</td>
                        <td>{{ $athlete->birth_date }}</td>
                        <td>{{ $athlete->gender }}</td>
                        <td>{{ $athlete->weight }}</td>
                        <td>{{ $athlete->height }}</td>
                        <td>{{ $athlete->SportCategory->sport_category }}</td>
                        <td>{{ $athlete->athlete_type }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; 2024 KONI Sukoharjo. All rights reserved.</p>
    </div>

    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>
