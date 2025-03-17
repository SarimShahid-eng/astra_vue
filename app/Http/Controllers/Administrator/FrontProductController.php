<?php

namespace App\Http\Controllers\Administrator;

use App\Helpers\CommonHelpers;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Video;

class FrontProductController extends Controller
{

    public function index()
    {
        $products = Product::with('videos')->get();
        return view('admin.product.index', compact('products'));
    }
    function category_index()
    {
        $categories = Category::get();
        return view('admin.category.index', compact('categories'));
    }
    function sub_category_index()
    {
        $sub_categories = SubCategory::with('category')->get();
        return view('admin.sub_category.index', compact('sub_categories'));
    }


    public function create()
    {
        $categories = Category::get();
        return view('admin.product.add', compact('categories'));
    }
    public function edit($id)
    {
        $categories = Category::get();
        $sub_categories = SubCategory::get();
        $product = Product::with('videos')->find($id);
        if ($product && $product->product_images) {
            $product->product_images = json_decode($product->product_images, true);
        }
        return view('admin.product.add', compact('product','categories','sub_categories'));
    }
    public function category_create()
    {
        return view('admin.category.add');
    }
    public function sub_category_create()
    {
        $categories = Category::get();
        return view('admin.sub_category.add', compact('categories'));
    }
    function sub_category_get($id)
    {
        $sub_categories = SubCategory::where('cat_id', $id)->get();
        return response()->json($sub_categories);
    }
    function get_product($id)
    {
        $products = Product::where('sub_category', $id)->get();
        return response()->json($products);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category' => 'required|string',
            'name' => 'required|string',
            'product_images.*' => 'nullable|file|mimes:jpg,jpeg,png', // For product images
            'video_title.*' => 'nullable|string',
            'video_img.*' => 'nullable|file|mimes:jpg,jpeg,png', // For video images
            'video_link.*' => 'nullable|string',
        ]);

        // Check if updating an existing product
        $product = $request->product_id ? Product::findOrFail($request->product_id) : new Product();

        // Save or Update Product
        $product->category = $request->category;
        $product->sub_category = $request->sub_cat;
        $product->name = $request->name;
        $product->weight = $request->weight;
        $product->dimensions = $request->dimensions;
        $product->size = $request->size;
        $product->warranty_years = $request->warranty_years;
        $product->check_data = $request->check_data;
        $product->serial_num = $request->serial_num;
        $product->detail = $request->detail;
        $product->more_detail = $request->more_detail;
        $product->description = $request->description;
        $product->save();

        // Handle Product Images
        if ($request->hasFile('product_images')) {
            $productImages = $product->product_images ? json_decode($product->product_images, true) : [];
            foreach ($request->file('product_images') as $image) {
                $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('images/product_images');
                $image->move($destinationPath, $filename);
                $productImages[] = $filename;
            }
            $product->product_images = json_encode($productImages);
            $product->save();
        }

        // Handle Video Data
        if ($request->has('video_title')) {
            foreach ($request->video_title as $key => $title) {
                $videoImgPath = null;

                if ($request->hasFile('video_img') && isset($request->file('video_img')[$key])) {
                    $file = $request->file('video_img')[$key];
                    $filename = time() . '_' . $file->getClientOriginalName();
                    $destinationPath = public_path('images/video_images');
                    $file->move($destinationPath, $filename);
                    $videoImgPath =  $filename;
                }

                // If updating, check for existing video record
                $video = Video::where('product_id', $product->id)->where('title', $title)->first();

                if ($video) {
                    // Update existing video record
                    $video->image = $videoImgPath ?? $video->image;
                    $video->link = $request->video_link[$key];
                    $video->save();
                } else {
                    // Create new video record
                    Video::create([
                        'product_id' => $product->id,
                        'title' => $title,
                        'image' => $videoImgPath,
                        'link' => $request->video_link[$key],
                    ]);
                }
            }
        }

        return response()->json([
            'success' => 'Product Saved',
            'redirect' => route('product.index')
        ]);
    }
    public function category_store(Request $request)
    {
        $validated_data = $request->validate(['name' => 'required']);
        Category::create($validated_data);
        return response()->json([
            'success' => 'Cateogy Saved',
            'redirect' => route('category.index')
        ]);
    }
    public function sub_category_store(Request $request)
    {
        $validated_data = $request->validate(['name' => 'required', 'cat_id' => 'required']);

        SubCategory::create($validated_data);
        return response()->json([
            'success' => 'Sub Cateogy Saved',
            'redirect' => route('sub_category.index')
        ]);
    }

}
