<?php

namespace App\Http\Controllers\MusicController;

use App\Http\Controllers\Controller;
use App\Models\MusicModel\Music;
use App\Models\MusicModel\MusicCategories;
use Illuminate\Http\Request;

class MusicFolderController extends Controller
{
    public function musicfolder()
    {
        $music = Music::with('musicCategoryDetails')->get();
        print_r($music->toArray());
        return view('MusicScreen.MusicFolder.music', compact('music'));
    }
    public function create()
    {
        $music = MusicCategories::all();
        return view('MusicScreen.MusicFolder.createMusic', compact('music'));
    }
    public function store(Request $request)
    {
        $music = new Music;
        $music->musicCategoriesid = $request->input('musicCategoriesid');
        $music->title = $request->input('title');
        $music->featured_music = 0;
        $music->thumbnail_image = $request->input('thumbnail_image');
        $music->short_description = $request->input('short_description');
        $music->save();
        return redirect('music_list')->with('status', 'Student Added Successfully');
    }

    public function feartured_music($id)
    {
        $music = Music::find($id);

        if ($music) {
            if ($music->featured_music) {
                $music->featured_music = 0;
            } else {

                $music->featured_music = 1;
            }

            $music->save();
        }
        return redirect()->back()->with('status', 'Student Updated Successfully');
    }

    public function edit($id)
    {
        $musiccategories = MusicCategories::all();
        $music = Music::find($id);
        return view('MusicScreen.MusicFolder.editMusic', compact('music', 'musiccategories'));
    }
    public function update(Request $request, $id)
    {
        $music = Music::find($id);
        $music->musicCategoriesid = $request->input('musicCategoriesid');
        $music->title = $request->input('title');
        $music->featured_music = 0;
        $music->thumbnail_image = $request->input('thumbnail_image');
        $music->short_description = $request->input('short_description');
        $music->update();
        return redirect()->back()->with('status', 'Student Updated Successfully');
    }

    public function destroy($id)
    {
        $music = Music::find($id);
        $music->delete();
        return redirect()->back()->with('status', 'Student Deleted Successfully');
    }
}
