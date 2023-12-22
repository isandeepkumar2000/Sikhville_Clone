<?php

namespace App\Http\Controllers\MusicController;

use App\Http\Controllers\Controller;
use App\Models\MusicModel\MusicCategories;
use Illuminate\Http\Request;

class MusicCategoryController extends Controller
{
    public function showmusicList()
    {
        $musicCategories = MusicCategories::all();
        return view('MusicScreen.MusicCategories.musicCategories', compact('musicCategories'));
    }
    public function create()
    {
        return view('MusicScreen.MusicCategories.createMusicCategories');
    }
    public function store(Request $request)
    {
        $musicCategories = new MusicCategories;
        $musicCategories->name = $request->input('name');
        $musicCategories->save();
        return redirect('music_categories_list')->with('status', 'Student Added Successfully');
    }
    public function edit($id)
    {
        $musicCategories = MusicCategories::find($id);
        return view('MusicScreen.MusicCategories.editMusicCategories', compact('musicCategories'));
    }

    public function update(Request $request, $id)
    {
        $musicCategories = MusicCategories::find($id);
        $musicCategories->name = $request->input('name');
        $musicCategories->update();
        return redirect()->back()->with('status', 'Student Updated Successfully');
    }

    public function destroy($id)
    {
        $musicCategories = MusicCategories::find($id);
        $musicCategories->delete();
        return redirect()->back()->with('status', 'Student Deleted Successfully');
    }
}
