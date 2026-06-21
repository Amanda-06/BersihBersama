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

    // 3. LOGIKA TOMBOL FILTER (PENGUMUMAN)
    const filterBtns = document.querySelectorAll(
        "#pengumuman .flex.gap-3 button",
    );
    filterBtns.forEach((btn) => {
        btn.addEventListener("click", function () {
            filterBtns.forEach((b) => {
                b.className =
                    "bg-white border border-gray-300 text-gray-600 hover:bg-gray-50 hover:text-slate-900 px-5 py-1.5 rounded text-sm font-semibold transition shadow-sm";
            });
            this.className =
                "bg-[#1a8e5f] text-white px-5 py-1.5 rounded text-sm font-bold shadow-sm";
        });
    });

    // 4. LOGIKA TOMBOL RESET (LAPORAN SAYA)
    const resetBtn = Array.from(
        document.querySelectorAll("#laporan button"),
    ).find((el) => el.textContent.trim() === "Reset");
    if (resetBtn) {
        resetBtn.addEventListener("click", function () {
            const selects = document.querySelectorAll("#laporan select");
            selects.forEach((select) => (select.selectedIndex = 0));
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

}); 