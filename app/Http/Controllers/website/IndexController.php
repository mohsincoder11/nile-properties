<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Index;
use App\Models\ProjectEntry;
use App\Models\ProjectEntryLayoutImages;
use App\Models\ProjectEntryAppendData;
use App\Models\EnquiryForm;
use App\Models\Review;
use App\Models\Faqs;
use App\Models\TimeSlot;
use App\Models\Days;


use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $brochures = ProjectEntry::orderBy('created_at', 'desc')->get();
        return view('website.index', ['brochures' => $brochures]);
    }

    public function listing_details($id)
    {
        $layout = ProjectEntryLayoutImages::where('project_entry_id', $id)->get();
        $brochures = ProjectEntry::where('id', $id)->get();
        $brochure = ProjectEntry::where('id', $id)->first();
        $plots = ProjectEntryAppendData::where('project_entry_id', $id)->get();
        $reviews = Review::where('project_entry_id', $id)->orderBy('updated_at', 'desc')->get(); //Order reviews by updated timestamp in descending order
        $faqs = Faqs::where('project_entry_id', $id)->get();
        // to retrive business hours from time_slot table
        $businessHours = TimeSlot::where('project_entry_id', $id)->get();
        $days = Days::all();
        // $plot = ProjectEntryAppendData::all();
        // $projectEntry = ProjectEntryAppendData::with('plot_name')->find($id);
        return view('website.listing-details', [
            'brochures' => $brochures,
            'layout' => $layout,
            'brochure' => $brochure,
            'plots' => $plots,
            'reviews' => $reviews,
            'faqs' => $faqs,
            'businessHours' => $businessHours,
            'days' => $days,
            // 'plot'=>$plot,
            // 'plot' => $projectEntry->plot_name,
        ]);
    }
    public function fetchPlotDetailing(Request $request)
    {
        $leadDetail = ProjectEntryAppendData::where('id', $request->plot_id)->get();
        return response()->json($leadDetail);
    }


    // to store enquiry form
    // public function enquiry_form(Request $request, $id){
    //         $request->validate([

    //             'name' => 'required',
    //             'email' => 'required',
    //             'contact' => 'required',
    //             'message' => 'required',

    //         ]);
    //         $enquiry= new EnquiryForm;
    //         $enquiry->project_id = $id;
    //         $enquiry->name = $request ->name;
    //         $enquiry->email = $request ->email;
    //         $enquiry->contact = $request ->contact;
    //         $enquiry->message = $request ->message;

    //         $enquiry->save();

    //         return redirect()->route('listing-details', ['id' => $id])->with('success', 'Form Submitted Successfully');

    //         // return redirect()->route('listing-details')->with('success', 'Form Submitted Successfully');

    //     }

    // Review Table

    public function storeReview(Request $request)
    {

        // dd($request->all());
        // Validate the request data
        $request->validate([
            // 'name' => 'required',
            // 'email' => 'required|email',
            // 'subject' => 'required',
            'review' => 'required',
            'rating' => 'required|integer|between:1,5',
            // 'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',

        ]);



        // Handle file upload
        // $photo = null;
        // if ($request->hasFile('photo')) {
        //     $file = $request->file('photo');
        //     $photo = time() . '.' . $file->getClientOriginalExtension();
        //     $file->move(public_path('review/'), $photo);
        // }

        // Get the currently logged-in user
        $user = Auth::user();

        // check if the review is already exist for the user
        $existingReview = Review::where('email', $user->email)->first();

        if ($existingReview) {
            //Update the existing review

            $existingReview->update([
                'review' => $request->input('review'),
                'rating' => $request->input('rating'),
                'project_entry_id' => $request->input('project_entry_id'),


            ]);
        } else {
            // create a new review
            Review::create([
                'name' => $user->name,
                'email' => $user->email,
                'review' => $request->input('review'),
                'rating' => $request->input('rating'),
                'project_entry_id' => $request->input('project_entry_id'),

            ]);
        }


        //   // Get the name of the currently logged-in user
        //  $name = Auth::user()->name;

        // // Create a new review
        // Review::create([
        //     'name' => $name,
        //     // 'email' => $request->input('email'),
        //     // 'subject' => $request->input('subject'),
        //     'review' => $request->input('review'),
        //     'rating' => $request->input('rating'),
        //     // 'photo' => $photo,

        // ]);

        // Redirect or do something else
        return redirect()->back()->with('success', 'Review submitted successfully.');
    }


    //------------------------------------------------------------


    // map, brochure and youtube link

    public function downloadMap($id)
    {
        $projectEntry = ProjectEntry::find($id);

        if (!$projectEntry || !$projectEntry->site_map) {
            abort(404); // Handle case where project or map is not found
        }

        $filePath = public_path("/{$projectEntry->site_map}");
        $fileName = "map_{$projectEntry->id}.png";

        return response()->download($filePath, $fileName);
    }

    public function downloadBrochure($id)
    {
        $projectEntry = ProjectEntry::find($id);

        if (!$projectEntry || !$projectEntry->brochure) {
            abort(404); // Handle case where project or brochure is not found
        }

        $filePath = public_path("/{$projectEntry->brochure}");
        $fileName = "brochure_{$projectEntry->id}.png";

        return response()->download($filePath, $fileName);
    }

    public function openYoutube($id)
    {
        $projectEntry = ProjectEntry::find($id);

        if (!$projectEntry || !$projectEntry->youtube_url) {
            abort(404); // Handle case where project or YouTube URL is not found
        }

        return redirect($projectEntry->youtube_url);
    }

    //-----------------------------------------------------------


}