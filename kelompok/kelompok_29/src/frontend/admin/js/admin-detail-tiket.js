// Data Tiket (Diambil dari PHP, asumsikan sudah ada di 'ticketData')

// --- 1. DUMMY DATA Tambahan ---
// Untuk simulasi Status Badge dan Timeline
const mockTimeline = [
    { status: 'selesai', date: '2025-10-18', notes: 'Penyelesaian disetujui.', actor: 'Admin System' },
    { status: 'menunggu-validasi-admin', date: '2025-10-17', notes: 'Petugas upload bukti penyelesaian.', actor: 'Budi Santoso' },
    { status: 'dalam-proses', date: '2025-10-15', notes: 'Petugas mulai mengerjakan.', actor: 'Budi Santoso' },
    { status: 'ditugaskan-ke-petugas', date: '2025-10-12', notes: 'Ditugaskan ke Budi Santoso.', actor: 'Admin System' },
    { status: 'diverifikasi-admin', date: '2025-10-11', notes: 'Pengaduan diverifikasi dan diterima.', actor: 'Admin System' },
    { status: 'diajukan', date: '2025-10-10', notes: 'Pengaduan baru diajukan.', actor: 'Ahmad Wijaya' },
];

const officerData = {
    name: 'Budi Santoso',
    department: 'Dinas Pekerjaan Umum',
    status: 'tersedia',
    id: 'EMP-2023-001',
    activeTasksCount: 1,
    email: 'budi.s@infra.go.id',
    phone: '081234567890'
};

// --- 2. FUNGSI UTILITAS ---

function getStatusBadge(status) {
    let text = status.toUpperCase().replace(/-/g, ' ');
    let className = 'badge-status-detail';
    
    // Logika warna badge status 
    if (status.includes('proses')) className += ' badge-proses';
    else if (status.includes('selesai')) className += ' badge-selesai';
    else if (status.includes('diverifikasi')) className += ' badge-diverifikasi';
    else if (status.includes('ditugaskan')) className += ' badge-ditugaskan';
    else if (status.includes('diajukan')) className += ' badge-diajukan';
    else if (status.includes('validasi')) className += ' badge-validasi';

    return `<span class="${className}">${text}</span>`;
}

// --- 3. FUNGSI RENDERING ---

function renderTimeline(timeline) {
    const container = document.getElementById('timelineContainer');
    let html = '<div class="timeline-wrapper">';
    
    timeline.forEach(item => {
        // Render item timeline 
        html += `
            <div class="timeline-item">
                <div class="timeline-point ${item.status}"></div>
                <div class="timeline-content">
                    <p class="timeline-status">${item.notes}</p>
                    <p class="timeline-meta">${new Date(item.date).toLocaleDateString('id-ID')} - ${item.actor}</p>
                </div>
            </div>
        `;
    });
    html += '</div>';
    container.innerHTML = html;
}

function renderActionButtons(status) {
    const container = document.getElementById('actionButtonsContainer');
    container.innerHTML = '';
    let html = '';

    switch (status) {
        case 'diajukan':
            html = `
                <button onclick="handleVerify('${ticketData.id}')" class="btn btn-full-width btn-indigo">
                    🛡️ Verifikasi & Terima
                </button>
                <button onclick="handleReject('${ticketData.id}')" class="btn btn-full-width btn-danger">
                    ❌ Tolak Pengaduan
                </button>
            `;
            break;
        case 'diverifikasi-admin':
            html = `
                <button onclick="showOfficerModal()" class="btn btn-full-width btn-amber">
                    🧑‍💻 Tugaskan Petugas
                </button>
            `;
            break;
        case 'ditugaskan-ke-petugas':
        case 'dalam-proses':
            const msgClass = status === 'ditugaskan-ke-petugas' ? 'alert-yellow' : 'alert-orange';
            html = `
                <div class="alert ${msgClass}">
                    <p>⏳ Petugas sedang bekerja</p>
                    <p class="text-sm">Petugas: ${ticketData.assignedOfficer}</p>
                </div>
            `;
            break;
        case 'menunggu-validasi-admin':
            html = `
                <button onclick="window.location.href='admin-validasi-selesai.php?id=${ticketData.id}'" class="btn btn-full-width btn-orange">
                    ✅ Validasi Penyelesaian
                </button>
            `;
            break;
        case 'selesai':
            html = `
                <div class="alert alert-success">
                    <p>✅ Pengaduan telah selesai</p>
                </div>
            `;
            break;
    }
    container.innerHTML = html;
}

// --- 4. HANDLER INTERAKSI (JS NATIVE) ---

function handleVerify(id) {
    if (confirm('Yakin ingin memverifikasi pengaduan ini?')) {
        // Simulasi POST ke PHP (Verifikasi)
        console.log(`Verifikasi tiket ID: ${id}`);
        alert('Pengaduan berhasil diverifikasi!');
        window.location.reload(); 
    }
}

function handleReject(id) {
    if (confirm('Yakin ingin menolak pengaduan ini?')) {
        // Simulasi POST ke PHP (Tolak)
        console.log(`Menolak tiket ID: ${id}`);
        alert('Pengaduan ditolak.');
        window.location.href = 'admin-manajemen-tiket.php'; 
    }
}

function showOfficerModal() {
    // Tampilkan Modal Pemilihan Petugas (Render komponen modal)
    alert('Simulasi Modal: Membuka pemilihan petugas...');
    // Di sini nanti harus memanggil fungsi render modal dari admin-select-officer.js
}


// --- EKSEKUSI ---
document.addEventListener('DOMContentLoaded', () => {
    // Gunakan data dari PHP
    document.getElementById('statusBadgeContainer').innerHTML = getStatusBadge(ticketData.status);
    renderActionButtons(ticketData.status);
    renderTimeline(mockTimeline); 
});