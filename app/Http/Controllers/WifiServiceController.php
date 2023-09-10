<?php

namespace App\Http\Controllers;

use App\Models\WifiService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application as ApplicationAlias;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Validator;

class WifiServiceController extends Controller
{

    public function index(Request $request): View|ApplicationAlias|Factory|Application
    {
        $keyword = $request->input('keyword');

        $wifi_services = WifiService::when($keyword, function ($query) use ($keyword) {
            $query->where('name', 'like', '%' . $keyword . '%');
        })->latest()->get();

        return view('admin.wifi_services.index')
            ->with('wifi_services', $wifi_services)
            ->with('title', 'Wifi Services');
    }

    public function create(): View|ApplicationAlias|Factory|Application
    {
        return view('admin.wifi_services.create')->with('title', 'Create Wifi Services');
    }

    protected function validator(array $data): \Illuminate\Validation\Validator
    {
        return Validator::make($data, [
            'name' => 'required|unique:wifi_services|max:50',
            'description' => 'required|max:100',
            'speed' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0.01'
        ], [
            'name.required' => 'Nama layanan harus diisi.',
            'name.unique' => 'Nama layanan sudah digunakan.',
            'name.max' => 'Nama layanan tidak boleh lebih dari 50 karakter.',
            'description.required' => 'Deskripsi layanan harus diisi.',
            'description.max' => 'Deskripsi layanan tidak boleh lebih dari 100 karakter.',
            'speed.required' => 'Kecepatan harus diisi.',
            'speed.integer' => 'Kecepatan harus berupa angka.',
            'speed.min' => 'Kecepatan harus lebih besar dari 0.',
            'price.required' => 'Harga harus diisi.',
            'price.numeric' => 'Harga harus berupa angka.',
            'price.min' => 'Harga harus lebih besar dari 0.'
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

        WifiService::create($data);

        return redirect('/admin/wifi-services')
            ->with('success', 'Layanan Wi-Fi berhasil ditambahkan.');
    }

    public function edit(WifiService $wifiService): View|ApplicationAlias|Factory|Application
    {
        return view('admin.wifi_services.edit')
            ->with('wifiService', $wifiService)
            ->with('title', 'Edit Wifi Services');
    }

    public function update(Request $request, WifiService $wifiService): ApplicationAlias|Redirector|Application|RedirectResponse
    {
        $data = $request->all();

        $temp = $data['name'];
        if ($data['name'] === $wifiService->name) $data['name'] = "temp";

        $validator = $this->validator($data);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        if ($data['name'] == "temp") $data['name'] = $temp;

        $wifiService->update($data);

        return redirect('/admin/wifi-services')
            ->with('success', 'Layanan Wi-Fi berhasil diperbarui.');
    }

    public function destroy(WifiService $wifiService): RedirectResponse
    {
        $wifiService->delete();

        return redirect('/admin/wifi-services')
            ->with('success', 'Layanan Wi-Fi berhasil dihapus.');
    }
}
