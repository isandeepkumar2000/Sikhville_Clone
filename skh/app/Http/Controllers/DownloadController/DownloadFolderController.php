<?php

namespace App\Http\Controllers\DownloadController;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\DownloadModel\Download;
use App\Models\DownloadModel\DownloadCategories;

class DownloadFolderController extends Controller
{
    public function download(Request $request)
    {
        $downloads = Download::with('downloadcategoryDetails')->orderBy('id', "desc");
        if ($request->has('category_id') && $request->input('category_id') != 'all') {
            $downloads->where('categoryid', $request->input('category_id'));
        }
        $download = $downloads->paginate(10);
        $categories = DownloadCategories::all();

        return view('DownloadScreen.DownloadFolder.download', compact('download', 'categories'));
    }


    public function create()
    {
        $download = DownloadCategories::all();
        return view('DownloadScreen.DownloadFolder.createDownload', compact('download',));
    }
    public function store(Request $request)
    {
        $download                  = new Download;
        $download->categoryid      = $request->input('categoryid');
        $download->downloadpdf_url = $request->input('downloadpdf_url');
        $download->short_title     = $request->input('short_title');


        if ($request->hasFile('thumbnail_image')) {
            $file       = $request->file('thumbnail_image');
            $fileName   = time() . '.' . $file->getClientOriginalExtension();
            $folderName = 'DownloadImagefolder';
            $path       = public_path($folderName);
            $upload     = $file->move($path, $fileName);

            if ($upload) {
                $download->thumbnail_image = $folderName . '/' . $fileName;
            }
        }
        $download->save();
        return redirect('download_list')->with('status', 'Home Page Banner Added Successfully');
    }

    public function edit($id)
    {
        $downloadcategories = DownloadCategories::all();
        $download           = Download::find($id);
        return view('DownloadScreen.DownloadFolder.editDownload', compact('download', 'downloadcategories'));
    }
    public function update(Request $request, $id)
    {
        $download                  = Download::find($id);
        $download->categoryid      = $request->input('categoryid');
        $download->downloadpdf_url = $request->input('downloadpdf_url');
        $download->short_title     = $request->input('short_title');

        if ($request->hasFile('thumbnail_image')) {
            $file       = $request->file('thumbnail_image');
            $fileName   = time() . '.' . $file->getClientOriginalExtension();
            $folderName = 'DownloadImagefolder';
            $path       = public_path($folderName);
            $upload     = $file->move($path, $fileName);

            if ($upload) {
                $download->thumbnail_image = $folderName . '/' . $fileName;
            }
        }
        $download->update();
        return redirect()->back()->with('status', 'Home Page Banner Added Successfully');
    }

    public function destroy($id)
    {
        $download = Download::find($id);

        if ($download->thumbnail_image) {
            $filePath = public_path('skh/public/' . $download->thumbnail_image);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        if ($download->featured_download_Image_Url) {
            $filePath = public_path('skh/public/' . $download->featured_download_Image_Url);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        $download->delete();
        return redirect()->back()->with('status', 'Student Deleted Successfully');
    }

    public function featureddownload($id, Request $request)
    {
        $download = Download::find($id);

        if ($download) {
            if ($request->hasFile('featured_download_Image_Url')) {
                if ($download->featured_download) {
                    $download->featured_download = 0;
                } else {
                    $download->featured_download = 1;

                    $file       = $request->file('featured_download_Image_Url');
                    $fileName   = time() . '.' . $file->getClientOriginalExtension();
                    $folderName = 'DownloadFeaturedImagefolder';
                    $path       = public_path($folderName);
                    $upload     = $file->move($path, $fileName);
                    if ($upload) {
                        $download->featured_download_Image_Url = $folderName . '/' . $fileName;
                    }
                }
            }
        }
        $download->save();
        return redirect()->back()->with('status', 'Download Updated Successfully');
    }
}
