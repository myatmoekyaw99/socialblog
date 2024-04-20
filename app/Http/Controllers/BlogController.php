<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('blog.index',[
            'blogs' => Blog::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->photo);
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
            'photo' => 'required'
        ]);
        
        // $data['slug'] = substr($request->description, 0, 20);
        $file = $request->file('photo'); 
        // dd($file);
        $filename = $file->getClientOriginalName(); 
        $path = $file->storeAs(
            'images', $filename
        );
        $data['photo'] = $path;
        
        Blog::create($data);
        return back()->with('success','Blog created successful!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        // dd('hit');
        return view('blog.edit',[
            'blog' => $blog,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        //
        // dd($blog);
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category' => 'required'
        ]);

        if($request->hasFile('new_photo')){

            // dd('hit');
             if (file_exists(public_path('storage/'.$blog->photo))){
                unlink(public_path('storage/'.$blog->photo));
            }
            
            $file = $request->file('new_photo'); // Retrieve the uploaded file from the request
            // dd($file);
            $filename = $file->getClientOriginalName(); // Retrieve the original filename
            $path = $file->storeAs(
                'photo', $filename
            );
            $blog->photo = $path;
        }
        $blog->title = $data['title'];
        $blog->description = $data['description'];
        $blog->category = $data['category'];
        $blog->save();
        // $blog->update($data);
        return redirect('/blog')->with('success','Blog Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        
        return back()->with('delete','Blog deleted successful!');
    }

    public function detail(Blog $blog){
        return view('blog.detail',[
            'blog' => $blog
        ]);
    }
}
