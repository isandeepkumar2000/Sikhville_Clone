<?php

namespace App\Http\Controllers\DownloadController;

use App\Http\Controllers\Controller;
use App\Models\DownloadModel\Download;
use App\Models\DownloadModel\DownloadCategories;
use App\Models\DownloadModel\DownlordModelListing;
use Illuminate\Http\Request;


class DownlordListingController extends Controller
{
    public function showdownloadListingList(Request $request)
    {
        $downloadListings = DownlordModelListing::with('DownloadDetailsSection')->orderBy('id', "desc");
        if ($request->has('category_id') && $request->input('category_id') != 'all') {
            $downloadListings->where('downlord_section_reference', $request->input('category_id'));
        }
        $downloadListing  = $downloadListings->paginate(10);
        $categories = DownloadCategories::all();
        return view('DownloadScreen.DownlordListing.donwloadListing', compact('downloadListing', 'categories'));
    }

    public function create()
    {
        $downloadListing = DownloadCategories::all();
        return view('DownloadScreen.DownlordListing.createDownloadListing', compact('downloadListing'));
    }

    public function store(Request $request)
    {
        $downloadListing = new DownlordModelListing;
        $downloadListing->downlord_section_reference = $request->input('downlord_section_reference');
        $downloadListing->title = $request->input('title');
        $downloadListing->downlord_pdf_link = $request->input('downlord_pdf_link');
        if ($request->hasFile('image_url')) {
            $file = $request->file('image_url');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $folderName = 'DownloadListingImageFolder';
            $path = public_path($folderName);
            $upload = $file->move($path, $fileName);

            if ($upload) {
                $downloadListing->image_url = $folderName . '/' . $fileName;
            }
        }
        $downloadListing->save();
        return redirect('download_listing')->with('status', 'Music Song Added Successfully');
    }
    public function edit($id)
    {
        $download = DownloadCategories::all();
        $downloadListing = DownlordModelListing::find($id);
        return view('DownloadScreen.DownlordListing.editDownloadListing', compact('downloadListing', 'download'));
    }

    public function update(Request $request, $id)
    {
        $downloadListing = DownlordModelListing::find($id);
        $downloadListing->downlord_section_reference = $request->input('downlord_section_reference');
        $downloadListing->title = $request->input('title');
        $downloadListing->downlord_pdf_link = $request->input('downlord_pdf_link');

        if ($request->hasFile('image_url')) {
            $file = $request->file('image_url');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $folderName = 'DownloadListingImageFolder';
            $path = public_path($folderName);
            $upload = $file->move($path, $fileName);

            if ($upload) {
                $downloadListing->image_url = $folderName . '/' . $fileName;
            }
        }

        $downloadListing->update();
        return redirect('download_listing')->with('status', 'Download Listing Updated Successfully');
    }


    public function destroy($id)
    {
        $downloadListing = DownlordModelListing::find($id);

        if ($downloadListing->image_url) {
            $filePath = public_path('skh/public/' . $downloadListing->image_url);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }
        $downloadListing->delete();
        return redirect('download_listing')->with('status', 'Download Listing  Added Successfully');
    }

    public function deletedownloadlisting($id)
    {
        $downloadListing = DownlordModelListing::find($id);

        if ($downloadListing) {

            if ($downloadListing->image_url) {
                $filePath = public_path('skh/public/' . $downloadListing->image_url);
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
                $downloadListing->image_url = null;

                $downloadListing->save();
                return redirect()->back()->with('status', 'Image deleted successfully');
            }
        }
    }
}
