@extends ('layout.dashboard')

@section('content')
<div class=" mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Breadcrumb Navigation -->
    <div class="breadcrumbs text-sm mb-3">
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
                <a href="{{ route('peminjaman.index') }}">
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
                    Edit Peminjaman 
                </a>
            </li>
        </ul>
    </div>

    <!-- Page Header -->
    <div class=" mb-8">
        <h1 class="text-3xl font-bold ">Edit Peminjaman</h1>
        <p class="mt-2 text-neutral">Edit detail Peminjaman Anda di bawah!</p>
    </div>

    <!-- Form Card -->
    <div class="card bg-base-100 shadow-xl rounded-lg">
        <div class="card-body p-6 sm:p-8">
            <form action="{{ route('peminjaman.update', $peminjaman->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <!-- Name Field -->
                <div class="form-control">
                    <label class="label">
                        <span class="label-text text-base font-medium">Nama Barang</span>
                    </label>
                    <input type="text" value="{{ $peminjaman->nama_peminjam }}" name="nama_peminjam" placeholder="Masukkan nama barang"
                        class="input input-bordered input-neutral w-full focus:ring-2 focus:ring-neutral" required />
                </div>

                <!-- Quantity Field -->
                <div class="form-control">
                    <label class="label">
                        <span class="label-text text-base font-medium">Tanggal Pengembalian</span>
                    </label>
                    <input type="date" value="{{ $peminjaman->tanggal_kembali }}" name="tanggal_kembali" placeholder="Masukkan jumlah barang"
                        class="input input-bordered input-neutral w-full focus:ring-2 focus:ring-neutral" required />
                </div>

                <!-- Type Field -->
                <div class="form-control">
                    <label class="label">
                        <span class="label-text text-base font-medium">Keperluan</span>
                    </label>
                    <input type="text" value="{{ $peminjaman->keperluan }}" name="keperluan" placeholder="Masukkan tipe barang"
                        class="input input-bordered input-neutral w-full focus:ring-2 focus:ring-neutral" />
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text text-base font-medium">Telepon</span>
                    </label>
                    <input type="number" value="{{ $peminjaman->telepon }}" name="telepon" placeholder="Masukkan tipe barang"
                        class="input input-bordered input-neutral w-full focus:ring-2 focus:ring-neutral" />
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text text-base font-medium">Alamat</span>
                    </label>
                    <input type="alamat" value="{{ $peminjaman->alamat }}" name="alamat" placeholder="Masukkan tipe barang"
                        class="input input-bordered input-neutral w-full focus:ring-2 focus:ring-neutral" />
                </div>

                <!-- Form Actions -->
                <div class="flex justify-end space-x-4 mt-8 pt-4 border-t border-base-200">
                    <a href="{{ route('peminjaman.index') }}" class="btn btn-outline btn-neutral">
                        Batal
                    </a>
                    <button type="submit" class="btn btn-neutral gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Update Barang
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .file-input::file-selector-button {
        font-weight: 500;
        background-color: #404040;
        color: white;
        border: none;
        padding: 0.5rem 1rem;
        margin-right: 1rem;
        border-radius: 0.25rem;
    }

    .file-input::file-selector-button:hover {
        background-color: #262626;
    }
</style>

@endsection