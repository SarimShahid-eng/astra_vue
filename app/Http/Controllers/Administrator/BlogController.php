<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    function index()
    {
        $blogs = Blog::get();
        return view('admin.blog.index', compact('blogs'));
    }
    function show()
    {
        return view('admin.blog.add');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'detail' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image'); 
            $filename = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('images/blog_images/');

            $file->move($destinationPath, $filename);
            $validatedData['image'] = $filename;
        }
        // dd($validatedData);

        if ($request->blog_id != null) {
            $blog = Blog::find($request->blog_id);
            if ($blog) {
                $blog->update($validatedData);
                $msg = "Blog Updated";
            } else {
                $msg = "Blog Not Found";
            }
        } else {
            Blog::create($validatedData);
            $msg = "Blog Added";
        }

        return response()->json([
            'success' => $msg,
            'redirect' => route('blog.index')
        ]);
    }
    function edit($id) {
        $blog = Blog::find($id);
        return view('admin.blog.add',compact('blog'));
    }
    function destroy($id) {
        $blog = Blog::find($id);
        $blog->delete();
        return response()->json([
            'success' => 'Blog Deleted',
            'redirect' => route('blog.index')
        ]);
    }
}
