<!-- resources/views/jkn.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JKN Web</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .header {
            background-color: White;
            padding: 20px;
            text-align: center;
            color: white;
            font-size: 24px;
            position: relative;
            border: 1px solid #dee2e6;
        }
        .header img {
            position: absolute;
            top: 15px;
            left: 15px;
            height: 40px;
        }
        .header button {
            background-color: white;
            color: #007bff;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            font-size: 16px;
            position: absolute;
            right: 15px;
            top: 15px;
        }
        .icon-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin: 20px 0;
        }
        .icon-grid .icon-card {
            width: 100px;
            text-align: center;
            margin: 15px;
        }
        .icon-grid img {
            width: 60px;
            height: 60px;
            margin-bottom: 10px;
        }
        .icon-grid span {
            display: block;
            font-size: 14px;
        }
        .locked {
            position: relative;
        }
        .locked::after {
            content: '\1F512'; /* Unicode lock emoji */
            position: absolute;
            top: -5px;
            right: -5px;
            font-size: 20px;
            color: red;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <div class="header">
        <img src="{{ asset('asset/img/jkn.png') }}" alt="JKN Logo">
        <span>Mobile JKN v4.7.0</span>
        <button>Masuk/Daftar</button>
    </div>

    <!-- Icon Grid -->
    <div class="container">
        <div class="icon-grid">
            <div class="icon-card">
                <img src="https://via.placeholder.com/60" alt="Info Program">
                <span>Info Program JKN</span>
            </div>
            <div class="icon-card">
                <img src="https://via.placeholder.com/60" alt="Info Lokasi Faskes">
                <span>Info Lokasi Faskes</span>
            </div>
            <div class="icon-card locked">
                <img src="https://via.placeholder.com/60" alt="Riwayat Pelayanan">
                <span>Riwayat Pelayanan</span>
            </div>
            <div class="icon-card locked">
                <img src="https://via.placeholder.com/60" alt="Rehab (Cicilan)">
                <span>Rehab (Cicilan)</span>
            </div>
            <div class="icon-card">
                <img src="https://via.placeholder.com/60" alt="Pendaftaran Peserta Baru">
                <span>Pendaftaran Peserta Baru</span>
            </div>
            <div class="icon-card">
                <img src="https://via.placeholder.com/60" alt="Info Peserta">
                <span>Info Peserta</span>
            </div>
            <div class="icon-card locked">
                <img src="https://via.placeholder.com/60" alt="Konsultasi Dokter">
                <span>Konsultasi Dokter</span>
            </div>
            <div class="icon-card locked">
                <img src="https://via.placeholder.com/60" alt="Pendaftaran Pelayanan">
                <span>Pendaftaran Pelayanan</span>
            </div>
            <div class="icon-card locked">
                <img src="https://via.placeholder.com/60" alt="Perubahan Data Peserta">
                <span>Perubahan Data Peserta</span>
            </div>
            <div class="icon-card locked">
                <img src="https://via.placeholder.com/60" alt="Pengaduan Layanan JKN">
                <span>Pengaduan Layanan JKN</span>
            </div>
            <div class="icon-card">
                <img src="https://via.placeholder.com/60" alt="Info Ketersediaan Tempat Tidur">
                <span>Info Ketersediaan Tempat Tidur</span>
            </div>
            <div class="icon-card">
                <img src="https://via.placeholder.com/60" alt="Menu Lainnya">
                <span>Menu Lainnya</span>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
