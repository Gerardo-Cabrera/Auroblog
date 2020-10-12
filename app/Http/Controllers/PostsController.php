<?php

namespace App\Http\Controllers;

use App\Posts;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use GrahamCampbell\Markdown\Facades\Markdown;
use Session;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Posts::orderBy('created_at', 'DESC')->paginate(10);

        foreach ($posts as $key => $value) {
            $posts[$key]['date'] = date('d-m-Y', strtotime($value['created_at']));
        }

        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post.create');
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
            'title' => 'required|min:3|unique:posts,title',
            'content' => 'required',
            'image' => 'required|image'
        ]);

        $post = Posts::create([
            'user_id' => auth()->user()->id,
            'title' => $request->title,
            'slug' => Str::slug($request->title, '-'),
            'content' => $request->content,
            'image' => $request->image,
            'created_at' => Carbon::now(),
            'content_md' => Markdown::convertToHtml($request->content)
        ]);

        if ($request->has('image')) {
            $image = $request->image;
            $imageNewName = time() . '.' . $image->getClientOriginalExtension();
            $image->move('storage/post', $imageNewName);
            $post->image = '/storage/post/' . $imageNewName;
            $post->save();
        }

        Session::flash('success', 'Post creado exitosamente');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function show(Posts $posts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function edit(Posts $post)
    {
        return view('admin.post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Posts $post)
    {
        $this->validate($request, [
            'title' => "required|unique:posts,title, $post->id",
            'content' => 'required',
            'image' => 'sometimes|image'
        ]);

        $post->title = $request->title;
        $post->slug = Str::slug($request->title, '-');
        $post->content = $request->content;
        $post->content_md = Markdown::convertToHtml($request->content);

        if ($request->hasFile('image')) {
            $image = $request->image;
            $imageNewName = time() . '.' . $image->getClientOriginalExtension();
            $image->move('storage/post', $imageNewName);
            $post->image = '/storage/post/' . $imageNewName;
        }

        $post->save();

        Session::flash('success', 'Post actualizado exitosamente');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Posts $post)
    {
        if ($post) {
            if (file_exists(public_path($post->image))) {
                unlink(public_path($post->image));
            }

            $post->delete();
            Session::flash('Post eliminado');
        }

        return redirect()->back();
    }
}
