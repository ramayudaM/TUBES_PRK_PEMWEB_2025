<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Tiket</title>
    <script src="https://cdn.tailwindcss.com"></script> 
    <script src="js/admin-auth-guard.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        .badge-kategori { font-size: 12px; }
        .data-table th, .data-table td { padding: 16px; }
    </style>
</head>
<body class="bg-gray-50">
    <main class="content-wrapper py-8">
        <div class="max-w-7xl mx-auto p-4">
            
            <header class="page-header flex items-center gap-4 mb-4 pt-4">
                <a href="admin-dashboard.php" class="text-xl text-gray-700 hover:text-blue-600 font-semibold">&larr;</a>
                <h1 class="text-2xl font-semibold text-gray-900 mr-auto">Manajemen Tiket</h1>
                <button
                    type="button"
                    class="inline-flex items-center gap-2 bg-red-50 text-red-600 px-4 py-2 rounded-lg border border-red-100 text-sm font-semibold hover:bg-red-100"
                    data-admin-logout
                    data-default-text="Logout"
                    data-loading-text="Keluar..."
                >
                    <i class="material-icons text-base">logout</i>
                    <span>Logout</span>
                </button>
            </header>
            
            <section class="bg-white rounded-xl shadow-sm p-4 border border-gray-200 mb-4">
                
                <div class="flex flex-col md:flex-row gap-3 mb-4">
                    <div class="flex-1 relative">
                        <i class="material-icons absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400">search</i>
                        <input type="text" id="searchInput" placeholder="Cari tiket, pelapor, atau ID..." class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600"/>
                    </div>
                </div>
                
                <div class="flex gap-2 overflow-x-auto pb-2" id="status-tabs">
                    </div>
            </section>

            <section class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="data-table w-full text-left">
                        <thead class="bg-gray-50 border-b border-gray-200">
                            <tr>
                                <th class="px-4 py-3 text-gray-700 font-semibold text-sm uppercase">ID Tiket</th>
                                <th class="px-4 py-3 text-gray-700 font-semibold text-sm uppercase">Pelapor</th>
                                <th class="px-4 py-3 text-gray-700 font-semibold text-sm uppercase">Judul & Kategori</th>
                                <th class="px-4 py-3 text-gray-700 font-semibold text-sm uppercase">Status</th>
                                <th class="px-4 py-3 text-gray-700 font-semibold text-sm uppercase">Lokasi</th>
                                <th class="px-4 py-3 text-gray-700 font-semibold text-sm uppercase">Petugas</th>
                                <th class="px-4 py-3 text-center text-gray-700 font-semibold text-sm uppercase">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="tabel-body-pengaduan" class="divide-y divide-gray-100">
                            </tbody>
                    </table>
                </div>
            </section>

            <div id="empty-state" class="hidden bg-white rounded-xl shadow-sm border border-gray-200 p-12 text-center mt-4">
                <i class="material-icons text-6xl text-gray-300 mb-4">search_off</i>
                <p class="text-gray-500">Tidak ada tiket yang sesuai filter</p>
            </div>
        </div>
    </main>

    <script src="js/admin-logout.js"></script>
    <script src="js/admin-manajemen-tiket.js"></script>
    <script src="js/admin-select-officer.js"></script>
</body>
</html>