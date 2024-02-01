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
        $music->short_description = $request->input('short_description');

        if ($request->hasFile('thumbnail_image')) {
            $file = $request->file('thumbnail_image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $folderName = 'MusicImagefolder';
            $path = public_path($folderName);
            $upload = $file->move($path, $fileName);

            if ($upload) {
                $music->thumbnail_image = $folderName . '/' . $fileName;
            }
        }

        if ($request->hasFile('music_song_details_banner')) {
            $file = $request->file('music_song_details_banner');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $folderName = 'MusicSongDetailsBannerfolder';
            $path = public_path($folderName);
            $upload = $file->move($path, $fileName);

            if ($upload) {
                $music->music_song_details_banner = $folderName . '/' . $fileName;
            }
        }



        $music->save();
        return redirect('music_list')->with('status', 'Student Added Successfully');
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
        $music->short_description = $request->input('short_description');


        if ($request->hasFile('thumbnail_image')) {
            $file = $request->file('thumbnail_image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $folderName = 'MusicImagefolder';
            $path = public_path($folderName);
            $upload = $file->move($path, $fileName);

            if ($upload) {
                $music->thumbnail_image = $folderName . '/' . $fileName;
            }
        }

        if ($request->hasFile('music_song_details_banner')) {
            $file = $request->file('music_song_details_banner');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $folderName = 'MusicSongDetailsBannerfolder';
            $path = public_path($folderName);
            $upload = $file->move($path, $fileName);

            if ($upload) {
                $music->music_song_details_banner = $folderName . '/' . $fileName;
            }
        }


        $music->update();
        return redirect()->back()->with('status', 'Student Updated Successfully');
    }

    public function destroy($id)
    {
        $music = Music::find($id);
        $music->delete();
        return redirect()->back()->with('status', 'Student Deleted Successfully');
    }

    public function feartured_music(Request $request, $id)
    {
        $music = Music::find($id);

        if ($music) {
            if ($music->featured_music) {
                $music->featured_music = 0;
            } else {
                $music->featured_music = 1;
                if ($request->hasFile('featured_music_Image_Url')) {
                    $file = $request->file('featured_music_Image_Url');
                    $fileName = time() . '.' . $file->getClientOriginalExtension();
                    $folderName = 'MusicFeaturedImagefolder';
                    $path = public_path($folderName);
                    $upload = $file->move($path, $fileName);

                    if ($upload) {
                        $music->featured_music_Image_Url = $folderName . '/' . $fileName;
                    }
                }
            }

            $music->save();
        }
        return redirect()->back()->with('status', 'Student Updated Successfully');
    }
}
