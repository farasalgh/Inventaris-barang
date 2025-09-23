<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangs = Barang::paginate(10);
        return view('kelolabarang.index', compact('barangs')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|string|max:255',
            'qty' => 'required|integer',
            'type' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $data = $request->only(['name', 'qty', 'type']);

        if($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $data['image'] = $imagePath;
        }
        Barang::create($data);

        return redirect()->route('kelolabarang.index')->with('succes', 'Barang berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id) 
    {
        //
        $barang = Barang::find($id);
        return view('kelolabarang.edit', compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
       $barang = Barang::find($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'qty' => 'required|integer',
            'type' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $barang->name = $request->name;
        $barang->qty = $request->qty;
        $barang->type = $request->type;
        if($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $barang->image = $imagePath;
        }
        $barang->update();

        return redirect()->route('kelolabarang.index')->with('succes', 'Barang berhasil diperbarui');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Barang $barang)
    {
        //
        $barang->delete();
        return redirect()->route('kelolabarang.index')->with('succes', 'Barang berhasil dihapus');
    }
}
