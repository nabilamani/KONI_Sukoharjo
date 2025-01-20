<?php

namespace App\Http\Controllers;

use App\Models\KoniStructures;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class KoniStructureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $strukturals = KoniStructures::all();

        return view('Koni.daftar', compact('strukturals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Koni.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'period' => 'required|string|max:50',
            'description' => 'nullable|string',
        ]);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '_' . Str::slug($file->getClientOriginalName());
            $path = $file->storeAs('public/img/koni', $filename);
            $data['photo'] = str_replace('public/', 'storage/', $path);
        }

        KoniStructures::create($data);

        return redirect()->route('konistructures.index')->with('success', 'Struktur KONI berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Menemukan data berdasarkan ID
        $konistructure = KoniStructures::findOrFail($id);
        return view('Koni.edit', compact('konistructure'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Menemukan data berdasarkan ID
        $konistructure = KoniStructures::findOrFail($id);

        // Validasi data
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'period' => 'required|string|max:50',
            'description' => 'nullable|string',
        ]);

        // Menangani jika ada file foto yang diupload
        if ($request->hasFile('photo')) {
            // Hapus foto lama jika ada
            if ($konistructure->photo) {
                Storage::delete(str_replace('storage/', 'public/', $konistructure->photo));
            }

            // Upload foto baru
            $file = $request->file('photo');
            $filename = time() . '_' . Str::slug($file->getClientOriginalName());
            $path = $file->storeAs('public/img/koni', $filename);
            $data['photo'] = str_replace('public/', 'storage/', $path);  // Menyimpan path foto dalam storage
        }

        // Update data struktural KONI
        $konistructure->update($data);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->back()->with('success', 'Struktur KONI berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $konistructure = KoniStructures::findOrFail($id);

        if ($konistructure->photo) {
            Storage::delete(str_replace('storage/', 'public/', $konistructure->photo));
        }

        $konistructure->delete();

        return redirect()->route('konistructures.index')->with('success', 'Struktur KONI berhasil dihapus!');
    }

    public function cetakStructure()
    {
        $konistructures = KoniStructures::orderBy('created_at', 'asc')->get();
        return view('Koni.cetak-struktural', compact('konistructures'));
    }

    public function showstruktur()
    {
        $strukturals = KoniStructures::all();
        // Kirim data ke view
        return view('viewpublik.profil.strukturalkoni', compact('strukturals'));
    }
}
