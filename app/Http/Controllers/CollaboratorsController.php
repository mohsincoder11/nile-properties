<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Collaborators;

class CollaboratorsController extends Controller
{
    public function index()
    {
        $Collaborators = Collaborators::orderBy('created_at', 'desc')->get();

        return view('frontend.collaborators', ['Collaborators' => $Collaborators]);

    }


   public function store(Request $request)
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

    $newCollaborators = new Collaborators;
    $newCollaborators->title = $request->title;
    $newCollaborators->text = $request->text;
    $newCollaborators->facebook = $request->facebook;
    $newCollaborators->website = $request->website;
    $newCollaborators->logo = $filename; // Assign the filename (or null if no image uploaded)

    $newCollaborators->save();

    return redirect(route('user.collaborators'))->with('success', 'Collaborators added successfully');
}

public function edit($id)
    {
        $collaborators = Collaborators::find($id);
        return view('frontend.collaborators_edit', ['collaborators' => $collaborators]);

    }

public function update(Request $request, $id)
{
    $request->validate([
        // Your validation rules for other fields if required
    ]);

    $collaborator = Collaborators::find($id);

    if ($request->hasFile('logo') && $request->file('logo')->isValid()) {
        $file = $request->file('logo');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('images/'), $filename);
        $collaborator->logo = $filename;
    }

    // Update the collaborator's information
    $collaborator->title = $request->title;
    $collaborator->text = $request->text;
    $collaborator->facebook = $request->facebook;
    $collaborator->website = $request->website;

    $collaborator->save();

    return redirect(route('user.collaborators'))->with('success', 'Collaborator updated successfully');
}

    public function destroyCollaborators($id)
    {
        Collaborators::find($id)->delete();

        return redirect(route('user.collaborators'))->with('success1', 'Collaborators deleted successfully');

    }


}