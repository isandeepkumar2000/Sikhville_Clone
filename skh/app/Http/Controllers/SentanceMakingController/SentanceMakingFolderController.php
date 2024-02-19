<?php

namespace App\Http\Controllers\SentanceMakingController;

use App\Http\Controllers\Controller;
use App\Models\SentanceMakingModel\Sentancemaking;
use App\Models\SentanceMakingModel\Sentancemakingcategories;
use Illuminate\Http\Request;

class SentanceMakingFolderController extends Controller
{
    public function showsentancemakingList(Request $request)
    {
        $sentancemakings = Sentancemaking::with('sentancemakingCategoryDetails')->orderBy('id', "desc");

        if ($request->has('category_id') && $request->input('category_id') != 'all') {
            $sentancemakings->where('sentancemakingCategoriesid', $request->input('category_id'));
        }

        $sentancemaking = $sentancemakings->paginate(10);

        $categories = Sentancemakingcategories::all();

        return view('SentanceMakingScreen.SentanceMaking.sentanceMaking', compact('sentancemaking', 'categories'));
    }


    public function create()
    {
        $sentancemaking = Sentancemakingcategories::all();
        return view('SentanceMakingScreen.SentanceMaking.createSentanceMaking', compact('sentancemaking'));
    }
    public function store(Request $request)
    {
        $sentancemaking = new Sentancemaking;
        $sentancemaking->sentancemakingCategoriesid = $request->input('sentancemakingCategoriesid');
        $sentancemaking->video_game_play = $request->input('video_game_play');
        $sentancemaking->thumbnail_image = $request->input('thumbnail_image');
        $sentancemaking->sentance_making_vismaad_title = $request->input('sentance_making_vismaad_title');
        $sentancemaking->short_description = $request->input('short_description');
        $sentancemaking->save();
        return redirect('sentance_making_list')->with('status', 'Sentance Making Added Successfully');
    }

    public function edit($id)
    {
        $sentancemakingcategories = Sentancemakingcategories::all();
        $sentancemaking = Sentancemaking::find($id);
        return view('SentanceMakingScreen.SentanceMaking.editSentanceMaking', compact('sentancemaking', 'sentancemakingcategories'));
    }
    public function update(Request $request, $id)
    {
        $sentancemaking = Sentancemaking::find($id);
        $sentancemaking->sentancemakingCategoriesid = $request->input('sentancemakingCategoriesid');
        $sentancemaking->video_game_play = $request->input('video_game_play');
        $sentancemaking->thumbnail_image = $request->input('thumbnail_image');
        $sentancemaking->sentance_making_vismaad_title = $request->input('sentance_making_vismaad_title');
        $sentancemaking->short_description = $request->input('short_description');
        $sentancemaking->update();
        return redirect('sentance_making_list')->with('status', 'Sentance Making Added Successfully');
    }

    public function destroy($id)
    {
        $punjabireading = Sentancemaking::find($id);
        $punjabireading->delete();
        return redirect('sentance_making_list')->with('status', 'Sentance Making Added Successfully');
    }
}
