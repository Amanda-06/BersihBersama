<section id="pengumuman" class="tab-content hidden space-y-6">
    <div>
        <h2 class="text-3xl font-bold text-slate-900 mb-2">Pengumuman</h2>
        <p class="text-[#1a8e5f] font-medium">Berita dan informasi penting dari manajemen komunitas</p>
    </div>

    <!-- Filter Buttons (Ditambahkan atribut data-filter) -->
    <div class="bg-white border border-gray-200 rounded-2xl p-5 shadow-sm">
        <p class="text-sm font-bold text-slate-800 mb-3">Filter Berdasarkan Prioritas</p>
        <div class="flex gap-3" id="pengumuman-filters">
            <button data-filter="semua" class="bg-[#1a8e5f] text-white px-5 py-1.5 rounded text-sm font-bold shadow-sm">Semua</button>
            <button data-filter="penting" class="bg-white border border-gray-300 text-gray-600 hover:bg-gray-50 hover:text-slate-900 px-5 py-1.5 rounded text-sm font-semibold transition shadow-sm">Penting</button>
            <button data-filter="normal" class="bg-white border border-gray-300 text-gray-600 hover:bg-gray-50 hover:text-slate-900 px-5 py-1.5 rounded text-sm font-semibold transition shadow-sm">Normal</button>
            <button data-filter="biasa" class="bg-white border border-gray-300 text-gray-600 hover:bg-gray-50 hover:text-slate-900 px-5 py-1.5 rounded text-sm font-semibold transition shadow-sm">Biasa</button>
        </div>
    </div>

    <!-- Announcements List -->
    <div class="space-y-4">
        <!-- Pengumuman Penting (Ditambahkan data-priority="penting") -->
        <div data-priority="penting" class="pengumuman-card bg-white border border-gray-200 rounded-2xl p-6 shadow-sm hover:shadow-md transition duration-200 border-l-4 border-l-red-500">
            <h3 class="text-xl font-bold text-slate-900 mb-3">Jadwal Pengambilan Sampah Baru</h3>
            <div class="flex items-center gap-3 mb-4">
                <span class="bg-red-50 text-red-700 border border-red-200 px-2.5 py-0.5 rounded text-[10px] font-bold">Penting</span>
                <span class="text-gray-500 font-medium text-xs">Kamis, 20 Juni 2024</span>
            </div>
            <p class="text-gray-600 text-sm leading-relaxed mb-4">Mulai bulan depan, jadwal pengambilan sampah akan berubah menjadi Senin, Rabu, dan Jumat pukul 06:00 pagi. Mohon persiapkan sampah sejak malam sebelumnya.</p>
            <a href="#" class="font-semibold text-[#1a8e5f] text-sm hover:text-emerald-700 hover:underline transition">Baca selengkapnya &rarr;</a>
        </div>

        <!-- Pengumuman Normal (Ditambahkan data-priority="normal") -->
        <div data-priority="normal" class="pengumuman-card bg-white border border-gray-200 rounded-2xl p-6 shadow-sm hover:shadow-md transition duration-200 border-l-4 border-l-yellow-500">
            <h3 class="text-xl font-bold text-slate-900 mb-3">Program Daur Ulang Komunitas</h3>
            <div class="flex items-center gap-3 mb-4">
                <span class="bg-yellow-50 text-yellow-700 border border-yellow-200 px-2.5 py-0.5 rounded text-[10px] font-bold">Normal</span>
                <span class="text-gray-500 font-medium text-xs">Selasa, 18 Juni 2024</span>
            </div>
            <p class="text-gray-600 text-sm leading-relaxed mb-4">Kami dengan senang hati mengumumkan peluncuran program daur ulang komunitas. Sampah plastik dan kertas akan dikumpulkan khusus untuk didaur ulang.</p>
            <a href="#" class="font-semibold text-[#1a8e5f] text-sm hover:text-emerald-700 hover:underline transition">Baca selengkapnya &rarr;</a>
        </div>

        <!-- Pengumuman Biasa (Ditambahkan data-priority="biasa") -->
        <div data-priority="biasa" class="pengumuman-card bg-white border border-gray-200 rounded-2xl p-6 shadow-sm hover:shadow-md transition duration-200 border-l-4 border-l-blue-500">
            <h3 class="text-xl font-bold text-slate-900 mb-3">Pengingat: Pemisahan Sampah</h3>
            <div class="flex items-center gap-3 mb-4">
                <span class="bg-blue-50 text-blue-700 border border-blue-200 px-2.5 py-0.5 rounded text-[10px] font-bold">Biasa</span>
                <span class="text-gray-500 font-medium text-xs">Sabtu, 15 Juni 2024</span>
            </div>
            <p class="text-gray-600 text-sm leading-relaxed mb-4">Ingat untuk selalu memisahkan sampah organik dan anorganik. Hal ini memudahkan proses pengolahan dan mengurangi dampak lingkungan.</p>
            <a href="#" class="font-semibold text-[#1a8e5f] text-sm hover:text-emerald-700 hover:underline transition">Baca selengkapnya &rarr;</a>
        </div>
    </div>
</section>