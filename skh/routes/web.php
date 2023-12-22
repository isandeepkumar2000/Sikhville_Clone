<?php

use Illuminate\Support\Facades\Route;


// Admin Route
Route::get('/', [App\Http\Controllers\AdminController\LoginController::class, 'loginView'])->name('home')->middleware('alreadyLoggedIn');
Route::get('login', [App\Http\Controllers\AdminController\LoginController::class, 'loginView'])->name('login')->middleware('alreadyLoggedIn');
Route::post('login', [App\Http\Controllers\AdminController\LoginController::class, 'registerUser'])->name('SignUp');
Route::get('logout', [App\Http\Controllers\AdminController\LoginController::class, 'logout'])->name('logout');

// Middlware_Protection_Route
Route::middleware("isLoggedIn")->group(function () {

    // Dashboard Route
    Route::get('dashboard', [App\Http\Controllers\AdminController\LoginController::class, 'dashboard'])->name('dashboard');

    // Download Route
    Route::get('download_list', [App\Http\Controllers\DownloadController\DownloadFolderController::class, 'download'])->name('downloadfolder');
    Route::get('add_download_list', [App\Http\Controllers\DownloadController\DownloadFolderController::class, 'create']);
    Route::post('add_post_download_list', [App\Http\Controllers\DownloadController\DownloadFolderController::class, 'store']);
    Route::get('edit_download_list/{id}', [App\Http\Controllers\DownloadController\DownloadFolderController::class, 'edit']);
    Route::put('update_download_list/{id}', [App\Http\Controllers\DownloadController\DownloadFolderController::class, 'update']);
    Route::delete('delete_download_list/{id}', [App\Http\Controllers\DownloadController\DownloadFolderController::class, 'destroy']);
    Route::get('featured_download_list/{id}', [App\Http\Controllers\DownloadController\DownloadFolderController::class, 'featured_download']);

    // Download_Categories_Route 
    Route::get('download_categories_list', [App\Http\Controllers\DownloadController\DownloadCategoriesController::class, 'showdownloadCategories'])->name('downloadCategories');
    Route::get('add_download_categories_list', [App\Http\Controllers\DownloadController\DownloadCategoriesController::class, 'create']);
    Route::post('add_post_download_categories_list', [App\Http\Controllers\DownloadController\DownloadCategoriesController::class, 'store']);
    Route::get('edit_download_categories_list/{id}', [App\Http\Controllers\DownloadController\DownloadCategoriesController::class, 'edit']);
    Route::put('update_download_categories_list/{id}', [App\Http\Controllers\DownloadController\DownloadCategoriesController::class, 'update']);
    Route::delete('delete_download_categories_list/{id}', [App\Http\Controllers\DownloadController\DownloadCategoriesController::class, 'destroy']);

    // Games Route
    Route::get('games_list', [App\Http\Controllers\GamesController\GamesFolderController::class, 'gamesfolder'])->name('gamesfolder');
    Route::get('add_games_list', [App\Http\Controllers\GamesController\GamesFolderController::class, 'create']);
    Route::post('add_post_games_list', [App\Http\Controllers\GamesController\GamesFolderController::class, 'store']);
    Route::get('edit_games_list/{id}', [App\Http\Controllers\GamesController\GamesFolderController::class, 'edit']);
    Route::put('update_games_list/{id}', [App\Http\Controllers\GamesController\GamesFolderController::class, 'update']);
    Route::delete('delete_games_list/{id}', [App\Http\Controllers\GamesController\GamesFolderController::class, 'destroy']);
    Route::get('top_games/{id}', [App\Http\Controllers\GamesController\GamesFolderController::class, 'topgameUpdate']);
    Route::post('featured_games/{id}', [App\Http\Controllers\GamesController\GamesFolderController::class, 'featuredgames']);


    // Games_Categories_Route
    Route::get('games_categories_list', [App\Http\Controllers\GamesController\GamesCategoryController::class, 'showGamesList'])->name('gamesCategories');
    Route::get('add_games_categories_list', [App\Http\Controllers\GamesController\GamesCategoryController::class, 'create']);
    Route::post('add_post_games_categories_list', [App\Http\Controllers\GamesController\GamesCategoryController::class, 'store']);
    Route::get('edit_games_categories_list/{id}', [App\Http\Controllers\GamesController\GamesCategoryController::class, 'edit']);
    Route::put('update_games_categories_list/{id}', [App\Http\Controllers\GamesController\GamesCategoryController::class, 'update']);
    Route::delete('delete_games_categories_list/{id}', [App\Http\Controllers\GamesController\GamesCategoryController::class, 'destroy']);

    // Video Route
    Route::get('video_list', [App\Http\Controllers\VideoController\VideoFolderController::class, 'videofolder'])->name('videofolder');
    Route::get('add_video_list', [App\Http\Controllers\VideoController\VideoFolderController::class, 'create']);
    Route::post('add_post_video_list', [App\Http\Controllers\VideoController\VideoFolderController::class, 'store']);
    Route::get('edit_video_list/{id}', [App\Http\Controllers\VideoController\VideoFolderController::class, 'edit']);
    Route::put('update_video_list/{id}', [App\Http\Controllers\VideoController\VideoFolderController::class, 'update']);
    Route::delete('delete_video_list/{id}', [App\Http\Controllers\VideoController\VideoFolderController::class, 'destroy']);
    Route::get('top_video/{id}', [App\Http\Controllers\VideoController\VideoFolderController::class, 'topvideoUpdate']);
    Route::post('featured_video/{id}', [App\Http\Controllers\VideoController\VideoFolderController::class, 'featuredvideo']);


    // video_Categories_Route
    Route::get('video_categories_list', [App\Http\Controllers\VideoController\VideoCategoryController::class, 'showvideoList'])->name('videoCategories');
    Route::get('add_video_categories_list', [App\Http\Controllers\VideoController\VideoCategoryController::class, 'create']);
    Route::post('add_post_video_categories_list', [App\Http\Controllers\VideoController\VideoCategoryController::class, 'store']);
    Route::get('edit_video_categories_list/{id}', [App\Http\Controllers\VideoController\VideoCategoryController::class, 'edit']);
    Route::put('update_video_categories_list/{id}', [App\Http\Controllers\VideoController\VideoCategoryController::class, 'update']);
    Route::delete('delete_video_categories_list/{id}', [App\Http\Controllers\VideoController\VideoCategoryController::class, 'destroy']);

    // Music Route
    Route::get('music_list', [App\Http\Controllers\MusicController\MusicFolderController::class, 'musicfolder'])->name('musicfolder');
    Route::get('add_music_list', [App\Http\Controllers\MusicController\MusicFolderController::class, 'create']);
    Route::post('add_post_music_list', [App\Http\Controllers\MusicController\MusicFolderController::class, 'store']);
    Route::get('edit_music_list/{id}', [App\Http\Controllers\MusicController\MusicFolderController::class, 'edit']);
    Route::put('update_music_list/{id}', [App\Http\Controllers\MusicController\MusicFolderController::class, 'update']);
    Route::delete('delete_music_list/{id}', [App\Http\Controllers\MusicController\MusicFolderController::class, 'destroy']);
    Route::get('featured_music_list/{id}', [App\Http\Controllers\MusicController\MusicFolderController::class, 'feartured_music']);

    // Music_Categories_Route
    Route::get('music_categories_list', [App\Http\Controllers\MusicController\MusicCategoryController::class, 'showmusicList'])->name('musicCategories');
    Route::get('add_music_categories_list', [App\Http\Controllers\MusicController\MusicCategoryController::class, 'create']);
    Route::post('add_post_music_categories_list', [App\Http\Controllers\MusicController\MusicCategoryController::class, 'store']);
    Route::get('edit_music_categories_list/{id}', [App\Http\Controllers\MusicController\MusicCategoryController::class, 'edit']);
    Route::put('update_music_categories_list/{id}', [App\Http\Controllers\MusicController\MusicCategoryController::class, 'update']);
    Route::delete('delete_music_categories_list/{id}', [App\Http\Controllers\MusicController\MusicCategoryController::class, 'destroy']);


    // Music_Song_Route
    Route::get('music_song_list', [App\Http\Controllers\MusicController\MusicSongController::class, 'showmusicsongList'])->name('musicSong');
    Route::get('add_music_song_list', [App\Http\Controllers\MusicController\MusicSongController::class, 'create']);
    Route::post('add_post_music_song_list', [App\Http\Controllers\MusicController\MusicSongController::class, 'store']);
    Route::get('edit_music_song_list/{id}', [App\Http\Controllers\MusicController\MusicSongController::class, 'edit']);
    Route::put('update_music_song_list/{id}', [App\Http\Controllers\MusicController\MusicSongController::class, 'update']);
    Route::delete('delete_music_song_list/{id}', [App\Http\Controllers\MusicController\MusicSongController::class, 'destroy']);


    // Punjabi_Reading_Categories_Route
    Route::get('punjabi_reading_categories_list', [App\Http\Controllers\PunjabiReadingController\PunjabiReadingCategoriesController::class, 'showpunjabireadingCategoriesList'])->name('punjabireadingCategories');
    Route::get('add_punjabi_reading_categories_list', [App\Http\Controllers\PunjabiReadingController\PunjabiReadingCategoriesController::class, 'create']);
    Route::post('add_post_punjabi_reading_categories_list', [App\Http\Controllers\PunjabiReadingController\PunjabiReadingCategoriesController::class, 'store']);
    Route::get('edit_punjabi_reading_categories_list/{id}', [App\Http\Controllers\PunjabiReadingController\PunjabiReadingCategoriesController::class, 'edit']);
    Route::put('update_punjabi_reading_categories_list/{id}', [App\Http\Controllers\PunjabiReadingController\PunjabiReadingCategoriesController::class, 'update']);
    Route::delete('delete_punjabi_reading_categories_list/{id}', [App\Http\Controllers\PunjabiReadingController\PunjabiReadingCategoriesController::class, 'destroy']);


    // Punjabi_Reading_Route
    Route::get('punjabi_reading_list', [App\Http\Controllers\PunjabiReadingController\PunjabiReadingFolderController::class, 'showpunjabireadingList'])->name('punjabireadingFolder');
    Route::get('add_punjabi_reading_list', [App\Http\Controllers\PunjabiReadingController\PunjabiReadingFolderController::class, 'create']);
    Route::post('add_post_punjabi_reading_list', [App\Http\Controllers\PunjabiReadingController\PunjabiReadingFolderController::class, 'store']);
    Route::get('edit_punjabi_reading_list/{id}', [App\Http\Controllers\PunjabiReadingController\PunjabiReadingFolderController::class, 'edit']);
    Route::put('update_punjabi_reading_list/{id}', [App\Http\Controllers\PunjabiReadingController\PunjabiReadingFolderController::class, 'update']);
    Route::delete('delete_punjabi_reading_list/{id}', [App\Http\Controllers\PunjabiReadingController\PunjabiReadingFolderController::class, 'destroy']);
    Route::get('featured_punjabi_reading_list/{id}', [App\Http\Controllers\PunjabiReadingController\PunjabiReadingFolderController::class, 'featured_punjabi_reading']);


    // Sentance_Making_Categories_Route
    Route::get('sentance_making_categories_list', [App\Http\Controllers\SentanceMakingController\SentanceMakingCategoriesController::class, 'showsentancemakingCategoriesList'])->name('sentancemakingCategories');
    Route::get('add_sentance_making_categories_list', [App\Http\Controllers\SentanceMakingController\SentanceMakingCategoriesController::class, 'create']);
    Route::post('add_post_sentance_making_categories_list', [App\Http\Controllers\SentanceMakingController\SentanceMakingCategoriesController::class, 'store']);
    Route::get('edit_sentance_making_categories_list/{id}', [App\Http\Controllers\SentanceMakingController\SentanceMakingCategoriesController::class, 'edit']);
    Route::put('update_sentance_making_categories_list/{id}', [App\Http\Controllers\SentanceMakingController\SentanceMakingCategoriesController::class, 'update']);
    Route::delete('delete_sentance_making_categories_list/{id}', [App\Http\Controllers\SentanceMakingController\SentanceMakingCategoriesController::class, 'destroy']);


    // Sentance_Making_Route
    Route::get('sentance_making_list', [App\Http\Controllers\SentanceMakingController\SentanceMakingFolderController::class, 'showsentancemakingList'])->name('sentancemakingFolder');
    Route::get('add_sentance_making_list', [App\Http\Controllers\SentanceMakingController\SentanceMakingFolderController::class, 'create']);
    Route::post('add_post_sentance_making_list', [App\Http\Controllers\SentanceMakingController\SentanceMakingFolderController::class, 'store']);
    Route::get('edit_sentance_making_list/{id}', [App\Http\Controllers\SentanceMakingController\SentanceMakingFolderController::class, 'edit']);
    Route::put('update_sentance_making_list/{id}', [App\Http\Controllers\SentanceMakingController\SentanceMakingFolderController::class, 'update']);
    Route::delete('delete_sentance_making_list/{id}', [App\Http\Controllers\SentanceMakingController\SentanceMakingFolderController::class, 'destroy']);


    // Shabdkosh_list_Route
    Route::get('shabdkosh_list', [App\Http\Controllers\ShabdkoshController\ShabdkoshFolderController::class, 'showshabdkoshList'])->name('shabdkoshFolder');
    Route::get('add_shabdkosh_list', [App\Http\Controllers\ShabdkoshController\ShabdkoshFolderController::class, 'create']);
    Route::post('add_post_shabdkosh_list_list', [App\Http\Controllers\ShabdkoshController\ShabdkoshFolderController::class, 'store']);
    Route::get('edit_shabdkosh_list/{id}', [App\Http\Controllers\ShabdkoshController\ShabdkoshFolderController::class, 'edit']);
    Route::put('update_shabdkosh_list/{id}', [App\Http\Controllers\ShabdkoshController\ShabdkoshFolderController::class, 'update']);
    Route::delete('delete_shabdkosh_list/{id}', [App\Http\Controllers\ShabdkoshController\ShabdkoshFolderController::class, 'destroy']);

    // Website_Content_list_Route
    Route::get('website_content_list', [App\Http\Controllers\WebsiteContentController\WebsiteContentFolderController::class, 'showwebsitecontentlist'])->name('websitecontentlist');
    Route::get('add_website_content_list', [App\Http\Controllers\WebsiteContentController\WebsiteContentFolderController::class, 'create']);
    Route::post('add_post_website_content_list', [App\Http\Controllers\WebsiteContentController\WebsiteContentFolderController::class, 'store']);
    Route::get('edit_website_content_list/{id}', [App\Http\Controllers\WebsiteContentController\WebsiteContentFolderController::class, 'edit']);
    Route::put('update_website_content_list/{id}', [App\Http\Controllers\WebsiteContentController\WebsiteContentFolderController::class, 'update']);
    Route::delete('delete_website_content_list/{id}', [App\Http\Controllers\WebsiteContentController\WebsiteContentFolderController::class, 'destroy']);
});
