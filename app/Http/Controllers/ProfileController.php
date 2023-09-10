<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    protected function validator(array $data): \Illuminate\Validation\Validator
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'gender' => 'required|in:L,P',
            'date_of_birth' => 'required|date',
        ], [
            'required' => 'Kolom :attribute harus diisi.',
            'string' => 'Kolom :attribute harus berupa teks.',
            'max' => 'Kolom :attribute tidak boleh lebih dari :max karakter.',
            'in' => 'Pilihan :attribute tidak valid.',
            'date' => 'Kolom :attribute harus berupa tanggal.',
        ]);
    }

    public function editProfile(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $user = auth()->user();

        return view('admin.profiles.edit_profile')
            ->with('user', $user)
            ->with('title', 'Edit Profile');
    }

    public function updateProfile(Request $request): RedirectResponse
    {
        $data = $request->all();
//        dd($data);

        $validator = $this->validator($data);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = auth()->user();

        $user->update([
            'name' => $request->input('name'),
            'gender' => $request->input('gender'),
            'date_of_birth' => $request->input('date_of_birth'),
        ]);

        return back()->with('success', 'Profil berhasil diperbarui.');
    }

    public function editPassword(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('admin.profiles.edit_password')
            ->with('title', 'Edit Profile');
    }

    public function updatePassword(Request $request): RedirectResponse
    {
        $user = auth()->user();

        $request->validate([
            'current_password' => 'required|current_password',
            'new_password' => 'required|string|min:8|confirmed',
        ], [
            'current_password.required' => 'Kolom password saat ini harus diisi.',
            'current_password.current_password' => 'Password saat ini tidak cocok.',
            'new_password.required' => 'Kolom password baru harus diisi.',
            'new_password.string' => 'Kolom password baru harus berupa teks.',
            'new_password.min' => 'Password baru harus memiliki minimal :min karakter.',
            'new_password.confirmed' => 'Konfirmasi password baru tidak cocok.',
        ]);

        $user->update([
            'password' => Hash::make($request->input('new_password')),
        ]);

        return back()->with('success', 'Password berhasil diperbarui.');
    }
}
