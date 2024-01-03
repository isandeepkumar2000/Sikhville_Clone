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
        $punjabireading->thumbnail_big_image = $request->input('thumbnail_big_image');
        $punjabireading->featured_punabi_reading = 0;
        $punjabireading->reading_summary_pdf = $request->input('reading_summary_pdf');
        $punjabireading->reading_video_url = $request->input('reading_video_url');
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
        $punjabireading->featured_punabi_reading = 0;
        $punjabireading->thumbnail_big_image = $request->input('thumbnail_big_image');
        $punjabireading->reading_summary_pdf = $request->input('reading_summary_pdf');
        $punjabireading->reading_video_url = $request->input('reading_video_url');
        $punjabireading->update();
        return redirect('punjabi_reading_list')->with('status', 'Student Added Successfully');
    }

    public function destroy($id)
    {
        $punjabireading = Punjabireading::find($id);
        $punjabireading->delete();
        return redirect('punjabi_reading_list')->with('status', 'Student Added Successfully');
    }

    public function featured_punjabi_reading($id)
    {
        $punjabireading = Punjabireading::find($id);
        if ($punjabireading) {
            if ($punjabireading->featured_punabi_reading) {
                $punjabireading->featured_punabi_reading = 0;
            } else {

                $punjabireading->featured_punabi_reading = 1;
            }

            $punjabireading->save();
        }
        return redirect()->back()->with('status', 'Student Updated Successfully');
    }
}
