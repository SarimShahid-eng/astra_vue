<?php

namespace App\Http\Controllers;

use App\Models\DeviceInfo;
use Illuminate\Http\Request;
use App\Models\DeviceProduct;
use App\Models\DeviceConfiguration as DeviceConfig;

class DeviceRegistrationController extends Controller
{
    public function index()
    {
        $deviceInfos = DeviceInfo::with('device_configuration')
            ->where('user_id', auth()->user()->id)
            ->paginate(10);

        return view('admin.device_info.index', compact('deviceInfos'));
    }
    public function create()
    {
        $device_products = DeviceProduct::all();
        return view('admin.device_info.add', compact('device_products'));
    }

    public function store(Request $request)
    {
        $validated_data = $request->validate([
            'product_id' => 'required',
            'configuration_id' => 'required',
            'serial_number' => 'required',
            'manufacture_date' => 'required',
            'expiration_date' => 'required',
        ], [
            'product_id.required' => 'Please Select Product',
            'configuration_id.required' => 'Please Select Configuration',
        ]);
        unset($validated_data['product_id']);
        $validated_data['user_id'] = auth()->user()->id;
        DeviceInfo::create($validated_data);
        return response()->json([
            'success' => 'Device Info Saved',
            'redirect' => route('device_info.index')
        ]);
    }
    // function edit($id)
    // {
    //     $device_info = DeviceInfo::find($id);
    //     return view('admin.device_info.add', compact('device_info'));
    // }
    // function destroy($id)
    // {
    //     DeviceInfo::destroy($id);
    //     return response()->json([
    //         'success' => 'Device Info Deleted',
    //         'redirect' => route('device_info.index')
    //     ]);
    // }
    function get_configurations($id)
    {
        $device_config = DeviceConfig::with('device_product')->where('product_id', $id)->get();
        return response()->json($device_config);
    }
}
