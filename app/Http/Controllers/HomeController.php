<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Client;
use App\Models\Customer;
use App\Models\Hall;
use App\Models\Product;
use App\Models\PurchaseSaleBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    function data_check()
    {
        $msg = [
            'success' => 'Blog Category has been added',
            'reload' => true,
        ];
        return response()->json($msg);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $count_sales = 90;
        $count_customers = 700;
        $count_products = 500;
        $latest_sales = 400;

        return view('admin.dashboard.index', compact('count_sales', 'count_customers', 'count_products', 'latest_sales'));
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
