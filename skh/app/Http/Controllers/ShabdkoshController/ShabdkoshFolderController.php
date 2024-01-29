<?php

namespace App\Http\Controllers\ShabdkoshController;

use App\Http\Controllers\Controller;
use App\Models\ShabdkoshModel\Shabdkosh;
use Illuminate\Http\Request;

class shabdkoshFolderController extends Controller
{
    public function showshabdkoshList()
    {
        $shabdkosh = Shabdkosh::all();
        return view('ShabdkoshScreen.Shabdkosh.shabdkosh', compact('shabdkosh'));
    }
    public function create()
    {
        return view('ShabdkoshScreen.Shabdkosh.createShabdkosh');
    }
    public function store(Request $request)
    {
        $shabdkosh = new Shabdkosh();
        $shabdkosh->title = $request->input('title');
        $shabdkosh->thumbnail_short_image = $request->input('thumbnail_short_image');
        $shabdkosh->shabdkosh_video_url = $request->input('shabdkosh_video_url');
        $shabdkosh->short_description = $request->input('short_description');
        $shabdkosh->save();
        return redirect('shabdkosh_list')->with('status', 'Student Added Successfully');
    }
    public function edit($id)
    {
        $shabdkosh = Shabdkosh::find($id);
        return view('ShabdkoshScreen.Shabdkosh.editShabdkosh', compact('shabdkosh'));
    }

    public function update(Request $request, $id)
    {
        $shabdkosh = Shabdkosh::find($id);
        $shabdkosh->title = $request->input('title');
        $shabdkosh->thumbnail_short_image = $request->input('thumbnail_short_image');
        $shabdkosh->shabdkosh_video_url = $request->input('shabdkosh_video_url');
        $shabdkosh->short_description = $request->input('short_description');
        $shabdkosh->update();
        return redirect()->back()->with('status', 'Student Updated Successfully');
    }

    public function destroy($id)
    {
        $shabdkosh = Shabdkosh::find($id);
        $shabdkosh->delete();
        return redirect()->back()->with('status', 'Student Deleted Successfully');
    }
}
