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
                    Peminjaman Barang
                </a>
            </li>
        </ul>
    </div>

    <x-modal-alert />

    <div class="bg-gradient-to-r mb-4 z-10 h-30 w-full relative mt-4 from-gray-700 to-gray-900 
            rounded-xl shadow-lg px-6 py-4 flex items-center justify-between">

        
        <div class="ml-3 w-full max-w-sm min-w-[200px]">
            <form method="GET" action="{{ route('peminjaman.index') }}" class="w-full">
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
                <i class="bi bi-plus"></i>
                <span class="ml-1">Create Items</span>
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
                    <th>Tanggal Kembali</th>
                    <th>Keperluan</th>
                    <th>Telepon</th>
                    <th>Alamat</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($peminjamans as $no=>$peminjam)
                <tr>
                    <th>
                        <div class="badge badge-ghost badge-md">{{ $no + 1 }}</div>
                    </th>
                    <td>{{ $peminjam->barang->name ?? 'Barang tidak ditemukan' }}</td>
                    <td>
                        <div class="flex items-center gap-3">
                            <div>
                                <div class="font-bold">{{ $peminjam->nama_peminjam }}</div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="badge badge-ghost badge-sm">{{ $peminjam->tanggal_kembali }}</span>
                    </td>
                    <td>{{ $peminjam->keperluan }}</td>
                    <td>{{ $peminjam->telepon }}</td>
                    <td>{{ $peminjam->alamat }}</td>
                    <th class="flex gap-2">
                        <a href="/peminjaman-barang/edit/{{ $peminjam->id }}" class="btn btn-neutral">Edit</a>
                        <!-- <form action="/peminjaman-barang/destroy/{{ $peminjam->id }}" method="POST" class="inline">
                            @csrf
                            <button class="btn bg-red-600 hover:bg-red-700 text-white border-0">
                                Delete
                            </button>
                        </form> -->
                        <form action="{{ route('peminjaman.kembalikan', $peminjam->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-warning">
                                Kembalikan
                            </button>
                        </form>
                    </th>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="">
            <div class="divider">
            </div>
            <div class="[&_*]:bg-white [&_*]:text-black [&_*]:border-gray-300 [&_svg]:text-black">
                {{ $peminjamans->links() }}
            </div>
        </div>

    </div>

    <!-- Main modal -->
    <dialog id="my_modal_create" class="modal">
        <div class="modal-box">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
            <h3 class="text-lg font-bold mb-4">Tambah Barang</h3>

            <form action="{{ route('peminjaman.submit') }}" method="POST" class="space-y-4">
                @csrf
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Pilih Barang</span>
                    </label>
                    <select class="input input-bordered w-full" name="id_barang" id="">
                        @foreach ($barangs as $barang )
                        <option value="{{ $barang->id }}">{{ $barang->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Nama</span>
                    </label>
                    <input type="text" name="nama_peminjam" placeholder="Masukkan nama barang"
                        class="input input-bordered w-full" required />
                </div>

                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Tanggal Kembali</span>
                    </label>
                    <input type="date" name="tanggal_kembali" placeholder="Masukkan jumlah barang"
                        class="input input-bordered w-full" required />
                </div>

                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Keperluan</span>
                    </label>
                    <input type="text" name="keperluan" placeholder="Masukkan tipe barang"
                        class="input input-bordered w-full" />
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Telepon</span>
                    </label>
                    <input type="text" name="telepon" placeholder="Masukkan tipe barang"
                        class="input input-bordered w-full" />
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Alamat</span>
                    </label>
                    <input type="text" name="alamat" placeholder="Masukkan tipe barang"
                        class="input input-bordered w-full" />
                </div>

                <div class="modal-action">
                    <button type="submit" class="btn btn-neutral">Simpan</button>
                </div>
            </form>
        </div>
    </dialog>

    <!-- edit modal -->



    <a href="{{ route('dashboard') }}" class="mt-4 btn"><i class="bi bi-back"></i>Back to page</a>

</div>

<style>
    .fade-out {
        opacity: 0;
        transition: opacity 0.5s ease-in-out;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const alertSuccess = document.getElementById('alert');
        if (alertSuccess) {
            // Tunda penghapusan elemen setelah 3 detik
            setTimeout(() => {
                // Tambahkan kelas fade-out untuk memicu transisi
                alertSuccess.classList.add('fade-out');

                // Hapus elemen sepenuhnya setelah transisi selesai (misalnya, setelah 0.5 detik)
                setTimeout(() => {
                    alertSuccess.style.display = 'none';
                }, 500); // Sesuaikan dengan durasi transisi di CSS Anda
            }, 3000); // Durasi sebelum efek fade out dimulai
        }
    });
</script>

@endsection