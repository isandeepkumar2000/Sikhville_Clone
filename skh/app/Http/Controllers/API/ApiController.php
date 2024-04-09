<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Models
use App\Models\DownloadModel\Download;
use App\Models\DownloadModel\DownlordModelListing;
use App\Models\DynamicPageModel\DynamicPage;
use App\Models\GamesModel\Games;
use App\Models\GamesModel\GamesCategories;
use App\Models\HomePageImageSliderModel\HomePageImageSlider;
use App\Models\MusicModel\Music;
use App\Models\MusicModel\MusicSong;
use App\Models\PunjabiReadingModel\Punjabireading;
use App\Models\SentanceMakingModel\Sentancemakingcategories;
use App\Models\ShabdkoshModel\Shabdkosh;
use App\Models\SupportReviewModel\SupportReview;
use App\Models\WebsiteContentModel\Websitecontent;
use App\Models\VideoModel\Video;
use App\Models\VideoModel\VideoCategories;
use App\Models\ViewLogsModel\ViewLogsModel;


class ApiController extends Controller
{
    public function showgameList()
    {
        try {
            $categoryNames = GamesCategories::get();
            $top_game    = Games::where('top_game', 1)->with('gamesCategoryDetails')->get();
            $featured_game = Games::where('featured_game', 1)->with('gamesCategoryDetails')->get();

            $result = [];
            foreach ($categoryNames as $categoryName) {
                $videosByCategory = Games::with('gamesCategoryDetails')
                    ->where('gameCategoriesid', $categoryName->id)
                    ->orderBy('id', "desc")
                    ->get();
                $result[$categoryName->name] = $videosByCategory;
            }

            $result['top_game'] = $top_game;
            $result['featured_game'] = $featured_game;

            return response()->json($result, 200);
        } catch (\Exception $e) {
            return response('An error occurred', 500);
        }
    }

    public function showgameDetailsList($gameId)
    {
        try {

            $gameDetails = Games::with('gamesCategoryDetails')->find($gameId);

            if (!$gameDetails) {
                return response()->json(['error' => 'Game not found'], 404);
            }

            return response()->json($gameDetails, 200);
        } catch (\Exception $e) {
            return response('An error occurred', 500);
        }
    }


    public function showvideoList()
    {
        try {
            $categoryNames = VideoCategories::get();
            $top_Video_Slider    = Video::where('top_video_slider', 1)->with('videoCategoryDetails')->get();
            $middle_Video_Slider = Video::where('middle_video_slider', 1)->with('videoCategoryDetails')->get();
            $bottom_Video_Slider = Video::where('bottom_video_slider', 1)->with('videoCategoryDetails')->get();
            $top_selected_video = Video::where('top_video', 1)->with('videoCategoryDetails')->get();
            $result = [];
            foreach ($categoryNames as $categoryName) {
                $videosByCategory = Video::with('videoCategoryDetails')
                    ->where('videoCategoriesid', $categoryName->id)
                    ->take(5)->orderBy('id', "desc")
                    ->get();
                $result[$categoryName->sku] = $videosByCategory;
            }
            $result['top_video'] = $top_selected_video;
            $result['top_video_slider'] = $top_Video_Slider;
            $result['middle_video_slider'] = $middle_Video_Slider;
            $result['bottom_video_slider'] = $bottom_Video_Slider;
            return response()->json($result, 200);
        } catch (\Exception $e) {
            return response('An error occurred', 500);
        }
    }



    public function showVideoCategoryList($videoCategory)
    {
        try {
            $videos = Video::with('videoCategoryDetails')
                ->whereHas('videoCategoryDetails', function ($query) use ($videoCategory) {
                    $query->where('sku', $videoCategory);
                })
                ->get();
            return response()->json($videos, 200);
        } catch (\Exception $e) {
            return response('An error occurred', 500);
        }
    }

    public function showdownloadList()
    {
        try {
            $download = Download::with('downloadcategoryDetails')->get();
            return response()->json($download, 200);
        } catch (\Exception $e) {
            return response('An error occurred', 500);
            return response('An error occurred', 500);
        }
    }


