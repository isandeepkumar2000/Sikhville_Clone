<?php

namespace App\Http\Controllers\GamesController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GamesModel\Games;
use App\Models\GamesModel\GamesCategories;

class GamesFolderController extends Controller
{
    public function gamesfolder(Request $request)
    {
        $games = Games::with('gamesCategoryDetails')->orderBy('id', "desc");

        if ($request->has('category_id') && $request->input('category_id') != 'all') {
            $games->where('gameCategoriesid', $request->input('category_id'));
        }
        $game = $games->paginate(10);
        $categories = GamesCategories::all();

        return view('GameScreen.GamesFolder.games', compact('game', 'categories'));
    }


    public function create()
    {
        $game = GamesCategories::all();
        return view('GameScreen.GamesFolder.createGames', compact('game'));
    }

    public function store(Request $request)
    {
        $game = new Games;
        $game->gameCategoriesid = $request->input('gameCategoriesid');
        $game->short_description = $request->input('short_description');
        $game->details = $request->input('details');

        if ($request->hasFile('thumbnail_image')) {
            $file = $request->file('thumbnail_image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $folderName = 'GamesImagefolder';
            $path = public_path($folderName);
            $upload = $file->move($path, $fileName);

            if ($upload) {
                $game->thumbnail_image = $folderName . '/' . $fileName;
            }
        }

        $game->save();
        return redirect('games_list')->with('status', 'Game Added Successfully');
    }

    public function edit($id)
    {
        $gamecategories = GamesCategories::all();
        $game = Games::find($id);
        return view('GameScreen.GamesFolder.editGames', compact('game', 'gamecategories'));
    }

    public function update(Request $request, $id)
    {
        $game = Games::find($id);
        $game->gameCategoriesid = $request->input('gameCategoriesid');
        $game->short_description = $request->input('short_description');
        $game->details = $request->input('details');

        if ($request->hasFile('thumbnail_image')) {
            $file = $request->file('thumbnail_image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $folderName = 'GamesImagefolder';
            $path = public_path($folderName);
            $upload = $file->move($path, $fileName);

            if ($upload) {
                $game->thumbnail_image = $folderName . '/' . $fileName;
            }
        }

        $game->save();
        return redirect('games_list')->with('status', 'Game Updated Successfully');
    }

    public function destroy($id)
    {
        $game = Games::find($id);
        $game->delete();
        return redirect()->back()->with('status', 'Game Deleted Successfully');
    }

    public function featuredgames($id, Request $request)
    {
        $game = Games::find($id);

        if ($game) {
            if ($game->featured_game) {
                $game->featured_game = 0;
            } else {
                $game->featured_game = 1;

                if ($request->hasFile('featured_game_Image_Url')) {
                    $file = $request->file('featured_game_Image_Url');
                    $fileName = time() . '.' . $file->getClientOriginalExtension();
                    $folderName = 'GamesFeaturedImagefolder';
                    $path = public_path($folderName);
                    $upload = $file->move($path, $fileName);

                    if ($upload) {
                        $game->featured_game_Image_Url = $folderName . '/' . $fileName;
                    }
                }
            }
        }
        $game->save();
        return redirect()->back()->with('status', 'Game Updated Successfully');
    }

    public function topgameUpdate($id)
    {
        $maxTopGames = 12;
        $currentTopVideosCount = Games::where('top_game', 1)->count();
        $game = Games::find($id);

        if ($game) {
            if ($game->top_game) {
                $game->top_game = 0;
            } else {
                if ($currentTopVideosCount < $maxTopGames) {
                    $game->top_game = 1;
                } else {
                    return back()->with('error', 'You can only set ' . $maxTopGames . ' games as top videos.');
                }
            }

            $game->save();
        }

        return redirect()->back()->with('status', 'Game Updated Successfully');
    }
}
