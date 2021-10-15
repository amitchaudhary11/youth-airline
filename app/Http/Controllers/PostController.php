<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use FontLib\Table\Type\post as TypePost;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('updated_at', 'DESC')->get();
        return view('posts.index', compact('posts'));
    }

    public function showBlog()
    {
        $posts = Post::orderBy('updated_at', 'DESC')->get();
        return view('posts.showBlog', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'summary' => 'required',
            'description' => 'required',
            'image' => 'required'
        ]);

            $slug = Str::slug($request->title, "-");


        $newImageName = uniqid() . '.' . $request->image->extension();

        $request->image->move(public_path('images'), $newImageName);


        Post::create([
            'title' => $request->title,
            'summary' => $request->summary,
            'description' => $request->description,
            'slug' => $slug,
            'image_path' => $newImageName,
            'admin_id' => Session::get('adminID')
        ]);

        return redirect('/blogs')->with('message', 'Your Post has been Added!!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();

        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $post = Post::where('slug', $slug)->first();

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        if($request->hasFile('image')){
            $updateImageName = uniqid() . '.' . $request->image->extension();

            $request->image->move(public_path('images'), $updateImageName);
        }else{
            $updateImageName=$request->previous_image;
        }


        Post::where('slug', $slug)->update([
            'title' => $request->title,
            'summary' => $request->summary,
            'description' => $request->description,
            'slug' => $slug,
            'image_path' => $updateImageName,
            'admin_id' => Session::get('adminID')
        ]);

        return redirect('/blogs')->with('message', 'Your Post has been Updated!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $post = Post::where('slug', $slug);
        $post->delete();
        return redirect('/blogs')->with('message', 'Your Post has been Deleted!!');
    }
}
