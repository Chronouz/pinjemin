<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class ProfilController extends Controller
{
    public function index()
    {
        $user = User::with('profil')->findOrFail(Auth::id());

        // Buat profil default jika belum ada
        if (!$user->profil) {
            $user->profil()->create([
                'city' => null,
                'phone' => null,
                'image_path' => null,
            ]);
        }

        return view('profil.show', compact('user'))->with('editable', false);
    }

    public function edit()
    {
        $user = User::with('profil')->findOrFail(Auth::id());
        return view('profil.show', compact('user'))->with('editable', true);
    }

    public function update(Request $request)
    {
        $user = User::with('profil')->findOrFail(Auth::id());

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'city' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:15',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Validasi file gambar
        ]);

        // Simpan nama, kota, dan nomor telepon
        $user->update(['name' => $validated['name']]);
        $user->profil()->updateOrCreate(
            ['user_id' => $user->id],
            ['city' => $validated['city'], 'phone' => $validated['phone']]
        );

        // Simpan gambar profil jika ada
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('profiles', 'public');

            // Hapus gambar lama jika ada
            if ($user->profil && $user->profil->image_path) {
                Storage::disk('public')->delete($user->profil->image_path);
            }

            // Perbarui path gambar di database
            $user->profil()->update(['image_path' => $imagePath]);
        }
        Log::info('Cropped Image:', [$request->input('cropped_image')]);
        Log::info('All Request Data:', $request->all());
        
        return redirect()->route('profil.edit')->with('success', 'Profil berhasil diperbarui!');
    }
}
