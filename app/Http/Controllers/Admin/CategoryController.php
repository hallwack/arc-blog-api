<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return response()->json([
            'message' => 'Semua Category Ditampilkan',
            'data' => $categories,
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
        $category = new Category;

        $category->name = $name = $request->name;
        $category->slug = Str::slug($name);
        $category->created_at = Carbon::now();

        // $category->save();

        dd($category);

        return response()->json([
            'message' => 'Category berhasil dibuat',
            'data' => $category,
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
        $category = Category::findOrFail($id);
        $post = Post::where('posts.id_category', '=', $id)->get();

        return response()->json([
            'message' => 'Category ' . $category->name . ' Ditemukan',
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
        $category = Category::findOrFail($id);

        $category->name = $name = $request->name;
        $category->slug = Str::slug($name);
        $category->updated_at = Carbon::now();
        // $category->save();

        dd($category);

        return response()->json([
            'message' => 'Category ' . $category->getOriginal()['name'] . ' berhasil diubah menjadi ' . $category->name,
            'data' => $category
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
        $category = Category::findOrFail($id);

        // $category->delete();
        return response()->json([
            'message' => 'Category berhasil dihapus'
        ], 200);
    }
}
