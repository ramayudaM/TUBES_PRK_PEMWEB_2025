<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Tiket</title>
    <link rel="stylesheet" href="css/style.css"> 
    <link rel="stylesheet" href="css/admin-manajemen-tiket.css"> 
</head>
<body>
    <main class="content-wrapper">
        <div class="container max-w-7xl mx-auto p-4">
            
            <header class="page-header">
                <a href="admin-dashboard.php" class="back-link">&larr;</a>
                <h2>Manajemen Tiket</h2>
            </header>
            
            <section class="section-filter-control card">
                <div class="filter-controls-top">
                    <div class="search-input-wrapper">
                        <span class="search-icon">🔍</span>
                        <input type="text" id="searchInput" placeholder="Cari tiket, pelapor, atau ID..." class="search-input">
                    </div>
                </div>
                
                <div class="status-tabs-wrapper" id="status-tabs">
                    </div>
            </section>

            <section class="section-tabel-tiket card">
                <div class="overflow-x-auto">
                    <table class="data-table" id="tabel-pengaduan">
                        <thead>
                            <tr>
                                <th class="w-15">ID Tiket</th>
                                <th class="w-20">Pelapor</th>
                                <th class="w-25">Judul & Kategori</th>
                                <th class="w-10">Status</th>
                                <th class="w-20">Lokasi</th>
                                <th class="w-10">Petugas</th>
                                <th class="w-5 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="tabel-body-pengaduan">
                            </tbody>
                    </table>
                </div>
            </section>

            <div id="mobile-card-view" class="mobile-card-list">
                </div>
            
            <div id="empty-state" class="empty-state-card card" style="display: none;">
                <span class="icon">🔍</span>
                <p>Tidak ada tiket yang sesuai filter</p>
            </div>
        </div>
    </main>

    <script src="js/admin-manajemen-tiket.js"></script>
</body>
</html>