<?php

namespace App\Http\Controllers;

use App\Models\CctvService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application as ApplicationAlias;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CctvServiceController extends Controller
{
    public function index(Request $request): View|ApplicationAlias|Factory|Application
    {
        $keyword = $request->input('keyword');

        $cctv_services = CctvService::when($keyword, function ($query) use ($keyword) {
            $query->where('name', 'like', '%' . $keyword . '%');
        })->latest()->get();

        return view('admin.cctv_services.index')
            ->with('cctv_services', $cctv_services)
            ->with('title', 'CCTV Services');
    }

    public function create(): View|ApplicationAlias|Factory|Application
    {
        return view('admin.cctv_services.create')->with('title', 'Create CCTV Services');
    }

    protected function validator(array $data): \Illuminate\Validation\Validator
    {
        return Validator::make($data, [
            'name' => 'required|unique:cctv_services|max:50',
            'description' => 'required',
            'price' => 'required|numeric|min:0.01',
        ], [
            'name.required' => 'Nama layanan CCTV harus diisi.',
            'name.unique' => 'Nama layanan CCTV sudah ada.',
            'name.max' => 'Nama layanan CCTV tidak boleh lebih dari :max karakter.',
            'description.required' => 'Deskripsi layanan CCTV harus diisi.',
            'price.required' => 'Harga layanan CCTV harus diisi.',
            'price.numeric' => 'Harga layanan CCTV harus berupa angka.',
            'price.min' => 'Harga layanan CCTV harus lebih dari :min.',
            'image.required' => 'Gambar layanan CCTV harus diisi.',
            'image.image' => 'File harus berupa gambar.',
            'image.mimes' => 'Format gambar yang diperbolehkan: jpeg, png, jpg, gif.',
            'image.max' => 'Ukuran gambar tidak boleh lebih dari :max KB.',
        ]);
    }


    public function store(Request $request): RedirectResponse
    {
        $data = $request->all();

        $validator = $this->validator($data);

        $validator->addRules([
            'image' => '|required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $imageName = uniqid() . '.' . $data['image']->getClientOriginalExtension();
        $image = $data['image']->storeAs('cctv_images', $imageName, 'public');

        CctvService::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'price' => $data['price'],
            'image' => $image,
        ]);

        return redirect('/admin/cctv-services')
            ->with('success', 'Layanan CCTV berhasil ditambahkan.');
    }

    public function edit(CctvService $cctvService): View|ApplicationAlias|Factory|Application
    {
        return view('admin.cctv_services.edit')
            ->with('title', 'Edit CCTV Services')
            ->with('cctvService', $cctvService);
    }

    public function update(Request $request, CctvService $cctvService): ApplicationAlias|Redirector|Application|RedirectResponse
    {
        $data = $request->all();

        $temp = $data['name'];
        if ($data['name'] === $cctvService->name) {
            $data['name'] = "temp";
        }

        $validator = $this->validator($data);

        if ($request->hasFile('image')) {
            $validator->addRules([
                'image' => '|required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
        }

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        if ($data['name'] === "temp") {
            $data['name'] = $temp;
        }

        $image = $cctvService->image;
        if ($request->hasFile('image')) {
            Storage::delete('public/' . $cctvService->image);

            $imageName = uniqid() . '.' . $data['image']->getClientOriginalExtension();
            $image = $data['image']->storeAs('cctv_images', $imageName, 'public');
        }

        $cctvService->update([
            'name' => $data['name'],
            'description' => $data['description'],
            'price' => $data['price'],
            'image' => $image,
        ]);

        return redirect('/admin/cctv-services')
            ->with('success', 'Layanan CCTV berhasil diperbarui.');
    }

    public function destroy(CctvService $cctvService): RedirectResponse
    {
        Storage::delete('public/' . $cctvService->image);

        $cctvService->delete();

        return redirect('/admin/cctv-services')
            ->with('success', 'Layanan CCTV berhasil dihapus.');
    }
}
