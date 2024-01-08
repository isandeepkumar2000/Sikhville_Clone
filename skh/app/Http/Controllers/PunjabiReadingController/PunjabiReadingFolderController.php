<?php

namespace App\Http\Controllers\PunjabiReadingController;

use App\Http\Controllers\Controller;
use App\Models\PunjabiReadingModel\Punjabireading;
use App\Models\PunjabiReadingModel\Punjabireadingcategories;
use Illuminate\Http\Request;

class PunjabiReadingFolderController extends Controller
{
    public function showpunjabireadingList()
    {
        $punjabireading = Punjabireading::with('punjabireadingCategoryDetails')->get();
        return view('PunjabiReadingScreen.PunjabiReadingFolder.punjabiReading', compact('punjabireading'));
    }
    public function create()
    {
        $punjabireading = PunjabireadingCategories::all();
        return view('PunjabiReadingScreen.PunjabiReadingFolder.createPunjabiReading', compact('punjabireading'));
    }
    public function store(Request $request)
    {
        $punjabireading = new Punjabireading;
        $punjabireading->punjabireadingCategoriesid = $request->input('punjabireadingCategoriesid');
        $punjabireading->reading_summary_pdf = $request->input('reading_summary_pdf');
        $punjabireading->reading_video_url = $request->input('reading_video_url');

        if ($request->hasFile('thumbnail_big_image')) {
            $file = $request->file('thumbnail_big_image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $folderName = 'PunjabiReadingImagefolder';
            $path = public_path($folderName);
            $upload = $file->move($path, $fileName);

            if ($upload) {
                $punjabireading->thumbnail_big_image = $folderName . '/' . $fileName;
            }
        }

        $punjabireading->save();
        return redirect('punjabi_reading_list')->with('status', 'Student Added Successfully');
    }

    public function edit($id)
    {
        $punjabireadingcategories = Punjabireadingcategories::all();
        $punjabireading = Punjabireading::find($id);
        return view('PunjabiReadingScreen.PunjabiReadingFolder.editPunjabiReading', compact('punjabireading', 'punjabireadingcategories'));
    }
    public function update(Request $request, $id)
    {
        $punjabireading = Punjabireading::find($id);
        $punjabireading->punjabireadingCategoriesid = $request->input('punjabireadingCategoriesid');
        $punjabireading->reading_summary_pdf = $request->input('reading_summary_pdf');
        $punjabireading->reading_video_url = $request->input('reading_video_url');

        if ($request->hasFile('thumbnail_big_image')) {
            $file = $request->file('thumbnail_big_image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $folderName = 'PunjabiReadingImagefolder';
            $path = public_path($folderName);
            $upload = $file->move($path, $fileName);

            if ($upload) {
                $punjabireading->thumbnail_big_image = $folderName . '/' . $fileName;
            }
        }

        $punjabireading->update();
        return redirect('punjabi_reading_list')->with('status', 'Student Added Successfully');
    }

    public function destroy($id)
    {
        $punjabireading = Punjabireading::find($id);
        $punjabireading->delete();
        return redirect('punjabi_reading_list')->with('status', 'Student Added Successfully');
    }


    public function featuredpunjabireading($id, Request $request)
    {
        // print_r($_POST);
        // print_r($_FILES);
        // print_r($request->all());
        $punjabireading = Punjabireading::find($id);

        if ($punjabireading) {
            if ($punjabireading->featured_punjabi_reading) {
                $punjabireading->featured_punjabi_reading = 0;
            } else {
                $punjabireading->featured_punjabi_reading = 1;
                if ($request->hasFile('featured_punjabi_reading_Image_Url')) {
                    $file = $request->file('featured_punjabi_reading_Image_Url');
                    $fileName = time() . '.' . $file->getClientOriginalExtension();
                    $folderName = 'PunjabiReadingFeaturedImagefolder';
                    $path = public_path($folderName);
                    $upload = $file->move($path, $fileName);
                    if ($upload) {
                        $punjabireading->featured_punjabi_reading_Image_Url = $folderName . '/' . $fileName;
                    }
                }
            }
        }
        $punjabireading->save();
        return redirect()->back()->with('status', 'Punjabi Reading Updated Successfully');
    }
}
