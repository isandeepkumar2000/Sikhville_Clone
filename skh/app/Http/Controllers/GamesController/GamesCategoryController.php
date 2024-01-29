<?php

namespace App\Http\Controllers\GamesController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GamesModel\GamesCategories;

class GamesCategoryController extends Controller
{
    public function showGamesList()
    {
        $gameCategories = GamesCategories::all();
        return view('GameScreen.GamesCategories.gamesCategories', compact('gameCategories'));
    }
    public function create()
    {
        return view('GameScreen.GamesCategories.createGamesCategories');
    }
    public function store(Request $request)
    {
        $gameCategories = new GamesCategories;

        $gameCategories->name = $request->input('name');
        $gameCategories->games_logo = $request->input('games_logo');
        $gameCategories->save();
        return redirect('games_categories_list')->with('status', 'Student Added Successfully');
    }
    public function edit($id)
    {
        $gameCategories = GamesCategories::find($id);
        return view('GameScreen.GamesCategories.editGamesCategories', compact('gameCategories'));
    }

    public function update(Request $request, $id)
    {
        $gameCategories = GamesCategories::find($id);
        $gameCategories->name = $request->input('name');
        $gameCategories->games_logo = $request->input('games_logo');
        $gameCategories->update();
        return redirect()->back()->with('status', 'Student Updated Successfully');
    }

    public function destroy($id)
    {
        $gameCategories = GamesCategories::find($id);
        $gameCategories->delete();
        return redirect()->back()->with('status', 'Student Deleted Successfully');
    }
}
