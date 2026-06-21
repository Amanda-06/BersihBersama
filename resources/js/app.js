document.addEventListener("DOMContentLoaded", function () {
    // 1. LOGIKA NAVIGASI SIDEBAR (TAB SWITCHING)
    window.switchTab = function (tabId, btnElement) {
        document.querySelectorAll(".tab-content").forEach((tab) => {
            tab.classList.add("hidden");
            tab.classList.remove("block");
        });

        const targetTab = document.getElementById(tabId);
        if (targetTab) {
            targetTab.classList.remove("hidden");
        }

        document.querySelectorAll(".nav-btn").forEach((btn) => {
            btn.className =
                "nav-btn w-full flex items-center gap-3 px-4 py-3 rounded-xl text-gray-500 hover:text-[#1a8e5f] hover:bg-emerald-50/50 transition font-medium";
        });

        if (btnElement) {
            btnElement.className =
                "nav-btn active w-full flex items-center gap-3 px-4 py-3 rounded-xl bg-emerald-50 text-[#1a8e5f] font-bold transition";
        }

        const mainArea = document.querySelector("main");
        if (mainArea) mainArea.scrollTo({ top: 0, behavior: "smooth" });
    };

    // 2. LOGIKA TUTUP BANNER (DASHBOARD)
    const bannerCloseBtn = document.querySelector(
        "#dashboard .fa-xmark",
    )?.parentElement;
    if (bannerCloseBtn) {
        bannerCloseBtn.addEventListener("click", function () {
            const banner = this.closest(".bg-emerald-50");
            if (banner) {
                banner.style.transition =
                    "opacity 0.3s ease, transform 0.3s ease";
                banner.style.opacity = "0";
                banner.style.transform = "translateY(-10px)";
                setTimeout(() => banner.remove(), 300);
            }
        });
    }

// 3. LOGIKA TOMBOL FILTER (PENGUMUMAN AKTIF)
    const filterBtns = document.querySelectorAll('#pengumuman-filters button');
    const announcementCards = document.querySelectorAll('.pengumuman-card');

    if (filterBtns.length > 0) {
        filterBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                // 1. Reset semua warna tombol ke warna dasar (putih)
                filterBtns.forEach(b => {
                    b.className = "bg-white border border-gray-300 text-gray-600 hover:bg-gray-50 hover:text-slate-900 px-5 py-1.5 rounded text-sm font-semibold transition shadow-sm";
                });
                // Ubah tombol yang diklik menjadi aktif (hijau)
                this.className = "bg-[#1a8e5f] text-white px-5 py-1.5 rounded text-sm font-bold shadow-sm";

                // 2. Logika Menyembunyikan/Menampilkan Kartu
                const selectedFilter = this.getAttribute('data-filter');
                
                announcementCards.forEach(card => {
                    const cardPriority = card.getAttribute('data-priority');
                    
                    // Tampilkan jika filter "semua" ATAU filter cocok dengan prioritas kartu
                    if (selectedFilter === 'semua' || selectedFilter === cardPriority) {
                        card.classList.remove('hidden');
                    } else {
                        card.classList.add('hidden');
                    }
                });
            });
        });
    }

   // 4. LOGIKA FILTER & RESET (LAPORAN SAYA)
    const filterStatus = document.getElementById('filter-status');
    const filterKategori = document.getElementById('filter-kategori');
    const btnResetLaporan = document.getElementById('btn-reset-laporan');
    const laporanRows = document.querySelectorAll('.laporan-row');
    const laporanCountText = document.getElementById('laporan-count-text');

    function jalankanFilterLaporan() {
        if (!filterStatus || !filterKategori) return;

        const statusDipilih = filterStatus.value;
        const kategoriDipilih = filterKategori.value;
        let jumlahTerlihat = 0;

        laporanRows.forEach(row => {
            const statusBaris = row.getAttribute('data-status');
            const kategoriBaris = row.getAttribute('data-kategori');

            // Cek apakah baris ini cocok dengan filter (atau jika filter adalah "semua")
            const cocokStatus = (statusDipilih === 'semua' || statusDipilih === statusBaris);
            const cocokKategori = (kategoriDipilih === 'semua' || kategoriDipilih === kategoriBaris);

            if (cocokStatus && cocokKategori) {
                row.classList.remove('hidden');
                jumlahTerlihat++;
            } else {
                row.classList.add('hidden');
            }
        });

        // Update teks jumlah laporan yang ditampilkan
        if (laporanCountText) {
            if (jumlahTerlihat === 0) {
                laporanCountText.innerHTML = `Tidak ada laporan yang sesuai dengan filter.`;
            } else {
                laporanCountText.innerHTML = `Menampilkan <span class="text-slate-900 font-bold mx-1">${jumlahTerlihat}</span> laporan`;
            }
        }
    }

    // Pasang pendengar (listener) saat pilihan dropdown diubah
    if (filterStatus) filterStatus.addEventListener('change', jalankanFilterLaporan);
    if (filterKategori) filterKategori.addEventListener('change', jalankanFilterLaporan);

    // Tombol Reset
    if (btnResetLaporan) {
        btnResetLaporan.addEventListener('click', function() {
            if (filterStatus) filterStatus.value = 'semua';
            if (filterKategori) filterKategori.value = 'semua';
            jalankanFilterLaporan(); // Jalankan ulang fungsi filter agar tabel kembali normal
        });
    }

    // 5. LOGIKA DROPDOWN PROFIL (MENU TITIK TIGA DI SIDEBAR)
    const profileBtn = document.getElementById("profile-menu-btn");
    const profileDropdown = document.getElementById("profile-dropdown");

    if (profileBtn && profileDropdown) {
        profileBtn.addEventListener("click", function (e) {
            e.stopPropagation();
            profileDropdown.classList.toggle("hidden");
        });

        window.addEventListener("click", function (e) {
            if (
                !profileBtn.contains(e.target) &&
                !profileDropdown.contains(e.target)
            ) {
                profileDropdown.classList.add("hidden");
            }
        });
    }

    window.closeDropdown = function () {
        const dropdown = document.getElementById("profile-dropdown");
        if (dropdown) dropdown.classList.add("hidden");
    };

