<?php

namespace App\Http\Controllers\PunjabiReadingController;

use App\Http\Controllers\Controller;
use App\Models\PunjabiReadingModel\Punjabireadingcategories;
use Illuminate\Http\Request;

class PunjabiReadingCategoriesController extends Controller
{
    public function showpunjabireadingCategoriesList()
    {
        $punjabireadingCategories = Punjabireadingcategories::all();
        return view('PunjabiReadingScreen.PunjabiReadingCategories.punjabiReadingCategories', compact('punjabireadingCategories'));
    }
    public function create()
    {
        return view('PunjabiReadingScreen.PunjabiReadingCategories.createPunjabiReadingCategories');
    }
    public function store(Request $request)
    {
        $punjabireadingCategories = new Punjabireadingcategories();
        $punjabireadingCategories->name = $request->input('name');
        $punjabireadingCategories->reading_title = $request->input('reading_title');


        if ($request->hasFile('thumbnail_ishort_image')) {
            $file = $request->file('thumbnail_ishort_image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $folderName = 'PunjabiReadingCategoriesImagefolder';
            $path = public_path($folderName);
            $upload = $file->move($path, $fileName);

            if ($upload) {
                $punjabireadingCategories->thumbnail_ishort_image = $folderName . '/' . $fileName;
            }
        }

        $punjabireadingCategories->save();
        return redirect('punjabi_reading_categories_list')->with('status', 'Student Added Successfully');
    }
    public function edit($id)
    {
        $punjabireadingCategories = Punjabireadingcategories::find($id);
        return view('PunjabiReadingScreen.PunjabiReadingCategories.editPunjabiReadingCategories', compact('punjabireadingCategories'));
    }

    public function update(Request $request, $id)
    {
        $punjabireadingCategories = Punjabireadingcategories::find($id);
        $punjabireadingCategories->name = $request->input('name');
        $punjabireadingCategories->reading_title = $request->input('reading_title');

        if ($request->hasFile('thumbnail_ishort_image')) {
            $file = $request->file('thumbnail_ishort_image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $folderName = 'PunjabiReadingCategoriesImagefolder';
            $path = public_path($folderName);
            $upload = $file->move($path, $fileName);

            if ($upload) {
                $punjabireadingCategories->thumbnail_ishort_image = $folderName . '/' . $fileName;
            }
        }

        $punjabireadingCategories->update();
        return redirect()->back()->with('status', 'Student Updated Successfully');
    }

    public function destroy($id)
    {
        $punjabireadingCategories = Punjabireadingcategories::find($id);
        $punjabireadingCategories->delete();
        return redirect()->back()->with('status', 'Student Deleted Successfully');
    }
}
