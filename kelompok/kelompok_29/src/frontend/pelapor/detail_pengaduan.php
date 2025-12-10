<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pengaduan</title>
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
        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
            position: sticky;
            top: 0;
            background-color: white;
            padding: 15px 0;
            z-index: 1000;
        }
        .page-header .back-arrow {
            color: #666;
            font-size: 1.2rem;
            margin-right: 10px;
            cursor: pointer;
        }
        .page-header h1 {
            margin: 0;
            font-size: 1.5rem;
            font-weight: bold;
        }
        .ticket-id {
            font-size: 0.9rem;
            color: #666;
            margin: 5px 0 0 0;
        }
        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
            border: 1px solid transparent;
        }
        .status-diajukan {
            background-color: #dbeafe;
            color: #2563eb;
            border-color: #93c5fd;
        }
        .status-diverifikasi {
            background-color: #ede9fe;
            color: #7c3aed;
            border-color: #c4b5fd;
        }
        .status-ditugaskan {
            background-color: #fef3c7;
            color: #f59e0b;
            border-color: #fcd34d;
        }
        .status-proses {
            background-color: #fef3c7;
            color: #f59e0b;
            border-color: #fcd34d;
        }
        .status-menunggu {
            background-color: #fef2f2;
            color: #dc2626;
            border-color: #fecaca;
        }
        .status-selesai {
            background-color: #dcfce7;
            color: #16a34a;
            border-color: #86efac;
        }
        .card {
            background-color: white;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
        .card-title {
            font-weight: 500;
            margin-bottom: 15px;
            color: #333;
        }
        .note-box {
            background-color: #dbeafe;
            border: 1px solid #93c5fd;
            border-radius: 6px;
            padding: 15px;
            margin-bottom: 20px;
        }
        .note-box i {
            color: #2563eb;
            margin-right: 10px;
        }
        .timeline {
            position: relative;
            padding-left: 30px;
            margin: 20px 0;
        }
        .timeline::before {
            content: '';
            position: absolute;
            left: 10px;
            top: 0;
            bottom: 0;
            width: 2px;
            background-color: #dee2e6;
        }
        .timeline-item {
            position: relative;
            margin-bottom: 20px;
        }
        .timeline-step {
            position: absolute;
            left: -25px;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 0.9rem;
            font-weight: bold;
            border: 2px solid white;
        }
        .timeline-step.diajukan {
            background-color: #3882f6;
        }
        .timeline-step.diverifikasi {
            background-color: #6366f1;
        }
        .timeline-step.ditugaskan {
            background-color: #f59e0b;
        }
        .timeline-step.proses {
            background-color: #facc15;
        }
        .timeline-step.menunggu {
            background-color: #fb923c;
        }
        .timeline-step.selesai {
            background-color: #22c55e;
        }
        .timeline-icon {
            position: absolute;
            left: -25px;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 0.9rem;
        }
        .timeline-icon.diajukan {
            background-color: #3882f6;
        }
        .timeline-icon.diverifikasi {
            background-color: #6366f1;
        }
        .timeline-icon.ditugaskan {
            background-color: #f59e0b;
        }
        .timeline-icon.proses {
            background-color: #facc15;
        }
        .timeline-icon.menunggu {
            background-color: #fb923c;
        }
        .timeline-icon.selesai {
            background-color: #22c55e;
        }
        .timeline-content {
            padding-left: 10px;
        }
        .timeline-date {
            font-size: 0.85rem;
            color: #666;
            margin: 5px 0 0 0;
        }
        .img-fluid {
            width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 15px;
        }
        .location-box {
            background-color: #f8f9fa;
            border: 1px dashed #ced4da;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            margin-top: 15px;
        }
        .location-box i {
            font-size: 2rem;
            color: #666;
            margin-bottom: 10px;
        }
        .location-box p {
            margin: 5px 0 0 0;
            color: #666;
            font-size: 0.9rem;
        }
        .btn-secondary {
            background-color: #6c757d;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            font-weight: 500;
            width: 100%;
            max-width: 150px;
            text-align: center;
        }
        .btn-container {
            display: flex;
            gap: 10px;
            margin-top: 20px;
            justify-content: flex-end;
        }
        @media (max-width: 768px) {
            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }
            .timeline {
                padding-left: 20px;
            }
            .timeline-step, .timeline-icon {
                left: -20px;
                width: 25px;
                height: 25px;
                font-size: 0.8rem;
            }
        }
    </style>
