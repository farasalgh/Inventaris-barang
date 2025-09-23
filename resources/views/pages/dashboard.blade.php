@extends('layout.dashboard')

@section('content')


<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-8">
    <div class="mb-8 flex flex-col md:flex-row justify-between items-center gap-4">
        <div>
            <h1 class="text-4xl font-bold text-black mb-1">Welcome To Dashboard {{ Auth::user()->name }}👋</h1>
            <p class="text-gray-500">manage your storage more efficiently now</p>
        </div>
        <div class="flex gap-3">
            <a href="{{ route('kelolabarang.index') }}" class="bg-black text-white px-6 py-2 rounded-full font-semibold shadow hover:opacity-80 transition">+ Add Items</a>
            <a href="#" class="border border-black text-black px-6 py-2 rounded-full font-semibold bg-transparent hover:bg-black/10 transition">Import Data</a>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        <!-- Card 1 -->
        <a href="{{ route('kelolabarang.index') }}" class="bg-black text-white rounded-2xl shadow p-8 relative overflow-hidden">
            <div class="absolute top-4 right-4">
                <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </div>
            <h2 class="uppercase text-sm font-medium mb-2 opacity-80">Total Items</h2>
            <div class="text-5xl font-bold mb-2">{{ $jumlah_barang }}</div>
            <span class="text-green-400 font-semibold text-xs">5↑ Increased from last month</span>
        </a>
        <!-- Card 2 -->
        <a href="{{ route('peminjaman.index') }}" class="bg-white text-black rounded-2xl shadow p-8 relative overflow-hidden">
            <div class="absolute top-4 right-4">
                <svg class="w-6 h-6 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </div>
            <h2 class="uppercase text-sm font-medium mb-2 opacity-80">total loans</h2>
            <div class="text-5xl font-bold mb-2">{{ $jumlah_peminjaman }}</div>
            <span class="text-green-400 font-semibold text-xs">6↑ Increased from last month</span>
        </a>
        <!-- Card 3 -->
        <div class="bg-white text-black rounded-2xl shadow p-8 relative overflow-hidden">
            <div class="absolute top-4 right-4">
                <svg class="w-6 h-6 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </div>
            <h2 class="uppercase text-sm font-medium mb-2 opacity-80">total return</h2>
            <div class="text-5xl font-bold mb-2">12</div>
            <span class="text-green-400 font-semibold text-xs">2↑ Increased from last month</span>
        </div>
        <!-- Card 4 -->
        <div class="bg-white text-black rounded-2xl shadow p-8 relative overflow-hidden">
            <div class="absolute top-4 right-4">
                <svg class="w-6 h-6 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </div>
            <h2 class="uppercase text-sm font-medium mb-2 opacity-80">total report</h2>
            <div class="text-5xl font-bold mb-2">2</div>
            <span class="text-gray-400 font-semibold text-xs">On Discuss</span>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Project Analytics -->
        <div class="col-span-2 bg-white rounded-2xl p-8 shadow flex flex-col">
            <h3 class="font-semibold text-lg mb-6 text-black">Borrowed Analytics</h3>
            <div id="chart"></div>
        </div>
        <!-- Reminders & Project List -->
        <div class="flex flex-col gap-6">
            <div class="bg-white rounded-2xl p-8 shadow">
                <h3 class="font-semibold text-lg mb-3 text-black">Reminders Report</h3>
                <div class="mb-2 text-black font-medium">Report From Borrowed</div>
                <div class="mb-4 text-sm text-gray-500">Time : 02:00pm - 04:00pm</div>
                <button class="bg-black text-white px-4 py-2 rounded-full font-semibold shadow hover:opacity-80 transition">Check Report</button>
            </div>
            <div class="bg-white rounded-2xl p-8 shadow">
                <div class="flex justify-between items-center mb-3">
                    <h3 class="font-semibold text-lg text-black">Items</h3>
                    <a href="{{ route('kelolabarang.index') }}" class="border border-black text-black rounded-full px-4 py-1 text-sm">+ New</a>
                </div>
                <ul class="space-y-3 text-sm">
                    @foreach($items->sortByDesc('created_at')->take(5) as $item)
                        <li class="flex items-center gap-2">
                            <span class="w-2 h-2 bg-green-600 rounded-full"></span>
                            <span class="font-medium text-black">{{ $item->name }}</span>
                            <span class="ml-auto text-xs text-gray-400">Added: {{ $item->created_at->format('M d, Y') }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection


@push('scripts')

<script>
document.addEventListener("DOMContentLoaded", function() {

    var labels = {!! json_encode($labels) !!};
    var totals = {!! json_encode($totals) !!};

    var options = {
        chart: {
            type: 'bar',
            height: 350,
            toolbar: { show: false }
        },
        series: [{
            name: 'Total Peminjaman',
            data: totals
        }],
        xaxis: {
            categories: labels,
            labels: {
                rotate: 0,
                style: {
                    colors: '#374151',
                    fontSize: '14px',
                    fontWeight: 500,
                }
            }
        },
        yaxis: {
            labels: {
                style: {
                    colors: '#374151',
                    fontSize: '13px',
                }
            }
        },
        plotOptions: {
            bar: {
                borderRadius: 8,
                columnWidth: '45%',
                distributed: true // tiap bar bisa warna beda
            }
        },
        colors: ['#106313', '#09750d'], // dipakai bergantian ke setiap bar
        fill: {
            type: 'pattern',
            pattern: {
                style: ['slantedLines'], // garis miring
                width: 6,
                height: 6,
                strokeWidth: 2
            }
        },
        grid: {
            borderColor: '#E5E7EB',
            strokeDashArray: 4,
        },
        dataLabels: {
            enabled: true,
            style: {
                fontSize: '13px',
                colors: ['#111827'],
            }
        },
        tooltip: {
            theme: 'light',
            y: {
                formatter: function(val) {
                    return val + "x dipinjam";
                }
            }
        },
        legend: { show: false }
    };

    var chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();
});
</script>
@endpush