<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Admin\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.user_management.index_user', compact('users'));
    }
    public function show()
    {
        return view('admin.user_management.show_user');
    }
    public function create()
    {
        return view('admin.user_management.create_user');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'           => 'required|string|max:255',
            'email'          => 'required|email|unique:users',
            'password'       => 'required|min:6|confirmed',
            'nip'            => 'nullable|string|max:50',
            'no_hp'          => 'nullable|string|max:20',
            'jabatan'        => 'nullable|string|max:100',
            'unit_kerja'     => 'nullable|string|max:100',
            'wilayah_kerja'  => 'nullable|string|max:100',
            'role'           => 'required|in:admin,super_admin',
            'image'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Hash password
        $validated['password'] = Hash::make($validated['password']);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('user_images', 'public');
            $validated['image'] = $imagePath; // Simpan path ke kolom 'image'
        }

        // Simpan user ke database
        User::create($validated);

        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan.');
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // Hapus foto profil jika ada
        if ($user->image && Storage::disk('public')->exists($user->image)) {
            Storage::disk('public')->delete($user->image);
        }

        // Hapus user dari database
        $user->delete();

        return redirect()->route('user.index')->with('success', 'User berhasil dihapus.');
    }
}
