<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Portofolio</title>
    <script src="https://jsdelivr.net"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Edit Portofolio</h2>
        
        <form action="{{ route('portofolio.update', $portofolio->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Judul Project</label>
                <input type="text" name="judul" value="{{ $portofolio->judul }}" class="w-full border p-2 rounded focus:outline-blue-500" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Deskripsi Project</label>
                <textarea name="deskripsi" rows="4" class="w-full border p-2 rounded focus:outline-blue-500" required>{{ $portofolio->deskripsi }}</textarea>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Gambar Saat Ini</label>
                <img src="{{ asset('storage/' . $portofolio->gambar) }}" alt="Preview" class="w-32 h-20 object-cover rounded mb-2 border">
                <label class="block text-gray-500 text-xs mb-1">Ganti gambar baru (kosongkan jika tidak ingin mengubah):</label>
                <input type="file" name="gambar" class="w-full border p-1 rounded bg-gray-50">
            </div>
            <div class="flex justify-between items-center">
                <a href="{{ route('portofolio.index') }}" class="text-gray-600 hover:underline">Batal</a>
                <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded shadow hover:bg-yellow-600">Perbarui</button>
            </div>
        </form>
    </div>
</body>
</html>