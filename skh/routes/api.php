<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ApiController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get("game_details", [ApiController::class, "showgameList"]);
Route::get("video_details", [ApiController::class, "showvideoList"]);
Route::get("download_details", [ApiController::class, "showdownloadList"]);
Route::get("music_list", [ApiController::class, "showmusicList"]);
Route::get("music_details/{musicUuid}", [ApiController::class, "showmusicSongList"]);
Route::get("punjabireading_details", [ApiController::class, "showpunjabireadingList"]);
Route::get("sentancemaking_details", [ApiController::class, "showsentancemakingList"]);
Route::get("shabdkosh_details", [ApiController::class, "showshabdkoshList"]);
Route::get("websitecontent_details", [ApiController::class, "showwebsitecontentList"]);
Route::post("viewlog_details", [ApiController::class, "showViewLoglist"]);
Route::get("homepage_imageslider_list", [ApiController::class, "showhomepageslidercontentList"]);
