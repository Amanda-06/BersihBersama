<section id="laporan" class="tab-content hidden space-y-6">
    <div>
        <h2 class="text-3xl font-bold text-slate-900 mb-2">Laporan Sampah</h2>
        <p class="text-gray-500">Kelola dan pantau semua laporan sampah Anda</p>
    </div>

    <div class="bg-white border border-gray-200 rounded-2xl p-5 flex items-end gap-4 shadow-sm">
        <div class="flex-1">
            <label class="block text-sm font-semibold text-slate-700 mb-2">Status</label>
            <select id="filter-status" class="w-full bg-slate-50 border border-gray-300 text-slate-700 rounded-lg p-3 outline-none focus:border-[#1a8e5f] focus:ring-2 focus:ring-[#1a8e5f]/20 transition cursor-pointer">
                <option value="semua">Semua Status</option>
                <option value="menunggu">Tertunda / Menunggu</option>
                <option value="diproses">Diproses</option>
                <option value="selesai">Selesai</option>
                <option value="ditolak">Ditolak</option>
            </select>
        </div>
        <div class="flex-1">
            <label class="block text-sm font-semibold text-slate-700 mb-2">Kategori Sampah</label>
            <select id="filter-kategori" class="w-full bg-slate-50 border border-gray-300 text-slate-700 rounded-lg p-3 outline-none focus:border-[#1a8e5f] focus:ring-2 focus:ring-[#1a8e5f]/20 transition cursor-pointer">
                <option value="semua">Semua Kategori</option>
                <option value="organik">Organik</option>
                <option value="anorganik">Anorganik</option>
                <option value="b3">B3 (Berbahaya)</option>
            </select>
        </div>
        <button id="btn-reset-laporan" class="bg-white border border-gray-300 text-gray-700 font-semibold px-6 py-3 rounded-lg hover:bg-gray-50 transition shadow-sm">Reset</button>
    </div>

    <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden shadow-sm">
        <table class="w-full text-left text-sm text-gray-600">
            <thead class="bg-slate-50 border-b border-gray-200">
                <tr>
                    <th class="p-4 font-semibold text-slate-800">Judul</th>
                    <th class="p-4 font-semibold text-slate-800">Jenis</th>
                    <th class="p-4 font-semibold text-slate-800">Lokasi</th>
                    <th class="p-4 font-semibold text-slate-800">Jumlah</th>
                    <th class="p-4 font-semibold text-slate-800">Status</th>
                    <th class="p-4 font-semibold text-slate-800">Tanggal</th>
                    <th class="p-4 font-semibold text-slate-800">Aksi</th>
                </tr>
            </thead>
            <tbody id="laporan-tbody" class="divide-y divide-gray-100">
                
                <tr class="laporan-row hover:bg-slate-50 transition" data-status="menunggu" data-kategori="b3">
                    <td class="p-4 max-w-xs">
                        <p class="font-bold text-slate-900 mb-1">Sampah Elektronik Ditinggalkan</p>
                        <p class="text-xs text-gray-500 leading-relaxed">Ditemukan sampah elektronik (monitor rusak) di dekat pintu masuk kompleks.</p>
                    </td>
                    <td class="p-4"><span class="bg-slate-100 border border-gray-200 px-2 py-1 rounded text-xs font-medium text-slate-700 text-center block w-max">B3<br>(Berbahaya)</span></td>
                    <td class="p-4">Pintu Masuk Utama</td>
                    <td class="p-4 font-medium text-slate-700">1 unit monitor</td>
                    <td class="p-4"><span class="bg-yellow-50 text-yellow-700 border border-yellow-200 px-3 py-1.5 rounded-full text-[11px] font-bold">Menunggu</span></td>
                    <td class="p-4 text-gray-500">18 Jun 2024</td>
                    <td class="p-4">
                        <button onclick="bukaDetailLaporan(event)" class="font-semibold text-[#1a8e5f] hover:text-emerald-700 transition text-xs outline-none">
                            Lihat &rarr;
                        </button>
                    </td>
                </tr>

                <tr class="laporan-row hover:bg-slate-50 transition" data-status="diproses" data-kategori="anorganik">
                    <td class="p-4 max-w-xs">
                        <p class="font-bold text-slate-900 mb-1">Tumpukan Sampah Plastik</p>
                        <p class="text-xs text-gray-500 leading-relaxed">Tumpukan sampah plastik menumpuk di area taman bermain anak.</p>
                    </td>
                    <td class="p-4"><span class="bg-slate-100 border border-gray-200 px-2 py-1 rounded text-xs font-medium text-slate-700 text-center block w-max">Anorganik</span></td>
                    <td class="p-4">Dekat Taman Kompleks</td>
                    <td class="p-4 font-medium text-slate-700">&plusmn; 50 liter</td>
                    <td class="p-4"><span class="bg-blue-50 text-blue-700 border border-blue-200 px-3 py-1.5 rounded-full text-[11px] font-bold">Diproses</span></td>
                    <td class="p-4 text-gray-500">15 Jun 2024</td>
                    <td class="p-4">
                        <button onclick="bukaDetailLaporan(event)" class="font-semibold text-[#1a8e5f] hover:text-emerald-700 transition text-xs outline-none">
                            Lihat &rarr;
                        </button>
                    </td>
                </tr>

                <tr class="laporan-row hover:bg-slate-50 transition" data-status="selesai" data-kategori="organik">
                    <td class="p-4 max-w-xs">
                        <p class="font-bold text-slate-900 mb-1">Sampah Organik di Area Parkir</p>
                        <p class="text-xs text-gray-500 leading-relaxed">Sampah daun dan sisa makanan berserakan di area parkir.</p>
                    </td>
                    <td class="p-4"><span class="bg-slate-100 border border-gray-200 px-2 py-1 rounded text-xs font-medium text-slate-700 text-center block w-max">Organik</span></td>
                    <td class="p-4">Area Parkir Blok B</td>
                    <td class="p-4 font-medium text-slate-700">&plusmn; 30 liter</td>
                    <td class="p-4"><span class="bg-emerald-50 text-emerald-700 border border-emerald-200 px-3 py-1.5 rounded-full text-[11px] font-bold">Selesai</span></td>
                    <td class="p-4 text-gray-500">10 Jun 2024</td>
                    <td class="p-4">
                        <button onclick="bukaDetailLaporan(event)" class="font-semibold text-[#1a8e5f] hover:text-emerald-700 transition text-xs outline-none">
                            Lihat &rarr;
                        </button>
                    </td>
                </tr>

                <tr class="laporan-row hover:bg-slate-50 transition" data-status="selesai" data-kategori="anorganik">
                    <td class="p-4 max-w-xs">
                        <p class="font-bold text-slate-900 mb-1">Sampah Kertas Berserakan</p>
                        <p class="text-xs text-gray-500 leading-relaxed">Sampah kertas dan kardus berserakan di sekitar tong sampah.</p>
                    </td>
                    <td class="p-4"><span class="bg-slate-100 border border-gray-200 px-2 py-1 rounded text-xs font-medium text-slate-700 text-center block w-max">Anorganik</span></td>
                    <td class="p-4">Area Pengumpulan Sampah</td>
                    <td class="p-4 font-medium text-slate-700">&plusmn; 20 liter</td>
                    <td class="p-4"><span class="bg-emerald-50 text-emerald-700 border border-emerald-200 px-3 py-1.5 rounded-full text-[11px] font-bold">Selesai</span></td>
                    <td class="p-4 text-gray-500">8 Jun 2024</td>
                    <td class="p-4">
                        <button onclick="bukaDetailLaporan(event)" class="font-semibold text-[#1a8e5f] hover:text-emerald-700 transition text-xs outline-none">
                            Lihat &rarr;
                        </button>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
    
    <div class="bg-white border border-gray-200 rounded-xl p-4 text-sm text-gray-500 shadow-sm flex items-center" id="laporan-count-text">
        Menampilkan <span class="text-slate-900 font-bold mx-1">4</span> laporan
    </div>
</section>