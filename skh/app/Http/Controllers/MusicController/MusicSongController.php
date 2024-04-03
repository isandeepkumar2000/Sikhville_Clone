<?php

namespace App\Http\Controllers\MusicController;

use App\Http\Controllers\Controller;
use App\Models\MusicModel\Music;
use App\Models\MusicModel\MusicSong;
use Illuminate\Http\Request;

class MusicSongController extends Controller
{
    public function showmusicsongList(Request $request)
    {
        $musicSongs = MusicSong::with('musicfolderDetails')->orderBy('id', "desc");

        if ($request->has('category_id') && $request->input('category_id') != 'all') {
            $musicSongs->where('musicid', $request->input('category_id'));
        }
        $musicSong  = $musicSongs->paginate(10);
        $categories = Music::all();
        return view('MusicScreen.MusicSongFolder.musicSong', compact('musicSong', 'categories'));
    }

    public function create()
    {
        $musicSong = Music::all();
        return view('MusicScreen.MusicSongFolder.createMusicSong', compact('musicSong'));
    }
    public function store(Request $request)
    {
        $musicSong = new MusicSong;
        $musicSong->musicid = $request->input('musicid');
        $musicSong->song_name = $request->input('song_name');
        $musicSong->song_size = $request->input('song_size');
        $musicSong->sportify = $request->input('sportify');
        $musicSong->wynk = $request->input('wynk');
        $musicSong->sound_cloud = $request->input('sound_cloud');
        $musicSong->youtube = $request->input('youtube');
        $musicSong->apple = $request->input('apple');
        $musicSong->amazon = $request->input('amazon');
        $musicSong->song_duration = $request->input('song_duration');
        $musicSong->song_path = $request->input('song_path');
        $musicSong->music_composers_by = $request->input('music_composers_by');
        $musicSong->music_lyrics_by = $request->input('music_lyrics_by');
        $musicSong->music_artists_name = $request->input('music_artists_name');


        if ($request->hasFile('music_song_details_image')) {
            $file = $request->file('music_song_details_image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $folderName = 'MusicSongDetailsImagefolder';
            $path = public_path($folderName);
            $upload = $file->move($path, $fileName);

            if ($upload) {
                $musicSong->music_song_details_image = $folderName . '/' . $fileName;
            }
        }

        $musicSong->save();
        return redirect('music_song_list')->with('status', 'Music Song Added Successfully');
    }
    public function edit($id)
    {
        $music = Music::all();
        $musicSong = MusicSong::find($id);
        return view('MusicScreen.MusicSongFolder.editMusicSong', compact('musicSong', 'music'));
    }

    public function update(Request $request, $id)
    {
        $musicSong                = MusicSong::find($id);
        $musicSong->musicid       = $request->input('musicid');
        $musicSong->song_name     = $request->input('song_name');
        $musicSong->sportify = $request->input('sportify');
        $musicSong->wynk = $request->input('wynk');
        $musicSong->sound_cloud = $request->input('sound_cloud');
        $musicSong->youtube = $request->input('youtube');
        $musicSong->apple = $request->input('apple');
        $musicSong->amazon = $request->input('amazon');
        $musicSong->song_size     = $request->input('song_size');
        $musicSong->song_duration = $request->input('song_duration');
        $musicSong->song_path     = $request->input('song_path');
        $musicSong->music_composers_by = $request->input('music_composers_by');
        $musicSong->music_lyrics_by = $request->input('music_lyrics_by');
        $musicSong->music_artists_name = $request->input('music_artists_name');



        if ($request->hasFile('music_song_details_image')) {
            $file = $request->file('music_song_details_image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $folderName = 'MusicSongDetailsImagefolder';
            $path = public_path($folderName);
            $upload = $file->move($path, $fileName);

            if ($upload) {
                $musicSong->music_song_details_image = $folderName . '/' . $fileName;
            }
        }
        $musicSong->update();
        return redirect('music_song_list')->with('status', 'Music Song Added Successfully');
    }

    public function destroy($id)
    {
        $musicSong = MusicSong::find($id);

        if ($musicSong->music_song_details_image) {
            $filePath = public_path('skh/public/' . $musicSong->music_song_details_image);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }
        $musicSong->delete();
        return redirect('music_song_list')->with('status', 'Music Song Added Successfully');
    }

    public function deletemusicSongImage($id)
    {
        $musicSong = MusicSong::find($id);

        if ($musicSong) {

            if ($musicSong->music_song_details_image) {
                $filePath = public_path('skh/public/' . $musicSong->music_song_details_image);
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
                $musicSong->music_song_details_image = null;

                $musicSong->save();
                return redirect()->back()->with('status', 'Image deleted successfully');
            }
        }
    }
}
