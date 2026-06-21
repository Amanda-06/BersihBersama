<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - BiSa (Bersih Bersama)</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 text-slate-800 flex items-center justify-center min-h-screen p-4 font-sans antialiased">

    <div class="w-full max-w-sm bg-white rounded-2xl border border-gray-200 p-8 shadow-xl">
        
        <div class="flex flex-col items-center mb-6 text-center">
            <div class="w-12 h-12 bg-[#1a8e5f] rounded-xl flex items-center justify-center mb-4 shadow-md">
                <i class="fa-solid fa-leaf text-white text-2xl"></i>
            </div>
            <h1 class="text-2xl font-bold text-slate-900 mb-1 tracking-wide">BiSa</h1>
            <h2 class="text-[#1a8e5f] font-semibold text-sm mb-1">Bersih Bersama</h2>
            <p class="text-gray-500 text-xs">Platform Manajemen Sampah Komunitas</p>
        </div>

        <div class="bg-slate-100 p-1 rounded-xl flex mb-6 relative">
            <button type="button" id="btn-role-user" onclick="setRole('user')" 
                class="w-1/2 py-2.5 text-xs font-bold rounded-lg transition-all duration-200 bg-white text-slate-900 shadow-sm flex items-center justify-center gap-2">
                <i class="fa-solid fa-user text-[#1a8e5f]"></i> Warga (User)
            </button>
            <button type="button" id="btn-role-admin" onclick="setRole('admin')" 
                class="w-1/2 py-2.5 text-xs font-bold rounded-lg transition-all duration-200 text-slate-500 hover:text-slate-800 flex items-center justify-center gap-2">
                <i class="fa-solid fa-user-shield"></i> RT/RW (Admin)
            </button>
        </div>

        <form action="/" method="GET" class="space-y-4">
            <input type="hidden" name="role" id="role-input" value="user">

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Nomor HP</label>
                <input type="tel" placeholder="Contoh: 081234567890" 
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm text-slate-900 placeholder-gray-400 focus:outline-none focus:border-[#1a8e5f] focus:ring-2 focus:ring-[#1a8e5f]/20 transition bg-white">
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Email</label>
                <input type="email" id="login-email" placeholder="user@example.com" required 
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm text-slate-900 placeholder-gray-400 focus:outline-none focus:border-[#1a8e5f] focus:ring-2 focus:ring-[#1a8e5f]/20 transition bg-white">
            </div>
            
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Password</label>
                <input type="password" placeholder="••••••••" required 
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm text-slate-900 placeholder-gray-400 focus:outline-none focus:border-[#1a8e5f] focus:ring-2 focus:ring-[#1a8e5f]/20 transition bg-white">
            </div>

            <button type="submit" id="btn-submit" class="w-full bg-[#1a8e5f] hover:bg-emerald-700 text-white font-bold py-3 rounded-lg shadow-sm transition mt-2">
                Masuk sebagai Warga
            </button>
        </form>

        <div class="my-6 border-t border-gray-200"></div>

        <div class="text-center mb-6">
            <p class="text-xs text-[#1a8e5f] mb-3 font-semibold">Demo Credentials:</p>
            <div class="bg-slate-50 border border-gray-200 rounded-lg p-3 shadow-inner space-y-1.5">
                <div class="flex justify-between items-center text-xs font-mono text-gray-600">
                    <span class="text-[10px] text-gray-400 font-sans">Email:</span>
                    <span id="demo-email" class="tracking-wider">user@example.com</span>
                </div>
                <div class="flex justify-between items-center text-xs font-mono text-gray-600">
                    <span class="text-[10px] text-gray-400 font-sans">Pass:</span>
                    <span id="demo-password" class="tracking-wider">password123</span>
                </div>
            </div>
        </div>

        <div class="text-center space-y-4">
            <p class="text-sm text-gray-600">
                Belum punya akun? <a href="#" class="text-[#1a8e5f] hover:text-emerald-700 hover:underline font-bold transition">Daftar di sini</a>
            </p>
        </div>

    </div>

    <script>
        function setRole(role) {
            const btnUser = document.getElementById('btn-role-user');
            const btnAdmin = document.getElementById('btn-role-admin');
            const roleInput = document.getElementById('role-input');
            const inputEmail = document.getElementById('login-email');
            const btnSubmit = document.getElementById('btn-submit');
            const demoEmail = document.getElementById('demo-email');
            const demoPassword = document.getElementById('demo-password');

            if (role === 'user') {
                btnUser.className = "w-1/2 py-2.5 text-xs font-bold rounded-lg transition-all duration-200 bg-white text-slate-900 shadow-sm flex items-center justify-center gap-2";
                btnAdmin.className = "w-1/2 py-2.5 text-xs font-bold rounded-lg transition-all duration-200 text-slate-500 hover:text-slate-800 flex items-center justify-center gap-2";
                roleInput.value = 'user';
                inputEmail.placeholder = 'user@example.com';
                btnSubmit.textContent = 'Masuk sebagai Warga';
                btnSubmit.className = "w-full bg-[#1a8e5f] hover:bg-emerald-700 text-white font-bold py-3 rounded-lg shadow-sm transition mt-2";
                demoEmail.textContent = 'user@example.com';
                demoPassword.textContent = 'password123';
            } else {
                btnUser.className = "w-1/2 py-2.5 text-xs font-bold rounded-lg transition-all duration-200 text-slate-500 hover:text-slate-800 flex items-center justify-center gap-2";
                btnAdmin.className = "w-1/2 py-2.5 text-xs font-bold rounded-lg transition-all duration-200 bg-white text-slate-900 shadow-sm flex items-center justify-center gap-2";
                roleInput.value = 'admin';
                inputEmail.placeholder = 'admin@example.com';
                btnSubmit.textContent = 'Masuk sebagai Admin';
                btnSubmit.className = "w-full bg-slate-900 hover:bg-slate-800 text-white font-bold py-3 rounded-lg shadow-sm transition mt-2";
                demoEmail.textContent = 'admin@example.com';
                demoPassword.textContent = 'admin123';
            }
        }
    </script>
</body>
</html>