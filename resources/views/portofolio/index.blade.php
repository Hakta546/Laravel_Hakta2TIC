<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV & Portofolio</title>
    <script src="https://jsdelivr.net"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-4xl mx-auto">
        <!-- Bagian CV Ringkas -->
        <div class="bg-white p-6 rounded-lg shadow-md mb-8 text-center">
            <h1 class="text-3xl font-bold text-gray-800">Nama Anda, S.Kom</h1>
            <p class="text-blue-600 font-semibold">Web Developer / Programmer</p>
            <p class="text-gray-600 mt-2">Hubungi: email@anda.com | Pekanbaru, Indonesia</p>
        </div>

        <!-- Bagian Manajemen Portofolio -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Project Portofolio</h2>
            <a href="{{ route('portofolio.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700 transition">
                + Tambah Project
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded mb-4 shadow">
                {{ session('success') }}
            </div>
        @endif

        <!-- Grid Portofolio -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @forelse($portofolios as $item)
                <div class="bg-white rounded-lg shadow-md overflow-hidden flex flex-col justify-between">
                    <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" class="w-full h-48 object-cover">
                    <div class="p-4 flex-grow">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $item->judul }}</h3>
                        <p class="text-gray-600 text-sm mb-4">{{ $item->deskripsi }}</p>
                    </div>
                    <div class="p-4 bg-gray-50 flex gap-2 border-t border-gray-100">
                        <a href="{{ route('portofolio.edit', $item->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded text-sm hover:bg-yellow-600">
                            Edit
                        </a>
                        <form action="{{ route('portofolio.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded text-sm hover:bg-red-700">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="col-span-2 text-center text-gray-500 py-8 bg-white rounded-lg shadow">
                    Belum ada portofolio yang ditambahkan.
                </div>
            @endforelse
        </div>
    </div>
</body>
</html>