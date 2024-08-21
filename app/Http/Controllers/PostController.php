<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class PostController extends Controller
{
    // public function index(){
    //     $posts = Post::orderBy('created_at', 'desc')->paginate(20);
    //     $categories = Category::all();
    //     return view('index',compact('posts','categories'));
    // }
    public function index(Request $request)
    {
        $posts = Post::query()->orderByDesc('created_at')->paginate(20);
        $categories = Category::all();
        return view('index', compact('posts', 'categories'));
    }



    public function show(Request $request,$id)
    {
        $post = Post::where('id', $id)->get();
        $categories = Category::all();
        $tags = Tag::all();
        $url = Post::where('id', $id)->get();
        $url2 = $request->url2;
        $url3 = $request->url3;
        $url4 = $request->url4;
        return view('single-page', compact('post','tags','categories' ,'url','url2','url3','url4'));
    }

    // public function filter(Request $request)
    // {
    //     $posts = Post::query();
    //     $categories = Category::all();

    //     if (!empty($request->search)) {
    //         $posts->where('title', 'LIKE', '%' . $request->search . '%');
    //     }
    //     if (!empty($request->category)) {
    //         $categoryId = $request->category;
    //         $posts->whereHas('category', function ($query) use ($categoryId) {
    //             $query->where('categories.id', $categoryId);
    //         });
    //     }

    //     $posts = $posts->paginate(10);
    //     return view('filter-page', compact('posts', 'categories'));
    // }

    public function filter(Request $request)
    {
        $posts = Post::query();
        $categories = Category::all();

        if (!empty($request->search)) {
            $posts->where('title', 'LIKE', '%' . $request->search . '%');
        }
        if (!empty($request->category)) {
            $categoryName = $request->category;
            $posts->whereHas('category', function ($query) use ($categoryName) {
                $query->where('name', $categoryName);
            });
        }

        $posts = $posts->paginate(10)->appends(request()->query());

        return view('filter-page', compact('posts', 'categories'));
    }



    // public function filterCategory(Request $request)
    // {
    //     $posts = Post::query();
    //     $categories = Category::all();

    //     if (!empty($request->category)) {
    //         $categoryId = $request->category;
    //         $posts->whereHas('categories', function ($query) use ($categoryId) {
    //             $query->where('id', $categoryId);
    //         });
    //     }

    //     $posts = $posts->get();
    //     return view('filter-page', compact('posts', 'categories'));
    // }

}
