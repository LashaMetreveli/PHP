<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Game;
use Illuminate\Support\Str;

class GameController extends Controller
{

    public function index()
    {
        $games = Game::all();

        return view('admin.game.index')->with('games', $games);
    }

    public function createGame()
    {
        $categories = Category::all();
        return view('admin.game.create')->with('categories', $categories);
    }

    public function viewAllGames(Request $request)
    {
    }

    public function addNewGame(Request $request)
    {
        $request->validate([
            'name' => ['required', 'min:5', 'max:150'],
            'stars' => ['required', 'min:0', 'max:5'],
            'slug' => ['nullable', 'max:150'],
            'description' => ['required'],
            'image' => ['required', 'image'],
            'category_id' => ['required', 'numeric'],
        ]);

        $filename = $request->file('image')->getClientOriginalName();
        $savedFileName = time() . '-' . $filename;
        $request->file('image')->move(public_path('images'), $savedFileName);
        $fileUrl = '/images/' . $savedFileName;

        Game::create([
            'name' => $request->name,
            'slug' => Str::slug($request->slug ? $request->slug : $request->title),
            'category_id' => $request->category_id,
            'description' => $request->description,
            'stars' => $request->stars,
            'image' => $fileUrl
        ]);

        return redirect()->route('game.create');
    }

    public function edit($id)
    {
        $category = Category::where('id', $id)->first();
        $categories = Category::all();

        return view('admin.category.edit')
            ->with('categories', $categories)
            ->with('category', $category);
    }



    public function deleteGame($id)
    {
        Game::where('id', $id)->delete();
        $games = Game::all();
        return view('admin.game.index')->with('games', $games);
    }

    public function editGame(Request $request, $id)
    {
    }

    public function updateGame(Request $request, $id)
    {
    }
}
