<section id="buat-laporan" class="tab-content hidden space-y-6">
    <!-- Wrapper mx-auto untuk mendorong konten ke tengah -->
    <div class="max-w-3xl mx-auto space-y-6">
        
        <!-- Header -->
        <div>
            <h2 class="text-3xl font-bold text-slate-900 mb-2">Buat Laporan Baru</h2>
            <p class="text-[#1a8e5f] font-medium">Laporkan masalah sampah di area kompleks</p>
        </div>

        <!-- Form (max-w dipindah ke atas, form jadi w-full) -->
        <form class="w-full bg-white border border-gray-200 rounded-2xl p-8 space-y-6 shadow-sm">
            <div>
                <label class="block text-sm font-bold text-slate-800 mb-2">Judul Laporan <span class="text-red-500">*</span></label>
                <input type="text" placeholder="Contoh: Tumpukan Sampah Plastik di Dekat Taman" class="w-full bg-slate-50 border border-gray-300 text-slate-900 rounded-lg p-3 outline-none focus:border-[#1a8e5f] focus:ring-2 focus:ring-[#1a8e5f]/20 transition placeholder-gray-400">
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-800 mb-2">Deskripsi <span class="text-red-500">*</span></label>
                <textarea rows="4" placeholder="Jelaskan detail masalah sampah yang Anda temukan..." class="w-full bg-slate-50 border border-gray-300 text-slate-900 rounded-lg p-3 outline-none focus:border-[#1a8e5f] focus:ring-2 focus:ring-[#1a8e5f]/20 transition placeholder-gray-400"></textarea>
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-800 mb-2">Jenis Sampah <span class="text-red-500">*</span></label>
                <select class="w-full bg-slate-50 border border-gray-300 text-slate-900 rounded-lg p-3 outline-none focus:border-[#1a8e5f] focus:ring-2 focus:ring-[#1a8e5f]/20 transition">
                    <option>Organik</option>
                    <option>Anorganik</option>
                    <option>B3</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-800 mb-2">Lokasi <span class="text-red-500">*</span></label>
                <input type="text" placeholder="Contoh: Dekat Taman Kompleks, Area Parkir Blok B, dll" class="w-full bg-slate-50 border border-gray-300 text-slate-900 rounded-lg p-3 outline-none focus:border-[#1a8e5f] focus:ring-2 focus:ring-[#1a8e5f]/20 transition placeholder-gray-400">
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-800 mb-3">Tags (Pilih yang sesuai)</label>
                <div class="space-y-2">
                    <label class="flex items-center gap-3 cursor-pointer group">
                        <input type="checkbox" class="w-4 h-4 rounded border-gray-300 text-[#1a8e5f] focus:ring-[#1a8e5f] bg-white cursor-pointer">
                        <span class="text-sm text-gray-700 group-hover:text-slate-900 transition">Bau Menyengat</span>
                    </label>
                    <label class="flex items-center gap-3 cursor-pointer group">
                        <input type="checkbox" class="w-4 h-4 rounded border-gray-300 text-[#1a8e5f] focus:ring-[#1a8e5f] bg-white cursor-pointer">
                        <span class="text-sm text-gray-700 group-hover:text-slate-900 transition">Menumpuk</span>
                    </label>
                    <label class="flex items-center gap-3 cursor-pointer group">
                        <input type="checkbox" class="w-4 h-4 rounded border-gray-300 text-[#1a8e5f] focus:ring-[#1a8e5f] bg-white cursor-pointer">
                        <span class="text-sm text-gray-700 group-hover:text-slate-900 transition">Berserakan</span>
                    </label>
                </div>
            </div>

            <div class="flex gap-4 pt-4 border-t border-gray-100 mt-2">
                <button type="button" class="flex-1 bg-white border border-gray-300 hover:bg-gray-50 text-slate-700 font-bold py-3 rounded-lg transition shadow-sm">Batal</button>
                <button type="submit" class="flex-1 bg-[#1a8e5f] hover:bg-emerald-700 text-white font-bold py-3 rounded-lg shadow-sm transition">Buat Laporan</button>
            </div>
        </form>
    </div>
</section>