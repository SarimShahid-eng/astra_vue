<?php

namespace App\Http\Controllers\Administrator;

use App\Helpers\CommonHelpers;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ComplainBox;
use App\Models\Product;
use App\Models\Role;
use App\Models\SellProduct;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function index()
    {
        $users = User::latest()->get();
        // dd($sell_products);
        return view("admin.user.index", compact("users"));
    }
    function create()
    {
        $categories = Category::get();
        return view("admin.user.user", compact("categories"));
    }
    function store(Request $request)
    {
        $input = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required',
            'password' => 'required',
            
        ]);
        $input['role'] = 'user';
        $input['number'] = $input['password'];
        $input['password'] = bcrypt($input['password']);
        
        if ($request->user_id != null) {
            
            $user = User::find($request->user_id);
            $user->update($input);
            $msg = "Customer Updated";
        
            foreach ($request->category as $key => $category) {
                $sellProductId = $request->sell_product_id[$key] ?? null;
        
                $data = [
                    'category' => $category,
                    'sub_cat' => $request->sub_cat[$key],
                    'product_id' => $request->product_id[$key],
                    'user_id' => $user->id,
                    'sell_date' => $request->sell_date[$key]
                ];
        
                if ($sellProductId) {
                    $sellProduct = SellProduct::find($sellProductId);
                    if ($sellProduct) {
                        $sellProduct->update($data);
                    }
                } else {
                    SellProduct::create($data);
                }
            }
        } else {
            $userID = User::create($input);
            foreach ($request->category as $key => $category) {
                $data = [
                    'category' => $category,
                    'sub_cat' => $request->sub_cat[$key],
                    'product_id' => $request->product_id[$key],
                    'user_id' => $userID->id,
                    'sell_date' => $request->sell_date[$key]
                ];
                SellProduct::create($data);
            }
            $msg = "Customer Inserted";
        }
        
        return response()->json([
            'success' => $msg,
            'redirect' => route('user.index')
        ]);
    }
    function user_products($id) {
        $products = SellProduct::with('product')->where('user_id',$id)->get();
        return view("admin.user.product_view", compact("products"));
    }
    function edit($id)
    {
        $user = User::find($id);
        $categories = Category::get();
        $subCategories = SubCategory::get();
        $products = Product::get();
        $sell_products = SellProduct::where('user_id',$id)->get();
        return view("admin.user.user", compact("categories",'user','sell_products','subCategories','products'));
    }
    function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json([
            'success' => 'User Deleted',
            'redirect' => route('user.index')
        ]);
    }
    function profile($id)
    {
        $user = User::with('role_data')->find($id);
        return view('admin.user.profile', compact('user'));
    }
    function edit_profile($id)
    {
        $user = User::with('role_data')->find($id);
        return view('admin.user.edit_profile', compact('user'));
    }
    function profile_update(Request $request)
    {
        $user = User::find($request->id);
        $data = $request->all();
        if ($request->password != '') {
            $data['password'] = bcrypt($data['password']);
        } else {
            $data['password'] = $user->password;
        }
        if ($request->hasFile('img')) {
            // dd($request->img);
            $image = CommonHelpers::uploadProfileImage($request->file('img'), 'images/users/', null);
            if (is_array($image)) {
                return response()->json($image);
            }
            $data['img'] = $image;
        } else {
            $data['img'] = $user->img;
        }
        $user->update($data);
        return response()->json([
            'success' => 'User Profile Updated',
            'reload' => true
        ]);
    }
    function user_complain() {
        $complains = ComplainBox::with('product','user')->get();
        // dd($complains);
        return view('admin.user.complain',compact('complains'));
    }
}
