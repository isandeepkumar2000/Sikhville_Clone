<?php

namespace App\Http\Controllers\GamesController;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\GamesModel\Games;
use App\Models\GamesModel\GamesCategories;

class GamesFolderController extends Controller
{
    public function gamesfolder()
    {
        $game = Games::with('gamesCategoryDetails')->get();
        return view('GameScreen.GamesFolder.games', compact('game'));
    }
    public function create()
    {
        $game = GamesCategories::all();
        return view('GameScreen.GamesFolder.createGames', compact('game'));
    }

    public function featured_punjabi_reading_Image($id, Request $request)
    {
        $game = Games::find($id);

        if ($request->hasFile('featured_game_Image_Url')) {
            $file = $request->file('featured_game_Image_Url');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $folderName = 'GamesFeaturedImagefolder';
            $path = public_path($folderName);
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $upload = $file->move($path, $fileName);
            if ($upload) {
                $game->featured_game_Image_Url = $folderName . '/' . $fileName;
            }
        }
        $appUrl = env('APP_URL');
        if (!empty($game->featured_game_Image_Url)) {
            $imageUrl = $appUrl . '/' . $game->featured_game_Image_Url;
            $game->featured_game_Image_Url = $imageUrl;
        }

        $game->save();
        return redirect('games_list')->with('status', 'Student Added Successfully');
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
                    $extension = $file->getClientOriginalExtension();
                    $fileName = time() . '.' . $extension;
                    $folderName = 'GamesFeaturedImagefolder';
                    $path = public_path($folderName);
                    if (!file_exists($path)) {
                        mkdir($path, 0777, true);
                    }
                    $upload = $file->move($path, $fileName);
                    if ($upload) {
                        $game->featured_game_Image_Url = $folderName . '/' . $fileName;
                    }
                }
                $appUrl = env('APP_URL');
                if (!empty($game->featured_game_Image_Url)) {
                    $imageUrl = $appUrl . '/' . $game->featured_game_Image_Url;
                    $game->featured_game_Image_Url = $imageUrl;
                }
            }
        }
        $game->save();
        return redirect()->back()->with('status', 'Student Updated Successfully');
    }


    public function topgameUpdate($id)
    {
        $maxTopVideos = 3;

        $currentTopVideosCount = Games::where('top_game', 1)->count();
        $game = Games::find($id);

        if ($game) {
            if ($game->top_game) {
                $game->top_game = 0;
            } else {
                if ($currentTopVideosCount < $maxTopVideos) {
                    $game->top_game = 1;
                } else {
                    return back()->with('error', 'You can only set ' . $maxTopVideos . ' videos as top videos.');
                }
            }
            $game->save();
        }
        return redirect()->back()->with('status', 'Student Updated Successfully');
    }

    public function store(Request $request)
    {
        $game = new Games;
        $game->gameCategoriesid = $request->input('gameCategoriesid');
        $game->top_game = 0;
        $game->featured_game = 0;
        $game->featured_game_Image_Url = null;
        $game->short_description = $request->input('short_description');
        $game->details = $request->input('details');

        if ($request->hasFile('thumbnail_image')) {
            $file = $request->file('thumbnail_image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $folderName = 'GamesImagefolder';
            $path = public_path($folderName);
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $upload = $file->move($path, $fileName);
            if ($upload) {
                $game->thumbnail_image = $folderName . '/' . $fileName;
            }
        }
        $appUrl = env('APP_URL');
        if (!empty($game->thumbnail_image)) {
            $imageUrl = $appUrl . '/' . $game->thumbnail_image;
            $game->thumbnail_image = $imageUrl;
        }


        $game->save();
        return redirect('games_list')->with('status', 'Student Added Successfully');
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
        $game->top_game = 0;
        $game->featured_game = 0;
        $game->featured_game_Image_Url = null;
        $game->short_description = $request->input('short_description');
        $game->details = $request->input('details');

        if ($request->hasFile('thumbnail_image')) {
            $file = $request->file('thumbnail_image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $folderName = 'GamesImagefolder';
            $path = public_path($folderName);
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $upload = $file->move($path, $fileName);
            if ($upload) {
                $game->thumbnail_image = $folderName . '/' . $fileName;
            }
        }
        $appUrl = env('APP_URL');
        if (!empty($game->thumbnail_image)) {
            $imageUrl = $appUrl . '/' . $game->thumbnail_image;
            $game->thumbnail_image = $imageUrl;
        }
        $game->update();
        return redirect('games_list')->with('status', 'Student Added Successfully');
    }

    public function destroy($id)
    {
        $game = Games::find($id);
        $game->delete();
        return redirect()->back()->with('status', 'Student Deleted Successfully');
    }
}
