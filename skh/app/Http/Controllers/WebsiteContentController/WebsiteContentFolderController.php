<?php

namespace App\Http\Controllers\WebsiteContentController;

use App\Http\Controllers\Controller;
use App\Models\WebsiteContentModel\Websitecontent;
use Illuminate\Http\Request;

class WebsiteContentFolderController extends Controller
{
    public function showwebsitecontentlist()
    {
        $websiteContent = Websitecontent::all();
        return view('WebsiteContentScreen.WebsiteContent.websiteContent', compact('websiteContent'));
    }
    public function create()
    {
        return view('WebsiteContentScreen.WebsiteContent.createWebsiteContent');
    }
    public function store(Request $request)
    {
        $websiteContent = new Websitecontent;

        $websiteContent->title = $request->input('title');
        $websiteContent->content = $request->input('content');
        $websiteContent->type = $request->input('type');
        $websiteContent->save();
        return redirect('website_content_list')->with('status', 'Student Added Successfully');
    }
    public function edit($id)
    {
        $websiteContent = Websitecontent::find($id);
        return view('WebsiteContentScreen.WebsiteContent.editWebsiteContent', compact('websiteContent'));
    }

    public function update(Request $request, $id)
    {
        $websiteContent = Websitecontent::find($id);
        $websiteContent->title = $request->input('title');
        $websiteContent->content = $request->input('content');
        $websiteContent->type = $request->input('type');
        $websiteContent->update();
        return redirect()->back()->with('status', 'Student Updated Successfully');
    }

    public function destroy($id)
    {
        $websiteContent = Websitecontent::find($id);
        $websiteContent->delete();
        return redirect()->back()->with('status', 'Student Deleted Successfully');
    }
}
