<?php

namespace App\Http\Controllers\DownloadController;

use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
// use App\Models\download;
use App\Models\DownloadModel\DownloadCategories;

class DownloadCategoriesController extends Controller
{
    public function showdownloadCategories()
    {
        $downlordCategories = DownloadCategories::all();
        return view('DownloadScreen.DownloadCategories.downloadCategories', compact('downlordCategories'));
    }

    public function create()
    {
        return view('DownloadScreen.DownloadCategories.createDownloadCategories');
    }

    public function store(Request $request)
    {

        $downlordCategories = new DownloadCategories;
        $downlordCategories->name = $request->input('name');

        if ($request->hasFile('downlord_categories_icons')) {
            $file = $request->file('downlord_categories_icons');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $folderName = 'DownloadIconsfolder';
            $path = public_path($folderName);
            $upload = $file->move($path, $fileName);

            if ($upload) {
                $downlordCategories->downlord_categories_icons = $folderName . '/' . $fileName;
            }
        }
        $downlordCategories->save();
        return redirect('download_categories_list')->with('status', 'Student Added Successfully');
    }
    public function edit($id)
    {
        $downlordCategories = DownloadCategories::find($id);
        return view('DownloadScreen.DownloadCategories.editDownloadCategories', compact('downlordCategories'));
    }

    public function update(Request $request, $id)
    {
        $downlordCategories = DownloadCategories::find($id);
        $downlordCategories->name = $request->input('name');
        if ($request->hasFile('downlord_categories_icons')) {
            $file = $request->file('downlord_categories_icons');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $folderName = 'DownloadIconsfolder';
            $path = public_path($folderName);
            $upload = $file->move($path, $fileName);

            if ($upload) {
                $downlordCategories->downlord_categories_icons = $folderName . '/' . $fileName;
            }
        }
        $downlordCategories->update();
        return redirect()->back()->with('status', 'Student Updated Successfully');
    }

    public function destroy($id)
    {
        $downlordCategories = DownloadCategories::find($id);
        $downlordCategories->delete();
        return redirect()->back()->with('status', 'Student Deleted Successfully');
    }
}
