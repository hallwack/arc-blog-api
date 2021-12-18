<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
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
        $posts = Post::all();

        return response()->json([
            'message' => 'Semua Post Ditampilkan',
            'data' => $posts,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post;
        $post->id_category = $request->category;
        $post->id_user = $request->user;
        $post->title = $title = $request->title;
        $post->slug = Str::slug($title) . '-' . time();
        $post->body = $body = $request->body;
        $post->excerpt = Str::words($body, 10);
        $post->created_at = Carbon::now();

        // $post->save();

        dd($post);

        return response()->json([
            'message' => 'Post berhasil dibuat',
            'data' => $post,
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);

        return response()->json([
            'message' => 'Post ' . $post->title . ' Ditemukan',
            'data' => $post,
        ], 200);
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
        $post = Post::findOrFail($id);

        $post->id_category = $request->category;
        $post->id_user = $request->user;
        $post->title = $title = $request->title;
        $post->slug = Str::slug($title) . '-' . time();
        $post->body = $body = $request->body;
        $post->excerpt = Str::words($body, 10);
        $post->updated_at = Carbon::now();

        // $post->save();

        dd($post);

        return response()->json([
            'message' => 'Post ' . $post->getOriginal()['title'] . ' berhasil diubah menjadi ' . $post->title,
            'data' => $post
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        // $post->delete();
        return response()->json([
            'message' => 'Post berhasil dihapus'
        ], 200);
    }
}
