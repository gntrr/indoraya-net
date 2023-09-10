<?php

namespace App\Http\Controllers;

use App\Models\Testimony;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application as ApplicationAlias;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Validator;

class TestimonyController extends Controller
{
    public function index(Request $request): View|ApplicationAlias|Factory|Application
    {
        $keyword = $request->input('keyword');

        $testimonies = Testimony::when($keyword, function ($query) use ($keyword) {
            $query->where('name', 'like', '%' . $keyword . '%');
        })->latest()->get();

        return view('admin.testimonies.index')
            ->with('testimonies', $testimonies)
            ->with('title', 'Testimonies');
    }

    public function create(): View|ApplicationAlias|Factory|Application
    {
        return view('admin.testimonies.create')->with('title', 'Create Testimony');
    }

    protected function validator(array $data): \Illuminate\Validation\Validator
    {
        return Validator::make($data, [
            'name' => 'required|string|max:50',
            'content' => 'required|string',
        ], [
            'name.required' => 'Nama harus diisi.',
            'name.string' => 'Nama harus berupa teks.',
            'name.max' => 'Nama tidak boleh lebih dari :max karakter.',
            'content.required' => 'Isi testimoni harus diisi.',
            'content.string' => 'Isi testimoni harus berupa teks.',
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

        Testimony::create($data);

        return redirect('/admin/testimonies')
            ->with('success', 'Testimoni berhasil ditambahkan.');
    }

    public function edit(Testimony $testimony): View|ApplicationAlias|Factory|Application
    {
        return view('admin.testimonies.edit')
            ->with('testimony', $testimony)
            ->with('title', 'Edit Testimony');
    }

    public function update(Request $request, Testimony $testimony): ApplicationAlias|Redirector|Application|RedirectResponse
    {
        $data = $request->all();

        $validator = $this->validator($data);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $testimony->update($data);

        return redirect('/admin/testimonies')
            ->with('success', 'Testimoni berhasil diperbarui.');
    }

    public function destroy(Testimony $testimony): RedirectResponse
    {
        $testimony->delete();

        return redirect('/admin/testimonies')
            ->with('success', 'Testimoni berhasil dihapus.');
    }
}
