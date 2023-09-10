<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CctvService;
use App\Models\EquipmentNetwork;
use App\Models\Testimony;
use App\Models\WifiService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class UserPageController extends Controller
{
    public function index(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $wifi_services = WifiService::latest()->take(3)->get();
        $cctv_services = CctvService::latest()->take(3)->get();
        $equipment_networks = EquipmentNetwork::latest()->take(3)->get();
        $testimonies = Testimony::latest()->take(3)->get();

        return view('user.home')
            ->with('wifi_services', $wifi_services)
            ->with('cctv_services', $cctv_services)
            ->with('equipment_networks', $equipment_networks)
            ->with('testimonies', $testimonies)
            ->with('title', 'Home');
    }

    public function wifi_services(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $wifi_services = WifiService::latest()->get();

        return view('user.wifi_services')
            ->with('wifi_services', $wifi_services)
            ->with('title', 'Wifi Services');
    }

    public function cctv_services(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $cctv_services = CctvService::latest()->get();

        return view('user.cctv_services')
            ->with('cctv_services', $cctv_services)
            ->with('title', 'CCTV Services');
    }

    public function equipment_networks(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $equipment_networks = EquipmentNetwork::latest()->take(3)->get();

        return view('user.equipment_networks')
            ->with('equipment_networks', $equipment_networks)
            ->with('title', 'Equipment Networks');
    }

    public function about_us(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('user.about_us')
            ->with('title', 'About Us');
    }
}
