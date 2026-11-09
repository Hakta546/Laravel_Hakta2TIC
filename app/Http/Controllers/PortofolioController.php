<?php

namespace App\Http\Controllers;

use App\Models\Portofolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortofolioController extends Controller
{
    // 1. READ: Menampilkan semua data portofolio
    public function index()
{
    $portofolios = Portofolio::latest()->get();
    return view('portofolio.index', compact('portofolios'));
}

    // 2. CREATE: Menampilkan form tambah data
    public function create()
    {
        return view('portofolio.create');
    }

    // 3. CREATE: Menyimpan data baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048' // max 2MB
        ]);

        // Proses upload gambar
        $gambarPath = $request->file('gambar')->store('portofolio', 'public');

        Portofolio::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambarPath
        ]);

        return redirect()->route('portofolio.index')->with('success', 'Portofolio berhasil ditambahkan!');
    }

    // 4. UPDATE: Menampilkan form edit data
    public function edit(Portofolio $portofolio)
    {
        return view('portofolio.edit', compact('portofolio'));
    }

    // 5. UPDATE: Memperbarui data di database
    public function update(Request $request, Portofolio $portofolio)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Update data text biasa
        $portofolio->judul = $request->judul;
        $portofolio->deskripsi = $request->deskripsi;

        // Cek jika user mengunggah gambar baru
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama dari storage
            if ($portofolio->gambar) {
                Storage::disk('public')->delete($portofolio->gambar);
            }
            // Simpan gambar baru
            $portofolio->gambar = $request->file('gambar')->store('portofolio', 'public');
        }

        $portofolio->save();

        return redirect()->route('portofolio.index')->with('success', 'Portofolio berhasil diperbarui!');
    }

    // 6. DELETE: Menghapus data dan gambar
    public function destroy(Portofolio $portofolio)
    {
        // Hapus file gambar dari storage
        if ($portofolio->gambar) {
            Storage::disk('public')->delete($portofolio->gambar);
        }

        $portofolio->delete();

        return redirect()->route('portofolio.index')->with('success', 'Portofolio berhasil dihapus!');
    }
}