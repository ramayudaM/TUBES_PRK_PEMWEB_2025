<?php
// Dummy data untuk simulasi tiket tunggal (menggunakan status yang berbeda untuk testing)
$ticketId = isset($_GET['id']) ? $_GET['id'] : 'TKT-001'; 
// Asumsi status saat ini: 'menunggu-validasi-admin'
$currentTicket = [
    'id' => $ticketId,
    'reporterName' => 'Ahmad Wijaya',
    'reporterEmail' => 'ahmad.wijaya@email.com',
    'title' => 'Jalan Berlubang di Jl. Sudirman',
    'category' => 'Jalan Raya',
    'status' => 'menunggu-validasi-admin', // Ganti status ini untuk menguji tombol Aksi
    'createdAt' => '2025-10-10',
    'location' => 'Jl. Sudirman No. 45, Jakarta Pusat',
    'description' => 'Terdapat lubang yang cukup dalam dan lebar di tengah jalan yang berpotensi menyebabkan kecelakaan.',
    'imageUrl' => 'img/dummy-road-initial.jpg',
    'assignedOfficer' => 'Budi Santoso',
    'completionImageUrl' => 'img/dummy-road-fixed.jpg',
    'officerNotes' => 'Perbaikan selesai dengan penambalan aspal pada area lubang utama.',
    'timeline' => [
        // Dummy Timeline
    ]
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Tiket #<?php echo htmlspecialchars($ticketId); ?></title>
    <link rel="stylesheet" href="css/style.css"> 
    <link rel="stylesheet" href="css/admin-detail-tiket.css"> 
</head>
<body>
    
    <div class="header-sticky">
        <div class="container max-w-5xl mx-auto p-4 flex items-center gap-3">
            <a href="admin-manajemen-tiket.php" class="back-link">&larr;</a>
            <div class="flex-grow">
                <h1>Detail Tiket #<?php echo htmlspecialchars($currentTicket['id']); ?></h1>
                <p class="text-muted"><?php echo htmlspecialchars($currentTicket['reporterName']); ?></p>
            </div>
            <div id="statusBadgeContainer"></div>
        </div>
    </div>

    <main class="content-wrapper">
        <div class="container max-w-5xl mx-auto p-4 grid-lg-3-cols gap-4">
            
            <div class="lg-col-span-2 space-y-4" id="main-content-left">
                
                <div class="card overflow-hidden border">
                    <img src="<?php echo htmlspecialchars($currentTicket['imageUrl']); ?>" alt="<?php echo htmlspecialchars($currentTicket['title']); ?>" class="w-full h-80 object-cover">
                </div>

                <div class="card p-6 border">
                    <h2 class="mb-4 text-2xl"><?php echo htmlspecialchars($currentTicket['title']); ?></h2>
                    <div class="flex-wrap gap-4 text-muted mb-6">
                        <span class="detail-meta">📅 <?php echo date('d F Y', strtotime($currentTicket['createdAt'])); ?></span>
                        <span class="detail-meta">📄 <?php echo htmlspecialchars($currentTicket['category']); ?></span>
                    </div>

                    <div class="mb-4">
                        <p class="text-dark mb-2">Deskripsi:</p>
                        <p class="text-muted"><?php echo htmlspecialchars($currentTicket['description']); ?></p>
                    </div>

                    <div class="pt-4 border-t border-gray-200">
                        <p class="text-dark mb-1">Lokasi:</p>
                        <p class="text-muted">📍 <?php echo htmlspecialchars($currentTicket['location']); ?></p>
                    </div>
                </div>

                <div class="card p-6 border">
                    <h3 class="mb-4 text-lg">Peta Lokasi</h3>
                    <div class="map-placeholder h-64 bg-gray-200 flex items-center justify-center text-muted">
                        [Image of Placeholder Map of <?php echo htmlspecialchars($currentTicket['location']); ?>]
                    </div>
                </div>

                <div class="card p-6 border">
                    <h3 class="mb-4 text-lg">Informasi Pelapor</h3>
                    <div class="space-y-2">
                        <p class="text-dark">👤 <?php echo htmlspecialchars($currentTicket['reporterName']); ?></p>
                        <p class="text-muted">✉️ <?php echo htmlspecialchars($currentTicket['reporterEmail']); ?></p>
                    </div>
                </div>

                <?php if ($currentTicket['completionImageUrl']): ?>
                <div class="card p-6 border" id="completionEvidence">
                    <h3 class="mb-4 text-lg">Bukti Penyelesaian</h3>
                    <img src="<?php echo htmlspecialchars($currentTicket['completionImageUrl']); ?>" alt="Bukti Penyelesaian" class="w-full h-64 object-cover rounded-lg mb-4">
                    <?php if ($currentTicket['officerNotes']): ?>
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <p class="text-dark mb-1">Catatan Petugas:</p>
                        <p class="text-muted"><?php echo htmlspecialchars($currentTicket['officerNotes']); ?></p>
                    </div>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
            </div>

            <div class="lg-col-span-1 space-y-4" id="sidebar-right">
                
                <div class="card p-6 border" id="actionButtonsCard">
                    <h3 class="mb-4 text-lg">Aksi</h3>
                    <div class="space-y-3" id="actionButtonsContainer">
                        </div>
                </div>

                <?php if ($currentTicket['assignedOfficer']): ?>
                <div class="card p-6 border" id="assignedOfficerCard">
                    <h3 class="mb-4 text-lg">Petugas Ditugaskan</h3>
                    <div class="officer-info-display">
                        <div class="officer-avatar">👤</div>
                        <div>
                            <p class="text-dark font-semibold"><?php echo htmlspecialchars($currentTicket['assignedOfficer']); ?></p>
                            <p class="text-muted">Dinas Pekerjaan Umum</p> </div>
                    </div>
                </div>
                <?php endif; ?>

                <div class="card p-6 border" id="timelineCard">
                    <h3 class="mb-4 text-lg">Timeline</h3>
                    <div id="timelineContainer">
                        </div>
                </div>

            </div>
        </div>
    </main>

    <script src="js/admin-detail-tiket.js"></script>
    <script>
        // Set data PHP ke JS untuk diolah
        const ticketData = <?php echo json_encode($currentTicket); ?>;
    </script>
</body>
</html>