<?php
// Dummy data untuk simulasi tiket tunggal (menggunakan status yang berbeda untuk testing)
$ticketId = isset($_GET['id']) ? $_GET['id'] : 'TKT-001'; 
$currentTicket = [
    'id' => $ticketId,
    'reporterName' => 'Ahmad Wijaya',
    'reporterEmail' => 'ahmad.wijaya@email.com',
    'title' => 'Jalan Berlubang di Jl. Sudirman',
    'category' => 'Jalan Raya',
    'status' => 'diverifikasi-admin', // Status untuk menguji tombol "Tugaskan Petugas"
    'createdAt' => '2025-10-10',
    'location' => 'Jl. Sudirman No. 45, Jakarta Pusat',
    'description' => 'Terdapat lubang yang cukup dalam dan lebar di tengah jalan yang berpotensi menyebabkan kecelakaan.',
    'imageUrl' => 'img/dummy-road-initial.jpg',
    'assignedOfficer' => 'Budi Santoso',
    'completionImageUrl' => 'img/dummy-road-fixed.jpg',
    'officerNotes' => 'Perbaikan selesai dengan penambalan aspal pada area lubang utama.',
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Tiket #<?php echo htmlspecialchars($ticketId); ?></title>
    <script src="https://cdn.tailwindcss.com"></script> 
    <script src="js/admin-auth-guard.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        .header-sticky { background-color: white; border-bottom: 1px solid #e9ecef; position: sticky; top: 0; z-index: 10; }
        .map-placeholder { background-color: #f0f0f0; }
        .officer-avatar { width: 48px; height: 48px; background-color: #e3f2fd; border-radius: 9999px; display: flex; align-items: center; justify-content: center; color: #1976d2; font-size: 24px; flex-shrink: 0; }
        /* Timeline */
        .timeline-wrapper { position: relative; padding-left: 10px; }
        .timeline-point { width: 12px; height: 12px; border-radius: 50%; border: 2px solid white; position: absolute; left: 0; transform: translateX(-50%); z-index: 5; }
    </style>
</head>
<body class="bg-gray-50">
    
    <div class="header-sticky">
        <div class="max-w-5xl mx-auto p-4 flex items-center gap-3">
            <a href="admin-manajemen-tiket.php" class="w-10 h-10 flex items-center justify-center hover:bg-gray-100 rounded-lg text-gray-700 text-xl transition-colors">&larr;</a>
            <div class="flex-grow">
                <h1 class="text-2xl font-semibold text-gray-900">Detail Tiket #<?php echo htmlspecialchars($currentTicket['id']); ?></h1>
                <p class="text-gray-600 text-sm"><?php echo htmlspecialchars($currentTicket['reporterName']); ?></p>
            </div>
            <div class="flex items-center gap-3">
                <div id="statusBadgeContainer"></div>
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
            </div>
        </div>
    </div>

    <main class="content-wrapper">
        <div class="max-w-5xl mx-auto p-4 grid lg:grid-cols-3 gap-4">
            
            <div class="lg:col-span-2 space-y-4">
                <div class="bg-white rounded-xl overflow-hidden border border-gray-200">
                    <img src="<?php echo htmlspecialchars($currentTicket['imageUrl']); ?>" alt="<?php echo htmlspecialchars($currentTicket['title']); ?>" class="w-full h-80 object-cover">
                </div>
                <div class="bg-white rounded-xl p-6 border border-gray-200">
                    <h2 class="mb-4 text-2xl font-semibold"><?php echo htmlspecialchars($currentTicket['title']); ?></h2>
                    <div class="flex flex-wrap gap-4 text-gray-600 mb-6 text-sm">
                        <div class="flex items-center gap-2"><i class="material-icons text-base">calendar_today</i><span><?php echo date('d F Y', strtotime($currentTicket['createdAt'])); ?></span></div>
                        <div class="flex items-center gap-2"><i class="material-icons text-base">description</i><span><?php echo htmlspecialchars($currentTicket['category']); ?></span></div>
                    </div>
                    <div class="mb-4">
                        <p class="text-gray-700 mb-2 font-medium">Deskripsi:</p>
                        <p class="text-gray-600"><?php echo htmlspecialchars($currentTicket['description']); ?></p>
                    </div>
                    <div class="pt-4 border-t border-gray-200">
                        <div class="flex items-start gap-2">
                            <i class="material-icons text-xl text-gray-400 mt-0.5">location_on</i>
                            <div>
                                <p class="text-gray-700 mb-1 font-medium">Lokasi:</p>
                                <p class="text-gray-600"><?php echo htmlspecialchars($currentTicket['location']); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                </div>

            <div class="space-y-4">
                
                <div class="bg-white rounded-xl p-6 border border-gray-200" id="actionButtonsCard">
                    <h3 class="mb-4 text-xl font-semibold">Aksi</h3>
                    <div class="space-y-3" id="actionButtonsContainer">
                        </div>
                </div>

                <?php if ($currentTicket['assignedOfficer']): ?>
                <div class="bg-white rounded-xl p-6 border border-gray-200" id="assignedOfficerCard">
                    <h3 class="mb-4 text-xl font-semibold">Petugas Ditugaskan</h3>
                    <div class="flex items-start gap-3">
                        <div class="officer-avatar"><i class="material-icons">person</i></div>
                        <div>
                            <p class="text-gray-900 font-semibold mb-1"><?php echo htmlspecialchars($currentTicket['assignedOfficer']); ?></p>
                            <p class="text-gray-600 text-sm">Dinas Pekerjaan Umum</p>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                <div class="bg-white rounded-xl p-6 border border-gray-200" id="timelineCard">
                    <h3 class="mb-4 text-xl font-semibold">Timeline</h3>
                    <div id="timelineContainer">
                        </div>
                </div>

            </div>
        </div>
    </main>
    
    <div id="modal-container"></div> 

    <script src="js/admin-logout.js"></script>
    <script src="js/admin-detail-tiket.js"></script>
    <script src="js/admin-select-officer.js"></script>
    <script>
        // Definisikan data di window secara global (PERBAIKAN KRUSIAL)
        window.ticketData = <?php echo json_encode($currentTicket); ?>;
    </script>
</body>
</html>