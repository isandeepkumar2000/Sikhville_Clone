<?php

namespace App\Http\Controllers\WebsiteContentController;

use App\Http\Controllers\Controller;
use App\Models\WebsiteContentModel\Websitecontent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(), [
            'type' => 'required',
            'title' => 'required',
            'content' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $existingContent = Websitecontent::where('type', $request->input('type'))->first();
        if ($existingContent) {
            return redirect()->back()->withErrors(['error' => 'Website Content with this type already exists. Please update or delete it.']);
        }
        $websiteContent = new Websitecontent;
        $websiteContent->title = $request->input('title');
        $websiteContent->content = $request->input('content');
        $websiteContent->type = $request->input('type');
        $websiteContent->save();

        return redirect('website_content_list')->with('status', 'Content Added Successfully');
    }
    public function edit($id)
    {
        $websiteContent = Websitecontent::find($id);
        return view('WebsiteContentScreen.WebsiteContent.editWebsiteContent', compact('websiteContent'));
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'type' => 'required',
            'title' => 'required',
            'content' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $existingContent = Websitecontent::where('type', $request->input('type'))->where('id', '!=', $id)->first();
        if ($existingContent) {
            return redirect()->back()->withErrors(['error' => 'Website Content with this type already exists. Please update or delete it.']);
        }
        $websiteContent = Websitecontent::find($id);
        if (!$websiteContent) {
            return redirect()->back()->withErrors(['error' => 'Website Content not found.']);
        }
        $websiteContent->title = $request->input('title');
        $websiteContent->content = $request->input('content');
        $websiteContent->type = $request->input('type');
        $websiteContent->save();

        return redirect()->back()->with('status', 'Website Content Updated Successfully');
    }

    public function destroy($id)
    {
        $websiteContent = Websitecontent::find($id);
        $websiteContent->delete();
        return redirect()->back()->with('status', 'Student Deleted Successfully');
    }
}
