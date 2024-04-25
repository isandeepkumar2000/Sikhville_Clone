<?php

namespace App\Http\Controllers\SentanceMakingController;

use App\Http\Controllers\Controller;
use App\Models\SentanceMakingModel\Sentancemakingcategories;
use Illuminate\Http\Request;

class SentanceMakingCategoriesController extends Controller
{

    public function showsentancemakingCategoriesList()
    {
        $sentancemakingCategories = Sentancemakingcategories::orderBy('id', 'desc')->paginate(10);
        return view('SentanceMakingScreen.SentanceMakingCategories.sentanceMakingCategories', compact('sentancemakingCategories'));
    }
    public function create()
    {
        return view('SentanceMakingScreen.SentanceMakingCategories.createSentanceMakingCategories');
    }
    public function store(Request $request)
    {
        $sentancemakingCategories = new Sentancemakingcategories();
        $sentancemakingCategories->name = $request->input('name');
        $sentancemakingCategories->title = $request->input('title');
        $sentancemakingCategories->game_play_link = $request->input('game_play_link');
        $sentancemakingCategories->long_description = $request->input('long_description');
        $sentancemakingCategories->short_description = $request->input('short_description');

        if ($request->hasFile('thumbnail_image')) {
            $file       = $request->file('thumbnail_image');
            $fileName   = time() . '.' . $file->getClientOriginalExtension();
            $folderName = 'Sentance_Making_Image';
            $path       = public_path($folderName);
            $upload     = $file->move($path, $fileName);
            if ($upload) {
                $sentancemakingCategories->thumbnail_image = $folderName . '/' . $fileName;
            }
        }
        $sentancemakingCategories->save();
        return redirect('sentance_making_categories_list')->with('status', 'Student Added Successfully');
    }
    public function edit($id)
    {
        $sentancemakingCategories = Sentancemakingcategories::find($id);
        return view('SentanceMakingScreen.SentanceMakingCategories.editSentanceMakingCategories', compact('sentancemakingCategories'));
    }

    public function update(Request $request, $id)
    {
        $sentancemakingCategories = Sentancemakingcategories::find($id);
        $sentancemakingCategories->name = $request->input('name');
        $sentancemakingCategories->game_play_link = $request->input('game_play_link');
        $sentancemakingCategories->title = $request->input('title');
        $sentancemakingCategories->long_description = $request->input('long_description');
        $sentancemakingCategories->short_description = $request->input('short_description');

        if ($request->hasFile('thumbnail_image')) {
            $file       = $request->file('thumbnail_image');
            $fileName   = time() . '.' . $file->getClientOriginalExtension();
            $folderName = 'Sentance_Making_Image';
            $path       = public_path($folderName);
            $upload     = $file->move($path, $fileName);
            if ($upload) {
                $sentancemakingCategories->thumbnail_image = $folderName . '/' . $fileName;
            }
        }
        $sentancemakingCategories->update();
        return redirect()->back()->with('status', 'Sentance Making Updated Successfully');
    }

    public function destroy($id)
    {
        $sentancemakingCategories = Sentancemakingcategories::find($id);
        if ($sentancemakingCategories->thumbnail_image) {
            $filePath = public_path('skh/public/' . $sentancemakingCategories->thumbnail_image);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }
        $sentancemakingCategories->delete();
        return redirect()->back()->with('status', 'Student Deleted Successfully');
    }

    public function deleteImage($id)
    {
        $sentancemakingCategories = Sentancemakingcategories::find($id);
        if ($sentancemakingCategories) {

            if ($sentancemakingCategories->thumbnail_image) {
                $filePath = public_path('skh/public/' . $sentancemakingCategories->thumbnail_image);
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
                $sentancemakingCategories->thumbnail_image = null;
                $sentancemakingCategories->save();
                return redirect()->back()->with('status', 'Image deleted successfully');
            }
        }
        return redirect()->back()->with('error', 'Image not found or already deleted');
    }
}
