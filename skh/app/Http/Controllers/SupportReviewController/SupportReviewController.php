<?php

namespace App\Http\Controllers\SupportReviewController;

use App\Http\Controllers\Controller;
use App\Models\SupportReviewModel\SupportReview;
use Illuminate\Http\Request;

class SupportReviewController extends Controller
{
    public function showsupportreview()
    {
        $supportreview = SupportReview::all();
        return view('SupportReviewScreen.SupportReview.supportReview', compact('supportreview'));
    }
    public function create()
    {
        return view('SupportReviewScreen.SupportReview.createSupportReview');
    }
    public function store(Request $request)
    {
        $supportreview = new SupportReview;
        $supportreview->person_name = $request->input('person_name');
        $supportreview->country_name = $request->input('country_name');
        $supportreview->review_description = $request->input('review_description');
        $supportreview->save();
        return redirect()->back()->with('status', 'Support Review stored Successfully');
    }
    public function edit($id)
    {
        $supportreview = SupportReview::find($id);
        return view('SupportReviewScreen.SupportReview.editSupportReview', compact('supportreview'));
    }
    public function update(Request $request, $id)
    {
        $supportreview = SupportReview::find($id);
        $supportreview->person_name = $request->input('person_name');
        $supportreview->country_name = $request->input('country_name');
        $supportreview->review_description = $request->input('review_description');
        $supportreview->update();
        return redirect()->back()->with('status', 'Updated Successfully');
    }
    public function destroy($id)
    {
        $supportreview = SupportReview::find($id);
        $supportreview->delete();
        return redirect()->back()->with('status', 'delete Successfully');
    }
}
