<?php

namespace App\Http\Controllers;

use App\Models\DeviceConfiguration as DeviceConfig;
use App\Models\DeviceProduct;
use Illuminate\Http\Request;

class DeviceConfigurationController extends Controller
{
    public function index()
    {
        $device_configs = DeviceConfig::with('device_product')->orderBy('id', 'asc')->get();
        return view('admin.device_info.product_config_index', compact('device_configs'));
    }
    public function create()
    {
        $device_products = DeviceProduct::all();
        return view('admin.device_info.product_config_add', compact('device_products'));
    }
    public function store(Request $request)
    {
        $Input =   $request->validate([
            "product_id" => "required",
            "configuration" => "required",
            "sku" => "required",
            "description" => "required"
        ]);
        DeviceConfig::UpdateOrCreate(
            ['id' => $request->device_product_config_id],
            $Input
        );
        $editedOrCreated = $request->device_product_config_id ? 'Updated' : 'Created';
        return response()->json([
            'success' => 'Device Config ' . $editedOrCreated,
            'redirect' => route('device_info.product_config_index')
        ]);
    }
    function edit($id)
    {
        $device_product_config = DeviceConfig::find($id);
        $device_products = DeviceProduct::all();


        return view('admin.device_info.product_config_add', compact('device_product_config', 'device_products'));
    }
    function destroy($id)
    {
        DeviceConfig::destroy($id);
        return response()->json([
            'success' => 'Device Config has been Deleted',
            'redirect' => route('device_info.product_config_index')
        ]);
    }
}
