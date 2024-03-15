<?php

namespace App\Http\Controllers\DynamicPageController;

use App\Http\Controllers\Controller;
use App\Models\DynamicPageModel\DynamicPage;
use Illuminate\Http\Request;

class DynamicPageController extends Controller
{
    public function showdynamicpagecontent()
    {
        $dynamicpagecontent = DynamicPage::all();
        return view('DynamicPageScreen.DynamicPageContent.dynamicPageContent', compact('dynamicpagecontent'));
    }
    public function create()
    {
        return view('DynamicPageScreen.DynamicPageContent.createDynamicPageContent');
    }
    public function store(Request $request)
    {
        $dynamicpagecontent = new DynamicPage;
        $dynamicpagecontent->slug = $request->input('slug');
        $dynamicpagecontent->title = $request->input('title');
        $dynamicpagecontent->description = $request->input('description');
        $dynamicpagecontent->body = $request->input('body');

        $dynamicpagecontent->save();
        return redirect()->back()->with('status', 'Dynamic Page stored Successfully');
    }
    public function edit($id)
    {
        $dynamicpagecontent = DynamicPage::find($id);
        return view('DynamicPageScreen.DynamicPageContent.editDynamicPageContent', compact('dynamicpagecontent'));
    }
    public function update(Request $request, $id)
    {
        $dynamicpagecontent = DynamicPage::find($id);
        $dynamicpagecontent->slug = $request->input('slug');
        $dynamicpagecontent->title = $request->input('title');
        $dynamicpagecontent->description = $request->input('description');
        $dynamicpagecontent->body = $request->input('body');

        $dynamicpagecontent->update();
        return redirect()->back()->with('status', 'Updated Successfully');
    }
    public function destroy($id)
    {
        $dynamicpagecontent = DynamicPage::find($id);
        $dynamicpagecontent->delete();
        return redirect()->back()->with('status', 'delete Successfully');
    }
}
