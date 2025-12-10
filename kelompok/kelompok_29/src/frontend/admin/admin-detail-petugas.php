<?php
// Dummy data untuk Petugas yang ditampilkan
$officerId = isset($_GET['id']) ? $_GET['id'] : 'EMP-2023-001';
$officer = [
    'id' => $officerId,
    'name' => 'Budi Santoso',
    'employeeId' => 'EMP-2023-001',
    'department' => 'Dinas Pekerjaan Umum',
    'specialization' => 'Jalan & Trotoar',
    'email' => 'budi.s@infra.go.id',
    'phone' => '0812-3456-7890',
    'status' => 'busy', // 'available' atau 'busy'
    'activeTasksCount' => 2,
    // Dummy tasks untuk ditampilkan di sidebar
    'activeTasks' => [
        ['id' => 'TKT-001', 'title' => 'Jalan Berlubang', 'status' => 'dalam-proses', 'image' => 'img/dummy-road.jpg'],
        ['id' => 'TKT-005', 'title' => 'Rambu Lalu Lintas Rusak', 'status' => 'ditugaskan-ke-petugas', 'image' => 'img/dummy-sign.jpg'],
    ]
];

// Menentukan status badge
$statusClass = $officer['status'] === 'available' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700';
$statusText = $officer['status'] === 'available' ? 'Tersedia' : 'Sibuk';
$iconClass = $officer['status'] === 'available' ? 'text-green-600' : 'text-yellow-600';

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Petugas - <?php echo htmlspecialchars($officer['name']); ?></title>
    <script src="https://cdn.tailwindcss.com"></script> 
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        .icon-small { font-size: 18px; }
    </style>
</head>
<body class="bg-gray-50">
    <main class="py-8">
        <div class="container max-w-5xl mx-auto p-4">
            
            <header class="page-header flex items-center gap-4 mb-6">
                <a href="admin-kelola-petugas.php" class="text-xl text-gray-700 hover:text-blue-600 font-semibold">&larr;</a>
                <div>
                    <h1 class="text-2xl font-semibold text-gray-900">Detail Petugas</h1>
                    <p class="text-gray-600 text-sm">Informasi lengkap dan tugas aktif</p>
                </div>
            </header>
            
            <div class="grid lg:grid-cols-3 gap-6">
                
                <div class="lg:col-span-2 space-y-6">
                    
                    <div class="bg-white rounded-xl p-6 border border-gray-200">
                        <div class="flex items-center gap-4 border-b pb-4 mb-4">
                            <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center text-blue-600 text-3xl">
                                <i class="material-icons">person</i>
                            </div>
                            <div>
                                <h2 class="text-xl font-semibold text-gray-900"><?php echo htmlspecialchars($officer['name']); ?></h2>
                                <p class="text-gray-600"><?php echo htmlspecialchars($officer['department']); ?></p>
                                <span class="text-xs font-medium px-3 py-1 rounded-full <?php echo $statusClass; ?> mt-1 inline-block"><?php echo $statusText; ?></span>
                            </div>
                        </div>

                        <h3 class="text-lg font-semibold mb-3 text-gray-800">Informasi Kontak & ID</h3>
                        <div class="grid md:grid-cols-2 gap-4 text-gray-700 text-sm">
                            <div class="flex items-center gap-2"><i class="material-icons icon-small text-gray-500">vpn_key</i><span>ID Pegawai: <?php echo htmlspecialchars($officer['employeeId']); ?></span></div>
                            <div class="flex items-center gap-2"><i class="material-icons icon-small text-gray-500">email</i><span><?php echo htmlspecialchars($officer['email']); ?></span></div>
                            <div class="flex items-center gap-2"><i class="material-icons icon-small text-gray-500">phone</i><span><?php echo htmlspecialchars($officer['phone']); ?></span></div>
                            <div class="flex items-center gap-2"><i class="material-icons icon-small text-gray-500">build</i><span>Spesialisasi: <?php echo htmlspecialchars($officer['specialization']); ?></span></div>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-xl p-6 border border-gray-200">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-xl font-semibold text-gray-800">Tugas Aktif Saat Ini</h3>
                            <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-medium">
                                <?php echo htmlspecialchars($officer['activeTasksCount']); ?> tugas
                            </span>
                        </div>
                        
                        <div class="space-y-3" id="activeTasksContainer">
                            <?php if (count($officer['activeTasks']) > 0): ?>
                                <?php foreach ($officer['activeTasks'] as $task): 
                                    $taskStatusClass = $task['status'] === 'dalam-proses' ? 'bg-yellow-100 text-yellow-700' : 'bg-orange-100 text-orange-700';
                                    $taskStatusText = $task['status'] === 'dalam-proses' ? 'Dalam Proses' : 'Ditugaskan';
                                ?>
                                    <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg border border-gray-200 hover:bg-gray-100">
                                        <div class="w-12 h-12 rounded-lg overflow-hidden bg-gray-300 flex-shrink-0">
                                            <img src="<?php echo htmlspecialchars($task['image']); ?>" alt="Task Photo" class="w-full h-full object-cover">
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-gray-900 font-medium truncate"><?php echo htmlspecialchars($task['title']); ?></p>
                                            <p class="text-gray-500 text-xs">#<?php echo htmlspecialchars($task['id']); ?></p>
                                        </div>
                                        <span class="px-2 py-1 rounded text-xs font-medium <?php echo $taskStatusClass; ?>"><?php echo $taskStatusText; ?></span>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <p class="text-gray-500 text-center py-4">Tidak ada tugas aktif.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                
                <div class="space-y-6">
                    <div class="bg-white rounded-xl p-6 border border-gray-200">
                        <h3 class="text-xl font-semibold mb-4 text-gray-800">Aksi & Status</h3>
                        
                        <div class="space-y-3">
                            <div class="bg-blue-50 border border-blue-200 text-blue-800 p-3 rounded-lg text-sm">
                                <p class="font-medium mb-1">Status Kehadiran</p>
                                <p class="font-semibold"><?php echo $statusText; ?></p>
                            </div>
                            
                            <button onclick="alert('Simulasi: Edit Detail Petugas')" 
                                class="w-full bg-indigo-600 text-white py-3 rounded-lg hover:bg-indigo-700 transition-colors flex items-center justify-center gap-2 font-semibold">
                                <i class="material-icons">edit</i> Edit Detail Petugas
                            </button>
                            
                            <button onclick="alert('Simulasi: Nonaktifkan Akun')"
                                class="w-full bg-red-600 text-white py-3 rounded-lg hover:bg-red-700 transition-colors flex items-center justify-center gap-2 font-semibold">
                                <i class="material-icons">lock</i> Nonaktifkan Akun
                            </button>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-xl p-6 border border-gray-200">
                        <h3 class="text-xl font-semibold text-gray-800">Riwayat Tugas</h3>
                        <p class="text-gray-500 mt-2 text-sm">52 tugas selesai dalam 12 bulan terakhir.</p>
                        </div>
                </div>

            </div>
        </div>
    </main>
</body>
</html>