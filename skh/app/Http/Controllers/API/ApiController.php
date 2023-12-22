<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

// Models
use App\Models\DownloadModel\download;
use App\Models\GamesModel\games;
use App\Models\MusicModel\music;
use App\Models\MusicModel\musicSong;
use App\Models\PunjabiReadingModel\punjabireading;
use App\Models\SentanceMakingModel\sentancemaking;
use App\Models\ShabdkoshModel\shabdkosh;
use App\Models\WebsiteContentModel\websitecontent;
use App\Models\VideoModel\video;


class ApiController extends Controller
{
    public function showgameList()
    {
        try {
            $games = games::with(['gamesCategoryDetails' => function ($query) {
                $query->select(['id', 'name']); // Select only necessary fields from gamesCategoryDetails
            }])->get()->map(function ($game) {
                // Exclude created_at and updated_at from the games and gamesCategoryDetails
                unset($game['created_at']);
                unset($game['updated_at']);

                // Exclude created_at and updated_at from gamesCategoryDetails
                $game['gamesCategoryDetails']->each(function ($category) {
                    unset($category['created_at']);
                    unset($category['updated_at']);
                });

                return $game;
            });

            return response()->json($games, 200);
        } catch (\Exception $e) {
            // Log the error
            Log::error('Error occurred: ' . $e->getMessage());
            return response('An error occurred', 500);
        }
    }



    public function showvideoList()
    {
        try {
            $video = video::with('videoCategoryDetails')->get();
            return response()->json($video, 200);
        } catch (\Exception $e) {
            return response('An error occurred', 500);
        }
    }

    public function showdownloadList()
    {
        try {
            $download = download::with('downloadcategoryDetails')->get();
            return response()->json($download, 200);
        } catch (\Exception $e) {
            return response('An error occurred', 500);
        }
    }

    public function showmusicList()
    {
        try {
            $music = music::with('musiccategoryDetails')->get();
            return response()->json($music, 200);
        } catch (\Exception $e) {
            return response('An error occurred', 500);
        }
    }

    public function showmusicSongList()
    {
        try {
            $musicSong = musicSong::with('musicfolderDetails')->get();
            return response()->json($musicSong, 200);
        } catch (\Exception $e) {
            return response('An error occurred', 500);
        }
    }

    public function showpunjabireadingList()
    {
        try {
            $punjabireading = punjabireading::with('punjabireadingCategoryDetails')->get();
            return response()->json($punjabireading, 200);
        } catch (\Exception $e) {
            return response('An error occurred', 500);
        }
    }

    public function showsentancemakingList()
    {
        try {
            $sentancemaking = sentancemaking::with('sentancemakingCategoryDetails')->get();
            return response()->json($sentancemaking, 200);
        } catch (\Exception $e) {
            return response('An error occurred', 500);
        }
    }

    public function showshabdkoshList()
    {
        try {
            $shabdkosh = shabdkosh::get();
            return response()->json($shabdkosh, 200);
        } catch (\Exception $e) {
            return response('An error occurred', 500);
        }
    }

    public function showwebsitecontentList()
    {
        try {
            $websitecontent = websitecontent::get();
            return response()->json($websitecontent, 200);
        } catch (\Exception $e) {
            return response('An error occurred', 500);
        }
    }
}