<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ContentOne;
use App\Models\Partner;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class FrontPageController extends Controller
{ 
    // Display a listing of the content
    public function index()
    {
        $contents = ContentOne::get();
        $partners = Partner::get();
        return view('admin.front_page.index', compact('contents','partners'));
    }

    // Show the form for editing the specified content
    public function edit($id,$data)
    {
        $contents = ContentOne::where('content2','front_product')->limit(6)->get();
        $content = ContentOne::find($id);
        $categories = Category::get();
        $subCategories = SubCategory::get();
        $products = Product::get();
        
        if($data == 'main_images'){
            return view('admin.front_page.add', compact('contents','products','subCategories','categories','data'));
        }if($data == 'box'){
            return view('admin.front_page.add', compact('content','data'));
        }
    }
    function partner_edit($id) {
        $partner = Partner::find($id);
        return view('admin.front_page.partner_add', compact('partner'));
    }
    function partner_update(Request $request) {

        if ($request->hasFile('name')) {
            $file = $request->file('name'); 
            $filename = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('images/partner/');

            $file->move($destinationPath, $filename);
            $partner =  Partner::find($request->partner_id);
            $partner->name = $filename;
            $partner->save();
            return response()->json([
                'success' => 'Partner Image Update',
                'redirect' => route('front.index')
            ]);
        }
    }
    // Update the specified content in storage
    public function update(Request $request)
    {
        // dd($request->sell_product_id);

        $request->validate([
            'content_id' => 'required|array',
            'category' => 'required|array',
            'sub_cat' => 'required|array',
            'product_id' => 'required|array',
        ]);
        foreach ($request->content_id as $key => $id) {
            $content = ContentOne::findOrFail($id);
            $content->update([
                'content1' => $request->category[$key],
                'content3' => $request->sub_cat[$key],
                'content4' => $request->product_id[$key],
            ]);
        }

        return response()->json([
            'success' => 'Front Page Update',
            'redirect' => route('front.index')
        ]);
    }
}
