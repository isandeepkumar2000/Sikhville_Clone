<?php

namespace App\Http\Controllers\MusicController;

use App\Http\Controllers\Controller;
use App\Models\MusicModel\Music;
use App\Models\MusicModel\MusicSong;
use Illuminate\Http\Request;

class MusicSongController extends Controller
{
    public function showmusicsongList()
    {
        $musicSong = MusicSong::with('musicfolderDetails')->get();

        return view('MusicScreen.MusicSongFolder.musicSong', compact('musicSong'));
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
        $musicSong->song_duration = $request->input('song_duration');
        $musicSong->song_path = $request->input('song_path');
        $musicSong->music_details_description = $request->input('music_details_description');

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

          if ($request->hasFile('music_song_details_banner')) {
            $file = $request->file('music_song_details_banner');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $folderName = 'MusicSongDetailsBannerfolder';
            $path = public_path($folderName);
            $upload = $file->move($path, $fileName);

            if ($upload) {
                $musicSong->music_song_details_banner = $folderName . '/' . $fileName;
            }
        }



        $musicSong->save();
        return redirect('music_song_list')->with('status', 'Student Added Successfully');
    }
    public function edit($id)
    {
        $music = Music::all();
        $musicSong = MusicSong::find($id);
        return view('MusicScreen.MusicSongFolder.editMusicSong', compact('musicSong', 'music'));
    }

    public function update(Request $request, $id)
    {

        $musicSong = MusicSong::find($id);
        $musicSong->musicid = $request->input('musicid');
        $musicSong->song_name = $request->input('song_name');
        $musicSong->song_size = $request->input('song_size');
        $musicSong->song_duration = $request->input('song_duration');
        $musicSong->song_path = $request->input('song_path');
        $musicSong->music_details_description = $request->input('music_details_description');

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

          if ($request->hasFile('music_song_details_banner')) {
            $file = $request->file('music_song_details_banner');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $folderName = 'MusicSongDetailsBannerfolder';
            $path = public_path($folderName);
            $upload = $file->move($path, $fileName);

            if ($upload) {
                $musicSong->music_song_details_banner = $folderName . '/' . $fileName;
            }
        }

        $musicSong->update();
        return redirect('music_song_list')->with('status', 'Student Added Successfully');
    }

    public function destroy($id)
    {
        $musicSong = MusicSong::find($id);
        $musicSong->delete();
        return redirect()->back()->with('status', 'Student Deleted Successfully');
    }
}
