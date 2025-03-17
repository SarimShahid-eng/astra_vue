<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Blog;
use App\Models\Category;
use App\Models\ComplainBox;
use App\Models\Contact;
use App\Models\ContentOne;
use App\Models\Product;
use App\Models\SellProduct;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->limit(3)->get();
        $main_header = ContentOne::with('product.catgory', 'product.sub_catgory')->find(1);
        $blades = ContentOne::with('product.catgory', 'product.sub_catgory')->offset(1)->limit(3)->get();
        $moniters = ContentOne::with('product.catgory', 'product.sub_catgory')->offset(3)->limit(2)->get();
        $content_box1 = ContentOne::find(7);
        $content_box2 = ContentOne::find(8);
        $feature_products = Product::with('catgory', 'sub_catgory')->limit(3)->latest()->get();
        $commetBoxs = ContentOne::offset(8)->limit(3)->get();

        return view('frontend.index',compact('main_header','blades','moniters','content_box1','content_box2','commetBoxs','blogs','feature_products'));
    }
    public function product_details($id)
    {
        $product = Product::with('catgory','sub_catgory','videos')->find($id);
        // dd($id);
        $check_data = explode(',' , $product->check_data);
        // dd($product);
        $feature_products = Product::with('catgory', 'sub_catgory')->limit(3)->latest()->get();

        return view('frontend.product_details',compact('product','check_data','feature_products'));
    }
    public function contact_us()
    {
        $contact = About::find(4);
        return view('frontend.contact_us',compact('contact'));
    }
    public function profile()
    {
        $products = SellProduct::with('product','sub_category')->where('user_id',Auth::user()->id)->get();
        return view('frontend.profile',compact('products'));
    }
    function contact_store(Request $request)  {
              // Validate the request
              $request->validate([
                'full_name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'required|string|max:15',
                'comments' => 'required|string',
            ]);
    
            // Insert into database
            Contact::create([
                'full_name' => $request->input('full_name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'comments' => $request->input('comments'),
            ]);
    
            // Redirect or return response
            return back()->with('success', 'Your message has been sent successfully!');
    }
    public function complain()
    {
        $products = SellProduct::with('product')->get();
        return view('frontend.complain',compact('products'));
    }
    public function showLogin()
    {
        return view('frontend.showLoginForm');
    }
    function about() {
        $about = About::get();
        return view('frontend.about',compact('about'));
    }
    function add_complain(Request $request)  {
        $input = $request->validate([
            'title' => 'required',
            'purchase_date' => 'required',
            'subject' => 'required',
            'product_id' => 'required',
            'message' => 'required',
        ]);
        $input['user_id'] = Auth::user()->id;
        ComplainBox::create($input);
        return redirect()->back()->with('msg', 'Complaint sent successfully!');

    }
    function blog_page() {
        $blogs = Blog::paginate(10);
        return view('frontend.blog_grid',compact('blogs'));
    }
    function blog_detail($id) {
        $blog = Blog::find($id);
        return view('frontend.blog_detail',compact('blog'));
    }
    public function update_form(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save();
        return redirect()->back();
    }
    
}
