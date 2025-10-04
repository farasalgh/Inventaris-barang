@extends('layout.dashboard')

@section('content')
<div class="max-w sm:px-6 lg:px-8">

    <div class="breadcrumbs text-sm mb-3 p-6">
        <ul>
            <li>
                <a href="{{ route('dashboard') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" class="h-4 w-4 stroke-current">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                    </svg>
                    Home
                </a>
            </li>
            <li>
                <a>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" class="h-4 w-4 stroke-current">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                    </svg>
                    Laporan
                </a>
            </li>
        </ul>
    </div>

    <x-modal-alert />


    <div class="bg-gradient-to-r mb-4 z-10 h-30 w-full relative mt-4 from-gray-700 to-gray-900
    rounded-xl shadow-lg px-6 py-4 flex items-center justify-between">

        <div class="ml-3 w-full max-w-sm min-w-[200px]">
            <form method="GET" action="{{ route('laporan.index') }}" class="w-full">
                <div class="join w-full">
                    <select name="bulan"
                        class="select join-item w-full bg-white/10 backdrop-blur-md border border-white/20 text-white">
                        <option class="text-gray-400" value="">-- Semua Bulan --</option>
                        @foreach ($bulanTersedia as $b)
                        <option class="text-gray-700" value="{{ $b->format('Y-m') }}"
                            {{ request('bulan') == $b->format('Y-m') ? 'selected' : '' }}>
                            {{ $b->translatedFormat('F Y') }}
                        </option>
                        @endforeach
                    </select>
                    <button type="submit"
                        class="btn join-item bg-white/10 backdrop-blur-md border border-white/20 text-white hover:bg-white/20 transition">
                        <i class="bi bi-search"></i>
                        <span class="ml-1">Filter</span>
                    </button>
                </div>
            </form>
        </div>
    </div>


    <div class="overflow-x-auto bg-white shadow-lg p-4 rounded-lg mb-4">
        <table class="table">
            <thead>
                <tr>
                    <th>
                        <label>
                            <input type="checkbox" class="checkbox" />
                        </label>
                    </th>
                    <th>Nama Laporan</th>
                    <th>Periode</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($laporans as $no => $laporan)
                <tr>
                    <td>
                        <div class="badge badge-ghost badge-md">{{ $no + 1 }}</div>
                    </td>
                    <td>{{ $laporan->nama_laporan }}</td>
                    <td>
                        <span class="badge badge-ghost badge-sm">
                            {{ \Carbon\Carbon::parse($laporan->periode_mulai)->format('d M Y') }}
                            -
                            {{ \Carbon\Carbon::parse($laporan->periode_selesai)->format('d M Y') }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('laporan.cetak', $laporan->id) }}" target="_blank"
                            class="btn btn-neutral">
                            <i class="bi bi-printer"></i>
                            Cetak
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center text-gray-500">
                        Belum ada laporan
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div class="">
            <div class="divider">
            </div>
            <div class="[&_*]:bg-white [&_*]:text-black [&_*]:border-gray-300 [&_svg]:text-black">
                {{ $laporans->links() }}
            </div>
        </div>
    </div>

</div>

@endsection