    public function showdownloadDeatilsList($downlordId)
    {
        try {
            $download = Download::where('id', $downlordId)->first();

            if (!$download) {
                return response()->json(['message' => 'Music not found'], 404);
            }
            $downloadList = DownlordModelListing::where('downlord_section_reference', $download->id)->get();
            return response()->json(["album_detail" => $download, "download_list" => $downloadList], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred'], 500);
        }
    }




    public function showmusicList()
    {
        try {
            $music = Music::with('musiccategoryDetails')->get();
            return response()->json($music, 200);
        } catch (\Exception $e) {
            return response('An error occurred', 500);
        }
    }

    public function showmusicSongList($musicUuid)
    {
        try {
            $music = Music::where('uuid', $musicUuid)->first();

            if (!$music) {
                return response()->json(['message' => 'Music not found'], 404);
            }
            $musicSongs = MusicSong::where('musicid', $music->id)->get();
            return response()->json(["album_detail" => $music, "song_list" => $musicSongs], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred'], 500);
        }
    }

    public function showpunjabireadingList()
    {
        try {
            $punjabireading = Punjabireading::with('punjabireadingCategoryDetails')->get();
            return response()->json($punjabireading, 200);
        } catch (\Exception $e) {
            return response('An error occurred', 500);
        }
    }

    public function showpunjabireadingdetailsList($punjabireadingid)
    {
        try {
            $punjabiReading = Punjabireading::where('id', $punjabireadingid)->get();
            return response()->json($punjabiReading, 200);
        } catch (\Exception $e) {
            return response('An error occurred', 500);
        }
    }

    public function showsentancemakingList()
    {
        try {
            $sentancemaking =
                Sentancemakingcategories::get();
            return response()->json($sentancemaking, 200);
        } catch (\Exception $e) {
            return response('An error occurred', 500);
        }
    }


    public function showsentancemakingListid($id)
    {
        try {
            $sentancemaking = Sentancemakingcategories::where('uuid', $id)->get();
            return response()->json($sentancemaking, 200);
        } catch (\Exception $e) {
            return response('An error occurred', 500);
        }
    }

    public function showshabdkoshList()
    {
        try {
            $shabdkosh = Shabdkosh::get();
            return response()->json($shabdkosh, 200);
        } catch (\Exception $e) {
            return response('An error occurred', 500);
        }
    }

    public function showshabdkoshListid($id)
    {
        try {
            $shabdkosh = Shabdkosh::where('uuid', $id)->get();
            return response()->json($shabdkosh, 200);
        } catch (\Exception $e) {
            return response('An error occurred', 500);
        }
    }

    public function showwebsitecontentList()
    {
        try {
            $websitecontent = Websitecontent::get();
            return response()->json($websitecontent, 200);
        } catch (\Exception $e) {
            return response('An error occurred', 500);
        }
    }

    public function showhomepageslidercontentList()
    {
        try {
            $homepagesliderlist = HomePageImageSlider::get();
            return response()->json($homepagesliderlist, 200);
        } catch (\Exception $e) {
            return response('An error occurred', 500);
        }
    }

    public function showViewLoglist(Request $request)
    {
        $viewLog = new ViewLogsModel;
        $viewLog->ip_address = $request->ip;
        $viewLog->country = $request->country;
        $viewLog->region = $request->region;
        $viewLog->content_type = $request->content_type;
        $viewLog->content_id = $request->content_id;
        $result = $viewLog->save();
        if ($result) {
            return ['Result' => "Data has been saved successfully"];
        } else {
            return ['Result' => "operation failed"];
        }
    }


    public function showDynamicPageList()
    {
        try {
            $dynamicpagecontent = DynamicPage::all();
            $result = [];
            foreach ($dynamicpagecontent as $page) {
                $result[] = (object)[
                    'slug' => $page->slug,
                    'id' => $page->id,
                    'title' => $page->title,
                    'description' => $page->description,
                    'body' => $page->body,
                    'created_at' => $page->created_at,
                    'updated_at' => $page->updated_at
                ];
            }

            return response()->json($result, 200);
        } catch (\Exception $e) {
            return response('An error occurred', 500);
        }
    }

    public function showDynamicPageListid($id)
    {
        try {
            $dynamicpagecontent = DynamicPage::where('id', $id)->get();
            return response()->json($dynamicpagecontent, 200);
        } catch (\Exception $e) {
            return response('An error occurred', 500);
        }
    }


    public function showSupportReviewList()
    {
        try {
            $supportreview = SupportReview::all();
            $result = [];
            foreach ($supportreview as $page) {
                $result[] = (object)[
                    'person_name' => $page->person_name,
                    'id' => $page->id,
                    'country_name' => $page->country_name,
                    'review_description' => $page->review_description,
                    'created_at' => $page->created_at,
                    'updated_at' => $page->updated_at
                ];
            }
            return response()->json($result, 200);
        } catch (\Exception $e) {
            return response('An error occurred', 500);
        }
    }
}
