<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ApiController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get("game_list", [ApiController::class, "showgameList"]);
Route::get("video_list", [ApiController::class, "showvideoList"]);
Route::get("video_list/{videoCategory}", [ApiController::class, "showVideoCategoryList"]);
Route::get("download_details", [ApiController::class, "showdownloadList"]);
Route::get("music_list", [ApiController::class, "showmusicList"]);
Route::get("music_details/{musicUuid}", [ApiController::class, "showmusicSongList"]);
Route::get("punjabireading_list", [ApiController::class, "showpunjabireadingList"]);
Route::get("sentancemaking_list", [ApiController::class, "showsentancemakingList"]);
Route::get("shabdkosh_list", [ApiController::class, "showshabdkoshList"]);
Route::get("websitecontent_list", [ApiController::class, "showwebsitecontentList"]);
Route::post("viewlog_list", [ApiController::class, "showViewLoglist"]);
Route::get("homepage_imageslider_list", [ApiController::class, "showhomepageslidercontentList"]);
