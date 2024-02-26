<?php

namespace App\Http\Controllers\HomePageImageSliderController;

use App\Http\Controllers\Controller;
use App\Models\HomePageImageSliderModel\HomePageImageSlider;
use Illuminate\Http\Request;

class HomePageSliderController extends Controller
{
    public function showHomePageImageSlider()
    {
        $homepageImage = HomePageImageSlider::all();
        return view('HomePageImageSliderScreen.HomePageSlider.homePageSlider', compact('homepageImage'));
    }
    public function create()
    {
        return view('HomePageImageSliderScreen.HomePageSlider.createHomePageSlider');
    }
    public function store(Request $request)
    {
        $homepageImage = new HomePageImageSlider;
        $homepageImage->youtube_banner_link = $request->input('youtube_banner_link');
        if ($request->hasFile('banner_thumbnail_image')) {
            $file       = $request->file('banner_thumbnail_image');
            $fileName   = time() . '.' . $file->getClientOriginalExtension();
            $folderName = 'HomePage_Slider_BannerImage';
            $path       = public_path($folderName);
            $upload     = $file->move($path, $fileName);
            if ($upload) {
                $homepageImage->banner_thumbnail_image = $folderName . '/' . $fileName;
            }
        }
        $homepageImage->save();
        return redirect()->back()->with('status', 'HomePage Updated Successfully');
    }
    public function edit($id)
    {
        $homepageImage = HomePageImageSlider::find($id);
        return view('HomePageImageSliderScreen.HomePageSlider.editHomePageSlider', compact('homepageImage'));
    }
    public function update(Request $request, $id)
    {
        $homepageImage = HomePageImageSlider::find($id);
        $homepageImage->youtube_banner_link = $request->input('youtube_banner_link');
        if ($request->hasFile('banner_thumbnail_image')) {
            $file       = $request->file('banner_thumbnail_image');
            $fileName   = time() . '.' . $file->getClientOriginalExtension();
            $folderName = 'HomePage_Slider_BannerImage';
            $path       = public_path($folderName);
            $upload     = $file->move($path, $fileName);
            if ($upload) {
                $homepageImage->banner_thumbnail_image = $folderName . '/' . $fileName;
            }
        }
        $homepageImage->update();
        return redirect()->back()->with('status', 'HomePage Updated Successfully');
    }
    public function destroy($id)
    {
        $homepageImage = HomePageImageSlider::find($id);
        if ($homepageImage->banner_thumbnail_image) {
            $filePath = public_path('skh/public/' . $homepageImage->banner_thumbnail_image);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }
        $homepageImage->delete();
        return redirect()->back()->with('status', 'HomePage  delete Successfully');
    }
    public function deleteHomepageImage($id)
    {
        $homepageImage = HomePageImageSlider::find($id);
        if ($homepageImage) {
            if ($homepageImage->banner_thumbnail_image) {
                $filePath = public_path('skh/public/' . $homepageImage->banner_thumbnail_image);
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
                $homepageImage->banner_thumbnail_image = null;
                $homepageImage->save();
                return redirect()->back()->with('status', 'Image deleted successfully');
            }
        }
    }
}
