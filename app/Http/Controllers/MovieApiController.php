<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class MovieApiController extends Controller
{

    public function index(Request $request){
        // $response = Http::acceptJson()->get('https://api.themoviedb.org/3/');
        // dd($response);
    }





    public function store(Request $request)
    {
        $movie_id = $request->movie_id;
        $posts = Http::withToken('123123')->acceptJson()
           ->get('https://api.themoviedb.org/3/movie/')->json();
        $results = $posts['results'];
        dd($results);
        foreach ($results as $result) {
            // Create a new Post instance
            $post = new Post();
            $post->id = $result['id'];
            if (array_key_exists('title', $result) && !empty($result['title'])) {
                $post->title = $result['title'];
            } else {
                $post->title = 'Default Title';
            }
            $post->slug =  md5($result['title'] . '-' . Str::random(8));
            $post->url = 'url';
            $post->rate = $result['vote_average'];
            $post->release_date = $result['release_date'];
            if (array_key_exists('overview', $result) && !empty($result['overview'])) {
                $post->content = $result['overview'];
            } else {
                $post->content = 'No overview available';
            }
            if (array_key_exists('poster_path', $result) && !empty($result['poster_path'])) {
                $post->poster = 'https://image.tmdb.org/t/p/w500/' . $result['poster_path'];
            } else {
                $post->poster = 'https://via.placeholder.com/500x750.png?text=No+poster+available';
            }
            $post->isBanner = 0;
            $post->isPublished = 0;
            $post->save();

            // Insert category IDs for the current Post
            foreach ($result['genre_ids'] as $categoryId) {
                $category = Category::find($categoryId);
                if ($category) {
                    DB::table('category_post')->insert([
                        'post_id' => $result['id'],
                        'category_id' => $categoryId,
                    ]);
                }
            }
        }

        return "Posts saved successfully!";
    }






}
