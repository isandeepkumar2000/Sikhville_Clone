<?php

namespace App\Http\Controllers\MusicController;

use App\Http\Controllers\Controller;
use App\Models\MusicModel\Music;
use App\Models\MusicModel\MusicCategories;
use Illuminate\Http\Request;

class MusicFolderController extends Controller
{
    public function musicfolder(Request $request)
    {
        $musics = Music::with('musicCategoryDetails')->orderBy('id', "desc");
        if ($request->has('category_id') && $request->input('category_id') != 'all') {
            $musics->where('musicCategoriesid', $request->input('category_id'));
        }
        $music = $musics->paginate(10);
        $categories = MusicCategories::all();
        return view('MusicScreen.MusicFolder.music', compact('music', 'categories'));
    }
    public function create()
    {
        $music = MusicCategories::all();
        return view('MusicScreen.MusicFolder.createMusic', compact('music'));
    }
    public function store(Request $request)
    {
        $music                    = new Music;
        $music->musicCategoriesid = $request->input('musicCategoriesid');
        $music->title             = $request->input('title');
        $music->short_description = $request->input('short_description');
        if ($request->hasFile('thumbnail_image')) {
            $file       = $request->file('thumbnail_image');
            $fileName   = time() . '.' . $file->getClientOriginalExtension();
            $folderName = 'MusicImagefolder';
            $path       = public_path($folderName);
            $upload     = $file->move($path, $fileName);
            if ($upload) {
                $music->thumbnail_image = $folderName . '/' . $fileName;
            }
        }
        if ($request->hasFile('music_song_details_banner')) {
            $file       = $request->file('music_song_details_banner');
            $fileName   = time() . '.' . $file->getClientOriginalExtension();
            $folderName = 'MusicSongDetailsBannerfolder';
            $path       = public_path($folderName);
            $upload     = $file->move($path, $fileName);
            if ($upload) {
                $music->music_song_details_banner = $folderName . '/' . $fileName;
            }
        }
        if ($request->hasFile('recommended_album_image')) {
            $file       = $request->file('recommended_album_image');
            $fileName   = time() . '.' . $file->getClientOriginalExtension();
            $folderName = 'Music_Recommended_Album_Image_folder';
            $path       = public_path($folderName);
            $upload     = $file->move($path, $fileName);
            if ($upload) {
                $music->recommended_album_image = $folderName . '/' . $fileName;
            }
        }
        $music->save();
        return redirect('music_list')->with('status', 'Music Added Successfully');
    }
    public function edit($id)
    {
        $musiccategories = MusicCategories::all();
        $music           = Music::find($id);
        return view('MusicScreen.MusicFolder.editMusic', compact('music', 'musiccategories'));
    }
    public function update(Request $request, $id)
    {
        $music                    = Music::find($id);
        $music->musicCategoriesid = $request->input('musicCategoriesid');
        $music->title             = $request->input('title');
        $music->short_description = $request->input('short_description');
        if ($request->hasFile('thumbnail_image')) {
            $file       = $request->file('thumbnail_image');
            $fileName   = time() . '.' . $file->getClientOriginalExtension();
            $folderName = 'MusicImagefolder';
            $path       = public_path($folderName);
            $upload     = $file->move($path, $fileName);
            if ($upload) {
                $music->thumbnail_image = $folderName . '/' . $fileName;
            }
        }
        if ($request->hasFile('music_song_details_banner')) {
            $file       = $request->file('music_song_details_banner');
            $fileName   = time() . '.' . $file->getClientOriginalExtension();
            $folderName = 'MusicSongDetailsBannerfolder';
            $path       = public_path($folderName);
            $upload     = $file->move($path, $fileName);
            if ($upload) {
                $music->music_song_details_banner = $folderName . '/' . $fileName;
            }
        }
        if ($request->hasFile('recommended_album_image')) {
            $file       = $request->file('recommended_album_image');
            $fileName   = time() . '.' . $file->getClientOriginalExtension();
            $folderName = 'Music_Recommended_Album_Image_folder';
            $path       = public_path($folderName);
            $upload     = $file->move($path, $fileName);
            if ($upload) {
                $music->recommended_album_image = $folderName . '/' . $fileName;
            }
        }
        $music->update();
        return redirect('music_list')->with('status', 'Music Added Successfully');
    }
    public function destroy($id)
    {
        $music = Music::find($id);
        if ($music->recommended_album_image) {
            $filePath = public_path('skh/public/' . $music->recommended_album_image);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }
        if ($music->music_song_details_banner) {
            $filePath = public_path('skh/public/' . $music->music_song_details_banner);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }
        if ($music->featured_music_Image_Url) {
            $filePath = public_path('skh/public/' . $music->featured_music_Image_Url);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }
        if ($music->thumbnail_image) {
            $filePath = public_path('skh/public/' . $music->thumbnail_image);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }
        $music->delete();
        return redirect('music_list')->with('status', 'Music Added Successfully');
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
        return redirect('music_list')->with('status', 'Music Added Successfully');
    }
    public function deletemusicImage($id)
    {
        $music = Music::find($id);
        if ($music) {
            if ($music->featured_music_Image_Url) {
                $filePath = public_path('skh/public/' . $music->featured_music_Image_Url);
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
                $music->featured_music_Image_Url = null;
                $music->featured_music = 0;
                $music->save();
                return redirect()->back()->with('status', 'Image deleted successfully');
            }
            if ($music->music_song_details_banner) {
                $filePath = public_path('skh/public/' . $music->music_song_details_banner);
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
                $music->music_song_details_banner = null;
                $music->save();
                return redirect()->back()->with('status', 'Image deleted successfully');
            }
            if ($music->recommended_album_image) {
                $filePath = public_path('skh/public/' . $music->recommended_album_image);
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
                $music->recommended_album_image = null;
                $music->save();
                return redirect()->back()->with('status', 'Image deleted successfully');
            }
            if ($music->thumbnail_image) {
                $filePath = public_path('skh/public/' . $music->thumbnail_image);
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
                $music->thumbnail_image = null;
                $music->save();
                return redirect()->back()->with('status', 'Image deleted successfully');
            }
        }
    }
}
