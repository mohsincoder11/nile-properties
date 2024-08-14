<?php

namespace App\Http\Controllers\panel;

use Illuminate\Http\Request;
use App\Models\AgreementMaster;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class AgreementMasterController extends Controller
{
    //
    public function index()
    {
        $agree = AgreementMaster::all();
        return view('panel.agreement_master', compact('agree'));
    }
    public function show($id)
    {
        $agreement = AgreementMaster::findOrFail($id);
        if (!$agreement) {
            return response()->json(['error' => 'agreement not found'], 404);
        }
        $inquiryHtml = view('panel.agreement_description', compact('agreement'))->render();
        return response()->json(['html' => $inquiryHtml]);


    }

    public function edit($id)
    {
        // Find the agreement by ID
        $agreement = AgreementMaster::findOrFail($id);

        // Return the view with agreement data
        return view('panel.agreement_master_edit', compact('agreement'));
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming data
        $request->validate([
            'document_name' => 'required|string|max:255',
            'language' => 'required|string',
            'description' => 'required|string',
        ]);

        // Find the agreement by ID
        $agreement = AgreementMaster::findOrFail($id);

        // Update the agreement with new data
        $agreement->update([
            'document_name' => $request->input('document_name'),
            'language' => $request->input('language'),
            'description' => $request->input('description'),
        ]);

        // Redirect back with a success message
        return redirect()->route('agrrementmaster')
            ->with('success', 'Agreement updated successfully!');
    }

    public function destroy($id)
    {
        // Find the agreement by ID
        $agreement = AgreementMaster::find($id);

        if ($agreement) {
            // Delete the agreement
            $agreement->delete();

            // Set a success message and redirect
            Session::flash('success', 'Agreement deleted successfully.');
        } else {
            // Set an error message if the agreement was not found
            Session::flash('error', 'Agreement not found.');
        }

        return redirect()->route('agrrementmaster')
            ->with('success', 'Agreement deleted successfully!');
    }
    public function store(Request $request)
    {

        // dd($request->all());
        // Validate incoming request
        $request->validate([
            'document_name' => 'required|string|max:255',
            'language' => 'required|string|max:50',
            'content' => 'required|',
        ]);

        // Create a new agreement master entry
        AgreementMaster::create([
            'document_name' => $request->input('document_name'),
            'language' => $request->input('language'),
            'description' => $request->input('content'),
        ]);

        // Redirect or return a response
        return redirect()->route('agrrementmaster')->with('success', 'Agreement document created successfully!');
    }
}