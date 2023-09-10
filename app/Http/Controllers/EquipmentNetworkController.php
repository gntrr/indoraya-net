<?php

namespace App\Http\Controllers;

use App\Models\CctvService;
use App\Models\EquipmentNetwork;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application as ApplicationAlias;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class EquipmentNetworkController extends Controller
{
    public function index(Request $request): View|ApplicationAlias|Factory|Application
    {
        $keyword = $request->input('keyword');

        $equipment_networks = EquipmentNetwork::when($keyword, function ($query) use ($keyword) {
            $query->where('name', 'like', '%' . $keyword . '%');
        })->latest()->get();

        return view('admin.equipment_networks.index')
            ->with('equipment_networks', $equipment_networks)
            ->with('title', 'Equipment Networks');
    }

    public function create(): View|ApplicationAlias|Factory|Application
    {
        return view('admin.equipment_networks.create')->with('title', 'Create Network Equipment');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|unique:equipment_networks|max:50',
            'description' => 'required',
            'price' => 'required|numeric|min:0.01',
            'link' => 'required',
        ], [
            'name.required' => 'Nama peralatan jaringan harus diisi.',
            'name.unique' => 'Nama peralatan jaringan sudah ada.',
            'name.max' => 'Nama peralatan jaringan tidak boleh lebih dari :max karakter.',
            'description.required' => 'Deskripsi peralatan jaringan harus diisi.',
            'price.required' => 'Harga peralatan jaringan harus diisi.',
            'price.numeric' => 'Harga peralatan jaringan harus berupa angka.',
            'price.min' => 'Harga peralatan jaringan harus lebih dari :min.',
            'image.required' => 'Gambar peralatan jaringan harus diisi.',
            'image.image' => 'File harus berupa gambar.',
            'image.mimes' => 'Format gambar yang diperbolehkan: jpeg, png, jpg, gif.',
            'image.max' => 'Ukuran gambar tidak boleh lebih dari :max KB.',
            'link.required' => 'Tautan penjualan  harus diisi.',
        ]);
    }

    public function store(Request $request): ApplicationAlias|Redirector|Application|RedirectResponse
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
        $image = $data['image']->storeAs('equipment_images', $imageName, 'public');

        EquipmentNetwork::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'price' => $data['price'],
            'image' => $image,
            'link' => $data['link'],
        ]);

        return redirect('/admin/equipment-networks')
            ->with('success', 'Peralatan jaringan berhasil ditambahkan.');
    }

    public function edit(EquipmentNetwork $equipmentNetwork): View|ApplicationAlias|Factory|Application
    {
        return view('admin.equipment_networks.edit')
            ->with('title', 'Edit Network Equipment')
            ->with('equipmentNetwork', $equipmentNetwork);
    }

    public function update(Request $request, EquipmentNetwork $equipmentNetwork): ApplicationAlias|Redirector|Application|RedirectResponse
    {
        $data = $request->all();

        $temp = $data['name'];
        if ($data['name'] === $equipmentNetwork->name) {
            $data['name'] = "temp";
        }

        $validator = $this->validator($data);

        if ($request->hasFile('image')) {
            $validator->addRules([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
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

        $image = $equipmentNetwork->image;
        if ($request->hasFile('image')) {
            Storage::delete('public/' . $equipmentNetwork->image);

            $imageName = uniqid() . '.' . $data['image']->getClientOriginalExtension();
            $image = $data['image']->storeAs('equipment_images', $imageName, 'public');
        }

        $equipmentNetwork->update([
            'name' => $data['name'],
            'description' => $data['description'],
            'price' => $data['price'],
            'image' => $image,
        ]);

        return redirect('/admin/equipment-networks')
            ->with('success', 'Peralatan jaringan berhasil diperbarui.');
    }

    public function destroy(EquipmentNetwork $equipmentNetwork)
    {
        Storage::delete('public/' . $equipmentNetwork->image);

        $equipmentNetwork->delete();

        return redirect('/admin/equipment-networks')
            ->with('success', 'Peralatan jaringan berhasil dihapus.');
    }
}
