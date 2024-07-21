<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function feedbackValue()
    {

        $feedback = Feedback::orderBy('created_at', 'desc')->get();
        return view('frontend.feedback_user_display', compact('feedback'));
    }

    public function feedbackValuestore(Request $request)
    {
        // dd($request->all());

        $userId = auth()->id();


        $feedbackData = [
            'happysad_hidden_value' => $request->input('happysad_hidden_value'),
            'message' => $request->input('message'),
            'user_id' => $userId,
        ];
        Feedback::create($feedbackData);
        return redirect()->back()->with('success', 'Feedback submitted successfully');
    }
}
