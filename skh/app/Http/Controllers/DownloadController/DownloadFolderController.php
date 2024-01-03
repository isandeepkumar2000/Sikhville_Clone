<?php

namespace App\Http\Controllers\DownloadController;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\DownloadModel\Download;
use App\Models\DownloadModel\DownloadCategories;

class DownloadFolderController extends Controller
{
    public function download()
    {
        $download = Download::with('downloadcategoryDetails')->get();
        return view('DownloadScreen.DownloadFolder.download', compact('download'));
    }
    public function create()
    {
        $download = DownloadCategories::all();
        return view('DownloadScreen.DownloadFolder.createDownload', compact('download'));
    }
    public function store(Request $request)
    {
        $download = new Download;
        $download->categoryid = $request->input('categoryid');
        $download->featured_download = 0;
        $download->thumbnail_image = $request->input('thumbnail_image');
        $download->downloadpdf_url = $request->input('downloadpdf_url');
        $download->short_title = $request->input('short_title');
        $download->save();
        return redirect('download_list')->with('status', 'Student Added Successfully');
    }

    public function edit($id)
    {
        $downloadcategories = DownloadCategories::all();
        $download = Download::find($id);
        return view('DownloadScreen.DownloadFolder.editDownload', compact('download', 'downloadcategories'));
    }
    public function update(Request $request, $id)
    {
        $download = Download::find($id);
        $download->categoryid = $request->input('categoryid');
        $download->featured_download = 0;
        $download->thumbnail_image = $request->input('thumbnail_image');
        $download->downloadpdf_url = $request->input('downloadpdf_url');
        $download->short_title = $request->input('short_title');
        $download->update();
        return redirect()->back()->with('status', 'Student Updated Successfully');
    }

    public function destroy($id)
    {
        $download = Download::find($id);
        $download->delete();
        return redirect()->back()->with('status', 'Student Deleted Successfully');
    }

    public function featured_download($id)
    {
        $download = Download::find($id);

        if ($download) {
            if ($download->featured_download) {
                $download->featured_download = 0;
            } else {

                $download->featured_download = 1;
            }

            $download->save();
        }
        return redirect()->back()->with('status', 'Student Updated Successfully');
    }
}
