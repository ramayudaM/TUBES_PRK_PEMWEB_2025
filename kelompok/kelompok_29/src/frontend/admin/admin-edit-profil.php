<?php
// Dummy data untuk simulasi Admin yang sedang login
$currentUser = [
    'id' => 'A001',
    'name' => 'Admin System',
    'email' => 'admin@infra.go.id',
    'phone' => '021-12345678',
    'role' => 'Administrator',
    'createdAt' => '2023-01-01',
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile Admin</title>
    <script src="https://cdn.tailwindcss.com"></script> 
    <script src="js/admin-auth-guard.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        /* CSS Tambahan minimal untuk ikon input */
        .input-icon { position: absolute; left: 12px; top: 50%; transform: translateY(-50%); color: #9ca3af; }
    </style>
</head>
<body class="bg-gray-50">
    <main class="py-8">
        <div class="container max-w-4xl mx-auto p-4">
            
            <header class="flex items-center gap-4 mb-6 bg-gray-50 sticky top-0 z-10 py-4">
                <a href="admin-dashboard.php" class="text-xl text-gray-700 hover:text-blue-600 font-semibold">&larr;</a>
                <div class="mr-auto">
                    <h1 class="text-2xl font-semibold text-gray-900">Edit Profile Admin</h1>
                    <p class="text-gray-600 text-sm">Perbarui informasi akun admin</p>
                </div>
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
            
            <form id="formEditProfile" class="space-y-4">
                
                <section class="bg-white rounded-xl p-6 border border-gray-200">
                    <div class="flex items-center gap-4">
                        <div class="w-20 h-20 bg-red-100 rounded-full flex items-center justify-center flex-shrink-0 text-red-600 text-4xl">
                            <i class="material-icons">security</i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">Admin Profile</h3>
                            <p class="text-gray-600">Administrator System</p>
                        </div>
                    </div>
                </section>

                <section class="bg-white rounded-xl p-6 border border-gray-200 space-y-4">
                    <h3 class="text-xl font-semibold mb-4 text-gray-800">Informasi Admin</h3>
                    
                    <div>
                        <label for="nama" class="block text-gray-700 mb-2 text-sm">Nama Lengkap <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <i class="material-icons input-icon">person</i>
                            <input type="text" id="nama" name="name" value="<?php echo htmlspecialchars($currentUser['name']); ?>" class="w-full pl-11 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600" required>
                        </div>
                    </div>
                    
                    <div>
                        <label for="email" class="block text-gray-700 mb-2 text-sm">Email <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <i class="material-icons input-icon">mail</i>
                            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($currentUser['email']); ?>" class="w-full pl-11 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600" required>
                        </div>
                    </div>
                    
                    <div>
                        <label for="telepon" class="block text-gray-700 mb-2 text-sm">No. Telepon <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <i class="material-icons input-icon">phone</i>
                            <input type="tel" id="telepon" name="phone" value="<?php echo htmlspecialchars($currentUser['phone']); ?>" class="w-full pl-11 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600" required>
                        </div>
                    </div>
                </section>

                <section class="bg-white rounded-xl p-6 border border-gray-200">
                    <h3 class="text-xl font-semibold mb-4 text-gray-800">Informasi Akun</h3>
                    <div class="space-y-2 text-gray-600">
                        <p>User ID: <span class="text-gray-900 font-semibold"><?php echo htmlspecialchars($currentUser['id']); ?></span></p>
                        <p>Role: <span class="text-red-600 font-semibold">Administrator</span></p>
                        <p>Tanggal Bergabung: <span class="text-gray-900 font-semibold"><?php echo htmlspecialchars($currentUser['createdAt']); ?></span></p>
                    </div>
                </section>

                <div class="p-4 bg-yellow-50 border border-yellow-200 rounded-xl text-sm text-yellow-900">
                    Untuk mengganti password atau pengaturan keamanan, hubungi super administrator.
                </div>
                
                <div class="flex gap-3 pt-2">
                    <button type="button" class="flex-1 bg-white border border-gray-300 text-gray-700 py-4 rounded-lg hover:bg-gray-50 font-semibold" onclick="window.location.href='admin-dashboard.php'">
                        Batal
                    </button>
                    <button type="submit" class="flex-1 bg-blue-600 text-white py-4 rounded-lg hover:bg-blue-700 transition-colors flex items-center justify-center gap-2 font-semibold">
                        <i class="material-icons text-xl">save</i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </main>

    <script src="js/admin-logout.js"></script>
    <script src="js/admin-edit-profil.js"></script>
</body>
</html>