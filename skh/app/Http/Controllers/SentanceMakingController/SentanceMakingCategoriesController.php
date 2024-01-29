<?php

namespace App\Http\Controllers\SentanceMakingController;

use App\Http\Controllers\Controller;
use App\Models\SentanceMakingModel\Sentancemakingcategories;
use Illuminate\Http\Request;

class SentanceMakingCategoriesController extends Controller
{
    public function showsentancemakingCategoriesList()
    {
        $sentancemakingCategories = Sentancemakingcategories::all();
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
        $sentancemakingCategories->update();
        return redirect()->back()->with('status', 'Student Updated Successfully');
    }

    public function destroy($id)
    {
        $sentancemakingCategories = Sentancemakingcategories::find($id);
        $sentancemakingCategories->delete();
        return redirect()->back()->with('status', 'Student Deleted Successfully');
    }
}
