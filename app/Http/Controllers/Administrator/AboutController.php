<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    function index()
    {
        $about = About::get();
        return view('admin.about.index', compact('about'));
    }
    function show()
    {
        return view('admin.about.add');
    }
    public function store(Request $request)
    {
        $data = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image'); 
            $filename = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('images/');

            $file->move($destinationPath, $filename);
            $data['colum1'] = $filename;
        }
        // dd($validatedData);

        $blog = About::find($request->about_id);
        if ($blog) {
            $blog->update($data);
            $msg = "About Updated";
        } else {
            $msg = "About Not Found";
        }
       

        return response()->json([
            'success' => $msg,
            'redirect' => route('about.index')
        ]);
    }
    function edit($id) {
        $about = About::find($id);
        return view('admin.about.add',compact('about'));
    }
}
