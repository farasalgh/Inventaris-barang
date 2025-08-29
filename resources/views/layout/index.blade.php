<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventaris Barang - Modern Inventory</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gray-100 text-gray-900">

    <!-- Navbar -->
    <nav class="navbar bg-gray-50 border-b border-gray-200 shadow-sm sticky top-0 z-50 transition-all duration-300">
        <div class="container mx-auto px-4 flex justify-between items-center h-20">
            <!-- Brand/Logo -->
            <div class="flex-none">
                <a class="btn btn-ghost text-xl font-bold hover:bg-gray-200 transition-colors flex items-center gap-3"
                    href="/">
                    <div class="w-8 h-8 bg-gray-900 rounded-full flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-100" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                    </div>
                    <span class="font-sans">Inventaris Barang</span>
                </a>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden lg:flex items-center gap-4">
                <ul class="menu menu-horizontal px-1 items-center gap-1">
                    <li>
                        <a href="#"
                            class="hover:bg-gray-200 font-medium transition-all duration-300 rounded-lg px-4 py-2">
                            About
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="hover:bg-gray-200 font-medium transition-all duration-300 rounded-lg px-4 py-2">
                            Features
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="hover:bg-gray-200 font-medium transition-all duration-300 rounded-lg px-4 py-2">
                            Testimonials
                        </a>
                    </li>
                </ul>
                <div class="flex items-center gap-2 ml-4">
                    <a href="{{ Route('login') }}"
                        class="btn btn-sm bg-gray-900 text-gray-100 hover:bg-gray-700 border-none font-semibold px-6">
                        Login
                    </a>
                </div>
            </div>

            <!-- Mobile Menu Button -->
            <div class="lg:hidden flex items-center gap-2">
                <button id="mobile-menu-button" class="btn btn-ghost btn-square">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </nav>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden fixed inset-0 bg-gray-50/95 z-40 pt-20 px-4 backdrop-blur-sm">
        <div class="flex flex-col space-y-6 p-6">
            <a href="#" class="text-2xl font-medium hover:text-gray-700 transition-colors">About</a>
            <a href="#" class="text-2xl font-medium hover:text-gray-700 transition-colors">Features</a>
            <a href="#" class="text-2xl font-medium hover:text-gray-700 transition-colors">Testimonials</a>
            <a href="#" class="btn bg-gray-900 text-gray-100 hover:bg-gray-700 border-none font-semibold mt-4">Login</a>
        </div>
    </div>

    <!-- Main Content -->
    <main class="min-h-screen">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-50 border-t border-gray-200 pt-16 pb-12">
        <div class="max-w-7xl mx-auto px-4">
            <!-- Footer Content -->
            <div class="grid grid-cols-1 md:grid-cols-12 gap-12 mb-12">
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
                            class="bg-gray-200 hover:bg-gray-300 p-2 rounded-full transition-all duration-300">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" />
                            </svg>
                        </a>
                        <a href="#"
                            class="bg-gray-200 hover:bg-gray-300 p-2 rounded-full transition-all duration-300">
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
                                class="p-2 rounded-full bg-gray-200 group-hover:bg-gray-300 transition-all duration-300">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <span class="text-gray-600 group-hover:text-gray-900 transition-colors">+62 123 4567 890</span>
                        </li>
                        <li class="flex items-center space-x-4 group">
                            <div
                                class="p-2 rounded-full bg-gray-200 group-hover:bg-gray-300 transition-all duration-300">
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Remove all theme toggling functionality; always use light theme
            document.documentElement.setAttribute('data-theme', 'light');
            localStorage.setItem('theme', 'light');

            // Remove theme toggle button if present
            const themeToggle = document.getElementById('theme-toggle');
            if (themeToggle) themeToggle.remove();
            const themeToggleMobile = document.getElementById('theme-toggle-mobile');
            if (themeToggleMobile) themeToggleMobile.remove();

            // Mobile menu toggle
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');

            let isMenuOpen = false;

            mobileMenuButton.addEventListener('click', function() {
                isMenuOpen = !isMenuOpen;
                if (isMenuOpen) {
                    mobileMenu.classList.remove('hidden');
                    document.body.style.overflow = 'hidden';
                } else {
                    mobileMenu.classList.add('hidden');
                    document.body.style.overflow = '';
                }
            });

            // Close menu when clicking on links
            mobileMenu.querySelectorAll('a').forEach(link => {
                link.addEventListener('click', () => {
                    mobileMenu.classList.add('hidden');
                    document.body.style.overflow = '';
                    isMenuOpen = false;
                });
            });

            // Close menu on ESC key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && isMenuOpen) {
                    mobileMenu.classList.add('hidden');
                    document.body.style.overflow = '';
                    isMenuOpen = false;
                }
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</body>

</html>