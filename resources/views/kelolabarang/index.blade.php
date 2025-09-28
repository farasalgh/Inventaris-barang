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
                <a href="{{ route('kelolabarang.index') }}">
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
                    Kelola Barang
                </a>
            </li>
        </ul>
    </div>

    <x-modal-alert />

    <div class="bg-gradient-to-r mb-4 z-10 h-30 w-full relative mt-4 from-gray-700 to-gray-900 
            rounded-xl shadow-lg px-6 py-4 flex items-center justify-between">


        <div class="ml-3 w-full max-w-sm min-w-[200px]">
            <form method="GET" action="{{ route('kelolabarang.index') }}" class="w-full">
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
                    <th>Quantity</th>
                    <th>Type</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($barangs as $no=>$barang)
                <tr>
                    <th>
                        <div class="badge badge-ghost badge-md">{{ $no + 1 }}</div>
                    </th>
                    <td>
                        <div class="flex items-center gap-3">
                            <div class="avatar">
                                <div class="mask mask-squircle h-12 w-12">
                                    @if ($barang->image)
                                    <img src="{{ asset('storage/' . $barang->image) }}" alt="gambar" />
                                    @else
                                    <div class="w-12 h-12 mask mask-squircle bg-black/30 backdrop-blur-md border border-white/10 flex items-center justify-center shadow-md">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="w-6 h-6 text-white opacity-80"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l4.586-4.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div>
                                <div class="font-bold">{{ $barang->name }}</div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="badge badge-ghost badge-sm">{{ $barang->qty }}</span>
                    </td>
                    <td>{{ $barang->type }}</td>
                    <td class="flex gap-2">
                        <a href="/mengelola-barang/edit/{{ $barang->id }}" class="btn btn-neutral">Edit</a>
                        <form action="{{ route('barang.destroy', $barang->id) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button class="btn bg-red-600 hover:bg-red-700 text-white border-0">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="">
            <div class="divider">
            </div>
            <div class="[&_*]:bg-white [&_*]:text-black [&_*]:border-gray-300 [&_svg]:text-black">
                {{ $barangs->links() }}
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

            <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Nama Barang</span>
                    </label>
                    <input type="text" name="name" placeholder="Masukkan nama barang"
                        class="input input-bordered w-full" required />
                </div>

                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Quantity</span>
                    </label>
                    <input type="number" name="qty" placeholder="Masukkan jumlah barang"
                        class="input input-bordered w-full" required />
                </div>

                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Type</span>
                    </label>
                    <input type="text" name="type" placeholder="Masukkan tipe barang"
                        class="input input-bordered w-full" />
                </div>

                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Upload Gambar</span>
                    </label>
                    <input type="file" name="image" class="file-input file-input-neutral w-full" />
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

@endsection