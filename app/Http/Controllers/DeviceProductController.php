<?php

namespace App\Http\Controllers;

use App\Models\DeviceProduct;
use Illuminate\Http\Request;

class DeviceProductController extends Controller
{
    public function index()
    {
        $device_products = DeviceProduct::latest()->get();
        return view('admin.device_info.product_index', compact('device_products'));
    }
    public function create()
    {
        return view('admin.device_info.product_add');
    }
    public function store(Request $request)
    {
        $Input =   $request->validate([
            'name' => 'required',
        ]);
        DeviceProduct::UpdateOrCreate(
            ['id' => $request->device_product_id],
            $Input
        );
        $editedOrCreated = $request->device_product_id ? 'Updated' : 'Created';
        return response()->json([
            'success' => 'Product ' . $editedOrCreated,
            'redirect' => route('device_info.product_index')
        ]);
    }
    function edit($id)
    {
        $device_product = DeviceProduct::find($id);
        return view('admin.device_info.product_add', compact('device_product'));
    }
    function destroy($id)
    {
        DeviceProduct::destroy($id);
        return response()->json([
            'success' => 'Product has been Deleted',
            'redirect' => route('device_info.product_index')
        ]);
    }
}
