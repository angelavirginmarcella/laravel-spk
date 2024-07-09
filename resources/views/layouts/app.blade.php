<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            min-height: 100vh;
            margin: 0;
        }
        .sidebar {
            width: 250px;
            background: #343a40;
            color: white;
            position: fixed;
            height: 100%;
            overflow-y: auto;
        }
        .sidebar a {
            color: white;
            padding: 15px;
            text-decoration: none;
            display: block;
        }
        .sidebar a:hover {
            background: #495057;
        }
        .content {
            margin-left: 250px;
            flex: 1;
            padding: 20px;
        }
        .navbar {
            z-index: 1;
        }
        .normalisasi-table {
            width: 100%;
            margin-bottom: 20px;
            border-collapse: collapse;
        }
        .normalisasi-table th, .normalisasi-table td {
            border: 1px solid #dee2e6;
            padding: 8px;
            text-align: center;
        }
        .normalisasi-table th {
            background-color: #f8f9fa;
            color: #343a40;
        }
        .normalisasi-table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        @media (max-width: 768px) {
            .sidebar {
                position: fixed;
                width: 100%;
                height: auto;
                max-height: 100%;
                overflow-y: auto;
                display: none; /* Sembunyikan sidebar secara default */
            }
            .content {
                margin-left: 0;
                padding-top: 70px; /* Adjust this value based on your navbar height */
            }
            .sidebar.open {
                display: block; /* Tampilkan sidebar ketika kelas 'open' ditambahkan */
            }
            .toggle-btn {
                display: block;
                position: fixed;
                top: 10px;
                left: 10px;
                z-index: 999;
            }
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2 class="p-3">Menu</h2>
        <a href="{{ route('dashboard') }}">Dashboard</a>
        <a href="{{ route('pustakawan.index') }}">Pustakawan</a>
        <a href="{{ route('data_alternatif.index') }}">Data Alternatif</a>
        <a href="{{ route('topsis.index') }}">Perhitungan</a>
        <a href="{{ route('logout') }}">Logout</a>
    </div>
    <div class="content">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#">Sipustaka</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container mt-4">
            @yield('content')
        </div>
    </div>
    
    <!-- Tombol untuk membuka sidebar di perangkat mobile -->
    <button class="toggle-btn navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target=".sidebar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
        // Script untuk mengatur toggling sidebar di perangkat mobile
        $(document).ready(function() {
            $('.toggle-btn').click(function() {
                $('.sidebar').toggleClass('open');
            });
        });
    </script>
</body>
</html>
