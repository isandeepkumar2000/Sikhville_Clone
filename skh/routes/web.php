<?php

use Illuminate\Support\Facades\Route;


// Admin Route
Route::get('/', [App\Http\Controllers\AdminController\LoginController::class, 'loginView'])->name('home')->middleware('alreadyLoggedIn');
Route::get('login', [App\Http\Controllers\AdminController\LoginController::class, 'loginView'])->name('login')->middleware('alreadyLoggedIn');
Route::post('login', [App\Http\Controllers\AdminController\LoginController::class, 'registerUser'])->name('SignUp');
Route::get('logout', [App\Http\Controllers\AdminController\LoginController::class, 'logout'])->name('logout');

// Middleware Protected Routes
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
    Route::post('featured_download/{id}', [App\Http\Controllers\DownloadController\DownloadFolderController::class, 'featureddownload']);
    Route::delete('delete_download_image/{id}', [App\Http\Controllers\DownloadController\DownloadFolderController::class, 'deletedownloadImage'])->name('delete_download_image');

    // Download_Categories_Route
    Route::get('download_categories_list', [App\Http\Controllers\DownloadController\DownloadCategoriesController::class, 'showdownloadCategories'])->name('downloadCategories');
    Route::get('add_download_categories_list', [App\Http\Controllers\DownloadController\DownloadCategoriesController::class, 'create']);
    Route::post('add_post_download_categories_list', [App\Http\Controllers\DownloadController\DownloadCategoriesController::class, 'store']);
    Route::get('edit_download_categories_list/{id}', [App\Http\Controllers\DownloadController\DownloadCategoriesController::class, 'edit']);
    Route::put('update_download_categories_list/{id}', [App\Http\Controllers\DownloadController\DownloadCategoriesController::class, 'update']);
    Route::delete('delete_download_categories_list/{id}', [App\Http\Controllers\DownloadController\DownloadCategoriesController::class, 'destroy']);

    // Download_Listing_Route
    Route::get('download_listing', [App\Http\Controllers\DownloadController\DownlordListingController::class, 'showdownloadListingList'])->name('downloadListing');
    Route::get('add_download_listing', [App\Http\Controllers\DownloadController\DownlordListingController::class, 'create']);
    Route::post('add_post_download_listing', [App\Http\Controllers\DownloadController\DownlordListingController::class, 'store']);
    Route::get('edit_download_listing/{id}', [App\Http\Controllers\DownloadController\DownlordListingController::class, 'edit']);
    Route::put('update_download_listing/{id}', [App\Http\Controllers\DownloadController\DownlordListingController::class, 'update']);
    Route::delete('delete_download_listing/{id}', [App\Http\Controllers\DownloadController\DownlordListingController::class, 'destroy']);
    Route::delete('delete_listing/{id}', [App\Http\Controllers\DownloadController\DownlordListingController::class, 'deletedownloadlisting'])->name('delete_listing');


    // Games Route
    Route::get('games_list', [App\Http\Controllers\GamesController\GamesFolderController::class, 'gamesfolder'])->name('gamesfolder');
    Route::get('add_games_list', [App\Http\Controllers\GamesController\GamesFolderController::class, 'create']);
    Route::post('add_post_games_list', [App\Http\Controllers\GamesController\GamesFolderController::class, 'store']);
    Route::get('edit_games_list/{id}', [App\Http\Controllers\GamesController\GamesFolderController::class, 'edit']);
    Route::put('update_games_list/{id}', [App\Http\Controllers\GamesController\GamesFolderController::class, 'update']);
    Route::delete('delete_games_list/{id}', [App\Http\Controllers\GamesController\GamesFolderController::class, 'destroy']);
    Route::get('top_games/{id}', [App\Http\Controllers\GamesController\GamesFolderController::class, 'topgameUpdate']);
    Route::post('featured_games/{id}', [App\Http\Controllers\GamesController\GamesFolderController::class, 'featuredgames']);
    Route::delete('delete_game_image/{id}', [App\Http\Controllers\GamesController\GamesFolderController::class, 'deletegameImage'])->name('delete_game_image');

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
    Route::post('top_video_slider/{id}', [App\Http\Controllers\VideoController\VideoFolderController::class, 'topfeaturedvideo']);
    Route::post('middle_video_slider/{id}', [App\Http\Controllers\VideoController\VideoFolderController::class, 'middlefeaturedvideo']);
    Route::get('top_video/{id}', [App\Http\Controllers\VideoController\VideoFolderController::class, 'topvideoUpdate']);
    Route::post('bottom_video_slider/{id}', [App\Http\Controllers\VideoController\VideoFolderController::class, 'bottomfeaturedvideo']);
    Route::delete('delete_highlighting_image/{id}', [App\Http\Controllers\VideoController\VideoFolderController::class, 'deleteHighlightingImage'])->name('delete_highlighting_image');

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
    Route::post('featured_music_list/{id}', [App\Http\Controllers\MusicController\MusicFolderController::class, 'feartured_music']);
    Route::delete('delete_music_image/{id}', [App\Http\Controllers\MusicController\MusicFolderController::class, 'deletemusicImage'])->name('delete_music_image');

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
    Route::delete('delete_music_song_image/{id}', [App\Http\Controllers\MusicController\MusicSongController::class, 'deletemusicSongImage'])->name('delete_music_song_image');

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
    Route::post('featured_punjabi_reading/{id}', [App\Http\Controllers\PunjabiReadingController\PunjabiReadingFolderController::class, 'featuredpunjabireading']);
    Route::delete('delete_image/{id}', [App\Http\Controllers\PunjabiReadingController\PunjabiReadingFolderController::class, 'deleteImage'])->name('delete_image');

    // Sentance_Making_Categories_Route
    Route::get('sentance_making_categories_list', [App\Http\Controllers\SentanceMakingController\SentanceMakingCategoriesController::class, 'showsentancemakingCategoriesList'])->name('sentancemakingCategories');
    Route::get('add_sentance_making_categories_list', [App\Http\Controllers\SentanceMakingController\SentanceMakingCategoriesController::class, 'create']);
    Route::post('add_post_sentance_making_categories_list', [App\Http\Controllers\SentanceMakingController\SentanceMakingCategoriesController::class, 'store']);
    Route::get('edit_sentance_making_categories_list/{id}', [App\Http\Controllers\SentanceMakingController\SentanceMakingCategoriesController::class, 'edit']);
    Route::put('update_sentance_making_categories_list/{id}', [App\Http\Controllers\SentanceMakingController\SentanceMakingCategoriesController::class, 'update']);
    Route::delete('delete_sentance_making_categories_list/{id}', [App\Http\Controllers\SentanceMakingController\SentanceMakingCategoriesController::class, 'destroy']);
    Route::delete('delete_image/{id}', [App\Http\Controllers\SentanceMakingController\SentanceMakingCategoriesController::class, 'deleteImage'])->name('delete_image');

    // Shabdkosh_list_Route
    Route::get('shabdkosh_list', [App\Http\Controllers\ShabdkoshController\ShabdkoshFolderController::class, 'showshabdkoshList'])->name('shabdkoshFolder');
    Route::get('add_shabdkosh_list', [App\Http\Controllers\ShabdkoshController\ShabdkoshFolderController::class, 'create']);
    Route::post('add_post_shabdkosh_list_list', [App\Http\Controllers\ShabdkoshController\ShabdkoshFolderController::class, 'store']);
    Route::get('edit_shabdkosh_list/{id}', [App\Http\Controllers\ShabdkoshController\ShabdkoshFolderController::class, 'edit']);
    Route::put('update_shabdkosh_list/{id}', [App\Http\Controllers\ShabdkoshController\ShabdkoshFolderController::class, 'update']);
    Route::delete('delete_shabdkosh_list/{id}', [App\Http\Controllers\ShabdkoshController\ShabdkoshFolderController::class, 'destroy']);
    Route::delete('delete_image/{id}', [App\Http\Controllers\ShabdkoshController\ShabdkoshFolderController::class, 'deleteImage'])->name('delete_image');

    // Website_Content_list_Route
    Route::get('website_content_list', [App\Http\Controllers\WebsiteContentController\WebsiteContentFolderController::class, 'showwebsitecontentlist'])->name('websitecontentlist');
    Route::get('add_website_content_list', [App\Http\Controllers\WebsiteContentController\WebsiteContentFolderController::class, 'create']);
    Route::post('add_post_website_content_list', [App\Http\Controllers\WebsiteContentController\WebsiteContentFolderController::class, 'store']);
    Route::get('edit_website_content_list/{id}', [App\Http\Controllers\WebsiteContentController\WebsiteContentFolderController::class, 'edit']);
    Route::put('update_website_content_list/{id}', [App\Http\Controllers\WebsiteContentController\WebsiteContentFolderController::class, 'update']);
    Route::delete('delete_website_content_list/{id}', [App\Http\Controllers\WebsiteContentController\WebsiteContentFolderController::class, 'destroy']);

    // Homepage_Slider_Image_Route
    Route::get('homepage_imageslider_list', [App\Http\Controllers\HomePageImageSliderController\HomePageSliderController::class, 'showHomePageImageSlider'])->name('homepage_imageslider_route');
    Route::get('add_homepage_imageslider_list', [App\Http\Controllers\HomePageImageSliderController\HomePageSliderController::class, 'create']);
    Route::post('add_post_homepage_imageslider_list', [App\Http\Controllers\HomePageImageSliderController\HomePageSliderController::class, 'store']);
    Route::get('edit_homepage_imageslider_list/{id}', [App\Http\Controllers\HomePageImageSliderController\HomePageSliderController::class, 'edit']);
    Route::put('update_homepage_imageslider_list/{id}', [App\Http\Controllers\HomePageImageSliderController\HomePageSliderController::class, 'update']);
    Route::delete('delete_homepage_imageslider_list/{id}', [App\Http\Controllers\HomePageImageSliderController\HomePageSliderController::class, 'destroy']);
    Route::delete('delete_homepage_image/{id}', [App\Http\Controllers\HomePageImageSliderController\HomePageSliderController::class, 'deleteHomepageImage'])->name('delete_homepage_image');

    // Dynamic_Page_list_Route
    Route::get('dynamic_page_list', [App\Http\Controllers\DynamicPageController\DynamicPageController::class, 'showdynamicpagecontent'])->name('dynamicpagecontent');
    Route::get('add_dynamic_page_list', [App\Http\Controllers\DynamicPageController\DynamicPageController::class, 'create']);
    Route::post('add_post_dynamic_page_list', [App\Http\Controllers\DynamicPageController\DynamicPageController::class, 'store']);
    Route::get('edit_dynamic_page_list/{id}', [App\Http\Controllers\DynamicPageController\DynamicPageController::class, 'edit']);
    Route::put('update_dynamic_page_list/{id}', [App\Http\Controllers\DynamicPageController\DynamicPageController::class, 'update']);
    Route::delete('delete_dynamic_page_list/{id}', [App\Http\Controllers\DynamicPageController\DynamicPageController::class, 'destroy']);

    // Support_Review_list_Route
    Route::get('support_review_list', [App\Http\Controllers\SupportReviewController\SupportReviewController::class, 'showsupportreview'])->name('supportreview');
    Route::get('add_support_review_list', [App\Http\Controllers\SupportReviewController\SupportReviewController::class, 'create']);
    Route::post('add_post_support_review_list', [App\Http\Controllers\SupportReviewController\SupportReviewController::class, 'store']);
    Route::get('edit_support_review_list/{id}', [App\Http\Controllers\SupportReviewController\SupportReviewController::class, 'edit']);
    Route::put('update_support_review_list/{id}', [App\Http\Controllers\SupportReviewController\SupportReviewController::class, 'update']);
    Route::delete('delete_support_review_list/{id}', [App\Http\Controllers\SupportReviewController\SupportReviewController::class, 'destroy']);
});
