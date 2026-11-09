<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Portofolio</title>
    <script src="https://jsdelivr.net"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Tambah Portofolio Baru</h2>
        
        <form action="{{ route('portofolio.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Judul Project</label>
                <input type="text" name="judul" class="w-full border p-2 rounded focus:outline-blue-500" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Deskripsi Project</label>
                <textarea name="deskripsi" rows="4" class="w-full border p-2 rounded focus:outline-blue-500" required></textarea>
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 font-bold mb-2">Upload Gambar</label>
                <input type="file" name="gambar" class="w-full border p-1 rounded bg-gray-50" required>
            </div>
            <div class="flex justify-between items-center">
                <a href="{{ route('portofolio.index') }}" class="text-gray-600 hover:underline">Kembali</a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700">Simpan</button>
            </div>
        </form>
    </div>
</body>
</html>