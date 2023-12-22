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
        $downlordCategories->downlord_categories_icons = $request->input('downlord_categories_icons');
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
        $downlordCategories->downlord_categories_icons = $request->input('downlord_categories_icons');
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
