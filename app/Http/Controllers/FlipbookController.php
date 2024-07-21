<?php

namespace App\Http\Controllers;

use App\Models\Flipbook;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class FlipbookController extends Controller
{
   public function flipbookindex()
{
    $Collaborators = Flipbook::orderBy('created_at', 'desc')->get();
    return view('frontend.flipbook_adminpanel', ['Collaborators' => $Collaborators]);
}



    public function flipbookstore(Request $request)
    {
        $request->validate([
            // Your validation rules for other fields if required
        ]);

        $filename = null; // Set default value for $filename

        if ($request->hasFile('logo') && $request->file('logo')->isValid()) {
            $file = $request->file('logo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/'), $filename);
        }

        $newCollaborators = new Flipbook;
        $newCollaborators->title = $request->title;
        $newCollaborators->website = $request->website;
        $newCollaborators->logo = $filename; // Assign the filename (or null if no image uploaded)

        $newCollaborators->save();

        return redirect(route('user.flipbook'))->with('success', 'Flipbook link added successfully');
    }

    public function editflipbook($id)
    {
        $quiz = Flipbook::find($id);
        return view('frontend.edit_flipbook_adminpanel', compact('quiz'));
    }

    public function updateflipbook(Request $request, $id)
    {
		//dd($request->all());
        $request->validate([
            // 'title' => 'required',
            // 'website' => 'required|url',
        ]);

        $quiz = Flipbook::find($id);

        if ($request->hasFile('logo')) {
            $request->validate([

            ]);

            $file = $request->file('logo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/'), $filename);

            // Delete old image if it exists
            if (file_exists(public_path('images/' . $quiz->logo))) {
                unlink(public_path('images/' . $quiz->logo));
            }

            $quiz->logo = $filename;
        }

        $quiz->title = $request->title;
        $quiz->website = $request->website;
        $quiz->save();

        return redirect(route('user.flipbook'))->with('success', 'Flipbook link updated successfully');
    }



public function destroyflipbook($id)
{
    $flipbook = Flipbook::find($id);

    if ($flipbook) {
        // Check if the flipbook has a logo
        if ($flipbook->logo) {
            // Delete the logo from the public images folder
            Storage::delete('public/images/' . $flipbook->logo);
        }

        // Delete the flipbook record
        $flipbook->delete();

        return redirect(route('user.flipbook'))->with('success1', 'Flipbook link deleted successfully');
    } else {
        return redirect(route('user.flipbook'))->with('error', 'Flipbook link not found');
    }
}






}