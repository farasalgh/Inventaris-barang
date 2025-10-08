<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventaris Barang - Modern Inventory</title>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <!-- Tambahkan Font Awesome untuk ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="min-h-screen bg-gray-50 text-gray-900 flex">
    <!-- Sidebar -->
    <div class="sidebar w-64 bg-white border-r border-gray-200 shadow-sm hidden md:block fixed h-full z-40 transition-all duration-300">
        <div class="p-6">
            <!-- Brand/Logo Sidebar -->
            <div class="flex items-center gap-3 mb-10">
                <div class="w-8 h-8 bg-gray-900 rounded-full flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-100" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                </div>
                <span class="font-bold text-lg">Inventaris</span>
            </div>

            <!-- Menu Navigasi -->
            <ul class="space-y-2">
                <li>
                    <a href="{{ route('dashboard') }}" class="flex items-center p-3 text-gray-700 rounded-lg hover:bg-gray-100 transition-all duration-300 group">
                        <i class="fas fa-tachometer-alt w-5 text-center mr-3 text-gray-500 group-hover:text-gray-700"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('kelolabarang.index') }}" class="flex items-center p-3 text-gray-700 rounded-lg hover:bg-gray-100 transition-all duration-300 group">
                        <i class="fas fa-boxes w-5 text-center mr-3 text-gray-500 group-hover:text-gray-700"></i>
                        <span>Items management</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('peminjaman.index') }}" class="flex items-center p-3 text-gray-700 rounded-lg hover:bg-gray-100 transition-all duration-300 group">
                        <i class="fas fa-hand-holding w-5 text-center mr-3 text-gray-500 group-hover:text-gray-700"></i>
                        <span>Borrowing Items</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('pengembalian.index') }}" class="flex items-center p-3 text-gray-700 rounded-lg hover:bg-gray-100 transition-all duration-300 group">
                        <i class="fas fa-undo-alt w-5 text-center mr-3 text-gray-500 group-hover:text-gray-700"></i>
                        <span>Return Items</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('laporan.index') }}" class="flex items-center p-3 text-gray-700 rounded-lg hover:bg-gray-100 transition-all duration-300 group">
                        <i class="fas fa-chart-bar w-5 text-center mr-3 text-gray-500 group-hover:text-gray-700"></i>
                        <span>Report</span>
                    </a>
                </li>
            </ul>

            <!-- Divider -->
            <div class="my-6 border-t border-gray-200"></div>

            <!-- Menu Tambahan -->
            <ul class="space-y-2">
                <!-- <li>
                    <a href="#" class="flex items-center p-3 text-gray-700 rounded-lg hover:bg-gray-100 transition-all duration-300 group">
                        <i class="fas fa-cog w-5 text-center mr-3 text-gray-500 group-hover:text-gray-700"></i>
                        <span>Setting</span>
                    </a>
                </li> -->
                <li>
                    <form action="/logout/submit" method="POST">
                        @csrf
                        <button type="submit" class="w-full flex items-center p-3 text-gray-700 rounded-lg hover:bg-gray-100 transition-all duration-300 group">
                            <i class="fas fa-sign-out-alt w-5 text-center mr-3 text-gray-500 group-hover:text-gray-700"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>

    <!-- Main Content Area -->
    <div class="main-content flex-1 md:ml-64">
        <!-- Navbar -->
        <nav class="navbar bg-white border-b border-gray-200 shadow-sm sticky top-0 z-30 transition-all duration-300">
            <div class="container mx-auto px-4 flex justify-between items-center h-16">
                <!-- Toggle Sidebar Button (Mobile) -->
                <div class="md:hidden flex items-center">
                    <button id="sidebar-toggle" class="btn btn-ghost btn-square">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>

                <!-- Brand/Logo (Mobile) -->
                <div class="md:hidden flex-none">
                    <a class="btn btn-ghost text-xl font-bold hover:bg-gray-200 transition-colors flex items-center gap-2"
                        href="/dashboard">
                        <div class="w-7 h-7 bg-gray-900 rounded-full flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-100" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                            </svg>
                        </div>
                        <span class="font-sans text-sm">Inventaris</span>
                    </a>
                </div>

                <!-- Desktop Search Menu -->
                <div class="hidden md:flex items-center gap-4 w-full max-w-md">
                    <form action="#" method="GET" class="flex items-center w-full">
                        <div class="relative w-full">
                            <input type="text" name="search" placeholder="Search..." class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400 transition-all" />
                            <span class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400">
                                <i class="fas fa-search"></i>
                            </span>
                        </div>
                    </form>
                </div>

                <!-- User Area -->
                <div class="flex items-center gap-3">
                    <div class="hidden md:flex flex-col text-right">
                        <span class="text-sm font-medium">{{ Auth::user()->name }}</span>
                        <span class="text-xs text-gray-500">{{ Auth::user()->email }}</span>
                    </div>
                    <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center">
                        <i class="fas fa-user text-gray-600"></i>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Mobile Sidebar Overlay -->
        <div id="sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden md:hidden"></div>

        <!-- Mobile Sidebar -->
        <div id="mobile-sidebar" class="fixed left-0 top-0 h-full w-64 bg-white border-r border-gray-200 shadow-sm z-50 transform -translate-x-full transition-transform duration-300 md:hidden">
            <div class="p-6">
                <!-- Brand/Logo Sidebar -->
                <div class="flex items-center gap-3 mb-10">
                    <div class="w-8 h-8 bg-gray-900 rounded-full flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-100" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                    </div>
                    <span class="font-bold text-lg">Inventaris</span>
                </div>

                <!-- Menu Navigasi -->
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('dashboard') }}" class="flex items-center p-3 text-gray-700 rounded-lg hover:bg-gray-100 transition-all duration-300 group">
                            <i class="fas fa-tachometer-alt w-5 text-center mr-3 text-gray-500 group-hover:text-gray-700"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('kelolabarang.index') }}" class="flex items-center p-3 text-gray-700 rounded-lg hover:bg-gray-100 transition-all duration-300 group">
                            <i class="fas fa-boxes w-5 text-center mr-3 text-gray-500 group-hover:text-gray-700"></i>
                            <span>Pengelola Barang</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('peminjaman.index') }}" class="flex items-center p-3 text-gray-700 rounded-lg hover:bg-gray-100 transition-all duration-300 group">
                            <i class="fas fa-hand-holding w-5 text-center mr-3 text-gray-500 group-hover:text-gray-700"></i>
                            <span>Peminjaman</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('pengembalian.index') }}" class="flex items-center p-3 text-gray-700 rounded-lg hover:bg-gray-100 transition-all duration-300 group">
                            <i class="fas fa-undo-alt w-5 text-center mr-3 text-gray-500 group-hover:text-gray-700"></i>
                            <span>Pengembalian</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-3 text-gray-700 rounded-lg hover:bg-gray-100 transition-all duration-300 group">
                            <i class="fas fa-chart-bar w-5 text-center mr-3 text-gray-500 group-hover:text-gray-700"></i>
                            <span>Laporan</span>
                        </a>
                    </li>
                </ul>

                <!-- Divider -->
                <div class="my-6 border-t border-gray-200"></div>

                <!-- Menu Tambahan -->
                <ul class="space-y-2">
                    <!-- <li>
                        <a href="#" class="flex items-center p-3 text-gray-700 rounded-lg hover:bg-gray-100 transition-all duration-300 group">
                            <i class="fas fa-cog w-5 text-center mr-3 text-gray-500 group-hover:text-gray-700"></i>
                            <span>Pengaturan</span>
                        </a>
                    </li> -->
                    <li>
                        <form action="/logout/submit" method="POST">
                            @csrf
                            <button type="submit" class="w-full flex items-center p-3 text-gray-700 rounded-lg hover:bg-gray-100 transition-all duration-300 group">
                                <i class="fas fa-sign-out-alt w-5 text-center mr-3 text-gray-500 group-hover:text-gray-700"></i>
                                <span>Logout</span>
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Main Content -->
        <main class="min-h-screen p-6">
            @yield('content')
            @stack('scripts')
        </main>

        <!-- Footer -->
        <footer class="bg-white border-t border-gray-200 pt-10 pb-8 px-6">
            <div class="max-w-7xl mx-auto">
                <!-- Footer Content -->
                <div class="grid grid-cols-1 md:grid-cols-12 gap-10 mb-10">
                    <!-- Brand Section -->
                    <div class="md:col-span-5 space-y-6">
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-gray-900 rounded-full flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-100" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold">Inventaris</h3>
                        </div>
                        <p class="text-base text-gray-600 leading-relaxed">
                            Modern inventory management system designed for efficiency and simplicity. Streamline your workflow with our intuitive platform.
                        </p>
                        <!-- Social Links -->
                        <div class="flex space-x-4">
                            <a href="#"
                                class="bg-gray-100 hover:bg-gray-200 p-2 rounded-full transition-all duration-300">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" />
                                </svg>
                            </a>
                            <a href="#"
                                class="bg-gray-100 hover:bg-gray-200 p-2 rounded-full transition-all duration-300">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z" />
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!-- Quick Links -->
                    <div class="md:col-span-3 space-y-4">
                        <h4 class="text-lg font-semibold">Quick Links</h4>
                        <ul class="space-y-3">
                            <li>
                                <a href="#"
                                    class="text-gray-600 hover:text-gray-900 transition-colors flex items-center space-x-3 group">
                                    <span class="w-1.5 h-1.5 bg-gray-300 rounded-full group-hover:bg-gray-900 transition-colors"></span>
                                    <span>About</span>
                                </a>
                            </li>
                            <li>
                                <a href="#"
                                    class="text-gray-600 hover:text-gray-900 transition-colors flex items-center space-x-3 group">
                                    <span class="w-1.5 h-1.5 bg-gray-300 rounded-full group-hover:bg-gray-900 transition-colors"></span>
                                    <span>Features</span>
                                </a>
                            </li>
                            <li>
                                <a href="#"
                                    class="text-gray-600 hover:text-gray-900 transition-colors flex items-center space-x-3 group">
                                    <span class="w-1.5 h-1.5 bg-gray-300 rounded-full group-hover:bg-gray-900 transition-colors"></span>
                                    <span>Testimonials</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- Contact Info -->
                    <div class="md:col-span-4 space-y-4">
                        <h4 class="text-lg font-semibold">Contact Us</h4>
                        <ul class="space-y-4">
                            <li class="flex items-center space-x-4 group">
                                <div
                                    class="p-2 rounded-full bg-gray-100 group-hover:bg-gray-200 transition-all duration-300">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                </div>
                                <span class="text-gray-600 group-hover:text-gray-900 transition-colors">+62 123 4567 890</span>
                            </li>
                            <li class="flex items-center space-x-4 group">
                                <div
                                    class="p-2 rounded-full bg-gray-100 group-hover:bg-gray-200 transition-all duration-300">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <span class="text-gray-600 group-hover:text-gray-900 transition-colors">info@inventaris.com</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Footer Bottom -->
                <div class="pt-8 border-t border-gray-200">
                    <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                        <p class="text-sm text-gray-500">© 2024 Inventaris Barang. All rights reserved.</p>
                        <div class="flex items-center space-x-6 text-sm">
                            <a href="#" class="text-gray-500 hover:text-gray-900 transition-colors">Privacy Policy</a>
                            <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                            <a href="#" class="text-gray-500 hover:text-gray-900 transition-colors">Terms of Service</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Remove all theme toggling functionality; always use light theme
            document.documentElement.setAttribute('data-theme', 'light');
            localStorage.setItem('theme', 'light');

            // Mobile sidebar toggle
            const sidebarToggle = document.getElementById('sidebar-toggle');
            const mobileSidebar = document.getElementById('mobile-sidebar');
            const sidebarOverlay = document.getElementById('sidebar-overlay');

            let isSidebarOpen = false;

            function toggleSidebar() {
                isSidebarOpen = !isSidebarOpen;
                if (isSidebarOpen) {
                    mobileSidebar.classList.remove('-translate-x-full');
                    sidebarOverlay.classList.remove('hidden');
                    document.body.style.overflow = 'hidden';
                } else {
                    mobileSidebar.classList.add('-translate-x-full');
                    sidebarOverlay.classList.add('hidden');
                    document.body.style.overflow = '';
                }
            }

            sidebarToggle.addEventListener('click', toggleSidebar);
            sidebarOverlay.addEventListener('click', toggleSidebar);

            // Close menu when clicking on links in mobile sidebar
            mobileSidebar.querySelectorAll('a, button').forEach(item => {
                item.addEventListener('click', () => {
                    if (window.innerWidth < 768) { // Only on mobile
                        mobileSidebar.classList.add('-translate-x-full');
                        sidebarOverlay.classList.add('hidden');
                        document.body.style.overflow = '';
                        isSidebarOpen = false;
                    }
                });
            });

            // Close menu on ESC key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && isSidebarOpen) {
                    mobileSidebar.classList.add('-translate-x-full');
                    sidebarOverlay.classList.add('hidden');
                    document.body.style.overflow = '';
                    isSidebarOpen = false;
                }
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

</body>

</html>