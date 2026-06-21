<section id="dashboard" class="tab-content block space-y-6">
    <div class="bg-emerald-50 rounded-2xl p-6 relative overflow-hidden flex gap-4 items-start shadow-sm border border-emerald-100">
        <i class="fa-solid fa-bullhorn text-3xl text-pink-500 mt-1"></i>
        <div>
            <h2 class="text-xl font-bold text-emerald-900 mb-2">Jadwal Pengambilan Sampah Baru</h2>
            <p class="text-sm text-emerald-700 leading-relaxed max-w-3xl">Mulai bulan depan, jadwal pengambilan sampah akan berubah menjadi Senin, Rabu, dan Jumat pukul 06:00 pagi. Mohon persiapkan sampah sejak malam sebelumnya.</p>
        </div>
        <button class="absolute top-4 right-4 text-emerald-700 hover:text-emerald-900 transition"><i class="fa-solid fa-xmark text-xl"></i></button>
        <div class="absolute bottom-4 right-4 flex items-center gap-2 bg-white text-emerald-800 px-3 py-1 rounded-full text-xs font-bold shadow-sm border border-emerald-100">
            <i class="fa-solid fa-chevron-left cursor-pointer hover:text-[#1a8e5f]"></i> 1 / 3 <i class="fa-solid fa-chevron-right cursor-pointer hover:text-[#1a8e5f]"></i>
        </div>
    </div>

    <div class="grid grid-cols-4 gap-6">
        <div class="bg-white border border-gray-200 rounded-2xl p-6 flex justify-between items-end shadow-sm">
            <div>
                <p class="text-gray-500 text-sm mb-1 font-medium">Total Laporan</p>
                <p class="text-3xl font-bold text-slate-900">4</p>
            </div>
            <div class="w-10 h-10 bg-emerald-100 rounded-lg flex items-center justify-center"><i class="fa-solid fa-clipboard text-emerald-600 text-lg"></i></div>
        </div>
        <div class="bg-white border border-gray-200 rounded-2xl p-6 flex justify-between items-end shadow-sm">
            <div>
                <p class="text-gray-500 text-sm mb-1 font-medium">Menunggu</p>
                <p class="text-3xl font-bold text-slate-900">1</p>
            </div>
            <div class="w-10 h-10 bg-yellow-100 rounded-lg flex items-center justify-center"><i class="fa-regular fa-clock text-yellow-600 text-lg"></i></div>
        </div>
        <div class="bg-white border border-gray-200 rounded-2xl p-6 flex justify-between items-end shadow-sm">
            <div>
                <p class="text-gray-500 text-sm mb-1 font-medium">Diproses</p>
                <p class="text-3xl font-bold text-slate-900">1</p>
            </div>
            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center"><i class="fa-solid fa-bolt text-blue-600 text-lg"></i></div>
        </div>
        <div class="bg-white border border-gray-200 rounded-2xl p-6 flex justify-between items-end shadow-sm">
            <div>
                <p class="text-gray-500 text-sm mb-1 font-medium">Selesai</p>
                <p class="text-3xl font-bold text-slate-900">2</p>
            </div>
            <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center"><i class="fa-regular fa-circle-check text-green-600 text-lg"></i></div>
        </div>
    </div>

    <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-lg font-bold text-slate-900">Laporan Terbaru</h3>
            <a href="#" class="text-sm font-semibold text-[#1a8e5f] hover:underline">Lihat semua &rarr;</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-gray-600">
                <thead>
                    <tr class="border-b border-gray-200">
                        <th class="pb-3 font-semibold text-slate-700">Judul</th>
                        <th class="pb-3 font-semibold text-slate-700">Jenis</th>
                        <th class="pb-3 font-semibold text-slate-700">Lokasi</th>
                        <th class="pb-3 font-semibold text-slate-700">Status</th>
                        <th class="pb-3 font-semibold text-slate-700">Tanggal</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <tr>
                        <td class="py-4 font-medium text-slate-800">Tumpukan Sampah Plastik di Dekat Taman</td>
                        <td class="py-4"><span class="bg-slate-100 border border-slate-200 px-3 py-1 rounded text-xs font-medium text-slate-700">Anorganik</span></td>
                        <td class="py-4">Dekat Taman Kompleks</td>
                        <td class="py-4"><span class="bg-blue-50 text-blue-700 border border-blue-200 px-3 py-1 rounded-full text-xs font-bold">Diproses</span></td>
                        <td class="py-4 text-gray-500">15 Jun 2024</td>
                    </tr>
                    <tr>
                        <td class="py-4 font-medium text-slate-800">Sampah Organik di Area Parkir</td>
                        <td class="py-4"><span class="bg-slate-100 border border-slate-200 px-3 py-1 rounded text-xs font-medium text-slate-700">Organik</span></td>
                        <td class="py-4">Area Parkir Blok B</td>
                        <td class="py-4"><span class="bg-emerald-50 text-emerald-700 border border-emerald-200 px-3 py-1 rounded-full text-xs font-bold">Selesai</span></td>
                        <td class="py-4 text-gray-500">10 Jun 2024</td>
                    </tr>
                    <tr>
                        <td class="py-4 font-medium text-slate-800">Sampah Elektronik Ditinggalkan</td>
                        <td class="py-4"><span class="bg-slate-100 border border-slate-200 px-3 py-1 rounded text-xs font-medium text-slate-700">B3 (Berbahaya)</span></td>
                        <td class="py-4">Pintu Masuk Utama</td>
                        <td class="py-4"><span class="bg-yellow-50 text-yellow-700 border border-yellow-200 px-3 py-1 rounded-full text-xs font-bold">Menunggu</span></td>
                        <td class="py-4 text-gray-500">18 Jun 2024</td>
                    </tr>
                    <tr>
                        <td class="py-4 font-medium text-slate-800">Sampah Kertas Berserakan</td>
                        <td class="py-4"><span class="bg-slate-100 border border-slate-200 px-3 py-1 rounded text-xs font-medium text-slate-700">Anorganik</span></td>
                        <td class="py-4">Area Pengumpulan Sampah</td>
                        <td class="py-4"><span class="bg-emerald-50 text-emerald-700 border border-emerald-200 px-3 py-1 rounded-full text-xs font-bold">Selesai</span></td>
                        <td class="py-4 text-gray-500">8 Jun 2024</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>