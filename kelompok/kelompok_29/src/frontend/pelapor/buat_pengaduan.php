<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Pengaduan Baru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
        .form-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: white;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-label {
            font-weight: 500;
            margin-bottom: 5px;
            display: block;
        }
        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 6px;
            font-size: 1rem;
        }
        .form-control:focus {
            outline: none;
            border-color: #1a73e8;
            box-shadow: 0 0 0 3px rgba(26, 115, 232, 0.1);
        }
        .upload-area {
            border: 2px dashed #ced4da;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            cursor: pointer;
            transition: background-color 0.2s;
        }
        .upload-area:hover {
            background-color: #f8f9fa;
        }
        .upload-icon {
            font-size: 2rem;
            color: #666;
            margin-bottom: 10px;
        }
        .upload-text {
            color: #666;
            font-size: 0.9rem;
        }
        .location-map {
            border: 1px solid #ced4da;
            border-radius: 6px;
            padding: 15px;
            text-align: center;
            background-color: #f8f9fa;
            cursor: pointer;
            margin-top: 10px;
        }
        .location-map i {
            font-size: 1.5rem;
            color: #666;
            margin-bottom: 5px;
            display: block;
        }
        .location-map p {
            margin: 5px 0 0 0;
            color: #666;
            font-size: 0.9rem;
        }
        .use-current-location {
            color: #1a73e8;
            font-size: 0.85rem;
            text-decoration: underline;
            cursor: pointer;
            margin-top: 5px;
            display: inline-block;
        }
        .btn-container {
            display: flex;
            gap: 10px;
            margin-top: 20px;
            justify-content: space-between;
        }
        .btn-secondary {
            background-color: #6c757d;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            font-weight: 500;
            width: 48%;
            text-align: center;
        }
        .btn-primary {
            background-color: #1a73e8;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            font-weight: 500;
            width: 48%;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }
        .required {
            color: red;
        }
        @media (max-width: 768px) {
            .form-container {
                margin: 0 10px;
            }
            .btn-container {
                flex-direction: column;
            }
            .btn-secondary, .btn-primary {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <!-- Cek Login -->
    <script>
        if (!localStorage.getItem('currentUser')) {
            alert('Anda harus login terlebih dahulu.');
            window.location.href = 'dashboard_pelapor.php';
        }
    </script>

    <div class="page-header">
        <div class="back-arrow" onclick="window.history.back();">
            <i class="fas fa-arrow-left"></i>
        </div>
        <h1>Buat Pengaduan Baru</h1>
    </div>

    <div class="form-container">
        <div class="form-group">
            <label class="form-label">Foto Bukti <span class="required">*</span></label>
            <div class="upload-area" id="uploadArea">
                <div class="upload-icon"><i class="fas fa-upload"></i></div>
                <div class="upload-text">Klik untuk upload foto<br>(JPG, PNG, Max 2MB)</div>
                <input type="file" id="photoInput" accept="image/jpeg,image/png" style="display:none;">
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">Kategori <span class="required">*</span></label>
            <select class="form-control" id="categorySelect">
                <option value="">Pilih kategori pengaduan</option>
                <option value="jalan">Jalan Berlubang</option>
                <option value="air">Saluran Air Tersumbat</option>
                <option value="listrik">Gangguan Listrik</option>
                <option value="sampah">Penumpukan Sampah</option>
            </select>
        </div>

        <div class="form-group">
            <label class="form-label">Deskripsi Masalah <span class="required">*</span></label>
            <textarea class="form-control" id="descriptionTextarea" rows="4" placeholder="Jelaskan kondisi infrastruktur yang perlu diperbaiki..."></textarea>
            <div style="font-size: 0.85rem; color: #666; margin-top: 5px;">Minimal 20 karakter</div>
        </div>

        <div class="form-group">
            <label class="form-label">Lokasi (Opsional)</label>
            <div style="font-size: 0.85rem; color: #666; margin-bottom: 5px;">Tandai lokasi pada peta atau masukkan alamat</div>
            <input type="text" class="form-control" id="addressInput" placeholder="Masukkan alamat lengkap">
            <div class="location-map" id="mapArea">
                <i class="fas fa-map-marker-alt"></i>
                <p>Klik untuk memilih lokasi pada peta</p>
            </div>
            <div class="use-current-location" id="useLocation">Gunakan Lokasi Saya</div>
        </div>

        <div class="btn-container">
            <button class="btn btn-secondary" onclick="if(confirm('Batalkan pembuatan pengaduan?')) window.history.back();">Batal</button>
            <button class="btn btn-primary" id="submitBtn">
                <i class="fas fa-paper-plane"></i> Kirim Pengaduan
            </button>
        </div>
    </div>

    <script>
        // Upload photo
        document.getElementById('uploadArea').addEventListener('click', function() {
            document.getElementById('photoInput').click();
        });

        document.getElementById('photoInput').addEventListener('change', function(e) {
            if (e.target.files.length > 0) {
                const file = e.target.files[0];
                if (file.size > 2 * 1024 * 1024) {
                    alert('Ukuran file maksimal 2MB');
                    this.value = '';
                    return;
                }
                document.querySelector('.upload-text').textContent = file.name;
            }
        });

        // Geolocation
        document.getElementById('useLocation').addEventListener('click', function() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    const lat = position.coords.latitude;
                    const lng = position.coords.longitude;
                    // Simulasi ambil alamat dari koordinat (untuk demo, kita gunakan placeholder)
                    document.getElementById('addressInput').value = `Latitude: ${lat}, Longitude: ${lng}`;
                    document.querySelector('.location-map p').textContent = `Lokasi: ${lat.toFixed(6)}, ${lng.toFixed(6)}`;
                }, function(error) {
                    alert('Gagal mendapatkan lokasi: ' + error.message);
                });
            } else {
                alert('Geolocation tidak didukung oleh browser ini.');
            }
        });

        // Submit
        document.getElementById('submitBtn').addEventListener('click', function() {
            const category = document.getElementById('categorySelect').value;
            const description = document.getElementById('descriptionTextarea').value.trim();
            const address = document.getElementById('addressInput').value.trim();

            if (!category || !description || description.length < 20) {
                alert('Harap isi semua field wajib dan deskripsi minimal 20 karakter.');
                return;
            }

            const now = new Date();
            const dateStr = now.toISOString().split('T')[0];
            const randomId = Math.floor(1000 + Math.random() * 9000);
            const ticketId = `#TKT-${randomId}`;

            const complaint = {
                id: ticketId,
                category: category,
                description: description,
                address: address || 'Alamat tidak ditentukan',
                date: dateStr,
                status: 'Diajukan',
                photo: 'https://via.placeholder.com/80/ddd/333?text=Tiket'
            };

            let complaints = JSON.parse(localStorage.getItem('complaints')) || [];
            complaints.push(complaint);
            localStorage.setItem('complaints', JSON.stringify(complaints));

            alert('Pengaduan berhasil dikirim!');
            window.location.href = 'dashboard_pelapor.php';
        });
    </script>
</body>
</html>