@extends ('layout.dashboard')

@section('content')
<div class="max-w mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- <div class="bg-white shadow-md rounded-lg p-6">
        <h1 class="text-3xl bg-gray  font-semibold text-gray-800">Dashboard</h1>
        <p class="mt-2 text-gray-600">Welcome {{ Auth::user()->name }} to your dashboard! 👋</p>
    </div> -->

    <div class="mt-5 flex flex-wrap justify-center items-center gap-4">

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Card 1: Pengelolaan Barang -->
            <a href="{{ route('kelolabarang.index') }}" class="card cursor-pointer hover:shadow-lg hover:bg-gray-50 bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                <div class="text-gray-700 h-12 w-12 items-center mb-3 bg-gray-100 p-2 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                    </svg>
                </div>
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-gray-500 font-semibold text-sm uppercase tracking-wide">Pengelolaan Barang</h2>
                </div>
                <div class="flex justify-between">
                    <p class="text-3xl font-bold text-gray-800">3,782</p>
                    <span class="text-green-600 font-medium text-sm flex items-center group">
                        Lihat Detail
                        <svg class="w-4 h-4 ml-1 transition-transform duration-200 group-hover:translate-x-1"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </span>
                </div>
            </a>

            <!-- Card 2: Peminjaman Barang -->
            <a class="card cursor-pointer hover:shadow-lg hover:bg-gray-50 bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                <div class="text-gray-700 bg-gray-100 p-2 w-12 h-12 mb-3 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                </div>
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-gray-500 font-semibold text-sm uppercase tracking-wide">Peminjaman Barang</h2>
                </div>
                <div class="flex justify-between">
                    <p class="text-3xl font-bold text-gray-800">2,149</p>
                    <span class="text-green-600 font-medium text-sm flex items-center group">
                        Lihat Detail
                        <svg class="w-4 h-4 ml-1 transition-transform duration-200 group-hover:translate-x-1"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </span>
                </div>
            </a>

            <!-- Card 3: Pengembalian Barang -->
            <a class="card cursor-pointer hover:shadow-lg hover:bg-gray-50 bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                <div class="text-gray-700 bg-gray-100 w-12 h-12 mb-3 p-2 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                </div>
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-gray-500 font-semibold text-sm uppercase tracking-wide">Pengembalian Barang</h2>
                </div>
                <div class="flex justify-between">
                    <p class="text-3xl font-bold text-gray-800">1,857</p>
                    <span class="text-green-600 font-medium text-sm flex items-center group">
                        Lihat Detail
                        <svg class="w-4 h-4 ml-1 transition-transform duration-200 group-hover:translate-x-1"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </span>
                </div>
            </a>

            <!-- Card 4: Laporan -->
            <a class="card hover:shadow-lg hover:bg-gray-50 bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                <div class="text-gray-700 bg-gray-100 h-12 w-12 mb-3 p-2 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-gray-500 font-semibold text-sm uppercase tracking-wide">Laporan</h2>
                </div>
                <div class="flex justify-between">
                    <p class="text-3xl font-bold text-gray-800">5,359</p>
                    <span class="text-green-600 font-medium text-sm flex items-center group">
                        Lihat Detail
                        <svg class="w-4 h-4 ml-1 transition-transform duration-200 group-hover:translate-x-1"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </span>
                </div>
            </a>



        </div>

    </div>
</div>


@endsection