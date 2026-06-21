<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BiSa - Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 text-slate-800 font-sans flex h-screen overflow-hidden antialiased">

    <aside id="sidebar" class="w-64 shrink-0 bg-white border-r border-gray-200 flex flex-col justify-between h-full shadow-sm z-20 transition-all duration-300 ease-in-out relative">
        <div>
            <div class="px-5 py-6 flex items-center justify-between mb-2">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 bg-[#1a8e5f] rounded flex items-center justify-center text-white font-bold text-lg shadow-sm">B</div>
                    <h1 class="text-xl font-bold text-slate-900 tracking-wide">BiSa</h1>
                </div>
                <button onclick="toggleSidebar()" class="text-gray-400 hover:text-[#1a8e5f] transition-colors p-2 rounded-lg hover:bg-emerald-50 outline-none" title="Tutup Menu">
                    <i class="fa-solid fa-bars-staggered text-lg"></i>
                </button>
            </div>

            <nav class="px-4 space-y-2 mt-2">
                <button onclick="switchTab('dashboard', this)" class="nav-btn active w-full flex items-center gap-3 px-4 py-3 rounded-xl bg-emerald-50 text-[#1a8e5f] font-bold transition">
                    <i class="fa-solid fa-chart-simple w-5 text-center"></i>
                    <span class="text-sm">Dashboard</span>
                </button>
                <button onclick="switchTab('laporan', this)" class="nav-btn w-full flex items-center gap-3 px-4 py-3 rounded-xl text-gray-500 hover:text-[#1a8e5f] hover:bg-emerald-50/50 transition font-medium">
                    <i class="fa-solid fa-clipboard-list w-5 text-center"></i>
                    <span class="text-sm">Laporan Saya</span>
                </button>
                <button onclick="switchTab('buat-laporan', this)" class="nav-btn w-full flex items-center gap-3 px-4 py-3 rounded-xl text-gray-500 hover:text-[#1a8e5f] hover:bg-emerald-50/50 transition font-medium">
                    <i class="fa-solid fa-pen w-5 text-center"></i>
                    <span class="text-sm">Buat Laporan</span>
                </button>
                <button onclick="switchTab('pengumuman', this)" class="nav-btn w-full flex items-center gap-3 px-4 py-3 rounded-xl text-gray-500 hover:text-[#1a8e5f] hover:bg-emerald-50/50 transition font-medium">
                    <i class="fa-solid fa-bullhorn w-5 text-center"></i>
                    <span class="text-sm">Pengumuman</span>
                </button>
            </nav>
        </div>

        <div class="p-4 relative">
            <div id="profile-dropdown" class="hidden absolute bottom-full left-4 right-4 mb-2 bg-white border border-gray-200 rounded-xl shadow-lg overflow-hidden z-50">
                <button onclick="switchTab('profil', null); closeDropdown();" class="w-full text-left px-4 py-3 flex items-center gap-3 hover:bg-slate-50 transition border-b border-gray-100">
                    <i class="fa-solid fa-user text-purple-600 w-5 text-center"></i>
                    <span class="text-sm font-semibold text-slate-700">Lihat Profil</span>
                </button>
                <a href="/login" class="w-full text-left px-4 py-3 flex items-center gap-3 hover:bg-red-50 transition">
                    <i class="fa-solid fa-door-open text-red-500 w-5 text-center"></i>
                    <span class="text-sm font-semibold text-red-600">Keluar</span>
                </a>
            </div>

            <div id="profile-menu-btn" class="bg-slate-50 border border-gray-200 rounded-xl p-3 flex items-center justify-between cursor-pointer hover:bg-slate-100 transition">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-[#1a8e5f] rounded-full flex items-center justify-center text-white font-bold shadow-sm">A</div>
                    <div>
                        <p class="text-sm font-bold text-slate-900">Ahmad Wijaya</p>
                        <p class="text-xs text-[#1a8e5f] font-semibold">A-101</p>
                    </div>
                </div>
                <button class="p-1 text-gray-500 hover:text-slate-800 transition">
                    <i class="fa-solid fa-ellipsis-vertical"></i>
                </button>
            </div>
        </div>
    </aside>

    <main class="flex-1 h-full overflow-y-auto p-8 relative scroll-smooth">
        
        <button id="open-sidebar-btn" onclick="toggleSidebar()" class="hidden mb-6 flex items-center gap-2 text-slate-500 hover:text-[#1a8e5f] transition-colors outline-none bg-white border border-gray-200 px-3 py-2 rounded-lg shadow-sm" title="Buka Menu">
            <i class="fa-solid fa-bars text-lg"></i>
        </button>

        @yield('content')
    </main>

</body>
</html>