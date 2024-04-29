<?php

namespace App\Http\Controllers\GetInTouchController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GetInTouchModel\GetInTouch;
use Validator;

class GetInTouchController extends Controller
{
    public function getInTouch(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'         => 'required|string',
            'email_id'     => 'required|email',
            'phone_number' => 'required|numeric',
            'user_message' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $getInTouch = new GetInTouch();
        $getInTouch->name         = $request->name;
        $getInTouch->email_id     = $request->email_id;
        $getInTouch->phone_number = $request->phone_number;
        $getInTouch->user_message = $request->user_message;
        $getInTouch->save();

        return response()->json(['success' => 'Your message has been sent successfully.']);
    }
}
