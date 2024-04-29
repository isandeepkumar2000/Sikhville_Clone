<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ApiController;
use App\Http\Controllers\GetInTouchController\GetInTouchController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("game_list", [ApiController::class, "showgameList"]);
Route::get("game_details/{gameId}", [ApiController::class, "showgameDetailsList"]);
Route::get("video_list", [ApiController::class, "showvideoList"]);
Route::get("video_list/{videoCategory}", [ApiController::class, "showVideoCategoryList"]);
Route::get("download_list", [ApiController::class, "showdownloadList"]);
Route::get("download_details/{downlordId}", [ApiController::class, "showdownloadDeatilsList"]);
Route::get("music_list", [ApiController::class, "showmusicList"]);
Route::get("music_details/{musicUuid}", [ApiController::class, "showmusicSongList"]);
Route::get("punjabireading_list", [ApiController::class, "showpunjabireadingList"]);
Route::get("punjabireading_details/{punjabireadingid}", [ApiController::class, "showpunjabireadingdetailsList"]);
Route::get("sentancemaking_list", [ApiController::class, "showsentancemakingList"]);
Route::get("sentancemaking__details/{id}", [ApiController::class, "showsentancemakingListid"]);
Route::get("shabdkosh_list", [ApiController::class, "showshabdkoshList"]);
Route::get("showshabdkoshList_details/{id}", [ApiController::class, "showshabdkoshListid"]);
Route::get("websitecontent_list", [ApiController::class, "showwebsitecontentList"]);
Route::post("viewlog_list", [ApiController::class, "showViewLoglist"]);
Route::get("homepage_imageslider_list", [ApiController::class, "showhomepageslidercontentList"]);
Route::get("dynamicpage_list", [ApiController::class, "showDynamicPageList"]);
Route::get("dynamicpage_details/{id}", [ApiController::class, "showDynamicPageListid"]);
Route::get("supportreview_list", [ApiController::class, "showSupportReviewList"]);
Route::post('contact', [GetInTouchController::class, 'getInTouch']);
