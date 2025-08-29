@extends ('layout.dashboard')

@section('content')

<div class="max-w mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="bg-white shadow-md rounded-lg p-6">
        <h1 class="text-3xl font-semibold text-gray-800">Pengelolaan Barang</h1>
        <p class="mt-2 text-gray-600">Manage your items effectively!</p>
    </div>

    <div class="w-full flex justify-between items-center mb-3 mt-4 pl-3">
        <div class="ml-3">
            <div class="w-full max-w-sm min-w-[200px] relative">
                <div class="join">
                    <div>
                        <div>
                            <input class="input join-item" placeholder="Search" />
                        </div>
                    </div>
                    <div class="indicator">
                        <button class="btn join-item">Search</button>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <!-- Modal toggle -->
            <div class="flex justify-center m-5">
                <button onclick="my_modal_3.showModal()" class="btn btn-neutral" type="button">
                    <i class="bi bi-plus"></i>Create Items
                </button>
            </div>

        </div>
    </div>

    <div class="overflow-x-auto mb-4">
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
                @foreach ($barangs as $barang)
                <tr>
                    <th>
                        <label>
                            <input type="checkbox" class="checkbox" />
                        </label>
                    </th>
                    <td>
                        <div class="flex items-center gap-3">
                            <div class="avatar">
                                <div class="mask mask-squircle h-12 w-12">
                                    <img
                                        src="{{ $barang->image ? asset('storage/'.$barang->image) : 'https://img.daisyui.com/images/profile/demo/2@94.webp'}}"
                                        alt="gambar" />
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
                    <th>
                        <a href="" class="btn btn-neutral">Edit</a>
                        <form action="{{ route('barang.destroy', $barang->id) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-error">Delete</button>
                        </form>
                    </th>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Main modal -->
    <dialog id="my_modal_3" class="modal">
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


    <a href="/dashboard" class="mt-4 btn"><i class="bi bi-back"></i>Back to page</a>

</div>

@endsection