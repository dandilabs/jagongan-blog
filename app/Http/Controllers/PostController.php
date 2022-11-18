<?php

namespace App\Http\Controllers;

use App\Models\Tags;
use App\Models\Posts;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Posts::paginate(10);
        return view('admin.post.index', compact('post'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tags::all();
        $category = Category::all();
        return view('admin.post.create', compact('category','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'judul'         => 'required',
            'category_id'   => 'required',
            'content'       => 'required',
            'image'         => 'required'
        ]);
        $image = $request->file('image');
        $new_gambar = time().$image->getClientOriginalName();

        $post = Posts::create([
            'judul'         => $request->judul,
            'category_id'   => $request->category_id,
            'content'       => $request->content,
            'image'         => 'public/uploads/posts/' .$new_gambar,
            'slug'          => Str::slug($request->judul),
            'users_id'       => Auth::id()
        ]);
        $post->tags()->attach($request->tags);
        $image->move('public/uploads/posts/', $new_gambar);
        return redirect()->route('post.index')->with('success', 'Post success di save');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Posts::findorfail($id);
        $tags = Tags::all();
        $category = Category::all();
        return view('admin.post.edit', compact('post','tags','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'judul'         => 'required',
            'category_id'   => 'required',
            'content'       => 'required',
        ]);
        $post = Posts::findorfail($id);
        if($request->has('image')) {
            $image = $request->file('image');
            $new_gambar = time().$image->getClientOriginalName();
            $image->move('public/uploads/posts/', $new_gambar);

            $post_data =[
                'judul'         => $request->judul,
                'category_id'   => $request->category_id,
                'content'       => $request->content,
                'image'         => 'public/uploads/posts/' .$new_gambar,
                'slug'          => Str::slug($request->judul)
            ];
        } else {
            $post_data =[
                'judul'         => $request->judul,
                'category_id'   => $request->category_id,
                'content'       => $request->content,
                'slug'          => Str::slug($request->judul)
            ];
        }
        $post->tags()->sync($request->tags);
        $post->update($post_data);
        return redirect()->route('post.index')->with('success', 'Post success update');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Posts::findorfail($id);
        $post->delete();
        return redirect()->back()->with('success', 'Post success delete, (check trash post)');
    }

    public function datasoft(){
        $post = Posts::onlyTrashed()->paginate(10);
        return view('admin.post.datasoft', compact('post'));
    }

    public function restore($id){
        $post = Posts::withTrashed()->where('id', $id)->first();
        $post->restore();
        return redirect()->back()->with('success', 'Post success in restore (list post)');
    }

    public function kill($id){
        $post = Posts::withTrashed()->where('id', $id)->first();
        $post->forceDelete();
        return redirect()->back()->with('success', 'Post success delete permanent');
    }
}
