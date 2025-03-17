<?php

namespace App\Http\Controllers;

use App\Models\Business;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    public function index()
    {
        $businesses = Business::all();
        return view('admin.business.index', compact('businesses'));
    }
    public function create()
    {
        return view('admin.business.add');
    }

    public function store(Request $request)
    {
        $validated_data = $request->validate(['name' => 'required']);
        Business::UpdateOrCreate(
            ['id' => $request->business_id],
            $validated_data
        );
        return response()->json([
            'success' => 'Business Saved',
            'redirect' => route('business.index')
        ]);
    }
    function edit($id)
    {
        $business = Business::find($id);
        return view('admin.business.add', compact('business'));
    }
    function destroy($id)
    {
        $business = Business::destroy($id);
        return response()->json([
            'success' => 'Business Saved',
            'redirect' => route('business.index')
        ]);
    }
}
