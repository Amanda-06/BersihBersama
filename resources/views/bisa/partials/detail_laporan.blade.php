<section id="detail-laporan" class="tab-content hidden space-y-6">
    <button onclick="kembaliKeLaporan()" class="text-[#1a8e5f] hover:text-emerald-700 font-semibold flex items-center gap-2 transition outline-none w-max">
        <i class="fa-solid fa-chevron-left text-sm"></i> Kembali ke Laporan
    </button>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="bg-white border border-gray-200 rounded-xl p-5 shadow-sm">
            <p class="text-[10px] text-gray-400 font-bold uppercase tracking-wider mb-1">Pelapor</p>
            <p class="text-xl font-bold text-slate-900">Ahmad Wijaya</p>
        </div>
        <div class="bg-white border border-gray-200 rounded-xl p-5 shadow-sm">
            <p class="text-[10px] text-gray-400 font-bold uppercase tracking-wider mb-1">Kategori</p>
            <p class="text-xl font-bold text-slate-900">Anorganik</p>
        </div>
        <div class="bg-white border border-gray-200 rounded-xl p-5 shadow-sm">
            <p class="text-[10px] text-gray-400 font-bold uppercase tracking-wider mb-1">Tanggal Laporan</p>
            <p class="text-xl font-bold text-slate-900">2024-06-15</p>
        </div>
    </div>

    <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm space-y-6">
        <div>
            <h3 class="text-lg font-bold text-slate-900 mb-3">Detail Laporan</h3>
            <div class="flex flex-wrap gap-2">
                <span class="bg-emerald-50 text-emerald-700 px-3 py-1 rounded-full text-xs font-bold border border-emerald-200">#Menumpuk</span>
                <span class="bg-emerald-50 text-emerald-700 px-3 py-1 rounded-full text-xs font-bold border border-emerald-200">#Berserakan</span>
            </div>
        </div>

        <div>
            <p class="text-[10px] text-gray-400 font-bold uppercase tracking-wider mb-1">Lokasi</p>
            <p class="text-sm font-semibold text-slate-800">Dekat Taman Kompleks</p>
        </div>

        <div>
            <p class="text-[10px] text-gray-400 font-bold uppercase tracking-wider mb-1">Deskripsi</p>
            <p class="text-sm text-gray-600 leading-relaxed">
                Ditemukan tumpukan sampah plastik yang menumpuk di area dekat taman kompleks. Memerlukan pembersihan segera.
            </p>
        </div>

        <div>
            <p class="text-[10px] text-gray-400 font-bold uppercase tracking-wider mb-2">Status Laporan</p>
            <span class="bg-blue-50 text-blue-700 border border-blue-200 px-3 py-1.5 rounded-full text-xs font-bold">Diproses</span>
        </div>

        <div class="flex gap-4 pt-4 border-t border-gray-100">
            <button class="flex-1 bg-[#1a8e5f] hover:bg-emerald-700 text-white font-bold py-3 rounded-lg shadow-sm transition">
                Edit Laporan
            </button>
            <button class="flex-1 bg-white border border-red-500 text-red-500 hover:bg-red-50 font-bold py-3 rounded-lg shadow-sm transition">
                Hapus Laporan
            </button>
        </div>
    </div>
</section>