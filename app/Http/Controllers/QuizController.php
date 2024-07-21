<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Option;
use App\Models\Question;
use App\Models\UserAnswers;
use Illuminate\Http\Request;
use App\Models\QuizIndiyatra;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


class QuizController extends Controller
{
    public function index()
    {



        $Quiz = Quiz::orderBy('created_at', 'desc')->get();

        return view('frontend.quiz', ['Quiz' => $Quiz]);
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            // 'image' => 'required',
            //'title' => 'required',
            // 'text' => 'required',
            //'facilitatedby' => 'required',
            'question' => 'required|array|min:1',
            'briefanswer' => 'required|array|min:1',
        ]);

        if ($validator->fails()) {
            // Redirect back with an error message
            return redirect()->back()->with('error', 'Please add questions & answers ');
        }


        //dd($request->all());
        $file = $request->file('image');
        $filename = null;

        if ($file) {
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/'), $filename);
        }

        $data = [
            'image' => $filename,
            'title' => $request->input('title'),
            'text' => $request->input('text'),
            'facilitatedby' => $request->input('facilitatedby'),
        ];

        // Rest of your code...


        $quiz = Quiz::create($data);
        $quizId = $quiz->id;

        $questionsData = [];
        // Create the question record
        $questionsInput = $request->input('question');



        foreach ($request->input('question') as $key => $question) {
            $questionsData = [
                'quiz_id' => $quizId,
                'question' => $question,
                'briefanswer' => $request->input('briefanswer')[$key],
            ];
            $que = Question::create($questionsData);
            $queID = $que->id;
            // Create options for the question
            $optionData1 = [
                'option' => $request->input('option1')[$key],
                'is_right' => $request->input('rightanswer')[$key] == 1 ? 1 : 0,
                'que_id' => $queID,
            ];
            Option::create($optionData1);
            $optionData2 = [
                'option' => $request->input('option2')[$key],
                'is_right' => $request->input('rightanswer')[$key] == 2 ? 1 : 0,
                'que_id' => $queID,
            ];
            Option::create($optionData2);
            $optionData3 = [
                'option' => $request->input('option3')[$key],
                'is_right' => $request->input('rightanswer')[$key] == 3 ? 1 : 0,
                'que_id' => $queID,
            ];
            Option::create($optionData3);
            $optionData4 = [
                'option' => $request->input('option4')[$key],
                'is_right' => $request->input('rightanswer')[$key] == 4 ? 1 : 0,
                'que_id' => $queID,
            ];
            Option::create($optionData4);
        }

        // dd('end');
        //here end dd which not require multiple time submit data.
        /* if ($validator->fails()) {
              return redirect()->back()->withErrors($validator)->withInput();
          } */


        return redirect(route('user.quizes'))->with('success', 'Quiz created successfully');
    }


    // public function quizEdit($id)
    // {

    //     $Quiz = Quiz::findOrFail($id);

    //     $questions = Question::where('quiz_id', $id)->with('options')->get();

    //     $option = Option::findOrFail($id);

    //     return view('frontend.quiz_edit', compact('Quiz', 'option', 'questions'));
    // }


    public function quizEdit1($id)
    {
        $Quiz = Quiz::findOrFail($id);

        // Fetch questions and their options for the specified quiz
        $questions = Question::where('quiz_id', $id)->with('options')->get();

        return view('frontend.quiz_edit', compact('Quiz', 'questions'));
    }


    public function update(Request $request, $quizId)
    {
        // dd($request->all());
        $request->validate([
            // 'image' => 'required',
            // 'title' => 'required',
            // 'text' => 'required',
            // 'facilitatedby' => 'required',
            // 'question.*' => 'required|string',
            // 'briefanswer.*' => 'required|string',
        ]);

        $quiz = Quiz::findOrFail($quizId);

       if ($request->hasFile('image')) {
    // If an image file has been uploaded in the request
    $file = $request->file('image');
    $filename = time() . '.' . $file->getClientOriginalExtension();
    $file->move(public_path('images/'), $filename);

    // Delete the existing image file if it exists
    if (file_exists(public_path('images/' . $quiz->image)) && is_file(public_path('images/' . $quiz->image))) {
        unlink(public_path('images/' . $quiz->image));
    }

    // Update the image attribute with the new filename
    $quiz->image = $filename;
} else {
    // If no new image file has been uploaded, leave the existing image unchanged
    // No action needed here
}

// Save the changes to the quiz model
$quiz->save();


        $quiz->title = $request->input('title');
        $quiz->text = $request->input('text');
        $quiz->facilitatedby = $request->input('facilitatedby');
        $quiz->save();

        $questionsData = $request->input('question');

        if (is_array($questionsData)) {
            foreach ($questionsData as $key => $question) {
                $questionData = [
                    'quiz_id' => $quiz->id,
                    'question' => $question,
                    'briefanswer' => $request->input('briefanswer')[$key],
                ];

                $que = Question::updateOrCreate(['id' => $key], $questionData);
                $queID = $que->id;

                Option::updateOrCreate(
                    ['id' => $request->input('option1')[$key]],
                    [
                        'option' => $request->input('option1')[$key],
                        'is_right' => $request->input('rightanswer')[$key] == 1 ? 1 : 0,
                        'que_id' => $queID,
                    ]
                );

                Option::updateOrCreate(
                    ['id' => $request->input('option2')[$key]],
                    [
                        'option' => $request->input('option2')[$key],
                        'is_right' => $request->input('rightanswer')[$key] == 2 ? 1 : 0,
                        'que_id' => $queID,
                    ]
                );

                Option::updateOrCreate(
                    ['id' => $request->input('option3')[$key]],
                    [
                        'option' => $request->input('option3')[$key],
                        'is_right' => $request->input('rightanswer')[$key] == 3 ? 1 : 0,
                        'que_id' => $queID,
                    ]
                );

                Option::updateOrCreate(
                    ['id' => $request->input('option4')[$key]],
                    [
                        'option' => $request->input('option4')[$key],
                        'is_right' => $request->input('rightanswer')[$key] == 4 ? 1 : 0,
                        'que_id' => $queID,
                    ]
                );
            }
        } else {

            Log::error("Invalid or missing questions data");
        }

        return redirect(route('user.quizes'))->with('success', 'Quiz updated successfully');
    }





    public function destroy($id)
    {

        $quiz = Quiz::findOrFail($id);


        $questions = Question::where('quiz_id', $id)->get();

        foreach ($questions as $question) {

            Option::where('que_id', $question->id)->delete();

            $question->delete();
        }


        $quiz->delete();

        return redirect(route('user.quizes'))->with('success', 'Quiz deleted successfully');
    }

    public function getQuizDetails(Request $request)
    {



        $Quiz = Quiz::where('id', $request->entry_id)
            ->get();


        $render_view = view('frontend.quiz_details', compact('Quiz'))->render();
        return response()->json($render_view);
    }
    public function getQuizAttempt(Request $request)
    {
        $quizId = $request->entry_id;

        // Retrieve distinct user IDs along with user details for the specific quiz
        $users = UserAnswers::select('users.name as user_name', 'user_answers.user_id', 'quiz_id')
            ->join('users', 'users.id', '=', 'user_answers.user_id')
            ->where('user_answers.quiz_id', $quizId)
            ->distinct()
            ->get();

        // Pass $users to the view for rendering
        $renderedView = view('frontend.quiz_attempt', compact('users'))->render();

        return response()->json(['html' => $renderedView]);
    }


    public function ajaxDelete(Request $request, $id)
    {
        $question = Question::find($id);

        if ($question) {

            $question->delete();

            return response()->json(['success' => 'Question deleted successfully']);
        }

        return response()->json(['error' => 'Question not found'], 404);
    }


    public function quizbulk(Request $request)
    {
        try {

            $request->validate([
                'file' => 'required|mimes:xlsx,xls',
            ]);


            $file = $request->file('file');

            $data = Excel::toArray([], $file);


            $rows = array_slice($data[0], 1);


            $currentQuiz = null;

            foreach ($rows as $index => $row) {

                if ($row[0] !== null && $row[1] !== null && $row[2] !== null) {

                    $currentQuiz = Quiz::create([
                        'title' => $row[0],
                        'text' => $row[1],
                        'facilitatedby' => $row[2],

                    ]);
                }


                if ($row[3] !== null) {

                    $question = Question::create([
                        'quiz_id' => $currentQuiz->id,
                        'question' => $row[3],
                        'briefanswer' => $row[9],

                    ]);


                    for ($i = 4; $i <= 7; $i++) {
                        Option::create([
                            'que_id' => $question->id,
                            'option' => $row[$i],
                            'is_right' => ($i - 3) == $row[8] ? 1 : 0
                        ]);
                    }
                }
            }

            return redirect()->back()->with('success', 'Data imported successfully');
        } catch (\Exception $e) {

            return redirect()->back()->with('error', 'Error importing data. ' . $e->getMessage());
        }
    }



    //by indiyatra

    public function QuizIndiyatraindex()
    {
        $Collaborators = QuizIndiyatra::orderBy('created_at', 'desc')->get();
        return view('frontend.quiz_indiyatra_links', ['Collaborators' => $Collaborators]);

    }


    public function QuizIndiyatrastore(Request $request)
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

        $newCollaborators = new QuizIndiyatra;
        $newCollaborators->title = $request->title;
        $newCollaborators->website = $request->website;
        $newCollaborators->logo = $filename; // Assign the filename (or null if no image uploaded)

        $newCollaborators->save();

        return redirect(route('user.QuizIndiyatra'))->with('success', 'Quiz link added successfully');
    }

    public function editQuizIndiyatra($id)
    {
        $quiz = QuizIndiyatra::find($id);
        return view('frontend.edit_quiz_indiyatra_link', compact('quiz'));
    }

    public function updateQuizIndiyatra(Request $request, $id)
    {
        $request->validate([
            // 'title' => 'required',
            // 'website' => 'required|url',
        ]);

        $quiz = QuizIndiyatra::find($id);

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

        return redirect(route('user.QuizIndiyatra'))->with('success', 'Quiz link updated successfully');
    }



  public function destroyQuizIndiyatra($id)
{
    $quiz = QuizIndiyatra::find($id);

    if ($quiz) {
        if (!$quiz->logo) {
            // If logo is not present, delete the record without storing the logo
            $quiz->delete();
            return redirect(route('user.QuizIndiyatra'))->with('success1', 'Quiz link deleted successfully');
        } else {
            // If logo is present, delete the record and store the logo in the public images folder
            Storage::delete('public/images/' . $quiz->logo);
            $quiz->delete();
            return redirect(route('user.QuizIndiyatra'))->with('success1', 'Quiz link and logo deleted successfully');
        }
    } else {
        return redirect(route('user.QuizIndiyatra'))->with('error', 'Quiz link not found');
    }
}



}