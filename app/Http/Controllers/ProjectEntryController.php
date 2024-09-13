<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Days;
use App\Models\Faqs;
use App\Models\FirmRegistrationMaster;
use App\Models\TimeSlot;
use Illuminate\Support\Str;
use App\Models\ProjectEntry;
use Illuminate\Http\Request;
use App\Models\LayoutFeature;
use App\Models\PlotSaleStatus;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\ProductEntryAppendData;
use App\Models\ProjectEntryAppendData;


use Illuminate\Support\Facades\Storage;
use App\Models\ProductEntryLayoutImages;
use App\Models\ProjectEntryLayoutImages;



class ProjectEntryController extends Controller
{


   public function bulkploatappendatrow(Request $request)
{
    try {
        // Decode base64 data to binary
        $base64Data = $request->input('fileData');
        $binaryData = base64_decode(preg_replace('#^data:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;base64,#i', '', $base64Data));

        // Define the file name
        $fileName = 'imported_file.xlsx';

        // Save binary data as a file in the public path
        Storage::disk('public')->put('temp/' . $fileName, $binaryData);

        // Read data from the file
        $data = Excel::toArray([], Storage::disk('public')->path('temp/' . $fileName));
        $rows = array_slice($data[0], 1);

        $response = [];
						  foreach ($rows as $index => $row) {
					// Ensure that required fields (plot_width, plot_length, rate) are set
					if (isset($row[0], $row[1], $row[2])) {
						// Calculate area in square feet (e.g., plot_width * plot_length)
						$plotWidth = $row[1];
						$plotLength = $row[2];
						$areaSqrFt = $plotWidth * $plotLength;

						// Calculate area in square meters (if you want to convert from square feet to square meters)
						$areaSqrMt = $areaSqrFt * 0.092903; // 1 square foot = 0.092903 square meters

						// Calculate amount (e.g., area_sqrft * rate)
						$rate = $row[9] ?? 0;
						$amount = $areaSqrFt * $rate;

						// Store the calculated values in the response array
						$response[] = [
							'plot_no' => $row[0],
							'plot_width' => $plotWidth,
							'plot_length' => $plotLength,
							'area_sqrft' => $areaSqrFt,
							'area_sqrmt' => $areaSqrMt,
							'east' => $row[5] ?? null,
							'west' => $row[6] ?? null,
							'south' => $row[7] ?? null,
							'north' => $row[8] ?? null,
							'rate' => $rate,
							'amount' => $amount,
							'minimum_down_payment' => $row[11] ?? null,
                            'tenure' => $row[12] ?? null,
						];
					}
				}


            // Remove the file
            Storage::disk('public')->delete('temp/' . $fileName);

        return response()->json(['success' => true, 'data' => $response]);
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'message' => 'Error importing data. ' . $e->getMessage()]);
    }
}




    public function index()
    {
        $firm = FirmRegistrationMaster::all();

        $cities = City::all();
        $feature = LayoutFeature::all();
        $status = PlotSaleStatus::all();
        $project = ProjectEntry::all();
        $day = Days::all();
        return view('panel.project_entry', compact('cities', 'firm', 'feature', 'status', 'project', 'day'));
    }
    public function addedProjectEntry()
    {
        $projects = ProjectEntry::orderByDesc('id')->get();
        return view('panel.added_project_entry', compact('projects'));
    }
    // In your Controller
    public function getProjectsByFirm($firm_id)
    {
        $projects = ProjectEntry::where('firm_id', $firm_id)->get();
        return response()->json($projects);
    }

    public function store(Request $request)
    {
        //  dd($request->all());
        // Individual assignment of fields
        $projectData = [
            'city_id' => $request->input('city_id'),
            'firm_id' => $request->input('firm_id'),

            'project_code' => $request->input('project_code'),
            'project_name' => $request->input('project_name'),
            'mobile_number' => $request->input('mobile_number'),
            'whatsapp_number' => $request->input('whatsapp_number'),
            'email' => $request->input('email'),
            'mauja' => $request->input('mauja'),
            'kh_no' => $request->input('kh_no'),
            'phn' => $request->input('phn'),
            'taluka' => $request->input('taluka'),
            'district' => $request->input('district'),
            'no_of_plots' => $request->input('no_of_plots'),
            'areasqrft_manual' => $request->input('areasqrft_manual'),
            'areasqrmt_manual' => $request->input('areasqrmt_manual'),
            'embedded_map' => $request->input('embedded_map'),
            'area_plottable' => $request->input('area_plottable'),
            'amenities' => $request->input('amenities'),
            'open_space' => $request->input('open_space'),
            'dev_charge' => $request->input('dev_charge'),
            'other_charges_percentage' => $request->input('other_charges_percentage'),
            'youtube_url' => $request->input('youtube_url'),
            'status' => $request->input('status'),
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
            'agent_name' => $request->input('agent_name'),
            'agent_designation' => $request->input('agent_designation'),
            'facebook' => $request->input('facebook'),
            'twitter' => $request->input('twitter'),

            'schedule_payment' => $request->input('schedule_payment'),
            'linkedin' => $request->input('linkedin'),
            'instagram' => $request->input('instagram'),
            'layout_description' => $request->input('layout_description'),
            'layout_feature' => is_array($request->input('layout_feature')) ? implode(', ', $request->input('layout_feature')) : '',
        ];

        // Store 'site_map' image in public path
        if ($request->hasFile('site_map')) {
            $siteMapFile = $request->file('site_map');
            $siteMapFilename = rand(0000, 8888) . time() . '.' . $siteMapFile->getClientOriginalExtension();
            $siteMapFile->move(public_path('images/'), $siteMapFilename);
            $projectData['site_map'] = 'images/' . $siteMapFilename;
        }
        if ($request->hasFile('schedule_payment')) {
            $siteMapFile = $request->file('schedule_payment');
            $siteMapFilename = rand(0000, 8888) . time() . '.' . $siteMapFile->getClientOriginalExtension();
            $siteMapFile->move(public_path('images/'), $siteMapFilename);
            $projectData['schedule_payment'] = 'images/' . $siteMapFilename;
        }


        // Store 'brochure' image in public path
        if ($request->hasFile('brochure')) {
            $brochureFile = $request->file('brochure');
            $brochureFilename = rand(0000, 8888) . time() . '.' . $brochureFile->getClientOriginalExtension();
            $brochureFile->move(public_path('images/'), $brochureFilename);
            $projectData['brochure'] = 'images/' . $brochureFilename;
        }

        // Store profile picture in public path
        if ($request->hasFile('profile_picture')) {
            $profilePictureFile = $request->file('profile_picture');
            $profilePictureFileName = rand(0000, 8888) . time() . '.' . $profilePictureFile->getClientOriginalExtension();
            $profilePictureFile->move(public_path('images/'), $profilePictureFileName);
            $projectData['profile_picture'] = 'images/' . $profilePictureFileName;
        }


        // Create ProjectEntry
        $project = ProjectEntry::create($projectData);

        // Store FAQs data if available
        if (!empty($request->input('question')) && !empty($request->input('answer'))) {
            $faqsData = [
                'question' => $request->input('question'),
                'answer' => $request->input('answer'),
            ];

            foreach ($faqsData['question'] as $key => $value) {
                Faqs::create([
                    'project_entry_id' => $project->id,
                    'question' => $value,
                    'answer' => $faqsData['answer'][$key],
                ]);
            }
        }

        // Extract days information from the request
        $days = Days::all(); // Get all available days
        $selectedDays = $request->input('days', []); // Assume you have a form field named 'days'

        // Loop through each day and create time_slot entries
        foreach ($days as $day) {
            $dayId = $day->id;
            // Check if the day is selected in the form
            if (in_array($dayId, $selectedDays)) {
                // Create a new entry in the time_slot table
                TimeSlot::create([
                    'project_entry_id' => $project->id,
                    'days_id' => $dayId,
                    'open_at' => $request->input("open_at_$dayId"),
                    'close_at' => $request->input("close_at_$dayId"),
                    'is_close' => $request->has("is_close_$dayId"),
                ]);
            }
        }

        // Store layout images if available
        if (!empty($request->input('layout_image'))) {
            $layoutImages = $request->input('layout_image');

            foreach ($layoutImages as $uploadedImage) {
                if (is_string($uploadedImage)) {
                    // If it's a base64 string, convert it to an image file
                    list($type, $uploadedImage) = explode(';', $uploadedImage);
                    list(, $uploadedImage) = explode(',', $uploadedImage);
                    $uploadedImage = base64_decode($uploadedImage);

                    $filename = 'image_' . Str::random(10) . '.png';
                    File::put(public_path('images/' . $filename), $uploadedImage);

                    ProjectEntryLayoutImages::create([
                        'project_entry_id' => $project->id,
                        'layout_image' => 'images/' . $filename,
                    ]);
                } else {
                    // If it's not a base64 string, it's a file path, so just create a record
                    ProjectEntryLayoutImages::create([
                        'project_entry_id' => $project->id,
                        'layout_image' => $uploadedImage,
                    ]);
                }
            }
        }

        // Store plot data if available
        if (!empty($request->input('plotno'))) {
            $plotData = [
                'plot_no' => $request->input('plotno'),
                'plot_width' => $request->input('plotwidth'),
                'plot_length' => $request->input('plotlength'),
                'area_sqrft' => $request->input('areasqrft'),
                'area_sqrmt' => $request->input('areasqrmt'),
                'east' => $request->input('east'),
                'west' => $request->input('west'),
                'south' => $request->input('south'),
                'north' => $request->input('north'),
                'rate' => $request->input('rate'),
                'amount' => $request->input('amount'),
            ];

            foreach ($plotData['plot_no'] as $key => $value) {
                ProjectEntryAppendData::create([
                    'project_entry_id' => $project->id,
                    'plot_no' => $value,
                    'plot_width' => $plotData['plot_width'][$key],
                    'plot_length' => $plotData['plot_length'][$key],
                    'area_sqrft' => $plotData['area_sqrft'][$key],
                    'area_sqrmt' => $plotData['area_sqrmt'][$key],
                    'east' => $plotData['east'][$key],
                    'west' => $plotData['west'][$key],
                    'south' => $plotData['south'][$key],
                    'north' => $plotData['north'][$key],
                    'rate' => $plotData['rate'][$key],
                    'amount' => $plotData['amount'][$key],

                ]);
            }
        }

        return redirect()->route('project.addedProjectEntry')->with('success', 'Project created successfully');
    }




    public function update(Request $request, $id)
    {
        //dd($request->all());
        // Individual assignment of fields
        $projectData = [
            'city_id' => $request->input('city_id'),
            'firm_id' => $request->input('firm_id'),

            'project_code' => $request->input('project_code'),
            'project_name' => $request->input('project_name'),
            'mobile_number' => $request->input('mobile_number'),
            'whatsapp_number' => $request->input('whatsapp_number'),
            'email' => $request->input('email'),
            'mauja' => $request->input('mauja'),
            'kh_no' => $request->input('kh_no'),
            'phn' => $request->input('phn'),
            'taluka' => $request->input('taluka'),
            'district' => $request->input('district'),
            'no_of_plots' => $request->input('no_of_plots'),
            'areasqrft_manual' => $request->input('areasqrft_manual'),
            'areasqrmt_manual' => $request->input('areasqrmt_manual'),
            'embedded_map' => $request->input('embedded_map'),
            'area_plottable' => $request->input('area_plottable'),
            'amenities' => $request->input('amenities'),
            'open_space' => $request->input('open_space'),
            'dev_charge' => $request->input('dev_charge'),
            'other_charges_percentage' => $request->input('other_charges_percentage'),
            'youtube_url' => $request->input('youtube_url'),
            'status' => $request->input('status'),
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
            'layout_description' => $request->input('layout_description'),
            'layout_feature' => $request->has('layout_feature') ? implode(', ', $request->input('layout_feature')) : null,
            'agent_name' => $request->input('agent_name'),
            'agent_designation' => $request->input('agent_designation'),
            'facebook' => $request->input('facebook'),
            'twitter' => $request->input('twitter'),
            'linkedin' => $request->input('linkedin'),
            'instagram' => $request->input('instagram'),
        ];

        if ($request->hasFile('profile_picture')) {
            $profilePictureFile = $request->file('profile_picture');
            $profilePictureFileName = rand(0000, 8888) . time() . '.' . $profilePictureFile->getClientOriginalExtension();
            $profilePictureFile->move(public_path('images/'), $profilePictureFileName);
            $projectData['profile_picture'] = 'images/' . $profilePictureFileName;
        }

        // Update 'site_map' image in public path
        if ($request->hasFile('site_map')) {
            $siteMapFile = $request->file('site_map');
            $siteMapFilename = rand(0000, 8888) . time() . '.' . $siteMapFile->getClientOriginalExtension();
            $siteMapFile->move(public_path('images/'), $siteMapFilename);
            $projectData['site_map'] = 'images/' . $siteMapFilename;
            //  dump($siteMapFilename);

        }

        // Update 'brochure' image in public path
        if ($request->hasFile('brochure')) {
            $brochureFile = $request->file('brochure');
            $brochureFilename = rand(0000, 8888) . time() . '.' . $brochureFile->getClientOriginalExtension();
            $brochureFile->move(public_path('images/'), $brochureFilename);
            // dump($brochureFilename);
            $projectData['brochure'] = 'images/' . $brochureFilename;
        }
        // Update ProjectEntry

        // dump($request->all());
        // dd($projectData);
        $project = ProjectEntry::findOrFail($id);

        $project->update($projectData);

        // Update FAQs
        $faqsData = [
            'question' => $request->input('question'),
            'answer' => $request->input('answer'),
        ];

        // Check if 'question' input exists and is not null
        if (!empty($faqsData['question']) && is_array($faqsData['question'])) {
            foreach ($faqsData['question'] as $key => $value) {
                Faqs::updateOrCreate(
                    ['project_entry_id' => $project->id, 'question' => $value],
                    [
                        'answer' => $faqsData['answer'][$key],
                    ]
                );
            }
        }

        // Update TimeSlots
        $days = Days::all(); // Get all available days
        $selectedDays = $request->input('days', []); // Assume you have a form field named 'days'

        foreach ($days as $day) {
            $dayId = $day->id;

            if (in_array($dayId, $selectedDays)) {
                TimeSlot::updateOrCreate(
                    ['project_entry_id' => $project->id, 'days_id' => $dayId],
                    [
                        'open_at' => $request->input("open_at_$dayId"),
                        'close_at' => $request->input("close_at_$dayId"),
                        'is_close' => $request->has("is_close_$dayId"),
                    ]
                );
            } else {
                // If the day is not selected, delete the existing time_slot entry
                TimeSlot::where(['project_entry_id' => $project->id, 'days_id' => $dayId])->delete();
            }
        }

        // Handle layout images
        $layoutImages = $request->input('layout_image');

        // Fetch existing layout images
        $existingLayoutImages = ProjectEntryLayoutImages::where('project_entry_id', $project->id)->pluck('layout_image')->toArray();

        // Convert base64 images to actual files and add to layout images array
        if (!empty($layoutImages) && is_array($layoutImages)) {
            foreach ($layoutImages as $uploadedImage) {
                if (strpos($uploadedImage, 'data:image') === 0) {
                    list($type, $uploadedImage) = explode(';', $uploadedImage);
                    list(, $uploadedImage) = explode(',', $uploadedImage);
                    $uploadedImage = base64_decode($uploadedImage);

                    $filename = uniqid('image_') . '.png';
                    file_put_contents(public_path('images/') . $filename, $uploadedImage);

                    $existingLayoutImages[] = 'images/' . $filename;
                } else {
                    if (!in_array($uploadedImage, $existingLayoutImages)) {
                        $existingLayoutImages[] = $uploadedImage;
                    }
                }
            }
        }

        // Update layout images in the database
        ProjectEntryLayoutImages::where('project_entry_id', $project->id)->delete();
        foreach ($existingLayoutImages as $imagePath) {
            ProjectEntryLayoutImages::create([
                'project_entry_id' => $project->id,
                'layout_image' => $imagePath,
            ]);
        }

        // Update append data in ProjectEntryAppendData model
        $plotData = [
            'plot_no' => $request->input('plotno'),
            'plot_width' => $request->input('plotwidth'),
            'plot_length' => $request->input('plotlength'),
            'area_sqrft' => $request->input('areasqrft'),
            'area_sqrmt' => $request->input('areasqrmt'),
            'east' => $request->input('east'),
            'west' => $request->input('west'),
            'south' => $request->input('south'),
            'north' => $request->input('north'),
            'rate' => $request->input('rate'),
            'amount' => $request->input('amount'),

        ];

        // Check if 'plot_no' input exists and is not null and update
        if (!empty($plotData['plot_no']) && is_array($plotData['plot_no'])) {
            foreach ($plotData['plot_no'] as $key => $value) {
                ProjectEntryAppendData::updateOrCreate(
                    ['project_entry_id' => $project->id, 'plot_no' => $value],
                    [
                        'plot_width' => $plotData['plot_width'][$key],
                        'plot_length' => $plotData['plot_length'][$key],
                        'area_sqrft' => $plotData['area_sqrft'][$key],
                        'area_sqrmt' => $plotData['area_sqrmt'][$key],
                        'east' => $plotData['east'][$key],
                        'west' => $plotData['west'][$key],
                        'south' => $plotData['south'][$key],
                        'north' => $plotData['north'][$key],
                        'rate' => $plotData['rate'][$key],
                        'amount' => $plotData['amount'][$key],

                    ]
                );
            }
        }

        return redirect()->route('project.addedProjectEntry')->with('success', 'Project updated successfully');
    }

    // Assuming you have a ProjectEntry model and a ProjectController
    public function fetchProjectDetailsextra(Request $request)
    {
        $projectId = $request->get('projectId');

        // Fetch the project details based on the project ID
        $projectDetails = ProjectEntry::find($projectId);

        return response()->json($projectDetails);
    }


    public function fetchPlotDetails(Request $request)
    {
        $plotId = $request->get('plotId');

        // Assuming `modelProjectEntryAppendData` is your model and it has plot details
        $plotDetails = ProjectEntryAppendData::where('id', $plotId)->get();

        return response()->json($plotDetails);
    }

    public function destroy($id)
    {
        $project = ProjectEntry::findOrFail($id);

        // Delete associated layout images
        ProjectEntryLayoutImages::where('project_entry_id', $project->id)->delete();

        // Delete associated append data
        ProjectEntryAppendData::where('project_entry_id', $project->id)->delete();

        // Delete the project entry
        $project->delete();

        return redirect()->route('project.addedProjectEntry')->with('success', 'Project deleted successfully');
    }

    public function viewservicearea(Request $request)
    {
        $servicearea = ProjectEntry::with('PlotSaleStatus1')->where('id', $request->entry_id)->first();
        $appendData = ProjectEntryAppendData::where('project_entry_id', $servicearea->id)->get();
        $layoutImages = ProjectEntryLayoutImages::where('project_entry_id', $servicearea->id)->get();

        $render_view = view('panel.view_project_entry', compact('servicearea', 'appendData', 'layoutImages'))->render();

        return response()->json(['html' => $render_view]);
    }

    public function edit($id)
    {
        // Find the project by its ID
        $project = ProjectEntry::findOrFail($id);
        $firm = FirmRegistrationMaster::all();

        // Retrieve necessary data for dropdowns or other form elements
        $cities = City::all();
        $features = LayoutFeature::all();
        $status = PlotSaleStatus::all();

        // Retrieve additional data for the edit view if needed
        // For example, you may need to fetch layout images or other related data
        $layoutImages = ProjectEntryLayoutImages::where('project_entry_id', $project->id)->get();
        $appendData = ProjectEntryAppendData::where('project_entry_id', $project->id)->get();
        $faqs = Faqs::where('project_entry_id', $project->id)->get();
        $timeSlots = TimeSlot::where('project_entry_id', $project->id)->get();
        $day = Days::all();

        // Pass the retrieved data to the edit view
        return view('panel.edit_project_entry', compact('project', 'firm', 'cities', 'features', 'status', 'layoutImages', 'appendData', 'faqs', 'timeSlots', 'day'));
    }

    public function deleteImage(Request $request, $id)
    {
        try {
            $layoutImage = ProjectEntryLayoutImages::find($id);

            // Delete the layout image record
            $layoutImage->delete();

            return response()->json(['message' => 'Layout image deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error deleting layout image'], 500);
        }
    }

    public function deletedata(Request $request, $id)
    {
        try {
            $layoutdata = ProjectEntryAppendData::find($id);

            // Delete the layout data record
            $layoutdata->delete();

            return response()->json(['message' => 'Layout data deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error deleting layout data'], 500);
        }
    }

    public function deletefaqs(Request $request, $id)
    {
        try {
            $faqs = Faqs::find($id);

            // Delete the layout data record
            $faqs->delete();

            return response()->json(['message' => 'Faqs deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error deleting Faqs'], 500);
        }
    }






    // Your existing code...

    public function bulkploat(Request $request)
    {
        try {
            $request->validate([
                'file' => 'required|mimes:xlsx,xls',
                'project_entry_id' => 'required', // Adjust as needed
            ]);

            $file = $request->file('file');
            $data = Excel::toArray([], $file);
            $rows = array_slice($data[0], 1);
            //dd($data);

            DB::beginTransaction();

            foreach ($rows as $index => $row) {
                if ($row[0] !== null && $row[1] !== null && $row[2] !== null) {
                    $projectEntryId = $request->input('project_entry_id');

                    ProjectEntryAppendData::create([
                        'project_entry_id' => $projectEntryId,
                        'plot_no' => $row[0],
                        'plot_width' => $row[1],
                        'plot_length' => $row[2],
                        'area_sqrft' => $row[3],
                        'area_sqrmt' => $row[4],
                        'east' => $row[5],
                        'west' => $row[6],
                        'south' => $row[7],
                        'north' => $row[8],
                        'rate' => $row[9],
                        'amount' => $row[10],

                    ]);
                }
            }

            DB::commit();

            return redirect()->back()->with('success', 'Data imported successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Error importing data. ' . $e->getMessage());
        }
    }
}