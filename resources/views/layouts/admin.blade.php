<!DOCTYPE html>
<html lang="sw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans antialiased">

    <div class="flex h-screen overflow-hidden">
        <!-- SIDEBAR YA ADMIN -->
        <aside class="w-64 bg-slate-900 text-white flex flex-col justify-between">
            <div>
                <div class="p-5 text-xl font-bold border-b border-slate-800 text-blue-400">
                    Portfolio Admin
                </div>
                <nav class="mt-5 space-y-1 px-3">
                    <a href="{{ route('dashboard') }}" class="block py-2.5 px-4 rounded hover:bg-slate-800 transition">
                        📊 Dashboard
                    </a>
                    <a href="{{ route('admin.projects.index') }}" class="block py-2.5 px-4 rounded hover:bg-slate-800 transition">
                        🚀 Projects Management
                    </a>
                    <a href="{{ route('admin.events.index') }}" class="block py-2.5 px-4 rounded hover:bg-slate-800 transition">
                    📅 Matukio (Events)
                    </a>
                </nav>
            </div>

            <div class="p-4 border-t border-slate-800">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left py-2 px-4 bg-red-600 hover:bg-red-700 rounded text-white font-bold transition">
                        🚪 Logout
                    </button>
                </form>
            </div>
        </aside>

        <!-- ENEO KUU LA YALIYOMO (CONTENT) -->
        <div class="flex-1 flex flex-col overflow-y-auto">
            <!-- HEADER MPYA YA ADMIN -->
            <header class="bg-white shadow-sm p-4 flex justify-between items-center border-b">
                <h1 class="text-xl font-bold text-gray-800">@yield('page_title', 'Admin Panel')</h1>
                <span class="text-sm font-semibold text-gray-600">Karibu, {{ auth()->user()->name ?? 'Admin' }}</span>
            </header>

            <!-- MAIN CONTENT -->
            <main class="p-6">
                @yield('content')
            </main>
        </div>
    </div>

</body>
</html>