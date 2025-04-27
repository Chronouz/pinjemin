@extends('layout.main')

@section('content')
    <div class="max-w-2xl mx-auto mt-10 bg-white p-6 rounded-lg shadow-md">
        <div class="text-center mb-6">
            <img id="profileImage"
                src="{{ $user->profil?->image_path ? asset('storage/' . $user->profil->image_path) : asset('assets/img/logo.png') }}"
                class="w-24 h-24 rounded-full mx-auto">
            <h2 class="text-2xl font-semibold mt-4">Profil Saya</h2>
        </div>

        <form action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Nama --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-medium">Nama</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}"
                    class="w-full border border-gray-300 p-2 rounded" {{ $editable ? '' : 'disabled' }}>
            </div>

            {{-- Email --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-medium">Email</label>
                <input type="email" value="{{ $user->email }}" class="w-full border border-gray-300 p-2 rounded"
                    disabled>
            </div>

            {{-- Asal Kota --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-medium">Asal Kota</label>
                <input type="text" name="city" value="{{ old('city', $user->profil->city ?? '-') }}"
                    class="w-full border border-gray-300 p-2 rounded" {{ $editable ? '' : 'disabled' }}>
            </div>

            {{-- Nomor Telepon --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-medium">Nomor Telepon</label>
                <input type="text" name="phone" value="{{ old('phone', $user->profil->phone ?? '-') }}"
                    class="w-full border border-gray-300 p-2 rounded" {{ $editable ? '' : 'disabled' }}>
            </div>

            {{-- Foto Profil --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-medium">Foto Profil</label>
                <input type="file" id="imageInput" name="image" class="form-control" {{ $editable ? '' : 'disabled' }}>
            </div>


            {{-- Tombol --}}
            <div class="flex justify-between mt-4">
                @if ($editable)
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                        Simpan Perubahan
                    </button>
                    <a href="{{ route('profil') }}" class="bg-gray-300 px-4 py-2 rounded hover:bg-gray-400">
                        Kembali
                    </a>
                @else
                    <a href="{{ route('profil.edit') }}"
                        class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                        Edit Profil
                    </a>
                    <a href="{{ url('/') }}" class="bg-gray-300 px-4 py-2 rounded hover:bg-gray-400">
                        Kembali
                    </a>
                @endif
            </div>
        </form>
    </div>
@endsection