</head>
<body>
    <!-- Page Header -->
    <div class="page-header">
        <div class="back-arrow" onclick="window.history.back();">
            <i class="fas fa-arrow-left"></i>
        </div>
        <div>
            <h1>Detail Pengaduan</h1>
            <div class="ticket-id" id="ticket-id">#TKT-001</div>
        </div>
        <button class="status-badge status-proses">Dalam Proses</button>
    </div>

    <!-- Catatan Admin -->
    <div class="card">
        <h5 class="card-title">Catatan</h5>
        <div class="note-box">
            <i class="fas fa-user-tie"></i>
            <strong>Admin</strong><br>
            Sudah diverifikasi, segera ditindaklanjuti
        </div>
    </div>

    <!-- Timeline Progress -->
    <div class="card">
        <h5 class="card-title">Timeline Progress</h5>
        <div class="timeline">
            <div class="timeline-item">
                <div class="timeline-step diajukan">1</div>
                <div class="timeline-icon diajukan"><i class="fas fa-paper-plane"></i></div>
                <div class="timeline-content">
                    <div><strong>Diajukan</strong> oleh Aulia</div>
                    <div class="timeline-date">2025-12-05 10:30</div>
                </div>
            </div>
            <div class="timeline-item">
                <div class="timeline-step diverifikasi">2</div>
                <div class="timeline-icon diverifikasi"><i class="fas fa-check-circle"></i></div>
                <div class="timeline-content">
                    <div><strong>Diverifikasi Admin</strong> oleh Admin System</div>
                    <div class="timeline-date">2025-12-05 11:15</div>
                </div>
            </div>
            <div class="timeline-item">
                <div class="timeline-step ditugaskan">3</div>
                <div class="timeline-icon ditugaskan"><i class="fas fa-users"></i></div>
                <div class="timeline-content">
                    <div><strong>Ditugaskan ke Petugas</strong> oleh Admin System</div>
                    <div class="timeline-date">2025-12-05 11:30</div>
                </div>
            </div>
            <div class="timeline-item">
                <div class="timeline-step proses">4</div>
                <div class="timeline-icon proses"><i class="fas fa-wrench"></i></div>
                <div class="timeline-content">
                    <div><strong>Dalam Proses</strong> oleh Budi Santoso</div>
                    <div class="timeline-date">2025-12-05 12:00</div>
                </div>
            </div>
            <div class="timeline-item">
                <div class="timeline-step menunggu">5</div>
                <div class="timeline-icon menunggu"><i class="fas fa-clock"></i></div>
                <div class="timeline-content">
                    <div><strong>Menunggu Validasi Admin</strong></div>
                    <div class="timeline-date">Belum dilakukan</div>
                </div>
            </div>
            <div class="timeline-item">
                <div class="timeline-step selesai">6</div>
                <div class="timeline-icon selesai"><i class="fas fa-check"></i></div>
                <div class="timeline-content">
                    <div><strong>Selesai</strong></div>
                    <div class="timeline-date">Belum dilakukan</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Gambar Pengaduan -->
    <div class="card">
        <img src="https://via.placeholder.com/800x400/ddd/333?text=Foto+Pengaduan" alt="Foto Pengaduan" class="img-fluid">
    </div>

    <!-- Detail Pengaduan -->
    <div class="card">
        <h5 class="card-title">Jalan Berlubang di Jl. Sudirman</h5>
        <div class="timeline-date">
            <i class="far fa-calendar-alt"></i> 2025-12-05 &nbsp; 
            <i class="fas fa-road"></i> Jalan Raya
        </div>
        <hr>
        <div>
            <strong>Deskripsi:</strong><br>
            Terdapat lubang besar di tengah jalan yang sangat berbahaya bagi pengendara motor. Lubang berdiameter sekitar 50cm dan kedalaman 15cm.
        </div>
        <hr>
        <div>
            <strong><i class="fas fa-map-marker-alt"></i> Lokasi:</strong><br>
            Jl. Sudirman No. 45, Jakarta Pusat
        </div>
    </div>

    <!-- Peta Lokasi -->
    <div class="card">
        <h5 class="card-title">Peta Lokasi</h5>
        <div class="location-box">
            <i class="fas fa-map-marker-alt"></i>
            <p>Jl. Sudirman No. 45, Jakarta Pusat</p>
        </div>
    </div>

    <!-- Petugas yang Menangani -->
    <div class="card">
        <h5 class="card-title">Petugas yang Menangani</h5>
        <div style="display: flex; align-items: center; gap: 10px;">
            <div style="width: 40px; height: 40px; background-color: #dbeafe; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #2563eb;">
                <i class="fas fa-user-tie"></i>
            </div>
            <div>
                <div><strong>Budi Santoso</strong></div>
                <div style="color: #666; font-size: 0.9rem;">Petugas Lapangan</div>
            </div>
        </div>
    </div>

    <!-- Buttons -->
    <div class="btn-container">
        <button class="btn btn-secondary" onclick="window.history.back();">Kembali</button>
    </div>

    <script>
        // Ambil ID tiket dari URL
        const urlParams = new URLSearchParams(window.location.search);
        const ticketId = urlParams.get('id') || 'TKT-001';
        document.getElementById('ticket-id').textContent = '#' + ticketId;

        // Ambil data dari localStorage berdasarkan ID
        const complaints = JSON.parse(localStorage.getItem('complaints')) || [];
        const complaint = complaints.find(c => c.id === '#' + ticketId);

        if (complaint) {
            // Update gambar
            document.querySelector('.img-fluid').src = complaint.photo;

            // Update judul
            document.querySelector('.card-title').textContent = complaint.description;

            // Update tanggal & jenis jalan
            document.querySelector('.timeline-date').innerHTML = `<i class="far fa-calendar-alt"></i> ${complaint.date} &nbsp; <i class="fas fa-road"></i> Jalan Raya`;

            // Update deskripsi
            document.querySelector('div strong + br').nextSibling.textContent = complaint.description;

            // Update lokasi
            document.querySelector('.location-box p').textContent = complaint.address;

            // Update status badge
            let statusClass = 'status-diajukan';
            if (complaint.status === 'Dalam Proses') statusClass = 'status-proses';
            else if (complaint.status === 'Selesai') statusClass = 'status-selesai';
            document.querySelector('.status-badge').className = `status-badge ${statusClass}`;
            document.querySelector('.status-badge').textContent = complaint.status;
        }
    </script>
</body>
</html>