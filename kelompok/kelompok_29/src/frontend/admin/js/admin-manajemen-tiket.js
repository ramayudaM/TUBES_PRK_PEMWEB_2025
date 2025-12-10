// --- 1. DUMMY DATA LENGKAP ---
const mockTicketsData = [
    // Struktur data sesuai dengan kebutuhan tabel
    { id: "TKT-001", pelapor: "Ahmad Wijaya", email: "ahmad.wijaya@email.com", judul: "Jalan Berlubang di Jl. Sudirman", kategori: "Jalan Raya", status: "Dalam Proses", lokasi: "Jl. Sudirman No. 45, Jakarta Pusat", petugas: "Budi Santoso" },
    { id: "TKT-002", pelapor: "Siti Nurhaliza", email: "siti.nur@email.com", judul: "Lampu Jalan Mati di Perumahan Griya Asri", kategori: "Penerangan Jalan", status: "Selesai", lokasi: "Perumahan Griya Asri Blok C, Tangerang", petugas: "Andi Pratama" },
    { id: "TKT-003", pelapor: "Ahmad Wijaya", email: "ahmad.wijaya@email.com", judul: "Saluran Air Tersumbat", kategori: "Drainase", status: "Diajukan", lokasi: "Jl. Melati No. 12, Bekasi", petugas: null },
    { id: "TKT-004", pelapor: "Rina Kusuma", email: "rina.k@email.com", judul: "Trotoar Rusak", kategori: "Trotoar", status: "Diverifikasi Admin", lokasi: "Jl. Gatot Subroto, Jakarta Selatan", petugas: null },
    { id: "TKT-005", pelapor: "Siti Nurhaliza", email: "siti.nur@email.com", judul: "Rambu Lalu Lintas Rusak", kategori: "Rambu Lalu Lintas", status: "Ditugaskan ke Petugas", lokasi: "Jl. Ahmad Yani No. 88, Bandung", petugas: "Ahmad Santoso" },
    { id: "TKT-006", pelapor: "Rina Kusuma", email: "rina.k@email.com", judul: "Taman Kota Tidak Terawat", kategori: "Taman", status: "Menunggu Validasi Admin", lokasi: "Taman Kota Mawar, Surabaya", petugas: "Budi Prakoso" },
];

const statusSlugs = [
    { label: "Semua", slug: "all", count: 6 },
    { label: "Diajukan", slug: "diajukan", count: 1 },
    { label: "Diverifikasi", slug: "diverifikasi admin", count: 1 },
    { label: "Ditugaskan", slug: "ditugaskan ke petugas", count: 1 },
    { label: "Dalam Proses", slug: "dalam proses", count: 1 },
    { label: "Menunggu Validasi", slug: "menunggu validasi admin", count: 1 },
    { label: "Selesai", slug: "selesai", count: 1 }
];

let currentFilterStatus = 'all'; 

// --- 2. FUNGSI UTILITAS ---

function getStatusBadgeHtml(status) {
    let className = '';
    const cleanStatus = status.toLowerCase().replace(/ /g, '_');
    
    if (cleanStatus.includes('proses')) className = 'badge-proses';
    else if (cleanStatus.includes('selesai')) className = 'badge-selesai';
    else if (cleanStatus.includes('diverifikasi')) className = 'badge-diverifikasi';
    else if (cleanStatus.includes('ditugaskan')) className = 'badge-ditugaskan';
    else if (cleanStatus.includes('diajukan')) className = 'badge-diajukan';
    else if (cleanStatus.includes('menunggu_validasi')) className = 'badge-validasi';
    
    return `<span class="badge-status ${className}">${status}</span>`;
}

// --- 3. FUNGSI RENDERING ---

function renderStatusTabs() {
    const tabsContainer = document.getElementById('status-tabs');
    tabsContainer.innerHTML = '';

    statusSlugs.forEach(tab => {
        const button = document.createElement('button');
        button.className = 'tab-button' + (tab.slug === currentFilterStatus ? ' active' : '');
        button.textContent = `${tab.label} (${tab.count})`;
        
        button.addEventListener('click', () => {
             // Mengganti filter status saat tombol diklik
             currentFilterStatus = tab.slug;
             document.querySelectorAll('.tab-button').forEach(btn => btn.classList.remove('active'));
             button.classList.add('active');
             filterAndRenderTable();
        });
        tabsContainer.appendChild(button);
    });
}

function filterAndRenderTable() {
    let filteredTickets = mockTicketsData;

    if (currentFilterStatus !== 'all') {
        filteredTickets = mockTicketsData.filter(ticket => 
            ticket.status.toLowerCase() === currentFilterStatus.toLowerCase()
        );
    }
    
    renderTicketTable(filteredTickets);
    // Tampilkan/sembunyikan empty state
    document.getElementById('empty-state').style.display = filteredTickets.length === 0 ? 'block' : 'none';
}


function renderTicketTable(tickets) {
    const tbody = document.getElementById('tabel-body-pengaduan');
    tbody.innerHTML = '';
    
    tickets.forEach(ticket => {
        const row = tbody.insertRow();
        const statusHtml = getStatusBadgeHtml(ticket.status);
        
        // Logika Tombol Aksi: Assign jika belum ditugaskan, View jika sudah
        const isAssignable = ticket.status === 'Diajukan' || ticket.status === 'Diverifikasi Admin';
        
        const actionHtml = isAssignable ?
            `<a href="#" class="action-assign" onclick="return false;">➕ Assign</a>` :
            `<a href="admin-detail-tiket.php?id=${ticket.id}" class="btn-view-detail">👁️</a>`;


        const petugasDisplay = ticket.petugas ? 
            `<p>${ticket.petugas}</p>` : 
            `<a href="#" class="action-assign">➕ Assign</a>`;


        row.innerHTML = `
            <td><span class="ticket-id">#${ticket.id}</span></td>
            <td>
                <p>${ticket.pelapor}</p>
                <small>${ticket.email}</small>
            </td>
            <td>
                <p>${ticket.judul}</p>
                <span class="badge-kategori">${ticket.kategori}</span>
            </td>
            <td>${statusHtml}</td>
            <td><p>${ticket.lokasi}</p></td>
            <td>${petugasDisplay}</td>
            <td class="text-center">
                <a href="admin-detail-tiket.php?id=${ticket.id}" class="btn-view-detail">
                    ${isAssignable ? '➕' : '👁️'}
                </a>
            </td>
        `;
    });
}

document.addEventListener('DOMContentLoaded', () => {
    renderStatusTabs();
    filterAndRenderTable(); 
});