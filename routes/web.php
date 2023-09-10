<?php

use App\Http\Controllers\CctvServiceController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EquipmentNetworkController;
use App\Http\Controllers\HomeAdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestimonyController;
use App\Http\Controllers\User\UserPageController;
use App\Http\Controllers\WifiServiceController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserPageController::class, 'index']);
Route::get('/about_us', [UserPageController::class, 'about_us']);
Route::get('/wifi_services', [UserPageController::class, 'wifi_services']);
Route::get('/cctv_services', [UserPageController::class, 'cctv_services']);
Route::get('/equipment_networks', [UserPageController::class, 'equipment_networks']);

Auth::routes();

Route::view('/login', 'admin.login.login');

Route::middleware('auth')->group(function () {
    Route::get('/admin', [HomeAdminController::class, 'index']);

    Route::get('/admin/wifi-services', [WifiServiceController::class, 'index']);
    Route::get('/admin/wifi-services/create', [WifiServiceController::class, 'create']);
    Route::post('/admin/wifi-services/create', [WifiServiceController::class, 'store']);
    Route::get('/admin/wifi-services/{wifiService}/edit', [WifiServiceController::class, 'edit']);
    Route::put('/admin/wifi-services/{wifiService}', [WifiServiceController::class, 'update']);
    Route::delete('/admin/wifi-services/{wifiService}', [WifiServiceController::class, 'destroy']);

    Route::get('/admin/cctv-services', [CctvServiceController::class, 'index']);
    Route::get('/admin/cctv-services/create', [CctvServiceController::class, 'create']);
    Route::post('/admin/cctv-services/create', [CctvServiceController::class, 'store']);
    Route::get('/admin/cctv-services/{cctvService}/edit', [CctvServiceController::class, 'edit']);
    Route::put('/admin/cctv-services/{cctvService}', [CctvServiceController::class, 'update']);
    Route::delete('/admin/cctv-services/{cctvService}', [CctvServiceController::class, 'destroy']);

    Route::get('/admin/equipment-networks', [EquipmentNetworkController::class, 'index']);
    Route::get('/admin/equipment-networks/create', [EquipmentNetworkController::class, 'create']);
    Route::post('/admin/equipment-networks/create', [EquipmentNetworkController::class, 'store']);
    Route::get('/admin/equipment-networks/{equipmentNetwork}/edit', [EquipmentNetworkController::class, 'edit']);
    Route::put('/admin/equipment-networks/{equipmentNetwork}', [EquipmentNetworkController::class, 'update']);
    Route::delete('/admin/equipment-networks/{equipmentNetwork}', [EquipmentNetworkController::class, 'destroy']);

    Route::get('/admin/testimonies', [TestimonyController::class, 'index']);
    Route::get('/admin/testimonies/create', [TestimonyController::class, 'create']);
    Route::post('/admin/testimonies/create', [TestimonyController::class, 'store']);
    Route::get('/admin/testimonies/{testimony}/edit', [TestimonyController::class, 'edit']);
    Route::put('/admin/testimonies/{testimony}', [TestimonyController::class, 'update']);
    Route::delete('/admin/testimonies/{testimony}', [TestimonyController::class, 'destroy']);

    Route::get('/admin/edit-profile', [ProfileController::class, 'editProfile']);
    Route::post('/admin/edit-profile', [ProfileController::class, 'updateProfile']);

    Route::get('/admin/edit-password', [ProfileController::class, 'editPassword']);
    Route::post('/admin/edit-password', [ProfileController::class, 'updatePassword']);

    Route::get('/admin/employees', [EmployeeController::class, 'index']);
    Route::get('/admin/employees/create', [EmployeeController::class, 'create']);
    Route::post('/admin/employees/create', [EmployeeController::class, 'store']);
    Route::delete('/admin/employees/{employee}', [EmployeeController::class, 'destroy']);
});
