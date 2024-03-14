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
        $shabdkosh->shabdkosh_video_url = $request->input('shabdkosh_video_url');
        $shabdkosh->short_description = $request->input('short_description');
        if ($request->hasFile('thumbnail_short_image')) {
            $file       = $request->file('thumbnail_short_image');
            $fileName   = time() . '.' . $file->getClientOriginalExtension();
            $folderName = 'Shabdkosh_Image';
            $path       = public_path($folderName);
            $upload     = $file->move($path, $fileName);
            if ($upload) {
                $shabdkosh->thumbnail_short_image = $folderName . '/' . $fileName;
            }
        }
        $shabdkosh->save();
        return redirect('shabdkosh_list')->with('status', 'Shabdkosh  Added Successfully');
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
        $shabdkosh->shabdkosh_video_url = $request->input('shabdkosh_video_url');
        $shabdkosh->short_description = $request->input('short_description');
        if ($request->hasFile('thumbnail_short_image')) {
            $file       = $request->file('thumbnail_short_image');
            $fileName   = time() . '.' . $file->getClientOriginalExtension();
            $folderName = 'Shabdkosh_Image';
            $path       = public_path($folderName);
            $upload     = $file->move($path, $fileName);
            if ($upload) {
                $shabdkosh->thumbnail_short_image = $folderName . '/' . $fileName;
            }
        }
        $shabdkosh->update();
        return redirect()->back()->with('status', 'Shabdkosh  Updated Successfully');
    }

    public function destroy($id)
    {
        $shabdkosh = Shabdkosh::find($id);
        if ($shabdkosh->thumbnail_short_image) {
            $filePath = public_path('skh/public/' . $shabdkosh->thumbnail_short_image);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }
        $shabdkosh->delete();
        return redirect()->back()->with('status', 'Shabdkosh  Deleted Successfully');
    }

    public function deleteImage($id)
    {

        $shabdkosh = Shabdkosh::find($id);
        if ($shabdkosh) {

            if ($shabdkosh->thumbnail_short_image) {
                $filePath = public_path('skh/public/' . $shabdkosh->thumbnail_short_image);
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
                $shabdkosh->thumbnail_short_image = null;
                $shabdkosh->save();
                return redirect()->back()->with('status', 'Image deleted successfully');
            }
        }
        return redirect()->back()->with('error', 'Image not found or already deleted');
    }
}
