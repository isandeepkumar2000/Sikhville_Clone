<?php

namespace App\Http\Controllers\VideoController;

use App\Http\Controllers\Controller;
use App\Models\VideoModel\VideoCategories;
use Illuminate\Http\Request;

class VideoCategoryController extends Controller
{
    public function showvideoList()
    {
        $videoCategories = VideoCategories::all();
        return view('VideoScreen.VideosCategories.videosCategories', compact('videoCategories'));
    }
    public function create()
    {
        return view('VideoScreen.VideosCategories.createVideosCategories');
    }
    public function store(Request $request)
    {
        $videoCategories = new VideoCategories;
        $videoCategories->name = $request->input('name');
        $videoCategories->save();
        return redirect('video_categories_list')->with('status', 'Student Added Successfully');
    }
    public function edit($id)
    {
        $videoCategories = VideoCategories::find($id);
        return view('VideoScreen.VideosCategories.editVideosCategories', compact('videoCategories'));
    }
    public function update(Request $request, $id)
    {
        $videoCategories = VideoCategories::find($id);
        $videoCategories->name = $request->input('name');
        $videoCategories->update();
        return redirect()->back()->with('status', 'Student Updated Successfully');
    }

    public function destroy($id)
    {
        $videoCategories = VideoCategories::find($id);
        $videoCategories->delete();
        return redirect()->back()->with('status', 'Student Deleted Successfully');
    }
}
