<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

// Models
use App\Models\DownloadModel\Download;
use App\Models\GamesModel\Games;
use App\Models\MusicModel\Music;
use App\Models\MusicModel\MusicSong;
use App\Models\PunjabiReadingModel\Punjabireading;
use App\Models\SentanceMakingModel\Sentancemaking;
use App\Models\ShabdkoshModel\Shabdkosh;
use App\Models\WebsiteContentModel\Websitecontent;
use App\Models\VideoModel\Video;
use App\Models\ViewLogsModel\ViewLogsModel;


class ApiController extends Controller
{
    public function showgameList()
    {
        try {
            $games = Games::with(['gamesCategoryDetails' => function ($query) {
                $query->select(['id', 'name']);
            }])->get()->map(function ($game) {

                unset($game['created_at']);
                unset($game['updated_at']);

                $game['gamesCategoryDetails']->each(function ($category) {
                    unset($category['created_at']);
                    unset($category['updated_at']);
                });
                return $game;
            });

            return response()->json($games, 200);
        } catch (\Exception $e) {

            Log::error('Error occurred: ' . $e->getMessage());
            return response('An error occurred', 500);
        }
    }

    public function showvideoList()
    {
        try {
            $video = Video::with('videoCategoryDetails')->get();
            return response()->json($video, 200);
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

    public function showmusicSongList()
    {
        try {
            $musicSong = MusicSong::with('musicfolderDetails')->get();
            return response()->json($musicSong, 200);
        } catch (\Exception $e) {
            return response('An error occurred', 500);
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

    public function showsentancemakingList()
    {
        try {
            $sentancemaking = Sentancemaking::with('sentancemakingCategoryDetails')->get();
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

    public function showwebsitecontentList()
    {
        try {
            $websitecontent = Websitecontent::get();
            return response()->json($websitecontent, 200);
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
}
