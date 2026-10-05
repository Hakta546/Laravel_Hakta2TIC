<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    public function index()
    {
        return 'Menampilkan data matakuliah';
    }

    public function create()
    {
        return 'Menampilkan form tambah matakuliah';
    }

    public function store(Request $request)
    {
        return 'Menyimpan data matakuliah baru';
    }

    public function show($kode = null)
    {
        if ($kode) {
            return 'Anda mengakses matakuliah ' . $kode;
        }

        return 'Masukkan kode matakuliah!';
    }

    public function edit($id)
    {
        return 'Menampilkan form edit matakuliah ' . $id;
    }

    public function update(Request $request, $id)
    {
        return 'Mengubah data matakuliah ' . $id;
    }

    public function destroy($id)
    {
        return 'Menghapus data matakuliah ' . $id;
    }
}