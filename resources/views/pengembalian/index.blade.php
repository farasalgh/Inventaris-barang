@extends ('layout.dashboard')

@section('content')

<div class="max-w sm:px-6 lg:px-8">
    <div class="breadcrumbs text-sm mb-3 p-6">
        <ul>
            <li>
                <a href="{{ route('dashboard') }}">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        class="h-4 w-4 stroke-current">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
                    </svg>
                    Home
                </a>
            </li>
            <li>
                <a>
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        class="h-4 w-4 stroke-current">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
                    </svg>
                    Pengembalian Barang
                </a>
            </li>
        </ul>
    </div>

    <x-modal-alert />

    <div class="bg-gradient-to-r mb-4 z-10 h-30 w-full relative mt-4 from-gray-700 to-gray-900 
            rounded-xl shadow-lg px-6 py-4 flex items-center justify-between">


        <div class="ml-3 w-full max-w-sm min-w-[200px]">
            <form method="GET" action="{{ route('pengembalian.index') }}" class="w-full">
                <div class="join w-full">
                    <input
                        type="text"
                        name="search"
                        value="{{ $search ?? '' }}"
                        placeholder="Search"
                        class="input join-item w-full bg-white/10 backdrop-blur-md border border-white/20 text-white placeholder-gray-300" />
                    <button type="submit"
                        class="btn join-item bg-white/10 backdrop-blur-md border border-white/20 text-white hover:bg-white/20 transition">
                        <i class="bi bi-search"></i>
                        <span class="ml-1">Search</span>
                    </button>
                </div>
            </form>
        </div>


        <div class="flex items-center ml-5">
            <button onclick="my_modal_create.showModal()"
                class="btn bg-white/10 backdrop-blur-md border border-white/20 text-white hover:bg-white/20 transition"
                type="button">
                <i class="bi bi-files"></i>
                <span class="ml-1">Create Reports</span>
            </button>
        </div>
    </div>

    <div class="overflow-x-auto bg-white shadow-lg p-4 rounded-lg mb-4">
        <table class="table">
            <!-- head -->
            <thead>
                <tr>
                    <th>
                        <label>
                            <input type="checkbox" class="checkbox" />
                        </label>
                    </th>
                    <th>Items</th>
                    <th>User</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Dikembaliakn</th>
                    <th>status</th>
                    <th>Alamat</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pengembalians as $no => $pengembali)
                <tr>
                    <!-- Nomor urut -->
                    <th>
                        <div class="badge badge-ghost badge-md">{{ $no + 1 }}</div>
                    </th>

                    <!-- Nama Barang -->
                    <td>{{ $pengembali->barang->name ?? 'Barang tidak ditemukan' }}</td>

                    <!-- Nama Peminjam -->
                    <td>
                        <div class="font-bold">{{ $pengembali->nama_peminjam }}</div>
                    </td>

                    <!-- Tanggal Pinjam -->
                    <td>
                        <span class="badge badge-ghost badge-sm">
                            {{ $pengembali->tanggal_pinjam }}
                        </span>
                    </td>

                    <!-- Tanggal Kembali (Rencana) -->
                    <td>{{ $pengembali->tanggal_kembali }}</td>

                    <!-- Tanggal Dikembalikan -->
                    <td>{{ $pengembali->tanggal_dikembalikan }}</td>

                    <!-- Status -->
                    <td>
                        @if ($pengembali->status == 'returned')
                        <div class="badge badge-success">
                            <svg class="size-[1em]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <g fill="currentColor" stroke-linejoin="miter" stroke-linecap="butt">
                                    <circle cx="12" cy="12" r="10" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></circle>
                                    <polyline points="7 13 10 16 17 8" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></polyline>
                                </g>
                            </svg>
                            Returned
                        </div>
                        @else
                        <div class="badge badge-warning">
                            <svg class="size-[1em]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                                <g fill="currentColor">
                                    <path d="M7.638,3.495L2.213,12.891c-.605,1.048,.151,2.359,1.362,2.359H14.425c1.211,0,1.967-1.31,1.362-2.359L10.362,3.495c-.605-1.048-2.119-1.048-2.724,0Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path>
                                    <line x1="9" y1="6.5" x2="9" y2="10" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></line>
                                    <path d="M9,13.569c-.552,0-1-.449-1-1s.448-1,1-1,1,.449,1,1-.448,1-1,1Z" fill="currentColor" data-stroke="none" stroke="none"></path>
                                </g>
                            </svg>
                            Late
                        </div>
                        @endif
                    </td>

                    <!-- Keperluan -->
                    <td>{{ $pengembali->keperluan }}</td>
                </tr>
                @endforeach
            </tbody>

        </table>
        <div class="">
            <div class="divider">
            </div>
            <div class="[&_*]:bg-white [&_*]:text-black [&_*]:border-gray-300 [&_svg]:text-black">
                {{ $pengembalians->links() }}
            </div>
        </div>

    </div>


    <!-- Modal Pilih Bulan -->
    <dialog id="my_modal_create" class="modal">
        <div class="modal-box bg-white text-black rounded-xl shadow-lg border border-gray-200 p-8 max-w-md w-full">
            <h3 class="font-bold text-xl mb-6 text-center tracking-tight">Generate Report by Month</h3>
            <form method="POST" action="{{ route('laporan.generate') }}" class="space-y-5">
                @csrf
                <label for="bulan" class="block mb-2 text-sm font-medium text-black">Select Month</label>
                <select name="bulan" id="bulan" class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-transparent text-black focus:ring-2 focus:ring-gray-300 focus:outline-none transition">
                    @foreach($availableMonths as $bulan)
                    <option value="{{ $bulan->format('Y-m') }}"
                        {{ request('bulan') == $bulan->format('Y-m') ? 'selected' : '' }}>
                        {{ $bulan->translatedFormat('F Y') }}
                    </option>
                    @endforeach
                </select>
                <button type="submit" class="w-full py-2 rounded-lg bg-black text-white font-semibold hover:bg-gray-800 transition">Generate</button>
            </form>
            <form method="dialog" class="mt-4">
                <button class="w-full py-2 rounded-lg border border-gray-300 text-black hover:bg-gray-100 transition">Cancel</button>
            </form>
        </div>
        <form method="dialog" class="modal-backdrop bg-opacity-30">
            <button aria-label="close"></button>
        </form>
    </dialog>




    <a href="{{ route('dashboard') }}" class="mt-4 btn"><i class="bi bi-back"></i>Back to page</a>

</div>



@endsection