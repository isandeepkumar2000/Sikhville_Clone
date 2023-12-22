<?php

namespace App\Http\Controllers\VideoController;

use App\Http\Controllers\Controller;
use App\Models\VideoModel\Video;
use App\Models\VideoModel\VideoCategories;
use Illuminate\Http\Request;

class VideoFolderController extends Controller
{
    public function videofolder()
    {
        $video = Video::with('videoCategoryDetails')->get();
        return view('VideoScreen.VideosFolder.video', compact('video'));
    }
    public function create()
    {
        $video = VideoCategories::all();
        return view('VideoScreen.VideosFolder.createVideo', compact('video',));
    }
    public function store(Request $request)
    {
        // print_r($_POST);
        // print_r($_FILES);
        // print_r($request->all());
        // die;
        $video = new Video;
        $video->videoCategoriesid = $request->input('videoCategoriesid');
        // $video->thumbnail_image = $request->input('thumbnail_image');
        $video->short_description = $request->input('short_description');
        $video->details = $request->input('details');
        $video->donating_link = $request->input('donating_link');
        $video->playnow_link = $request->input('playnow_link');
        $video->youtube_video_url = $request->input('youtube_video_url');
        $video->startquiz_easy = $request->input('startquiz_easy');
        $video->startquiz_hard = $request->input('startquiz_hard');
        $video->downloadpdf_link = $request->input('downloadpdf_link');

        if ($request->hasFile('thumbnail_image')) {
            $file = $request->file('thumbnail_image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $folderName = 'VideoImagefolder';
            $path = public_path($folderName);
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $upload = $file->move($path, $fileName);
            if ($upload) {
                $video->thumbnail_image = $folderName . '/' . $fileName;
            }
        }
        $appUrl = env('APP_URL');
        if (!empty($video->thumbnail_image)) {
            $imageUrl = $appUrl . '/' . $video->thumbnail_image;
            $video->thumbnail_image = $imageUrl;
        }

        $video->save();
        return redirect('video_list')->with('status', 'Student Added Successfully');
    }

    public function edit($id)
    {
        $videocategories = VideoCategories::all();
        $video = Video::find($id);
        return view('VideoScreen.VideosFolder.editVideo', compact('video', 'videocategories'));
    }
    public function update(Request $request, $id)
    {
        $video = Video::find($id);
        $video->videoCategoriesid = $request->input('videoCategoriesid');
        $video->thumbnail_image = $request->input('thumbnail_image');
        $video->short_description = $request->input('short_description');
        $video->details = $request->input('details');
        $video->donating_link = $request->input('donating_link');
        $video->playnow_link = $request->input('playnow_link');
        $video->youtube_video_url = $request->input('youtube_video_url');
        $video->startquiz_easy = $request->input('startquiz_easy');
        $video->startquiz_hard = $request->input('startquiz_hard');
        $video->downloadpdf_link = $request->input('downloadpdf_link');

        if ($request->hasFile('thumbnail_image')) {
            $file = $request->file('thumbnail_image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $folderName = 'VideoImagefolder';
            $path = public_path($folderName);
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $upload = $file->move($path, $fileName);
            if ($upload) {
                $video->thumbnail_image = $folderName . '/' . $fileName;
            }
        }
        $appUrl = env('APP_URL');
        if (!empty($video->thumbnail_image)) {
            $imageUrl = $appUrl . '/' . $video->thumbnail_image;
            $video->thumbnail_image = $imageUrl;
        }
        $video->update();
        return redirect()->back()->with('status', 'Student Updated Successfully');
    }

    public function destroy($id)
    {
        $video = Video::find($id);
        $video->delete();
        return redirect()->back()->with('status', 'Student Deleted Successfully');
    }

    public function featuredvideo($id, Request $request)
    {
        $video = Video::find($id);

        if ($video) {
            if ($video->featured_video) {
                $video->featured_video = 0;
            } else {
                $video->featured_video = 1;
                if ($request->hasFile('featured_video_Image_Url')) {
                    $file = $request->file('featured_video_Image_Url');
                    $extension = $file->getClientOriginalExtension();
                    $fileName = time() . '.' . $extension;
                    $folderName = 'VideoFeaturedImagefolder';
                    $path = public_path($folderName);
                    if (!file_exists($path)) {
                        mkdir($path, 0777, true);
                    }
                    $upload = $file->move($path, $fileName);
                    if ($upload) {
                        $video->featured_video_Image_Url = $folderName . '/' . $fileName;
                    }
                }
                $appUrl = env('APP_URL');
                if (!empty($video->featured_video_Image_Url)) {
                    $imageUrl = $appUrl . '/' . $video->featured_video_Image_Url;
                    $video->featured_video_Image_Url = $imageUrl;
                }
            }
        }
        $video->save();
        return redirect()->back()->with('status', 'Student Updated Successfully');
    }


    public function topvideoUpdate($id)
    {
        $maxTopVideos = 3;

        $currentTopVideosCount = Video::where('top_video', 1)->count();
        $video = Video::find($id);

        if ($video) {
            if ($video->top_video) {
                $video->top_video = 0;
            } else {
                if ($currentTopVideosCount < $maxTopVideos) {
                    $video->top_video = 1;
                } else {
                    return back()->with('error', 'You can only set ' . $maxTopVideos . ' videos as top videos.');
                }
            }
            $video->save();
        }
        return redirect()->back()->with('status', 'Student Updated Successfully');
    }
}
