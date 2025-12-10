<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pelapor</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 20px;
        }
        .header {
            background-color: #1a73e8;
            color: white;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-radius: 0 0 8px 8px;
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        .header .user-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .header .greeting {
            font-size: 0.9rem;
            opacity: 0.9;
        }
        .header h1 {
            margin: 0;
            font-size: 1.2rem;
            font-weight: bold;
        }
        .header .icons {
            display: flex;
            gap: 15px;
            align-items: center;
        }
        .header .icon-link {
            color: white;
            font-size: 1.2rem;
            text-decoration: none;
            padding: 5px;
            border-radius: 50%;
            transition: background-color 0.2s;
        }
        .header .icon-link:hover {
            background-color: rgba(255,255,255,0.1);
        }
        .container-fluid {
            max-width: 800px;
            margin: 20px auto;
        }
        .btn-primary {
            background-color: #1a73e8;
            border: none;
            padding: 10px 20px;
            font-weight: bold;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            width: 100%;
            margin-bottom: 20px;
        }
        .stats-container {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }
        .stat-card {
            background-color: white;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 15px;
            text-align: center;
            flex: 1;
            min-width: 120px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
        .stat-card h3 {
            margin: 0;
            font-size: 1.3rem;
            color: #333;
        }
        .stat-card p {
            margin: 5px 0 0 0;
            font-size: 0.85rem;
            color: #666;
        }
        .section-title {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 20px 0 15px;
            font-weight: bold;
            color: #333;
            font-size: 1rem;
        }
        .section-title a {
            color: #1a73e8;
            text-decoration: none;
            font-size: 0.9rem;
        }
        .complaint-card {
            background-color: white;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            display: flex;
            gap: 15px;
            align-items: flex-start;
        }
        .complaint-image {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
        }
        .complaint-details {
            flex: 1;
        }
        .complaint-id {
            font-weight: bold;
            color: #333;
            margin: 0 0 5px 0;
            font-size: 0.9rem;
        }
        .complaint-location {
            color: #666;
            font-size: 0.85rem;
            margin: 5px 0;
            display: flex;
            align-items: center;
            gap: 5px;
        }
        .complaint-date {
            color: #666;
            font-size: 0.85rem;
            display: flex;
            align-items: center;
            gap: 5px;
            margin-top: 5px;
        }
        .status-badge {
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: bold;
            border: 1px solid transparent;
        }
        .status-diajukan {
            background-color: #e3f2fd;
            color: #1976d2;
            border-color: #bbdefb;
        }
        .status-proses {
            background-color: #fef3c7;
            color: #f59e0b;
            border-color: #fcd34d;
        }
        .status-selesai {
            background-color: #dcfce7;
            color: #16a34a;
            border-color: #86efac;
        }
        .icon {
            font-size: 0.8rem;
            margin-right: 5px;
        }
        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                text-align: center;
                gap: 10px;
            }
            .header .icons {
                margin-top: 10px;
            }
            .complaint-card {
                flex-direction: column;
            }
            .complaint-image {
                width: 100%;
                height: auto;
                max-height: 100px;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <div class="user-info">
            <div>
                <div class="greeting">Selamat Datang,</div>
                <h1 id="username-display">Loading...</h1>
            </div>
        </div>
        <div class="icons">
            <a href="profil.php" class="icon-link" title="Profil"><i class="fas fa-user-circle"></i></a>
            <a href="logout.php" class="icon-link" title="Logout"><i class="fas fa-sign-out-alt"></i></a>
        </div>
    </div>

    <!-- Container Utama -->
    <div class="container-fluid">

        <!-- Buat Pengaduan Baru Button -->
        <button class="btn btn-primary" onclick="window.location.href='buat_pengaduan.php'">
            <i class="fas fa-plus"></i> Buat Pengaduan Baru
        </button>

        <!-- Stats Cards -->
        <div class="stats-container">
            <div class="stat-card">
                <h3 id="total-count">0</h3>
                <p>Total</p>
            </div>
            <div class="stat-card">
                <h3 id="proses-count">0</h3>
                <p>Diproses</p>
            </div>
            <div class="stat-card">
                <h3 id="selesai-count">0</h3>
                <p>Selesai</p>
            </div>
        </div>

        <!-- Pengaduan Terbaru Section -->
        <div class="section-title">
            <span>Pengaduan Terbaru</span>
            <a href="#" id="viewAllLink"><i class="fas fa-eye me-1"></i>Lihat Semua</a>
        </div>

        <!-- Complaint Cards Container -->
        <div id="complaintsContainer">
            <!-- Akan diisi oleh JavaScript -->
        </div>

    </div>

    <script>
        // Inisialisasi user
        function initializeUser() {
            if (!localStorage.getItem('currentUser')) {
                localStorage.setItem('currentUser', 'Aulia'); // Nama sesuai permintaan
            }
            const username = localStorage.getItem('currentUser');
            document.getElementById('username-display').textContent = username;
        }

        // Muat data pengaduan
        function loadComplaints() {
            const complaints = JSON.parse(localStorage.getItem('complaints')) || [];
            const container = document.getElementById('complaintsContainer');
            container.innerHTML = '';

            // Update statistik
            const total = complaints.length;
            const proses = complaints.filter(c => c.status === 'Dalam Proses').length;
            const selesai = complaints.filter(c => c.status === 'Selesai').length;

            document.getElementById('total-count').textContent = total;
            document.getElementById('proses-count').textContent = proses;
            document.getElementById('selesai-count').textContent = selesai;

            if (complaints.length === 0) {
                container.innerHTML = `
                    <div class="text-center p-4 text-muted">
                        Belum ada pengaduan. Buat pengaduan pertama Anda!
                    </div>
                `;
                return;
            }

            // Urutkan terbaru di atas
            complaints.sort((a, b) => new Date(b.date) - new Date(a.date));

            complaints.forEach(complaint => {
                let statusClass = 'status-diajukan';
                if (complaint.status === 'Dalam Proses') statusClass = 'status-proses';
                else if (complaint.status === 'Selesai') statusClass = 'status-selesai';

                const card = document.createElement('div');
                card.className = 'complaint-card';
                card.innerHTML = `
                    <img src="${complaint.photo}" alt="Pengaduan" class="complaint-image">
                    <div class="complaint-details">
                        <div class="complaint-id">
                            <a href="detail_pengaduan.php?id=${complaint.id.substring(1)}" style="color: inherit; text-decoration: none;">
                                ${complaint.id}
                            </a>
                        </div>
                        <div>
                            <a href="detail_pengaduan.php?id=${complaint.id.substring(1)}" style="color: inherit; text-decoration: none;">
                                ${complaint.description}
                            </a>
                        </div>
                        <div class="complaint-location">
                            <i class="fas fa-map-marker-alt icon"></i>
                            ${complaint.address}
                        </div>
                        <div class="complaint-date">
                            <i class="far fa-calendar-alt icon"></i>
                            ${complaint.date}
                        </div>
                    </div>
                    <span class="status-badge ${statusClass}">${complaint.status}</span>
                `;
                container.appendChild(card);
            });
        }

        // Jalankan saat halaman dimuat
        document.addEventListener('DOMContentLoaded', function() {
            initializeUser();
            loadComplaints();
        });

        // Refresh saat kembali dari halaman lain
        window.addEventListener('pageshow', loadComplaints);

        // Lihat semua (placeholder)
        document.getElementById('viewAllLink').addEventListener('click', function(e) {
            e.preventDefault();
            alert('Fitur "Lihat Semua" belum dikembangkan.');
        });
    </script>
</body>
</html>