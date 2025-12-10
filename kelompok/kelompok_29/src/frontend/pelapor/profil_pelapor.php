<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil</title>
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
        }
        .page-header p {
            margin: 5px 0 0 0;
            color: #666;
            font-size: 0.9rem;
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
            font-weight: bold;
            margin-bottom: 15px;
            color: #333;
        }
        .profile-pic-container {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
        }
        .profile-pic-placeholder {
            width: 60px;
            height: 60px;
            background-color: #e3f2fd;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #1976d2;
            font-size: 1.5rem;
        }
        .profile-pic-info {
            flex: 1;
        }
        .profile-pic-info h6 {
            margin: 0;
            font-weight: bold;
        }
        .profile-pic-info p {
            margin: 5px 0 0 0;
            color: #666;
            font-size: 0.9rem;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-label {
            font-weight: bold;
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
        .input-group {
            display: flex;
            gap: 10px;
        }
        .input-group .form-control {
            flex: 1;
        }
        .input-group .input-group-text {
            background-color: #f8f9fa;
            border: 1px solid #ced4da;
            border-radius: 6px;
            padding: 10px;
            display: flex;
            align-items: center;
        }
        .input-group .input-group-text i {
            color: #666;
        }
        .btn-secondary {
            background-color: #6c757d;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            font-weight: bold;
            width: 100%;
            max-width: 150px;
            text-align: center;
        }
        .btn-primary {
            background-color: #1a73e8;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            font-weight: bold;
            width: 100%;
            max-width: 150px;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }
        .btn-container {
            display: flex;
            gap: 10px;
            margin-top: 20px;
            justify-content: flex-end;
        }
        .required {
            color: red;
        }
    </style>
</head>
<body>
    <div class="page-header">
        <div class="back-arrow" onclick="window.history.back();">
            <i class="fas fa-arrow-left"></i>
        </div>
        <div>
            <h1>Edit Profile</h1>
            <p>Perbarui informasi akun Anda</p>
        </div>
    </div>

    <div class="card">
        <div class="profile-pic-container">
            <div class="profile-pic-placeholder">
                <i class="fas fa-user"></i>
            </div>
            <div class="profile-pic-info">
                <h6>Foto Profile</h6>
                <p>JPG atau PNG, max 2MB</p>
            </div>
        </div>
    </div>

    <div class="card">
        <h5 class="card-title">Informasi Pribadi</h5>
        <div class="form-group">
            <label class="form-label">Nama Lengkap <span class="required">*</span></label>
            <input type="text" class="form-control" value="John Doe">
        </div>
        <div class="form-group">
            <label class="form-label">Email <span class="required">*</span></label>
            <input type="email" class="form-control" value="john@example.com">
        </div>
        <div class="form-group">
            <div class="input-group">
                <div style="flex: 1;">
                    <label class="form-label">No. Telepon <span class="required">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                        <input type="tel" class="form-control" value="081234567890">
                    </div>
                </div>
                <div style="flex: 1;">
                    <label class="form-label">NIK <span class="required">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                        <input type="text" class="form-control" value="3174012345670001">
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="form-label">Alamat <span class="required">*</span></label>
            <div class="input-group">
                <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                <input type="text" class="form-control" value="Jl. Merdeka No. 123, Jakarta">
            </div>
        </div>
    </div>

    <div class="card">
        <h5 class="card-title">Informasi Akun</h5>
        <div class="form-group">
            <label class="form-label">User ID:</label>
            <input type="text" class="form-control" value="C001" disabled>
        </div>
        <div class="form-group">
            <label class="form-label">Tanggal Bergabung:</label>
            <input type="text" class="form-control" value="2024-01-15" disabled>
        </div>
    </div>

    <div class="btn-container">
        <button class="btn btn-secondary" onclick="if(confirm('Batalkan perubahan?')) location.reload();">Batal</button>
        <button class="btn btn-primary" onclick="alert('Perubahan profil berhasil disimpan!');">
            <i class="fas fa-save"></i> Simpan Perubahan
        </button>
    </div>
</body>
</html>