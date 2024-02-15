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
        $video                           = new Video;
        $video->videoCategoriesid        = $request->input('videoCategoriesid');
        $video->short_description        = $request->input('short_description');
        $video->details                  = $request->input('details');
        $video->playnow_link             = $request->input('playnow_link');
        $video->youtube_video_url        = $request->input('youtube_video_url');
        $video->startquiz_easy           = $request->input('startquiz_easy');
        $video->startquiz_hard           = $request->input('startquiz_hard');
        $video->downloadpdf_link         = $request->input('downloadpdf_link');
        $video->video_duration           = $request->input('video_duration');
        $video->move_of_the_year_content = $request->input('move_of_the_year_content');
        $video->video_release_type       = $request->input('video_release_type');
        $video->film_certificate_ratings = $request->input('film_certificate_ratings');
        $video->video_playback_singer_by = $request->input('video_playback_singer_by');
        $video->video_quality_in         = $request->input('video_quality_in');
        $video->video_genre_by           = $request->input('video_genre_by');
        $video->video_dimension_type     = $request->input('video_dimension_type');


        if ($request->hasFile('highlighting_video_Image')) {
            $file       = $request->file('highlighting_video_Image');
            $fileName   = time() . '.' . $file->getClientOriginalExtension();
            $folderName = 'HighlightingVideoImagefolder';
            $path       = public_path($folderName);
            $upload     = $file->move($path, $fileName);

            if ($upload) {
                $video->highlighting_video_Image = $folderName . '/' . $fileName;
            }
        }

        if ($request->hasFile('highlighting_second_video_Image')) {
            $file = $request->file('highlighting_second_video_Image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $folderName = 'HighlightingSecondVideoImagefolder';
            $path = public_path($folderName);
            $upload = $file->move($path, $fileName);

            if ($upload) {
                $video->highlighting_second_video_Image = $folderName . '/' . $fileName;
            }
        }

        if ($request->hasFile('thumbnail_image')) {
            $file = $request->file('thumbnail_image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $folderName = 'VideoImagefolder';
            $path = public_path($folderName);
            $upload = $file->move($path, $fileName);

            if ($upload) {
                $video->thumbnail_image = $folderName . '/' . $fileName;
            }
        }

        $video->save();
        return redirect('video_list')->with('status', 'Video Added Successfully');
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
        $video->short_description = $request->input('short_description');
        $video->details           = $request->input('details');
        $video->playnow_link      = $request->input('playnow_link');
        $video->youtube_video_url = $request->input('youtube_video_url');
        $video->startquiz_easy    = $request->input('startquiz_easy');
        $video->startquiz_hard    = $request->input('startquiz_hard');
        $video->downloadpdf_link  = $request->input('downloadpdf_link');
        $video->video_duration    = $request->input('video_duration');
        $video->move_of_the_year_content    = $request->input('move_of_the_year_content');
        $video->video_release_type    = $request->input('video_release_type');
        $video->film_certificate_ratings    = $request->input('film_certificate_ratings');
        $video->video_playback_singer_by    = $request->input('video_playback_singer_by');
        $video->video_quality_in    = $request->input('video_quality_in');
        $video->video_genre_by    = $request->input('video_genre_by');
        $video->video_dimension_type    = $request->input('video_dimension_type');

        if ($request->hasFile('highlighting_video_Image')) {
            $file = $request->file('highlighting_video_Image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $folderName = 'HighlightingVideoImagefolder';
            $path = public_path($folderName);
            $upload = $file->move($path, $fileName);

            if ($upload) {
                $video->highlighting_video_Image = $folderName . '/' . $fileName;
            }
        }

        if ($request->hasFile('highlighting_second_video_Image')) {
            $file = $request->file('highlighting_second_video_Image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $folderName = 'HighlightingSecondVideoImagefolder';
            $path = public_path($folderName);
            $upload = $file->move($path, $fileName);

            if ($upload) {
                $video->highlighting_second_video_Image = $folderName . '/' . $fileName;
            }
        }

        if ($request->hasFile('thumbnail_image')) {
            $file = $request->file('thumbnail_image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $folderName = 'VideoImagefolder';
            $path = public_path($folderName);
            $upload = $file->move($path, $fileName);

            if ($upload) {
                $video->thumbnail_image = $folderName . '/' . $fileName;
            }
        }

        $video->update();
        return redirect()->back()->with('status', 'Video Updated Successfully');
    }

    public function destroy($id)
    {
        $video = Video::find($id);

        if ($video->highlighting_video_Image) {
            $filePath = public_path('skh/public/' . $video->highlighting_video_Image);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        if ($video->highlighting_second_video_Image) {
            $filePath = public_path('skh/public/' . $video->highlighting_second_video_Image);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        if ($video->thumbnail_image) {
            $filePath = public_path('skh/public/' . $video->thumbnail_image);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        if ($video->top_featured_video_Image_slider) {
            $filePath = public_path('skh/public/' . $video->top_featured_video_Image_slider);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        if ($video->middle_featured_video_Image_slider) {
            $filePath = public_path('skh/public/' . $video->middle_featured_video_Image_slider);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        if ($video->bottom_featured_video_Image_slider) {
            $filePath = public_path('skh/public/' . $video->bottom_featured_video_Image_slider);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }



        $video->delete();
        return redirect()->back()->with('status', 'Video Deleted Successfully');
    }

    public function topfeaturedvideo($id, Request $request)
    {
        $video = Video::find($id);
        if ($video) {
            if ($video->top_video_slider) {
                $video->top_video_slider = 0;
            } else {
                $video->top_video_slider = 1;
                if ($request->hasFile('top_featured_video_Image_slider')) {
                    $file = $request->file('top_featured_video_Image_slider');
                    $fileName = time() . '.' . $file->getClientOriginalExtension();
                    $folderName = 'TopVideoFeaturedImagefolder';
                    $path = public_path($folderName);
                    $upload = $file->move($path, $fileName);

                    if ($upload) {
                        $video->top_featured_video_Image_slider = $folderName . '/' . $fileName;
                    }
                }
            }
        }
        $video->save();
        return redirect()->back()->with('status', 'Video Updated Successfully');
    }

    public function middlefeaturedvideo($id, Request $request)
    {
        $maxTopVideos = 1;
        $currentTopVideosCount = Video::where('middle_video_slider', 1)->count();
        $video = Video::find($id);

        if ($video) {
            if ($video->middle_video_slider) {
                return redirect()->back()->with('status', 'Only one video can be selected as middle featured');
            } else {

                if ($currentTopVideosCount >= $maxTopVideos) {

                    return redirect()->back()->with('status', 'Only one video can be selected as middle featured');
                } else {

                    $video->middle_video_slider = 1;
                    if ($request->hasFile('middle_featured_video_Image_slider')) {
                        $file = $request->file('middle_featured_video_Image_slider');
                        $fileName = time() . '.' . $file->getClientOriginalExtension();
                        $folderName = 'MiddleVideoFeaturedImagefolder';
                        $path = public_path($folderName);
                        $upload = $file->move($path, $fileName);

                        if ($upload) {
                            $video->middle_featured_video_Image_slider = $folderName . '/' . $fileName;
                        }
                    }
                    $video->save();
                    return redirect()->back()->with('status', 'Video updated successfully');
                }
            }
        } else {

            return redirect()->back()->with('status', 'Video not found');
        }
    }

    public function bottomfeaturedvideo($id, Request $request)
    {
        $video = Video::find($id);
        if ($video) {
            if ($video->bottom_video_slider) {
                $video->bottom_video_slider = 0;
            } else {
                $video->bottom_video_slider = 1;
                if ($request->hasFile('bottom_featured_video_Image_slider')) {
                    $file = $request->file('bottom_featured_video_Image_slider');
                    $fileName = time() . '.' . $file->getClientOriginalExtension();
                    $folderName = 'BottomVideoFeaturedImagefolder';
                    $path = public_path($folderName);
                    $upload = $file->move($path, $fileName);

                    if ($upload) {
                        $video->bottom_featured_video_Image_slider = $folderName . '/' . $fileName;
                    }
                }
            }
        }
        $video->save();
        return redirect()->back()->with('status', 'Video Updated Successfully');
    }


    public function topvideoUpdate($id)
    {
        $maxTopVideos          = 4;
        $currentTopVideosCount = Video::where('top_video', 1)->count();
        $video                 = Video::find($id);

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
        return redirect()->back()->with('status', 'Video Updated Successfully');
    }

    public function deleteHighlightingImage($id)
    {
        $video = Video::find($id);

        if ($video) {
            if ($video->highlighting_video_Image) {
                $filePath = public_path('skh/public/' . $video->highlighting_video_Image);

                if (file_exists($filePath)) {
                    unlink($filePath); // Delete the file from the server
                }

                // Remove the image path from the database
                $video->highlighting_video_Image = null;
                $video->save();

                return redirect()->back()->with('status', 'Image deleted successfully');
            }

            if ($video->highlighting_second_video_Image) {
                $filePath = public_path('skh/public/' . $video->highlighting_second_video_Image);

                if (file_exists($filePath)) {
                    unlink($filePath); // Delete the file from the server
                }

                // Remove the image path from the database
                $video->highlighting_second_video_Image = null;
                $video->save();

                return redirect()->back()->with('status', 'Image deleted successfully');
            }
        }

        return redirect()->back()->with('error', 'Image not found or already deleted');
    }




}