// 6. LOGIKA TOGGLE SIDEBAR (Buka/Tutup)
    window.toggleSidebar = function() {
        const sidebar = document.getElementById('sidebar');
        const openBtn = document.getElementById('open-sidebar-btn');
        
        // Geser sidebar keluar layar
        sidebar.classList.toggle('-ml-64');
        
        // Cek jika sidebar sedang tertutup (-ml-64 aktif)
        if (sidebar.classList.contains('-ml-64')) {
            // Tampilkan tombol "hamburger" di area utama
            openBtn.classList.remove('hidden');
        } else {
            // Sembunyikan tombol utama, karena tombolnya sudah ada di dalam sidebar
            openBtn.classList.add('hidden');
        }
    }

    // 7. LOGIKA HALAMAN DETAIL LAPORAN
    window.bukaDetailLaporan = function(e) {
        if(e) e.preventDefault();
        
        // Sembunyikan semua tab
        document.querySelectorAll('.tab-content').forEach(tab => {
            tab.classList.add('hidden');
        });
        
        // Tampilkan tab detail
        const detailTab = document.getElementById('detail-laporan');
        if(detailTab) detailTab.classList.remove('hidden');

        // Pastikan menu 'Laporan Saya' di sidebar tetap aktif (hijau)
        document.querySelectorAll('.nav-btn').forEach(btn => {
            btn.className = "nav-btn w-full flex items-center gap-3 px-4 py-3 rounded-xl text-gray-500 hover:text-[#1a8e5f] hover:bg-emerald-50/50 transition font-medium";
        });
        // Mencari tombol sidebar yang memiliki teks 'Laporan Saya'
        const laporanBtn = Array.from(document.querySelectorAll('.nav-btn')).find(el => el.textContent.includes('Laporan Saya'));
        if (laporanBtn) {
            laporanBtn.className = "nav-btn active w-full flex items-center gap-3 px-4 py-3 rounded-xl bg-emerald-50 text-[#1a8e5f] font-bold transition";
        }

        // Gulir ke atas
        const mainArea = document.querySelector('main');
        if(mainArea) mainArea.scrollTo({ top: 0, behavior: 'smooth' });
    };

    window.kembaliKeLaporan = function() {
        // Kembali ke tab laporan utama dengan mengklik tombol sidebar 'Laporan Saya' secara terprogram
        const laporanBtn = Array.from(document.querySelectorAll('.nav-btn')).find(el => el.textContent.includes('Laporan Saya'));
        if (laporanBtn) {
            laporanBtn.click();
        }
    };

}); 