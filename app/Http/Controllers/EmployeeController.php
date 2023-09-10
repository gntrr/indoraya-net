<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application as ApplicationAlias;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    public function index(Request $request): View|ApplicationAlias|Factory|Application
    {
        $keyword = $request->input('keyword');

        $employees = User::when($keyword, function ($query) use ($keyword) {
            $query->where('name', 'like', '%' . $keyword . '%');
        })->latest()->get();

        return view('admin.employees.index')
            ->with('employees', $employees)
            ->with('title', 'Employees');
    }

    public function create(): View|ApplicationAlias|Factory|Application
    {
        return view('admin.employees.create')->with('title', 'Create Employee');
    }

    protected function validator(array $data): \Illuminate\Validation\Validator
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'gender' => 'required|in:L,P',
            'date_of_birth' => 'required|date',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'name.required' => 'Kolom Nama Lengkap harus diisi.',
            'name.max' => 'Kolom Nama Lengkap tidak boleh lebih dari :max karakter.',
            'email.required' => 'Kolom Email harus diisi.',
            'email.email' => 'Format Email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'gender.required' => 'Pilih salah satu Jenis Kelamin.',
            'gender.in' => 'Pilihan Jenis Kelamin tidak valid.',
            'date_of_birth.required' => 'Kolom Tanggal Lahir harus diisi.',
            'date_of_birth.date' => 'Kolom Tanggal Lahir harus berupa tanggal.',
            'password.required' => 'Kolom Password harus diisi.',
            'password.string' => 'Kolom Password harus berupa teks.',
            'password.min' => 'Password harus memiliki minimal :min karakter.',
            'password.confirmed' => 'Konfirmasi Password tidak cocok.',
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->all();

        $validator = $this->validator($data);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data['role'] = 'employee';

        User::create($data);

        return redirect('/admin/employees')
            ->with('success', 'Pegawai berhasil ditambahkan.');
    }

    public function destroy(User $employee): RedirectResponse
    {
        $employee->delete();

        return redirect('/admin/employees')
            ->with('success', 'Pegawai berhasil dihapus.');
    }
}
