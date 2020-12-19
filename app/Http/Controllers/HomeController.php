<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Game;

class HomeController extends Controller
{
    public function home()
    {
        $games = Game::with('category')->get();


        return view('pages.index')->with('games', $games);
    }


    public function singlePost($slug)
    {
        $post = Post::where('slug', $slug)->with('category')->first();

        return view('pages.post')->with('post', $post);
    }

    public function singleGame($slug)
    {
        $game = Game::where('slug', $slug)->with('category')->first();

        return view('pages.game')->with('game', $game);
    }

    public function singleCategory($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $posts = Post::where('category_id', $category->id)->with('category')->get();

        if (!$posts) {
            abort(404);
        }

        return view('pages.index')->with('posts', $posts);
    }
}
